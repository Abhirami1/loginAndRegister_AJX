<?php
 //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';



    class ForgotModel extends CI_Model {

   

    function check_email($email){

        $sql="SELECT COUNT(*) as count FROM registration WHERE email='$email' ";
        $result=$this->db->query($sql);
        $result=$result->row();
        if($result->count>0)
        {
            return json_encode(TRUE);
        }
        else{
            return json_encode(FALSE);
        }
    }


    // function  send_password_reset($get_email,$get_name,$token)
    // {
    //     $mail = new PHPMailer(true);
     
    //      //Server settings
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;        
    //                            //Enable SMTP authentication
    // $mail->Username   = 'abhiramipr30@gmail.com';                     //SMTP username
    // $mail->Password   = 'amigo@abhi';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // //Recipients
    // $mail->setFrom('abhigipra@gmail.com', $get_name);
    // $mail->addAddress($get_email,$get_name);//Add a recipient



    // //Content
    // $mail->isHTML(true);                                  
    // $mail->Subject = 'Reset password Notification';

    // $mail_template="
    //     <h2>hello</h2>
    //     <h3>you are receving this email because we receved a password reset request for user account</h3>
    //     <br></br>
    // ";




    // $mail->Body    = $mail_template;

    // $mail->send();

    // }



    function update_token($email, $token)
    {
        $data = array(
            'token' => $token
        );
    
        $this->db->where('email', $email);
        $this->db->update('registration', $data);
    
        if ($this->db->affected_rows() > 0) {
            $sql = "SELECT username, email FROM registration WHERE email = ?";
            $result = $this->db->query($sql, array($email));
    
            if ($result->num_rows() > 0) {
                $row = $result->row();
                $get_email = $row->email;
                $get_name = $row->username;
    
                $this->load->library('email');
                        
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 587,
                    'smtp_user' => 'prassoc1999@gmail.com',
                    'smtp_pass' => 'abhi@123',
                    'smtp_crypto' => 'tls', // tls or ssl
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8'
                );
    
                $this->email->initialize($config);
    
                $this->email->from('prassoc1999@gmail.com', $get_name);
                $this->email->to($get_email);
                $this->email->subject('Email Test');
                $this->email->message('Testing the email class.');
    
                if($this->email->send()) {
                    echo 'Email sent successfully';
                } else {
                    echo 'Error sending email: ' . $this->email->print_debugger();
                }
            } else {
                echo "No user found with the email: $email";
            }
        } else {
            echo "Failed to update token for email: $email";
        }
    }
    
    
























    
}