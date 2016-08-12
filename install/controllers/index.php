<?php

class controllers_index extends Controller
{
    public function init()
    {
        $this->setLevel('index', LEVELS::GET);
        $this->Widget['home'] = new Widget('home');
    }

    public function indexAction()
    {
        $model = $this->loadModel('index');
        $data = $model->indexModel();

        //load views
        $this->loadView('header', '');
        $this->loadView('index', $data);
        $this->loadView('footer', '');
    }

    public function aboutAction()
    {
        $this->Widget['home']->setView('about');
        $this->indexAction();
    }

    public function howtoAction()
    {
        $this->Widget['home']->setView('howto');
        $this->indexAction();
    }
}
