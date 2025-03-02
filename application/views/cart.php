<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Section</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    /* Previous custom scrollbar styles remain the same */
    .cart-items-container,
    .new-arrivals-container {
      max-height: 80vh;
      overflow-y: auto;
      overflow-x: hidden;
      padding-right: 1rem;
      box-sizing: border-box;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    /* New Arrivals images smaller */
    .new-arrivals .card-img-top {
      height: 160px;
      object-fit: cover;
    }

    /* Hide default number input buttons */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
      appearance: textfield;
    }

    /* Custom number input styling */
    .custom-number-input {
      display: flex;
      align-items: center;
    }

    .custom-number-input button {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .custom-number-input input {
      width: 60px;
      text-align: center;
      border: 1px solid #ced4da;
      height: 40px;
    }

    /* Hover effect for delete button */
    .btn-delete:hover {
      background-color: #dc3545;
      color: white !important;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Main Cart Section -->
      <div class="col-12 col-md-8 col-lg-9">
        <section class="cart-section">
          <div class="container">
            <h2 class="my-4">Cart</h2>

            <!-- Cart Items Container with Scrolling -->
            <div class="cart-items-container">
              <div class="row g-3">
                <!-- Cart Item Template -->

                <?php
                foreach ($cart as $item) {
                ?>
                  <div class="col-12" id="cart-item-<?php echo $item['id_carrito']; ?>">
                    <div class="card">
                      <div class="row g-0 align-items-center">
                        <div class="col-4 col-md-3 col-lg-2 d-flex align-items-center justify-content-center">
                          <img src="https://ezpizza.store/assets/img/products/<?php echo $item['url_imagen']; ?>"
                            class="img-fluid rounded-start"
                            alt="<?php echo $item['producto_nombre']; ?>"
                            style="max-height: 150px; object-fit: contain;">
                        </div>
                        <div class="col-8 col-md-9 col-lg-10">
                          <div class="card-body">
                            <h5 class="card-title mb-2"><?php echo $item['producto_nombre']; ?></h5>
                            <div class="text-start mb-2">
                              <span class="fw-bold">$<?php echo $item['precio']; ?> x <?php echo $item['cantidad']; ?> = $<?php echo number_format(floatval($item['precio']) * floatval($item['cantidad']), 2); ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                              <div class="custom-number-input">
                                <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, -1)">-</button>
                                <input type="number"
                                  class="form-control quantity-input"
                                  data-id-carrito="<?php echo $item['id_carrito']; ?>"
                                  data-id-producto="<?php echo $item['id_producto']; ?>"
                                  value="<?php echo $item['cantidad']; ?>"
                                  min="1"
                                  max="100">
                                <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(this, 1)">+</button>
                              </div>
                              <div class="text-muted"><?php echo $item['stock']; ?>+ Available</div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                              <div class="cart-item-actions">
                                <button class="btn btn-md btn-delete text-danger me-2" onclick="remove(<?php echo $item['id_carrito']; ?>)">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-accent btn-md" onclick="buyItem(<?php echo $item['id_producto']; ?>)">Buy now</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                <!-- Repeat similar modifications for other cart items -->
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Cart Summary and New Arrivals -->
      <div class="col-12 col-md-4 col-lg-3 bg-light">
        <!-- Cart Summary remains the same -->
        <?php
        // Calculate total from cart items
        $total = 0;
        foreach ($cart as $item) {
          $total += floatval($item['subtotal']);
        }

        // Shipping calculation (example: free shipping over $50)
        $shipping = ($total >= 50) ? 0 : 10; // Change 5 to your standard shipping cost

        // Final total including shipping
        $finalTotal = $total + $shipping;
        ?>

        <div class="card my-4">
          <div class="card-header">
            <h4>Purchase Summary</h4>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <span>Subtotal</span>
              <span>$</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
              <span>Shipping</span>
              <span>$</span>
            </div>
            <div class="d-flex justify-content-between mb-3 fw-bold">
              <span>Total</span>
              <span>$</span>
            </div>
            <form action="<?= base_url('payment/charge') ?>" method="post">
              <button class="btn boton w-100" type="button" id="buyButton">
              <a href="#" class="btn btn-accent w-100">Checkout</a></button>
            </form>
            <script src="https://checkout.stripe.com/checkout.js"></script>

          </div>
        </div>

        <!-- New Arrivals with Smaller Images -->
        <div class="new-arrivals">
          <h4 class="mb-3">Just so you don't miss out</h4>
          <div class="new-arrivals-container">
            <div class="row g-3">
              <div class="col-12">
                <div class="card mb-3">
                  <img src="https://unaitalianaenlacocina.es/wp-content/uploads/DSC_4438.jpg" class="card-img-top" alt="Pesto">
                  <div class="card-body">
                    <p class="text-muted small">Ingredients > Toppings & Sauces > Pesto</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-title">Pesto</h5>
                      <button class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-heart"></i>
                      </button>
                    </div>
                    <p class="card-text fw-bold">$450</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    window.onload = function() {
      updateCartSummary();
    };
    // JavaScript to handle quantity changes
    function changeQuantity(button, change) {
      const input = button.parentElement.querySelector('input');
      let currentValue = parseInt(input.value);
      let newValue = currentValue + change;

      // Ensure value stays within min and max
      newValue = Math.max(parseInt(input.min), Math.min(newValue, parseInt(input.max)));

      input.value = newValue;
    }
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- In your view file -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    buyButton.addEventListener('click', function() {
      // Get the total amount from the cart summary
      const totalElement = document.querySelector('.card-body .d-flex:nth-child(3) span:last-child');
      const totalText = totalElement.textContent.replace('$', '').trim();
      const totalAmount = parseFloat(totalText);

      // Convert to cents (Stripe requires amount in cents)
      const totalAmountInCents = Math.round(totalAmount * 100);

      const stripeHandler = StripeCheckout.configure({
        key: 'pk_test_51QR04mGDHNYxmN798hAT79jVxdb8qyOI0w6qAbF9sVwYiAvGl3qm2BzZpsXh2HTBN21z3izyCiPvNOVGNd4pJRUd0022uAUKSP',
        locale: 'auto',
        token: function(token) {
          // You can use the token to send the payment to your server
          alert('Payment Successful!');
        }
      });

      stripeHandler.open({
    name: "Checkout",
    description: "Pay for the items",
    amount: totalAmountInCents, // Use the dynamically calculated total amount in cents
    currency: 'usd',
    token: function (token) {
        // Send the token and payment information to your server
        fetch('https://ezpizza.store/order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                stripeToken: token.id, // Token ID from Stripe
                amount: totalAmountInCents,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`Payment Successful! Order ID: ${data.orderId}`);
            } else {
                alert(`Payment Failed: ${data.message}`);
            }
        })
        .catch(error => {
            console.error('Error processing payment:', error);
            alert('Payment could not be processed. Please try again.');
        });
    }
});

    });

    function changeQuantity(button, change) {
      const input = button.parentElement.querySelector('input');
      let currentValue = parseInt(input.value);
      let newValue = currentValue + change;

      // Ensure value stays within min and max
      newValue = Math.max(parseInt(input.min), Math.min(newValue, parseInt(input.max)));

      // AJAX call to update quantity
      $.ajax({
        url: '<?php echo base_url("cart/update_quantity"); ?>',
        method: 'POST',
        data: {
          id_carrito: input.getAttribute('data-id-carrito'),
          id_producto: input.getAttribute('data-id-producto'),
          cantidad: newValue
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            // Update input value
            input.value = newValue;

            // Update subtotal for this item
            const itemRow = input.closest('.card');
            const priceSpan = itemRow.querySelector('.fw-bold');
            priceSpan.innerHTML = `$${response.precio} x ${newValue} = $${response.subtotal}`;

            // Refresh entire cart summary
            updateCartSummary();
          } else {
            // Revert if update failed
            input.value = currentValue;
            alert(response.message || 'Failed to update quantity');
          }
        },
        error: function() {
          // Revert if AJAX call fails
          input.value = currentValue;
          alert('Error updating quantity');
        }
      });
    }

    function updateCartSummary() {
      // AJAX call to refresh cart summary
      $.ajax({
        url: '<?php echo base_url("cart/get_cart_summary"); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          // Update subtotal
          document.querySelector('.card-body .d-flex:nth-child(1) span:last-child').textContent =
            `$${response.subtotal.toFixed(2)}`;

          // Update shipping
          document.querySelector('.card-body .d-flex:nth-child(2) span:last-child').textContent =
            `$${response.shipping.toFixed(2)}`;

          // Update total
          document.querySelector('.card-body .d-flex:nth-child(3) span:last-child').textContent =
            `$${response.total.toFixed(2)}`;
        }
      });
    }

    function remove(productId) {
      var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
      var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

      $.ajax({
        url: '<?php echo base_url("cart/remove_item"); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
          [csrfName]: csrfHash,
          id_producto: productId // Corregido para coincidir con PHP
        },
        success: function(response) {
          if (response.status) { // Corregido para coincidir con PHP
            // Eliminar el elemento del carrito
            $('#cart-item-' + productId).fadeOut(300, function() {
              $(this).remove();
              updateCartSummary();

            });

            // Opcional: Mostrar notificación de éxito
            alert(response.message);
          } else {
            // Mostrar notificación de error
            alert(response.message);
          }
        },
        error: function() {
          // Manejo de errores generales
          alert('An error occurred. Please try again.');
        }
      });


    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  
</body>

</html>