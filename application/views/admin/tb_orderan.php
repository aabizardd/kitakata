<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<div class="card mt-2 p-2" style="background-color: #f3f3f3;">



    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nomor Pemesan</th>
                <th>Alamat Pemesan</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            <?php foreach ($orders as $o) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $o->order_name ?></td>
                <td><?= $o->order_phone_number ?></td>
                <td><?= $o->order_address ?></td>
                <td><?= rupiah($o->order_total_price) ?></td>
                <td style="width: 200px;"><?= $o->status_name ?></td>
                <td>

                    <a class="btn btn-info mb-2" href="<?= base_url('assets/img/bukti_bayar/' . $o->order_proof) ?>"
                        target="_blank">Lihat Bukti Bayar</a> <br>
                    <?php if ($o->order_status == 6) : ?>

                    <a class="btn btn-success mb-2" href="<?= base_url("admin/update_pesanan/$o->order_id/2") ?>">Terima
                        Pesanan</a> <br>
                    <a class="btn btn-danger mb-2" href="<?= base_url("admin/update_pesanan/$o->order_id/7") ?>">Tolak
                        Pesanan</a>


                    <?php elseif ($o->order_status == 2) : ?>

                    <button class="btn btn-success mb-2 kirim" data-bs-toggle="modal"
                        data-bs-target="#modal-add-delivery" data-id="<?= $o->order_id ?>">
                        Kirim Barang</button> <br>

                    <?php elseif ($o->order_status == 3) : ?>

                    <a class="btn btn-success mb-2"
                        href="<?= base_url("admin/update_pesanan/$o->order_id/4") ?>">Selesaikan Pesanan</a> <br>

                    <?php elseif ($o->order_status == 7 || $o->order_status == 4) : ?>




                    <?php endif ?>





                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<!-- Edit Kategori Modal -->
<div class="modal fade text-left" id="modal-add-delivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">
                    Kirim Barang
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/kirim_pesanan') ?>" method="POST">

                    <div class="form-group">
                        <label for="helperText">Jasa Pengirim</label>
                        <input type="text" class="form-control" placeholder="Nama Jasa Pengirim" name="order_delivery"
                            id="order_delivery" required />
                    </div>

                    <div class="form-group">
                        <label for="helperText">Nomor Resi</label>
                        <input type="text" class="form-control" placeholder="Nomor Resi" name="order_receipt"
                            id="order_receipt" required />
                    </div>



                    <input type="hidden" class="form-control" name="order_id" id="order_id" required />


                    <button class="btn btn-primary ml-1" type="submit">

                        Submit
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script>
$(document).on("click", ".kirim", function() {
    var orderId = $(this).data('id');

    $(".modal-body #order_id").val(orderId);
    // $(".modal-body #category_id").val(categoryId);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
</script>