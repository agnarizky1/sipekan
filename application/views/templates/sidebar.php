<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= base_url('Admin') ?>" target="_blank">
            <img src="<?= base_url('assets') ?>/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">SIPEKAN</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="sidenav-header">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="ms-1 font-weight-bold text-white">Sistem Informasi Pemesanan Kendaraan</span>
        </div>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' and $this->uri->segment(2) == "") {
                                        echo "active bg-gradient-primary";
                                    } ?>" href="<?= base_url('Admin') ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <?php if ($this->session->userdata('role_id') == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link text-white <?php if ($this->uri->segment(1) == 'User') {
                                                        echo "active bg-gradient-primary";
                                                    } ?>" href="<?= base_url('User') ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">people</i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
            <?php } else { ?>

            <?php } ?>

            <li class="nav-item">
                <a href="<?= base_url('Kendaraan') ?>" class="nav-link text-white <?php if ($this->uri->segment(1) == 'Kendaraan') {
                                                                                        echo "active bg-gradient-primary";
                                                                                    } ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_shipping</i>
                    </div>
                    <span class="nav-link-text ms-1">Kendaraan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('Driver') ?>" class="nav-link text-white <?php if ($this->uri->segment(1) == 'Driver') {
                                                                                    echo "active bg-gradient-primary";
                                                                                } ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">airline_seat_recline_normal</i>
                    </div>
                    <span class="nav-link-text ms-1">Driver</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('Pesanan') ?>" class="nav-link text-white <?php if ($this->uri->segment(1) == 'Pesanan') {
                                                                                    echo "active bg-gradient-primary";
                                                                                } ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">car_rental</i>
                    </div>
                    <span class="nav-link-text ms-1">Pesanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('Laporan') ?>" class="nav-link text-white <?php if ($this->uri->segment(1) == 'Laporan') {
                                                                                    echo "active bg-gradient-primary";
                                                                                } ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">fact_check</i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('Auth/logout') ?>" class="nav-link text-white">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">