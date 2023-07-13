<?php
class State_model extends CI_Model
{
 function fetch_country()
 {
  $this->db->order_by("country_name");
  $query = $this->db->get("country");
  return $query->result();
 }

 function fetch_state()
 {
//   $this->db->where('country_id', $country_id);
$this->db->order_by("state_name", "ASC");
$query = $this->db->get("state");
return $query->result();
 }

  public function get_branch_array()
  {
    $arr_city = array();
    $this->db->order_by('branchname');
    $query = $this->db->get('branchmaster');
    foreach ($query->result() as $city) {
      $arr_city[$city->branchid] = $city->branchname;
    }
    return $arr_city;
  } 

  public function get_state_array()
  {
    
    $arr_state = array();
    $this->db->order_by('statename');
    $query = $this->db->get('statemaster');
    foreach ($query->result() as $state) {
      $arr_state[$state->stateid] = $state->statename;
    }
    return $arr_state;
  } 

  public function get_branch_data($branch_id)
  {
    $sql = 'select bm.*, cm.*, sm.* from branchmaster as bm
            left join citymaster as cm on bm.cityid = cm.cityid
            left join statemaster as sm on sm.stateid = cm.stateid
            where bm.branchid='.$branch_id .' order by bm.branchname';
            $result = $this->db->query($sql)->result();
    return $result;
  } 

    public function get_branch_array_from_state($state_id)
      {
        $arr_branch = array();
        $sql = 'select * from branchmaster as bm
        LEFT JOIN citymaster as cm on bm.cityid = cm.cityid 
        LEFT JOIN statemaster as sm on sm.stateid=cm.stateid 
        where cm.stateid = '.$state_id .' order by bm.branchname';
        $result = $this->db->query($sql);
        foreach ($result->result() as $branch) {
          $arr_branch[$branch->branchid] = $branch->branchname;
        }
        return $arr_branch;
      } 

      public function get_total_distance($data)
      {
        $branch1 = $data['branch1'];
        $branch2 = $data['branch2'];
        $sql = 'select bfc.*, bm.branchname as branchname1, bm2.branchname as branchname2
        from (branch_freight_cost as bfc left join branchmaster as bm
        on bfc.branchid1 = bm.branchid) left join branchmaster as bm2
        on bfc.branchid2 = bm2.branchid
        where branchid1 = '.$branch1.' and branchid2 ='.$branch2.' union all  
        select bfc.*, bm.branchname as branchname1, bm2.branchname as branchname2
        from (branch_freight_cost as bfc left join branchmaster as bm
        on bfc.branchid1 = bm.branchid) left join branchmaster as bm2
        on bfc.branchid2 = bm2.branchid
        where branchid1 = '.$branch2.' and branchid2 = '.$branch1;
        $result = $this->db->query($sql)->result();
        return $result;
      }

}