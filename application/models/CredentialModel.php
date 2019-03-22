<?php
class CredentialModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function doSignup($values)
    {
        $result = $this->db->insert('credential', $values);
        return $result;
    }

    public function doLogin($id, $password)
    {
        $query = $this->db->query("select * from credential where username='$id' or email='$id' and password='$password'");
      /*  if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            $failed = array(
                "email" => "",
            );

            return $failed;
        }*/

        return $query->result();
    }

    public function getProfile($username)
    {
        $response = $this->db->query("SELECT c.*,(SELECT count(f.follower) from follow f where f.following='$username') as followerscount
		,(SELECT count(f.following) from follow f where f.follower='$username') as followingcount,(SELECT count(p.postid) from post p where p.username='$username') as postscount from credential c where c.username='$username'");
        return $response->result();
    }
}
