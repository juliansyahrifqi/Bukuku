<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-icon-split" href="<?php echo site_url('buku/add') ?>">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">
                    Tambah Data
                </span>
            </a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. </th>
                            <th scope="col">Judul</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tahun Beli</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($buku as $b) : ?>
                            <tr class="text-center">
                                <td>
                                    <?= $i++ ?>
                                </td>
                                <td>
                                    <?php echo $b->judul_buku ?>
                                </td>
                                <td>
                                    <img src="<?php echo base_url('upload/buku/' . $b->gambar_buku) ?>" width="80" />
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
                                <td width="150">
                                    <?php echo $b->tahun_beli ?>
                                </td>
                                <td width="150">
                                    <a href="" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->