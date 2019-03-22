<?php
class FollowModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFollowStatus($follower, $following)
    {
        $query = $this->db->query("SELECT * from follow where follower='$follower' and following='$following'");
        if ($query->num_rows() != 0) {
            return "following";
        } else {
            return "follow";
        }
    }

    public function doFollow($values)
    {
        $result = $this->db->insert("follow", $values);
        return $result;
    }

    public function doUnFollow($follower, $following)
    {
        $result = $this->db->query("DELETE from follow where follower='$follower' and following='$following'");
        return $result;
    }

    public function getFollowers($username)
    {
        $followers = $this->db->query("SELECT f.follower,(SELECT c.name from credential c where c.username=f.follower) as followername,
        (SELECT c.profile from credential c where c.username=f.follower) as followerphoto,(SELECT fo.id from follow fo where fo.follower='$username' and fo.following=f.follower) as followingstatus from follow f where f.following='$username'");

        return $followers;
    }

    public function getFollowerBySearch($follower, $following)
    {
        $follower = $this->db->query("SELECT f.follower,(SELECT c.name from credential c where c.username=f.follower) as followername,
        (SELECT c.profile from credential c where c.username=f.follower) as followerphoto,(SELECT fo.id from follow fo where fo.follower=f.following and fo.following=f.follower) as followingstatus from follow f where f.following='$following' and f.follower like '" . $follower . "%'");

        return $follower;
    }

    public function getFollowing($username)
    {
        $following = $this->db->query("SELECT f.following,(SELECT c.name from credential c where c.username=f.following) as followingname,
        (SELECT c.profile from credential c where c.username=f.following) as followingphoto,(SELECT fo.id from follow fo where fo.follower='$username' and fo.following=f.following) as followingstatus from follow f where f.follower='$username'");

        return $following;
    }

    public function getFollowingBySearch($follower, $following)
    {
        $following = $this->db->query("SELECT f.following,(SELECT c.name from credential c where c.username=f.following) as followingname,
        (SELECT c.profile from credential c where c.username=f.following) as followingphoto,(SELECT fo.id from follow fo where fo.follower=f.following and fo.following=f.follower) as followingstatus from follow f where f.follower='$follower' and f.following like '" . $following . "%'");

        return $following;
    }
}
