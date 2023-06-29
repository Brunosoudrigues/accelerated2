<?php

namespace Source\App;
use League\Plates\Engine;
use Source\Models\Faq;
use Source\Models\Product;
class Web
{
    private $view;
    public function __construct(){
        $this -> view=new Engine(__DIR__ . "/../../themes/web" , "php"); 
    } 

    public function home()
    {
        echo $this ->view -> render ("home");
    }


    public function login(array $data) : void
    {
       
        echo $this ->view -> render ("user-auth",[]);
    }

    public function alteration()
    {
       
        echo $this ->view -> render ("alteration");
    }
 public function register()
    {
       
        echo $this ->view -> render ("register");
    }
    public function cart()
    {
       
        echo $this ->view -> render ("cart");
    }
    public function faq()
    {
        $faqs = new Faq();
        echo $this->view->render("faq",[
            "faqs" => $faqs->selectAll(),
            "name" => "Fábio"
        ]);}

        public function products (array $data) : void {

            //var_dump($data);

            $products = new Product();

                //var_dump($products->selectByCategory($data["categoryName"]));            

            if(!empty($data["categoryName"])){
                echo $this->view->render("products", ["products" => $products->selectByCategory($data["categoryName"])]);
                return;
            }
            //var_dump($products->selectAll());
            //var_dump($data["categoryName"]);
            echo $this->view->render("products", ["products" => $products->selectAll() ]);

        }

    }