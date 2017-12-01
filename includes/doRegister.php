<?php
	if(isset($_POST['submit'])){	
	    /*Ξεκινάω ένα session για να μπορώ να εκμεταλλευτώ τα στοιχεία μου σε όλες τις σελίδες μου */
	    session_start();
	    include_once("config.php");

	    /* Παίρνω τα στοιχεία του χρήστη και τα τοποθετώ στις μεταβλητές μου */
	    $name=trim($_POST["name"]);
	    $surname=trim($_POST["surname"]);
	    $username=trim($_POST["username"]);
	    $email=trim($_POST["email"]);
	    $password=trim($_POST["password"]);
	    $confirmPass=trim($_POST["confirmPassword"]);

	    /*Για λόγους ασφαλείας κωδικοποιώ τον κωδικό*/
	    $securityPass= md5($password);

	    /* Παίρνω τα στοιχεία της εικόνας προφίλ του χρήστη και τα βάζω στις αντίστοιχες μεταβλητές */
	    $fileName=$_FILES["profPic"]["name"];
	    $fileType=$_FILES["profPic"]["type"];
	    $fileSize=$_FILES["profPic"]["size"];
	    $fileError=$_FILES["profPic"]["error"];
	    $fileTempName=$_FILES["profPic"]["tmp_name"];

	    /* Σπάω σε κομμάτια το αρχείο μου για να μπορώ να ελέγξω τον τύπο χρησιμοποιώντας την κατάληξη του και μετά θα του δώσω ένα μοναδικό όνομα */
	    $fileExt = explode(".", $fileName);
	    $fileActExt = strtolower(end($fileExt));

	    /* Φτιάχνω έναν πίνακα για να γνωρίζω τα επιτρεπτά format */
	    $allowed = array('jpg' , 'jpeg' , 'png' , 'gif');

	    /* Δίνω ένα μοναδικό όνομα στο αρχείο μου */
	    $fileNameNew = uniqid().".".$fileActExt;

	    /* Φτιάχνω τα μονοπάτια για το που θα αποθηκεύονται οι φωτογραφίες των χρηστών και πως θα αντλούνται από τη βάση μου */
	    $fileDestination = "../images/".$fileNameNew;
	    $fileDestinationDb = "images/".$fileNameNew;

	    /*Εδώ περνάω σε SESSION μεταβλητές τις μεταβλητές που θα χρειαστώ στις επόμενες σελίδες μου */
	    $_SESSION['name']=$name;
	    $_SESSION['surname']=$surname;
	    $_SESSION['imageUrl']=$fileDestinationDb;
	    $_SESSION['username']=$username;

	    /* Εδώ δημιουργώ μια μεταβλητή για να μπορώ να δω να ελέγχω σε κάθε μου σελίδα αν υπάρχει χρήστης και δείχνω ότι δε θα είναι admin κάποιος νέος χρήστης */
	    $_SESSION['id']=1;
	    $_SESSION['isAdmin']=0;

	    /* Τώρα ξεκινάω να κάνω την καταχώρηση στην βάση μου με τους απαραίτηττους ελέγχους ανα βήμα. Τα βάζω σε διαφορετικά if για να μπορέσω να δώσω ξεχωριστό μήνυμα λάθους ανάλογα με την περίπτωση */
	    if($password == $confirmPass){
	    	if(in_array($fileActExt, $allowed)){
	    		if($fileError===0){
		    		if($fileSize<100000000){
		    			
		    			$sqlUsername = "SELECT username FROM users WHERE username='{$username}'";
		    			$result = mysqli_query($con,$sqlUsername);
		    			$count = mysqli_num_rows($result);

		    			if($count<1){

		    				$sqlEmail = "SELECT email FROM users WHERE email='{$email}'";
		    				$result2 = mysqli_query($con,$sqlEmail);
		    				$count2 = mysqli_num_rows($result2);

		    				if($count2<1){
				    			$sql = " INSERT INTO users (name , surname , username , email , password , imageurl , isadmin , active) VALUES ( '$name' , '$surname' , '$username' , '$email' , '$securityPass' , '$fileDestinationDb' , 0 , 1)";
				    			

				    			mysqli_query($con, $sql);

				    			$sql2="SELECT id FROM users WHERE username=$username";
				    			$result2=mysqli_query($con,$sql2);

				    			while($row2=mysqli_fetch_assoc($result2)){
				    				$author=$row2['userID'];
				    			}

				    			$_SESSION['author']=$author;

				    			move_uploaded_file($fileTempName,$fileDestination);

				    			header("location:../first.php");		    					
		    				}else{
		    					echo "<h1 style='text-align:center;'> This Email Is Already Used. </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";			
		    				}
		    			}else{
		    				echo "<h1 style='text-align:center;'> This Username Is Taken. </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";
		    			}
		    		}else{
		    			echo "<h1 style='text-align:center;'> Your File Is Too Big </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";
			    	}
		    	}else{
		    		echo "<h1 style='text-align:center;'> Something Is Wrong With Your Pic </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";
		    	}
	    	}else{
	    		echo "<h1 style='text-align:center;'> This Format Is Not Supported </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";
	    	}
	    }else{
	    	echo "<h1 style='text-align:center;'> The Passwords Do Not Match </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#toregister'>Try Again</a></p>";
	    }		
	}
?>