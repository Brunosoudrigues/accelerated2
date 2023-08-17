<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
    private $view;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home()
    {
        echo "";
        echo $this ->view -> render ("home");
    }
    public function upload()
    {
        echo "";
        echo $this ->view -> render ("upload");
    }
   
    public function cart()
    {
        echo "";
        echo $this ->view -> render ("cart");
    }
    public function profile()
    {
        echo "";
        echo $this ->view -> render ("profile");
    }
    public function alteration()
    {
        echo "";
        echo $this ->view -> render ("alteration");
    }

}