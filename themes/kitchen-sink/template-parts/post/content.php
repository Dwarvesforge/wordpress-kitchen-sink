<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
?>

<?php

// archives
print '<h1>Archives</h1>';
print Thorin::pre(WPS::archives());

// categories
print '<h1>Categories</h1>';
print Thorin::pre(WPS::categories());

// recent comments
print '<h1>Recent comments</h1>';
print Thorin::pre(WPS::recent_comments());

// menu
print '<h1>Menu</h1>';
print Thorin::pre(WPS::menu('primary'));

// next post
print '<h1>Next post</h1>';
print Thorin::pre(WPS::next_post());

// previous post
print '<h1>Previous post</h1>';
print Thorin::pre(WPS::previous_post());

// next post link
print '<h1>Next posts link</h1>';
print Thorin::pre(WPS::next_posts_link());

// previous post link
print '<h1>Previous posts link</h1>';
print Thorin::pre(WPS::previous_posts_link());

// next posts url
print '<h1>Next posts url</h1>';
print Thorin::pre(WPS::next_posts_url());

// previous posts url
print '<h1>Previous posts url</h1>';
print Thorin::pre(WPS::previous_posts_url());

// post
print '<h1>Post</h1>';
print Thorin::pre(WPS::post());

// posts
print '<h1>Posts</h1>';
print Thorin::pre(WPS::posts([
	'posts_per_page' => 2
]));

// recent posts
print '<h1>Recent posts</h1>';
print Thorin::pre(WPS::recent_posts([
	'numberposts' => 2
]));

// posts
print '<h1>Random posts</h1>';
print Thorin::pre(WPS::random_posts());

// users count
print '<h1>Users count</h1>';
print Thorin::pre(WPS::users_count());

// user
print '<h1>User by id</h1>';
print Thorin::pre(WPS::user(1));
print '<h1>User by email</h1>';
print Thorin::pre(WPS::user('ob@buzzbrothers.ch'));

// popular posts
print '<h1>Popular posts</h1>';
$posts = WPS::popular_posts();
print Thorin::pre($posts);

// popular posts for category
print '<h1>Popular posts for category</h1>';
$posts = WPS::popular_posts_for_category(0);
print Thorin::pre($posts);

// related posts
print '<h1>Related posts</h1>';
$posts = WPS::related_posts(1, 2);
print Thorin::pre($posts);

// current post
print '<h1>Current post</h1>';
$currentPost = WPS::post();
print Thorin::pre([
	'title' => $currentPost->title,
	'viewed_count' => $currentPost->viewed_count
]);

// current post comments
print '<h1>Current post comments</h1>';
$currentPostComments = WPS::comments();
print Thorin::pre($currentPostComments);


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					twentyseventeen_posted_on();
				} else {
					echo twentyseventeen_time_link();
					twentyseventeen_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_excerpt();
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
