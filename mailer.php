<?php
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL); 
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

 
        // Set the recipient email address.
        // FIXME: Update this to your desired email address.


               
        // Set the email subject.
        $subject = "New contact from $name";

        
        
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

// Sender
 $recipient = 'info@hlssolutions.com';
               if (empty($email)){
                   $email = 'info@hlssolutions.com';
               }
                $from = $email;
                $fromName = 'HLS Solutions Contact Us From';
                

 // Header for sender info
                $headers = "From: $fromName"." <".$from.">";
// Headers for attachment 
                     $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";

        // Send the email.
        
        if (mail($recipient, $subject, $htmlContent, $headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
