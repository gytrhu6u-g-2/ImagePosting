<?php

include('./dbConfig.php');
if(isset($_GET['image_id'])) {
    $imageId = $_GET['image_id'];
} else {
    echo "画像IDが指定されていません。";
    exit();
}
$comment = $_POST['comment']; //name属性の'comment'を取得

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($comment)) {
    $insert = $db->query("INSERT INTO comments (image_id, comment) VALUES (" . $imageId .",'" . $comment . "')");

    if($insert) {
        $url = $_SERVER['HTTP_REFERER']; // どのページから遷移してきたかを確認する 
        header('Location: '. $url, true, 303);
        exit();
    }
}else {
    $url = $_SERVER['HTTP_REFERER']; // どのページから遷移してきたかを確認する
    header('Location: '. $url, true, 303);
    exit();
}

