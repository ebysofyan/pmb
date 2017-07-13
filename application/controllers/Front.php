<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Front extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdiModel');
        $this->load->model('PesertaModel');
        $this->load->model('TransaksiModel');
        $this->load->library('session');
        $this->load->helper('utils');
    }

    public function index()
    {
        $data['prodis'] = $this->ProdiModel->getAllProdi();
        $this->load->view('admin/template/front/front_header');
        $this->load->view('admin/template/front/front_view', $data);
        $this->load->view('admin/template/front/front_footer');
    }

    public function register($prodi_id)
    {
        $data['prodi'] = $this->ProdiModel->get($prodi_id);
        $this->load->view('admin/template/front/front_header');
        $this->load->view('admin/template/front/front_reg_view', $data);
        $this->load->view('admin/template/front/front_footer');
    }

    public function doRegister()
    {

        //Member Data
        $name = $this->input->post('nama');
        $address = $this->input->post('alamat');
        $gender = $this->input->post('gender');
        $study = $this->input->post('study');

        $member_data = array(
            'name' => $name,
            'address' => $address,
            'gender' => $gender,
            'last_study' => $study
        );
        print_r($_FILES["validation"]);

        if ($this->PesertaModel->insert($member_data)) {
            //Transaksi Data
            $peserta_id = $this->PesertaModel->getLatesInsertedId();
            $prodi_id = $this->input->post('prodi_id');
            $key = $this->input->post('key');
            $bill_method = $this->input->post('bill_method');

            if ($bill_method == 'cash') {
                $validation = null;
            } elseif ($bill_method == 'atm') {
                if ($_FILES["validation"]["name"]) {
                    $temp = explode(".", $_FILES["validation"]["name"]);
                    $validation = $key . '_validation.' . end($temp);
                }
            }
            $status = 'unconfirmed';

            $transaksi_data = array(
                'created' => date("Y-m-d"),
                'key' => $key,
                'bill_methode' => $bill_method,
                'validation' => $validation,
                'status' => $status,
                'peserta_id' => $peserta_id,
                'prodi_id' => $prodi_id
            );

            print_r($transaksi_data);

            if ($this->TransaksiModel->insert($transaksi_data)) {
                $msg = 'Pendaftaran Berhasil, Nantikan Pengumuman ya brohh';
                if ($bill_method == 'atm') {
                    $this->uploadFile("validation", $validation, $msg, 'front/register/' . $prodi_id);
                } else {
                    $this->session->set_flashdata('pesan', $msg);
                    redirect('front/register/' . $prodi_id);
                }
            } else {
                echo $this->db->error();
            }
        } else {
            echo $this->db->error();
        }

    }

    function uploadFile($input_name, $filename, $msg, $url_redirect)
    {
        $config = array(
            'upload_path' => getcwd() . '/assets/upload/',
            'allowed_types' => "gif|jpg|png|jpeg|bmp",
            'overwrite' => TRUE,
            'file_name' => $filename,
        );

        $this->load->library('upload', $config);
        if ($_FILES[$input_name]['name']) {
            if ($this->upload->do_upload($input_name)) {
                $this->session->set_flashdata('pesan', $msg);
            } else {
                echo $this->upload->display_errors();
            }
        }

        redirect($url_redirect);
    }
}
