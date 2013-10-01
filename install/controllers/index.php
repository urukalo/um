<?php

class controllers_index extends Controller {

    public function init() {
        $this->setLevel("index", LEVELS::GET);
        $this->Widget["home"] = new Widget("home");
    }

    function indexAction() {
        
        
        
        $model = $this->loadModel("index");
        $data = $model->indexModel();

        //load views
        $this->loadView("header", "");
        $this->loadView("index", $data);
        $this->loadView("footer", "");
    }

    function aboutAction(){
        
        $this->Widget["home"]->setView("about");
        $this->indexAction();
        
    }
    function howtoAction(){
        
        $this->Widget["home"]->setView("howto");
        $this->indexAction();
        
    }
}

?>
