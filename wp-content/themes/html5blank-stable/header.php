<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles-index.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/normalize-index.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.css">
	<link rel="stylesheet" href="/wp-content/plugins/axis-subscriptions-4/resources/assets/css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php wp_head(); ?>
	<script src=""></script>
	<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
        	assets: '<?php echo get_template_directory_uri(); ?>',
        	tests: {}
        });
      </script>
    </head>
				<header class="header">
					<div class="wrapper">
						<?php viewlogin(); ?>
						<a href="/wp-admin/" class="sign-in-icon"><img src="/img/icons/sign-in.svg" alt=""></a>
						<div class="lang qtranxs_widget">
							<?php dynamic_sidebar( 'lang' ); ?>
						</div>
						<nav id="itemActive">
							<ul>
								<li><a href="/contacts/"><img src="/img/icons/small-01.svg" alt=""></a></li>
								<li><a href="/contacts/"><img src="/img/icons/small-02.svg" alt=""></a></li>
								<li><a href="/housing/"><img src="/img/icons/small-03.svg" alt=""></a></li>
								<li><a href="/job/"><img src="/img/icons/small-04.svg" alt=""></a></li>
							</ul>
						</nav>
					</div>
				</header>
