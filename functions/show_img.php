<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__.'/../config.php';

$files = scandir(UPLOAD_DIR);

$files = array_filter($files, function ($file) {
        return !in_array($file, ['.', '..', '.gitkeep']);
});

if (!empty($files)): ?>

        <?php foreach ($files as $file): ?>

            <div class="post">
                <form class='post_form_delete' action="functions/delete_img.php" method="post">
                            <input type="hidden" name="name" value="<?php echo $file; ?>">
                            <button type="submit" class="delete">
                                <span>&times;</span>
                            </button>
                </form>

                <div class="post_picture">
                    <div class="picture">
                        <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" alt="Picture">
                    </div>                    
                </div>

                <div class="post_add_comment">
                    <form class="add_comment_form" action="functions/add_comment.php" method="post">
                    <input type="hidden" name="image_name" value="<?php echo $file; ?>">
                        <input type="text" name="comment" placeholder="Оставьте комментарий...">
                        <button type="submit">Комментировать</button>
                    </form>
                </div>

                <div class="post_comments">
                    <?php
                        
                        $image_file_name = str_replace('.', '', $file).'_comments';
                        $comment_file_path = $_SERVER["DOCUMENT_ROOT"].'/comments/'. $image_file_name.'.txt';
                        $comments = file_exists($comment_file_path)
                        ? file($comment_file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
                        : [];
                        
                        if(!empty($comments)):
                            foreach ($comments as $comment): ?>
                        <p><?php echo $comment; ?></p>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    
                </div>
            </div>
        <?php endforeach; ?>

<?php else: ?>
    <div class="alert alert-secondary">Нет загруженных изображений</div>
<?php endif; ?>