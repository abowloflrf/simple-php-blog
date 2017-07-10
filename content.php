<?php
include "content/head.php";?>
<?php
include "db/DB.php";
if(!isset($_GET['id'])) {
    header("Location:404.html");
    exit();
}
$post_id=$_GET["id"];
$query="SELECT * FROM posts WHERE id=".$post_id.";";
$result=$link->query($query);
if ($result->num_rows!=0)
{
    $hasContent=true;
    $row=$result->fetch_array();
    $title = $row["title"];
}else{
    $hasContent=false;
}
?>
<script>
    document.title="<?=$title?>"+" - Simple Blog";
    function delete_post() {
            $(this).blur();
            UIkit.modal.confirm('Are you sure want to delete?').then(function() {
                $.ajax({
                    url:"delete.php",
                    type:"post",
                    data:"id="+<?=$row['id']?>,
                    success:function () {
                        window.location.href="index.php";
                    }
                });
            }, function () {
                console.log("reject!");
            });


    }
</script>
<?php
if($hasContent)
{
    include "content/post.detail.php";
}
else{
    include "content/post.notfound.php";
}
?>

<?php
    include "content/foot.php";
?>
