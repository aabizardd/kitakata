<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>


<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="single-products-area section-padding section-sm-padding">
        <div class="container">
            <!-- Single Product Start -->
            <section class="single-product bg--white pt--80 pb--80 pt-sm--60 pb-sm--60">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Tab Content Start -->
                        <div class="tab-content product-thumb-large" id="myTabContent-3">
                            <div class="tab-pane fade show active" id="product-large-one">
                                <div class="single-product__img easyzoom">
                                    <img src="<?= base_url('/') ?>assets/img/book_cover/<?= $books_detail['book_cover'] ?>"
                                        alt="product">
                                    <a class="popup-btn"
                                        href="<?= base_url('/') ?>assets/img/book_cover/<?= $books_detail['book_cover'] ?>"><i
                                            class="fa fa-search-plus"></i>Large Image</a>
                                </div>
                            </div>

                        </div>
                        <!-- Tab Content End -->


                    </div>
                    <div class="col-lg-6">
                        <!-- Single Product Content Start -->
                        <div class="single-product__content">
                            <div class="single-product__top">
                                <h2 class="single-product__name"><?= $books_detail['book_name'] ?></h2>
                                <div class="ratings-wrap">
                                    <div class="ratings">
                                        <i class="fa fa-star rated"></i>
                                        <i class="fa fa-star rated"></i>
                                        <i class="fa fa-star rated"></i>
                                        <i class="fa fa-star rated"></i>
                                        <i class="fa fa-star rated"></i>
                                    </div>
                                    <!-- <span>(2 Customer Reviews)</span> -->
                                </div>
                                <div class="single-product__price">
                                    <span class="regular-price"><?= rupiah($books_detail['book_price']) ?></span>
                                    <?php if ($books_detail['book_discount'] != 0) : ?>
                                    <span class="badge badge-danger">-<?= $books_detail['book_discount'] ?>%</span>

                                    <?php endif ?>

                                    <?php

                                    $disc = $books_detail['book_price'] * $books_detail['book_discount'] / 100;
                                    $harga_asli = $books_detail['book_price'] - $disc;

                                    ?>

                                    <span class="sale-price mt-2 ml-2"><?= rupiah($harga_asli) ?></span>
                                </div>
                            </div>
                            <div class="single-product__middle">
                                <p class="single-product__short-desc">

                                <h5>Data Buku</h5>
                                <table>
                                    <tr>
                                        <th style="width: 90px;">Judul Buku</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Penulis</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_writer'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Genre</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['category_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Penerbit</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_publisher'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Cetakan</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_edition'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Ukuran</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_size'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Tebal</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_thick'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Berat</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_weight'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">ISBN</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= $books_detail['book_isbn'] ?></td>
                                    </tr>

                                    <tr>
                                        <th style="width: 90px;">Harga Asli</th>
                                        <td style="width: 20px;">:</td>
                                        <td><?= rupiah($books_detail['book_price']) ?></td>
                                    </tr>


                                </table>

                                </p>
                                <p class="product-availability"><i
                                        class="fa fa-check-circle"></i><?= $books_detail['book_stock'] ?> Stok Tersedia
                                </p>

                                <form action="<?= base_url('shop/tambah_keranjang_by_form') ?>" method="POST">
                                    <div class="product-action-wrapper">

                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="qty" id="qty2" value="1"
                                                min="1"
                                                style="border: none;background-color: #e9e9e9;border-radius: 5px;"
                                                autofocus>
                                            <input type="hidden" name="book_id" value="<?= $books_detail['book_id'] ?>">
                                        </div>
                                        <button type="submit" class="btn add-to-cart btn-style-1 color-1">
                                            Add To Cart
                                        </button>

                                    </div>
                                </form>

                            </div>

                            <div class="single-product__meta">
                                <p>
                                    <strong>Kategori Buku:</strong>
                                    <a
                                        href="<?= base_url('shop/?category=' . $books_detail['category_name']) ?>"><?= $books_detail['category_name'] ?></a>
                                </p>

                            </div>
                            <div class="social-buttons">
                                <a href="https://facebook.com/" target="_blank" rel="noopener"
                                    class="facebook social-button">
                                    <i class="fa fa-facebook"></i>
                                    <span>Like</span>
                                </a>
                                <a href="https://twitter.com/" target="_blank" rel="noopener"
                                    class="twitter social-button">
                                    <i class="fa fa-twitter"></i>
                                    <span>Tweet</span>
                                </a>
                                <a href="plus.google.html" class="gplus social-button">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                            <div class="social-share">
                                <strong>Share This Product</strong>
                                <ul class="social">
                                    <li class="social__item"><a href="https://facebook.com/" target="_blank"
                                            rel="noopener" class="social__link"><i
                                                class="fa fa-facebook social__icon"></i></a></li>
                                    <li class="social__item"><a href="https://twitter.com/" target="_blank"
                                            rel="noopener" class="social__link"><i
                                                class="fa fa-twitter social__icon"></i></a></li>
                                    <li class="social__item"><a href="plus.google.html" class="social__link"><i
                                                class="fa fa-google-plus social__icon"></i></a></li>
                                    <li class="social__item"><a href="https://pinterest.com/" target="_blank"
                                            rel="noopener" class="social__link"><i
                                                class="fa fa-pinterest social__icon"></i></a></li>
                                    <li class="social__item"><a href="https://pinterest.com/" target="_blank"
                                            rel="noopener" class="social__link"><i
                                                class="fa fa-linkedin social__icon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Single Product Content End -->
                    </div>
                </div>
            </section>
            <!-- Single Product End -->

            <!-- Single Product Tab Start -->
            <section class="single-product-tab pt--60 pb--40 pt-sm--40 pb-sm--30">
                <div class="row">
                    <div class="col-12">
                        <ul class="single-product-tab__head nav nav-tab" id="singleProductTab" role="tablist">
                            <li class="nav-item single-product-tab__item">
                                <a class="nav-link single-product-tab__link active" id="nav-desc-tab"
                                    data-bs-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc"
                                    aria-selected="true">Sinopsis</a>
                            </li>
                            <li class="nav-item single-product-tab__item">
                                <a class="nav-link single-product-tab__link" id="nav-details-tab" data-bs-toggle="tab"
                                    href="#nav-details" role="tab" aria-controls="nav-details"
                                    aria-selected="true">Informasi Tambahan</a>
                            </li>


                        </ul>
                        <div class="single-product-tab__content tab-content bg--white">
                            <div class="tab-pane fade show active" id="nav-desc" role="tabpanel"
                                aria-labelledby="nav-desc-tab">
                                <p class="product-description"><?= $books_detail['book_synopsis'] ?></p>

                                </p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="nav-details" aria-labelledby="nav-details-tab">
                                <div class="product-additional-info">
                                    <h3>Additional Information</h3>
                                    <div class="table-content table-responsive">
                                        <table class="shop_attributes">
                                            <tr>
                                                <th>Judul Buku: </th>
                                                <td>
                                                    <p><?= $books_detail['book_name'] ?></p>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Single Product Tab End -->

            <!-- You may also like Product Start -->
            <section class="related-products-area section-padding section-sm-padding">
                <div class="row">
                    <div class="col-12 mb--20">
                        <div class="section-title title-1">
                            <h2>Mungkin kamu juga suka....</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="related-product-carousel owl-carousel product-carousel-hover">
                            <?php foreach ($products as $pd) : ?>
                            <div class="related-product">
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
                                    <div class="product-box__action action-2">

                                        <a href="<?= base_url('tambah_keranjang/' . $pd->book_id) ?>"
                                            class="add-to-cart" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Add to cart"><i class="fa fa-shopping-bag"></i> add to cart</a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- You may also like Product End -->


        </div>
    </div>
</div>
<!-- Main Content Wrapper End -->