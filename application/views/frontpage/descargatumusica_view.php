<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<ul class="list-mp3">
<?php foreach( $list->result_array() as $row ){
$src = UPLOAD_PATH_MP3 . $row['filename'];
?>
    <li>
        <a href="<?=$src?>"><img src="img/download.png" alt="" width="22" height="21" /></a>
        <span><a href="<?=$src?>"><?=$row['name']?></a></span>
    </li>
<?php }?>
</ul>
