<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter-HMVC
 *
 * @package    CodeIgniter-HMVC
 * @author     N3Cr0N (N3Cr0N@list.ru)
 * @copyright  2019 N3Cr0N
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       <URI> (description)
 * @version    GIT: $Id$
 * @since      Version 0.0.1
 * @filesource
 *
 */

class Frontend extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('State_model');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('index');
        $this->load->view('includes/footer');
    }
    function aboutUs()
    {

        $this->load->view('aboutUs');
    }
    function our_services()
    {
        $this->load->helper('url');
        $this->load->view('our_services');
    }
    function customer_care()
    {
        $this->load->view('includes/header');
        $this->load->view('customer_care/index');
        $this->load->view('includes/footer');
    }
    function timeAndDistance()
    {
        $data = array();
        $this->load->helper('common_helper');
        $arr_branch = $this->State_model->get_branch_array();
        $arr_branch = add_blank_option($arr_branch, "Select Branch");
        $data['arr_branch'] = $arr_branch;
        $this->load->view('includes/header');
        $this->load->view('customer_care/timeAndDistance',$data);
        $this->load->view('includes/footer');
    }
    function pickupRequest()
    {
        $data = array();
        $this->load->helper('common_helper');
        $arr_branch = $this->State_model->get_branch_array();
        $arr_branch = add_blank_option($arr_branch, "Select branch");
        $data['arr_branch'] = $arr_branch;
        $this->load->view('includes/header');
        $this->load->view('customer_care/pickupRequest',$data);
        $this->load->view('includes/footer');
    }
    function networkMap()
    {
        $data = array();
        $this->load->helper('url_helper');
        $this->load->helper('common_helper');
        $arr_state = $this->State_model->get_state_array();
        $arr_state = add_blank_option($arr_state, "Select State");
        $data['arr_state'] = $arr_state;
        $this->load->view('networkMap', $data);
    }
    function partnerUs()
    {
        $this->load->view('includes/header');
        $this->load->view('partnerUs/index');
        $this->load->view('includes/footer');
    }
    function associateUs()
    {
        $this->load->view('includes/header');
        $data['state'] = $this->State_model->fetch_state();
        $this->load->view('partnerUs/associateUs', $data);
        $this->load->view('includes/footer');
    }
    function attachVehicle()
    {
        $this->load->view('includes/header');
        $data['state'] = $this->State_model->fetch_state();
        $this->load->view('partnerUs/attachVehicle',$data);
        $this->load->view('includes/footer');
    }

    function career()
    {
        $this->load->view('includes/header');
        $data['state'] = $this->State_model->fetch_state();
        $this->load->view('partnerUs/career',$data);
        $this->load->view('includes/footer');
    }
    function contactUs()
    {
        $this->load->view('contactUs');
    }

    function get_city_array_from_state(){
      $data = $this->input->post();
      $state_id = $data['state_id'];
      $arr_city = $this->State_model->get_city_array_from_state($state_id);
      echo json_encode($arr_city);
    }

    function get_branch_array_from_state(){
        $this->load->helper('common_helper');
        $data = $this->input->post();
        $state_id = $data['state_id'];
        $arr_branch = $this->State_model->get_branch_array_from_state($state_id);
        // $arr_branch = add_blank_option($arr_branch, "Select Branch");
        echo json_encode($arr_branch);
      }

    function get_branch_data(){
        $this->load->helper('common_helper');
        $data = $this->input->post();
        $branch_id = $data['branch_id'];
        $arr_branch = $this->State_model->get_branch_data($branch_id);
        // $arr_branch = add_blank_option($arr_branch, "Select Branch");
        if(!empty($arr_branch)){
            $arr_data = array();
            foreach($arr_branch as $key => $branch_info){
            $arr_data = array(
                'station' => $branch_info->branchname,
                'service_code' => $branch_info->branchcode,
                'address' => $branch_info->address. ' '.$branch_info->address2,
                'city' => $branch_info->cityname,
                'state' => $branch_info->statename,
                'contact_person' => $branch_info->contactperson,
                'mobile' => $branch_info->mobile,
                'other_phone' => $branch_info->phoneo,
                'email' => $branch_info->email,
            );
        }
    }
        echo $this->load->view('networkMapTable',$arr_data,true);
      }

      function get_total_distance(){
        $arr_data = array();
        $arr_info = array();
        $data = $this->input->post();
        $branch1 = $data['from'];
        $branch2 = $data['to'];
        $arr_data['branch1'] = $branch1;
        $arr_data['branch2'] = $branch2;
        $distance = $this->State_model->get_total_distance($arr_data);
        if(!empty($distance)){
            $distance = $distance[0];
            $arr_info = array(
                'from' => $distance->branchname1,
                'to' => $distance->branchname2,
                'distance' => $distance->distance,
                'days' => $distance->days,
            );
    }
    if(!empty($arr_info)){
        echo $this->load->view('timeanddistanceTable',$arr_info,true);
    }else{
       echo '<h2 style="text-align:center;"><b>No Result found</b></h2>';
    }
      }
}
