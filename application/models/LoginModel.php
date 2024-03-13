<?php
class LoginModel extends CI_Model {

    function user_Exist($email,$pass)
    {

        $sql="SELECT COUNT(*) as count ,slno,username FROM registration WHERE email='$email' AND password='$pass' ";
        $result=$this->db->query($sql);
        $result=$result->row();
        if($result->count>0)
        {
            $data= array(
                'username'  => $result->username,
                'logged_in' => $result->slno
            );

            $this->session->set_userdata($data);
            
            return 'success';
        }
        else{
            return 'user not exist';
        }
    }


    function logout($id)
    {
        unset($id);
        session_unset();
        session_destroy();
        return 'success';
    }








}
