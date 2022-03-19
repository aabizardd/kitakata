<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<!-- Main Wrapper Start Here -->

<div class="wrapper bg--zircon-light color-scheme-1">


    <!-- Main content wrapper start -->

    <div class="main-content-wrapper">
        <div class="checkout-area pt--40 pb--80 pt-sm--30 pb-sm--60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Area Start -->

                        <div class="checkout-wrapper bg--white" style="border-radius: 10px;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout-title">
                                        <h2>Detail Pembayaran</h2>
                                    </div>
                                    <div class="checkout-form">

                                        <div class="form-row mb--30">
                                            <div class="form__group col-md-12 mb-sm--30">
                                                <label for="order_name" class="form__label">Nama Pemesan
                                                    <span>*</span></label>
                                                <input type="text" name="order_name" id="order_name" class="form__input"
                                                    style="border-radius: 5px;" readonly
                                                    value="<?= $order_detail['order_name'] ?>" />
                                            </div>
                                        </div>

                                        <div class="form-row mb--30">
                                            <div class="form__group col-12">
                                                <label for="payment_id" class="form__label">Pembayaran</label>
                                                <input type="text" name="payment_id" id="payment_id" class="form__input"
                                                    style="border-radius: 5px;" readonly
                                                    value="<?= strtoupper($order_detail['payment_name']) . " (" . $order_detail['payment_number'] . ")" ?>" />
                                            </div>
                                        </div>



                                        <div class="form-row mb--30">
                                            <div class="form__group col-12">
                                                <label for="order_address" class="form__label">Alamat
                                                    Pengiriman</label>
                                                <textarea class="form__input form__input--textarea" id="order_address"
                                                    name="order_address" placeholder="Street Address"
                                                    style="border-radius: 5px;" required readonly><?= $order_detail['order_address'] ?>
                                                    </textarea>

                                            </div>
                                        </div>


                                        <div class="form-row mb--30">
                                            <div class="form__group col-md-12 mb-sm--30">
                                                <label for="order_phone_number" class="form__label">Nomor
                                                    Handphone</label>
                                                <input type="text" name="order_phone_number" id="order_phone_number"
                                                    class="form__input" style="border-radius: 5px;" required readonly
                                                    value="<?= $order_detail['order_phone_number'] ?>" />
                                            </div>
                                        </div>


                                        <div class="form-row mb--30">
                                            <div class="form__group col-md-12 mb-sm--30">
                                                <label for="order_date" class="form__label">Tanggal
                                                    Transaksi</label>
                                                <input type="text" name="order_date" id="order_date" class="form__input"
                                                    style="border-radius: 5px;" required readonly
                                                    value="<?= $order_detail['order_date'] ?>" />
                                            </div>
                                        </div>


                                        <div class="form-row mb--30">
                                            <div class="form__group col-md-12 mb-sm--30">
                                                <label for="info_pengiriman" class="form__label">Info
                                                    Pengiriman</label>
                                                <input type="text" name="info_pengiriman" id="info_pengiriman"
                                                    class="form__input" style="border-radius: 5px;" required readonly
                                                    value="<?= $order_detail['order_delivery'] . " (" . $order_detail['order_receipt'] . ")" ?>" />
                                            </div>
                                        </div>

                                        <div class="form-row mb--30">
                                            <div class="form__group col-md-12 mb-sm--30">
                                                <label for="order_status" class="form__label">Status
                                                    Transaksi</label>
                                                <input type="text" name="order_status" id="order_status"
                                                    class="form__input" style="border-radius: 5px;" required readonly
                                                    value="<?= $order_detail['status_name'] ?>" />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 mt-md--30">
                                    <div class="order-details" style="border-radius: 10px;">
                                        <h3 class="heading-tertiary">Orderan Anda</h3>

                                        <div class="order-table table-content table-responsive mb--30">


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 350px;">Produk</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>


                                                <tbody>

                                                    <?php $total_all = 0 ?>


                                                    <?php foreach ($book_order as $items) : ?>

                                                    <?php
                                                        $harga_discount = $items->book_price * $items->book_discount / 100;
                                                        $after_discount = ($items->book_price - $harga_discount) * $items->goods_qty;

                                                        ?>

                                                    <tr>
                                                        <td>
                                                            <?= $items->book_name ?>
                                                            <strong>x<?= $items->goods_qty ?></strong>
                                                        </td>
                                                        <td><?= rupiah($after_discount) ?></td>
                                                    </tr>



                                                    <?php endforeach; ?>
                                                </tbody>

                                                <tfoot>

                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td>
                                                            <span
                                                                class="order-total-ammount"><?= rupiah($order_detail['order_total_price']) ?></span>
                                                        </td>
                                                    </tr>

                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="checkout-payment">

                                            <?= $this->session->flashdata('message') ?>

                                            <?php if ($order_detail['order_status'] == 1) : ?>

                                            <form method="POST" enctype="multipart/form-data"
                                                action="<?= base_url('transaction/bayar_buku') ?>">
                                                <div class="payment-group">
                                                    <label for="">Bukti Pembayaran</label> <br>
                                                    <input type="file" class="btn" name="order_proof"
                                                        style="border-radius: 5px;" />
                                                </div>

                                                <input type="hidden" name="order_id"
                                                    value="<?= $order_detail['order_id'] ?>">

                                                <div class="payment-group">
                                                    <button type="submit" class="btn btn-6 btn-style-2"
                                                        style="border-radius: 5px;">
                                                        Upload Bukti Bayar
                                                    </button>
                                                </div>
                                            </form>

                                            <?php else : ?>

                                            <div class="payment-group">
                                                <a href="<?= base_url('assets/img/bukti_bayar/' . $order_detail['order_proof']) ?>"
                                                    class="btn btn-6 btn-style-2" style="border-radius: 5px;"
                                                    target="_blank">
                                                    Lihat Bukti Bayar
                                                </a>
                                            </div>

                                            <!-- <div class="payment-group">
                                                <button type="submit" class="btn btn-6 btn-style-2"
                                                    style="border-radius: 5px;">
                                                    Buat Pesanan
                                                </button>
                                            </div> -->

                                            <?php endif ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Checkout Area End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content wrapper end -->



    <!-- Scroll To Top -->

    <a class="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>


</div>
<!-- Main Wrapper End Here -->