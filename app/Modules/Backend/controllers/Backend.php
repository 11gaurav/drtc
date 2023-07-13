<?php 
namespace App\Controllers;
class Backend extends BaseController
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
