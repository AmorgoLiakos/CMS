<?php 
    require_once("PHPMailer/PHPMailerAutoload.php");
    
    //Αρχικοποιώ τις μεταβλητές μου.
	$name="";
	$errorname="";
	$surname="";
	$errorsurname="";
	$telephone="";
	$errortelephone="";
	$mail="";
	$errormail="";
	$subject="";
	$errorsubject="";
	$errortext="";
    $textResult="";
    //Η συνάρτησή που ελέγχω αν είναι κάθε input γεμάτο και σωστό ανάλογα με το pattern της κάθε περίπτωσης.
    function check($x,$pattern,$errorMessage){
        $resultMessage="";
        if(empty($x)){
            $resultMessage = "Fill The Input Properly!";
        }else{
            if(!preg_match($pattern,$x)){
				$resultMessage = $errorMessage;
                }
            }
			return $resultMessage;
		}

        //Εδώ Ελέγχω αν έχουν δωθεί τιμές στο κάθε input. 
		if(isset($_POST["name"]) and isset($_POST["surname"]) and isset($_POST["email"]) and isset($_POST["telephone"]) and isset($_POST["subject"]) and isset($_POST["text"])){
			
            //Εδώ trimάρω το περιεχόμενο για να αποφύγω τα κενά δεξιά-αριστερά.
			$name = trim($_POST["name"]);
			$surname = trim($_POST["surname"]);
			$email = trim($_POST["email"]);
			$telephone=trim($_POST["telephone"]);
			$subject=trim($_POST["subject"]);
            $text=trim($_POST["text"]);
            
            //Εδώ έχω τα patterns για κάθε περίπτωση.
			$patternName= "/^[a-zA-Z-\x{0386}-\x{03CE}\s]+$/u";
            $patternEmail="/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
			$patternTelephone="/^[0-9]{10}$/";
			$patternSubject= "/^[a-zA-Z0-9-\x{0386}-\x{03CE}\s]+$/u";
            
            //Εδώ έχω τις μεταβλητές μου σε περίπτωση λάθους,αν όλα είναι εντάξει θα μείνουν κενές αλλιώς όπου υπάρξει λάθος η συγκεκριμένη μεταβλητή θα έχει την ανάλογη τιμή από τη συνάρτηση παραπάνω.
			$errorName = check($name,$patternName,"Error!");
			$errorSurName = check($surname,$patternName,"Error!");
			$errorEmail = check($email,$patternEmail,"Error!");
			$errorTelephone = check($telephone,$patternTelephone,"Error!");
			$errorSubject = check($subject,$patternSubject,"Error!");
			
		      
            //Ελέγχω αν όλες οι μεταβλητές σε περίπτωση λάθους είναι κενές έτσι ώστε να προχωρήσω στην αποστολή του mail.
			if($errorName == "" and $errorSurName == "" and $errorEmail == "" and $errorTelephone == "" and $errorSubject == ""){	
                
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
				$sendEmail->addAddress("katharma7@hotmail.com","Liakos Prekas");
				
				
				$sendEmail->Subject=$subject;
                //Τροποποίησα το περιεχόμενο έτσι ώστε να εμφανίζονται τα στοιχεία του αποστολέα στην αρχή του μηνύματος.
				$sendEmail->msgHTML("<span style='text-decoration:underline;font-size:22px'>Name</span> : <span style='font-family:monoscope'>".$name."</span><br/><span style='text-decoration:underline;font-size:22px'>Surname</span> : <span style='font-family:monoscope'>".$surname."</span><br/><span style='text-decoration:underline;font-size:22px'>Mail</span> : <span style='font-family:monoscope'>".$email." <br/><span style='text-decoration:underline;font-size:22px'>Phone</span> : <span style='font-family:monoscope'>".$telephone."</span> <br/><br/><span style='text-decoration:underline;font-size:22px'>Subject</span> : <span style='font-family:monoscope'>".$subject."</span><br/><br/>"."<span style='font-size:24px'>".$text."</span>");

				if(!$sendEmail->send()){
					echo "Mailer Error: ".$sendEmail->ErrorInfo;
				}else{
					$text = "Message send!";
				}
			}
		}
    


?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title>Form</title>
    <link type="text/css" rel="stylesheet" href="FormStyle.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="FormJavaScript.js" type="text/javascript"></script>
</head>

<body>
    <div id="container" class="clearfix">
        <form action="Form.php" method="post">    
            <header class="clearfix">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a class="active" href="#">Contact</a></li>
                    </ul>
                </nav>
            </header>
            
            <input onblur="checkName()" type="text" id="name" name="name" placeholder="Name"/>
            <input onblur="checkSurname()" type="text" id="surname" name="surname" placeholder="Surname"/>
            <br/>
            <input onblur="checkTel()" type="text" id="tel" name="telephone" placeholder="Phone"/>
            <input onblur="checkEmail()" type="text" id="email" name="email" placeholder="E-mail"/>
            <br/>
            <input placeholder="Subject" type="text" id="subject" name="subject"/>
            <br/>
            <textarea placeholder="...Write Your Text Here..." type="text" name="text"></textarea>
            <button type="submit" onclick="checkAll()" >Confirm</button>
            <div id="result"><?php echo $text ?></div>
        </form>
    </div>
</body>

</html>