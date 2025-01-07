<?php

namespace Abruno\Rubrica;

class ViewResponse extends Response {

    private string $view;
    private array $data;

    public function __construct(string $view, array $data){
        $this->view = $view;
        $this->data = $data;
    }

    public function send(){
        $view = new View();
        echo $view->render($this->view, $this->data);
    }

}