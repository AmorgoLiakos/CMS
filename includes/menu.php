<?php
	include_once("config.php");
	include_once("functions.php");
?>
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="<?php 
					if(isset($_SESSION['imageUrl']) and !empty($_SESSION['imageUrl'])){
						echo $_SESSION['imageUrl']; }
						?>"

				alt="Profile Pic" class="img-responsive">
			</figure>
			<h3 class="heading">About Me</h3>
			<h2>
				<?php 
					if(isset($_SESSION['name']) and !empty($_SESSION['name']) and isset($_SESSION['surname']) and !empty($_SESSION['surname']))
					{
						echo $_SESSION['name']." ".$_SESSION['surname'];	
					}
				?>
				
			</h2>
			<h3>
				<?php 

					if(isset($_SESSION['username']) and !empty($_SESSION['username'])){
						echo "[". $_SESSION['username'] ."]";	
					}
					 
				?>	
				</h3>
			<hr>
			<form action="includes/doLogout.php">
				<div class="form-group">
					<input type="submit" class="form-control" value="Logout">
				</div>
			</form>
			<hr>
			<?php
			if( isset($_SESSION['isAdmin']) and $_SESSION['isAdmin']==1){

				echo "<form action=\"newArticle.php\">
					<div class=\"form-group\">
						<input type=\"submit\" class=\"form-control\" value=\"New Article\">
					</div>
				</form>";
			}
			?>
		</div>

		<div class="fh5co-menu">
			<div class="fh5co-box">
				<h3 class="heading">Categories</h3>
				
				<ul>
					<?php
						createMenu($con);
		
						if( isset($_SESSION['isAdmin']) and $_SESSION['isAdmin']==1){
							echo "<form action=\"includes/newCategory.php\" method=\"post\">
							<input type=\"text\" name=\"category\" placeholder=\"New Category Name\" >
							<input type=\"submit\" value=\"Create New Category\">
							</form>";
						}
					?>
				</ul>
			</div>
			<form action="contact/Form.php" target="blank">
				<div class="form-group">
					<input type="submit" class="form-control" value="Contact Us">
				</div>
			</form>		
		</div>

	</div>