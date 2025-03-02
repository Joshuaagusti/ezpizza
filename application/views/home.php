<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop in Minutes</title>
  
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home.css')?>">    
</head>
<body>
    <style>
        
        a{
            text-decoration:none !important;
        }
        
    </style>
    
    <div class="container-fluid-body text-center section-background">
        <div class="overlay"></div> 
        <div class="Contectenido">
          <div class="col-md-6 col-lg-8 content">
            <h1>Pizza Making Made<span class="highlight"> Ez</span></h1>
            <h3 class="Allyouneed">All you need in one place</h3>
            <a href="http://ezpizza.store/productos/product_list" class="btn btn-custom">
              Get Started
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none" class="arrow">
                <path d="M16.0972 9.63149C16.3552 9.33093 16.5 8.9241 16.5 8.5C16.5 8.0759 16.3552 7.66907 16.0972 7.36851L10.5796 0.968679C10.4515 0.82009 10.2994 0.702222 10.132 0.621806C9.96465 0.54139 9.78525 0.5 9.60408 0.5C9.23819 0.5 8.88729 0.668589 8.62856 0.968679C8.36984 1.26877 8.22449 1.67578 8.22449 2.10017C8.22449 2.52456 8.36984 2.93157 8.62856 3.23166L11.7913 6.90004H1.87941C1.51356 6.90004 1.16271 7.06861 0.904017 7.36866C0.645329 7.66871 0.5 8.07567 0.5 8.5C0.5 8.92434 0.645329 9.33129 0.904017 9.63134C1.16271 9.93139 1.51356 10.1 1.87941 10.1H11.7913L8.62856 13.7683C8.50046 13.9169 8.39884 14.0933 8.32951 14.2875C8.26018 14.4816 8.22449 14.6897 8.22449 14.8998C8.22449 15.11 8.26018 15.318 8.32951 15.5122C8.39884 15.7063 8.50046 15.8827 8.62856 16.0313C8.75667 16.1799 8.90875 16.2978 9.07613 16.3782C9.24351 16.4586 9.42291 16.5 9.60408 16.5C9.78525 16.5 9.96465 16.4586 10.132 16.3782C10.2994 16.2978 10.4515 16.1799 10.5796 16.0313L16.0972 9.63149Z" fill="#12191F"/>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- SECTION How-Ez -->
      <section class="how-ez-section  align-items-center">
        <div class="container-how-ez">
          <h2 class="how-ez-title ">How <span>Ez?</span></h2>
          <div class="row mt-4 justify-content-center text-center">
            <div class="col-md-3 mb-1">
              <div class="how-ez-card">
                <div class="how-ez-icon">
                  <img src="http://ezpizza.store/assets/img/home/iconamoon_delivery-fill.svg" alt="Same-Day Delivery" width="60">
                </div>
                <h3 class="how-ez-card-title">Same-Day Delivery</h3>
                <p class="how-ez-card-text">We offer a TURBO delivery option who want to make pizza Ez and fast.</p>
              </div>
            </div>
            <div class="col-md-3 mb-1">
              <div class="how-ez-card">
                <div class="how-ez-icon">
                  <img src="http://ezpizza.store/assets/img/home/icon-park-outline_tomato.svg" alt="Premium Quality" width="60">
                </div>
                <h3 class="how-ez-card-title">Premium Quality</h3>
                <p class="how-ez-card-text">When you buy from Ez Pizza, you get the best ingredients in the market. </p>
              </div>
            </div>
            <div class="col-md-3 mb-1">
              <div class="how-ez-card">
                <div class="how-ez-icon">
                  <img src="http://ezpizza.store/assets/img/home/mingcute_tool-fill.svg" alt="Customized Solutions" width="60">
                </div>
                <h3 class="how-ez-card-title">Customized Solutions</h3>
                <p class="how-ez-card-text">Customer service and implementation of payment and shipping solutions.   </p>
              </div>
            </div>
          </div>
        </div>
    </section>

  <!-- SECTION POPULAR y NEW ARRIVALS  -->
<section class="scroll-section">
    <div class="Container-Popular-NewArrivals">

        <div class="Popular-Layout">
            <h2 class="section-title">Popular</h2>
            <div class="scroll-container">
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/tomato.jpeg" alt="Tomato" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Tomato</p>
                    <div class="item-header">
                        <h3 class="item-title">Tomato</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$420</p>
                </div>
                
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/rollingpin.jpeg"  alt="Rolling Pin" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Rolling</p>
                    <div class="item-header">
                        <h3 class="item-title">Rolling pin</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$150</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Cutter</p>
                    <div class="item-header">
                        <h3 class="item-title">Cutter</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$320.99</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
                    <p class="item-category">Ingredients > Bases > Dough</p>
                    <div class="item-header">
                        <h3 class="item-title">Dough Pack</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$150</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
                    <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
                    <div class="item-header">
                        <h3 class="item-title">Large Pizza Box</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$300.99</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/tomato.jpeg" alt="Tomato" class="item-image">
                    <p class="item-category">Ingredients > Toppings > Tomato</p>
                    <div class="item-header">
                        <h3 class="item-title">Tomato</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$420</p>
                </div>
                
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/rollingpin.jpeg"  alt="Rolling Pin" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Rolling</p>
                    <div class="item-header">
                        <h3 class="item-title">Rolling pin</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$150</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Cutter</p>
                    <div class="item-header">
                        <h3 class="item-title">Cutter</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$320.99</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
                    <p class="item-category">Ingredients > Bases > Dough</p>
                    <div class="item-header">
                        <h3 class="item-title">Dough Pack</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$150</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
                    <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
                    <div class="item-header">
                        <h3 class="item-title">Large Pizza Box</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$300.99</p>
                </div>
            </div>
        </div>

        <div class="New-Arrivals-Layoud">
            <h2 class="section-title">New Arrivals</h2>
            <div class="scroll-container">

                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/pesto.jpeg" alt="Tomato" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Pesto</p>
                    <div class="item-header">
                        <h3 class="item-title">Pesto</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$450</p>
                </div>
                
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/artichokes.jpeg" alt="Rolling Pin" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Artichokes</p>
                    <div class="item-header">
                        <h3 class="item-title">Artichokes</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$180</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/slidebox.jpeg" alt="Cutter" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Cutter</p>
                    <div class="item-header">
                        <h3 class="item-title">Cutter</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$320.99</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/piedastruffles.jpeg" alt="Dough Pack" class="item-image">
                    <p class="item-category">Boxes>Pizza Boxes>Pizza Slice Box</p>
                    <div class="item-header">
                        <h3 class="item-title">Pizza Slice Box</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$70</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/cardboard.jpeg" alt="Large Pizza Box" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Truffles</p>
                    <div class="item-header">
                        <h3 class="item-title">Truffles</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$999</p>
                </div>

               <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/pesto.jpeg" alt="Tomato" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Pesto</p>
                    <div class="item-header">
                        <h3 class="item-title">Pesto</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$450</p>
                </div>
                
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/artichokes.jpeg" alt="Rolling Pin" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Artichokes</p>
                    <div class="item-header">
                        <h3 class="item-title">Artichokes</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$180</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/slidebox.jpeg" alt="Cutter" class="item-image">
                    <p class="item-category">Utensils > Preparation Tools > Cutter</p>
                    <div class="item-header">
                        <h3 class="item-title">Cutter</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$320.99</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/piedastruffles.jpeg" alt="Dough Pack" class="item-image">
                    <p class="item-category">Boxes>Pizza Boxes>Pizza Slice Box</p>
                    <div class="item-header">
                        <h3 class="item-title">Pizza Slice Box</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$70</p>
                </div>
                <div class="scroll-item">
                    <img src="http://ezpizza.store/assets/img/home/cardboard.jpeg" alt="Large Pizza Box" class="item-image">
                    <p class="item-category">Ingredients>Toppings & Sauces>Truffles</p>
                    <div class="item-header">
                        <h3 class="item-title">Truffles</h3>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <img src="http://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
                        </button>
                    </div>
                    <p class="item-price">$999</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- seccion categorias -->

<section class="categories">
    <div class="container-fluid-Categories">
        <h3 class="title-categories text-center">Categories</h3>
        <div class="Elements">
            <div class="imagen-shop" style="background-image: url(http://ezpizza.store/assets/img/home/utensils.png)">
                <div class="text-categories">
                    <p>Utensils</p>
                    <img src="http://ezpizza.store/assets/img/home/Arrow Icon.png" alt="Icon">
                </div>
            </div>
            <div class="imagen-shop imagen-shop-margin" style="background-image: url(http://ezpizza.store/assets/img/home/Ingredients.png)">
                <div class="text-categories">
                    <p>Ingredients</p>
                    <img src="http://ezpizza.store/assets/img/home/Arrow Icon.png" alt="Icon">
                </div>
            </div>
            <div class="imagen-shop" style="background-image: url(http://ezpizza.store/assets/img/home/Boxescategorias.jpeg)" >
                <div class="text-categories">
                    <p>Boxes</p>
                    <img src="http://ezpizza.store/assets/img/home/Arrow Icon.png" alt="Icon">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seccion de sho in minutes -->
<section class="shop-in-minutes">
    <div class="container-fluid-Shop">

        <h3 class="title-shop text-center">Shop in Minutes</h3>
   
        <div class="shop-content d-flex justify-content-center align-items-center">
        
            <div class="circle-container-shop">
                <div class="circle-shop">
                    <img src="http://ezpizza.store/assets/img/home/User Icon.png" alt="Browse Products">
                </div>
                <p class="circle-text-shop">Browse Products</p>
            </div>
            <div class="arrow-shop">
                <img src="http://ezpizza.store/assets/img/home/Right Arrow.png" alt="Arrow">
            </div>

        
            <div class="circle-container-shop">
                <div class="circle-shop">
                    <img src="http://ezpizza.store/assets/img/home/Phone Icon.png" alt="Place Your Order">
                </div>
                <p class="circle-text-shop" style="white-space: nowrap">Place Your Order</p>
            </div>
            <div class="arrow-shop">
                <img src="http://ezpizza.store/assets/img/home/Right Arrow.png" alt="Arrow">
            </div>

            
            <div class="circle-container-shop">
                <div class="circle-shop">
                    <img src="http://ezpizza.store/assets/img/home/Car Icon.png" alt="Receive Your Delivery">
                </div>
                <p class="circle-text-shop">Receive Your Delivery </p>
            </div>
            <div class="arrow-shop">
                <img src="http://ezpizza.store/assets/img/home/Right Arrow.png" alt="Arrow">
            </div>

        
            <div class="circle-container-shop">
                <div class="circle-shop">
                    <img src="http://ezpizza.store/assets/img/home/Pizza Icon.png" alt="Make Great Pizza">
                </div>
                <p class="circle-text-shop" style="white-space: nowrap">Make Great Pizza</p>
            </div>
        </div>
    </div>
</section>

<!-- seccion de testimonios  -->
<section class="testimonies">
    <div class="testimonies-layout-desktop d-none d-lg-flex">
        <div class="testimonies-title" style="height: 60px;">
            <h3>Testimonies</h3>
        </div>
        <div class="testimonies-elements">
            <img src="http://ezpizza.store/assets/img/home/Left Arrow.png" alt="Left Arrow" style="cursor: pointer;">
            <div class="testimonies-profile">
                <img src="http://ezpizza.store/assets/img/home/Testimonies.png" alt="Testimonies">
                <p style=" line-height: 1.6"><span>Davor Vazquez </span> <br> Co-Founder of “Forno d’ Oro”</p>
            </div>
            <p >“Once I discovered EzPizza.com, I was amazed
                at the amount of options I had when shopping, 
                quality of the ingredients, and the ease of 
                purchasing.”</p>
            <img src="http://ezpizza.store/assets/img/home/Right Arrow2.png" alt="Right Arrow" style="cursor: pointer;">
        </div>
    </div>

   <!-- seccion mobile porque cambia mucho la estructura de mobile a destok en figma y no seme ocurre otra forma de maquetarlo en uno solo -->
    <div class="testimonies-layout-mobile d-lg-none">
        <div class="testimonies-elements-mobile">
            <h3>Testimonies</h3>
            <div class="testimonies-profile-mobile">
                <div class="testimonies-profile-mobile-image">
                    <img src="http://ezpizza.store/assets/img/home/Left Arrow.png" alt="Left Arrow" style="margin-right: 24px;">
                    <img src="http://ezpizza.store/assets/img/home/Testimonies.png" alt="Testimonies" >
                    <img src="http://ezpizza.store/assets/img/home/Right Arrow2.png" alt="Right Arrow" style="margin-left: 24px;" >
                </div>

                <p id="Name-Testimonio"><span>Davor Vazquez </span> <br> Co-Founder of “Forno d’ Oro”</p>
            </div>
            <p id="Testimonio-text">“Once I discovered EzPizza.com, I was amazed at the amount of options I had when shopping, the quality of the ingredients, and the ease of purchasing.”</p>
        </div>
    </div>

</section>

<!-- seccion kickstart -->
<section class="kickstart">
    <div class="kickstart-layout-desktop">
        <div class="kickstart-image">
            <img src="http://ezpizza.store/assets/img/home/Cocineros.png" alt="Cocineros">
        </div>
        <div class="kickstart-text">
            <h3>Kickstart Your Next <span>Journey</span></h3>
            <p>
                Transform your restaurant's supply chain. Whether you're a small pizzeria or a multi-location chain,
                our tailored plans fit your exact needs. Join our network of successful partners and experience
                hassle-free pizza supply management.
            </p>
            <div class="button-sure"> 
                <a href="http://ezpizza.store/contact" class="elements-sure">
                    <p>Contact Us</p>
                    <img src="http://ezpizza.store/assets/img/home/Arrow2.png" alt="Icon">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- seccion sure -->
 
<section class="sure">
    <div class="container-fluid">
        <h3 class="title-sure text-center">Not Sure What to Get?</h3>
        <p class="title-sure text-center">Skip the guesswork. Your menu, your volume, your custom plan.</p>
        <a href="http://ezpizza.store/contact" class="button-sure">
            <div class="elements-sure">
                <p>Let’s Make It EZ</p>
                <img src="http://ezpizza.store/assets/img/home/Arrow2.png" alt="Icon">
            </div>

        </a>
    </div>
</section>

<script >function toggleFavorite(button) {
    button.classList.toggle('active');
    const heartIcon = button.querySelector('.heart-icon');
    if (button.classList.contains('active')) {
        heartIcon.src = "../assets/img/Heartcoloreado.svg";
    } else {
        heartIcon.src = "../assets/img/Heartbordernegro.svg"; 
    }
}

const scrollContainer = document.querySelector('.scroll-container');

let isDown = false; // Indica si el mouse está presionado
let startX;         // Guarda la posición inicial del mouse
let scrollLeft;     // Guarda la posición inicial del desplazamiento

// Cuando el mouse se presiona
scrollContainer.addEventListener('mousedown', (e) => {
  isDown = true; // Activar el estado de arrastre
  scrollContainer.classList.add('active');
  startX = e.pageX - scrollContainer.offsetLeft; // Coordenada X inicial
  scrollLeft = scrollContainer.scrollLeft; // Posición inicial del scroll
});

// Cuando el mouse deja de presionar
scrollContainer.addEventListener('mouseup', () => {
  isDown = false; // Desactivar el estado de arrastre
  scrollContainer.classList.remove('active');
});

// Cuando el mouse sale del contenedor
scrollContainer.addEventListener('mouseleave', () => {
  isDown = false; // Desactivar el estado de arrastre
  scrollContainer.classList.remove('active');
});

// Cuando el mouse se mueve
scrollContainer.addEventListener('mousemove', (e) => {
  if (!isDown) return; // Si no está presionado, no hacer nada
  e.preventDefault(); // Evitar el comportamiento por defecto
  const x = e.pageX - scrollContainer.offsetLeft; // Nueva coordenada X
  const walk = (x - startX) * 2; // Velocidad del desplazamiento
  scrollContainer.scrollLeft = scrollLeft - walk; // Ajustar la posición del scroll
});
</script>
</body>
</html>