<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>



<!-- Main content wrapper start -->

<div class="main-content-wrapper">
    <div class="cart-area pt--40 pb--80 pt-sm--30 pb-sm--60">
        <div class="container">
            <div class="cart-wrapper bg--white mb--80 mb-sm--60">
                <div class="row">
                    <div class="col-12">
                        <!-- Cart Area Start -->
                        <form action="<?= base_url('shop/update_cart') ?>" method="POST" class="form form--cart">
                            <div class="cart-table table-content table-responsive">
                                <table class="table mb--30">
                                    <thead>
                                        <tr>
                                            <th>remove</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Unit Discount</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $total_all = 0 ?>

                                        <?php foreach ($this->cart->contents() as $items) : ?>




                                        <tr>
                                            <td><a href="<?= base_url('delete_cart/' . $items['rowid']) ?>"><i
                                                        class="fa fa-times"></i></a></td>
                                            <!-- <td>
                                                <a href="single-product.html">
                                                    <img src="assets/img/products/furniture-10-150x167.jpg"
                                                        alt="product">
                                                </a>
                                            </td> -->
                                            <td class="wide-column">
                                                <p><a href="single-product.html"><?= $items['name'] ?></a></p>
                                            </td>
                                            <td class="cart-product-price wide-column">
                                                <strong><?= rupiah($items['price']) ?></strong>
                                            </td>

                                            <td class="cart-product-price">
                                                <strong><?= $items['options']['discount'] ?>%</strong>
                                            </td>

                                            <td>
                                                <div class="quantity">
                                                    <input type="number" class="quantity-input" name="qty[]" id="qty"
                                                        value="<?= $items['qty'] ?>" min="1"
                                                        style="border: none;background-color: #e9e9e9;border-radius: 5px;">

                                                    <input type="hidden" value="<?= $items['rowid'] ?>" name="rowid[]">
                                                </div>
                                            </td>

                                            <?php

                                                $total = $items['options']['total'] * $items['qty'];
                                                $total_all = $total_all + $total;

                                                ?>

                                            <td class="cart-product-price wide-column">
                                                <strong><?= rupiah($total) ?></strong>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row pb--30">

                                <div class="col-12 text-md-right">
                                    <div class="cart-btn-group">
                                        <button type="submit" class="btn btn-5 btn-style-1 color-1">Update Cart</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Cart Area End -->
                    </div>
                </div>
            </div>
            <div class="cart-page-total-wrapper">
                <div class="row justify-content-end">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="cart-page-total bg--white">

                            <div class="cart-calculator-table table-content table-responsive">
                                <table class="table">
                                    <tbody>


                                        <tr class="cart-total">
                                            <th>TOTAL</th>
                                            <td><span class="price-ammount"><?= rupiah($total_all) ?></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="https://wa.me/6281210700524/?text=Hallo%20saya%20ingin%20membeli%20buku%20di%20kitakatastore.com"
                                target="_blank" class="btn btn-6 btn-style-2">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main content wrapper end -->