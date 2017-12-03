<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    
    <?php 
    if( is_front_page() ):
        $basictheme_classes = array('basic-theme', 'homepage');
    else:
        $basictheme_classes = array('basic-theme', 'interiorpage');
    endif;
    ?>
    
    <body <?php body_class($basictheme_classes); ?>>
        
        <?php wp_nav_menu(array('theme_location'=>'primary')); ?>
        
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />