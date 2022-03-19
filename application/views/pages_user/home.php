<!-- Main Wrapper Start -->
<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<style>
.mySlides {
    display: none;
}

img {
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
    max-width: 1500px;
    position: relative;
    margin: auto;
}

/* Caption text */


/* Number text (1/3 etc) */
.numbertext {
    color: black;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bullets/indicators */
.dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #6a6a6a;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active-slide {
    background-color: #ff8000;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 5s;
    animation-name: fade;
    animation-duration: 5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .4
    }

    to {
        opacity: 1
    }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
    .text {
        font-size: 11px
    }
}
</style>
</style>

<main id="content" class="main-content-wrapper">
    <!-- Hero Area Start -->
    <div class="hero-area pb--40 pb-sm--30" style="margin-bottom: 90px;">
        <div class="container">
            <div class="row custom-row">
                <div class="col-lg-9 offset-lg-3 col-md-8 mb-sm--30">

                    <?= $this->session->flashdata('message') ?>

                    <!-- <div class="slider-wrapper owl-carousel right-side-dot" id="homepage-slider">
                        <div class="single-slider content-v-center"
                            style="background-image: url(assets/img/slider/home1-slider1.jpg);background-size: contain">

                        </div>
                        <div class=" single-slider content-v-center"
                            style="background-image: url(assets/img/slider/home1-slider2.jpg);background-size: contain;">

                        </div>
                        <div class="single-slider content-v-center"
                            style="background-image: url(assets/img/slider/home1-slider2.jpg);background-size: contain;">

                        </div>
                    </div> -->

                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="<?= base_url('assets/img/slider/home1-slider1.jpg') ?>" style="width:100%">

                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="<?= base_url('assets/img/slider/home1-slider2.jpg') ?>" style="width:100%">

                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="<?= base_url('assets/img/slider/home1-slider1.jpg') ?>" style="width:100%">

                        </div>

                        <div style="text-align:center;position: relative;margin-top: -30px;">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>

                    </div>





                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->



    <!-- Promo Product area Start -->
    <div class="new-products-area section-padding section-sm-padding section-sm-padding">
        <div class="container">
            <div class="row align-items-center mb--20">
                <div class="col-xl-3 col-md-4">
                    <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                        <h2>PROMO DISKON 20%!!</h2>
                    </div>
                </div>

            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="category-porducts-wrapper bg--white" style="border-radius: 10px;">
                        <div class="category-product-carousel owl-carousel js-category-product-carousel-2">

                            <?php foreach ($product_discount as $pd) : ?>
                            <div class="product-box product-box-hover-up hover-up-2 color-1 ml-5 mt-5">
                                <div class="product-box__img">
                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="primary-image" style="width: 250px;height: 250px;" />

                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="secondary-image" style="width: 250px;height: 250px;" />

                                    <a href="<?= base_url('detail_product/' . $pd->book_id) ?>"
                                        class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="product-box__content">
                                    <h3 class="product-box__title">
                                        <a
                                            href="<?= base_url('detail_product/' . $pd->book_id) ?>"><?= substr($pd->book_name, 0, 35) . "...." ?></a>
                                    </h3>
                                    <div class="ratings">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <i class="fa fa-star rated"></i>

                                        <?php endfor ?>
                                    </div>
                                    <div class="product-box__price">
                                        <span class="regular-price"><?= rupiah($pd->book_price) ?></span>
                                        <span class="badge badge-danger">-<?= $pd->book_discount ?>%</span> <br />

                                        <?php

                                            $disc = $pd->book_price * $pd->book_discount / 100;
                                            $harga_asli = $pd->book_price - $disc;

                                            ?>

                                        <span class="sale-price mt-2"><?= rupiah($harga_asli) ?></span>
                                    </div>
                                </div>
                                <div class="product-box__action action-3">

                                    <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>" class="add-to-cart"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i
                                            class="fa fa-shopping-bag"></i></a>

                                </div>
                            </div>
                            <?php endforeach ?>

                        </div>
                        <div class="promo-box text-center" style="border-radius: 10px;">
                            <a href="#"><img src="assets/img/banner/home3-banner3.jpg" alt="promo" width="100%"
                                    height="200px" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Promo Product area End -->

    <!-- Promo area 3 COL Start -->
    <div class="promo-area section-padding section-sm-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="promo-box mb-sm--20" style="border-radius: 10px;">
                        <a href="#"><img src="<?= base_url('/') ?>assets/img/banner/home1-banner2-3.jpeg"
                                alt="promo" /></a>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="promo-box mb-sm--20" style="border-radius: 10px;">
                        <a href="#"><img src="<?= base_url('/') ?>assets/img/banner/home1-banner2-2.jpeg"
                                alt="promo" /></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="promo-box mb-sm--20" style="border-radius: 10px;">
                        <a href="#"><img src="<?= base_url('/') ?>assets/img/banner/home1-banner2-1.png"
                                alt="promo" /></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Promo area 3 COL End -->

    <!-- Produk Kami area Start -->
    <div class="new-products-area section-padding section-sm-padding section-sm-padding">
        <div class="container">
            <div class="row align-items-center mb--20">
                <div class="col-xl-3 col-md-4">
                    <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                        <h2>Produk Kami</h2>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8 text-md-right text-center">
                    <ul class="category-list list-1 color-1">
                        <?php foreach ($categories_limit as $cl) : ?>
                        <li><a
                                href="<?= base_url('shop/?category=' . strtolower($cl->category_name)) ?>"><?= $cl->category_name ?></a>
                        </li>
                        <?php endforeach ?>

                        <li><a href="<?= base_url('shop') ?>">Lihat Lainnya</a></li>
                    </ul>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="category-porducts-wrapper bg--white" style="border-radius: 10px;">
                        <div class="category-product-carousel owl-carousel js-category-product-carousel-2">

                            <?php foreach ($products as $pd) : ?>
                            <div class="product-box product-box-hover-up hover-up-2 color-1 ml-5 mt-5">
                                <div class="product-box__img">
                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="primary-image" style="width: 250px;height: 250px;" />

                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="secondary-image" style="width: 250px;height: 250px;" />

                                    <a href="<?= base_url('detail_product/' . $pd->book_id) ?>"
                                        class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="product-box__content">
                                    <h3 class="product-box__title">
                                        <a
                                            href="<?= base_url('detail_product/' . $pd->book_id) ?>"><?= substr($pd->book_name, 0, 35) . "...." ?></a>
                                    </h3>
                                    <div class="ratings">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <i class="fa fa-star rated"></i>

                                        <?php endfor ?>
                                    </div>
                                    <div class="product-box__price">
                                        <span class="regular-price"><?= rupiah($pd->book_price) ?></span>
                                        <?php if ($pd->book_discount != 0) : ?>
                                        <span class="badge badge-danger">-<?= $pd->book_discount ?>%</span> <br />
                                        <?php endif ?>

                                        <?php

                                            $disc = $pd->book_price * $pd->book_discount / 100;
                                            $harga_asli = $pd->book_price - $disc;

                                            ?>

                                        <span class="sale-price mt-2"><?= rupiah($harga_asli) ?></span>
                                    </div>
                                </div>
                                <div class="product-box__action action-3">

                                    <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>" class="add-to-cart"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i
                                            class="fa fa-shopping-bag"></i></a>

                                </div>
                            </div>
                            <?php endforeach ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Produk Kami area End -->

    <!-- Promo area XL Start -->
    <div class="promo-area section-padding section-sm-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="promo-box" style="border-radius: 10px;">
                        <a href="#"><img src="<?= base_url('/') ?>assets/img/banner/home1-banner3.jpeg"
                                alt="promo" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Promo area XL End -->

    <!-- Produk Rekomendasi area Start -->
    <div class="new-products-area section-padding section-sm-padding section-sm-padding">
        <div class="container">
            <div class="row align-items-center mb--20">
                <div class="col-xl-3 col-md-4">
                    <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                        <h2>Produk Rekomendasi</h2>
                    </div>
                </div>

            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="category-porducts-wrapper bg--white" style="border-radius: 10px;">
                        <div class="category-product-carousel owl-carousel js-category-product-carousel-2">
                            <?php foreach ($products as $pd) : ?>
                            <div class="product-box product-box-hover-up hover-up-2 color-1 ml-5 mt-5">
                                <div class="product-box__img">
                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="primary-image" style="width: 250px;height: 250px;" />

                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                        alt="product" class="secondary-image" style="width: 250px;height: 250px;" />

                                    <a href="<?= base_url('detail_product/' . $pd->book_id) ?>"
                                        class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="product-box__content">
                                    <h3 class="product-box__title">
                                        <a
                                            href="<?= base_url('detail_product/' . $pd->book_id) ?>"><?= substr($pd->book_name, 0, 35) . "...." ?></a>
                                    </h3>
                                    <div class="ratings">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <i class="fa fa-star rated"></i>

                                        <?php endfor ?>
                                    </div>
                                    <div class="product-box__price">
                                        <span class="regular-price"><?= rupiah($pd->book_price) ?></span>
                                        <?php if ($pd->book_discount != 0) : ?>
                                        <span class="badge badge-danger">-<?= $pd->book_discount ?>%</span> <br />
                                        <?php endif ?>

                                        <?php

                                            $disc = $pd->book_price * $pd->book_discount / 100;
                                            $harga_asli = $pd->book_price - $disc;

                                            ?>

                                        <span class="sale-price mt-2"><?= rupiah($harga_asli) ?></span>
                                    </div>
                                </div>
                                <div class="product-box__action action-3">

                                    <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>" class="add-to-cart"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i
                                            class="fa fa-shopping-bag"></i></a>

                                </div>
                            </div>
                            <?php endforeach ?>


                        </div>
                        <div class="promo-box text-center" style="border-radius: 10px;">
                            <a href="#"><img src="assets/img/banner/home3-banner3.jpg" alt="promo" width="100%"
                                    height="200px" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Produk Rekomendasi area End -->

    <!-- Subscribe area Start -->
    <div class="container mb-5">
        <div class="subscription-area primary-bg" style="border-radius: 10px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-sm--30">
                        <div class="subscription-text">
                            <div class="subscription-text__icon">
                                <i class="fa fa-envelope-open color--white"></i>
                            </div>
                            <div class="subscription-text__right">
                                <h4 class="color--white">
                                    Dapatkan Info Dan Promo Terbaru
                                </h4>
                                <p class="color--white">
                                    Daftarkan Email Anda Untuk Menerima Informasi Dan Promo
                                    Menarik Dari Kami.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form class="newsletter-form validate"
                            action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                            target="_blank" novalidate="">
                            <input type="email" class="newsletter-form__input" id="email"
                                placeholder="Enter your email.." />
                            <input type="submit" value="Subscribe" class="newsletter-form__submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe area End -->
</main>
<!-- Main Wrapper End -->

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-slide", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active-slide";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>