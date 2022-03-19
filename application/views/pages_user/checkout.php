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
                        <form action="<?= base_url('transaction/create_order') ?>" method="POST">
                            <div class="checkout-wrapper bg--white" style="border-radius: 10px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout-title">
                                            <h2>Detail Pembayaran</h2>
                                        </div>
                                        <div class="checkout-form">

                                            <div class="form-row mb--30">
                                                <div class="form__group col-md-6 mb-sm--30">
                                                    <label for="first_name" class="form__label">First Name
                                                        <span>*</span></label>
                                                    <input type="text" name="first_name" id="first_name"
                                                        class="form__input" style="border-radius: 5px;" required />
                                                </div>
                                                <div class="form__group col-md-6">
                                                    <label for="last_name" class="form__label">Last Name
                                                        <span>*</span></label>
                                                    <input type="text" name="last_name" id="last_name"
                                                        class="form__input" style="border-radius: 5px;" required />
                                                </div>
                                            </div>

                                            <div class="form-row mb--30">
                                                <div class="form__group col-12">
                                                    <label for="payment_id" class="form__label">Pembayaran</label>
                                                    <select id="payment_id" name="payment_id"
                                                        class="form__input nice-select" required>
                                                        <option value="">Pilih Pembayaran...</option>
                                                        <?php foreach ($payments as $py) : ?>
                                                        <option value="<?= $py->payment_id ?>">
                                                            <?= strtoupper($py->payment_name) . " (" . $py->payment_number . ")"  ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-row mb--30">
                                                <div class="form__group col-12">
                                                    <label for="order_address" class="form__label">Alamat
                                                        Pengiriman</label>
                                                    <textarea class="form__input form__input--textarea"
                                                        id="order_address" name="order_address"
                                                        placeholder="Street Address" style="border-radius: 5px;"
                                                        required></textarea>
                                                    <span style="color: #f34b5c;"><i>*Tolong masukkan alamat anda
                                                            yang
                                                            lengkap!</i></span>
                                                </div>
                                            </div>





                                            <div class="form-row mb--30">
                                                <div class="form__group col-md-12 mb-sm--30">
                                                    <label for="order_phone_number" class="form__label">Nomor
                                                        Handphone</label>
                                                    <input type="text" name="order_phone_number" id="order_phone_number"
                                                        class="form__input" style="border-radius: 5px;" required />
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

                                                        <?php foreach ($this->cart->contents() as $items) : ?>
                                                        <?php

                                                            $total = $items['options']['total'] * $items['qty'];
                                                            $total_all = $total_all + $total;

                                                            ?>
                                                        <tr>
                                                            <td>
                                                                <?= $items['name'] ?>
                                                                <strong>x<?= $items['qty'] ?></strong>
                                                            </td>
                                                            <td><?= rupiah($total) ?></td>
                                                        </tr>



                                                        <?php endforeach; ?>
                                                    </tbody>

                                                    <tfoot>

                                                        <tr class="order-total">
                                                            <th>Order Total</th>
                                                            <td>
                                                                <span
                                                                    class="order-total-ammount"><?= rupiah($total_all) ?></span>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="order_total_price"
                                                            value="<?= $total_all ?> ">
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="checkout-payment">

                                                <div class="payment-group">
                                                    <button type="submit" class="btn btn-6 btn-style-2"
                                                        style="border-radius: 5px;">
                                                        Buat Pesanan
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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