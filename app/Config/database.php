<?php

use AD7six\Dsn\Wrapper\CakePHP\V2\DbDsn;

class DATABASE_CONFIG {

// /**
//  * Define connections using environment variables
//  *
//  * @return void
//  */
	public function __construct() {
		$this->default = DbDsn::parse(env('DATABASE_URL'));
		$this->test = DbDsn::parse(env('DATABASE_TEST_URL'));
	}

	public $default = array(
        'datasource'  => 'Database/Mysql',
        'persistent'  => false,
        'host'        => 'us-cdbr-iron-east-04.cleardb.net',
        'login'       => 'b9499b0fbead53',
        'password'    => '3ce83671',
        'database'    => 'heroku_2dfb529ea745083',
        'prefix'      => ''
    );
}
