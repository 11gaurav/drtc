<?php defined('BASEPATH') or exit('No direct script access allowed');
class Backend extends CI_Controller
{
    public $CI;

    protected $data = array();

    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
    }

    public function index()
    {
        // Example
        // echo 'hello';
        //$this->load->view('backend/dashboard');
    }
}
