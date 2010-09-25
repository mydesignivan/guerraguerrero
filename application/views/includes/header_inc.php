<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span-100 row1 last">
    <img src="img/icon-download-qr.png" alt="" width="26" height="26" />
    <span>Descargar Aplicaci&oacute;n QR</span>
</div>
<div class="clear span-100 row1 last">
    <img src="img/icon-download-music.png" alt="" width="26" height="26" />
    <span>Descarga tu M&uacute;sica</span>
</div>
<div class="clear span-100 last"><img src="img/home-800.jpg" alt="" width="100%" /></div>
<div class="clear span-100 menu last">
<?php $page=$this->uri->segment(1)?>
    <ul>
        <li><a href="<?=site_url('')?>" <?php if($page=="events") echo 'class="current"'?>>Eventos</a></li>
        <li><a href="<?=site_url('/iluminacion/')?>" <?php if($page=="iluminacion") echo 'class="current"'?>>Iluminaci&oacute;n</a></li>
        <li><a href="<?=site_url('/sonido/')?>" <?php if($page=="sonido") echo 'class="current"'?>>Sonido</a></li>
        <li><a href="<?=site_url('/musica/')?>" <?php if($page=="musica") echo 'class="current"'?>>M&uacute;sica</a></li>
        <li><a href="<?=site_url('/portfolio/')?>" <?php if($page=="portfolio") echo 'class="current"'?>>Portfolio</a></li>
    </ul>
</div>
