<?php

require_once DOCUMENT_ROOT . '/app/template/header.php';
global $APP;

?>

<div class="view_wrap">
    <!--А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а
    А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а
    А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а
    А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а А н д р ю х а-->

    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
    Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха Андрюха
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

            <?if(isset($APP->page->content['file'])):?>
                <a href="<?=$APP->page->content['file']?>" download>Качать здесь</a>
            <?endif;?>
        </form>
    </div>
</div>



<?php require_once DOCUMENT_ROOT . '/app/template/footer.php'; ?>
