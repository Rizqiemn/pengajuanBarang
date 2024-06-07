<!-- Form Edit Manager -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('pengajuan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if (userdata('status') == "manager") : ?>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open('', []); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="status">Status</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nama_barang', $pengajuan['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input value="<?= set_value('jumlah', $pengajuan['jumlah']); ?>" name="jumlah" id="jumlah" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input value="<?= set_value(date("Y/m/d H:i:s")); ?>" name="upd_tgl_pengajuan" id="upd_tgl_pengajuan" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input type="radio" name="status" value="Approve" onclick="handleApprovalChange(this.value)"> Approve<br>
                            <input type="radio" name="status" value="Reject" onclick="handleApprovalChange(this.value)"> Reject<br>
                            <p id="halo"></p>
                        </div>
                    </div>

                    <div class="row form-group rijek" style="display: none;">
                        <label class="col-md-3 text-md-right" for="ket_pengajuan">Keterangan</label>
                        <div class="col-md-9">
                            <input name="ket_pengajuan" id="ket_pengajuan" type="text" class="form-control" placeholder="Keterangan Barang...">
                            <?= form_error('ket_pengajuan', '<small class="text-danger">', '</small>'); ?>
                            <h6>Silahkan edit keterangan apabila memilih Reject</h6>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>


                <script>
                    function handleApprovalChange(value) {
                        const input = document.getElementById('ket_pengajuan');
                        if (value === 'Reject') {
                            input.value = '';
                            $('.rijek').show();
                            $('.apruf').hide();
                        } else {
                            input.value = "Sudah terkonfirmasi Manager, Proses: Finance";
                            $('.rijek').hide();
                            $('.apruf').show();
                        }
                    }
                </script>

                <!-- End Form Edit Manager -->
            <?php elseif (userdata('status') == 'finance') : ?>
                <!-- Form Edit Finance -->
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open_multipart('', [], ['id_pengajuan' => $pengajuan['id_pengajuan']]); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="status">Status</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nama_barang', $pengajuan['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input value="<?= set_value('jumlah', $pengajuan['jumlah']); ?>" name="jumlah" id="jumlah" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input value="<?= set_value(date("Y/m/d H:i:s")); ?>" name="upd_tgl_pengajuan" id="upd_tgl_pengajuan" type="hidden" class="form-control" placeholder="Nama Barang...">
                            <input type="radio" name="status" value="Approve" onclick="handleApprovalChange(this.value)"> Approve<br>
                            <input type="radio" name="status" value="Reject" onclick="handleApprovalChange(this.value)"> Reject<br>
                            <p id="halo"></p>
                        </div>
                    </div>
                    <!-- jika Reject -->
                    <div class="row form-group rijek" style="display: none;">
                        <label class="col-md-3 text-md-right" for="ket_pengajuan">Keterangan</label>
                        <div class="col-md-9">
                            <input name="ket_pengajuan" id="ket_pengajuan" type="text" class="form-control" placeholder="Keterangan Barang...">
                            <?= form_error('ket_pengajuan', '<small class="text-danger">', '</small>'); ?>
                            <h6>Silahkan edit keterangan apabila memilih Reject</h6>
                        </div>
                    </div>
                    <!-- jika Approve -->
                    <div class="row form-group apruf" style="display: none;">
                        <label class="col-md-3 text-md-right" for="ket_pengajuan">Harga Satuan</label>
                        <div class="col-md-9 mb-1">
                            <input name="harga" id="harga" type="text" class="form-control" placeholder="Harga Satuan...">
                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <label class="col-md-3 text-md-right" for="ket_pengajuan">Upload Bukti Transfer</label>
                        <div class="col-md-9">
                            <input name="ket_pengajuan" id="ket_pengajuan" type="file" class="form-control" placeholder="Keterangan Barang...">
                            <?= form_error('ket_pengajuan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>


                <script>
                    function handleApprovalChange(value) {
                        if (value === 'Reject') {
                            $('.rijek').show();
                            $('.apruf').hide();
                        } else {
                            const input = document.getElementById('ket_pengajuan');
                            input.value = "Sudah terkonfirmasi Manager, Proses: Finance";
                            $('.rijek').hide();
                            $('.apruf').show();
                        }
                    }
                </script>

                <!-- End Form Edit Finance -->

            <?php else : ?>
                <!-- Form Edit Officer -->
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open('', []); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                        <div class="col-md-9">
                            <?php $curdate = date("Y/m/d H:i:s"); ?>
                            <input value="<?= set_value('datetime', $curdate); ?>" name="upd_tgl_pengajuan" id="upd_tgl_pengajuan" type="text" class="form-control" placeholder="Nama Barang...">
                            <input value="<?= set_value('nama_barang', $pengajuan['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="jumlah">Jumlah Barang</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('jumlah', $pengajuan['jumlah']); ?>" name="jumlah" id="jumlah" type="num" class="form-control" placeholder="Keterangan Barang...">
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
                <!-- End Form Edit Officer -->
            <?php endif; ?>
        </div>
    </div>
</div>