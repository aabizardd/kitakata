<?php


function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<div>
    <a href="<?= base_url('admin/tambah_buku') ?>" class="btn btn-outline-primary block" style="float: right;"><i
            class="fas fa-plus"></i> Tambah
        Buku</a><br><br>
</div>

<div class="card mt-2 p-2" style="background-color: #f3f3f3;">



    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Cover Buku</th>
                <th>Judul Buku</th>
                <th>Harga Buku</th>
                <th>Kategori Buku</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            <?php foreach ($books as $book) : ?>

            <tr>
                <td><?= ++$no ?></td>
                <td width="20"><img src="<?= base_url('assets/img/book_cover/' . $book->book_cover)  ?>" alt=""
                        srcset="" style="height: 250px;width: 250px;"></td>
                <td><?= $book->book_name ?></td>
                <td width="150"><?= rupiah($book->book_price) ?></td>
                <td width="150"><?= $book->category_name ?></td>
                <td width="250">

                    <a href="<?= base_url('admin/edit_buku/' . $book->book_id) ?>" class="btn btn-success mt-2">

                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <a class="btn btn-danger mt-2" href="<?= base_url('admin/delete_book/' . $book->book_id) ?>"><i
                            class="fas fa-trash"></i> Delete</a>

                </td>
            </tr>
            <?php endforeach ?>

            <!-- <?php $no = 0 ?>
            <?php foreach ($materials as $m) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td>
                    <img src="<?= base_url('assets/fileupload/img_materi/' . $m->image)  ?>" alt="" srcset=""
                        width="250">
                </td>
                <td><?= $m->material_text ?></td>
                <td><?= $m->material_translate ?></td>
                <td><?= $m->theme_name ?></td>
                <td>

                    <button class="btn btn-success mt-2 edit-data" data-bs-toggle="modal" data-bs-target="#default"
                        data-idmaterial="<?= $m->id_material ?>" data-image="<?= $m->image ?>"
                        data-text="<?= $m->material_text ?>" data-translate="<?= $m->material_translate ?>"
                        data-theme="<?= $m->theme_name ?>" data-codetheme="<?= $m->code_theme ?>">

                        <i class="fas fa-edit"></i> Edit</button>
                    <a class="btn btn-danger mt-2"
                        href="<?= base_url('admin/managing_material/delete/' . $m->id_material) ?>"><i
                            class="fas fa-trash"></i> Delete</a>

                </td>
            </tr>
            <?php endforeach ?> -->


        </tbody>
    </table>

</div>