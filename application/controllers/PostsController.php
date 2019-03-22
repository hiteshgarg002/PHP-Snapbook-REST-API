<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PostsModel");
    }

    public function getPosts()
    {
        $follower = $_GET['follower'];

        $result = $this->PostsModel->getPosts($follower);
        echo json_encode($result);
    }

    public function getProfilePosts()
    {
        $uname = $_GET['username'];
        $result = $this->PostsModel->getProfilePosts($uname);
        echo json_encode($result);
    }

    public function getProfilePostsListView()
    {
        $uname = $_GET['username'];
        $result = $this->PostsModel->getProfilePostsListView($uname);
        echo json_encode($result);
    }

    public function getPostById()
    {
        $postid = $_GET['postid'];

        $response = $this->PostsModel->getPostById($postid);
        echo json_encode($response);
    }
}
