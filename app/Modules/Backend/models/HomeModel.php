<?php

class HomeModel extends CI_Model
{
    public function Request_Call()
    {
        $query = $this->db->get('requestcall');
        return $query;
    }
    public function Pickup_Request()
    {
        $query = $this->db->get('Pickup_Request');
        return $query;
    }
    public function Message()
    {
        $query = $this->db->get('message');
        return $query;
    }
    public function AssociateUs()
    {
        $query = $this->db->get('associateUs');
        return $query;
    }
    public function AssociateVehicle()
    {
        $query = $this->db->get('AssociateVehicle');
        return $query;
    }

}
