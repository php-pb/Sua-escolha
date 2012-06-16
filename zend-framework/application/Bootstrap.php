<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initTranslation()
    {
        $translate = new Zend_Translate('Array', APPLICATION_PATH . '/configs/languages/pt_BR.php', 'pt_BR');
        $translate->setLocale('pt_BR');
        Zend_Registry::set('Zend_Translate', $translate);

        $locale = new Zend_Locale('pt_BR');
        Zend_Registry::set('Zend_Locale', $locale);
    }

}

