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
    $id = $_GET["articleid"];

    $sql = "SELECT * FROM articles WHERE id='{$id}'";
    $result = mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $title=$row["title"];
        $content=$row["content"];
        $image = $row["artimageurl"];
    }
?>
 <div id="Artciles" class="tab-pane fade in active">
          <h3>Edit Article</h3>
          <form action="includes/doEditArticle.php" method="post" enctype="multipart/form-data">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Content:</label>
                    <input type="text" class="form-control" id="content" name="content" value="<?php echo $content; ?>" >
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
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>                   
            <button style="width:20%;margin-left: auto;margin-right:auto;" type="submit" class="form-control" id="uploadBtn"> Update Artricle</button>
        </form>
    </div>

<?php
	include_once("includes/footer.php");
?>