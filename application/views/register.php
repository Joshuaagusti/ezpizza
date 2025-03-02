<!DOCTYPE html> 
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
   
    
    <link rel="stylesheet" href="http://ezpizza.store/assets/css/styles/register.css">

    
 
  
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    
<section class="register ">
    <div class="register-frame">  
    <form action="http://ezpizza.store/register/aunthenticate" method="POST">
                <div class="register-form">
                    <h3>Create account</h3>
                    <p style="line-height: 24px;">Please enter your details <br></p>
                    
                    <div class="register-form-double-section">
                        <div class="register-form-section" >
                            <p>Full Name</p>
                            <div class="register-textbox">
                                <img src="http://ezpizza.store/assets/img/user icon register.png" alt="">
                                <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" required>
                                <?php echo form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="register-form-section" >
                            <p>Username</p>
                            <div class="register-textbox">
                                <img src="http://ezpizza.store/assets/img/user icon register.png" alt="">
                                <input type="text" id="username" name="username" placeholder="Enter username" required>
                                <?php echo form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="register-form-double-section">
                        <div class="register-form-section" >
                            <p>Phone number</p>
                            <div class="register-textbox">
                                <img src="http://ezpizza.store/assets/img/phone icon register.png" alt="">
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                                <?php echo form_error('phone', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="register-form-section" >
                            <p>Your email</p>
                            <div class="register-textbox">
                                <img src="http://ezpizza.store/assets/img/mail icon register.png" alt="">
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                <div class="register-form-section">
                    <p>Direction</p>
                    <div class="register-textbox">
                        <img src="http://ezpizza.store/assets/img/direction icon.png" alt="">
                        <input type="text" id="direction" name="direction" placeholder="Enter your Direction" required>
                        <?php echo form_error('direction', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="register-form-double-section">
                    <div class="register-form-section" >
                        <p>Password</p>
                        <div class="register-textbox register-password">
                            <img src="http://ezpizza.store/assets/img/eye.png" alt="" id="eye-icon2" onclick="togglePasswordVisibility2()">
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="register-form-section" >
                        <p>Repeat Password</p>
                        <div class="register-textbox register-password">
                            <img src="http://ezpizza.store/assets/img/eye-hide.png" alt="" id="eye-icon" onclick="togglePasswordVisibility()">
                            <input type="password" id="repeat-password" name="repeat_password" placeholder="Repeat password" required>
                            <?php echo form_error('repeat_password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="register-button">Register</button>
                <p style="text-align: center;">Already have an account? <a href="login">Login</a></p>
                </div>
            </form>
            <p>© 2024 EzPizza. All Rights Reserved</p>
    </div>
</section>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('repeat-password');
        var eyeIcon = document.getElementById('eye-icon');

        // Cambiar tipo de input entre 'password' y 'text'
        if (passwordField.type === 'password') {
            passwordField.type = 'text';  // Mostrar contraseña
            eyeIcon.src = "http://ezpizza.store/assets/img/eye register.png";  // Cambiar a ojo abierto
        } else {
            passwordField.type = 'password';  // Ocultar contraseña
            eyeIcon.src = "http://ezpizza.store/assets/img/eye hide register.png";  // Cambiar a ojo cerrado
        }
    }

    function togglePasswordVisibility2() {
    var passwordField2 = document.getElementById('password');
    var eyeIcon2 = document.getElementById('eye-icon2');

    // Cambiar tipo de input entre 'password' y 'text'
    if (passwordField2.type === 'password') {
        passwordField2.type = 'text';  // Mostrar contraseña
        eyeIcon2.src = "http://ezpizza.store/assets/img/eye.png";  // Cambiar a ojo abierto
    } else {
        passwordField2.type = 'password';  // Ocultar contraseña
        eyeIcon2.src = "http://ezpizza.store/assets/img/eye-hide.png";  // Cambiar a ojo cerrado
    }
}


</script>




</body>
</html>




