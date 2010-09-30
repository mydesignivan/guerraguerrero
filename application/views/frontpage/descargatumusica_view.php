<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br />
<ul class="list-mp3">
<?php foreach( $list->result_array() as $row ){
$src = UPLOAD_PATH_MP3 . $row['filename'];
?>
    <li>
        <div class="cell1"><a href="<?=$src?>"><img src="img/download.png" alt="" width="15" height="15" /></a></div>
        <div class="cell2"><a href="<?=$src?>"><?=$row['name']?></a></div>
    </li>
<?php }?>
</ul>
