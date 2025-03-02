<!-- File: application/views/partials/navbar.php -->
<nav class="navbar  navbar-dark py-3 sticky-top" style="background-color: #12191f;">
    <div class="container">
        <div class="d-flex align-items-center w-100 justify-content-between">
            <!-- Logo -->
            <a href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/Logo.svg') ?>" alt="Logo" class="navbar-brand m-0" style="height: 80px;">
            </a>
            <!-- Search for Desktop -->
            <div class="search-wrapper flex-grow-1 d-none d-lg-flex align-items-center position-relative mx-4">
                <input type="text" class="form-control" placeholder="Search">
                <i class="fas fa-search position-absolute end-0 me-3 text-muted"></i>
                <div class="dropdown-results"></div>
            </div>

            <!-- Burger Menu Button (Mobile) -->
            <button class="navbar-toggler mobile-menu-toggle d-lg-none text-accent" type="button" onclick="openNav()">
                <span class="navbar-toggler-icon text-accent"></span>
            </button>

            <!-- Navigation for Desktop -->
            <div class="d-none d-lg-flex align-items-center gap-4" id="pc-nav">

                <a href="<?= base_url('productos/product_list') ?>" class="nav-link">Products</a>
                <a href="<?= base_url('contact') ?>" class="nav-link">Contact</a>
                <a href="#" class="nav-link">
                    <i class="fas fa-heart  fs-5"></i>
                </a>
                <a href="<?php echo base_url('productos/mycart') ?>" class="nav-link">
                    <i class="fas fa-shopping-cart fs-5" id="cart-count">
                        <?php echo isset($cart) ? count($cart) : ""; ?>
                    </i>
                </a>


                <!-- Profile Dropdown (Desktop) -->
                <div class="dropdown">
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center justify-content-end"
                            id="profileDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php if (!empty($this->session->userdata('profile_pic'))): ?>
                                <img src="<?= product_image_url("/pfp/" . $this->session->userdata('profile_pic')) ?>"
                                    alt="Profile Picture"
                                    class="rounded-circle"
                                    style="width: 3rem; height: 3rem; border: 2px solid white;">
                            <?php else: ?>
                                <i class="fas fa-user-circle" style="font-size: 3rem;"></i>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/edituser') ?>">
                                    <i class="fas fa-user me-2"></i>Personal Info
                                </a></li>
                            <li><a class="dropdown-item" href="<?= base_url('order_history') ?>">
                                    <i class="fas fa-history me-2"></i>Order History
                                </a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('login/logout') ?>">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a></li>

                            <!-- Only show the admin link if the user is an admin -->
                            <?php if ($this->session->userdata('admin') == 1): ?>
                                <li><a class="dropdown-item" href="<?= base_url('admin/overview') ?>">
                                        <i class="fas fa-user me-2"></i>Admin
                                    </a></li>
                            <?php endif; ?>
                        </ul>

                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" class="btn btn-accent rounded d-flex align-items-center px-3 text-decoration-none">
                            Login
                        </a>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
</nav>

<!-- Side Navigation (Mobile) -->
<div id="mySidenav" class="side-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!-- Personalized Greeting and User Dropdown -->
    <div class="user-profile px-4 mb-2">
        <div class="dropdown">
            <?php if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']): ?>
                <a href="#" class="dropdown-toggle d-flex flex-column align-items-center w-100" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (!empty($this->session->userdata['profile_pic'])): ?>
                        <img src="<?php
                                    echo product_image_url("/pfp/" . trim($this->session->userdata('profile_pic'), "'"));
                                    ?>" alt="Profile Picture"

                            alt="Profile Picture" class="rounded-circle" style="width: 4rem; height: 4rem; border: 2px solid white;">
                    <?php else: ?>
                        <i class="fas fa-user-circle" style="font-size: 3rem;"></i>
                    <?php endif; ?>
                    <div class="d-flex align-items-center justify-content-center w-100" style="margin-top: 8px;">
                        <span class="username d-flex align-items-center">Hi, <?= $this->session->userdata['nombre_usuario'] ?></span>
                        <i class="fa-solid fa-caret-down" style="margin-left: 5%;"></i>
                    </div>

                    </span>
                </a>
                <ul class="dropdown-menu w-100" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="<?= base_url('/edituser') ?>">
                            <i class="fas fa-user me-2"></i>Personal Information
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-history me-2"></i>Order History
                        </a>
                    </li>



                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </li>
                </ul>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="d-flex align-items-center justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle me-2 fs-2"></i>
                        <span class="username">Login</span>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </div>


    <!-- Search (Mobile) -->
    <div class="search-wrapper px-4 mb-4">
        <input type="text" class="form-control" placeholder="Search">
        <div class="dropdown-results"></div>
    </div>

    <!-- Navigation Links -->
    <a href="<?php echo base_url('productos/mycart') ?>">
        <i class="fas fa-shopping-cart me-2"></i>Cart
    </a>
    <a href="#">
        <i class="fas fa-heart me-2"></i>Favorites
    </a>
    <a href="<?= base_url() ?>">
        <i class="fas fa-home me-2"></i>Home
    </a>
    <a href="<?= base_url('productos/product_list') ?>">
        <i class="fas fa-box me-2"></i>Products
    </a>
    <a href="<?= base_url('contact') ?>">
        <i class="fas fa-envelope me-2"></i>Contact
    </a>

</div>

<!-- Overlay -->
<div id="overlay" onclick="closeNav()"></div>

<!-- JavaScript for Mobile Menu Toggle -->
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
            console.log()
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInputs = document.querySelectorAll('.search-wrapper input');
        const dropdownContainers = document.querySelectorAll('.search-wrapper .dropdown-results');

        searchInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                const query = this.value;
                const dropdownContainer = dropdownContainers[index];

                if (query.length > 2) {
                    fetch(`<?= base_url('productos/search_products'); ?>?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(products => {
                            dropdownContainer.innerHTML = '';

                            if (products.length > 0) {
                                dropdownContainer.style.display = 'block';

                                products.forEach(product => {
                                    const result = document.createElement('div');
                                    result.classList.add('dropdownsearch-item');
                                    result.innerHTML = `
                                    <img src="https://ezpizza.store/assets/img/products/${product.url_imagen}" 
                                         alt="${product.nombre}" 
                                         style="width: 40px; height: 40px; margin-right: 10px; object-fit: cover;">
                                    <div>
                                        <strong>${product.nombre}</strong>
                                        <br>
                                        <small>${product.categoria_padre}</small>
                                    </div>
                                `;

                                    result.onclick = () => {
                                        window.location.href = `<?= base_url('productos/details/'); ?>${product.id_producto}`;
                                    };

                                    dropdownContainer.appendChild(result);
                                });
                            } else {
                                dropdownContainer.style.display = 'none';
                            }
                        })
                        .catch(error => {
                            console.error('Search error:', error);
                            dropdownContainer.style.display = 'none';
                        });
                } else {
                    dropdownContainer.style.display = 'none';
                }
            });

            // Enter key handler remains the same
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const query = this.value;
                    window.location.href = `<?= base_url('productos/product_list'); ?>?query=${encodeURIComponent(query)}`;
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdowns = document.querySelectorAll('.dropdown-results');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(e.target) && !e.target.closest('.search-wrapper')) {
                    dropdown.style.display = 'none';
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>