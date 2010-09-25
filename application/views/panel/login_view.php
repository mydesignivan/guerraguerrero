<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="clear"></div>
<div class="login">
    <form id="form1" action="<?=site_url('/panel/index/login/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <p>
            <label for="txtUser">Usuario</label>
            <input type="text" name="txtUser" id="txtUser" class="span-4" />
        </p>
        <p>
            <label for="txtPass">Contrase&ntilde;a</label>
            <input type="password" name="txtPass" id="txtPass" class="span-4" />
        </p>
        <?php if( $this->session->flashdata('loginfaild') ){?>
        <p class="error">El usuario y/o password son incorrectos</p>
        <?php }?>
        <label>&nbsp;</label>
        <button type="submit" name="btnSubmit">Enviar</button>
    </form>
</div>