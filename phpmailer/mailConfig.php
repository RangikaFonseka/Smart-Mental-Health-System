<?php

require 'vendor/autoload.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function mailSent($connection,$paID) {
    
   
    $query_data = "SELECT * FROM patient_info WHERE p_Id='$paID';";
    $result_data = mysqli_query($connection, $query_data);

    if (mysqli_num_rows($result_data) > 0) {
        while ($row_data = mysqli_fetch_array($result_data)) {
            $p_Email = $row_data['p_Email'];
            $p_Name = $row_data['p_Name'];
        }
    } else {
        echo 'No patient found with the given ID.';
        return;
    }

    

    $mail = new PHPMailer(true);

    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output

        $mail->isSMTP();  
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'rangikasample@gmail.com';                     
        $mail->Password   = 'rypt gzzc qkrz nnum';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;     

        // Set sender and recipient information
        $mail->setFrom('rangikasample@gmail.com', 'Smart Mental Helath Care System');
        $mail->addAddress($p_Email, $p_Name);    

        // Email content
        $mail->isHTML(true);            
        $mail->Subject = 'confirmation for your appointment ';
        $mail->Body    = 'Hi<br>This is a friendly confirmation that you have an upcoming appointment and you want to reschedule or cancel this appointment, or if you have any questions, please give us a call at 0710337944 or send an email to kprfonseka30@gmail.com. <br>Thanks for your business and see you soon!';

        $mail->send();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}




