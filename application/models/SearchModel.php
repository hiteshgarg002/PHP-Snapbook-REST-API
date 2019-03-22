<?php
class SearchModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*function searchUser($search){
    $query=$this->db->query("select * from credential where username LIKE '".$search."%' or name LIKE '".$search."%'");
    if($query->num_rows()!=0){
    return json_encode($query->result());
    }else{
    return "invalid";
    }
    }*/

    public function searchUser($search, $user)
    {
        $query = $this->db->query("select s.name,s.username,s.profile,(select f.id from follow f where f.follower='$user' and f.following=s.username) as followstatus from credential s where s.username LIKE '" . $search . "%' or s.name LIKE '" . $search . "%'");
        if ($query->num_rows() != 0) {
            return json_encode($query->result());
        } else {
            return "invalid";
        }
    }

   /* public function getUserProfile($username)
    {
        $query = $this->db->query("select * from credential where username='$username'");
        if ($query->num_rows() != 0) {
            return json_encode($query->result());
        } else {
            return "invalid";
        }
    }*/
}
