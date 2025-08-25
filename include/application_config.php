<?php 
	define('SITE_TITLE', 'Shhh App');
	define('NO_OF_RECORDS', 3);
	define('STRIPE_SECRET_KEY', $_ENV['STRIPE_SECRET_KEY'] ?? '');
    define('STRIPE_PUBLIC_KEY', $_ENV['STRIPE_PUBLIC_KEY'] ?? '');
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	if(APPLICATION_MODE ==1)
	{

		 define('SITE_PATH', 'http://localhost/testcreation/'); 
        define('HTTP_PATH', 'http://localhost/testcreation/');
        define('HTTP_PATH_ADMIN', 'http://localhost/testcreation/admin/');
        define('CURRENT_PAGE', SITE_PATH.$_SERVER['REQUEST_URI']);
	}
	else if(APPLICATION_MODE == 2)
	{
		
		define('SITE_PATH', 'http://hypertextsol.com/'); 
		define('HTTP_PATH', 'http://hypertextsol.com');
		define('HTTP_PATH_ADMIN', 'http://hypertextsol/admin/');
		define('CURRENT_PAGE', SITE_PATH.$_SERVER['REQUEST_URI']);
	}   
	//file path define
	define('JS', HTTP_PATH.'js/');
	define('CSS', HTTP_PATH.'css/');
	define('IMAGES', HTTP_PATH.'images/');
	define('INC', HTTP_PATH.'includes/');
?>