<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>  <!--отобразить заголовок страницы, а затем название блога. знак '<<' -->

<link href="<php bloginfo('stylesheet_url'); ?>" rel="stylesheet" /> <!--УРЛ на файл стилей CSS -->

<?php if ( is_singular() ) wp_enquence_script( 'comment-reply' ); ?> <!-- Безопасно добавляет JavaScript на страницу -->

<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>

<?php wp_head(); ?> <!-- Тег шаблона, который нужно вставлять перед /head, в файлах header, index .php-->

</head> 

<body>
<div id="container">
	<div id="header">
		<h1><a href="<?php echo get_option('home'); ?>"> <!-- Получает значение указанной опции ( Адрес домашней страницы блога) -->
			<?php if( !get_option('omr_logo_url')) { ?>
			<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Return to the homepage" id="logo" /> 
		<?php } else { ?>
			<img src="<?php echo get_option('omr_logo_url'); ?>" alt="Return to the homepage" id="logo" />
			<?php } ?>
		</a></h1>
			
		<ul id="subscribe">
			<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe by RSS</a></li>
			<li class="twitter"><a href="<?php echo get_option('omr_twitter_url'); ?>">Follow on Twitter</a></li>
		</ul>
	</div>


<?php echo 3; ?>