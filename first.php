<?php
	session_start();
	include_once("includes/config.php");
	/* Ελέγχω αν είναι κάποιος χρήστης logαρισμένος, αν όχι τον στέλνω πίσω στην αρχική */
	if($_SESSION['id']==1){
		$menuName = $_SESSION['name'];
		$menuSurname = $_SESSION['surname'];
		$menuUserame = $_SESSION['username'];
		$profilePicture = $_SESSION['imageUrl'] ;		
	}else{
		header("Location: ../index.php");
	}
?>
<?php
	include_once("includes/head.php");
?>
<?php
	include_once("includes/menu.php");
?>

<div style="margin-left:10%;margin-top:1%;width:50%;">
	<label for="search">Search</label>
	<input id="search" name="search" type="text" placeholder="...">
</div>
<?php
	include_once("includes/header.php");
?>

<?php
	include_once("includes/articles.php");
?>

<?php
	include_once("includes/footer.php");
?>


