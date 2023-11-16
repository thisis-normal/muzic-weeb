<?php
//DB Params
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'muzic_weeb';
//App Root
//echo dirname(dirname(__FILE__));

//URL Root
define("APPROOT", dirname(__FILE__, 2)); //C:\laragon\www\muzic-weeb\app
define("PROJECT_ROOT", dirname(__FILE__, 3)); //C:\laragon\www\muzic-weeb
const URLROOT = 'http://localhost:2002/muzic-weeb';
const IMGROOT = 'http://localhost:2002/muzic-weeb/public/img';
//Site Name
const SITENAME = 'PHPMVC';

//define("currentTimestamp",  new \DateTime(null, new \DateTimeZone('UTC')));
