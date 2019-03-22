<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FollowController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("FollowModel");
    }

    public function getFollowStatus()
    {
        $follower = $_GET['follower'];
        $following = $_GET['following'];

        $result = $this->FollowModel->getFollowStatus($follower, $following);
        echo $result;
    }

    public function doFollow()
    {
        $values['follower'] = $_GET['follower'];
        $values['following'] = $_GET['following'];

        $result = $this->FollowModel->doFollow($values);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function doUnFollow()
    {
        $follower = $_GET['follower'];
        $following = $_GET['following'];

        $result = $this->FollowModel->doUnFollow($follower, $following);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function getFollowers()
    {
        $username = $_GET['username'];

        $response = $this->FollowModel->getFollowers($username);
        if ($response->num_rows() > 0) {
            echo json_encode($response->result());
        } else {
            echo "invalid";
        }
    }

    public function getFollowerBySearch()
    {
        $follower = $_GET['follower'];
        $following=$_GET['following'];

        $response = $this->FollowModel->getFollowerBySearch($follower,$following);
        if ($response->num_rows() > 0) {
            echo json_encode($response->result());
        } else {
            echo "invalid";
        }
    }

    public function getFollowing()
    {
        $username = $_GET['username'];

        $response = $this->FollowModel->getFollowing($username);
        if ($response->num_rows() > 0) {
            echo json_encode($response->result());
        } else {
            echo "invalid";
        }
    }

    public function getFollowingBySearch()
    {
        $follower = $_GET['follower'];
        $following=$_GET['following'];

        $response = $this->FollowModel->getFollowingBySearch($follower,$following);
        if ($response->num_rows() > 0) {
            echo json_encode($response->result());
        } else {
            echo "invalid";
        }
    }
}
