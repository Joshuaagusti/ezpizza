<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '../vendor/autoload.php';
require_once '../secrets.php';
\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

class Payment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Cart_model');
        $this->config->load('stripe');
    }

    public function index(){
        $this->load->view('payment');
    }

    public function charge() {
        // Ensure user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false, 
                    'message' => 'Please log in to process payment.'
                ]));
            return;
        }

        // Set the Stripe API key
        \Stripe\Stripe::setApiKey($this->config->item('stripe_api_key'));

        // Get cart total from session or model
        $this->load->model('Cart_model');
        $id_cliente = $this->session->userdata('id_cliente');
        $cart_summary = $this->Cart_model->calculate_cart_summary($id_cliente);
        $amount_in_cents = round($cart_summary['total'] * 100);

        try {
            // Create PaymentIntent
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount_in_cents,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            // Check payment status
            if ($paymentIntent->status === 'succeeded') {
                // Create order
                $order_id = $this->Cart_model->createOrder($id_cliente);

                if ($order_id) {
                    // Prepare success response
                    $response = [
                        'success' => true,
                        'message' => 'Payment successful and order created!',
                        'order_id' => $order_id,
                        'payment_intent_id' => $paymentIntent->id
                    ];

                    // Clear cart after successful order
                    $this->db->where('id_cliente', $id_cliente);
                    $this->db->delete('carrito');
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Payment succeeded but order creation failed.'
                    ];
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Payment failed.'
                ];
            }

            // Output response
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));

        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle Stripe API errors
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Payment error: ' . $e->getMessage()
                ]));
        } catch (Exception $e) {
            // Handle other errors
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'An unexpected error occurred: ' . $e->getMessage()
                ]));
        }
    }

    // Optional: Add a method to handle successful payment confirmation
    public function confirm_payment() {
        $paymentIntentId = $this->input->post('payment_intent_id');
        
        try {
            $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);
            
            if ($paymentIntent->status === 'succeeded') {
                // Do any additional processing if needed
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'success' => true,
                        'message' => 'Payment confirmed'
                    ]));
            } else {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'success' => false,
                        'message' => 'Payment not completed'
                    ]));
            }
        } catch (Exception $e) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Error confirming payment: ' . $e->getMessage()
                ]));
        }
    }
}