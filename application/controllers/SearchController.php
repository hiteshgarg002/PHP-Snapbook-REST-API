<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("SearchModel");
        $this->load->model("CredentialModel");
    }

    public function searchUser()
    {
        $search = $_GET['search'];
        $user = $_GET['user'];
        $result = $this->SearchModel->searchUser($search, $user);

        echo $result;
    }

    public function getUserProfile()
    {
        $username = $_GET['username'];

        $result = $this->CredentialModel->getProfile($username);
        echo json_encode($result);
    }
}
