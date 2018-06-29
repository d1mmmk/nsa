<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" id="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=10.0,minimal-ui">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
<body>
    
	<div class="nsa">
		<header class="nsa_header container">
			<div class="row">
				<div class="col-12 col-sm-4 text-center text-sm-left nsa_logo wow fadeIn">
					<img src="<?php  echo get_template_directory_uri() . '/images/logo.png';?>" class="img-fluid" alt="">
				</div>
				<div class="col text-center text-sm-left">
					<nav class="nsa_nav wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
					    <?php if ( has_nav_menu( 'top' ) ) : ?>
	                	<?php wp_nav_menu( array(
	                		'theme_location' => 'top',
	                		'menu_class' => 'nsa_nav_list',
	                	) ); ?>
	                	<?php endif;?>
					</nav>
				</div>
				<div class="nsa_header_contacts col-md-3 col-12 text-center text-sm-right wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
					<? $contacts = get_post(2); 
						echo $contacts->post_content;?>
				</div>
			</div>
		</header>