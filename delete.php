<?php
/**
 * Created by PhpStorm.
 * User: ruofeng
 * Date: 2017/7/9
 * Time: 16:18
 */
include "db/DB.php";
if(!isset($_GET['id'])) {
    header("Location:404.html");
    exit();
}
$id=$_POST['id'];
$query="DELETE FROM posts WHERE id=".$id;
mysqli_query($link,$query);
