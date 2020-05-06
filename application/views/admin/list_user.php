<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="font-weight-bold text-dark"> Daftar Semua User </h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. </th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Jika Data Buku kosong atau tidak ada -->
                        <?php if (empty($users)) { ?>
                            <div class="alert alert-danger">Belum ada user</div>

                            <!-- Jika Data User tidak kosong -->
                        <?php } else { ?>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr class="text-center">
                                    <td>
                                        <?= $i++ ?>
                                    </td>
                                    <td>
                                        <?= $user->user_nama ?>
                                    </td>
                                    <td>
                                        <?= $user->user_username; ?>
                                    </td>
                                    <td>
                                        <?= $user->user_email; ?>
                                    </td>
                                    <td>
                                        <?php if (($user->user_is_active) == 1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?= $user->date_created; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->