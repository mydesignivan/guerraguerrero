<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--<meta http-equiv="cache-control" content="Public" />
<meta http-equiv="expires" content="<?=add_date(date('D, d M Y H:i:s'), 'D, d M Y H:i:s', array('h'=>1))?> GMT" />
<meta http-equiv="last-modified" content="<?=date('D, d M Y H:i:s')?> GMT" />-->

<link href="img/favicon.ico" rel="stylesheet icon" type="image/ico" />

<!-- Framework CSS -->
<link rel="stylesheet" href="css/screen<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="css/print<?=$this->config->item('sufix_pack_css');?>.css" type="text/css" media="print"/>
<!--[if lt IE 8]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection"/><![endif]-->

<script type="text/javascript" src="<?=site_url("load/js/initializer")?>"></script>

<!--[if IE 6]>
<script type="text/javascript" src="js/helpers/DD_belatedPNG.js"></script>
<![endif]-->
