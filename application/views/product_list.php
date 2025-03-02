<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Layout</title>

    <link rel="stylesheet" href="http://ezpizza.store/assets/css/product_list.css">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

</head>

<body>
 
    <div class="container py-4">

        <!-- Mobile Top Navigation (Add this before your existing sidebar) -->
        <div class="mobile-top-nav d-md-none">
            <div class="mobile-filters-container">
                <!-- Categories Scroll -->
                <div class="mobile-category-scroll">
                    <div class="d-flex gap-2 px-3 py-2">
                        <?php foreach ($categories as $parent_name => $parent): ?>
                            <button class="btn btn-outline-secondary category-mobile-btn"
                                onclick="handleCategoryClick(event, '<?php echo $parent['name']; ?>', true)">
                                <?php echo $parent['name']; ?>
                            </button>
                        <?php endforeach; ?>
                        <a href="<?php base_url('/productos') ?>">
                            <button class="btn btn-outline-secondary" onclick="showAllProducts()">All</button>
                        </a>
                    </div>
                </div>

                <!-- Filters Dropdown -->
                <div class="mobile-filter-dropdown">
                    <button class="btn btn-accent w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileFiltersOffcanvas">
                        <i class="fa-solid fa-filter me-2"></i>More Filters
                    </button>

                    <!-- Offcanvas Filters -->
                    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="mobileFiltersOffcanvas">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title">Filters</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- Price Filter -->
                            <div class="mb-4">
                                <h6>Price Range</h6>
                                <div class="multi-range">
                                    <input type="range" min="0" max="1000" value="0" id="mobile-lower" step="10">
                                    <input type="range" min="0" max="1000" value="1000" id="mobile-upper" step="10">
                                </div>
                                <div class="price-inputs">
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="mobile-lowerInput" value="0" min="0" max="1000">
                                    </div>
                                    <span>-</span>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="mobile-upperInput" value="1000" min="0" max="1000">
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Reviews Filter -->
                            <div class="mb-4">
                                <h6>Customer Reviews</h6>
                                <div class="star-rating">
                                    <input type="radio" id="mobile-star1" name="mobile-rating" value="1">
                                    <label for="mobile-star1" class="fas fa-star fs-5 me-1"></label>
                                    <input type="radio" id="mobile-star2" name="mobile-rating" value="2">
                                    <label for="mobile-star2" class="fas fa-star fs-5 me-1"></label>
                                    <input type="radio" id="mobile-star3" name="mobile-rating" value="3">
                                    <label for="mobile-star3" class="fas fa-star fs-5 me-1"></label>
                                    <input type="radio" id="mobile-star4" name="mobile-rating" value="4">
                                    <label for="mobile-star4" class="fas fa-star fs-5 me-1"></label>
                                    <input type="radio" id="mobile-star5" name="mobile-rating" value="5">
                                    <label for="mobile-star5" class="fas fa-star fs-5 me-1"></label>
                                    <span class="ms-2 small text-secondary">& above</span>
                                </div>
                            </div>

                            <!-- Location Filter -->
                            <div class="mb-4">
                                <h6>Location</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mobile-location" id="mobile-localRadio" checked>
                                    <label class="form-check-label" for="mobile-localRadio">Local</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mobile-location" id="mobile-internationalRadio">
                                    <label class="form-check-label" for="mobile-internationalRadio">International</label>
                                </div>
                            </div>

                            <!-- Fast Shipping Toggle -->
                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <span>Fast Shipping</span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="mobile-fastShippingSwitch">
                                </div>
                            </div>

                            <button class="btn btn-accent rounded-3 px-3 w-100 apply-filters">Apply Filters</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hide desktop sidebar on mobile -->

        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-3 d-none d-md-block" style="border-right: 1px solid #cccccc;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fs-4 fw-semibold m-0">Filters</h2>
                    <i class="fa-solid fa-filter"></i>
                </div>

                <div class="mb-4">
                    <h3 class="fs-5 fw-semibold mb-3">Categories</h3>
                    <ul class="list-unstyled">
                        <?php foreach ($categories as $parent_name => $parent): ?>
                            <li class="mb-2">
                                <a href="#"
                                    class="d-flex align-items-center text-secondary category-link category-toggle"
                                    onclick="handleCategoryClick(event, '<?php echo $parent['name']; ?>', true)">
                                    <span class="me-2 toggle-icon">+</span>
                                    <?php echo $parent['name']; ?>
                                </a>
                                <?php if (!empty($parent['children'])): ?>
                                    <ul class="list-unstyled ms-4 d-none child-categories" id="category-<?php echo $parent_name; ?>">
                                        <?php foreach ($parent['children'] as $child): ?>
                                            <li>
                                                <a href="#"
                                                    class="text-secondary category-link"
                                                    onclick="handleCategoryClick(event, '<?php echo $child['name']; ?>', false)">
                                                    <?php echo $child['name']; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>

                        <?php endforeach; ?>
                        <li class="mb-2">
                            <a href="#"
                                class="text-secondary category-link fw-bold" onclick="showAllProducts()">
                                All Products
                            </a>
                    </ul>
                </div>


                <!-- Other Filters -->
                <div class="d-flex flex-column gap-3">
                    <!-- Price Filter -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center filter-header" data-filter="price">
                            <span class="fw-semibold">Price</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="filter-content" id="price-filter">
                            <div class="multi-range">
                                <input type="range" min="0" max="1000" value="0" id="lower" step="10">
                                <input type="range" min="0" max="1000" value="1000" id="upper" step="10">
                            </div>
                            <div class="price-inputs">
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="lowerInput" value="0" min="0" max="1000">
                                </div>
                                <span>-</span>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="upperInput" value="1000" min="0" max="1000">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Customer Reviews Filter -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center filter-header" data-filter="reviews">
                            <span class="fw-semibold">Customer Reviews</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="filter-content" id="reviews-filter">
                            <div class="star-rating">
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1" class="fas fa-star fs-5 me-1"></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2" class="fas fa-star fs-5 me-1"></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3" class="fas fa-star fs-5 me-1"></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4" class="fas fa-star fs-5 me-1"></label>
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5" class="fas fa-star fs-5 me-1"></label>
                                <span class="ms-2 small text-secondary">& above</span>
                            </div>

                        </div>
                    </div>

                    <!-- Location Filter -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center filter-header" data-filter="location">
                            <span class="fw-semibold">Location</span>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="filter-content" id="location-filter">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="location" id="localRadio" checked>
                                <label class="form-check-label" for="localRadio">
                                    Local
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="location" id="internationalRadio">
                                <label class="form-check-label" for="internationalRadio">
                                    International
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Fast Shipping Toggle -->
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Fast Shipping</span>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="fastShippingSwitch">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-accent rounded-3 px-3 w-100 apply-filters">Apply Filters</button>
                    </div>
                </div>
            </div>




            <div class="col-sm-12 col-md-9 col-lg-9" id="products_columns">
                <h1 class="fs-4 fw-semibold mb-4" id="Product_path_header">All Products</h1>

                <!-- Products Grid -->
                <div class="row g-4">
                    <?php foreach ($products as $product): ?>

                        <div class="col-sm-12 col-md-6 col-lg-4">
    <a href="<?= base_url('productos/details/' . $product->id_producto) ?>">
        <div class="card <?php echo $product->stock <= 0 ? 'border-danger' : ''; ?>" 
             data-rating="<?php echo $product->promedio_calificacion; ?>" 
             data-category-son="<?php echo $product->categoria_hija; ?>" 
             data-category-dad="<?php echo $product->categoria_padre; ?>">

            <img src="<?php echo base_url('/assets/img/products/' . $product->url_imagen); ?>" 
                 class="card-img-top product-image <?php echo $product->stock <= 0 ? 'opacity-50' : ''; ?>" 
                 alt="Product">

            <div class="card-body p-1">
                <h3 class="fs-5 fw-semibold mb-2"><?php echo $product->nombre; ?></h3>
                
                <!-- Out of Stock Label -->
                <?php if ($product->stock <= 0): ?>
                    <div class="alert alert-danger p-1 mb-1 text-center" role="alert">
                        Out of Stock
                    </div>
                <?php endif; ?>

                <div class="d-flex gap-2 align-items-center mb-2">
                    <span class="text-decoration-line-through text-danger">$<?php echo number_format($product->precio, 2); ?>/lb</span>
                    <span class="fw-bold">$<?php echo number_format($product->precio - ($product->precio * 0.2), 2); ?>/lb</span>
                </div>
                <p class="text-secondary small mb-3"><?php echo $product->descripcion; ?></p>

                <!-- Star Rating Section -->
                <div class="d-flex align-items-center mb-3">
                    <span class="ms-2 small text-secondary"><?php echo $product->promedio_calificacion; ?></span>
                    <div class="d-flex gap-1">
                        <?php
                        $rating = $product->promedio_calificacion;
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < $rating) {
                                echo '<img src="http://ezpizza.store/assets/img/stars.svg" alt="star">';
                            } else {
                                echo '<img src="http://ezpizza.store/assets/img/empty-star.svg" alt="empty star">';
                            }
                        }
                        ?>
                    </div>
                    <span class="ms-2 small text-secondary">(<?php echo $product->numero_testimonios; ?>)</span>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Free Delivery Text -->
                    <span class="text-secondary small d-flex align-items-center">
                        <i class="fas fa-truck me-1"></i> Free delivery
                    </span>

                    <!-- Add to Cart Button -->
                    <?php if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']): ?>
                        <a class="add-cart <?php echo $product->stock <= 0 ? 'disabled' : ''; ?>" 
                           <?php echo $product->stock <= 0 ? 'aria-disabled="true" onclick="return false;"' : ''; ?> 
                           data-product-id="<?= $product->id_producto ?>">
                            <button 
                                style="display: inherit; 
                                       background: none; 
                                       border: none;" 
                                class="btn btn-accent rounded-3 d-flex align-items-center px-3 text-decoration-none <?php echo $product->stock <= 0 ? 'disabled' : ''; ?>" 
                                data-product-id="<?= $product->id_producto ?>"
                                <?php echo $product->stock <= 0 ? 'disabled' : ''; ?>>
                                <i class="fas fa-shopping-cart me-2"></i>
                                Add To Cart
                            </button>
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" 
                           class="btn btn-accent rounded-3 d-flex align-items-center px-3 text-decoration-none <?php echo $product->stock <= 0 ? 'disabled' : ''; ?>">
                            <i class="fas fa-shopping-cart me-2"></i>
                            Add To Cart
                        </a>
                    <?php endif; ?>
                
            </div>
        </div>
    </a>
</div>

                </div>
            <?php endforeach; ?>
            </div>
        </div>

    </div>
    </div>

    </div>
    </div>
    </div>

    <!-- Pagination -->
    <nav class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" onclick="pagination_previous()"><i class="fas fa-chevron-left me-1"></i>Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">20</a></li>
            <li class="page-item">
                <a class="page-link" onclick="pagination_next()">Next<i class="fas fa-chevron-right ms-1"></i></a>
            </li>
        </ul>
    </nav>
    </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        // Price range slider
        const lower = document.getElementById('lower');
        const upper = document.getElementById('upper');
        const lowerInput = document.getElementById('lowerInput');
        const upperInput = document.getElementById('upperInput');

        function updateRange(e) {
            const lowerVal = parseInt(lower.value);
            const upperVal = parseInt(upper.value);

            if (e.target === lower) {
                if (lowerVal > upperVal) {
                    lower.value = upperVal;
                    lowerInput.value = upperVal;
                } else {
                    lowerInput.value = lowerVal;
                }
            }

            if (e.target === upper) {
                if (upperVal < lowerVal) {
                    upper.value = lowerVal;
                    upperInput.value = lowerVal;
                } else {
                    upperInput.value = upperVal;
                }
            }
        }

        function updateInput(e) {
            const lowerVal = parseInt(lowerInput.value);
            const upperVal = parseInt(upperInput.value);

            if (e.target === lowerInput) {
                if (lowerVal > upperVal) {
                    lowerInput.value = upperVal;
                    lower.value = upperVal;
                } else {
                    lower.value = lowerVal;
                }
            }

            if (e.target === upperInput) {
                if (upperVal < lowerVal) {
                    upperInput.value = lowerVal;
                    upper.value = lowerVal;
                } else {
                    upper.value = upperVal;
                }
            }
        }

        lower.addEventListener('input', updateRange);
        upper.addEventListener('input', updateRange);
        lowerInput.addEventListener('input', updateInput);
        upperInput.addEventListener('input', updateInput);

        // Star rating
        const starLabels = document.querySelectorAll('.star-rating label');

        starLabels.forEach((label, index) => {
            label.addEventListener('mouseenter', function() {
                // Fill all stars up to and including the current one
                for (let i = 0; i <= index; i++) {
                    starLabels[i].style.color = '#ffd700';
                }
                // Clear all stars after the current one
                for (let i = index + 1; i < starLabels.length; i++) {
                    starLabels[i].style.color = '#ddd';
                }
            });
        });

        document.querySelector('.star-rating').addEventListener('mouseleave', function() {
            const checkedRadio = this.querySelector('input[type="radio"]:checked');
            if (!checkedRadio) {
                starLabels.forEach(label => label.style.color = '#ddd');
            } else {
                const checkedIndex = parseInt(checkedRadio.value) - 1;
                starLabels.forEach((star, i) => {
                    star.style.color = i <= checkedIndex ? '#ffd700' : '#ddd';
                });
            }
        });

        // Filter headers click handling
        const filterHeaders = document.querySelectorAll('.filter-header');
        filterHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const filterId = this.dataset.filter;
                const filterContent = document.getElementById(`${filterId}-filter`);
                const icon = this.querySelector('i');

                filterContent.classList.toggle('active');

                if (filterContent.classList.contains('active')) {
                    icon.classList.replace('fa-chevron-right', 'fa-chevron-down');
                } else {
                    icon.classList.replace('fa-chevron-down', 'fa-chevron-right');
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Price range slider configurations for both desktop and mobile
        const sliderConfigs = [{
                lower: document.getElementById('lower'),
                upper: document.getElementById('upper'),
                lowerInput: document.getElementById('lowerInput'),
                upperInput: document.getElementById('upperInput')
            },
            {
                lower: document.getElementById('mobile-lower'),
                upper: document.getElementById('mobile-upper'),
                lowerInput: document.getElementById('mobile-lowerInput'),
                upperInput: document.getElementById('mobile-upperInput')
            }
        ];

        // Function to set up event listeners for a single slider configuration
        function setupSliderListeners(config) {
            const {
                lower,
                upper,
                lowerInput,
                upperInput
            } = config;

            // Function to synchronize slider and input values
            function updateInputsFromSlider() {
                lowerInput.value = lower.value;
                upperInput.value = upper.value;
            }

            function updateSlidersFromInput() {
                lower.value = lowerInput.value;
                upper.value = upperInput.value;
            }

            function validateValues() {
                const lowerVal = parseInt(lower.value);
                const upperVal = parseInt(upper.value);
                if (lowerVal > upperVal) {
                    lower.value = upperVal;
                    lowerInput.value = upperVal;
                }
            }

            // Add event listeners to sync sliders and inputs
            lower.addEventListener('input', () => {
                validateValues();
                updateInputsFromSlider();
            });

            upper.addEventListener('input', () => {
                validateValues();
                updateInputsFromSlider();
            });

            lowerInput.addEventListener('change', () => {
                validateValues();
                updateSlidersFromInput();
            });

            upperInput.addEventListener('change', () => {
                validateValues();
                updateSlidersFromInput();
            });
        }

        // Apply slider setup to each configuration
        sliderConfigs.forEach(setupSliderListeners);

        // Function to filter products dynamically by price and rating
        function filterProducts() {
            const minPrice = document.getElementById('lower').value;
            const maxPrice = document.getElementById('upper').value;
            const category = document.querySelector('.category-toggle.active')?.dataset.category;
            const state = document.querySelector('input[name="location"]:checked')?.id;
            const rating = document.querySelector('input[name="rating"]:checked')?.value;
            const fastShipping = document.getElementById('fastShippingSwitch').checked ? 1 : 0;

            let url = new URL(window.location.href);
            url.searchParams.set('min_price', minPrice);
            url.searchParams.set('max_price', maxPrice);

            if (category) {
                url.searchParams.set('category_id', category);
            }



            if (rating) {
                url.searchParams.set('rating_min', rating);
            }

            if (fastShipping) {
                url.searchParams.set('fast_shipping', fastShipping);
            }

            window.location.href = url.href;
        }

        // Add event listener to all Apply Filters buttons
        const applyFiltersButtons = document.querySelectorAll('.apply-filters');
        applyFiltersButtons.forEach(button => {
            button.addEventListener('click', filterProducts);
        });
       
    });
    function pagination_next(){
    let url = new URL(window.location.href);
    let currentOffset = parseInt(url.searchParams.get('offset')) || 0; // Get current offset, default to 0 if not set
    let nextOffset = currentOffset + 20; // Increment by 15 for the next page

    url.searchParams.set('offset', nextOffset);
    window.location.href = url.href; // Redirect to the new URL with updated offset
}

function pagination_previous() {
    let url = new URL(window.location.href);
    let currentOffset = parseInt(url.searchParams.get('offset')) || 0; // Get current offset, default to 0 if not set
    let previousOffset = Math.max(0, currentOffset - 20); // Decrement by 15 but ensure offset doesn't go below 0

    url.searchParams.set('offset', previousOffset);
    window.location.href = url.href; // Redirect to the new URL with updated offset
}

</script>

<script>
    //CATEGORIE TREE
    document.querySelectorAll('.category-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();

            // Find the sibling child category list
            const childList = this.nextElementSibling;

            if (childList && childList.classList.contains('child-categories')) {
                // Toggle the visibility of the child categories
                childList.classList.toggle('d-none');

                // Find and update the toggle icon
                const toggleIcon = this.querySelector('.toggle-icon');
                if (childList.classList.contains('d-none')) {
                    toggleIcon.textContent = '+';
                } else {
                    toggleIcon.textContent = '-';
                }
            }
        });
    });

    function showAllProducts() {
        // Reset filter values
        document.getElementById('lower').value = 0;
        document.getElementById('upper').value = 1000;
        document.getElementById('lowerInput').value = 0;
        document.getElementById('upperInput').value = 1000;

        // Reset category selection (optional, based on your design)
        const categoryLinks = document.querySelectorAll('.category-link');
        categoryLinks.forEach(link => {
            link.classList.remove('active'); // Deselect all categories
        });

        // Reset rating selection (optional, based on your design)
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        ratingInputs.forEach(input => {
            input.checked = false; // Uncheck all star ratings
        });

        // Reset location filter (optional, based on your design)
        document.getElementById('localRadio').checked = true; // Reset to "Local"

        // Reset fast shipping toggle
        document.getElementById('fastShippingSwitch').checked = false;

        // Reset the URL search parameters
        let url = new URL(window.location.href);
        url.searchParams.delete('min_price');
        url.searchParams.delete('max_price');
        url.searchParams.delete('category_id');
        url.searchParams.delete('state');
        url.searchParams.delete('rating_min');
        url.searchParams.delete('fast_shipping');

        // Reload the page with reset filters
        window.location.href = url.href;
    }

    // Add event listener for the "Show all" button
    const showAllButton = document.querySelector('.show-all');
    if (showAllButton) {
        showAllButton.addEventListener('click', showAllProducts);
    }
    // Function to handle category clicks
    function handleCategoryClick(event, categoryName, isParent) {
        event.preventDefault();

        // Remove 'selected-category' class from all category links
        const allCategoryLinks = document.querySelectorAll('.category-link');
        allCategoryLinks.forEach(link => {
            link.classList.remove('fw-bold');
            link.classList.remove('text-primary');
        });

        // Add bold to the clicked category
        event.currentTarget.classList.add('fw-bold');
        event.currentTarget.classList.add('text-primary');

        if (isParent) {
            // Close all other open child category lists
            const allParentLinks = document.querySelectorAll('.category-toggle');
            allParentLinks.forEach(parentLink => {
                // Find the child list and toggle icon for each parent
                const parentName = parentLink.textContent.trim();
                const childList = document.getElementById(`category-${parentName}`);
                const toggleIcon = parentLink.querySelector('.toggle-icon');

                // Reset other categories
                if (parentName !== categoryName) {
                    if (childList) {
                        childList.classList.add('d-none');
                    }
                    if (toggleIcon) {
                        toggleIcon.textContent = '+';
                    }
                }
            });

            // Toggle the clicked category's child list
            const childCategoryList = document.getElementById(`category-${categoryName}`);
            const toggleIcon = event.currentTarget.querySelector('.toggle-icon');

            if (childCategoryList) {
                childCategoryList.classList.toggle('d-none');

                // Update toggle icon
                toggleIcon.textContent = childCategoryList.classList.contains('d-none') ? '+' : '-';
            }
            return;
        }

        // Filter products for child categories
        const products = document.querySelectorAll('.card');
        const pathHeader = document.getElementById("Product_path_header");

        products.forEach(product => {
            const productCategory = product.getAttribute('data-category-son');
            const productCategoryParent = product.getAttribute('data-category-dad');

            if (productCategory === categoryName) {
                pathHeader.textContent = `${productCategoryParent} > ${categoryName}`;
                product.parentElement.style.display = 'block';
            } else {
                product.parentElement.style.display = 'none';
            }
        });




    }
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');
    const min = urlParams.get('min_price');
    const max = urlParams.get('max_price');

    if (min) {
        document.getElementById('lower').value = min;
        document.getElementById('lowerInput').value = min;
        document.getElementById('upper').value = max;
        document.getElementById('upperInput').value = max;
    }

    if (query) {
        console.log('Query parameter found:', query);
        document.getElementById("Product_path_header").innerHTML = "Search Results For: " + query;

    }
    
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  
  $(document).ready(function() {
    $('.add-cart').on('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const productId = $(this).data('product-id');
        const quantity = 1;

        $.ajax({
            url: '<?= base_url("cart/add") ?>', 
            method: 'POST',
            data: { id_producto: productId, cantidad: quantity },
            dataType: 'json', // Expect JSON response
            success: function(response) {
                if(response.status === 'success') {
                    alert('Product added to cart!');
                    reloadPage()
                    
                } else {
                    alert(response.message || 'There was an error adding the product.');
                    
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('There was an error adding the product.');
            }
        });
    });
 
});
function reloadPage() {
    $.ajax({
        url: window.location.href,  // Get the current URL of the page
        type: 'GET',
        success: function(response) {
            // If you want to make sure everything gets reloaded:
            window.location.href = window.location.href;  // Trigger a full reload
        }
    });
}

</script>



</html>
