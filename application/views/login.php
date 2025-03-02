<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
   
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    
    <link rel="stylesheet" href="https://ezpizza.store/assets/css/styles/login.css">
  <link rel="stylesheet" href="https://ezpizza.store/assets/css/product_list.css">
</head>
<body>

<section class="login">
    <div class="login-frame">  
        <form action="<?php echo base_url('login/authenticate'); ?>" method="POST">
            <div class="login-form">
                <h3>Login</h3>

                <!-- Display Error Message -->
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div class="login-form-section">
                    <p>Email or Username</p>
                    <div class="login-textbox">
                        <img src="https://ezpizza.store/assets/img/user icon register.png" alt="" style="object-fit: contain;">
                        <input type="text" id="email" name="username" placeholder="Email or Username" required>
                    </div>
                </div>              
                <div class="login-form-section">
                    <p>Password</p>
                    <div class="login-textbox login-password">
                        <img src="https://ezpizza.store/assets/img/eye-hide.png" alt="" id="eye-icon2" onclick="togglePasswordVisibility2()">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="login-forgot">
                    <p style="text-align: center;"><a href="<?php echo base_url('login/forgot_password'); ?>">Forgot Password?</a></p>
                    <div class="login-remember">
                        <input type="checkbox" style="width: 24px;">
                        <p style="text-align: center;">Remember Me</p>
                    </div>
                </div>

                <button type="submit" class="login-button">Login</button>
                <p style="text-align: center;">Don’t have an account? <a href="<?php echo base_url('register'); ?>">Register</a></p>
            </div>
        </form>
        <p>© 2024 EzPizza. All Rights Reserved</p>
    </div>
</section>


<script>
    function togglePasswordVisibility2() {
    var passwordField2 = document.getElementById('password');
    var eyeIcon2 = document.getElementById('eye-icon2');

    // Cambiar tipo de input entre 'password' y 'text'
    if (passwordField2.type === 'password') {
        passwordField2.type = 'text';  // Mostrar contraseña
        eyeIcon2.src = "https://ezpizza.store/assets/img/eye.png";  // Cambiar a ojo abierto
    } else {
        passwordField2.type = 'password';  // Ocultar contraseña
        eyeIcon2.src = "https://ezpizza.store/assets/img/eye-hide.png";  // Cambiar a ojo cerrado
    }
}


</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "280px";
        document.getElementById("overlay").style.display = "block";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("overlay").style.display = "none";
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        function openprofile() {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        }



        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownToggle.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>