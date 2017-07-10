<?php
/**
 * Created by PhpStorm.
 * User: ruofeng
 * Date: 2017/7/9
 * Time: 19:45
 */
if (!isset($_REQUEST['id']))
{
    header("Location:404.html");
    exit();
}else
{
    include "content/head.php";
    include "db/DB.php";
    $id = $_REQUEST['id'];
    $query_get="SELECT * FROM posts WHERE id="."$id";
    $result=$link->query($query_get);
    if($result->num_rows==0){
        header("Location:404.html");
        exit();
    }else{
        $row=$result->fetch_array();
        $getTitle=$link->real_escape_string($row['title']);
        $getContent=$link->real_escape_string($row['content']);
        $getId=$row['id'];
    }
}
if(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['content'])){
    $updateTitle=$_POST['title'];
    $updateContent=$_POST['content'];
    $getId=$_POST['id'];
    $query_update="UPDATE posts SET title='".$updateTitle."',content='".$updateContent."'WHERE id=".$getId.";";
    if($link->query($query_update)){
        header("Location:content.php?id=".$getId);
    }else{
        echo $link->error;
    }
}
    ?>
    <script>
        $(function () {
            $('title').html("Edit post");
            var getTitle="<?=$getTitle?>";
            var getContent="<?=$getContent?>";
            $("#title").val(getTitle);
            $("#content").val(getContent);

            $("#edit_form").on('submit', function (e) {
                e.preventDefault();
                var form = $("#edit_form");
                var values = form.serialize();
                $.ajax({
                    url: "edit.php",
                    type: "post",
                    data: values+"&id=<?=$getId?>",
                    success: function (response) {
                        alert("Successfully update!");
                        console.log(this.data);
                        window.location.href = "content.php?id="+<?=$getId?>;
                    }
                });
            })
        })
    </script>
    <script>
        var myEditor;
        $(function () {
            myEditor = editormd("my-editormd", {
                width   : "100%",
                Height:600,
                path    : "js/lib/",
                toolbarIcons:function(){
                    return ['bold','del','italic','quote','|','list-ul','list-ol','hr','|','h1','h2','h3','h4','|','link','code','code-block','table','image','||','preview','fullscreen','search']
                },
                imageUpload:true,
                imageFormats   : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : "imageUpload.php"
            });
        })
    </script>
    <form id="edit_form">
        <div class="uk-margin">
            <div class="uk-form-controls">
                <input class="title-input" id="title" name="title" type="text" placeholder="Your title...">
            </div>
        </div>

<!--        <div class="uk-margin">-->
<!--            <label class="uk-form-label" for="form-stacked-text">Text</label>-->
<!--            <div class="uk-form-controls">-->
<!--            <textarea name="content" id="content" class="uk-textarea" rows="5"-->
<!--                      placeholder="Your content here..."></textarea>-->
<!--            </div>-->
<!--        </div>-->
        <div id="my-editormd">
            <textarea name="content" id="content" style="display: none"></textarea>
        </div>
        <input type="submit" value="SAVE" class="uk-button uk-button-primary uk-margin">
    </form>
    <?php
    include "content/foot.php";
    ?>