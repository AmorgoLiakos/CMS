<?php

	function createMenu($con){
		$showMenu="";
		$sqlMenu =" SELECT * FROM menu WHERE active=1 ORDER BY menuposition ASC ";
		$result = mysqli_query($con,$sqlMenu);
		
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){

				$showMenu .="<li>
								{$row['menuname']}
							</li>";
			}
		}
		echo $showMenu;
	};

	function createCategory($conn,$x){
		$sql = " SELECT * FROM menu ";
		$result=mysqli_query($conn,$sql);
		$counter = mysqli_num_rows($result);
		
		$position=$counter+1;
		$nameCat=$x;

		$sql2 = " INSERT INTO `menu`(`menuname`, `menuposition`, `menucategory`, `active`) VALUES ('$nameCat','$position', '$nameCat ',1) ";
		$result2 = mysqli_query($conn,$sql2);

		$sql3="INSERT INTO `categories`(`categoryname`) VALUES ('$nameCat')";
		$result3 = mysqli_query($conn,$sql3);
	};

	function createArticles($con){
		$showArticles="";
		$sql = " SELECT * FROM articles ";
		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$showArticles.=" 
				<article class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box\">
					<figure>
						<a href=\"single.php?articleid={$row['id']} \"><img style=\"height:200px;width:200px;margin-left:auto;margin-right:auto;\" src=\"{$row['artimageurl']}\" alt=\"Image\" class=\"img-responsive\"></a>
					</figure>
					<span class=\"fh5co-meta\"><a href=\"#\">{$row['categories']}</a></span>
					<h2 class=\"fh5co-article-title\"><a href=\"#\">{$row['title']}</a></h2>
					<span class=\"fh5co-meta fh5co-date\">{$row['createdate']}</span>";
				$showArticles.="<span>".substr($row['content'],0,50)."...</span>";
				if(isset($_SESSION['isAdmin']) and $_SESSION['isAdmin']==1 ){
					$showArticles.="<a href=\"editArticle.php?articleid={$row['id']}\">
					 <div class=\"form-group\">
						<input type=\"submit\" class=\"form-control\" value=\"Edit Article\">
					</div>
					</a> ";
				}
				$showArticles.="</article>";
			}
			echo $showArticles;
		}

	};

	function menuCategory($con){
		$showCategory="";
		$sql="SELECT * FROM categories";
		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$showCategory.="<option>{$row['categoryname']}</option>";
			}
		}
		echo $showCategory;	
	};


	function showArticlesSQL($con,$sql){//function to show featured aticles
	    
	    if ($sql==""){
	        die("No query in the parameter!!");
	    }
	        
	    $result=mysqli_query($con,$sql);
	    
	    if(!$result){
	        die(mysqli_error($con));
	    }
	    
	    $showArticles="";    
	   	    
	    while($row=mysqli_fetch_assoc($result)){
	        
			$showArticles.=" 
			<article class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box\">
				<figure>
					<a href=\"single.php?articleid={$row['id']} \"><img style=\"height:200px;width:200px;margin-left:auto;margin-right:auto;\" src=\"{$row['artimageurl']}\" alt=\"Image\" class=\"img-responsive\"></a>
				</figure>
				<span class=\"fh5co-meta\"><a href=\"#\">{$row['categories']}</a></span>
				<h2 class=\"fh5co-article-title\"><a href=\"#\">{$row['title']}</a></h2>
				<span class=\"fh5co-meta fh5co-date\">{$row['createdate']}</span>";
			$showArticles.="<span>".substr($row['content'],0,50)."...</span>";
			$showArticles.="</article>";
	    }

	    return $showArticles;
	    ;       
	}
?>



