<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    <?=$this->session->flashdata('message')?>
</div>
<?php }?>

<form id="form1" class="form-music" action="<?=site_url('/panel/musica/import')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <div class="list-mp3">
            <ul>
            <?php foreach( $list as $filename ){?>
                <li><input type="text" name="txtName[]" value="<?=substr($filename, 0, -4)?>" /><input type="hidden" name="ext[]" value="<?=substr($filename, -4)?>" /></li>
            <?php }?>
            </ul>
        </div>
    </div>
    <div class="trow">
        <label>&nbsp;</label>
        <input type="submit" name="btnSubmit" value="Importar" />
    </div>
</form>