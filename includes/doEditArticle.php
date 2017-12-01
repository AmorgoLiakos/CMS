<?php
	if(!isset($_SESSION)){
		session_start();
	}else{
		session_start();
	}
	include_once("config.php");

	$title=trim($_POST['title']);
	$content=trim($_POST['content']);
    $category=$_POST['category'];
    $id = $_POST["id"];

    $fileName=$_FILES["image"]["name"];
    $fileType=$_FILES["image"]["type"];
    $fileSize=$_FILES["image"]["size"];
    $fileError=$_FILES["image"]["error"];
    $fileTempName=$_FILES["image"]["tmp_name"];

    $fileExt = explode(".", $fileName);
    $fileActExt = strtolower(end($fileExt));

    /* Φτιάχνω έναν πίνακα για να γνωρίζω τα επιτρεπτά format */
    $allowed = array('jpg' , 'jpeg' , 'png' , 'gif');

    /* Δίνω ένα μοναδικό όνομα στο αρχείο μου */
    $fileNameNew = uniqid().".".$fileActExt;
    
    $fileDestination = "../images/".$fileNameNew;
    $fileDestinationDb = "images/".$fileNameNew;
        
        if(in_array($fileActExt, $allowed)){
            if($fileError===0){
                if($fileSize<100000000){
                    move_uploaded_file($fileTempName,$fileDestination);

                    $time=date("Y/m/d");
                    $author=$_SESSION['author'];

                    $sql = "UPDATE `articles` SET 
                    `title`='$title',
                    `content`='$content',
                    `artimageurl`='$fileDestinationDb',
                    `authorid`='$author',
                    `createdate`='$time',
                    `categories`='$category',
                    `published`=1
                               
                    WHERE id='{$id}'";
                    mysqli_query($con,$sql);
                    header("Location: ../first.php");

                }else{
                    echo "<h1 style='text-align:center;'> Your File Is Too Big </h1>
                    <p style='text-align:center;'>Click Here To try Again -> <a href='../newArticle.php'>Try Again</a></p>";
                }
            }else{
                echo "<h1 style='text-align:center;'> Something Is Wrong With Your Pic </h1>
                <p style='text-align:center;'>Click Here To try Again -> <a href='../newArticle.php'>Try Again</a></p>";
            }
        }else{
            echo "<h1 style='text-align:center;'> This Format Is Not Supported </h1>
            <p style='text-align:center;'>Click Here To try Again -> <a href='../newArticle.php'>Try Again</a></p>";
        }




?>