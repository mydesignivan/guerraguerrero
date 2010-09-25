<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="robots" content="none" />

<?php
    require('includes/head_inc.php');
    if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach ( $tlp_script as $filename ){
            require('./js/includes/'.$filename.'_inc.php');
        }
        echo '<script type="text/javascript" src="'. site_url('load/js/'.implode('/', $tlp_script)) .'"></script>'.chr(13);
    }
?>
</head>

<body>
    <div class="container">
        <?php require('includes/header_panel_inc.php')?>
        <?php require($tlp_section)?>
        <?php require('includes/footer_inc.php')?>
    </div>
</body>
</html>