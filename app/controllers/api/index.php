<?php

class controllers_api_index extends Controller {

    public function init() {
        
    }

    public function indexAction() {

        //example = list all user data
        $model = $this->loadModel("api_usersInfo");
        $data = $model->listUsers();
        $this->loadView("api", $data);
        
    }

    public function indexGetAction() {
        $this->indexAction();
    }

}

?>
