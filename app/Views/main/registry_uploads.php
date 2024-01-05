<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="<?= base_url('css/registrystyle.css') ?>">

<header id="site-header" class="site-header valign-center"> 
    <div class="intro">
        <h2>06 January, 2024 / Sulawesi Selatan</h2>
        <h1>Membangun Aplikasi Web Yang Aman</h1>
        <p>Seminar Hasil Problem Based Learning</p>
        <a class="btn btn-white" data-scroll href="#registration">Register Now</a>
    </div>
</header>

<section id="registration" class="section pendaftaran">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="info text-center">
                    <h2><i class="fas fa-user-edit"></i> Upload Dokumen Seminar Hasil Based Learning</h2>
                    <hr class="border-dark">
                </div><br>

                <form action="<?= base_url('uploads/save'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-envelope-open-text"></i>
                                <input type="text" class="form-control" placeholder="Nama Penulis" name="penulis" autofocus required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-child"></i>
                                <input type="text" class="form-control" placeholder="Judul Paper" name="judul" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-building"></i>
                        <input type="text" class="form-control" placeholder="abstrak" name="abstrak" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="keyword" name="keyword" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Upload Dokumen" name="upload_doc" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Informasi Paper" name="info_paper" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Informasi Reviewer 1" name="info_review1" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Informasi Reviewer 2" name="info_review2" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Informasi Pembayaran" name="info_bayar" required>
                    </div>

                    <div class="form-group">
                        <i class="fab fa-whatsapp"></i>
                        <input type="text" class="form-control" placeholder="Informasi Penerimaan Paper" name="info_terima" required>
                    </div>

                    <div class="button-class text-center">
                        <button type="submit" name="save" class="btn btn-primary">
                            <i class="fas fa-check"></i> Upload Dokumen
                        </button>

                        <button onclick="window.location.href='<?= base_url('registry_uploads'); ?>" type="button" class="btn btn-danger">
                            <i class="fas fa-times"></i> Batal
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="site-info">Designed and Developed by <a href="http://technextit.com">Technext Limited</a></p>
                <ul class="social-block">
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?= $this->endSection(); ?>