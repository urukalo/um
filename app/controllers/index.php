<?php

class controllers_index extends Controller {

    public function init() {
        $this->setLevel("index", LEVELS::GET);
    }

    function indexAction() {
        
        $this->Widget["home"] = new Widget("home");
        
        $model = $this->loadModel("index");
        $data = $model->indexModel();

        //loading views
        $this->loadView("header", "");
        $this->loadView("index", $data);
        $this->loadView("footer", "");
    }

}

?>
