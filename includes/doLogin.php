<?php
	session_start();
	include_once("config.php");
		
	/* Παίρνω τα στοιχεία από τη φόρμα. Τον κωδικό τον κωδικοποιώ για να τον ελέγχω μιας και τον έχω κωδικοποιήσει για να τον βάλω στη βάση μου.(Μιας και η md5 κωδικοποίηση δεν δημιουργεί κάθε φορά διαφορετικό κωδικό) */
	$username=trim($_POST['username']);
	$password=md5(trim($_POST['password']));

	/* Κάνω τον έλεγχο για να δω ότι υπάρχει ο χρήστης */
	$sql = " SELECT * FROM users WHERE username='{$username}' AND password='{$password}' ";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);

	if($count==1){
		/* Ξεκινάω τη SESSION μεταβλητή μου με όνομα id για να μπορώ να ελέγχω στις υπόλοιπες σελίδες μου αν κάποιος είναι logαρισμένος */
		$_SESSION['id']=1;

		/* Παίρνω τα στοιχεία του και τα βάζω σε SESSION μεταβλητες για να μπορέσω να τα χρησιμοποιήσω στις υπόλοιπες σελίδες */
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name']=$row['name'];
		$_SESSION['surname']=$row['surname'];
		$_SESSION['username']=$row['username'];
		$_SESSION['email']=$row['email'];
		$_SESSION['password']=$row['password'];
		$_SESSION['imageUrl']=$row['imageurl'];
		$_SESSION['isAdmin']=$row['isadmin'];
		$_SESSION['active']=$row['active'];
		$_SESSION['author']=$row['userID'];

		/* Αφού έχω πάρει τις μεταβλητές μου πάω στη σελίδα μου*/
		header("Location: ../first.php");
	}else{
		echo "<h1 style='text-align:center;'> The User Does Not Exist </h1>
	    	<p style='text-align:center;'>Click Here To try Again -> <a href='../index.php#tologin'>Try Again</a></p>";
	}

?>