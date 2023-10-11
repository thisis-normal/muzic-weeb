<?php
//DB Params
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'muzic_weeb';
//App Root
//echo dirname(dirname(__FILE__));
echo '<br>';
//URL Root
define("APPROOT", dirname(dirname(__FILE__)));
const URLROOT = 'http://localhost:2002/muzic-weeb';
//Site Name
const SITENAME = 'PHPMVC';

define("currentTimestamp", date('Y-m-d H:i:s'));
