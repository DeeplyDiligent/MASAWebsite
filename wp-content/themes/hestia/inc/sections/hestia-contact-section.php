<?php
/**
 * Contact section for the homepage.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

if ( ! function_exists( 'hestia_contact' ) ) :
	/**
	 * Contact section content.
	 * This function can be called from a shortcode too.
	 * When it's called as shortcode, the title and the subtitle shouldn't appear and it should be visible all the time,
	 * it shouldn't matter if is disable on front page.
	 *
	 * @since Hestia 1.0
	 * @modified 1.1.51
	 */
	function hestia_contact( $is_shortcode = false ) {

		/**
		 * Don't show section if Disable section is checked.
		 * Show it if it's called as a shortcode.
		 */
		$hide_section  = get_theme_mod( 'hestia_contact_hide', false );
		$section_style = '';
		if ( $is_shortcode === false && (bool) $hide_section === true ) {
			if ( is_customize_preview() ) {
				$section_style .= 'display: none;';
			} else {
				return;
			}
		}

		/**
		 * Gather data to display the section.
		 */
		if ( current_user_can( 'edit_theme_options' ) ) {
			/* translators: 1 - link to customizer setting. 2 - 'customizer' */
			$hestia_contact_subtitle = get_theme_mod( 'hestia_contact_subtitle', sprintf( __( 'Change this subtitle in %s.', 'hestia' ), sprintf( '<a href="%1$s" class="default-link">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=hestia_contact_subtitle' ) ), __( 'customizer', 'hestia' ) ) ) );
		} else {
			$hestia_contact_subtitle = get_theme_mod( 'hestia_contact_subtitle' );
		}
		$hestia_contact_title      = get_theme_mod( 'hestia_contact_title', esc_html__( 'Get in Touch', 'hestia' ) );
		$hestia_contact_area_title = get_theme_mod( 'hestia_contact_area_title', esc_html__( 'Contact Us', 'hestia' ) );

		$hestia_contact_background = get_theme_mod( 'hestia_contact_background', apply_filters( 'hestia_contact_background_default', get_template_directory_uri() . '/assets/img/contact.jpg' ) );
		if ( ! empty( $hestia_contact_background ) ) {
			$section_style .= 'background-image: url(' . esc_url( $hestia_contact_background ) . ');';
		}
		$section_style = 'style="' . $section_style . '"';

		/**
		 * In case this function is called as shortcode, we remove the container and we add 'is-shortcode' class.
		 */
		$class_to_add  = $is_shortcode === true ? 'is-shortcode' : '';
		$class_to_add .= ! empty( $hestia_contact_background ) ? 'section-image' : '';

		hestia_before_contact_section_trigger(); ?>
		<section class="hestia-contact contactus <?php echo esc_attr( $class_to_add ); ?>" id="contact" data-sorder="hestia_contact" <?php echo wp_kses_post( $section_style ); ?>>
			<?php
			hestia_before_contact_section_content_trigger();
			if ( $is_shortcode === false ) {
				hestia_display_customizer_shortcut( 'hestia_contact_hide', true );
			}
			?>
			<div class="container">
				<?php hestia_top_contact_section_content_trigger(); ?>
				<div class="row">
					<div class="col-md-5 hestia-contact-title-area" <?php echo hestia_add_animationation( 'fade-right' ); ?>>
						<?php
						hestia_display_customizer_shortcut( 'hestia_contact_title' );
						if ( ! empty( $hestia_contact_title ) || is_customize_preview() ) :
							?>
							<h2 class="hestia-title"><?php echo wp_kses_post( $hestia_contact_title ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $hestia_contact_subtitle ) || is_customize_preview() ) : ?>
							<h5 class="description"><?php echo hestia_sanitize_string( $hestia_contact_subtitle ); ?></h5>
						<?php endif; ?>
						<?php

						/**
						 * Get the default value for the Contact Content option
						 * This first tries to get the old value ( we made some changes at some point ) and if that if empty, get the new default value
						 */
						$contact_content_default = hestia_contact_get_old_content( 'hestia_contact_content' );

						if ( empty( $contact_content_default ) && current_user_can( 'edit_theme_options' ) ) {
							$contact_content_default = hestia_contact_content_default();
						}

						$hestia_contact_content = get_theme_mod( 'hestia_contact_content_new', wp_kses_post( $contact_content_default ) );
						if ( ! empty( $hestia_contact_content ) ) {
							echo '<div class="hestia-description">';
								echo wp_kses_post( $hestia_contact_content );
							echo '</div>';
						}

						?>
					</div>
					<?php
					$hestia_contact_form_shortcode_default = '[pirate_forms]';
					$hestia_contact_form_shortcode         = get_theme_mod( 'hestia_contact_form_shortcode', $hestia_contact_form_shortcode_default );
					if ( defined( 'PIRATE_FORMS_VERSION' ) || ( $hestia_contact_form_shortcode != $hestia_contact_form_shortcode_default ) ) {
						?>
							<div class="col-md-5 col-md-offset-2 hestia-contact-form-col" <?php echo hestia_add_animationation( 'fade-left' ); ?>>
								<div class="card card-contact">
									<?php if ( ! empty( $hestia_contact_area_title ) || is_customize_preview() ) : ?>
										<div class="header header-raised header-primary text-center">
											<h4 class="card-title"><?php echo esc_html( $hestia_contact_area_title ); ?></h4>
										</div>
									<?php endif; ?>
									<div class="content">
										<?php
										if ( function_exists( 'hestia_contact_form_callback' ) ) {
											hestia_contact_form_callback();
										} else {
											echo do_shortcode( '[pirate_forms]' );
										}
										?>
									</div>
								</div>
							</div>
						<?php

					} elseif ( is_customize_preview() ) {
						hestia_contact_form_placeholder();
					}
					?>
				</div>
				<?php hestia_bottom_contact_section_content_trigger(); ?>
			</div>
			<?php hestia_after_contact_section_content_trigger(); ?>
		</section>
		<?php
		hestia_after_contact_section_trigger();
	}
endif;


if ( function_exists( 'hestia_contact' ) ) {
	$section_priority = apply_filters( 'hestia_section_priority', 65, 'hestia_contact' );
	add_action( 'hestia_sections', 'hestia_contact', absint( $section_priority ) );
}
