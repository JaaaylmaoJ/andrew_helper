<?php

function d($v) {
    echo "<pre>";

    if(gettype($v) == 'boolean' || is_null($v))
        var_dump($v);
    else
        print_r($v);

    echo "</pre>";
}