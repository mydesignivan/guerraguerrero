<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">
    Los mp3 fueron eliminados correctamente.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    Las mp3 no han podido ser eliminados.
</div>
<?php }?>


<div class="trow">
    <div class="right">
        <button type="button" onclick="location.href='<?=site_url('panel/musica/form')?>'">Agregar Mp3</button>&nbsp;&nbsp;
        <button type="button" onclick="Music.del_sel();">Eliminar Seleccionados</button>
    </div>
</div>


<?php if( $list->num_rows>0 ){?>
    <table cellpadding="0" cellspacing="0" class="table-music" id="tblList">
    <thead>
        <tr>
            <td class="cell1">&nbsp;</td>
            <td class="cell2">Mp3</td>
            <td class="cell3">Ordernar</td>
            <td class="cell4">Eliminar</td>
        </tr>
    </thead>
    <tbody id="sortable">
<?php
$n=0;
foreach( $list->result_array() as $row ) {
    $n++;
    $class = $n%2 ? 'row-even' : '';
?>
        <tr id="id<?=$row['bodas_id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" value="<?=$row['bodas_id']?>" /></td>
            <td class="cell2"><span class="jq-name"><?=$row['filename']?></span></td>
            <td class="cell3"><a href="javascript:void(0)" class="handle"><img src="img/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell4"><a href="javascript:void(Music.del(<?=$row['id']?>))"><img src="img/icon_delete.png" alt="" width="16" alt="16" /><span>Eliminar</span></a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<?php }?>

<script type="text/javascript">
<!--
Music.initializer();
-->
</script>