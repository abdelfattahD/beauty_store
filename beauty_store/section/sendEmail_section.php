
<?php
        

        $alert = "";
        if (isset($_POST['contact'])) {

            $fname = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $subject = $_POST['subject'];
            $mailTo = "abdelfatahhaissoun@gmail.com";
            $headers = "From :". $email;
            $txt = "you have received an e-mail from ".$fname." ".$email.".\n\n".$message;

            if (strlen($fname)<2){

                $alert = "<div class='alert alert-danger'>your first name is too short</div>";
    
            }else if (strlen($subject)<2){

                $alert = "<div class='alert alert-danger'>your subject is too short</div>";
    
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $alert = "<div class='alert alert-danger'>your email format is invalid</div>";
    
            }else if ($message == ""){

                $alert = "<div class='alert alert-danger'>message field should not be empty</div>";
    
            }else{

                require 'PHPMailer/PHPMailerAutoload.php';

                    $mail = new PHPMailer;

                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'testabdo296@gmail.com';                 // SMTP username
                    $mail->Password = 'abdotest11Test';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $mail->setFrom($email);
                    $mail->addAddress('abdelfatahhaissoun@gmail.com');     // Add a recipient
                 

                    
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = $subject;
                    $mail->Body    = $txt;
                   

                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {

                        $alert = "<div class='alert alert-success'>your message has been sent successfully</div>";
                    }
            }

            
        }
    
    
    ?>


<div class="col-md-8 col-lg-9">
          <form  class="form-contact contact_form"  role="form" method = "post" id="contactForm" >
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" name="contact" class="button button--active button-contactForm">Send Message</button>
            </div>
          </form>
        </div>