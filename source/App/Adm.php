<?php

namespace Source\App;

use League\Plates\Engine;

class Adm
{
    private $view;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home()
    {
        echo "";
        echo $this ->view -> render ("home");
    }
    public function products()
    {
       
        echo $this ->view -> render ("products");
    }
    public function registercliente()
    {
       
        echo $this ->view -> render ("registercliente");
    }
    public function alterationcliente()
    {
       
        echo $this ->view -> render ("alterationcliente");
    }
    public function registerproducts()
    {
       
        echo $this ->view -> render ("registerproducts");
    }
    public function alterationproducts()
    {
       
        echo $this ->view -> render ("alterationproducts");
    }
    public function faq()
    {
       
        echo $this ->view -> render ("faq");
    }
    public function listclient()
    {
       
        echo $this ->view -> render ("listclient");
    }
    public function listprodutos()
    {
       
        echo $this ->view -> render ("listprodutos");
    }

}