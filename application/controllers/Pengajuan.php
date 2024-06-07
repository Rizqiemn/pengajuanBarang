<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Pengajuan";
        $data['pengajuan'] = $this->admin->get('pengajuan');
        $this->template->load('templates/dashboard', 'pengajuan/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Pengajuan";

            // Mengenerate ID Pengajuan
            $kode_terakhir = $this->admin->getMax('pengajuan', 'id_pengajuan');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_pengajuan'] = 'P-' . $number;
            $data['tgl_pengajuan']=date("Y/m/d H:i:s");
            $data['ket_pengajuan']='Sedang Diajukan: Manager';
            $data['status']='Pending';
            $data['id_user']=userdata('id');
            
            $this->template->load('templates/dashboard', 'pengajuan/add', $data);
        } else {
            echo "Halp";
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('pengajuan', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('pengajuan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('pengajuan');
            }
        }
    }

    public function show($getId)
    {
        $id = encode_php_tags($getId);
        $data['title'] = "Lihat Pengajuan";
        $data['jenis'] = $this->admin->get('jenis');
        $data['satuan'] = $this->admin->get('satuan');
        $data['Pengajuan'] = $this->admin->get('pengajuan', ['id_pengajuan' => $id]);
        $this->template->load('templates/dashboard', 'pengajuan/edit1', $data);
    }


    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $this->admin->update_status($id, $status);
        echo json_encode(['success' => true]);
    }

    
    private function _config()
    {
        $config['upload_path']      = "./assets/img/buktiTransfer";
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = '2048';

        $this->load->library('upload', $config);
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();
        $this->_config();

        


        if ($this->form_validation->run() == false) {
            $data['title'] = "Pengajuan";
            $data['pengajuan'] = $this->admin->get('pengajuan', ['id_pengajuan' => $id]);
            $data['upd_tgl_pengajuan'] = date("Y/m/d H:i:s");
            $this->template->load('templates/dashboard', 'pengajuan/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            if (empty($_FILES['ket_pengajuan']['name'])) {
                $insert = $this->admin->update('pengajuan', 'id_pengajuan', $id, $input);
                if ($insert) {
                    set_pesan('perubahan berhasil disimpan.');
                } else {
                    set_pesan('perubahan tidak disimpan.');
                }
                redirect('pengajuan');
            } else {
                if ($this->upload->do_upload('ket_pengajuan') == false) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    $input['ket_pengajuan'] = $this->upload->data('file_name');
                    $update = $this->admin->update('pengajuan', 'id_pengajuan', $id, $input);
                    if ($update) {
                        set_pesan('perubahan berhasil disimpan.');
                    } else {
                        set_pesan('gagal menyimpan perubahan');
                    }
                    redirect('pengajuan');
                }
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('pengajuan', 'id_pengajuan', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('pengajuan');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
