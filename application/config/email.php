<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Email Settings
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.mailgun.org';
$config['smtp_port'] = '587';
$config['smtp_timeout'] = '30';
$config['smtp_user'] = 'postmaster@yourdomain.com';
$config['smtp_pass'] = 'password';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";
<<<<<<< HEAD
=======

// custom values from CI Bootstrap
$config['from_email'] = "noreply@email.com";
$config['from_name'] = "CI Bootstrap";
$config['subject_prefix'] = "[CI Bootstrap] ";

// Mailgun API (to be used in Email Client library)
$config['mailgun'] = array(
	'domain'				=> '',
	'private_api_key'		=> '',
);
>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
