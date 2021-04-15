<?php
error_reporting(1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

$lines = file("../.env");

foreach($lines as $line)
{
  // explode the line into an array
  $values = explode('=',$line);
  // trim the whitspace from the value
  if(trim($values[0]) == "DB_HOST")
  {
      $DB_HOST = trim($values[1]);
  } else if(trim($values[0]) == "DB_DATABASE") {
      $DB_DATABASE = trim($values[1]);
  } else if(trim($values[0]) == "DB_USERNAME") {
      $DB_USERNAME = trim($values[1]);
  } else if(trim($values[0]) == "DB_PASSWORD") {
      $DB_PASSWORD = trim($values[1]);
  } else if(trim($values[0]) == "APP_URL") {
      $APP_URL = trim($values[1]);
  } else {
    continue;
  }
} 

// echo $DB_HOST . " <<==== " . $DB_USERNAME . " <<==== " . $DB_PASSWORD . " <<==== " . $DB_DATABASE;
// exit;

$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
if (!$conn) {
    die('Could not Connect MySql Server:' . mysqli_error());
}


if(isset($_GET['uid'])) {

    $uid2 = $_GET['uid'];

    $query = "SELECT * FROM users where id=".$uid2 ;
    $result = mysqli_query($conn, $query);

    while ($users = mysqli_fetch_assoc($result)) {

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Investor Connect Approve Deny</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      th {
        white-space: nowrap;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand" style="color:#111222">Approve or Deny Form</h3>
    </div>
  </header>

<main role="main" class="inner cover">
    <h1 class="cover-heading">Registered Investor Info:</h1>
    </br></br>
</main>


<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

<table class="table text-left">
    <tbody>
      <tr>
        <th scope="row">User Name or Email ID</th>
        <td><?php echo $users['email']; ?></td>
      </tr>

      <tr>
        <th scope="row">Select Access Type</th>
        <td>
            <select id="access_type" name="access_type" class="js-example-basic-single">
                <option value="">Access Type</option>
                <option value="INVESTOR">Investor</option>
                <option value="ADMIN">Admin</option>
                <option value="SUMMARY">Summary</option>
                <option value="DETAILED">Detailed</option>
            </select>
        </td>
      </tr>

      <tr>
        <th scope="row">Select Approve or Deny</th>
        <td>
            <select id="status" name="appdeny" class="js-example-basic-single">
                <option value="Deny">Deny</option>
                <option value="Approve">Approve</option>
            </select>
        </td>
      </tr>

    </tbody>
  </table>

<input type="hidden" value="<?php echo $uid2; ?>" name="uid" />
<input type="hidden" value="<?php echo $users['email']; ?>" name="emailid" />

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" id="submit_btn" class="btn btn-primary">Proceed</button>

</form>

<br/><br/>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>BrandIdea</p>
    </div>
  </footer>

</body>
</html>

<?php

    }

} 

elseif(isset($_POST)) {

    // print_r($_POST);
    // exit;

    if($_POST['appdeny'] == 'Approve') {
         $query = "UPDATE users SET access_type='" . $_POST['access_type'] . "', status='Active'" . "  WHERE id = '" . $_POST['uid'] . "'";
    } else {
         $query = "UPDATE users SET user_type='', status='InActive'  WHERE id = '" . $_POST['uid'] . "'";
    }
   
    $result = mysqli_query($conn, $query);

    $InvMsg = "Hello <b>". $_POST['emailid'] ."</b> <br/> Welcome to Investors Connect App !!!. <br/><br/> Click the below link to login page !!! <br/><br/> <a href='".$APP_URL."' target='_blank'>Investors Connect </a>. </br/></br/>  Thanks and Regards Simrema Team";


    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'shobamohandurai@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'Pass@12345!';

    //Set who the message is to be sent from
    $mail->setFrom('mohan.durai@BrandIdea.com', 'Investors-Connect Admin');

    //Set an alternative reply-to address
    $mail->addReplyTo('mohan.durai@BrandIdea.com', 'Investors-Connect Admin');

    //Set who the message is to be sent to
    $mail->addAddress($_POST['emailid'], 'Welcome New Investor');

    //Replace the plain text body with one created manually
    $mail->isHTML(true);                                  // Set email format to HTML
        
    $mail->Subject = 'New Registration from Inverstors Connect';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->msgHTML($InvMsg);

    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }

    echo " to new Investor Connect Registration Confirmation for user : " . $_POST['emailid'] . "<br/>";

    exit;

}

?>