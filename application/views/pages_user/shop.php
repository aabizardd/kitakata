<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>



<!-- Main Wrapper Start -->
<main id="content" class="main-content-wrapper">
    <div class="shop-area pt--40 pb--80 pt-sm--30 pb-sm--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 mb-md--40">
                    <!-- Shop Toolbar Start -->
                    <div class="shop-toolbar">
                        <div class="shop-toolbar__grid-list">
                            <ul class="nav">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#list"><i class="fa fa-list"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-toolbar__shorter">
                            <label>Short By:</label>
                            <select class="short-select nice-select">
                                <option value="1">Relevance</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                        <span class="shop-toolbar__product-count">Terdapat <?= $book_ct ?> Produk Tersedia.</span>
                    </div>
                    <!-- Shop Toolbar End -->

                    <!-- Shop Layout Start -->
                    <div class="main-shop-wrapper">
                        <div class="tab-content" id="myTabContent-2">
                            <div class="tab-pane show active" id="grid">
                                <div class="product-grid-view three-column">
                                    <div class="row no-gutters">

                                        <?php foreach ($products as $pd) : ?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="product-box product-box-hover-down bg--white color-1">
                                                <div class="product-box__img">
                                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                                        alt="product" class="primary-image" />

                                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                                        alt="product" class="secondary-image" />

                                                    <a href="<?= base_url('detail_product/' . $pd->book_id) ?>"
                                                        class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                </div>

                                                <div class="product-box__content">
                                                    <h3 class="product-box__title">
                                                        <a
                                                            href="<?= base_url('detail_product/' . $pd->book_id) ?>"><?= substr($pd->book_name, 0, 40) . "...." ?></a>
                                                    </h3>
                                                    <div class="ratings">

                                                    </div>
                                                    <div class="product-box__price">
                                                        <span
                                                            class="regular-price"><?= rupiah($pd->book_price) ?></span>
                                                        <?php if ($pd->book_discount != 0) : ?>
                                                        <span
                                                            class="badge badge-danger">-<?= $pd->book_discount ?>%</span>

                                                        <?php endif ?>

                                                        <?php

                                                            $disc = $pd->book_price * $pd->book_discount / 100;
                                                            $harga_asli = $pd->book_price - $disc;

                                                            ?>

                                                        <span class="sale-price mt-2"><?= rupiah($harga_asli) ?></span>
                                                    </div>
                                                </div>
                                                <div class="product-box__action action-2">

                                                    <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>"
                                                        class="add-to-cart" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Add to cart"><i
                                                            class="fa fa-shopping-bag"></i> add to
                                                        cart</a>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>




                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <ul class="pagination">
                                                <li class="prev">
                                                    <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                                </li>
                                                <li><a href="#">1</a></li>
                                                <li class="current"><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li class="next">
                                                    <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="list">
                                <div class="product-list-view">

                                    <?php foreach ($products as $pd) : ?>
                                    <div class="product-box product-box--list bg--white">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="product-box__img">
                                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                                        alt="product" class="primary-image" />

                                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $pd->book_cover ?>"
                                                        alt="product" class="secondary-image" />

                                                    <a href="<?= base_url('detail_product/' . $pd->book_id) ?>"
                                                        class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
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
                                                        <span
                                                            class="regular-price"><?= rupiah($pd->book_price) ?></span>
                                                        <?php if ($pd->book_discount != 0) : ?>
                                                        <span
                                                            class="badge badge-danger">-<?= $pd->book_discount ?>%</span>

                                                        <?php endif ?>

                                                        <?php

                                                            $disc = $pd->book_price * $pd->book_discount / 100;
                                                            $harga_asli = $pd->book_price - $disc;

                                                            ?>

                                                        <span
                                                            class="sale-price mt-2 ml-2"><?= rupiah($harga_asli) ?></span>
                                                    </div>
                                                    <p class="product-box__desc">
                                                        <?= substr($pd->book_synopsis, 0, 200) ?>
                                                    </p>
                                                    <div class="product-box__action action-4">
                                                        <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>"
                                                            class="add-to-cart" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Add to cart"><i
                                                                class="fa fa-shopping-bag"></i> Add
                                                            to
                                                            cart</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>

                                    <ul class="pagination">
                                        <li class="prev">
                                            <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li class="current"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next">
                                            <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Layout End -->
                </div>
                <div class="col-lg-3 order-lg-1">
                    <aside class="sidebar">
                        <!-- Product Categories Widget Start -->
                        <div class="sidebar-widget product-widget product-cat-widget">
                            <h3 class="widget-title">Kategori Buku</h3>
                            <div class="widget_conent">
                                <ul class="product-categories">

                                    <?php foreach ($categories as $c) : ?>
                                    <li class="cat-item">
                                        <a
                                            href="<?= base_url('shop/?category=' . $c->category_name) ?>"><?= $c->category_name ?></a>
                                        <span class="count">(<?= $c->book_count ?>)</span>
                                    </li>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </div>
                        <!-- Product Categories Widget End -->



                        <!-- Product Banner Widget Start -->
                        <div class="sidebar-widget banner-widget">
                            <div class="promo-box full-width bg--white">
                                <a href="#">
                                    <img src="<?= base_url('/') ?>assets/img/banner/home1-product-banner-1.jpg"
                                        alt="promo" />
                                </a>
                            </div>
                        </div>
                        <!-- Product Banner Widget End -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Wrapper End -->