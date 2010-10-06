<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    <?=$this->session->flashdata('message')?>
</div>
<?php }?>

<form id="form1" class="form-music" action="<?=site_url(isset($info) ? '/panel/musica/edit/' : '/panel/musica/create/')?>" method="post" enctype="multipart/form-data">
    <div class="trow">
        <label for="txtName">T&iacute;tulo Mp3</label>
        <input type="text" name="txtName" id="txtName" size="22" value="<?=@$info['name']?>" />
    </div>
    <div class="trow">
        <label for="txtFileName">Archivo Mp3</label>
        <input type="file" name="txtFileName" id="txtFileName" size="22" />
        <input type="hidden" name="mp3old" value="<?=@$info['filename']?>" />
    </div>
    <div class="trow">
        <label>&nbsp;</label>
        <label class="label-leyend">M&aacute;ximo 2 megas</label>
    </div>
    <div class="trow">
        <label>&nbsp;</label>
        <input type="submit" name="btnSubmit" value="Guardar" />
    </div>
    <input type="hidden" name="id" id="id" value="<?=@$info['id']?>" />
</form>