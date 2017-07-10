<?php
/**
 * Created by PhpStorm.
 * User: ruofeng
 * Date: 2017/7/9
 * Time: 13:16
 */

include "db/DB.php";
$title=$_POST['title'];
$content=$_POST['content'];


$query="INSERT INTO posts (title,content) VALUES ('$title','$content')";
mysqli_query($link,$query);