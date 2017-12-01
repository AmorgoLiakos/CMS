	<footer id="fh5co-footer">
		<p><small>&copy; 2016. Magazine Free HTML5. All Rights Reserverd. <br> Designed by <a href="http://freehtml5.co" target="_blank">FREEHTML5.co</a>  Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
	</footer>


	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
	<script>
	$(document).ready(function(){
	    $("#search").keyup(function(){
        	var searchValue = $(this).val();
        
	        $.ajax({
		        url:"includes/doSearch.php",
		        method:"POST",
		        data:{
		        	search:searchValue               
		        },           
		        success:function(data){
	             //alert(data);  
	             //console.dir(data);
	             $("#articlesBeforeSearch").hide();
	             $("#articlesAfterSearch").html(data);
	             $("#articlesAfterSearch").show();
	                      
	           	},
	           	error:function(data){
	              alert("error =>" +  data);  
	              //console.dir(data);
	           	}
	        });   
	    });
	});
	</script>

	</body>
</html>
<?php
	mysqli_close($con);
?>