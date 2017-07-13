<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 10/07/17
 * Time: 10:35
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('utils');
        $this->load->library('session');
    }

    function login()
    {
        $this->load->view('admin/template/login/login');
    }

    public function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->UserModel->authenticate($username, $password)) {
            $user = $this->UserModel->authenticate($username, $password)[0];
            $this->session->set_userdata(
                array(
                    'USER_ID' => $user->id,
                    'USERNAME' => $user->username,
                    'ISLOGGEDIN' => true
                )
            );

            redirect('member');
        } else {
            $this->session->set_flashdata('msg', 'Username dan atau Password salah');
            redirect('user/login');
        }
    }

    public function doLogout()
    {
        if ($this->session->userdata('ISLOGGEDIN')) {
            $this->session->sess_destroy();
            redirect('user/login');
        }
    }

    public function profile()
    {

        if (!$this->session->userdata('ISLOGGEDIN')) {
            redirect('user/login');
        }

        $data['user'] = $this->UserModel->getUser();
        $data['menu'] = null;

        $this->load->view('admin/base/header', $data);
        $this->load->view('admin/template/profile/user_profile', $data);
        $this->load->view('admin/base/footer');
    }

    public function store()
    {
        if (!$this->session->userdata('ISLOGGEDIN')) {
            redirect('user/login');
        }

        $user = $this->UserModel->getUser();

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $name = $this->input->post('name');

        $data = array(
            'username' => $username,
            'password' => $password,
            'name' => $name,
        );

        if ($this->UserModel->update($user->id, $data)) {
            $this->session->set_flashdata('pesan', "Profil Info berhasil di updated !");
            $this->session->set_userdata(
                array(
                    'USER_ID' => $user->id,
                    'USERNAME' => $username,
                    'ISLOGGEDIN' => true
                )
            );
            redirect('user/profile');
        } else {
            echo "Error";
        }

    }
}