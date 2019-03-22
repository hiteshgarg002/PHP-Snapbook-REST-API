<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PollingController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PollingModel");
    }

    public function createPollingDeal()
    {
        $values['dealid'] = $_GET['dealid'];
        $values['username'] = $_GET['username'];
        $values['dealname'] = $_GET['dealname'];
        $values['dealdescription'] = $_GET['dealdescription'];
        $values['dealcategory'] = $_GET['dealcategory'];
        $values['dealcondition'] = $_GET['dealcondition'];
        $values['dealcost'] = $_GET['dealcost'];
        $values['dealstatus'] = $_GET['dealstatus'];
        $values['date'] = $_GET['date'];
        $values['type'] = $_GET['type'];

        $result = $this->PollingDealModel->createPollingDeal($values);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function setPoll()
    {
        $values['postid'] = $_GET['postid'];
        $values['username'] = $_GET['username'];
        $values['polltype'] = $_GET['polltype'];

        $result = $this->PollingModel->setPoll($values, $_GET['polltype']);
        /*if ($result) {
        echo "success";
        } else {
        echo "failed";
        }*/
        echo $result;
    }

    public function getCommentsByPostId()
    {
        $postid = $_GET['postid'];

        $result = $this->PollingModel->getCommentsByPostId($postid);
        if ($result->num_rows() == 0) {
            echo "invalid";
        } else {
            echo json_encode($result->result());
        }
    }

    public function postCommentByPostId()
    {
        $values['postid'] = $_GET['postid'];
        $values['username'] = $_GET['username'];
        $values['comment'] = $_GET['comment'];

        $result = $this->PollingModel->postCommentByPostId($values);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function updateVoteCount()
    {
        $postid = $_GET['postid'];

        $response = $this->PollingModel->updateVoteCount($postid);
        echo json_encode($response);
    }

    public function getPollingDeals()
    {
        $username = $_GET['username'];

        $response = $this->PollingModel->getPollingDeals($username);
        echo json_encode($response);
    }

    public function getPollingDealById()
    {
        $postid = $_GET['postid'];

        $response = $this->PollingModel->getPollingDealById($postid);
        echo json_encode($response);
    }
}
