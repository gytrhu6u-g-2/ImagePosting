<?php
$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, 'imageDetail.php') !== false) {
    $imageId = $_GET['id'];
    $sql = "SELECT * FROM images WHERE id = " . $imageId;

    $sth = $db->prepare($sql);
    $sth->execute();
    $data['image'] = $sth->fetch();
}
else {
    $sql = "SELECT * FROM images ORDER BY create_date DESC";

    $sth = $db->prepare($sql);
    $sth->execute();
    $data = $sth->fetchAll();

}

return $data;


