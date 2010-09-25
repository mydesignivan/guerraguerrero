<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="clear span-100 last"><img src="img/home-800.jpg" alt="" width="100%" /></div>
<div class="clear span-100 menu last">
    <ul class="menu-panel">
<?php $page=$this->uri->segment(2)?>
         <li><a href="<?=site_url('/panel/musica/')?>" <?php if($page=="musica") echo 'class="current"'?>>Admin M&uacute;sica</a></li>
         <li><a href="<?=site_url('/panel/contents/')?>" <?php if($page=="contents") echo 'class="current"'?>>P&aacute;ginas</a></li>
   </ul>
</div>
