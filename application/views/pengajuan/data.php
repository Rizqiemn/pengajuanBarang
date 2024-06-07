<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Pengajuan
                </h4>
            </div>
            <?php if (userdata('status') == 'officer') { ?>
                <div class="col-auto">
                    <a href="<?= base_url('pengajuan/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Pengajuan
                        </span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <!-- View Manager -->
            <?php
            if (userdata('status') == 'manager') { ?>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($pengajuan) {
                        foreach ($pengajuan as $b) {
                            if (substr($b['ket_pengajuan'], -7) == 'Manager') { ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['nama_barang']; ?></td>
                                    <td><?= $b['jumlah']; ?></td>
                                    <td><?= $b['tgl_pengajuan']; ?></td>
                                    <td><?= $b['status']; ?></td>
                                    <td><?= $b['ket_pengajuan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('pengajuan/edit/') . $b['id_pengajuan'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pengajuan/delete/') . $b['id_pengajuan'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php } ?>
                    <!-- End View Manager -->
                <?php } elseif (userdata('status') == 'finance') { ?>
                    <!-- View Finance -->
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($pengajuan) {
                        foreach ($pengajuan as $b) {
                            if (substr($b['ket_pengajuan'], -7) == 'Manager') { ?>

                            <?php   } elseif (substr($b['ket_pengajuan'], -4) == '.png') {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['nama_barang']; ?></td>
                                    <td><?= $b['jumlah']; ?></td>
                                    <td>
                                        <p>Bukti Transfer telah diupload</p>
                                    </td>
                                </tr>
                                <?php } else {
                                if ($b['status'] != 'Reject') {

                                ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['jumlah']; ?> </td>
                                        <td>
                                            <a href="<?= base_url('pengajuan/edit/') . $b['id_pengajuan'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pengajuan/delete/') . $b['id_pengajuan'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                <?php    } else { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b['nama_barang']; ?></td>
                                        <td><?= $b['jumlah']; ?> </td>
                                        <td>
                                            <?= $b['status'] . ' - ' . $b['ket_pengajuan'] ?>
                                        </td>
                                    </tr>
                        <?php }
                            }
                        }
                    } else { ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php } ?>

                    <!-- End View Finance -->
                <?php } else { ?>

                    <!-- View Officer -->
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($pengajuan) {
                        foreach ($pengajuan as $b) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nama_barang']; ?></td>
                                <td><?= $b['jumlah']; ?></td>
                                <td><?= $b['tgl_pengajuan']; ?></td>
                                <td><?= $b['status']; ?></td>
                                <td><?= (substr($b['ket_pengajuan'], -4) == '.png') ? "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Lihat Bukti Transfer</button>" : $b['ket_pengajuan']; ?></td>
                                <td>
                                    <?php
                                    if (substr($b['ket_pengajuan'], -4) == '.png' || $b['status'] == 'Reject') { ?>

                                    <?php } else { ?>
                                        <a href="<?= base_url('pengajuan/edit/') . $b['id_pengajuan'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('pengajuan/delete/') . $b['id_pengajuan'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <!-- Modal Bukti Transfer -->
                            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?= base_url('assets/img/buktiTransfer/') . $b['ket_pengajuan']; ?>" alt="<?= $b['ket_pengajuan'] ?>" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php } ?>

                    <!-- End View Officer -->
                <?php } ?>
                </tbody>
        </table>
    </div>
</div>