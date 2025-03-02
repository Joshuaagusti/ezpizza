<!DOCTYPE html> 
<html lang="en">
<head>
<title>Forgot Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
   
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    
 
   
    <link rel="stylesheet" href="http://localhost/Website/assets/css/styles/forgot-password.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
     <!-- Overlay -->
     <div id="overlay" onclick="closeNav()"></div>

<!-- Side Navigation -->
<div id="mySidenav" class="side-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <!-- Personalized Greeting and User Dropdown -->
    <div class="user-profile px-4 mb-4">
        <div class="dropdown">
            <a href="#" class="dropdown-toggle d-flex align-items-center" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="opendropdown()">
                <i class="fas fa-user-circle me-2 fs-2"></i>
                <span class="username">Hi, Username</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user me-2"></i>Personal Information
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-history me-2"></i>Order History
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-truck me-2"></i>Track Orders
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Search (Mobile) -->
    <div class="search-wrapper px-4 mb-4">
        <input type="text" class="form-control" placeholder="Search">
    </div>

    <!-- Navigation Links -->
    <a href="http://localhost/Website">
        <i class="fas fa-home me-2"></i>Home
    </a>
    <a href="http://localhost/Website/productos/product_list">
        <i class="fas fa-box me-2"></i>Products
    </a>
    <a href="#">
        <i class="fas fa-envelope me-2"></i>Contact
    </a>
</div>

<!-- Additional CSS to support the dropdown -->
<style>
    .side-nav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1050;
        top: 0;
        left: 0;
        background-color: #12191f;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .side-nav .closebtn {
        position: absolute;
       transform: translateY(-70%);
        left: auto;
        font-size: 3rem;
        margin-left: 70%;
        color: #46bdbe;
        cursor: pointer;
    }

    .side-nav a {
        padding: 15px 25px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .side-nav a:hover {
        color: #f1f1f1;
    }

    #overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1040;
    }


    @media (min-width: 992px) {
        .mobile-menu-toggle {
            display: none !important;
        }
    }


    /* User Profile Dropdown Styles */
    .user-profile .dropdown-toggle {
        color: #818181;
        text-decoration: none;
        padding: 15px 25px;
        display: flex;
        align-items: center;
        transition: 0.3s;
    }

    .user-profile .dropdown-toggle:hover {
        color: #f1f1f1;
    }

    .user-profile .dropdown-menu {
        background-color: #12191f;
        border: none;
        margin: 0;
        padding: 0;
    }

    .user-profile .dropdown-item {
        color: #818181;
        padding: 15px 25px;
        transition: 0.3s;
    }

    .user-profile .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #f1f1f1;
    }

    .user-profile .dropdown-divider {
        border-top-color: rgba(255, 255, 255, 0.1);
    }
</style>
<!-- Main Navbar -->
<nav class="navbar bg-dark navbar-dark py-3 sticky-top">
    <div class="container">
        <div class="d-flex align-items-center w-100 justify-content-between">
            <!-- Logo -->
            <img src="http://localhost/Website/assets/img/Logo.svg" alt="Logo" class="navbar-brand m-0" style="height: 80px;">

            <!-- Search for Desktop -->
            <div class="search-wrapper flex-grow-1 d-none d-lg-flex align-items-center position-relative mx-4">
                <input type="text" class="form-control" placeholder="Search">
                <i class="fas fa-search position-absolute end-0 me-3 text-muted"></i>
            </div>

            <!-- Burger Menu Button (Mobile) -->
            <button class="navbar-toggler mobile-menu-toggle d-lg-none text-accent" type="button" onclick="openNav()">
                <span class="navbar-toggler-icon text-accent"></span>
            </button>

            <!-- Navigation for Desktop -->
            <div class="d-none d-lg-flex align-items-center gap-4" id="pc-nav">
                <a href="http://localhost/Website" class="nav-link">Home</a>
                <a href="http://localhost/Website/productos/product_list" class="nav-link">Products</a>
                <a href="#" class="nav-link">Contact</a>
                <a href="#" class="nav-link">
                    <i class="fas fa-heart text-accent fs-5"></i>
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-cart text-accent fs-5"></i>
                </a>

                <!-- Profile Dropdown (Desktop) -->
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user text-accent fs-5"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-user-circle me-2"></i>Personal Info
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-history me-2"></i>Order History
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-truck me-2"></i>Track Orders
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<section class="login">
    <div class="login-frame">  
            <form action="login.php" method="POST">
                <div class="login-form">
                    <h3 >Forgot your password</h3>
                            <p style = "text-align: center;">Please enter the email address you’d like your
                            password reset  information sent to</p>           
                    <div class="login-form-section" >
                        <p style = "padding-top: 64px;">Enter email address </p>
                        <div class="login-textbox">
                            <img src="http://localhost/Website/assets/img/arroba.png" alt="" id="eye-icon2" onclick="togglePasswordVisibility2()">
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                <button type="submit" class="login-button" >Request reset link </button>
                <p style="text-align: center; padding-top: 32px;"><a href="login.php">Back To Login</a></p>
                </div>
            </form>
            <p style="text-align: center; padding-top: 32px; white-space: nowrap;">© 2024 EzPizza. All Rights Reserved</p>
    </div>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
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


</body>
</html>

