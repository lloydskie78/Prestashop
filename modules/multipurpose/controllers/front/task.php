<?php

class MultipurposeTaskModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function initContent()
    {
        parent::initContent(); // TODO: Change the autogenerated stub
        $this->context->smarty->assign(array(
            'nb_product' => Db::getInstance()->getValue('SELECT COUNT(*) FROM `'. _DB_PREFIX_ .'product`'),
            'categories' => Db::getInstance()->executeS('SELECT `name` FROM `'
                . _DB_PREFIX_ . 'category_lang` WHERE `id_shop` = '.(int)$this->context->language->id),
            'shop_name' => Configuration::get('PS_SHOP_NAME'),
            'manufacturer' => Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'manufacturer`')
        ));
        $this->setTemplate('module:multipurpose/views/templates/front/task.tpl');
    }

}