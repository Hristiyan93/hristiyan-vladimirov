<?php

class MiscController extends Zend_Controller_Action{
    function languagesAction(){
        $locale = Models_Locale::getCurrentLocale();
        $this->view->locale = $locale;
        $this->view->currentLanguage = Models_Locale::getLocaleName($locale);
        $this->view->languages = Models_Locale::getSupportedLanguagesList(false, 'en');
    }
    function currenciesAction(){
        $this->view->currencies = Models_Rates::listCurrencies();
        $this->view->currentCurrency = Models_Rates::getCurrentCurrency();
    }
}