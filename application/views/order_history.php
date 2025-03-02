<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }
        
        .order-status-delivery {
            color: #74D7C8;
        }
        
        .order-status-text {
            color: #12191F;
        }
        
        .order-track-button {
            background-color: #74D7C8;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        
       
    </style>
</head>
<body>
  
    <div class="container py-4">
        <section class="order-history">
            <h2 class="mb-4">Order History</h2>
            
     
            
            <?php if (!empty($orders)): ?>
    <?php foreach ($orders as $order): ?>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <!-- Display the order date -->
                <span><?= date('d F Y', strtotime($order['FechaOrden'])); ?></span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 col-md-2">
                        <!-- Display the product image -->
                        <img src="https://ezpizza.store/assets/img/products/<?= $order['ProductoImagen']; ?>" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="col-8 col-md-10 position-relative">
                        <!-- Display the order status -->
                        <h5 class="order-status-delivery"><?= ucfirst($order['EstadoOrden']); ?></h5>
                        <h6 class="order-status-text">Arrives on <?= date('F d', strtotime('+4 days', strtotime($order['FechaOrden']))); ?></h6>
                        <div>
                            <!-- Display the product name -->
                            <p class="mb-0"><?= $order['ProductoNombre']; ?></p>
                            <!-- Display the product quantity -->
                            <p class="text-muted small"><?= $order['Cantidad']; ?> Units</p>
                        </div>
                        <div class="position-absolute bottom-0 end-0">
                            <!-- Track order button -->
                            <a href="<?= base_url('productos/track') ?>" class="btn btn-accent d-none d-md-inline">Track order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No orders available.</p>
<?php endif; ?>

        </section>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>