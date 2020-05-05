<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bukuku</div>
    </a>

    <!-- Divider -->


    <?php if ($user['user_role_id'] == 1) { ?>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/buku'); ?>">
                <i class="fas fa-fw fa-swatchbook"></i>
                <span>Buku</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/userlist'); ?>">
                <i class="fas fa-fw fa-swatchbook"></i>
                <span>User</span></a>
        </li>

    <?php } else { ?>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item User-->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-fw fa-user"></i>
                <span>All Books</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-fw fa-user"></i>
                <span>My Favourite</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-fw fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>



    <?php } ?>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?> ">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->