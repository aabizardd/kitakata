<div id="app">

    <?php $this->load->view('admin/sidebar') ?>

    <div id="main">


        <form action="<?= base_url('admin/add_book') ?>" method="POST" enctype="multipart/form-data">

            <div class="page-heading">
                <h3>Tambah Buku
                    <button style="float: right;" class="btn btn-info" type="submit"><i class="fas fa-save"></i> Simpan
                        Data
                        Buku</button>
                </h3>

            </div>

            <?= $this->session->flashdata('message') ?>



            <div class="page-content">


                <section class="row">
                    <div class="col-lg-6 col-sm-12">



                        <div class="card">

                            <div class="card-body">

                                <!-- <div>
                                    <img src="<?= base_url('assets/img/book_cover/default.png') ?>" alt="">
                                </div> -->


                                <div class="form-group">

                                    <label for="helperText">Cover Buku</label>
                                    <input type="file" class="form-control" name="book_cover" />

                                </div>



                                <div class="form-group">

                                    <label for="helperText">Judul Buku</label>
                                    <textarea type="text" id="helperText" class="form-control" placeholder="Judul Buku"
                                        name="book_name" rows="4" required></textarea>
                                    <p>
                                        <small class="text-muted">Find helper text here for given textbox.</small>
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Kategori Buku</label>
                                    <select id="helperText" class="form-select" name="book_category" required>
                                        <?php foreach ($categories as $c) : ?>
                                        <option value="<?= $c->category_id ?>"><?= $c->category_name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <!-- <p>
                                        <small class="text-muted">Find helper text here for given textbox.</small>
                                    </p> -->
                                </div>

                                <div class="form-group">
                                    <label for="helperText">Diskon Harga</label>
                                    <input type="number" id="helperText" class="form-control" placeholder="Diskon Harga"
                                        name="book_discount" min="0" value="0" />
                                    <p>
                                        <small class="text-muted">Satuan dalam persen (%).</small>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="helperText">Harga Buku</label>
                                    <input type="text" id="rupiah" class="form-control" placeholder="Harga Buku"
                                        name="book_price" required />

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Stok Buku</label>
                                    <input type="number" id="helperText" class="form-control" placeholder="Stok Buku"
                                        name="book_stock" min="0" required />

                                </div>




                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6 col-sm-12">



                        <div class="card">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="helperText">Penulis Buku</label>
                                    <input type="text" class="form-control" placeholder="Penulis Buku"
                                        name="book_writer" />

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Penerbit Buku</label>
                                    <input type="text" class="form-control" placeholder="Penerbit Buku"
                                        name="book_publisher" />

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Edisi Buku</label>
                                    <input type="text" class="form-control" placeholder="Edisi Buku"
                                        name="book_edition" />

                                    <p>
                                        <small class="text-muted">Contoh: I, Desember 2021.</small>
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Ukuran Buku</label>
                                    <input type="text" class="form-control" placeholder="Ukuran Buku"
                                        name="book_size" />

                                    <p>
                                        <small class="text-muted">Contoh: 13 x 20 cm</small>
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Tebal Buku</label>
                                    <input type="text" class="form-control" placeholder="Tebal Buku"
                                        name="book_thick" />

                                    <p>
                                        <small class="text-muted">Contoh: 240 Halaman (1,3 cm)</small>
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label for="helperText">Berat Buku</label>
                                    <input type="number" class="form-control" placeholder="Berat Buku"
                                        name="book_weight" />

                                    <p>
                                        <small class="text-muted">Satuan berat ini adalah gram (gr)</small>
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label for="helperText">ISBN</label>
                                    <input type="text" class="form-control" placeholder="ISBN" name="book_isbn" />



                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="col-lg-12 col-sm-12">



                        <div class="card">

                            <div class="card-body">
                                <textarea id="editor" name="book_synopsis">
                                    <p>Tulis sinopsis disini.</p>
                                </textarea>
                            </div>
                        </div>


                    </div>

                </section>



            </div>

        </form>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script src="<?= base_url('/') ?>assets_admin/vendors/simple-datatables/simple-datatables.js"></script>
<script>
// Simple Datatable
let table1 = document.querySelector("#table1");
let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script>
var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>