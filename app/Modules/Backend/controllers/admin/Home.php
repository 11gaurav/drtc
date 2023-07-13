<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('Backend/admin/index.php');
    }

    public function Request()
    {
        $data['request'] = $this->HomeModel->Request_Call();
        $this->load->view('header');
        $this->load->view('admin/request_call', $data);
        $this->load->view('footer');
    }
    public function Message_Request()
    {
        $data['message'] = $this->HomeModel->Message();
        $this->load->view('header');
        $this->load->view('admin/message', $data);
        $this->load->view('footer');
    }
    public function Pickup_Request()
    {
        $data['pickup'] = $this->HomeModel->Pickup_Request();
        $this->load->view('header');
        $this->load->view('admin/pickup_request', $data);
        $this->load->view('footer');
    }
    public function AssociateUs(){
        $data['associate']  =$this->HomeModel->AssociateUs();
      
        $this->load->view('header');
        $this->load->view('admin/associateUs',$data);
        $this->load->view('footer');
    }
    public function AssociateVehicle(){
        $data['vichle']  =$this->HomeModel->AssociateVehicle();
        $this->load->view('header');
        $this->load->view('admin/AssociateVehicle',$data);
        $this->load->view('footer');
    }
}
