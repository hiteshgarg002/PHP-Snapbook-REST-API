<?php

class PollingModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function createPollingDeal($values)
    {
        $query = $this->db->insert("post", $values);
        return $query;
    }

    public function setPoll($values, $polltype)
    {
        $response = "";

        // $q = $this->db->query("select * from polling where postid='"+$values['postid']+"' and username='"+$values['username']+"'");
        $q = $this->db->where($values);
        $q = $this->db->get('polling');

        if ($q->num_rows() != 0) {
            $remove = $this->db->where($values);
            $remove = $this->db->delete('polling');

            $response = "remove";
        } else {
            $remove = $this->db->where(array('postid' => $values['postid'], 'username' => $values['username']));
            $remove = $this->db->delete('polling');

            if ($remove) {
                $add = $this->db->insert("polling", $values);
                if ($add) {
                    $response = $values['polltype'];
                } else {
                    $response = "remove";
                }
            } else {
                $response = "remove";
            }
        }
        //$query = $this->db->insert("polling", $values);
        return $response;
    }

    public function getCommentsByPostId($postid)
    {
        $comments = $this->db->where('postid', $postid);
        $comments = $this->db->get('comment');

        return $comments;
    }

    public function postCommentByPostId($values)
    {
        $comments = $this->db->insert("comment", $values);
        return $comments;
    }

    public function updateVoteCount($postid)
    {
        $response = $this->db->query("SELECT count(case when polltype='up' and postid='$postid' then polltype else null end) as voteup
        ,count(case when polltype='down' and postid='$postid' then polltype else null end) as votedown FROM polling where postid='$postid'");
        return $response->result();
    }

    public function getPollingDeals($username)
    {
        $response = $this->db->query("SELECT postid,dealid,dealname,date from post where username='$username' and type='deal' order by postid");
        return $response->result();
    }

    function getPollingDealById($postid){
        $response = $this->db->query("SELECT count(case when polltype='up' and postid='$postid' then polltype else null end) as voteup
        ,count(case when polltype='down' and postid='$postid' then polltype else null end) as votedown FROM polling where postid='$postid'");
        return $response->result();
    }
}
