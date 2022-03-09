<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from technext.github.io/mazer/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 06:37:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/simple-datatables/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/css/bootstrap.css" />

    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/iconly/bold.css" />

    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/toastify/toastify.css" />

    <link href="<?= base_url('/') ?>unpkg.com/filepond%404.30.3/dist/filepond.css" rel="stylesheet" />
    <link
        href="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-preview%404.6.10/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/vendors/fontawesome/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/css/app.css" />
    <link rel="shortcut icon" href="<?= base_url('/') ?>assets_admin/images/favicon.html" type="image/x-icon" />


    <?php if (!$this->uri->segment(2)) : ?>
    <link rel="stylesheet" href="<?= base_url('/') ?>assets_admin/css/pages/auth.css" />

    <?php endif ?>

</head>

<body>