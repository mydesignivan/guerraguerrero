<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span-100 row1 last">
    <img src="img/icon-download-qr.png" alt="" width="26" height="26" />
    <a href="http://www.i-nigma.mobi/" target="_blank" >Descargar Aplicaci&oacute;n QR</a>
</div>
<div class="clear span-100 row1 last">
    <img src="img/icon-download-music.png" alt="" width="26" height="26" />
    <a href="<?=site_url('/descargatumusica/')?>">Descarga tu M&uacute;sica</a>
</div>
<div class="clear span-100 last"><a href="http://m.guerraguerrero.com.ar"><img src="img/home-800.jpg" alt="" width="100%" border="0" /></a></div>
<div class="clear span-100 menu last">
<?php $page=$this->uri->segment(1)?>
    <ul>
        <li><a href="<?=site_url('/eventsistsonido/')?>" <?php if($page=="eventsistsonido") echo 'class="current"'?>>Eventos</a></li>
        <li><a href="<?=site_url('/iluminacion/')?>" <?php if($page=="iluminacion") echo 'class="current"'?>>Iluminaci&oacute;n</a></li>
        <li><a href="<?=site_url('/sonido/')?>" <?php if($page=="sonido") echo 'class="current"'?>>Sonido</a></li>
        <li><a href="<?=site_url('/musica/')?>" <?php if($page=="musica") echo 'class="current"'?>>M&uacute;sica</a></li>
        <li><a href="<?=site_url('/portfolio/')?>" <?php if($page=="portfolio") echo 'class="current"'?>>Portfolio</a></li>
    </ul>
</div>
