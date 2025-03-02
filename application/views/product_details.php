<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About the product | EzPizza</title>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://ezpizza.store\assets\bootstrap\css/bootstrap.min.css">
  <link href="https://ezpizza.store/assets/img/product_details/estilos.css" rel="stylesheet">
  <!-- Enlace a Bootstrap CSS -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>

  <!--<div style="margin-top: 60px;">-->
  <section class="contaProducts">
    <div class="container-fluid custom-container">
      <div class="row align-items-start xdxdxd">
        <div class="col-md-5 d-flex imagenes">
          <!-- Miniaturas -->
          <div class="col-md-2">
            <div class="thumbnails">
              <?php
              // Limit to 5 thumbnails
              $max_thumbnails = 5;
              $thumbnail_count = 0;

              foreach ($images as $index => $image) {
                if ($thumbnail_count >= $max_thumbnails) break;

                // Check if the current image is the cover
                $is_cover = $index === 0 || $image->is_cover == 1;
                $active_class = $is_cover ? 'active' : '';
              ?>
                <img src="<?= product_image_url($image->url_imagen); ?>"
                  alt="Miniatura <?= $index + 1; ?>"
                  class="<?= $active_class; ?>"
                  data-index="<?= $index; ?>">
              <?php
                $thumbnail_count++;
              }
              ?>
            </div>
          </div>

          <!-- Imagen Principal -->
          <div class="col-md-10">
            <div class="main-image-container">
              <img src="<?= product_image_url($images[0]->url_imagen); ?>" alt="Imagen Principal" id="main-image">


              <div class="itemxd">
                <svg id="mySvg" class="hearth" xmlns="http://www.w3.org/2000/svg" width="32" height="27" viewBox="0 0 35 30" fill="none">
                  <path d="M17.5 6.5625C17.5 6.5625 17.5 6.5625 16.1489 4.875C14.5844 2.9175 12.2733 1.5 9.5 1.5C5.07333 1.5 1.5 4.89187 1.5 9.09375C1.5 10.6631 1.99778 12.1144 2.85111 13.3125C4.29111 15.3544 17.5 28.5 17.5 28.5M17.5 6.5625C17.5 6.5625 17.5 6.5625 18.8511 4.875C20.4156 2.9175 22.7267 1.5 25.5 1.5C29.9267 1.5 33.5 4.89187 33.5 9.09375C33.5 10.6631 33.0022 12.1144 32.1489 13.3125C30.7089 15.3544 17.5 28.5 17.5 28.5" fill="transparent" />
                  <path d="M17.5 6.5625C17.5 6.5625 17.5 6.5625 16.1489 4.875C14.5844 2.9175 12.2733 1.5 9.5 1.5C5.07333 1.5 1.5 4.89187 1.5 9.09375C1.5 10.6631 1.99778 12.1144 2.85111 13.3125C4.29111 15.3544 17.5 28.5 17.5 28.5C17.5 28.5 30.7089 15.3544 32.1489 13.3125C33.0022 12.1144 33.5 10.6631 33.5 9.09375C33.5 4.89187 29.9267 1.5 25.5 1.5C22.7267 1.5 20.4156 2.9175 18.8511 4.875C17.5 6.5625 17.5 6.5625 17.5 6.5625Z" stroke="#74D7C8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>

              <div class="navigation">
                <!-- Flecha Izquierda -->
                <button id="prev">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 17 25" fill="none">
                    <path d="M16.5 2.06179L14.1204 0.100342L1.15927 10.7902C0.950303 10.9615 0.784537 11.1652 0.67143 11.3896C0.558323 11.6139 0.5 11.8546 0.5 12.0976C0.5 12.3406 0.558323 12.5812 0.67143 12.8055C0.784537 13.0299 0.950303 13.2336 1.15927 13.4049L14.1204 24.1003L16.4978 22.1389L4.33277 12.1003L16.5 2.06179Z" fill="#12191F" />
                  </svg>
                </button>
                <!-- Flecha Derecha -->
                <button id="next">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 17 25" fill="none">
                    <path d="M0.5 2.06179L2.87961 0.100342L15.8407 10.7902C16.0497 10.9615 16.2155 11.1652 16.3286 11.3896C16.4418 11.6139 16.5 11.8546 16.5 12.0976C16.5 12.3406 16.4418 12.5812 16.3286 12.8055C16.2155 13.0299 16.0497 13.2336 15.8407 13.4049L2.87961 24.1003L0.502243 22.1389L12.6672 12.1003L0.5 2.06179Z" fill="#12191F" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="carrusel">
          <div class="productito">
            <h2><?php echo $products[0]->nombre; ?></h2>
            <div class="stars">
              <p class="lighttext"><?php echo $products[0]->promedio_calificacion; ?></p>
              <?php
              $rating = $products[0]->promedio_calificacion; // Obtener la calificación
              for ($i = 0; $i < 5; $i++) {
                if ($i < $rating) {
                  echo '<img src="https://ezpizza.store/assets/img/stars.svg" alt="star">';
                } else {
                  echo '<img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star">';
                }
              }
              ?>
              <p class="lighttext">(<?php echo $products[0]->numero_testimonios; ?>)</p>
            </div>
          </div>

          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
              $max_slides = 5; // Limitar el número de diapositivas
              $slide_count = 0;

              foreach ($images as $index => $image) {
                if ($slide_count >= $max_slides) break;

                // Determinar la clase activa para la primera imagen
                $active_class = ($index === 0) ? 'active' : '';
              ?>
                <div class="carousel-item <?= $active_class; ?>">
                  <img class="d-block w-100" src="<?= product_image_url($image->url_imagen); ?>" alt="Slide1">
                </div>
              <?php
                $slide_count++;
              }
              ?>
            </div>

            <div class="itemxd">
              <svg id="mySvg" class="hearth" xmlns="http://www.w3.org/2000/svg" width="32" height="27" viewBox="0 0 35 30" fill="none">
                <path d="M17.5 6.5625C17.5 6.5625 17.5 6.5625 16.1489 4.875C14.5844 2.9175 12.2733 1.5 9.5 1.5C5.07333 1.5 1.5 4.89187 1.5 9.09375C1.5 10.6631 1.99778 12.1144 2.85111 13.3125C4.29111 15.3544 17.5 28.5 17.5 28.5M17.5 6.5625C17.5 6.5625 17.5 6.5625 18.8511 4.875C20.4156 2.9175 22.7267 1.5 25.5 1.5C29.9267 1.5 33.5 4.89187 33.5 9.09375C33.5 10.6631 33.0022 12.1144 32.1489 13.3125C30.7089 15.3544 17.5 28.5 17.5 28.5" fill="transparent" />
                <path d="M17.5 6.5625C17.5 6.5625 17.5 6.5625 16.1489 4.875C14.5844 2.9175 12.2733 1.5 9.5 1.5C5.07333 1.5 1.5 4.89187 1.5 9.09375C1.5 10.6631 1.99778 12.1144 2.85111 13.3125C4.29111 15.3544 17.5 28.5 17.5 28.5C17.5 28.5 30.7089 15.3544 32.1489 13.3125C33.0022 12.1144 33.5 10.6631 33.5 9.09375C33.5 4.89187 29.9267 1.5 25.5 1.5C22.7267 1.5 20.4156 2.9175 18.8511 4.875C17.5 6.5625 17.5 6.5625 17.5 6.5625Z" stroke="#74D7C8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>


        <!-- Detalles producto -->
        <div class="col-md-3 ms-custom DetallesProducto">
          <div>
            <div class="pproducto">
              <h2><?php echo $products[0]->nombre ?> </h2>
              <div class="stars">
                <p class="lighttext"><?php echo $products[0]->promedio_calificacion ?></p>
                <?php
                $rating = $products[0]->promedio_calificacion; // Get the rating
                for ($i = 0; $i < 5; $i++) {
                  // Display filled star if the rating is greater than the current index, otherwise display an empty star
                  if ($i < $rating) {
                    echo '<img src="https://ezpizza.store/assets/img/stars.svg" alt="star">';
                  } else {
                    echo '<img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star">'; // Assuming you have an empty star image
                  }
                }
                ?>
                <p class="lighttext">(<?php echo $products[0]->numero_testimonios ?>)</p>
              </div>
            </div>
            <h2>$<?php echo $products[0]->precio ?></h2>
          </div>

          <div>
            <div class="about">
              <p class="textgreen">About this product</p>
              <p class="textregular"><?php echo $products[0]->descripcion ?></p>
            </div>

            <div class="icons">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="garantias" width="76" height="73" viewBox="0 0 76 73" fill="none">
                  <path d="M74.7012 36.5C74.7012 56.0758 58.3003 72 38 72C17.6997 72 1.29883 56.0758 1.29883 36.5C1.29883 16.9242 17.6997 1 38 1C58.3003 1 74.7012 16.9242 74.7012 36.5Z" fill="#F7F7F7" stroke="#E1E1E1" stroke-width="2" />
                  <path d="M30.3364 36.5004L35.1836 41.0621L44.8768 31.9375" stroke="#74D7C8" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M37.6071 59.3125L39.7393 58.4453C44.2099 56.6393 48.0705 53.7163 50.9027 49.9929C53.735 46.2694 55.431 41.8875 55.807 37.3216L56.8492 24.7291C56.8662 24.2076 56.6925 23.6964 56.3571 23.2811C56.0217 22.8657 55.545 22.5713 55.0067 22.4471L37.6071 18.25L20.2074 22.3562C19.6693 22.4804 19.1927 22.7746 18.8574 23.1898C18.522 23.6049 18.3482 24.1158 18.3649 24.6371L19.4071 37.2296C19.783 41.7957 21.4789 46.1779 24.3111 49.9015C27.1434 53.6252 31.004 56.5484 35.4749 58.3544L37.6071 59.3125Z" stroke="#74D7C8" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="lighttext">Secure payments</p>
              </div>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="garantias" width="77" height="73" viewBox="0 0 77 73" fill="none">
                  <path d="M75.2012 36.5C75.2012 56.0758 58.8003 72 38.5 72C18.1997 72 1.79883 56.0758 1.79883 36.5C1.79883 16.9242 18.1997 1 38.5 1C58.8003 1 75.2012 16.9242 75.2012 36.5Z" fill="#F7F7F7" stroke="#E1E1E1" stroke-width="2" />
                  <path d="M42.82 16.82L38.66 21H43C47.2435 21 51.3131 22.6857 54.3137 25.6863C57.3143 28.6869 59 32.7565 59 37H55C55 33.8174 53.7357 30.7652 51.4853 28.5147C49.2348 26.2643 46.1826 25 43 25H38.66L42.84 29.18L40 32L31 23L33.82 20.18L40 14L42.82 16.82ZM19 35V55H51V35H19ZM23 48.12V41.9C24.2022 41.2017 25.2017 40.2022 25.9 39H44.1C44.7983 40.2022 45.7978 41.2017 47 41.9V48.12C45.8149 48.8182 44.8299 49.8101 44.14 51H25.9C25.199 49.8051 24.1997 48.8127 23 48.12ZM35 49C36.656 49 38 47.21 38 45C38 42.79 36.656 41 35 41C33.344 41 32 42.79 32 45C32 47.21 33.344 49 35 49Z" fill="#74D7C8" />
                </svg>
                <p class="lighttext">Easy Return & Refund</p>
              </div>
            </div>

          </div>

        </div>

        <div class="col-md-3 pedido">
    <h3 class="<?php echo $products[0]->stock > 0 ? 'h3green' : 'text-danger'; ?>">
        <?php echo $products[0]->stock > 0 ? 'In stock' : 'Out of stock'; ?>
    </h3>


          <div class="fact">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="30" viewBox="0 0 35 26" fill="none">
              <path d="M29.5 21.25C29.5 22.2446 29.0786 23.1984 28.3284 23.9017C27.5783 24.6049 26.5609 25 25.5 25C24.4391 25 23.4217 24.6049 22.6716 23.9017C21.9214 23.1984 21.5 22.2446 21.5 21.25C21.5 20.2554 21.9214 19.3016 22.6716 18.5983C23.4217 17.8951 24.4391 17.5 25.5 17.5C26.5609 17.5 27.5783 17.8951 28.3284 18.5983C29.0786 19.3016 29.5 20.2554 29.5 21.25ZM13.5 21.25C13.5 22.2446 13.0786 23.1984 12.3284 23.9017C11.5783 24.6049 10.5609 25 9.5 25C8.43913 25 7.42172 24.6049 6.67157 23.9017C5.92143 23.1984 5.5 22.2446 5.5 21.25C5.5 20.2554 5.92143 19.3016 6.67157 18.5983C7.42172 17.8951 8.43913 17.5 9.5 17.5C10.5609 17.5 11.5783 17.8951 12.3284 18.5983C13.0786 19.3016 13.5 20.2554 13.5 21.25Z" stroke="#74D7C8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M21.5 21.25H13.5M1.5 1H17.5C19.7624 1 20.8936 1 21.596 1.66C22.3 2.317 22.3 3.3775 22.3 5.5V18.25M23.1 4.75H25.9816C27.3096 4.75 27.9736 4.75 28.524 5.0425C29.0744 5.3335 29.4152 5.8675 30.0984 6.9355L32.8168 11.1805C33.156 11.7115 33.3256 11.9785 33.4136 12.2725C33.5 12.568 33.5 12.877 33.5 13.4965V17.5C33.5 18.9025 33.5 19.603 33.1784 20.125C32.9678 20.467 32.6648 20.751 32.3 20.9485C31.7432 21.25 30.996 21.25 29.5 21.25M1.5 14.5V17.5C1.5 18.9025 1.5 19.603 1.8216 20.125C2.03224 20.467 2.33518 20.751 2.7 20.9485C3.2568 21.25 4.004 21.25 5.5 21.25M1.5 5.5H11.1M1.5 10H7.9" stroke="#74D7C8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="textregular">Delivery: $10</p>
          </div>

          <div class="fact">
            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="30" viewBox="0 0 33 30" fill="none">
              <path d="M9.5768 0C9.87384 0 10.1587 0.107464 10.3688 0.298751C10.5788 0.490038 10.6968 0.749479 10.6968 1.02V2.9274H22.724V1.03311C22.724 0.762593 22.842 0.503152 23.052 0.311865C23.2621 0.120578 23.547 0.0131143 23.844 0.0131143C24.141 0.0131143 24.4259 0.120578 24.636 0.311865C24.846 0.503152 24.964 0.762593 24.964 1.03311V2.9274H29.3C30.1484 2.9274 30.9621 3.23424 31.5622 3.78046C32.1622 4.32668 32.4996 5.06756 32.5 5.84023V26.23C32.4996 27.0027 32.1622 27.7436 31.5622 28.2898C30.9621 28.836 30.1484 29.1429 29.3 29.1429H3.7C2.85158 29.1429 2.03789 28.836 1.43782 28.2898C0.837753 27.7436 0.500424 27.0027 0.5 26.23L0.5 5.84023C0.500424 5.06756 0.837753 4.32668 1.43782 3.78046C2.03789 3.23424 2.85158 2.9274 3.7 2.9274H8.4568V1.01854C8.45722 0.748275 8.57541 0.489208 8.78541 0.298236C8.9954 0.107264 9.28003 -2.75784e-07 9.5768 0ZM2.74 11.2812V26.23C2.74 26.3448 2.76483 26.4585 2.81308 26.5646C2.86132 26.6707 2.93203 26.7671 3.02118 26.8482C3.11032 26.9294 3.21615 26.9938 3.33262 27.0378C3.4491 27.0817 3.57393 27.1043 3.7 27.1043H29.3C29.4261 27.1043 29.5509 27.0817 29.6674 27.0378C29.7838 26.9938 29.8897 26.9294 29.9788 26.8482C30.068 26.7671 30.1387 26.6707 30.1869 26.5646C30.2352 26.4585 30.26 26.3448 30.26 26.23V11.3016L2.74 11.2812ZM11.1672 21.302V23.7296H8.5V21.302H11.1672ZM17.8328 21.302V23.7296H15.1672V21.302H17.8328ZM24.5 21.302V23.7296H21.8328V21.302H24.5ZM11.1672 15.5069V17.9345H8.5V15.5069H11.1672ZM17.8328 15.5069V17.9345H15.1672V15.5069H17.8328ZM24.5 15.5069V17.9345H21.8328V15.5069H24.5ZM8.4568 4.96594H3.7C3.57393 4.96594 3.4491 4.98856 3.33262 5.03249C3.21615 5.07643 3.11032 5.14083 3.02118 5.22201C2.93203 5.3032 2.86132 5.39958 2.81308 5.50565C2.76483 5.61173 2.74 5.72542 2.74 5.84023V9.24266L30.26 9.26306V5.84023C30.26 5.72542 30.2352 5.61173 30.1869 5.50565C30.1387 5.39958 30.068 5.3032 29.9788 5.22201C29.8897 5.14083 29.7838 5.07643 29.6674 5.03249C29.5509 4.98856 29.4261 4.96594 29.3 4.96594H24.964V6.31963C24.964 6.59015 24.846 6.84959 24.636 7.04088C24.4259 7.23216 24.141 7.33963 23.844 7.33963C23.547 7.33963 23.2621 7.23216 23.052 7.04088C22.842 6.84959 22.724 6.59015 22.724 6.31963V4.96594H10.6968V6.30651C10.6968 6.57703 10.5788 6.83648 10.3688 7.02776C10.1587 7.21905 9.87384 7.32651 9.5768 7.32651C9.27976 7.32651 8.99488 7.21905 8.78484 7.02776C8.5748 6.83648 8.4568 6.57703 8.4568 6.30651V4.96594Z" fill="#74D7C8" />
            </svg>
            <p class="textregular">Date: 01/12/2024</p>
          </div>

          <div class="fact">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="30" viewBox="0 0 33 24" fill="none">
              <path d="M20.8636 0.264282C23.9498 0.264282 26.9095 1.46308 29.0918 3.59696C31.274 5.73084 32.5 8.62501 32.5 11.6428C32.5 14.6605 31.274 17.5547 29.0918 19.6886C26.9095 21.8225 23.9498 23.0213 20.8636 23.0213C17.7775 23.0213 14.8177 21.8225 12.6355 19.6886C10.4532 17.5547 9.22727 14.6605 9.22727 11.6428C9.22727 8.62501 10.4532 5.73084 12.6355 3.59696C14.8177 1.46308 17.7775 0.264282 20.8636 0.264282ZM20.8636 3.1089C18.549 3.1089 16.3292 4.008 14.6925 5.60842C13.0558 7.20883 12.1364 9.37945 12.1364 11.6428C12.1364 13.9061 13.0558 16.0767 14.6925 17.6771C16.3292 19.2775 18.549 20.1766 20.8636 20.1766C23.1783 20.1766 25.3981 19.2775 27.0348 17.6771C28.6714 16.0767 29.5909 13.9061 29.5909 11.6428C29.5909 9.37945 28.6714 7.20883 27.0348 5.60842C25.3981 4.008 23.1783 3.1089 20.8636 3.1089ZM19.4091 5.95353H21.5909V11.3299L24.98 14.6438L23.4382 16.1515L19.4091 12.2117V5.95353ZM1.95455 20.1766C1.56878 20.1766 1.19881 20.0268 0.926026 19.76C0.653246 19.4933 0.5 19.1315 0.5 18.7543C0.5 18.3771 0.653246 18.0153 0.926026 17.7486C1.19881 17.4819 1.56878 17.332 1.95455 17.332H7.52545C7.97636 18.3419 8.55818 19.2948 9.22727 20.1766H1.95455ZM3.40909 13.0651C3.02332 13.0651 2.65335 12.9152 2.38057 12.6485C2.10779 12.3818 1.95455 12.02 1.95455 11.6428C1.95455 11.2655 2.10779 10.9038 2.38057 10.637C2.65335 10.3703 3.02332 10.2205 3.40909 10.2205H6.39091L6.31818 11.6428L6.39091 13.0651H3.40909ZM4.86364 5.95353C4.47787 5.95353 4.1079 5.80367 3.83512 5.53694C3.56234 5.2702 3.40909 4.90843 3.40909 4.53121C3.40909 4.15399 3.56234 3.79222 3.83512 3.52549C4.1079 3.25875 4.47787 3.1089 4.86364 3.1089H9.22727C8.55818 3.99074 7.97636 4.94368 7.52545 5.95353H4.86364Z" fill="#74D7C8" />
            </svg>
            <p class="textregular">Fast delivery</p>
          </div>

          <div class="fact2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="30" viewBox="0 0 25 25" fill="none">
              <g clip-path="url(#clip0_505_396)">
                <path d="M20.28 2.34277L24.5 6.56277L8.94 22.1428L0.5 13.6928L4.72 9.47277L8.94 13.6928L20.28 2.34277ZM21.69 6.56277L15.92 12.3328L8.94 19.3128L2.5 13.6928H3.31L8.94 19.3128L21.69 6.56277Z" fill="#90DF9F" />
              </g>
              <defs>
                <clipPath id="clip0_505_396">
                  <rect width="24" height="24" fill="white" transform="translate(0.5 0.142822)" />
                </clipPath>
              </defs>
            </svg>
            <p class="lighttext">Refund for damage or loss</p>
          </div>

          <div class="Quantity">
            <p class="textbold">Quantity:</p>
            <div class="input-group">
              <button class="custom-btn" type="button" onclick="decreaseValue()">
                <span class="textbold">-</span>
              </button>
              <input type="number" class="inputxd" id="numericInput" value="1" min="1" max="100" step="1">
              <button class="custom-btn" type="button" onclick="increaseValue()">
                <span class="textbold">+</span>
              </button>
            </div>
            <p class="thintext">Pack(s)</p>
          </div>

          <form action="<?= base_url('payment/charge') ?>" method="post">
           <button class="btn boton" type="button" id="buyButton" <?php echo $products[0]->stock > 0 ? '' : 'disabled'; ?>>
    Buy Now
</button>
          </form>
          <script src="https://checkout.stripe.com/checkout.js"></script>
          <script>
            // Get references to elements
            const numericInput = document.getElementById('numericInput');
            const buyButton = document.getElementById('buyButton');

            // Function to increase value
            function increaseValue() {
              let currentValue = parseInt(numericInput.value);
              if (currentValue < 100) {
                numericInput.value = currentValue + 1;
              }
            }

            // Stripe button initialization with dynamic amount
            buyButton.addEventListener('click', function() {
              const packCount = numericInput.value;
              const pricePerPack = <?php echo $products[0]->precio; ?>;
              const totalAmount = pricePerPack * packCount * 100; // Multiply price by pack count and convert to cents

              const stripeHandler = StripeCheckout.configure({
                key: 'pk_test_51QR04mGDHNYxmN798hAT79jVxdb8qyOI0w6qAbF9sVwYiAvGl3qm2BzZpsXh2HTBN21z3izyCiPvNOVGNd4pJRUd0022uAUKSP',
                image: '<?= product_image_url($images[0]->url_imagen); ?>', // Optionally, set an image for your product
                locale: 'auto',
                token: function(token) {
                  fetch('https://ezpizza.store/order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                stripeToken: token.id, // Token ID from Stripe
                amount: totalAmount, // Set the total amount dynamically
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

              stripeHandler.open({
                name: "<?php echo $products[0]->nombre ?>",
                description: "<?php echo $products[0]->descripcion ?>",
             
                currency: 'usd',
              });
            });
            
          </script>



          <div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="buyNowModalLabel">Formulario de Compra</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Correo Electrónico</label>
                      <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
                    </div>
                    <div class="mb-3">
                      <label for="quantity" class="form-label">Cantidad</label>
                      <input type="number" class="form-control" id="quantity" placeholder="Cantidad a comprar">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

  <a href="#" 
   class="btn boton2 add-cart <?php echo $products[0]->stock > 0 ? '' : 'disabled'; ?>" 
   <?php echo $products[0]->stock > 0 ? '' : 'aria-disabled="true"'; ?>
   data-bs-toggle="modal" 
   data-product-id="<?= $products[0]->id_producto ?>"
   <?php echo $products[0]->stock > 0 ? '' : 'onclick="return false;"'; ?>>
    Add to cart
</a>
          <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addToCartModalLabel">Acción Exitosa</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                  <p>Añadido al carrito exitosamente</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="scroll-section">
    <h3 class="sombra">Frequently bought together</h3>
    <div class="scroll-container">
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/tomato.png" alt="Tomato" class="item-image">
        <p class="item-category">Ingredients > Toppings > Tomato</p>
        <div class="item-header">
          <h3>Tomato</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$420</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/rollingpin.jpeg" alt="Rolling Pin" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Rolling</p>
        <div class="item-header">
          <h3 class="item-title">Rolling pin</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Cutter</p>
        <div class="item-header">
          <h3 class="item-title">Cutter</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$320.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
        <p class="item-category">Ingredients > Bases > Dough</p>
        <div class="item-header">
          <h3 class="item-title">Dough Pack</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
        <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
        <div class="item-header">
          <h3 class="item-title">Large Pizza Box</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$300.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/tomato.jpeg" alt="Tomato" class="item-image">
        <p class="item-category">Ingredients > Toppings > Tomato</p>
        <div class="item-header">
          <h3 class="item-title">Tomato</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$420</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/rollingpin.jpeg" alt="Rolling Pin" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Rolling</p>
        <div class="item-header">
          <h3 class="item-title">Rolling pin</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Cutter</p>
        <div class="item-header">
          <h3 class="item-title">Cutter</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$320.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
        <p class="item-category">Ingredients > Bases > Dough</p>
        <div class="item-header">
          <h3 class="item-title">Dough Pack</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
        <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
        <div class="item-header">
          <h3 class="item-title">Large Pizza Box</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$300.99</p>
      </div>
    </div>
  </section>

  <section class="secreseñas">
    <div class="container-fluid reseñas">
      <div class="row">
        <div class="col-md-12">
          <h3 class="sombra">Ratings & Reviews</h3>
        </div>
      </div>
      <div class="row">
        <!-- Customer Reviews Section -->
        <div class="col-md-3">
          <div class="reviews">
            <h3 class="h3green">Customer reviews</h3>
            <div class="stars" style="display: flex; align-items: center; font-size: 14px;">
              <p style="margin-right: 5px;"><?php echo $products[0]->promedio_calificacion ?></p>
              <?php
              $rating = $products[0]->promedio_calificacion; // Get the rating
              for ($i = 0; $i < 5; $i++) {
                // Display filled star if the rating is greater than the current index, otherwise display an empty star
                if ($i < $rating) {
                  echo '<img src="https://ezpizza.store/assets/img/stars.svg" alt="star" style="width: 24px; height: auto; margin: 0 2px;">';
                } else {
                  echo '<img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" style="width: 24px; height: auto; margin: 0 2px;">';
                }
              }
              ?>
              <p>(<?php echo $products[0]->numero_testimonios ?>)</p>
            </div>


            <!-- Rating Breakdown -->
            <div class="barras">
              <div class="barra">
                <p>5 stars</p>
                <div class="bar-container">
                  <div class="bar" style="width: <?php echo $percentages[0]->percentage ?>%;"></div>
                </div>
                <p><?php echo $percentages[0]->percentage ?>%</p>
              </div>
              <div class="barra">
                <p>4 stars</p>
                <div class="bar-container">
                  <div class="bar" style="width: <?php echo $percentages[1]->percentage ?>%;"></div>
                </div>
                <p><?php echo $percentages[1]->percentage ?>%</p>
              </div>
              <div class="barra">
                <p>3 stars</p>
                <div class="bar-container">
                  <div class="bar" style="width: <?php echo $percentages[2]->percentage ?>%;"></div>
                </div>
                <p><?php echo $percentages[2]->percentage ?>%</p>
              </div>
              <div class="barra">
                <p>2 stars</p>
                <div class="bar-container">
                  <div class="bar" style="width: <?php echo $percentages[3]->percentage ?>%;"></div>
                </div>
                <p><?php echo $percentages[3]->percentage ?>%</p>
              </div>
              <div class="barra">
                <p>1 star</p>
                <div class="bar-container">
                  <div class="bar" style="width: <?php echo $percentages[4]->percentage ?>%;"></div>
                </div>
                <p><?php echo $percentages[4]->percentage ?>%</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Comments Section -->
        <div class="col-md-9">
          <div class="mycomment">
            <p class="textregular">We want to hear you</p>

            <!-- Star Rating Input -->
            <div class="stars mb-4" id="star-rating">
              <img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" class="star" data-rating="1">
              <img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" class="star" data-rating="2">
              <img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" class="star" data-rating="3">
              <img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" class="star" data-rating="4">
              <img src="https://ezpizza.store/assets/img/empty-star.svg" alt="empty star" class="star" data-rating="5">
            </div>


            <?php if (isset($session_data['logged_in']) && $session_data['logged_in']): ?>
              <form id="testimonial-form" class="form-group">
                <textarea name="comentario" id="comentario" class="inputcomment" placeholder="Type your opinion"></textarea>
                <input type="hidden" name="calificacion" id="calificacion" value="">
                <input type="hidden" name="id_cliente" value="<?php echo $session_data['id_cliente']; ?>">
                <input type="hidden" name="id_producto" value="<?php echo $products[0]->id_producto; ?>">
                <button type="button" class="btn btn-accent submit" id="submit-button">Submit</button>
              </form>
            <?php else: ?>
              <script>
                document.getElementById('submit-button').addEventListener('click', function() {
                  window.location.href = 'login'; // Redirect to login page
                });
              </script>
            <?php endif; ?>

            <!-- Existing Comments -->
            <div class="criticas" id="comment-section">
              <?php foreach ($reviews as $review): ?>
                <div class="comentarios mb-3">
                  <div class="user d-flex align-items-center">
                    <div class="image-container">
                      <img
                        class="user-image object-fit-contain border rounded"
                        src="<?php
                              echo product_image_url("/pfp/" . trim($review->foto_perfil, "'"));
                              ?>"
                        alt="<?php echo htmlspecialchars($review->usuario); ?>">
                    </div>

                    <div class="user-text ms-2">
                      <p class="textmedium mb-0"><?php echo htmlspecialchars($review->usuario); ?></p>
                      <p class="text-muted mb-0 small"><?php echo htmlspecialchars($review->fecha_testimonio); ?></p>
                    </div>
                  </div>

                  <div class="stars mb-2">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                      <?php if ($i < $review->calificacion): ?>
                        <!-- Filled star -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 30" fill="none">
                          <path d="M6.72596 29.366L9.20596 18.74L0.959961 11.596L11.822 10.656L16.076 0.634033L20.33 10.654L31.19 11.594L22.944 18.738L25.426 29.364L16.076 23.724L6.72596 29.366Z" fill="#90DF9F" />
                        </svg>
                      <?php else: ?>
                        <!-- Empty star -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 30" fill="none">
                          <path d="M6.72596 29.366L9.20596 18.74L0.959961 11.596L11.822 10.656L16.076 0.634033L20.33 10.654L31.19 11.594L22.944 18.738L25.426 29.364L16.076 23.724L6.72596 29.366Z" fill="#CCCCCC" />
                        </svg>
                      <?php endif; ?>
                    <?php endfor; ?>
                  </div>

                  <p class="lighttext mb-0"><?php echo htmlspecialchars($review->comentario); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="scroll-section">
    <h3 class="sombra">Recommendations for your business</h3>
    <div class="scroll-container">
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/tomato.png" alt="Tomato" class="item-image">
        <p class="item-category">Ingredients > Toppings > Tomato</p>
        <div class="item-header">
          <h3>Tomato</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$420</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/rollingpin.jpeg" alt="Rolling Pin" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Rolling</p>
        <div class="item-header">
          <h3 class="item-title">Rolling pin</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Cutter</p>
        <div class="item-header">
          <h3 class="item-title">Cutter</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$320.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
        <p class="item-category">Ingredients > Bases > Dough</p>
        <div class="item-header">
          <h3 class="item-title">Dough Pack</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
        <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
        <div class="item-header">
          <h3 class="item-title">Large Pizza Box</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$300.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/tomato.jpeg" alt="Tomato" class="item-image">
        <p class="item-category">Ingredients > Toppings > Tomato</p>
        <div class="item-header">
          <h3 class="item-title">Tomato</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$420</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/rollingpin.jpeg" alt="Rolling Pin" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Rolling</p>
        <div class="item-header">
          <h3 class="item-title">Rolling pin</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image.png" alt="Cutter" class="item-image">
        <p class="item-category">Utensils > Preparation Tools > Cutter</p>
        <div class="item-header">
          <h3 class="item-title">Cutter</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$320.99</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Image22.jpeg" alt="Dough Pack" class="item-image">
        <p class="item-category">Ingredients > Bases > Dough</p>
        <div class="item-header">
          <h3 class="item-title">Dough Pack</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$150</p>
      </div>
      <div class="scroll-item">
        <img src="https://ezpizza.store/assets/img/home/Boxes.jpeg" alt="Large Pizza Box" class="item-image">
        <p class="item-category">Boxes > Pizza Boxes > Large Pizza</p>
        <div class="item-header">
          <h3 class="item-title">Large Pizza Box</h3>
          <button class="favorite-btn" onclick="toggleFavorite(this)">
            <img src="https://ezpizza.store/assets/img/home/Heartbordernegro.svg" alt="Heart Outline" class="heart-icon">
          </button>
        </div>
        <p class="item-price">$300.99</p>
      </div>
    </div>
  </section>



  <!-- Enlace a Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const thumbnails = document.querySelectorAll('.thumbnails img');
    const mainImage = document.getElementById('main-image');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    //corazon
    const svgElement = document.getElementById("mySvg");
    svgElement.addEventListener("click", function() {
      const path = svgElement.querySelector("path");
      // Cambiar el color del atributo 'fill'
      path.setAttribute("fill", path.getAttribute("fill") === "transparent" ? "#74D7C8" : "transparent");
    });

    // Seleccionar todos los elementos con la clase "mySvg"
    const svgElements = document.querySelectorAll(".owo");

    // Iterar sobre cada elemento y agregar el evento de clic
    svgElements.forEach((svgElement) => {
      svgElement.addEventListener("click", function() {
        const path = svgElement.querySelector("path");
        // Cambiar el color del atributo 'fill'
        path.setAttribute("fill", path.getAttribute("fill") === "#F7F7F7" ? "#90DF9F" : "#F7F7F7");
      });
    });

    // Actualizar la imagen principal y las miniaturas activas
    function updateMainImage(index) {
      mainImage.src = thumbnails[index].src;
      thumbnails.forEach((thumb, i) => {
        thumb.classList.toggle('active', i === index);
      });
    }

    // Navegar hacia atrás
    prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex === 0) ? thumbnails.length - 1 : currentIndex - 1;
      updateMainImage(currentIndex);
    });

    // Navegar hacia adelante
    nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex === thumbnails.length - 1) ? 0 : currentIndex + 1;
      updateMainImage(currentIndex);
    });

    // Hacer clic en una miniatura
    thumbnails.forEach((thumbnail, index) => {
      thumbnail.addEventListener('click', () => {
        currentIndex = index;
        updateMainImage(currentIndex);
      });
    });

    //numericupdownxd
    function increaseValue() {
      const input = document.getElementById('numericInput');
      const currentValue = parseInt(input.value, 10); // Asegura conversión a número
      const max = parseInt(input.max, 10); // Asegura conversión a número
      const step = parseInt(input.step, 10) || 1; // Usa el atributo "step" o un valor por defecto de 1

      if (currentValue + step <= max) {
        input.value = currentValue + step;
      }
    }

    function decreaseValue() {
      const input = document.getElementById('numericInput');
      const currentValue = parseInt(input.value, 10); // Asegura conversión a número
      const min = parseInt(input.min, 10); // Asegura conversión a número
      const step = parseInt(input.step, 10) || 1; // Usa el atributo "step" o un valor por defecto de 1

      if (currentValue - step >= min) {
        input.value = currentValue - step;
      }
    }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const stars = document.querySelectorAll('#star-rating .star');
      let selectedRating = 0;

      stars.forEach((star) => {
        // Highlight stars on hover
        star.addEventListener('mouseover', function() {
          resetStars();
          const rating = this.getAttribute('data-rating');
          highlightStars(rating);
        });

        // Reset stars on mouseout
        star.addEventListener('mouseout', function() {
          resetStars();
          if (selectedRating > 0) {
            highlightStars(selectedRating);
          }
        });

        // Set rating on click
        star.addEventListener('click', function() {
          selectedRating = this.getAttribute('data-rating');
          resetStars();
          highlightStars(selectedRating);
          console.log('Selected Rating:', selectedRating);
        });
      });

      function highlightStars(rating) {
        for (let i = 0; i < rating; i++) {
          stars[i].src = 'https://ezpizza.store/assets/img/stars.svg'; // Replace with the filled star image URL
        }
      }

      function resetStars() {
        stars.forEach((star) => {
          star.src = 'https://ezpizza.store/assets/img/empty-star.svg'; // Reset to empty star image
        });
      }
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      const stars = $('.star');

      // Star rating selection
      stars.on('click', function() {
        const rating = $(this).data('rating');
        $('#calificacion').val(rating);
        stars.removeClass('selected');
        $(this).addClass('selected');
      });

      // AJAX form submission
      $('#submit-button').on('click', function() {
        const formData = {
          comentario: $('#comentario').val(),
          calificacion: $('#calificacion').val(),
          id_cliente: $('input[name="id_cliente"]').val(),
          id_producto: $('input[name="id_producto"]').val()
        };

        $.ajax({
          url: "https://ezpizza.store/feedback/submit",
          type: "POST",
          data: formData,
          success: function(response) {
            alert('Your testimonial has been submitted successfully!');
            $('#testimonial-form')[0].reset(); // Reset the form
            stars.removeClass('selected'); // Reset star selection
            location.reload(); // Reload the page after success
          },
          error: function(xhr, status, error) {
            alert('An error occurred: ' + xhr.responseText);
          }
        });
      });
    });
  </script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    var stripe = Stripe('pk_test_51QR04mGDHNYxmN798hAT79jVxdb8qyOI0w6qAbF9sVwYiAvGl3qm2BzZpsXh2HTBN21z3izyCiPvNOVGNd4pJRUd0022uAUKSP'); // Your Stripe publishable key
    var checkoutButton = document.getElementById('checkout-button');

    checkoutButton.addEventListener('click', function() {
      fetch('<?= base_url('payment/createCheckoutSession'); ?>', {
          method: 'POST',
        })
        .then(function(response) {
          return response.json();
        })
        .then(function(sessionId) {
          return stripe.redirectToCheckout({
            sessionId: sessionId.id
          });
        })
        .then(function(result) {
          // Handle any errors here (optional)
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.add-cart').on('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const productId = $(this).data('product-id');
        const quantity = document.getElementById('numericInput').value;

        $.ajax({
          url: '<?= base_url("cart/add") ?>',
          method: 'POST',
          data: {
            id_producto: productId,
            cantidad: quantity
          },
          dataType: 'json', // Expect JSON response
          success: function(response) {
            if (response.status === 'success') {
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
        url: window.location.href, // Get the current URL of the page
        type: 'GET',
        success: function(response) {
          // If you want to make sure everything gets reloaded:
          window.location.href = window.location.href; // Trigger a full reload
        }
      });
    }
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>