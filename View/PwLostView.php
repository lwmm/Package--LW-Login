<?php

namespace LwLogin\View;

class PwLostView extends \LWmvc\View\View
{

    protected $view;
    protected $config;
    protected $entity;
    protected $error;

    public function __construct()
    {
        parent::__construct();
    }

    public function setErrors($error)
    {
        $this->error = $error;
    }

    public function setLanguage($lang)
    {
        $this->lang = $lang;
    }
    
    public function setUseOnlyPwLost($use)
    {
        $this->useOnlyPwLost = $use;
    }

    public function setUseDefaultCss($use)
    {
        $this->useDefaultCss = $use;
    }
    
    public function render()
    {
        if($this->lang == "de"){
            $view = new \lw_view(dirname(__FILE__).'/Templates/de/PwLost.phtml');
        }else{
            $view = new \lw_view(dirname(__FILE__).'/Templates/en/PwLost.phtml');
        }
        
        $view->useDefaultCss = $this->useDefaultCss;
        $view->useOnlyPwLost = $this->useOnlyPwLost;
        $view->actionUrl = \lw_page::getInstance()->getUrl(array("cmd" => "pwLostRequest"));
        $view->loginUrl = \lw_page::getInstance()->getUrl(array("cmd" => "showLogin"));

        return $view->render();
    }

}
