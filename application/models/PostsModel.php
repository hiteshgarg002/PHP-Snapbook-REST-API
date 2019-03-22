<?php
class PostsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPosts($follower)
    {
        //$query=$this->db->get("photos");
        /*$query=$this->db->query("select f.follower,f.following,(select p.photo from photos p where p.username=f.following) as posts from follow f where f.follower='hiteshgarg02'");
        //return $query->result();*/

        $query = $this->db->query("select p.photo,p.postid,p.username,p.timestamp,p.caption,p.type,p.dealname,p.dealstatus,p.dealcost
		,p.dealcondition,p.dealcategory,p.dealdescription,p.dealid,p.date,(select po.polltype from polling po where po.username=p.username
        and po.postid=p.postid) as pollstatus,(select count(polltype) from polling where postid=p.postid and polltype='up') as voteup
        ,(select count(polltype) from polling where postid=p.postid and polltype='down') as votedown from post p where p.username=(select following from follow where follower='$follower')
        or p.username='$follower' order by p.postid desc");

        return $query->result();
    }

    public function getProfilePosts($username)
    {
        //$this->db->where("photos.username",$uname);
        $query = $this->db->query("select * from post where username='$username' order by timestamp desc");
        return $query->result();
    }

    public function getPostById($postid)
    {
        $query = $this->db->query("select p.photo,p.postid,p.username,p.timestamp,p.caption,p.type,p.date,(select po.polltype from polling po where po.username=p.username
        and po.postid=p.postid) as pollstatus,(select count(polltype) from polling where postid='$postid'and polltype='up') as voteup
        ,(select count(polltype) from polling where postid='$postid' and polltype='down') as votedown from post p where p.postid='$postid'");

        return $query->result();
    }

    public function getProfilePostsListView($username)
    {
        $query = $this->db->query("select p.photo,p.postid,p.username,p.timestamp,p.caption,p.type,p.date,(select po.polltype from polling po where po.username='$username'
        and po.postid=p.postid) as pollstatus,(select count(polltype) from polling where postid=p.postid and polltype='up') as voteup
        ,(select count(polltype) from polling where postid=p.postid and polltype='down') as votedown from post p where p.username='$username' order by p.postid desc");

        return $query->result();
    }
}
?>