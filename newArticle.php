<?php

	if(!isset($_SESSION)){
		session_start();
	}else{
		session_start();
	}
	include_once("includes/config.php");
	include_once("includes/head.php");
	include_once("includes/header.php");
	include_once("includes/menu.php");

?>

   <div id="Artciles" class="tab-pane fade in active">
          <h3>Add New Article</h3>
          <form action="includes/doUploadArticle.php" method="post" enctype="multipart/form-data">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Content:</label>
                    <input type="text" class="form-control" id="content" name="content" >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Category:</label>
                    <select class="form-control" id="category" name="category">
                        <?php
                        	menuCategory($con);
                        ?>
                    </select>
                </div>
            </div>
            <div id="success"></div>                    
            <button style="width:20%;margin-left: auto;margin-right:auto;" type="submit" class="form-control" id="uploadBtn">Upload Article</button>
        </form>
    </div>


<?php	
	include_once("includes/footer.php");

?>