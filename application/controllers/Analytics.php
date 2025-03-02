<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Analytics_model');
        $this->load->database();
        $this->load->helper('url');
    }

    public function index() {
        // Fetch data for dashboard
        $data = [
            'sales_overview' => $this->Analytics_model->get_sales_overview(),
            'top_products' => $this->Analytics_model->get_top_products(),
            'customer_insights' => $this->Analytics_model->get_customer_insights(),
            'testimonial_analysis' => $this->Analytics_model->get_testimonial_analysis(),
            'discount_effectiveness' => $this->Analytics_model->get_discount_effectiveness()
        ];

        // Load the dashboard view
        $this->load->view('overview', $data);
    }
}