<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
        <div class="col-xs-12">
            <div class="info">
                <center>
                    <h2><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;Kelola Seminar Hasil Problem Based Learning</h2>
                </center>
                <hr style="border: 1px grey solid;">
            </div><br>

            <?php if (session()->getFlashdata('pesanAdd')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesanAdd'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('pesanUpdate')) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('pesanUpdate'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('pesanDelete')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('pesanDelete'); ?>
                </div>
            <?php endif; ?>

            <div class="navbar navbar-light bg-info">
                <form action="" method="POST" class="form-inline" style="margin-bottom: 10px;">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Cari Nama Peserta..." aria-label="Search" name="key">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="submit"><b>Cari</b></button>
                        </span>
                    </div>
                </form>
                <div class="btn-group" style="background:none;">
                    <form>
                        <div class="input-group">
                            <div class="btn-group" role="group" aria-label="multibutton" style="margin-top: 10px;height: 40px;">
                                <div class="btn-group" role="group" aria-label="add">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#create">
                                        <b>
                                            <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Tambah
                                        </b>
                                    </button>
                                </div>
                                <div class="btn-group" role="group" aria-label="excel">
                                    <a href="admin/excel" type="button" class="btn btn-success" name="excel">
                                        <b>
                                            <i class="glyphicon glyphicon-file"></i>&nbsp;&nbsp;Excel
                                        </b>
                                    </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="print">
                                    <a href="admin/print" type="button" class="btn btn-default" name="print">
                                        <b>
                                            <i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Print
                                        </b>
                                    </a>
                                </div>
                            </div>
                            <div class="btn-group" role="group" aria-label="pagination" style="margin-top: 10px;">
                                <?= $pager->links('semnas', 'semnas_pagination') ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div style="overflow-x:auto;">
                <table id="table_id" class="table table-striped table-dark mydatatable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Asal Instansi/Sekolah</th>
                            <th>No Whatsapp</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Opsi/Pilihan Admin</th>
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
                                <td class="btn-class">
                                <button 
        type="button" 
        class="edit btn btn-warning btn-sm" 
        data-toggle="modal" 
        data-target="#update<?= $dt['id']; ?>" 
        data-id="<?= $dt['id']; ?>" 
        data-email="<?= $dt['email']; ?>" 
        data-nama="<?= $dt['nama']; ?>" 
        data-insek="<?= $dt['insek']; ?>" 
        data-wa="<?= $dt['wa']; ?>"
        data-jenis_kelamin="<?= $dt['jenis_kelamin']; ?>"
        data-alamat="<?= $dt['alamat']; ?>"
    >
        <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Ubah
    </button>
            <button 
                type="button" 
                class="del btn btn-danger btn-sm" 
                data-toggle="modal" 
                data-target="#delete" 
                data-id="<?= $dt['id']; ?>"
            >
                <i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Hapus
            </button>
        </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php foreach ($semnas as $dt) : ?>
            <!-- ADD -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">CREATE DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('admin/save') ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <i class="glyphicon glyphicon-book"></i>
                                </div>
                                <div class="form-group">
                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                        <input type="email" placeholder="Email" name="email" autofocus required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <input type="name" placeholder="Nama Lengkap" name="nama" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-home"></i>
                                        <input type="text" placeholder="Asal Institusi/Sekolah" name="insek" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="No Whatsapp" name="wa" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="Alamat" name="alamat" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="create" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Tambah
                                    </button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- EDIT -->
            <div class="modal fade" id="update<?= $dt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">UPDATE DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('admin/update/'.$dt['id']); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="UPDATE">
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    <i class="glyphicon glyphicon-book"></i>
                                </div>
                                <div class="form-group">
                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                        <input type="email" placeholder="Email" name="email" value="<?= $dt['email']; ?>" autofocus required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <input type="name" placeholder="Nama Lengkap" name="nama" value="<?= $dt['nama']; ?>" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-home"></i>
                                        <input type="text" placeholder="Asal Institusi/Sekolah" name="insek" value="<?= $dt['insek']; ?>" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="No Whatsapp" name="wa" value="<?= $dt['wa']; ?>" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?= $dt['jenis_kelamin']; ?>" required>
                                    </div>

                                    <div class="box-registry">
                                        <i class="glyphicon glyphicon-phone"></i>
                                        <input type="text" placeholder="Alamat" name="alamat" value="<?= $dt['alamat']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Ubah
                                    </button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- DELETE -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color:black;" class="modal-title" id="exampleModalLabel">HAPUS DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url('admin/delete/'. $dt['id']); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="modal-body bg-dark">
                                <div class="avatar">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <i class="glyphicon glyphicon-book"></i>
                                </div>
                                <div class="modal-body">
                                    <h5>Apakah anda yakin akan menghapus data ini ?</h5>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="button-class">
                                    <button type="submit" name="delete" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Hapus
                                    </button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal" class="button btn btn-danger">
                                        <i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Menangani klik pada tombol "Ubah"
        $('.edit').on('click', function() {
            // Mendapatkan data dari atribut data tombol yang diklik
            var id = $(this).data('id');
            var email = $(this).data('email');
            var nama = $(this).data('nama');
            var insek = $(this).data('insek');
            var wa = $(this).data('wa');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var alamat = $(this).data('alamat');

            // Mengisi nilai-nilai input di dalam modal "Ubah"
            $('#update input[name="id"]').val(id);
            $('#update input[name="email"]').val(email);
            $('#update input[name="nama"]').val(nama);
            $('#update input[name="insek"]').val(insek);
            $('#update input[name="wa"]').val(wa);
            $('#update input[name="jenis_kelamin"]').val(jenis_kelamin);
            $('#update input[name="alamat"]').val(alamat);
        });
    });
</script>
<?= $this->endSection(); ?>
