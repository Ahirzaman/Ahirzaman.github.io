<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<header id="site-header" class="site-header valign-center"> 
    <div class="intro">
        <h2>06 January, 2024 / Sulawesi Selatan</h2>
        <h1>Membangun Aplikasi Web Yang Aman</h1>
        <p>Seminar Hasil Problem Based Learning</p>
        <a class="btn btn-white" data-scroll href="#registration">Register Now</a>
    </div>
</header>

<section id="Peserta" class="section peserta">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="info">
                    <center>
                        <h2><i class="fas fa-th-list"></i>&nbsp;&nbsp;Peserta Seminar Hasil Problem Based Learning</h2>
                    </center>
                    <hr style="border: 1px grey solid;">
                </div><br>

                <?php if (session()->getFlashdata('Pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('Pesan'); ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" class="form-inline" style="margin-top: 10px; margin-bottom: 10px;">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Cari Nama Peserta..." aria-label="Search" name="keyword">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Asal Instansi/Sekolah</th>
                                <th>No Whatsapp</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 + (5 * ($curpage - 1)); ?>
                            <?php foreach ($semnas as $dt) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $dt['email']; ?></td>
                                    <td><?= $dt['nama']; ?></td>
                                    <td><?= $dt['insek']; ?></td>
                                    <td><?= $dt['wa']; ?></td>
                                    <td><?= $dt['jenis_kelamin']; ?></td>
                                    <td><?= $dt['alamat']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    <?= $pager->links('semnas', 'semnas_pagination') ?>
                </div>
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
