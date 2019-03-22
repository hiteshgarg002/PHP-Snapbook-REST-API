<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DealsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DealsModel");
    }

    public function getAllCategories()
    {
        $result = $this->DealsModel->getAllCategories();
        echo json_encode($result);
    }

    public function getDeals()
    {
        $deals = $this->DealsModel->getDeals();
        echo json_encode($deals);
    }

    public function createDeal()
    {
        $values['username'] = $_GET['username'];
        $values['name'] = $_GET['name'];
        $values['description'] = $_GET['description'];
        $values['category'] = $_GET['category'];

        $values['condition'] = $_GET['condition'];
        $values['cost'] = $_GET['cost'];
        $values['photo'] = $_GET['photo'];
        $values['mobileno'] = $_GET['mobileno'];

        $values['email'] = $_GET['email'];
        $values['status'] = $_GET['status'];
        $values['date'] = $_GET['date'];

        $result = $this->DealsModel->createDeal($values);

        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function getProductDetailByDealId()
    {
        $dealid = $_GET['dealid'];
        $result = $this->DealsModel->getProductDetailByDealId($dealid);

        echo json_encode($result);
    }

    public function getDealsByUserName()
    {
        $username = $_GET['username'];

        $result = $this->DealsModel->getDealsByUserName($username);
        echo json_encode($result);
    }

    public function getSearchedDealName()
    {
        $search = $_GET['search'];

        $result = $this->DealsModel->getSearchedDealName($search);
        echo json_encode($result);
    }

    public function getDealsByProductName()
    {
        $productName = $_GET['productname'];

        $result = $this->DealsModel->getDealsByProductName($productName);
        echo json_encode($result);
    }

    public function deleteDealByDealId(){
        $dealid=$_GET['dealid'];

        $result = $this->DealsModel->deleteDealByDealId($dealid);
        if($result){
            echo "success";
        }else{
            echo "failed";
        }
    }
}
