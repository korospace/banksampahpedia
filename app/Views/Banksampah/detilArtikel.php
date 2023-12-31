<?= $this->extend('Layout/template') ?>

<!-- Meta -->
<?= $this->section('contentSeo'); ?>
    <meta name="description" content="" />
    <link rel="image_src" href="<?= $thumbnail ?>">  
<?= $this->endSection(); ?>

<!-- Css -->
<?= $this->section('contentCss'); ?>
    <style>
    </style>
    
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/detilArtikel.min.css'); ?>">
<?= $this->endSection(); ?>

<!-- JS -->
<?= $this->section('contentJs'); ?>
    <script>
		const slugBANKNAME = '<?= $slugBankName; ?>';
		const slugKATEGORI = '<?= $slugKategori; ?>';
        const slugTITLE    = '<?= $slugTitle; ?>';
    </script>
    <script src="<?= base_url('assets/js/plugins/font-awesome.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/detilArtikel.js'); ?>"></script>
<?= $this->endSection(); ?>

<!-- Body -->
<?= $this->section('content'); ?>

    <!-- **** Alert Info **** -->
    <?= $this->include('Components/alertInfo'); ?>

    <!-- ***** Header Area Start ***** -->
    <nav class="container navbar navbar-expand-lg navbar-light bg-white px-4 px-sm-5 position-sticky" style="top: 0;z-index: 10;">
        <a class="logo navbar-brand" href="<?= base_url('/'); ?>">
            <img class="logo_nav" src="<?= $data_banksampah['logo'] ?>" alt=""
                width="65" height="55">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-lg-0 mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bank/' . $data_banksampah['slug']); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($data_kat_artikel as $row) { ?>
							<a class="dropdown-item py-3" href="<?= base_url('bank/' . $data_banksampah['slug'] . "/artikel/" . $row['slug']) ?>"><?= $row['name'] ?></a>
						<?php }; ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ***** Header Area End ***** -->

    <section class="blog-single section position-relative" style="padding-top: 0;z-index: 0;">
        <div class="container px-4 px-sm-5">
            <div class="row position-relative">

                <div id="img-404" class="w-100 h-100 d-flex justify-content-center align-items-center d-none">
                    <img src="<?= base_url('assets/images/artikel-404.webp') ?>" alt="" style="min-width:100%;max-width:100%; opacity:0.7;">
                </div>

                <div class="col-lg-8 col-12 main-content">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image position-relative">
                                    <img src="<?= base_url('/assets/images/skeleton-thumbnail.webp'); ?>" alt="#" class="w-100" style="opacity: 0;">
                                    <img src="<?= $thumbnail ?>" alt="" id="blog-img" class="w-100 h-100 position-absolute img-thumbnail" style="z-index: 10;left:0;">
                                </div>
                                <div class="blog-detail">
                                    <h1 id="blog-title" class="blog-title text-justify" style="font-family: serif;font-weight: 400;"><?= $title ?></h1>
                                    <div class="blog-meta" style="">
                                        <h6 id="blog-date" class="author skeleton mt-2"></h6>
                                    </div>
                                    <div id="blog-content" class="text-justify" style="font-family: 'qc-medium';">
                                    <?php for ($i=0; $i < 4; $i++) { ?>
                                        <div class="row mb-5 px-3">
                                            <div class="col-12 mb-3 skeleton"></div>
                                            <div class="col-12 mb-3 skeleton"></div>
                                            <div class="col-12 mb-3 skeleton"></div>
                                            <div class="col-6 skeleton"></div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div id="blog-share" class="mt-4 w-100 d-none">
                                    <span class="share-label">Share this <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"/></svg></span>
                                    <a class="share-link share-facebook" rel="nofollow" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.budiluhur.ac.id/bank-sampah-budi-luhur-raih-juara-umum-dan-rekor-indonesia-award-memilah-sampah/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg> Facebook</a>
                                    <a class="share-link share-twitter" rel="nofollow" target="_blank" href="https://twitter.com/intent/tweet?text=Bank+Sampah+Budi+Luhur+Raih+Juara+Umum+dan+Rekor+Indonesia+Award+memilah+Sampah&amp;url=https://www.budiluhur.ac.id/bank-sampah-budi-luhur-raih-juara-umum-dan-rekor-indonesia-award-memilah-sampah/&amp;via=Universitas+Budi+Luhur"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg> Twitter</a>
                                    <a class="share-link share-whatsapp" rel="nofollow" target="_blank" href="https://api.whatsapp.com/send?text=Bank%20Sampah%20Budi%20Luhur%20Raih%20Juara%20Umum%20dan%20Rekor%20Indonesia%20Award%20memilah%20Sampah%20https%3A%2F%2Fwww.budiluhur.ac.id%2Fbank-sampah-budi-luhur-raih-juara-umum-dan-rekor-indonesia-award-memilah-sampah%2F"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg> WhatsApp</a>
                                    <a class="share-link share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=https://www.budiluhur.ac.id/bank-sampah-budi-luhur-raih-juara-umum-dan-rekor-indonesia-award-memilah-sampah/&amp;media=https://www.budiluhur.ac.id/wp-content/uploads/2021/09/WhatsApp-Image-2021-09-23-at-12.41.22.jpeg&amp;description=Bank+Sampah+Budi+Luhur+Raih+Juara+Umum+dan+Rekor+Indonesia+Award+memilah+Sampah"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg> Pin It</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 sidebar-content pt-4">
                    <div class="main-sidebar mt-1">
                        <div class="single-widget recent-post pb-5">
                            <h3 class="title" style="font-family: 'qc-semibold';opacity: 0.8;">Artikel Lainnya</h3>
                            <!-- Single Post -->
                            <div id="blog-recommended" class="row" style="font-family: 'qc-medium';">
                                <?php for ($i=0; $i < 4; $i++) { ?>
                                    <a id="single-post" class="col-12 col-sm-6 col-lg-12 mb-4" href="">
                                        <div class="image position-relative skeleton">
                                            <img src="<?= base_url('/assets/images/skeleton-thumbnail.webp'); ?>" alt="" class="w-100" style="opacity: 0;">
                                        </div>
                                        <div class="content mt-2">
                                            <h5 id="title" class="text-muted skeleton">
                                                
                                            </h5>
                                            <p id="date" class="mt-2 skeleton"></p>
                                        </div>
                                    </a>
                                    <hr width="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Single Widget -->

    <!-- **** footer artikiel **** -->
    <?= $this->include('Components/artikelFooter'); ?>

<?= $this->endSection(); ?>