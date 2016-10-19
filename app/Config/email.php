<?php

use AD7six\Dsn\Wrapper\CakePHP\V2\EmailDsn;

class EmailConfig {

/**
 * Define connections using environment variables
 *
 * @return void
 */
	public function __construct() {
		$this->default = EmailDsn::parse(env('EMAIL_URL'));
		$this->smtp = EmailDsn::parse(env('EMAIL_SMTP_URL'));
		$this->fast = EmailDsn::parse(env('EMAIL_FAST_URL'));

		$this->gmail = array(
        'host' => 'smtp.sendgrid.net',
        'port' => 465,
		'username' => 'apikey',
        'password' => env('SENDGRID_KEY'),
        'transport' => 'Smtp'
		);
	}

}
