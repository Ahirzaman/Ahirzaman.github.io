<nav id="site-nav" class="navbar navbar-expand-lg navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <!-- logo -->
            <div class="site-branding">
                <a class="logo" href="<?= base_url('home')?>">
                    <!-- logo image -->
                    <img src="assetsbr/images/logo.png" alt="Logo">
                    Seminar 2024
                </a>
            </div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div><!-- /.navbar-header -->

        <div class="collapse navbar-collapse" id="navbar-items">
            <ul class="nav navbar-nav navbar-right">
                <!-- navigation menu -->
                <li><a href="<?= base_url('home') ?>">Home</a></li>
                <li><a data-scroll href="#schedule">Schedule</a></li>
                <li><a data-scroll href="#speakers">Speakers</a></li>
                <li><a data-scroll href="#location">Location</a></li>
                <li><a href="<?= base_url('main/chat') ?>">Chat</a></li>


            <!-- dropdown menu -->
            <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                        <?php if (logged_in()) : ?>
                            <li><a href="<?= base_url('admin') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;Kelola Data Pendaftaran</a></li>
                            <li><a href="<?= base_url('admin_upload') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;Kelola Data Upload Dokumen</a></li>
                            <li><a href="<?= base_url('logout') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Logout Admin</a></li>
                        <?php else : ?>
                            <li><a href="<?= base_url('login') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login Admin</a></li>
                            <li><a href="<?= base_url('registry') ?>"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Registrasi Semnas</a></li>
                            <li><a href="<?= base_url('registry_uploads') ?>"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;Upload Dokumen</a></li>
                            <li><a href="<?= base_url('semnas') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;Peserta Semnas</a></li>
                        <?php endif; ?>
                    </ul>
                </li>

                <!-- dropdown Profil -->
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?= session()->get('name'); ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                        <li><a href="<?= base_url('login_user') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login User</a></li>
                        <li><a href="<?= base_url('logout_user') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Logout User</a></li> 
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container -->
</nav>
