<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 13/07/17
 * Time: 19:17
 */
class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProdiModel');
        $this->load->model('PesertaModel');
        $this->load->model('TransaksiModel');
        $this->load->library('session');
        $this->load->helper('utils');

        if (!$this->session->userdata('ISLOGGEDIN')) {
            redirect('user/login');
        }
    }

    public function index()
    {
        $data['prodis'] = $this->ProdiModel->getAllProdi();
        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi('confirmed');
        $data['menu'] = 'member';

        $this->load->view('admin/base/header', $data);
        $this->load->view('admin/template/member/member_list', $data);
        $this->load->view('admin/base/footer');
    }

    public function transaksi()
    {
        $data['list_transaksi'] = $this->TransaksiModel->getAllTransaksi('unconfirmed');
        $data['menu'] = 'transaksi';

        $this->load->view('admin/base/header', $data);
        $this->load->view('admin/template/member/member_trx_list', $data);
        $this->load->view('admin/base/footer');
    }

    public function doTransaction($trx_id)
    {
        $trx_data = array(
            'status' => 'confirmed'
        );

        if ($this->TransaksiModel->update($trx_id, $trx_data)) {
            $this->session->set_flashdata('pesan', 'Transaksi sudah diterima');
            redirect('member/transaksi');
        } else {

        }
    }
}