<?php
include "content/head.php";
?>
<script>
    $(function () {
        $('title').html("New post");
        $("#post_form").on('submit', function (e) {
            e.preventDefault();
            var form = $("#post_form");
            var values = form.serialize();
            $.ajax({
                url: "doPost.php",
                type: "post",
                data: values,
                success: function (response) {
                    alert("Successfully post!");
                    window.location.href = "index.php";
                }
            });
        });

    });
    var myEditor;
    $(function () {
        myEditor = editormd("my-editormd", {
            width   : "100%",
            height  : 600,
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
<form id="post_form">
    <div class="uk-margin">
        <div class="uk-form-controls">
            <input class="title-input" id="title" name="title" type="text" placeholder="Your title...">
        </div>
    </div>
    <hr>

<!--    <div class="uk-margin">-->
<!--        <label class="uk-form-label" for="form-stacked-text">Text</label>-->
<!--        <div class="uk-form-controls">-->
<!--            <textarea name="content" id="content" class="uk-textarea" rows="5"-->
<!--                      placeholder="Your content here..."></textarea>-->
<!--        </div>-->
<!--    </div>-->
    
<div id="my-editormd">
         <textarea name="content" id="content" style="display: none;"></textarea>
</div>
    <input type="submit" value="POST" class="uk-button uk-button-primary uk-margin">

</form>

<?php
include "content/foot.php";
?>
