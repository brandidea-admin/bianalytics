<?php
error_reporting(1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "investorconnect";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not Connect MySql Server:' . mysql_error());
}

if(isset($_GET['uid'])) {

    $uid = $_GET['uid'];

    $query = "SELECT email FROM users where id = '$uid'";
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
    <h1 class="cover-heading">Registered Investor Info:
    </br></br>
</main>

   
<table class="table text-left">
    <tbody>
      <tr>
        <th scope="row">User Name or Email ID</th>
        <td><?php echo $users['email']; ?></td>
      </tr>
      <!-- <tr>
        <th scope="row">First Name</th>
        <td><?php echo $uid['firstname']; ?></td>
      </tr>
      <tr>
        <th scope="row">Last Name</th>
        <td><?php echo $uid['lastname']; ?></td>
      </tr>
      
      <tr>
        <th scope="row">designation</th>
        <td><?php echo $uid['designation']; ?></td>
      </tr>

       <tr>
        <th scope="row">phone</th>
        <td><?php echo $uid['phone']; ?></td>
      </tr>

      <tr>
        <th scope="row">country</th>
        <td><?php echo $uid['country']; ?></td>
      </tr>
      <tr>
        <th scope="row">Organization</th>
        <td><?php echo $uid['Organization']; ?></td>
      </tr>
      <tr>
        <th scope="row">About Organization</th>
        <td><?php echo $uid['about_orgn']; ?></td>
      </tr> -->

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

      <tr>
        <th scope="row">Select Access Type</th>
        <td>
            <select id="access_type" name="user_type" class="js-example-basic-single">
                <option value="">Access Type</option>
                <option value="Investor" @if ($uid['user_type'] == "INVESTOR") {{'selected="selected"'}} @endif>Investor</option>
                <option value="Admin" @if ($uid['user_type'] == "Admin") {{'selected="selected"'}} @endif>Admin</option>
                <option value="Summary" @if ($uid['user_type'] == "Summary") {{'selected="selected"'}} @endif>Summary</option>
                <option value="Detailed" @if ($uid['user_type'] == "Detailed") {{'selected="selected"'}} @endif>Detailed</option>
            </select>
        </td>
      </tr>

      <!-- <tr>
        <th scope="row">Select Status</th>
        <td>
            <select id="status" name="status" class="js-example-basic-single">
                <option value="InActive" @if ($uid['status'] == "InActive") {{'selected="selected"'}} @endif>InActive</option>
                <option value="Active" @if ($uid['status'] == "Active") {{'selected="selected"'}} @endif>Active</option>
            </select>
        </td>
      </tr> -->

      <tr>
        <th scope="row">Select Approve or Deny</th>
        <td>
            <select id="status" name="appdeny" class="js-example-basic-single">
                <option value="Deny" @if ($uid['appdeny'] == "Deny") {{'selected="selected"'}} @endif>Deny</option>
                <option value="Approve" @if ($uid['appdeny'] == "Active") {{'selected="selected"'}} @endif>Approve</option>
            </select>
        </td>
      </tr>

    </tbody>
  </table>

<input type="hidden" value="<?php echo $uid; ?>" name="uid" />
<input type="hidden" value="<?php echo $users['email']; ?>" name="emailid" />

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<br/>
<button type="submit" id="submit_btn" class="btn btn-primary">Proceed</button>

</form>

<br/><br/>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Simreka</p>
    </div>
  </footer>

</body>
</html>

<?php
    }

} elseif(isset($_POST)) {

    // print_r($_POST);
    // exit;
    if($_POST['appdeny'] == 'Approve') {
         $query = "UPDATE users SET user_type='" . $_POST['user_type'] . "', status='Active'" . "  WHERE id = '" . $_POST['uid'] . "'";
     } else {
         $query = "UPDATE users SET user_type='', status='InActive'  WHERE id = '" . $_POST['uid'] . "'";
    }
   
    $result = mysqli_query($conn, $query);


    function callbackAction($result, $to, $cc, $bcc, $subject, $body)
        {
            echo "Message subject: \"$subject\"\n";
            foreach ($to as $address) {
                echo "Message to {$address[1]} <{$address[0]}>\n";
            }
            foreach ($cc as $address) {
                echo "Message CC to {$address[1]} <{$address[0]}>\n";
            }
            foreach ($bcc as $toaddress) {
                echo "Message BCC to {$toaddress[1]} <{$toaddress[0]}>\n";
            }
            if ($result) {
                echo "Message sent successfully\n";
            } else {
                echo "Message send failed\n";
            }
        }

        require_once 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        //// Email sending to Successful Inverstor Signup

        $InvMsg = "Hello <b>". $_POST['emailid'] ."</b> <br/> Welcome to Investors Connect App !!!. <br/><br/> Click the below link to login page !!! <br/><br/> <a href='http://localhost/investor-connect' target='_blank'>Investors Connect </a>. </br/></br/>  Thanks and Regards Simrema Team";

        try {
            $mail->isMail();
            $mail->setFrom('shobamohandurai@gmail.com', 'Mohan Durai');
            $mail->addAddress($_POST['emailid'], 'Welcome to Investor Connect');
            //$mail->addCC('john@example.com', 'John Doe');
            $mail->Subject = 'Investors App Access Status Message from Investors Connect';
            $mail->msgHTML($InvMsg);
            // optional - msgHTML will create an alternate automatically
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
            //$mail->addAttachment('images/phpmailer_mini.png'); // attachment
            $mail->action_function = 'callbackAction';
            //$mail->send();
        } catch (Exception $e) {
            echo $e->errorMessage();
        }

        //Alternative approach using a closure
        try {
            $mail->action_function = static function ($result, $to, $cc, $bcc, $subject, $body) {
                if ($result) {
                    echo "Message sent successfully";
                } else {
                    echo "Message send failed\n";
                }
            };
            $mail->send();
        } catch (Exception $e) {
            echo $e->errorMessage();
        }





        //// Email sending to admin

        // $mail2 = new PHPMailer(true);

        // $AdminMsg = 'Approve or Deny New User from Investor Connect Registration for the user <b>' . $_POST['emailid'] . "</b> - Investors Connect </a> !!!. </br></br>  Thanks and Regards Simrema Team";

        // try {
        //     $mail2->isMail();
        //     $mail2->setFrom('shobamohandurai@gmail.com', 'Mohan Durai');
        //     $mail2->addAddress('mohan.durai@simreka.com', 'Registration Confirm New Investors Connect App');
        //     //$mail->addCC('john@example.com', 'John Doe');
        //     $mail2->Subject = 'Registration Confirm from New Investors Connect App';
        //     $mail2->msgHTML($AdminMsg);
        //     // optional - msgHTML will create an alternate automatically
        //     // /$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        //     //$mail->addAttachment('images/phpmailer_mini.png'); // attachment
        //     $mail2->action_function = 'callbackAction';
        //     //$mail->send();
        // } catch (Exception $e) {
        //     echo $e->errorMessage();
        // }

        // //Alternative approach using a closure
        // try {
        //     $mail2->action_function = static function ($result, $to, $cc, $bcc, $subject, $body) {
        //         if ($result) {
        //             echo "Message sent successfully\n";
        //         } else {
        //             echo "Message send failed\n";
        //         }
        //     };
        //     $mail2->send();
        // } catch (Exception $e) {
        //     echo $e->errorMessage();
        // }

        // require_once("config.php");
        echo " to new Investor Connect Registration Confirmation for user : " . $_POST['emailid'] . "<br/>";
        //echo "Sent Email Successfully to Admin for Registration Confirm for user : " . $_POST['emailid'] . "<br/>";
        // exit;

}

