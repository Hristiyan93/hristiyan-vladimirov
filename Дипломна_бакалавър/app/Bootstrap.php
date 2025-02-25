
<?php

class Bootstrap
{
    public $configuration;
    public $view;
    public $session;

	function __construct(Zend_Config $config)
    {
        $this->configuration = $config;
        $registry = Zend_Registry::getInstance();
        $registry->configuration = $this->configuration;
        $this->session = new Zend_Session_Namespace($this->configuration->namespace);
        $registry->session = $this->session;
        Zend_Registry::set('bootstrap', $this);
    }

	function initDbAdapter()
	{
        if(!$this->configuration->database)
        {
            return;
        }
        $databaseConfig = $this->configuration->database->toArray();
		$dbAdapter = Zend_Db::factory($databaseConfig['adapter'], $databaseConfig['params']);
		Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
	}


	function initFrontController()
	{
	    $controllersPath = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'controllers';
	    
		$front = Zend_Controller_Front::getInstance();
		$front->throwExceptions(false);
		$front->returnResponse(true);
		
		$front->registerPlugin(new Controller_Plugin_Authenticate());
		$front->registerPlugin(new Controller_Plugin_Layout());
		
		$front->setControllerDirectory(
			array(
				'default' => $controllersPath,
				'admin' => $controllersPath . DIRECTORY_SEPARATOR . 'admin',
				'test' => $controllersPath . DIRECTORY_SEPARATOR . 'test'
			)
		);
	}

	function initView()
	{
		$this->view = new Zend_View();
        $this->view->setEncoding('UTF-8');
        $this->view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $this->view->headMeta()->appendHttpEquiv('audience', 'General');
		$this->view->doctype(Zend_View_Helper_Doctype::XHTML1_STRICT);
		
		$navConfig = new Zend_Config_Xml(APPLICATION_PATH . '/config/navigation.xml');
		$nav = new Zend_Navigation($navConfig);
		$this->view->navigation($nav);
	}

	function initLayout()
	{
		$this->ps=Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		$this->ps->setView($this->view);
		$this->ps->setViewBasePathSpec(APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views');
		$this->ps->setViewScriptPathSpec(':module/:controller/:action.:suffix');
		$this->ps->setViewSuffix('php');
		
		Zend_Layout::startMvc(array(
			'layoutPath' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views/layouts',
			'viewSuffix' => 'php',
			'layout' => 'default'
		));
	}
	
	function initMail(){
	    $config = array(
	        'port' => 587,
	        'ssl' => 'tls',
	        'auth' => 'login',
	        'username' => 'flights.com22@gmail.com',
	        'password' => 'WaterMellon37'
	    );
	    $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
	    Zend_Mail::setDefaultTransport($transport);
	}
	
	function initLanguages(){
	    $logger = new Zend_Log(new Logger_Db());
	    
	    $files = glob(APPLICATION_PATH . '/config/language-*.csv');
	    
	    $isFirst = true;
	    foreach($files as $file){
	        if(!preg_match('/language-([a-z]{2})\.csv/', $file, $matches)){
	           continue;
	        }
	        if($isFirst){
	            $isFirst = false;
	            $translate = new Zend_Translate(array(
	                'adapter' => 'csv',
	                'content' => $file,
	                'locale'  => $matches[1],
	                'delimiter'   =>  ',',
	                'log' => $logger,
	                'logMessage' => '%message%',
	                'logUntranslated' => true
	            ));
	        }else{
	            $translate->addTranslation(array(
	                'content' => $file,
	                'locale'  => $matches[1],
	                'log' => $logger,
	                'delimiter'   =>  ',',
	                'logMessage' => '%message%',
	                'logUntranslated' => true
	            ));
	        }
	    }
		
		$withlocale = $this->session->locale;
		if(empty($withlocale) || !$translate->getAdapter()->isAvailable($withlocale)){
			current($translate->getList());
		}
		
		$translate->getAdapter()->setLocale($withlocale);
		
		Zend_Registry::set('Zend_Translate', $translate);
	}
	
	function initRoutes(){
	    $router = Zend_Controller_Front::getInstance()->getRouter();
	    $router->addConfig($this->configuration, 'routes');
	}

    function run()
    {
        $this->initDbAdapter();
        $this->initFrontController();
        $this->initLanguages();
        $this->initView();
        $this->initMail();
        $this->initLayout();
        $this->initRoutes();
        
        $response=Zend_Controller_Front::getInstance()->dispatch(new Zend_Controller_Request_Http());
        if($response!=null&&$response->isException())
        {
        }
        $response->sendResponse();
    }
}
