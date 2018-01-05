<?php
/**
 * @package WordPress
 * @subpackage ChaosTheory
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="https://plus.google.com/112566473928624428648" rel="publisher" />
<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="header" class="clearfix">
		<div id="innerheader">

			<div id="knapcontainer">
				<div id="knap1"><a href="http://ddkkpodcast.dk"><img src="/wp-content/themes/chaostheory/images/knap_hjem.png" title="Til forsiden"/></a></div>

				<div id="knap2"><a href="http://ddkkpodcast.dk/om"><img src="/wp-content/themes/chaostheory/images/knap_info.png" title="Om DDKK Podcast"/></a></div>

				<div id="knap3"><a href="mailto:post@ddkkpodcast.dk"><img src="/wp-content/themes/chaostheory/images/knap_post.png" title="Send post"/></a></div>

				<div id="knap4"><a href="http://ddkkpodcast.dk/?feed=rss2"><img src="/wp-content/themes/chaostheory/images/knap_rss.png" title="RSS Feed"/></a></div>
			</div>

			<h1 id="blog-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="blog-description"><?php bloginfo( 'description' ); ?></div>
		</div>
	</div><!--  #header -->

	<p class="access"><a href="#content" title="<?php esc_attr_e( 'Skip navigation to the content', 'chaostheory' ); ?>"><?php _e( 'Skip navigation', 'chaostheory' ); ?></a></p>

	<?php wp_nav_menu( array( 'container' => 'div', 'container_id' => 'globalnav', 'theme_location' => 'primary', 'menu_id' => 'menu', 'fallback_cb' => 'chaostheory_globalnav' ) ); ?>