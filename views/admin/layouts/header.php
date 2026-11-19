<?php
require_once __DIR__ . '/../../../config.php';
require_once BASE_PATH . '/helpers/Auth.php';

if (!empty($requireOperator)) {
    Auth::requireOperator();   // doctors are sent back to the dashboard
} else {
    Auth::requireLogin();      // visitors are sent to the login page
}

// Name of the current file, used to highlight the active menu item (e.g. "dashboard.php")
$currentFilename = basename($_SERVER['SCRIPT_NAME']);

?>

<!doctype html>

<html
    lang="en"
    class="layout-menu-fixed layout-compact"
    data-assets-path="<?= asset('assets/'); ?>"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>M Clinic</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= asset('assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="<?= asset('assets/vendor/fonts/iconify-icons.css'); ?>" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="<?= asset('assets/vendor/css/core.css'); ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="<?= asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />

    <!-- endbuild -->

    <link rel="stylesheet" href="<?= asset('assets/vendor/libs/apex-charts/apex-charts.css'); ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= asset('assets/vendor/js/helpers.js'); ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="<?= asset('assets/js/config.js'); ?>"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                                <img src="<?= asset('assets/imgs/icon.png'); ?>" alt="Logo" width="30" height="30" />
                            </span>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">Benz</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
                    </a>
                </div>

                <div class="menu-divider mt-0"></div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item <?= $currentFilename === 'dashboard.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/dashboard.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-smile"></i>
                            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </li>

                    <?php if (Auth::isOperator()) : ?>
                        <li class="menu-item <?= $currentFilename === 'booking.php' ? 'active' : '' ?>">
                            <a href="<?= url('views/admin/booking.php'); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-run"></i>
                                <div class="text-truncate" data-i18n="Boxicons">Booking</div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="menu-item <?= $currentFilename === 'appointments.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/appointments.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div class="text-truncate" data-i18n="Boxicons">Appointments
                            </div>
                        </a>
                    </li>



                    <li class="menu-item <?= $currentFilename === 'payments.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/payments.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div class="text-truncate" data-i18n="Boxicons">Payments
                            </div>
                        </a>
                    </li>



                    <li class="menu-item <?= $currentFilename === 'doctor_availability.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/doctor_availability.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div class="text-truncate" data-i18n="Boxicons">Doctor Availability
                            </div>
                        </a>
                    </li>




                    <li class="menu-item <?= $currentFilename === 'doctors.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/doctors.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div class="text-truncate" data-i18n="Boxicons">Doctors
                            </div>
                        </a>
                    </li>
                    <li class="menu-item <?= $currentFilename === 'treatments.php' ? 'active' : '' ?>">
                        <a href="<?= url('views/admin/treatments.php'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-door-open"></i>
                            <div class="text-truncate" data-i18n="Boxicons">Treatments
                            </div>
                        </a>
                    </li>



                    <?php if (Auth::isOperator()) : ?>
                        <li class="menu-item <?= $currentFilename === 'users.php' ? 'active' : '' ?>">
                            <a href="<?= url('views/admin/users.php'); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-smile"></i>
                                <div class="text-truncate" data-i18n="Boxicons">Users</div>
                            </a>
                        </li>
                    <?php endif; ?>


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav
                    class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a
                                    class="nav-link dropdown-toggle hide-arrow p-0"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= asset('assets/img/avatars/1.png'); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= asset('assets/img/avatars/1.png'); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0"><?= Auth::username(); ?></h6>
                                                    <small class="text-body-secondary text-capitalize"><?= Auth::permission(); ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= url('services/logout.php'); ?>">
                                            <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">