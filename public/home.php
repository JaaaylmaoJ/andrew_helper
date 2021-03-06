<?php

require_once DOCUMENT_ROOT . '/app/template/header.php';

global $APP;

?>

<div class="view_wrap">
    <?foreach (range(0, 13*14) as $i):?>
        Андрюха
    <?endforeach;?>
</div>

<div class="centered_wrap">
    <div class="form__wrapper">
        <form class="file-form" action="/" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">Закидывай</label>
                <input type="file" name="xlsx" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <span class="badge badge-warning" id="validate_error" style="display: none">А с какой стати этот файл ааааа?</span>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>

            <div class="form-group pt-3">
                Здесь появится ссылка:
                <?if(isset($APP->page->content['files'])):?>
                    <?foreach ($APP->page->content['files'] as $file) {?>
                        <a href="<?=$file?>" class="csv_download_link" download>Качать здесь</a>
                    <?}?>
                <?endif;?>
            </div>

            <?if(count($APP->errors) !== 0):?>
                <div class="form-group pt-1">
                    <?foreach ($APP->errors as $error) {?>
                        <p>Ошибка: <?=$error?></p>
                    <?}?>
                </div>
            <?endif;?>

        </form>
    </div>
</div>



<?php require_once DOCUMENT_ROOT . '/app/template/footer.php'; ?>
