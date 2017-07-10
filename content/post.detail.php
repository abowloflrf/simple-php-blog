<div>
    <?php
    echo "<h1 class='post-title'>" . $row['title'] . "</h1>";
    echo "<p style='font-style: italic'>" . "Create at: " . date("Y-m-d H:i",strtotime($row['create_time'])) . "</p>";
    echo "<p style='font-style: italic'>" . "Last update: " . date("Y-m-d H:i",strtotime($row['last_update'])) . "</p>";
    echo "<hr>";

//    echo "<p>" . $row["content"] . "</p>";?>
    <div id="post-view">
        <textarea style="display: none"><?=$row{'content'}?></textarea>
    </div>
    <script src="js/lib/marked.min.js"></script>
    <script src="js/lib/prettify.min.js"></script>

    <script src="js/lib/raphael.min.js"></script>
    <script src="js/lib/underscore.min.js"></script>
    <script src="js/lib/sequence-diagram.min.js"></script>
    <script src="js/lib/flowchart.min.js"></script>
    <script src="js/lib/jquery.flowchart.min.js"></script>

    <script type="text/javascript">
            var  myView;
            $(function(){
            myView = editormd.markdownToHTML("post-view", {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                seqenceDiagram : true  // 默认不解析
            });
            });
    </script>

</div>
<div style="margin-bottom: 20px">
    <button onclick="delete_post()" class="uk-button uk-button-danger">Delete</button>
    <a href="edit.php?id=<?=$row['id']?>"><button class="uk-button uk-button-default">Edit</button></a>
</div>
