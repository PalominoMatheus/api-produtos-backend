<?php

const DBDRIVE = 'mysql';
const DBHOST = 'localhost';
const DBNAME = 'pjport';
const DBUSER = 'root';
const DBPASS = '';

//Conexão
$connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);