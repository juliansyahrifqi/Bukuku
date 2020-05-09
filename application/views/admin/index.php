<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="mb-5 font-weight-bold text-dark text-center">Dashboard</h3>

    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Buku Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_buku; ?> Buku</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah User Card-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_user; ?> User</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah User Aktif  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User Aktif</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $active_user; ?> User</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-3x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah User Nonaktif-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User Nonaktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nonactive_user; ?> User</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-3x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>