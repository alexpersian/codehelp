<?php
/**
 * Created by PhpStorm.
 * User: shenningsgard
 * Date: 4/3/15
 * Time: 6:22 PM
 */

class myMandrill extends Mandrill
{
    private $apikey;

    public function __construct($file = '../config.ini') {
        if (!$settings = parse_ini_file($file, TRUE)) {
            throw new exception('Unable to open ' . $file . '.');
        }

        $this->apikey = $settings['mandrill']['apikey'];

        parent::__construct( $this->apikey );
    }
}