<?php

namespace Engine;

class Application
{
    public $page;
    public $errors = [];

    public function __construct()
    {
        $this->page = new Page();
    }

    public function run() {
        RequestData::saveFiles();

        $this->page->content['files'] = RequestData::handleUploaded();

        Router::includePage();
    }
}