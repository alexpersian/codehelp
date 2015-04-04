<?php

require_once 'vendor/mandrill/mandrill/src/Mandrill.php';

class myMandrill extends Mandrill
{
    public $apikey;

    public function __construct($file = '../config.ini') {
        if (!$settings = parse_ini_file($file, TRUE)) {
            throw new exception('Unable to open ' . $file . '.');
        }

        $this->apikey = $settings['mandrill']['apikey'];

        parent::__construct( $this->apikey );
    }
}