<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Tambah Pengajjuan
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
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', []); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_pengajuan">ID pengajuan</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_pengajuan', $id_pengajuan); ?>" name="id_pengajuan" id="id_pengajuan" type="text" class="form-control" placeholder="ID pengajuan...">
                        <?= form_error('id_pengajuan', '<small class="text-danger">', '</small>'); ?>
                        <input value="<?= set_value('status', $status); ?>" name="status" id="status" type="hidden" class="form-control" placeholder="ID pengajuan...">
                        <input value="<?= set_value('tgl_pengajuan', $tgl_pengajuan); ?>" name="tgl_pengajuan" id="tgl_pengajuan" type="hidden" class="form-control" placeholder="ID pengajuan...">
                        <input value="<?= set_value('ket_pengajuan', $ket_pengajuan); ?>" name="ket_pengajuan" id="ket_pengajuan" type="hidden" class="form-control" placeholder="ID pengajuan...">
                        <input value="<?= set_value('id_user', $id_user); ?>" name="id_user" id="id_user" type="hidden" class="form-control" placeholder="ID pengajuan...">

                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang'); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jumlah">Jumlah Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jumlah'); ?>" name="jumlah" id="jumlah" type="number" class="form-control" placeholder="Keterangan Barang...">
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
        </div>
    </div>
</div>