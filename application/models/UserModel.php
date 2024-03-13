<?php
class UserModel extends CI_Model {



    function insert_User($data){
     

        $insert=$this->db->insert('registration',$data);
        if($insert)
        {
            return 'success';
        }
        else{
            return false;
        }

       


       
    }

    function check_Email($email){

        $sql="SELECT COUNT(*) as count FROM registration WHERE email='$email' ";
        $result=$this->db->query($sql);
        $result=$result->row();
        if($result->count>0)
        {
            echo json_encode(FALSE);
        }
        else{
            echo json_encode(TRUE);
        }
    }








}


?>