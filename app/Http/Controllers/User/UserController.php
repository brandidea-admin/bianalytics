<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    public function index()
    {
        $userlist = User::all();
        return view('pages.users.index', compact('userlist'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $data['posts'] = User::find($id);
        return View::make('pages.users.edit', $data);
    }

    public function setpasswd(Request $request)
    {

        $id6 = $request->userid;
        $tok = $request->mytoken;
        $data = DB::table('users')
                ->where('id','=',$id6)->where('token','=',$tok)
                ->update(['password' => Hash::make($request->password1), 'updated_at'=>date("Y-m-d H:i:s")]);


        ///// Sending Email to Admin

             $data6 = User::find($id6);

             // print_r($data6->email);
             // exit;

             $AdminMsg = "New Registration from Investors Connect  <br/> <br/>Email ID : <b>" . $data6->email . "</b> <br/><br/> First Name : <b>" . $data6->firstname . "</b> <br/><br/> Organization : <b>" . $data6->Organization . "</b> <br/><br/> User Type : <b>" . $data6->user_type . "</b>  <br/><br/> Phone / Mobile : <b>" . $data6->phone . "</b> <br/><br/><br/><br/>- Approve or Deny using the link : <a target='_blank' href='". env('APP_URL') ."/approvedeny.php?uid=".$id6."'>Approve or Deny</a> <br/><br/><br/>  Thanks and Regards <br/> Simreka Admin Team";

              require 'vendor/autoload.php';

            $mail = new PHPMailer();
            $mail->isSMTP(); 

            //$mail->isMail();


                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                                                           // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
                
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;   

                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication      

                $mail->Username   = 'shobamohandurai@gmail.com';                          // SMTP username
                $mail->Password   = 'Pass@12345!';                         // SMTP password                           

                
                //$mail->setFrom('simreka-app@simreka.com', 'Admin-Simreka');
                $mail->setFrom('mohan.durai@simreka.com', 'Admin-Simreka');
                $mail->addReplyTo('mohan_durai@yahoo.com', 'First Last');
                $mail->addAddress('mohan.durai@simreka.com', 'Investors Connect Admin');

                $mail->isHTML(true);
               
                $mail->Subject = 'New Registration from Inverstors Connect';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->msgHTML($AdminMsg);
                // optional - msgHTML will create an alternate automatically
                // $mail->AltBody = 'Hello Welcome Dear ' . $request->firstname . " " . $request->lastname . " - Please wait for login authentication after apprval from our Admin Team !!!.   The Approval Confirmation will be notified in your Email ID Shortly !!!.   Thanks and Regards Simrema Team";
                //send the message, check for errors
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    exit;
                } else {
                    echo 'Message sent!';
                    //exit;
                    
                }

       ///    Ends Email sending procoess


        return Redirect::to('/auth/login')->with('message',"Password Updated Successfully !!! Please login after approval from Admin Team from Simreka., You will be notified in your registered email id for login confirmattion !!! Thank You");
    }

    public function register(Request $request)
    {
        // print_r($request->all());
        // exit;
        $validations = [
            'username' => ['required'],
            'phone' => ['required']
        ];
        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $user = new User();

            $str6 = "Simreka@123" . date("Y-m-d H:i:s");
            $mytoken = md5($str6);
            $user->token = $mytoken;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->designation = $request->designation;
            $user->phone = $request->phone;
            $user->country = "";
            $user->Organization = $request->organization;
            $user->about_orgn = "";
            $user->email = $request->username;
            $user->user_type = $request->user_type;
            $user->access_type = "";
            $user->status = "InActive";
            $user->password = "";
            //$user->password = Hash::make($request->password1);

            $user->created_by = 1;
            $user->updated_by = 1;

            $this->status = true; 
            $this->modal = true;
 
            $user->save();
           
            //// Start Email sending module

            $InvMsg = "Please click the following link to verify your email id <br/><br/> <a href='". env('APP_URL') ."/auth/setpasswd?mytoken=" . $mytoken . "&userid=" . $user->id . "&emailid=" . $request->username . "'> Verify Email </a> <br/><br/> Regards - Simreka Admin Team";

            require 'vendor/autoload.php';

            $mail = new PHPMailer();
            $mail->isSMTP(); 

            //$mail->isMail();


                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                                                          
                $mail->Host       = 'smtp.gmail.com';     
                //$mail->Host       = 'smtp.mail.eu-west-1.awsapps.com';     
                
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   
                $mail->Port       = 587;   
                //$mail->Port       = 465;   

                $mail->SMTPAuth   = true;                      

                $mail->Username   = 'shobamohandurai@gmail.com';
                $mail->Password   = 'Pass@12345!';

                //$mail->Username   = 'app@simreka.com';    
                //$mail->Password   = 'Chamundi@299';                       

                
                //$mail->setFrom('simreka-app@simreka.com', 'Admin-Simreka');
                $mail->setFrom('shobamohandurai@gmail.com', 'New User from Investor Connect');
                //$mail->addReplyTo('mohan_durai@yahoo.com', 'First Last');
                $mail->addAddress($request->username, 'Investors Connect Admin');

                $mail->isHTML(true);
               
                $mail->Subject = 'New Registration from Inverstors Connect';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->msgHTML($InvMsg);
                // optional - msgHTML will create an alternate automatically
                // $mail->AltBody = 'Hello Welcome Dear ' . $request->firstname . " " . $request->lastname . " - Please wait for login authentication after apprval from our Admin Team !!!.   The Approval Confirmation will be notified in your Email ID Shortly !!!.   Thanks and Regards Simrema Team";
                //send the message, check for errors
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    exit;
                } else {
                    echo 'Message sent!';
                    //exit;
                    
                }

        }

        return Redirect::to('/auth/login')->with('message',"User Registered Successfully !!! Email verification sent on your registered Email ID, click on the url and set Password. Simreka Admin Team !!!");
    }


    public function update(Request $request, $id)
    {
        $request->validate([]);
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->Organization = $request->Organization;
        $user->about_orgn = $request->about_orgn;
        $user->email = $request->username;
        $user->user_type = $request->user_type;
        $user->access_type = $request->access_type;
        $user->status = $request->status;
        $this->status   = true;
        $this->modal = true;
        $user->save();

        if($user->access_type=='ADMIN') {
            return Redirect::to('/user')->with('success', 'User updated successfully');
        } else {
            return Redirect::to('/dashboard')->with('success', 'User updated successfully');
        }
        
    }

    public function changepwd($id)
    {
        return view('pages.users.changepwd')->with("id",$id);
    }

    public function updatepwd(Request $request)
    {
       
        $userid = User::find($request->id);

        // echo $userid->email . " <<<========" . $request->password;
        // exit;

        $userdata = array (
            'email' => $userid->email,
            'password' => $request->password
        );

        If (Auth::attempt($userdata)) {
            // echo "User Athentaition is true";
            // exit;
            $userid->password = Hash::make($request->password1);
            $userid->save();
            return Redirect::to('/dashboard')->with('success', 'New Password updated successfully');
        } else {
            // echo "User Athentaition is wrong !!!!!!!!";
            // exit;
            return Redirect::to('/dashboard')->withErrors('Incorrect login details');
        }

    }

    public function store(Request $request)
    {
        
        $validations = [
            'name' => ['required'],
            'email' => ['required'],
            'type' => ['required']
        ];
        $validator = Validator::make($request->all(), $validations, []);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->type = $request->type;
            $user->password = Hash::make("Pass@123");

            $user->created_by = 1;
            $user->updated_by = 1;
            $user->save();
            $this->status = true;
            $this->modal = true;
            $this->message = "New User Added Successfully!";
        }

        return redirect('/user')->with('success', 'New User Created Successfully');
    }

    public function destroy($id)
    {
        $lead = User::findOrFail($id);
        $lead->delete();
        return redirect('/user')->with('success', 'Record Successfully Deleted');
    }


    public function resetpwd(Request $request)
    {

        $userid = User::find($request->id);

        $userid->password = Hash::make("Pass@123");
        $userid->update();
        return Redirect::to('/dashboard')->with('success', 'Password Reset successfully');

    }

    


}
