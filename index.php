<?php
    include "content/head.php";
    include "db/DB.php";
    include "pagination.php";

    $page=isset($_GET['page'])?$_GET['page']:1;

    $query="SELECT * FROM posts ORDER BY id DESC LIMIT ".(($page-1)*10).",10;";
    $totalQuery="SELECT * FROM posts ORDER BY id DESC;";

    $result=$link->query($query);
    $posts_list=$result->fetch_all();

    $totalResult=$link->query($totalQuery);
    $total=$totalResult->num_rows;

    $paginator=new pagination("10",$total);
    $paginator->setPresentPage($page);


?>
<div style="margin-top: 20px;"></div>

<div class="uk-margin">
    <a href="post.php"><button class="uk-button uk-button-primary uk-width-medium">New post</button></a>
</div>
<?php
    if ($page>0&&$page<ceil($total/10)+1) {
        echo "<div>";
        echo "<ul class=\"uk-list uk-list-divider\">";
        foreach ($posts_list as $post) {
            echo "<li class='post-list-item'><a href='content.php?id=" . $post[0] . "'>" . $post[1] . "</a><span class='uk-align-right uk-text-meta'><i>".date("Y-m-d H:i",strtotime($post[3]))."</i></span></li>";
        }
        echo "</ul>";
        echo "</div>";
        echo $paginator->echoHTML();

    } else {
        echo "<p>Page Not Found!</p>";
    }

    include "content/foot.php"

?>

