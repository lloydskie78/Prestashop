<?php

//Below are the code for security and must have in every module
if(!defined('_PS_VERSION_'))
{
    exit;
}

class Multipurpose extends Module
{
    public function __construct()
    {
      $this->name = 'multipurpose';
      $this->author = 'Lloyd Alcantara';
      $this->version = '1.0.0';

      $this->bootstrap = true;
      parent::__construct();

      $this->displayName = $this->l('Multipurpose');
      $this->description = $this->l('This is part of the Prestashop module development Tutorial');
      $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' =>  _PS_VERSION_);
    }

    // This method executes after installing this module
    public function install()
    {
        include_once($this->local_path.'sql/install.php'); //This line is for the auto installation of tables that were created on the specified path
        return parent::install()
            && $this->registerHook('displayHome')
            && $this->registerHook('header')
            && $this->registerHook('displayAfterDescription')
            && $this->createTabLink();
    }

    // This method executes after uninstalling this module
    public function uninstall()
    {
        include_once($this->local_path.'sql/uninstall.php'); //This line is for the auto uninstallation of tables that were created on the specified path
        return parent::uninstall(); 
    }

    public function hookDisplayHome()
    {
        //The following lines of codes are used to display values of
        // whatever you want to display on the HomePage

        $this->context->smarty->assign(array(
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR')
        ));

        return $this->display(__FILE__, 'views/templates/hook/home.tpl');
    }

    public function hookHeader()
    {
        // The following codes are used to add custom js and css
        $this->context->controller->addCSS(array(
            $this->_path.'views/css/multipurpose.css'
        ));

        $this->context->controller->addJS(array(
            $this->_path.'views/js/multipurpose.js'
        ));

    }

    public function getContent()
    {
        // The following lines of codes are used for creating the
        // configure dropdown which can be found after you install the module
        if(Tools::isSubmit('savemultipurposetesting'))
        {
            $name = Tools::getValue('print');
            Configuration::updateValue('MULTIPURPOSE_STR', $name);
        }

        $this->context->smarty->assign(array(
            'MULTIPURPOSE_STR' => Configuration::get('MULTIPURPOSE_STR'),
            'token' => $this->generateAdminToken()
        ));
        return $this->display(__FILE__, 'views/templates/admin/configure.tpl');
    }

    public function createTabLink()
    {
        //The following lines of codes are used for the controller which is the AdminOriginController
        $tab = new Tab;
        foreach (Language::getLanguages() as $lang)
        {
            $tab->name[$lang['id_lang']] = $this->l('Origin');
        }
        $tab->class_name = 'AdminOrigin';
        $tab->module = $this->name;
        $tab->id_parent = 0;
        $tab->add();
        return true;
    }

    //This method is used for generating tokens which you can see at line 10 of configure.tpl
    public function generateAdminToken()
    {
        $cookie = new Cookie('psAdmin');
        $id_employee = $cookie->__get('id_employee');
        $controller = 'AdminOrders';
        $id_class = Tab::getIdFromClassName($controller);
        return Tools::getAdminToken($controller.$id_class.$id_employee);
    }

    //This method is for creating a custom hook
    public function hookDisplayAfterDescription()
    {
        return 'HELLO WORLD!';
    }

}
