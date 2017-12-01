<?php
	include_once("config.php");
	include_once("functions.php");
?>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry" id="articlesBeforeSearch">
			<?php
				createArticles($con);
			?>			
		</div>

	</div>
	<div class="container-fluid">
		<div class="row fh5co-post-entry" id="articlesAfterSearch">  
	 		
	    </div>
	</div>
