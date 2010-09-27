<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS',     'users');
define('TBL_CONTENTS',  'contents');
define('TBL_MUSIC',     'music');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
$msg = '<b>Nombre de la Novia:</b> {name_novia}<br />
<b>Nombre del Novio:</b> {name_novio}<br />
<b>Lugar de Residencia:</b> {lugar}<br />
<b>Fecha de Casamiento:</b> {fecha}<br />
<b>E-mail:</b> {mail}<br />
<b>Telefono:</b> {phone}<br />
<b>Consulta:</b><hr color="#000000" />{message}';
define('EMAIL_CONTACT_SUBJECT', 'Unique WP - Formulario Contacto');
define('EMAIL_CONTACT_MESSAGE', $msg);


/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_MP3', './uploads/mp3/');


/*
|--------------------------------------------------------------------------
| METADATA TITLE
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Guerra Guerrero Djs - ');
define('TITLE_INDEX', 'Home');
define('TITLE_MUSIC', 'Musica');
define('TITLE_MUSIC_EVENT_ILUMINACION', 'Musica - Iluminaci&oacute;n');
define('TITLE_MUSIC_EVENT_SONIDO', 'Musica - Sonido');
define('TITLE_MUSIC_DISCOTEQUE', 'Musica - Discoteque');
define('TITLE_MUSIC_RADIOS', 'Musica - Radios');
define('TITLE_EVENT_SISTSONIDO', 'Eventos - Sistemas de Sonidos');
define('TITLE_EVENT_ILUMINACION', 'Eventos - Iluminaci&oacute;n');
define('TITLE_EVENT_ILUMSONIDO', 'Eventos - Iluminaci&oacute;n - Sonido');
define('TITLE_DISCOTEQUE', 'Discoteque');
define('TITLE_RADIOS', 'Radios');
define('TITLE_SONIDO', 'Sonido');
define('TITLE_ILUMINACION', 'Iluminaci&oacute;n');
define('TITLE_PORTFOLIO', 'Portfolio');
define('TITLE_DESCARGA', 'Descarga tu musica');

/*
|--------------------------------------------------------------------------
| METADATA KEYWORDS
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_MUSIC', '');
define('META_KEYWORDS_MUSIC_EVENT_ILUMINACION', '');
define('META_KEYWORDS_MUSIC_EVENT_SONIDO', '');
define('META_KEYWORDS_MUSIC_DISCOTEQUE', '');
define('META_KEYWORDS_MUSIC_RADIOS', '');
define('META_KEYWORDS_EVENT_SISTSONIDO', '');
define('META_KEYWORDS_EVENT_ILUMINACION', '');
define('META_KEYWORDS_EVENT_ILUMSONIDO', '');
define('META_KEYWORDS_DISCOTEQUE', '');
define('META_KEYWORDS_RADIOS', '');
define('META_KEYWORDS_SONIDO', '');
define('META_KEYWORDS_ILUMINACION', '');
define('META_KEYWORDS_PORTFOLIO', '');
define('META_KEYWORDS_DESCARGA', '');


/*
|--------------------------------------------------------------------------
| METADATA DESCRIPTIONS
|--------------------------------------------------------------------------
*/
define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_MUSIC', '');
define('META_DESCRIPTION_MUSIC_EVENT_ILUMINACION', '');
define('META_DESCRIPTION_MUSIC_EVENT_SONIDO', '');
define('META_DESCRIPTION_MUSIC_DISCOTEQUE', '');
define('META_DESCRIPTION_MUSIC_RADIOS', '');
define('META_DESCRIPTION_EVENT_SISTSONIDO', '');
define('META_DESCRIPTION_EVENT_ILUMINACION', '');
define('META_DESCRIPTION_EVENT_ILUMSONIDO', '');
define('META_DESCRIPTION_DISCOTEQUE', '');
define('META_DESCRIPTION_RADIOS', '');
define('META_DESCRIPTION_SONIDO', '');
define('META_DESCRIPTION_ILUMINACION', '');
define('META_DESCRIPTION_PORTFOLIO', '');
define('META_DESCRIPTION_DESCARGA', '');

/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */