</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="<?= base_url('/') ?>assets_admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('/') ?>assets_admin/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('/') ?>assets_admin/vendors/apexcharts/apexcharts.js"></script>
<!-- <script src="<?= base_url('/') ?>assets_admin/js/pages/dashboard.js"></script> -->

<script src="<?= base_url('/') ?>assets_admin/js/main.js"></script>
<script src="<?= base_url('/') ?>assets_admin/vendors/choices.js/choices.min.js"></script>
<script src="<?= base_url('/') ?>assets_admin/vendors/fontawesome/all.min.js"></script>

<!-- filepond validation -->
<script
    src="<?= base_url('/') ?>unpkg.com/filepond-plugin-file-validate-size%402.2.5/dist/filepond-plugin-file-validate-size.js">
</script>
<script
    src="<?= base_url('/') ?>unpkg.com/filepond-plugin-file-validate-type%401.2.6/dist/filepond-plugin-file-validate-type.js">
</script>

<!-- image editor -->
<script
    src="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-exif-orientation%401.0.11/dist/filepond-plugin-image-exif-orientation.js">
</script>
<script src="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-crop%402.0.6/dist/filepond-plugin-image-crop.js">
</script>
<script src="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-filter%401.0.1/dist/filepond-plugin-image-filter.js">
</script>
<script
    src="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-preview%404.6.10/dist/filepond-plugin-image-preview.js">
</script>
<script src="<?= base_url('/') ?>unpkg.com/filepond-plugin-image-resize%402.0.10/dist/filepond-plugin-image-resize.js">
</script>

<!-- toastify -->
<script src="assets/vendors/toastify/toastify.js"></script>

<!-- filepond -->
<script src="<?= base_url('/') ?>unpkg.com/filepond%404.30.3/dist/filepond.js"></script>

<script>
// register desired plugins...
FilePond.registerPlugin(
    // validates the size of the file...
    FilePondPluginFileValidateSize,
    // validates the file type...
    FilePondPluginFileValidateType,

    // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
    FilePondPluginImageCrop,
    // preview the image file type...
    FilePondPluginImagePreview,
    // filter the image file
    FilePondPluginImageFilter,
    // corrects mobile image orientation...
    FilePondPluginImageExifOrientation,
    // calculates & adds resize information...
    FilePondPluginImageResize
);

// Filepond: Basic
FilePond.create(document.querySelector(".basic-filepond"), {
    allowImagePreview: false,
    allowMultiple: false,
    allowFileEncode: false,
    required: false,
});

// Filepond: Multiple Files
FilePond.create(document.querySelector(".multiple-files-filepond"), {
    allowImagePreview: false,
    allowMultiple: true,
    allowFileEncode: false,
    required: false,
});

// Filepond: With Validation
FilePond.create(document.querySelector(".with-validation-filepond"), {
    allowImagePreview: false,
    allowMultiple: true,
    allowFileEncode: false,
    required: true,
    acceptedFileTypes: ["image/png"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});

// Filepond: ImgBB with server property
FilePond.create(document.querySelector(".imgbb-filepond"), {
    allowImagePreview: false,
    server: {
        process: (
            fieldName,
            file,
            metadata,
            load,
            error,
            progress,
            abort
        ) => {
            // We ignore the metadata property and only send the file

            const formData = new FormData();
            formData.append(fieldName, file, file.name);

            const request = new XMLHttpRequest();
            // you can change it by your client api key
            request.open(
                "POST.html",
                "https://api.imgbb.com/1/upload?key=762894e2014f83c023b233b2f10395e2"
            );

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function() {
                if (request.status >= 200 && request.status < 300) {
                    load(request.responseText);
                } else {
                    error("oh no");
                }
            };

            request.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        let response = JSON.parse(this.responseText);

                        Toastify({
                            text: "Success uploading to imgbb! see console f12",
                            duration: 3000,
                            close: true,
                            gravity: "bottom",
                            position: "right",
                            backgroundColor: "#4fbe87",
                        }).showToast();

                        console.log(response);
                    } else {
                        Toastify({
                            text: "Failed uploading to imgbb! see console f12",
                            duration: 3000,
                            close: true,
                            gravity: "bottom",
                            position: "right",
                            backgroundColor: "#ff0000",
                        }).showToast();

                        console.log("Error", this.statusText);
                    }
                }
            };

            request.send(formData);
        },
    },
});

// Filepond: Image Preview
FilePond.create(document.querySelector(".image-preview-filepond"), {
    allowImagePreview: true,
    allowImageFilter: false,
    allowImageExifOrientation: false,
    allowImageCrop: false,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});

// Filepond: Image Crop
FilePond.create(document.querySelector(".image-crop-filepond"), {
    allowImagePreview: true,
    allowImageFilter: false,
    allowImageExifOrientation: false,
    allowImageCrop: true,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});

// Filepond: Image Exif Orientation
FilePond.create(document.querySelector(".image-exif-filepond"), {
    allowImagePreview: true,
    allowImageFilter: false,
    allowImageExifOrientation: true,
    allowImageCrop: false,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});

// Filepond: Image Filter
FilePond.create(document.querySelector(".image-filter-filepond"), {
    allowImagePreview: true,
    allowImageFilter: true,
    allowImageExifOrientation: false,
    allowImageCrop: false,
    imageFilterColorMatrix: [
        0.299, 0.587, 0.114, 0, 0, 0.299, 0.587, 0.114, 0, 0, 0.299, 0.587,
        0.114, 0, 0, 0.0, 0.0, 0.0, 1, 0,
    ],
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});

// Filepond: Image Resize
FilePond.create(document.querySelector(".image-resize-filepond"), {
    allowImagePreview: true,
    allowImageFilter: false,
    allowImageExifOrientation: false,
    allowImageCrop: false,
    allowImageResize: true,
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    imageResizeMode: "cover",
    imageResizeUpscale: true,
    acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});
</script>
<!-- Mirrored from technext.github.io/mazer/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 06:37:55 GMT -->

<script src="<?= base_url('/') ?>assets_admin/vendors/ckeditor/ckeditor.js"></script>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>



</html>