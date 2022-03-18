<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<div>
    <button class="btn btn-outline-primary block" style="float: right;" data-bs-toggle="modal"
        data-bs-target="#modal-add-category"><i class="fas fa-plus"></i> Tambah
        Kategori</button><br><br>
</div>

<div class="card mt-2 p-2" style="background-color: #f3f3f3;">



    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            <?php foreach ($categories as $key) : ?>

            <tr>
                <td><?= ++$no ?></td>
                <td><?= $key->category_name ?></td>
                <td width="300">
                    <button class="btn btn-success add-category" data-bs-toggle="modal"
                        data-bs-target="#modal-edit-category" data-id="<?= $key->category_id ?>"
                        data-name="<?= $key->category_name ?>"><i class="fas fa-edit"></i> Edit</button>
                    <a href="<?= base_url('admin/delete_category/' . $key->category_id) ?>" class="btn btn-danger"><i
                            class="fas fa-trash"></i> Delete</a>
                </td>

            </tr>

            <?php endforeach ?>
        </tbody>
    </table>

</div>

<!-- Edit Kategori Modal -->
<div class="modal fade text-left" id="modal-edit-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">
                    Edit Kategori
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/edit_category') ?>" method="POST">

                    <div class="form-group">
                        <label for="helperText">Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" name="category_name"
                            id="category_name" required />

                        <input type="hidden" class="form-control" placeholder="Nama Kategori" name="category_id"
                            id="category_id" required />

                        <p>
                            <small class="text-muted">misalkan: sejarah</small>
                        </p>
                    </div>

                    <button class="btn btn-primary ml-1" type="submit">

                        Submit
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>


<!-- Tambah Kategori Modal -->
<div class="modal fade text-left" id="modal-add-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">
                    Tambah Kategori
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/add_category') ?>" method="POST">

                    <div class="form-group">
                        <label for="helperText">Nama Kategori</label>
                        <input type="text" id="helperText" class="form-control" placeholder="Nama Kategori"
                            name="category_name" required />
                        <p>
                            <small class="text-muted">misalkan: sejarah</small>
                        </p>
                    </div>

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
$(document).on("click", ".add-category", function() {
    var categoryId = $(this).data('id');
    var categoryName = $(this).data('name');

    $(".modal-body #category_name").val(categoryName);
    $(".modal-body #category_id").val(categoryId);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
</script>