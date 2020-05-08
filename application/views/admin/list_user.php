<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 my-auto">
                    <h4 class="font-weight-bold text-da">List Data User</h4>
                </div>

                <div class="col-sm-6 text-right">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active">
                            <input type="radio" name="status" value="all" checked="checked"> Semua
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="status" value="1"> Aktif
                        </label>
                        <label class="btn btn-danger">
                            <input type="radio" name="status" value="0"> Tidak Aktif
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive dt-responsive">
                <table class="table" id="myTable1"></table>
                <table class="table table-hover display nowrap" id="myTable" width="100%" cellspacing="0">
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
                                <tr class="text-center" data-status="<?= $user->user_is_active; ?>">
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
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->