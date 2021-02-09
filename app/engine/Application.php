<?php

namespace Engine;

use Engine\Router;

class Application
{
    public $page;

    public function __construct()
    {
        $this->page = new Page();
    }

    public function run() {
        RequestData::saveFiles();

        $this->page->content['file'] = RequestData::handleUploaded();

        Router::includePage();
    }
}