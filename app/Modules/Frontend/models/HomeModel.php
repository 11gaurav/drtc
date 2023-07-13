<?php

class HomeModel extends CI_Model
{

   
    public function RequestCallBack($data)
    {

        $this->db->insert('requestcall',$data);
    }
    // public function Request_Call()
    // {
    //     $query = $this->db->get('requestcall');
    //     return $query;
    // }
    public function Pickup_Request($data)
    {
        $this->db->insert('Pickup_Request',$data);
    }
    public function Message($data)
    {
        $this->db->insert('message',$data);
      
    }
    public function AssociateUs($data){
        $this->db->insert('associateUs',$data);
    }
    public function AssociateVehicle($data){
        $this->db->insert('AssociateVehicle',$data);
    }
    public function Career($data){
        $this->db->insert('career',$data);
    }
}
