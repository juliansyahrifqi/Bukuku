<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Deskripsi</th>
                        <th>Tahun Beli</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <td width="10">
                                <?= $i++ ?>
                            </td>
                            <td width="150">
                                <?php echo $b->judul_buku ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url('assets/img/user/' . $b->gambar_buku) ?>" width="64" />
                            </td>
                            <td>
                                <?php echo $b->penerbit ?>
                            </td>
                            <td>
                                <?php echo $b->penulis ?>
                            </td>
                            <td class="small">
                                <?php echo substr($b->deskripsi, 0, 120) ?>...
                            </td>
                            <td>
                                <?php echo $b->tahun_beli ?>
                            </td>
                            <td width="250">
                                <a href="" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                <a href="#" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>