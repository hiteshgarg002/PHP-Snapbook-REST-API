<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CredentialController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("CredentialModel");
    }

    public function doSignup()
    {
        $values['email'] = $_GET['email'];
        $values['password'] = $_GET['password'];
        $values['name'] = $_GET['name'];
        $values['mobileno'] = $_GET['mobileno'];
        $values['username'] = $_GET['username'];
        $values['profile'] = $_GET['dpname'];
        $values['gender'] = $_GET['gender'];

        $result = $this->CredentialModel->doSignup($values);

        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function doLogin()
    {
        $id = $_GET['id'];
        $password = $_GET['password'];

        $result = $this->CredentialModel->doLogin($id, $password);

        echo json_encode($result);
    }

    public function getProfile()
    {
        $username = $_GET['username'];

        $response = $this->CredentialModel->getProfile($username);
        echo json_encode($response);
    }
}
