<?php

include('./dbConfig.php');

$targetDirectory = 'images/';      // 5-7行目でファイルパスの指定
if (isset($_FILES['file']['name'])) {
    $fileName = basename($_FILES['file']['name']);
}else {
    return false;
}
$targetFilePath = $targetDirectory . $fileName;
$fileType = pathinfo($targetFilePath, PATHls
INFO_EXTENSION);  //PATHINFO_EXTENSIONで拡張子（jpgなど）を取得

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($fileName)) {     // POSTメソッドのリクエストに対する処理を行う
    $arrImageTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $arrImageTypes)) {
        $postImageForServer = move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath);     //第二引数は保存先

        if ($postImageForServer) {
            $insert = $db->query("INSERT INTO images (file_name) VALUES ('". $fileName ."')");
        }
    }
} 

header('Location: ' . './html/index.php',true, 303);
exit();