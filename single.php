<?php
	include_once("includes/config.php");
	include_once("includes/functions.php");

	$articleId = $_GET["articleid"];
		
	if(!isset($_SESSION)){
		session_start();
	}
	include_once("includes/menu.php");

	$sql="SELECT * FROM articles INNER JOIN users ON users.userID=articles.authorid
			WHERE articles.id=$articleId and articles.published=1 ";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);

	if(!$result){
		echo mysqli_error($con);
	}else{
		if($count>0){
			while($row=mysqli_fetch_assoc($result)){
				$artilceTitle=$row['title'];
				$articleContent=$row['content'];
				$articleImage=$row['artimageurl'];
				$articleAuthor=$row['username'];
				$articleDate=$row['createdate'];
				$articleCategory=$row['categories'];
				$articlePublish=$row['published'];
			}
		}
	}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Magazine &mdash; Free Fully Responsive HTML5 Bootstrap Template by FREEHTML5.co</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
		<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
		<meta name="author" content="FREEHTML5.CO" />

	  <!-- 
		//////////////////////////////////////////////////////

		FREE HTML5 TEMPLATE 
		DESIGNED & DEVELOPED by FREEHTML5.CO
			
		Website: 		http://freehtml5.co/
		Email: 			info@freehtml5.co
		Twitter: 		http://twitter.com/fh5co
		Facebook: 		https://www.facebook.com/fh5co

		//////////////////////////////////////////////////////
		 -->

	  	<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Animate -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon -->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<link rel="stylesheet" href="css/style.css">


		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="first.php"> AmorgoLiakos <sup>LP</sup></a></h1>
				</div>

			</div>
		
		</div>

	</header>
	
	<?php
		$x=$articleId;
		if($x!=1){
			$a=$x-1;
			echo "<a href=\"single.php?articleid=$a\" class=\"fh5co-post-prev\"><span><i class=\"icon-chevron-left\"></i> Prev</span></a> ";
		}
	?>
	<?php
		$sql="SELECT MAX(id) AS max FROM articles ";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		$max=$row['max'];
		$y=$articleId;
		if($y!=$max){
			$b=$y+1;
			echo "<a href=\"single.php?articleid=$b\" class=\"fh5co-post-next\"><span>Next <i class=\"icon-chevron-right\"></i></span></a>";
		}
	?> 

	
	
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<figure class="animate-box">
					<!-- Εδώ πείραξα το width για να βγαίνει σε όλο το μήκος της σελίδας η εικόνα -->
					<img style="width:100%" src="<?php echo $articleImage; ?>" alt="Image" class="img-responsive">
				</figure>
				<span class="fh5co-meta animate-box"><?php echo $articleCategory; ?></span>
				<h2 class="fh5co-article-title animate-box"><?php echo $artilceTitle; ?></h2>
				<h4 class=" animate-box" style="color:blue">Written By: <?php echo $articleAuthor ?></h4>
				<span class="fh5co-meta fh5co-date animate-box"><?php echo $articleDate; ?></span>
				
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
							<p style="text-align: center">
								<?php
									echo $articleContent;
								?>
							</p>
						</div>						
					</div>
					
					
				</div>
			</article>
		</div>
	</div>

<?php
	include_once("includes/footer.php");
?>

