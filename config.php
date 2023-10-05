<?php

/*
|--------------------------------------------------------------------------
| Connection params
|--------------------------------------------------------------------------
|
| Se establecen las constantes a utilizar en la clase conexión,
| estas constantes pueden ser utilizadas para otras conexiones
| dentro del framework.
|
| -----------------------
| DBMS        | Clave   |
| -----------------------
| MYSQL	      | MYSQL   |
| SQL SERVER  | SQLSRV  |
| ORACLE 	  | ORCL    |
| POSTGRESQL  | PGSQL   |
| UNIX SOCKET | SOCKET  |
| -----------------------
|
*/

const DBMS			= 'MYSQL';

const DB_SOCKET		= '';
const DB_HOST 		= 'localhost';
const DB_USER		= 'root';
const DB_PWD 		= '';
const DB_NAME 		= 'db_coins';

const DB_PORT 		= 3306;
const DB_CHARSET 	= 'utf8';