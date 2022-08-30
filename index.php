<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="style.css" rel="stylesheet" type="text/css">  -->
	<title>Email's Experiment</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:100italic' rel='stylesheet' type='text/css'> 
 

<style>
  .malss {
  overflow: hidden;
 margin: 40px 0px 0px 400px;
  font-size: 15px;
  font-family: Lato;
  font-weight: bolder;
  height: 400px;
  width: 500px;
  padding-top: 20px;
  padding-left: 10px;
  background-image: url(mail.jpg);
  border-radius: 9px;
  color: lightpink;
  text-shadow: 0px 3px 5px turquoise;
  font-size: 17px;
}
body {
background-image: url(back.jpg);
background-attachment: fixed;
box-sizing: border-box;
}

.topnav {
  overflow: hidden;
  margin: 0px 360px 30px 300px;
 font-weight: bold;
 border: 2px solid;
  border-radius: 5px;
  background-image: url(links.jpg);
  background-size: 1200px 100px;
}

.topnav a {
  font-weight: bold;
  float: left;
  display:block;
  color: floralwhite;
  text-align: center;
  font-family: Lato;
  font-size: 25px;

  padding: 14px 16px;
  text-decoration: none;
}

.topnav a:hover{
   text-decoration:underline ;
}
</style>

</head>


<body>

<h1 style="text-align: center;font-family:Courier New;color:darkblue;font-size: 40px;text-decoration:underline 3px solid lightpink;text-shadow: 2px 2px 5px aqua;padding-top: 30px;
  padding-right: 30px;
  padding-bottom: 30px;
  padding-left: 20px;">EMAIL TO GO </h1>


<div class="topnav">
  <a href="https://www.iitk.ac.in/counsel/index.php" style="font-family:Calibri;font-weight: bold;font-size: 27px;font-style: italic;" >CS-IITK</a>
  <a href="https://www.iitk.ac.in/counsel/team.php">Team</a>
  <a href="https://www.instagram.com/counsellingserviceiitk">Instagram</a>
  <a href="https://www.facebook.com/CounsellingServiceIitKanpur">Facebook</a>
  <a href="https://www.youtube.com/channel/UCRwww9qZ5Ec5jLIiBkaoXvA">YouTube</a>
  <a href="https://medium.com/@csiitk">Medium</a>
  <a href="https://www.iitk.ac.in/counsel/emergency.php">Emergency</a>
</div>

<div>
  <p style="display: inline-block;height: 330px;padding-left:10px ;
  width: 30%;font-size: 26px;text-shadow: 2px 2px 5px hotpink;font-family: Century Gothic; margin: 30px 0px 0px 200px;color:darkblue;font-style: oblique;font-stretch: semi-expanded;border-left: solid;border-bottom: solid;border-radius: 5px;border-color: goldenrod;">
  The Counselling Service is your home away from home. We are a team of professional counsellors, empathetic students and faculty advisors to assist you emotionally and academically.This is a webpage that works under the counselling service to create a platform where you can send  e-mails to other people.


</p>

<img src="logo.jpg" style="float: right;size: 30%;display: inline-block; margin-top: 40px;
  max-width: 20%;
  height: auto;">
  <img src="hi.jpg" style="float: right;display: inline-block; margin-top: 35px;margin-right: 10px;
  max-width: 30%;border-radius: 8px;
  height: 50%;">
</div>
<div style="display: inline-block;height: 170px;
  width: 60%;font-size: 26px;text-shadow: 2px 2px 5px hotpink;font-family: Century Gothic; margin: 60px 0px 0px 300px;color:darkblue;font-style: oblique;font-stretch: semi-expanded;border-left: solid;border-bottom: solid;border-radius: 5px;border-color: goldenrod;">
  
Below is the form that you need to fill for sending the mail
<br> A thing to keep in mind is that this works on PHPMailer so make sure you have it installed in the same directory.<br> And since it is a php based work, the corresponding web server should be working for example XAMPP.
</div>
















<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 
 <div class="malss">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  NAME: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-MAIL: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  SUBJECT: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  MESSAGE: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>



























<?php


  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);


$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'gtarung1234@gmail.com';                    
    $mail->Password   = 'zsuwxuspmkziuyhy';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

  
    $mail->setFrom('gtarung1234@gmail.com', 'RUNGO');

    $mail->addAddress($email);             


    $mail->isHTML(true);                                 
    $mail->Subject = $website;
    $mail->Body    = $comment;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "                                       Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>











</body>
</html>
