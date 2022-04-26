<?php

include __DIR__.'/../config.php';

$errors = [];

$image_file_name = $_POST['imageName'];

$image_file_name = str_replace('.', '', $image_file_name).'_comments';

$comment_file_path = $_SERVER["DOCUMENT_ROOT"].'/comments/'. $image_file_name.'.txt';

// Если коммент был отправлен
if(!empty($_POST['comment'])) {

    $comment = trim($_POST['comment']);

    // Валидация коммента
    if($comment === '') {
        $errors[] = 'Вы не ввели текст комментария';
    }

    // Если нет ошибок записываем коммент
    if(empty($errors)) {

        // Чистим текст, земеняем переносы строк на <br/>, дописываем дату
        $comment = strip_tags($comment);
        $comment = str_replace(array(["\r\n","\r","\n","\\r","\\n","\\r\\n"]),"<br/>",$comment);
        $comment = date('d.m.y H:i') . ': ' . $comment;

        // Дописываем текст в файл (будет создан, если еще не существует)
        file_put_contents($comment_file_path,  $comment . "\n", FILE_APPEND);
    }
}

header('Location: /');

?>