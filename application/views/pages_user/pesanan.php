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
            <?= $this->session->flashdata('message') ?>
            <div class="cart-wrapper bg--white mb--80 mb-sm--60" style="border-radius: 10px;">


                <div class="row">
                    <div class="col-12">
                        <!-- Cart Area Start -->



                        <div class="cart-table table-content table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Nomor Pemesan</th>
                                        <th scope="col">Alamat Pemesan</th>
                                        <th scope="col">Total Pembayaran</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 0; ?>
                                    <?php foreach ($orders as $order) : ?>
                                    <tr>

                                        <td style="width: 10px;"><?= ++$no ?></td>
                                        <td><?= $order->order_name ?></td>
                                        <td><?= $order->order_phone_number ?></td>
                                        <td style="width: 10px;"><?= $order->order_address ?></td>
                                        <td style="width: 50px;"><?= rupiah($order->order_total_price) ?></td>
                                        <td style="width: 10px;"><?= $order->status_name ?></td>
                                        <td>
                                            <?php if ($order->order_status == 1) : ?>
                                            <a class="btn btn-3 btn-sm"
                                                href="<?= base_url('transaction/batal/' . $order->order_id) ?>"
                                                style="width: 100px; height: 50px;border-radius: 5px;font-size: 14px;background-color: red;color: white;border: none;">Batalkan</a>
                                            <?php endif ?>

                                            <a class="btn" href="<?= base_url('detail_pesanan/' . $order->order_id) ?>"
                                                style="width: 100px; height: 50px;border-radius: 5px;font-size: 14px;background-color: blue;color: white;">Detail
                                                Pesanan</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </div>



                        <!-- Cart Area End -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Main content wrapper end -->