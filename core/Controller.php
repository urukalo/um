<?php

/**
 * Description of Controller.
 *
 * @author Miki
 */
abstract class Controller extends Core
{
    public $Widget = [];

    public function __construct($option = [])
    {
        parent::__construct($option);

        $this->loadInit();
    }

    //# owerride this functions in Your controller

    abstract public function init();

    abstract public function indexAction();

    private function loadInit()
    {
        $this->init();
    }

    //# make model object and add them in registry

    public function loadModel($name, $opt = '')
    {
        return $this->loader('models_'.$name, $opt);
    }

    //# make view object

    public function loadView($name, $data)
    {
        $options = ['name' => $name, 'data' => $data];

        return new View($options);
//        return new View($name, $data);
    }

    public function loadHView($name, $data)
    {
        if ($user->loggedin()) {
            $this->loadmWidgets(['news']);
            $this->loadView('header-co', '');
        } else {
            $this->loadView('header', '');
        }

        $this->loadView($name, $data);
        $this->loadView('footer', '');

//        return new View($name, $data);
    }

    //# make widgets objects for models and add them in registry

    public function loadmWidgets($widgets)
    {
        foreach ($widgets as $name) {
            $mWidget[$name] = $this->loadModel('widgets_'.$name);

            //$vWidget[$name] = $this->loadView("widgets_" . $name);
        }
        $this->reg->mWidget = $mWidget;
        //$this->reg->vWidget = $vWidget;
        return ['mWidget' => $mWidget];
    }

    public function loadWidget($widgetName)
    {
        if (isset($this->widgetBox[$widgetName])) {
            return $this->widgetBox[$widgetName]->load();
        } else {
            return;
        }
    }

    public function loadvWidget($name, $function = '', $opt = '')
    {
        if ($function == '') {
            $data = '';
        } else {
            $wm = $this->loadModel('widgets_'.$name, $opt);
            if (method_exists($wm, $function)) {
                $data = $wm->$function($opt);
            } else {
                $data = '';
            }
        }
        $options = ['name' => 'widgets/'.$name, 'data' => $data];

        return new View($options);
    }

    //# create new object and return reference ( call autoloader to include class file )

    private function loader($load, $opt)
    {
        return new $load($opt);
    }

    public function redirect($name)
    {
        $clasName = 'controllers_'.$name;
        $controller = new $clasName();

        $this->reg->controler = $controller;

        return $controller;
    }

    public function loadHelper($name, $param)
    {
        include 'helper/'.$name.'.php';

        return new $name($param);
    }

//     function getRole($action){
//        global $roleList;
//
//        return isset($this->actionLevel[$action])?$roleList[$this->actionLevel[$action]]:$roleList['-1'];
//
//    }
//
//     public function setLevel($action, $level) {
//
//         $this->actionLevel[$action] = $level;
//    }
}
