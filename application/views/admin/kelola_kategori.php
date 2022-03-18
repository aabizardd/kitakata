<div id="app">

    <?php $this->load->view('admin/sidebar') ?>

    <div id="main">


        <div class="page-heading">
            <h3>Kelola Kategori</h3>

        </div>

        <?= $this->session->flashdata('message') ?>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">

                                    <?php $this->load->view('admin/tb_kategori') ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </div>


    </div>
</div>

<script src="<?= base_url('/') ?>assets_admin/vendors/simple-datatables/simple-datatables.js"></script>
<script>
// Simple Datatable
let table1 = document.querySelector("#table1");
let dataTable = new simpleDatatables.DataTable(table1);
</script>