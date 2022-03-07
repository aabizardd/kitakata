<!DOCTYPE html>
<html class="no-js" lang="zxx">
<!-- Mirrored from template.hasthemes.com/lazio/lazio/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Mar 2022 03:21:48 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="meta description" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url('/') ?>assets/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url('/') ?>assets/img/icon.png" />
    <title><?= $title ?></title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/bootstrap.css" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/font-awesome.min.css" />

    <!-- All Plugins CSS css -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/plugins.css" />

    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/main.css" />

    <!-- modernizr JS
    ============================================ -->
    <script src="<?= base_url('/') ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Main Wrapper Start Here -->
    <div class="wrapper bg--zircon-light color-scheme-1">
        <!-- Header Area Start Here -->
        <header class="header header-1">
            <div class="header-middle header-1--middle brand-bg d-flex align-items-center" style="height: 100px">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 tex-xl-left text-center">
                            <!-- Logo Start -->
                            <a href="<?= base_url() ?>" class="logo-box">
                                <img src="<?= base_url('/') ?>assets/img/logo/logo-white.png" alt="logo" width="180" />
                            </a>
                            <!-- Logo End -->
                        </div>
                        <div class="col-xl-5 col-lg-7 d-none d-lg-block">
                            <nav class="main-navigation" style="float: left">
                                <!-- Mainmenu Start -->
                                <?php $page_active = $this->uri->segment(1) ?>
                                <ul class="mainmenu">
                                    <li
                                        class="mainmenu__item <?= !$page_active || $page_active == 'home' ? 'active' : '' ?>">
                                        <a href="<?= base_url('') ?>" class="mainmenu__link">Home</a>
                                    </li>
                                    <li class="mainmenu__item <?= $page_active == 'shop' ? 'active' : '' ?>">
                                        <a href="<?= base_url('shop') ?>" class="mainmenu__link">Shop</a>
                                    </li>
                                </ul>
                                <!-- Mainmenu End -->
                            </nav>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <!-- Search Form Start -->
                            <form action="#" class="search-form search-form--1">
                                <div class="search-form__group search-form__group--select">
                                    <select name="category" id="searchCategory" class="search-form__select">
                                        <option value="all">Semua Kategori</option>
                                        <optgroup label="Kategori">
                                            <option>Bedroom</option>
                                            <option>Kitchen</option>
                                            <option>Livingroom</option>
                                        </optgroup>

                                        <optgroup label="Electronics" style="display: none">
                                            <option>Fridge</option>
                                            <option>Laptops, Desktops</option>
                                            <option>Mobiles, Tablets</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <input type="text" class="search-form__input" placeholder="Enter your search..." />
                                <button class="search-form__submit hover-scheme-2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                            <!-- Search Form End -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <!-- Main Mobile Menu Start -->
                            <div class="mobile-menu"></div>
                            <!-- Main Mobile Menu End -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-1--bottom">
                <div class="container">
                    <div class="row custom-row align-items-end">
                        <div class="col-lg-3">
                            <!-- Category Nav Start -->
                            <div class="category-nav">
                                <h2 class="category-nav__title primary-bg" id="js-cat-nav-title">
                                    <i class="fa fa-bars"></i> <span>Categories</span>
                                </h2>

                                <ul class="category-nav__menu <?= $page_active != '' && $page_active != 'home'  ? 'hide-in-default' : '' ?>"
                                    id="js-cat-nav">

                                    <?php foreach ($categories as $category) : ?>

                                    <li class="category-nav__menu__item">
                                        <a href="<?= base_url('shop') ?>"> <?= $category->category_name ?></a>
                                    </li>

                                    <?php endforeach ?>



                                    <li class="category-nav__menu__item">
                                        <a href="<?= base_url('shop') ?>">
                                            Lihat Semua Kategori
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Category Nav End -->
                            <div class="category-mobile-menu"></div>
                        </div>
                        <div class="col-lg-8 col-md-10">
                            <div class="corporate corporate--1">
                                <div class="corporate__single">
                                    <div class="corporate__icon">
                                        <i class="fa fa-refresh"></i>
                                    </div>
                                    <div class="corporate__content">
                                        <h3 class="corporate__title">Free Return</h3>
                                        <p class="corporate__text">
                                            30 days money back guarantee!
                                        </p>
                                    </div>
                                </div>
                                <div class="corporate__single">
                                    <div class="corporate__icon">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </div>
                                    <div class="corporate__content">
                                        <h3 class="corporate__title">FREE SHIPPING</h3>
                                        <p class="corporate__text">Free shipping on all order</p>
                                    </div>
                                </div>
                                <div class="corporate__single">
                                    <div class="corporate__icon">
                                        <i class="fa fa-support"></i>
                                    </div>
                                    <div class="corporate__content">
                                        <h3 class="corporate__title">SUPPORT 24/7</h3>
                                        <p class="corporate__text">We support online 24hrs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2 align-self-start">



                            <!-- Header Cart Start -->
                            <div class="mini-cart mini-cart--1">
                                <a class="mini-cart__dropdown-toggle" id="cartDropdown">
                                    <i class="fa fa-shopping-bag mini-cart__icon"></i>
                                    <sub class="mini-cart__count"><?= count($this->cart->contents()) ?></sub>
                                </a>
                                <div class="mini-cart__dropdown-menu">
                                    <div class="mini-cart__content">
                                        <div class="mini-cart__item">

                                            <?php


                                            function rupiahs($angka)
                                            {

                                                $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                                return $hasil_rupiah;
                                            }

                                            ?>


                                            <?php $total_all = 0 ?>

                                            <?php foreach ($this->cart->contents() as $items) : ?>
                                            <div class="mini-cart__item--single">
                                                <div class="mini-cart__item--image">
                                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $items['options']['img'] ?>"
                                                        alt="product" />
                                                </div>
                                                <div class="mini-cart__item--content">
                                                    <h4>
                                                        <a
                                                            href="single-product.html"><?= substr($items['name'], 0, 30) ?>...</a>
                                                    </h4>

                                                    <?php

                                                        $total = $items['options']['total'] * $items['qty'];
                                                        $total_all = $total_all + $total;

                                                        ?>

                                                    <p>Qty: <?= $items['qty'] ?></p>
                                                    <p><?= rupiahs($total) ?></p>
                                                </div>
                                                <a class="mini-cart__item--remove"
                                                    href="<?= base_url('delete_cart/' . $items['rowid']) ?>"><i
                                                        class="fa fa-times"></i></a>
                                            </div>
                                            <?php endforeach; ?>


                                        </div>
                                        <div class="mini-cart__total">
                                            <h4>
                                                <span class="mini-cart__total--title">Subtotal</span>
                                                <span
                                                    class="mini-cart__total--ammount"><?= rupiahs($total_all) ?></span>
                                            </h4>
                                        </div>
                                        <div class="mini-cart__btn">
                                            <a href="<?= base_url('cart') ?>"
                                                class="btn btn-small btn-icon btn-style-1 color-1">View
                                                Cart <i class="fa fa-angle-right"></i></a>
                                            <a href="checkout.html"
                                                class="btn btn-small btn-icon btn-style-1 color-1">Checkout <i
                                                    class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Header Start -->
            <div class="fixed-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <!-- Sticky Logo Start -->
                            <a class="sticky-logo" href="<?= base_url() ?>">
                                <img src="<?= base_url('/') ?>assets/img/logo/logo-white.png" alt="logo" width="170" />
                            </a>
                            <!-- Sticky Logo End -->
                        </div>
                        <div class="col-lg-9">
                            <!-- Sticky Mainmenu Start -->
                            <nav class="sticky-navigation">
                                <ul class="mainmenu sticky-menu">
                                    <li
                                        class="mainmenu__item <?= !$page_active || $page_active == 'home' ? 'active' : '' ?>">
                                        <a href="<?= base_url('') ?>" class="mainmenu__link">Home</a>
                                    </li>
                                    <li class="mainmenu__item <?= $page_active == 'shop' ? 'active' : '' ?>">
                                        <a href="<?= base_url('shop') ?>" class="mainmenu__link">Shop</a>
                                    </li>
                                </ul>
                                <div class="sticky-mobile-menu">
                                    <span class="sticky-menu-btn"></span>
                                </div>
                            </nav>
                            <!-- Sticky Mainmenu End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sticky Header End -->
        </header>
        <!-- Header Area End Here -->