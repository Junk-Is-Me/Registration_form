<?php 

include __DIR__.'/../config.php';

if (!empty($_POST['name'])) {

    $file_path = $_SERVER["DOCUMENT_ROOT"].'/uploads/'.$_POST['name'];

    // Удаляем изображение
    unlink($file_path);

    // Удаляем файл комментариев, если он существует
    $image_file_name = str_replace('.', '', $_POST['name']).'_comments';

    $comment_file_path = $_SERVER["DOCUMENT_ROOT"].'/comments/'. $image_file_name.'.txt';

    if(file_exists($comment_file_path)) {
        unlink($comment_file_path);
    }
}

header('Location: /');

?>