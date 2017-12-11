<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>" />
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
        
        <div class="container">
		
			<div class="row">
				
				<div class="col-xs-12">
					        
            
                    <nav class="navbar navbar-default navbar-fixed-top">
                    	<div class="container-fluid">
                    		<div class="navbar-header">
                    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    				<span class="sr-only">Toggle navigation</span>
                    				<span class="icon-bar"></span>
                    				<span class="icon-bar"></span>
                    				<span class="icon-bar"></span>
                    			</button>
                    			<a class="navbar-brand" href="/">Project name</a>
                    		</div>
                    		<div id="navbar" class="navbar-collapse navbar-right collapse">
                                <?php //bootstrap_nav();
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'walker' => new Walker_Nav_Primary()
                                )); ?>
                    		</div><!--/.nav-collapse -->
                    	</div><!--/.container-fluid -->
                    </nav><!--/.navbar -->


                </div>
                
                <div class="search-form-container">
                    <?php get_search_form(); ?>
                </div>

            </div> <!--/.row -->
        
        
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />