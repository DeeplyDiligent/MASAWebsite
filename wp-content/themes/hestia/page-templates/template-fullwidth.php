<?php
/**
 * Template Name: Fullwidth Template
 *
 * The template for the full-width page.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header();

/**
 * Don't display page header if header layout is set as classic blog.
 */
$hestia_header_layout = get_theme_mod( 'hestia_header_layout', 'default' );
if ( $hestia_header_layout !== 'classic-blog' ) {
	hestia_display_page_header();
} ?>

</header>
<div class="<?php echo hestia_layout(); ?>">
	<?php
	$class_to_add = '';
	if ( hestia_woocommerce_check() && ! is_cart() ) {
		$class_to_add = 'blog-post-wrapper';
	}
	?>
	<div class="blog-post <?php echo esc_attr( $class_to_add ); ?>">
		<div class="container">
			<?php
			if ( hestia_woocommerce_check() && ( is_cart() || is_checkout() ) ) {
				?>
				<div class="row">
					<div class="col-sm-12">
						<h1 class="hestia-title"><?php single_post_title(); ?></h1>
					</div>
				</div>
				<?php
			}
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content-fullwidth', 'page' );
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
	</div>

	<?php get_footer(); ?>
