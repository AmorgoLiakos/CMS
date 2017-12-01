<?php
    include_once("config.php");
    include_once("functions.php");

    $search = $_POST["search"];

    $sql = "SELECT * FROM articles WHERE title LIKE '%{$search}%'";
    //$sql = "SELECT * FORM articles";
   

    $result = showArticlesSQL($con,$sql);

    echo $result;

?>