<?php

    // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL); 
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Check that data was sent to the mailer.
    if ( empty($email) OR empty($phone) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;
    }
    
    // Check whether submitted data is not empty
    else {
        // Validate email
        
         if(empty($_FILES["file"]["name"])){
            http_response_code(400);
            echo "Please Upload your Resume.";
            exit;
        }
        else{
            $uploadStatus = 1;
            // Upload attachment file
            if(!empty($_FILES["file"]["name"])){
                
                // File path config
                $targetDir = "uploads/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                $maxsize    = 1000000;
                
                if($_FILES['file']['size'] >= $maxsize) {
                    $uploadStatus = 0;
                                http_response_code(400);
                                echo "File too large. File must be less than 1 MB.";
                                exit;
                    }
                    else{
                
                // Allow certain file formats
                $allowTypes = array('pdf', 'doc', 'docx');
                if(in_array($fileType, $allowTypes)){
                    
                    
                    // Upload file to the server
                     if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $targetFilePath;
                    }else{
                        $uploadStatus = 0;
                        http_response_code(400);
                                echo "Sorry, there was an error uploading your file.";
                                exit;
                      
                    }
                }else{
                    $uploadStatus = 0;
                    http_response_code(400);
                                echo "Sorry, only PDF & doc files are allowed to upload.";
                                exit;
                }
                    }
            }
          
            if($uploadStatus == 1){ 
                // Recipient
                $toEmail = 'info@hlssolutions.com';
               if (empty($email)){
                   $email = 'info@hlssolutions.com';
               }
                // Sender
                $from = $email;
                $fromName = 'HLS Solutions Careers';
                
                // Subject
                $emailSubject = 'Careers Submitted by '.$name;
                
                // Message 
                $htmlContent ='<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin:0;padding:0;width:100%">
   <tbody>
      <tr>
         <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;padding:25px 0;text-align:center">
            <div style="text-align:center;"><img src="https://hlssolutions.com/assets/images/logo-dark.png" width="200"/></div>
            <a href="#" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;color:#3d4852;font-size:19px;font-weight:bold;text-decoration:none;display:inline-block" target="_blank" data-saferedirecturl="#">
            HLS Solutions
            </a>
         </td>
      </tr>
      <tr>
         <td width="100%" cellpadding="0" cellspacing="0" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
            <table class="m_532102116323369246inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">
               <tbody>
                  <tr>
                     <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;max-width:100vw;padding:32px">
                        <h1 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;text-align:left">Hi HLS Solutions team, </h1>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">There is a request from '.$name.' </p>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"><br /><h2>Candidate Details:</h2></p>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"><b>Full name:</b>'.$name.'.</p>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"><b>Phone Number:</b> '.$phone.'</p>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"><b>Email:</b> '.$email.'</p>
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left"><b>Message:</b> '.$message.'</p>
                        <br /><br />
                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">Regards,<br>
                        Medswan
                        </p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;">
            <table class="m_532102116323369246footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin:0 auto;padding:0;text-align:center;width:570px">
               <tbody>
                  <tr>
                     <td align="center" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;max-width:100vw;padding:32px">
                        <p style="box-sizing:border-boxfont-family:-apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;line-height:1.5em;margin-top:0;color:#b0adc5;font-size:12px;text-align:center">© Copyrights 2023 HLS Solutions All rights reserved.</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>';
                
                // Header for sender info
                $headers = "From: $fromName"." <".$from.">";

                if(!empty($uploadedFile) && file_exists($uploadedFile)){
                    
                    // Boundary 
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                    
                    // Headers for attachment 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                    
                    // Multipart boundary 
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                    
                    // Preparing attachment
                    if(is_file($uploadedFile)){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($uploadedFile,"rb");
                        $data =  @fread($fp,filesize($uploadedFile));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                        "Content-Description: ".basename($uploadedFile)."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $email;
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                    
                    // Delete attachment file from the server
                    @unlink($uploadedFile);
                }else{
                     // Set content-type header for sending HTML email
                    $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                }
                
                // If mail sent
                if($mail){
                    // Set a 200 (okay) response code.
                    http_response_code(200);
                    echo "Thank You! Your message has been sent.";
                }else{
                    http_response_code(500);
                    echo "Oops! Something went wrong and we couldn't send your message.";
                }
            }
        }
    }
    
    ?>