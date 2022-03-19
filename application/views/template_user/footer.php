<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row pt--40 pb--40">
                <div class="col-md-6 mb-sm--30 col-sm-12">
                    <div class="">

                        <h4 class="mb-3" style="color:#c4c4c4;">Metode Pembayaran</h4>


                        <?php $payments = $this->db->get('t_payments')->result() ?>


                        <div class="method-box__content">
                            <div class="row">
                                <?php foreach ($payments as $payment) : ?>
                                <div class="col-2">
                                    <img src="<?= base_url('assets/img/payments/' . $payment->payment_img) ?>" alt=""
                                        width="300">
                                </div>


                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-sm--30 col-sm-12">
                    <div class="">


                        <h4 class="mb-3" style="color:#c4c4c4;">Metode Pengiriman</h4>

                        <?php $deliveries = $this->db->get('t_deliveries')->result() ?>


                        <div class="method-box__content">
                            <div class="row">
                                <?php foreach ($deliveries as $delivery) : ?>
                                <div class="col-2">
                                    <img src="<?= base_url('assets/img/delivery/' . $delivery->delivery_img) ?>" alt=""
                                        width="300">
                                </div>


                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <hr class="line" />
                </div>
            </div>
            <div class="row pt--40 pb--40">

                <div class="col-lg-10 mb-md--30">
                    <div class="row">
                        <div class="col-md-4 mb-sm--30">
                            <div class="footer-widget">
                                <h3 class="widget-title">Kontak Kami</h3>




                                <div class="method-box mt-5">
                                    <div class="method-box__icon">
                                        <a href="https://wa.me/6281210700524/" target="_blank"><i
                                                class="fa fa-phone"></i></a>
                                    </div>
                                    <div class="method-box__content">
                                        <h4>Telp/Whatsapp</h4>
                                        <p>081210700524</p>
                                    </div>

                                </div>


                                <div class="method-box mt-5">
                                    <div class="method-box__icon">
                                        <a href=""><i class="fa fa-envelope-o"></i></a>
                                    </div>
                                    <div class="method-box__content">
                                        <h4>Email</h4>
                                        <p>kitakatastore22@gmail.com</p>
                                    </div>
                                </div>

                                <div class="method-box mt-5">
                                    <div class="method-box__icon">
                                        <a href=""><i class="fa fa-home"></i></a>
                                    </div>
                                    <div class="method-box__content">
                                        <h4>Alamat Kami</h4>
                                        <p style="text-align: left;">Perum Gemilang Property Citayam 1 Blok H-20
                                            Susukan, Bojong Gede, Bogor, Jawa Barat 16920
                                        </p>
                                    </div>
                                </div>





                            </div>
                        </div>

                        <div class="col-md-4 mb-sm--30">
                            <div class="footer-widget">
                                <h3 class="widget-title">KitaKataStore</h3>
                                <ul class="widget-menu">
                                    <li><a href="contact.html">Tentang KitaKataStore</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                    <li><a href="my-account.html">Terbitkan Buku Sendiri</a></li>
                                    <li><a href="#">Jadi Reseller</a></li>
                                    <li><a href="my-account.html">Info Karier</a></li>
                                    <!-- <li><a href="#">Unsubscribe Notification</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget">
                                <h3 class="widget-title">BANTUAN</h3>
                                <ul class="widget-menu">
                                    <li><a href="about-us.html">Cara Belanja</a></li>
                                    <li>
                                        <a href="my-account.html">Jasa Pengiriman </a>
                                    </li>
                                    <li><a href="privacy.html">Konfirmasi Pembayaran</a></li>
                                    <li>
                                        <a href="terms-and-conditions.html">Lacak Pesanan</a>
                                    </li>
                                    <li><a href="#">Syarat dan Ketentuan</a></li>
                                    <li><a href="faq.html">Keuntungan Belanja</a></li>
                                    <!-- <li><a href="login-register.html">Login</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <!-- <div class="footer-widget mb--40">
                        <h3 class="widget-title">DOWNLOAD APP</h3>
                        <div class="app-btn-group">
                            <a href="#" class="app-btn apple-btn">App store</a>
                            <a href="#" class="app-btn gplay-btn">Play store</a>
                        </div>
                    </div> -->
                    <div class="footer-widget social-widget">
                        <h3 class="widget-title">Follow Us</h3>

                        <div class="row">

                            <div class="col-4">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>


                            </div>

                            <div class="col-4">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>


                            </div>

                            <div class="col-4">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>


                            </div>

                            <div class="col-4 mt-3">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="TikTok">
                                    <img src="https://pngfolio.com/images/all_img/1631443365tiktok-icon.png" alt=""
                                        style="width: 20px;">
                                </a>


                            </div>

                            <div class="col-4 mt-3">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Youtube">
                                    <i class="fa fa-youtube"></i>
                                </a>


                            </div>

                            <!-- <div class="col-4 mt-3">
                                <a class="social__link" href="https://facebook.com/" target="_blank" rel="noopener"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="facebook">
                                    <i class="fa fa-shopee"></i>
                                </a>


                            </div> -->




                        </div>




                        <!-- <a class="social__link" href="https://twitter.com/" target="_blank" rel="noopener"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>


                        <a class="social__link" href="https://pinterest.com/" target="_blank" rel="noopener"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="pinterest">
                            <i class="fa fa-instagram"></i>
                        </a>



                        <a class="social__link" href="https://linkedin.com/" target="_blank" rel="noopener"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="linkedin">
                            <i class="fa fa-tiktok"></i>
                        </a>


                        <a class="social__link" href="https://vimeo.com/" target="_blank" rel="noopener"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="vimeo">
                            <i class="fa fa-youtube"></i>
                        </a> -->

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr class="line" />
                </div>
            </div>
            <div class="row pt--40 pb--40">
                <div class="col-12 text-center">
                    <a href="index.html" class="footer-logo">
                        <img src="<?= base_url('/') ?>assets/img/logo/logo_kitakata_blue.png" alt="logo" width="180" />
                    </a>
                </div>
            </div>
            <div class="row pb--30">
                <div class="col-12 text-center">
                    <ul class="footer-menu">
                        <li><a href="<?= base_url('') ?>">Home</a></li>
                        <li><a href="<?= base_url('cart') ?>">Keranjang</a></li>
                        <li><a href="<?= base_url('shop') ?>">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr class="line" />
                </div>
            </div>
            <div class="row pt--40 pb--40">
                <div class="col-md-12 text-md-left text-center mb-sm--30">
                    <!-- Copyright Text Start -->
                    <p class="copyright-text text-center">
                        &copy; PT KitaKata Media Utama, 2022
                    </p>
                    <!-- Copyright Text End -->
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- Scroll To Top -->

<a class="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>


</div>
<!-- Main Wrapper End Here -->

<!-- ************************* JS Files ************************* -->

<!-- jQuery JS -->
<script src="<?= base_url('/') ?>assets/js/vendor/jquery.min.js"></script>

<!-- Bootstrap and Popper Bundle JS -->
<script src="<?= base_url('/') ?>assets/js/bootstrap.bundle.min.js"></script>

<!-- Plugins JS -->
<script src="<?= base_url('/') ?>assets/js/plugins.js"></script>

<!-- Ajax Mail JS -->
<script src="<?= base_url('/') ?>assets/js/ajax-mail.js"></script>

<!-- Main JS -->
<script src="<?= base_url('/') ?>assets/js/main.js"></script>
</body>

<!-- Mirrored from template.hasthemes.com/lazio/lazio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 03:22:33 GMT -->

</html>