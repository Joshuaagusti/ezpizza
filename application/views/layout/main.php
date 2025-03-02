<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://ezpizza.store/assets/img/favicon.png">
    <!-- Custom Navbar CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles/footer.css'); ?>">
    
    <?php 
    // Additional CSS can be added dynamically
    if (!empty($css_files)) {
        foreach ($css_files as $css) {
            echo '<link rel="stylesheet" href="' . base_url($css) . '">';
        }
    }
    ?>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
<?php 

// Get session data
$session_data = $this->session->userdata();

// Make sure $cart is properly set (if not, initialize it)
$cart = isset($cart) ? $cart : [];

// Combine the session data and cart into one array
$navbar_data = [
    'session_data' => $session_data,
    'cart' => $cart
];

$this->load->view('partials/navbar', ['session_data' => $navbar_data]); 
?>

    
    
 
        <?php echo $content; ?>
  
    
    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <?php 
    // Additional JS can be added dynamically
    if (!empty($js_files)) {
        foreach ($js_files as $js) {
            echo '<script src="' . base_url($js) . '"></script>';
        }
    }
    ?>

    
<footer>
<?php 
$session_data = $this->session->userdata();
$this->load->view('partials/footer'); 
?>



</footer>

</body>


</html>