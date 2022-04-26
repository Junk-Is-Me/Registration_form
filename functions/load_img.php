<?php

include __DIR__.'/../config.php';

if (!empty($_FILES)) {
 
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
 
        $file_name = $_FILES['file']['name'][$i];
 
        if ($_FILES['file']['size'][$i] > UPLOAD_MAX_SIZE) {
            $errors[] = 'Недопустимый размер файла ' . $file_name;
            continue;
        }
 
        if (!in_array($_FILES['file']['type'][$i], ALLOWED_TYPES)) {
            $errors[] = 'Недопустимый формат файла ' . $file_name;
            continue;
        }
 
        $file_path = $_SERVER["DOCUMENT_ROOT"].'/uploads/'. $file_name;
 
        if (!move_uploaded_file($_FILES['file']['tmp_name'][$i], $file_path)) {
            $errors[] = 'Ошибка загрузки файла ' . $file_name;
            continue;
        }
    }
}

header('Location: /');

?>