<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('HomeModel');
        $this->load->model('State_model');
    }
    public function RequestCallBack()
    {
        $this->form_validation->set_rules('fname', 'FirstName', 'trim|required');
        $this->form_validation->set_rules('lname', 'LastName', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Frontend/index.php');
        } else {

            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'message' => $this->input->post('message'),
            );
            $this->HomeModel->RequestCallBack($data);
            $data['message'] = FORM_SUBMIT_MESSAGE;//"RequestCallBack SuccessFully Send";
            $this->load->view('includes/header');
            $this->load->view('index', $data);
            $this->load->view('includes/footer');
        }
    }
    public function Peckup_Request_Form()
    {
        $this->form_validation->set_rules('source_station', 'Source_Station', 'trim|required');
        $this->form_validation->set_rules('destination', 'Destination', 'trim|required');
        $this->form_validation->set_rules('pickup_date_time', 'pickup_date_time', 'trim|required');
        $this->form_validation->set_rules('collection_point_address', 'collection_point_address', 'trim|required');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required');
        $this->form_validation->set_rules('articles_number', 'Articles_Number', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company_Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php');
            $this->load->view('customer_care/pickupRequest.php');
            $this->load->view('includes/footer.php');
        } else {
            $data = array(
                'source_station' => $this->input->post('source_station'),
                'destination' => $this->input->post('destination'),
                'pickup_date_time' => $this->input->post('pickup_date_time'),
                'collection_point_address' => $this->input->post('collection_point_address'),
                'weight' => $this->input->post('weight'),
                'articles_number' => $this->input->post('articles_number'),
                'company_name' => $this->input->post('company_name'),
                'address' => $this->input->post('address'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
            );
        
            $arr_branch = $this->State_model->get_branch_array();
            $data['source_station'] = $arr_branch[$data['source_station']];
            $data['destination'] = $arr_branch[$data['destination']];
            $this->HomeModel->Pickup_Request($data);
            $data = array();
            $this->load->helper('common_helper');
            $arr_branch = add_blank_option($arr_branch, "Select branch");
            $data['arr_branch'] = $arr_branch;
            $data['message'] = "Thank You for your Pick up request,our team will be in touch with you.";//" Pickup_Request form SuccessFully Saved";
            $this->load->view('includes/header.php');
            $this->load->view('customer_care/pickupRequest.php',$data);
            $this->load->view('includes/footer.php');
        }
    }
    public function Message()
    {
        $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('help', 'Help', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php');
            $this->load->view('Frontend/contactUs');
            $this->load->view('includes/footer.php');
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'help' => $this->input->post('help'),
            );
            $this->HomeModel->Message($data);
            $data['message'] = FORM_SUBMIT_MESSAGE;//"Message SuccessFully Send";
            $this->load->view('includes/header.php');
            $this->load->view('contactUs',$data);
            $this->load->view('includes/footer.php');
        }
    }
    public function AssociateUs()
    {
        $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('brief_profile', 'Brief_profile', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header');
            $data['state'] = $this->State_model->fetch_state();
            $this->load->view('partnerUs/associateUs', $data);
            $this->load->view('includes/footer');
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'brief_profile' => $this->input->post('brief_profile'),
            );
            $this->HomeModel->AssociateUs($data);
            $data['state'] = $this->State_model->fetch_state();
            $data['message'] = "Thank you for your associate request, our team will be in touch with you";//"AssociateUs form SuccessFully Send";
            $this->load->view('includes/header.php');
            $this->load->view('partnerUs/associateUs',$data);
            $this->load->view('includes/footer.php');
        }
    }
    public function AssociateVehicle()
    {
        $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('type_owned', 'Type_owned', 'trim|required');
        $this->form_validation->set_rules('no_of_truck', 'no_of_truck', 'trim|required');
        $this->form_validation->set_rules('preferred_route', 'preferred_route', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('brief_profile', 'Brief_profile', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php');
            $this->load->view('partnerUs/attachVehicle.php');
            $this->load->view('includes/footer.php');
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
                'type_owned' => $this->input->post('type_owned'),
                'no_of_truck' => $this->input->post('no_of_truck'),
                'preferred_route' => $this->input->post('preferred_route'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'brief_profile' => $this->input->post('brief_profile'),
            );
            $this->HomeModel->AssociateVehicle($data);
            $data['state'] = $this->State_model->fetch_state();
            $data['message'] = "Thank you for your attach vehicle request, our team will be in touch with you";//"AssociateVehicle form SuccessFully Send";
            $this->load->view('includes/header.php');
            $this->load->view('partnerUs/attachVehicle',$data);
            $this->load->view('includes/footer.php');
        }
    }
    public function Career()
    {
        $this->form_validation->set_rules('fname', 'Fname', 'trim|required');
        $this->form_validation->set_rules('lname', 'Lname', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('job_profile', 'Job_profile', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('job_location1', 'job_location1', 'trim|required');
        $this->form_validation->set_rules('job_location2', 'job_location2', 'trim|required');
        $this->form_validation->set_rules('job_location3', 'job_location3', 'trim|required');
        $this->form_validation->set_rules('salary_expected', 'salary_expected', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header.php');
            $this->load->view('partnerUs/career.php');
            $this->load->view('includes/footer.php');
        } else {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'pincode' => $this->input->post('pincode'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'job_profile' => $this->input->post('job_profile'),
                'experience' => $this->input->post('experience'),
                'job_location1' => $this->input->post('job_location1'),
                'job_location2' => $this->input->post('job_location2'),
                'job_location3' => $this->input->post('job_location3'),
                'salary_expected' => $this->input->post('salary_expected'),
            );
            $this->HomeModel->Career($data);
            $data['message'] = FORM_SUBMIT_MESSAGE;//"Career form SuccessFully Send";
            $data['state'] = $this->State_model->fetch_state();
            $this->load->view('includes/header.php');
            $this->load->view('partnerUs/career',$data);
            $this->load->view('includes/footer.php');
        }
    }

    public function NetworkMap()
    {
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('service_code', 'Service_code', 'trim|required');
        $this->form_validation->set_rules('network_map_address', 'Network_map_address', 'trim|required');
        $this->form_validation->set_rules('contact_person', 'Contact_person', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        // $this->form_validation->set_rules('other_phone', 'Other_phone', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        if ($this->form_validation->run() == false) {
            // $this->load->view('includes/header');
            // $data = array();
            // $this->load->helper('url_helper');
            // $arr_state = $this->State_model->get_state_array();
            // $data['arr_state'] = $arr_state;
            // $this->load->view('networkMap', $data);
            // $this->load->view('partnerUs/associateUs', $data);
            // $this->load->view('includes/footer');
            redirect('networkMap');
        } else {
            $data = array(
                'state' => $this->input->post('state'),
                'branch' => $this->input->post('branch'),
                'service_code' => $this->input->post('service_code'),
                'network_map_address' => $this->input->post('network_map_address'),
                'contact_person' => $this->input->post('contact_person'),
                'mobile' => $this->input->post('mobile'),
                'other_phone' => $this->input->post('other_phone'),
                'email' => $this->input->post('email'),
            );
            // $this->HomeModel->AssociateUs($data);
            // $data['state'] = $this->State_model->fetch_state();
            $data['message'] = "Thank you for your network map request, our team will be in touch with you";
            // $this->load->view('includes/header.php');
            // $this->load->view('networkMap',$data);
            // $this->load->view('includes/footer.php');
            redirect('networkMap');
        }
    }
   
}
