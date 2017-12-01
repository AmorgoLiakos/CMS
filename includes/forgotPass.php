<?php
require_once("../contact/PHPMailer/PHPMailerAutoload.php");
include_once("config.php");

$text=" ";
$email="";
$URLChange="http://amorgoliakos.com/LoginRegisterForm/change.php";
 
function check($x,$p){
        if(preg_match($p,$x)){
            return true;
        }else{
            return false;
        }
    }

if(isset($_POST["Email"])){
    $email=trim($_POST["Email"]);
    $patternEmail="/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
    
    $sql="SELECT * FROM users WHERE email = '$email' ";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);

    if($count==1){
        $newPass=uniqid();
        $passDB=md5($newPass);
        $sqlUpdate = "UPDATE `users` SET `password` = '$passDB' WHERE email = '$email' ";
        mysqli_query($con,$sqlUpdate);
        if(check($email,$patternEmail)){
   
            $sendEmail = new PHPMailer;
            $sendEmail->isSMTP();
            $sendEmail->CharSet = "utf8";
            $sendEmail->SMTPDebug=0;
            $sendEmail->Debugoutput="html";

            $sendEmail->Host="titan.indns.gr";
            $sendEmail->Port=465;
            $sendEmail->SMTPAuth=true;
            $sendEmail->SMTPSecure=true;
            $sendEmail->Username="info@amorgoliakos.com";
            $sendEmail->Password="liakos1987amorgos";
            $sendEmail->setFrom("info@amorgoliakos.com","Liakos Prekas");
            $sendEmail->addAddress($email);
            $sendEmail->msgHTML("This is your new Password: $newPass ");

            if(!$sendEmail->send()){
                $text = "Mailer Error: ".$sendEmail->ErrorInfo;
            }else{
                $text= "Message send!";
            }
        }else{
            $text="Write Your Email Right";
        }
    }else{
        $text="That Email Does Not Exists";
    }   
}else{
    $text =" ";
}



              

?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Login Registration Form</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="../css/StyleForgot.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="JS/Javascript.js"></script>
        <script type="text/javascript" src="JS/jquery-3.2.1.js"></script>
        <script>
            $(document).ready(function() {
                i = 0;


                $("#eyebtn").click(function() {
                    if (i % 2 == 0) {
                        i++;
                        $("#password").attr("type", "text");
                        $("#confirmPassword").attr("type", "text");
                    } else {
                        i++;
                        $("#password").attr("type", "password");
                        $("#confirmPassword").attr("type", "password");
                    }
                });


            });

        </script>
    </head>

    <body>
        <h2 class="title">Forgot Your Password</h2>
        <form action="forgotPass.php" method="post">
           <p class="welcomeTwo">Enter Your Email Here</p>
            <input type="email" onblur="checkEmail()" placeholder="Email" id="emailTwo" name="Email" value="<?php  echo $email ?>" >
            <button id="sbtn" type="submit" name="sbmtbtn">Send</button>
        </form>
        <p style="text-align: center;"><a href="../index.php">Back To Login</a></p>
        <p id="resultArea">
            <?php echo $text ?>
        </p>
    </body>

    </html>