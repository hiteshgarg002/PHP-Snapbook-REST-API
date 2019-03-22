<?php
class DealsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllCategories()
    {
        $query = $this->db->get("category");
        return $query->result();
    }

    public function getDeals()
    {
        $query = $this->db->query("select * from deal order by dealid desc");
        //  $query = $this->db->get("deal");
        return $query->result();
    }

    public function createDeal($values)
    {
        $query = $this->db->insert("deal", $values);
        return $query;
    }

    public function getProductDetailByDealId($dealid)
    {
        $query = $this->db->query("select d.dealid,d.username,d.name,d.description,d.category,d.condition,d.cost,d.photo,d.mobileno,d.status,d.email,(select c.name from credential c where c.username=d.username) as uname from deal d where d.dealid=$dealid");
        return $query->result();
    }

    public function getDealsByUserName($username)
    {
        // $query = $this->db->where(array("username" => $username));
        // $query = $this->db->get("deal");
        $query = $this->db->query("select * from deal where username='$username' order by dealid desc");
        return $query->result();
    }

    public function getSearchedDealName($search)
    {
        $query = $this->db->query("select name from deal where name like '$search%'");
        return $query->result();
    }

    public function getDealsByProductName($productName)
    {
        $query = $this->db->query("select * from deal where name='$productName'");
        return $query->result();
    }

    public function deleteDealByDealId($dealid)
    {
        $query = $this->db->where('dealid', $dealid);
        $query = $this->db->delete('deal');
        //$query = $this->db->query("delete from deal where dealid=$dealid");
        return $query;
    }
}
