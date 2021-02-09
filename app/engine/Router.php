<?php


namespace Engine;

/**
 * Class Router
 * @package Engine
 */
class Router
{
    private static $url;

    /**
     * Построение маршрута
     */
    public static function defineRoute() {
        $url        = $_SERVER['REQUEST_URI'];
        self::$url  = $url;

        $url_arr = explode('/', $url);
    }

    /**
     * Подрубка нужного файла
     */
    public static function includePage() {
        self::defineRoute();

        if(self::$url == '/') {
            require DOCUMENT_ROOT . '/public/home.php';
        } else {
            require DOCUMENT_ROOT . '/public' . self::$url. '/index.php';
        }
    }
}