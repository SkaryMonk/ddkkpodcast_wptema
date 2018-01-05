<?php
/**
 * @package WordPress
 * @subpackage ChaosTheory
 */

$themecolors = array(
	'bg' => '1B1B1B',
	'border' => '0A0A0A',
	'text' => 'DDDDDD',
	'link' => '6DCFF6',
	'url' => 'C1E5F3',
);

$content_width = 510;

add_theme_support( 'automatic-feed-links' );

add_custom_background();

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'chaostheory' ),
) );

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'chaostheory', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

// Widgets
require_once( get_template_directory() . '/inc/widgets.php' );

function chaostheory_widgets_init() {
	register_sidebars( 2, array(
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );

	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );

	wp_register_sidebar_widget( 'search', __( 'Search', 'chaostheory' ), 'widget_chaostheory_search' );
	wp_register_sidebar_widget( 'meta', __( 'Meta', 'chaostheory' ), 'widget_chaostheory_meta' );
	wp_register_sidebar_widget( 'links', __( 'Links', 'chaostheory' ), 'widget_chaostheory_links' );
	wp_register_sidebar_widget( 'home-link', __( 'Home Link', 'chaostheory' ), 'widget_sandbox_homelink' );
	wp_register_sidebar_widget( 'rss-links', __( 'RSS Links', 'chaostheory' ), 'widget_sandbox_rsslinks' );
}
add_action( 'widgets_init', 'chaostheory_widgets_init' );

// Nav fallback
function chaostheory_globalnav() {
?>
<div id="globalnav">
	<ul id="menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=1' ); ?>
	</ul>
</div>
<?php }

function chaostheory_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<div id="div-comment-<?php comment_ID(); ?>">
	<ul class="comment-meta">
		<li class="comment-author vcard">
		<div class="comment-avatar"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
		<span class="fn"><?php comment_author_link(); ?></span></li>
		<?php printf( __( '<li>Posted %1$s at %2$s</li> <li><a href="%3$s" title="Permalink to this comment">Permalink</a></li>', 'chaostheory' ),
			get_comment_date(),
			get_comment_time(),
			'#comment-' . get_comment_ID() );
			?> <li><?php edit_comment_link( __( '(Edit)', 'chaostheory' ), ' ', '' ); ?> <?php comment_reply_link(array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'])) ); ?></li>
	</ul>
	<div class="comment-content">
		<?php if ($comment->comment_approved == '0' ) : ?><span class="unapproved"><?php _e( 'Your comment is awaiting moderation.', 'chaostheory' ); ?></span><?php endif; ?>
		<?php comment_text(); ?>
	</div>
	</div>
<?php
}

function chaostheory_ping($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<div id="div-comment-<?php comment_ID(); ?>">
	<div class="comment-meta">
		<?php printf( __( 'By %1$s on %2$s at %3$s', 'chaostheory' ),
			get_comment_author_link(),
			get_comment_date( 'd M Y' ),
			get_comment_time( 'g:i a' ));
		?>
		<?php edit_comment_link( __( '(Edit)', 'chaostheory' ), ' ', '' ); ?>
	</div>
	<div class="trackback-content">
	<div class="comment-mod"><?php if ($comment->comment_approved == '0' ) _e( '<em>Your trackback/pingback is awaiting moderation.</em>', 'chaostheory' ); ?></div>
	<?php comment_text(); ?>
	</div>
	</div>
<?php
}