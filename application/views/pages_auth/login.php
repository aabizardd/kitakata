<!-- Main Wrapper Start -->
<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>



<main id="content" class="main-content-wrapper">


    <!-- Promo Product area Start -->
    <div class="new-products-area section-padding section-sm-padding section-sm-padding">
        <div class="container">
            <div class="row align-items-center mb--20">
                <div class="col-xl-3 col-md-4">
                    <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                        <h2>Masuk KitaKataStore</h2>
                    </div>
                </div>


            </div>


            <?= $this->session->flashdata('message') ?>


            <div class="row no-gutters">
                <div class="col-12">
                    <div class="category-porducts-wrapper bg--white" style="border-radius: 10px;padding-top: 20px;">


                        <form method="POST" action="<?= base_url('auth') ?>">
                            <div class="">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                                    name="username" value="<?= set_value('username'); ?>">

                            </div>

                            <div class="mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>


                            <button type="submit" class="btn btn-small btn-icon btn-style-1 color-1 mt-4">Login</button>
                        </form>

                        <p class="mt-4"><a href="<?= base_url('forgot_password') ?>">Lupa password?</a></p>
                        <a class="" style="color: black;">Belum punya akun? <a
                                href="<?= base_url('registrasi') ?>">Registrasi disini</a></a>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Promo Product area End -->

    <!-- Promo area 3 COL Start -->
    <!-- <div class="promo-area section-padding section-sm-padding">
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
    </div> -->
    <!-- Promo area 3 COL End -->



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