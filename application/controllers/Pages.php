<?php
class Pages extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/index');
        $this->load->view('templates/footer');
    }
    public function signin()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/signin');
        $this->load->view('templates/footer');
    }
    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
    }
}
