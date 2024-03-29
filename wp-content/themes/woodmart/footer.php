<?php
/**
 * The template for displaying the footer
 */

if ( woodmart_get_opt( 'collapse_footer_widgets' ) ) {
	woodmart_enqueue_js_script( 'footer' );
}

$page_id                 = woodmart_page_ID();
$disable_prefooter       = get_post_meta( $page_id, '_woodmart_prefooter_off', true );
$disable_footer_page     = get_post_meta( $page_id, '_woodmart_footer_off', true );
$disable_copyrights_page = get_post_meta( $page_id, '_woodmart_copyrights_off', true );
?>
<?php if ( woodmart_needs_footer() ) : ?>
	<?php if ( ! woodmart_is_woo_ajax() ) : ?>
		</div><!-- .main-page-wrapper --> 
	<?php endif ?>
		</div> <!-- end row -->
	</div> <!-- end container -->

	<?php if ( ! $disable_prefooter && ( woodmart_get_opt( 'prefooter_area' ) || woodmart_get_opt( 'prefooter_html_block' ) ) ) : ?>
		<div class="wd-prefooter<?php echo woodmart_get_old_classes( ' woodmart-prefooter' ); ?>">
			<div class="container">
				<?php if ( 'text' === woodmart_get_opt( 'prefooter_content_type', 'text' ) ) : ?>
					<?php echo do_shortcode( woodmart_get_opt( 'prefooter_area' ) ); ?>
				<?php else : ?>
					<?php echo woodmart_get_html_block( woodmart_get_opt( 'prefooter_html_block' ) ); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) : ?>
		<footer class="footer-container color-scheme-<?php echo esc_attr( woodmart_get_opt( 'footer-style' ) ); ?>">
			<?php
			if ( ! $disable_footer_page && woodmart_get_opt( 'disable_footer' ) ) {
				get_sidebar( 'footer' );
			}
			?>
			<?php if ( ! $disable_copyrights_page && woodmart_get_opt( 'disable_copyrights' ) ) : ?>
				<div class="copyrights-wrapper copyrights-<?php echo esc_attr( woodmart_get_opt( 'copyrights-layout' ) ); ?>">
					<div class="container">
						<div class="min-footer">
							<div class="col-left set-cont-mb-s reset-last-child">
								<?php if ( woodmart_get_opt( 'copyrights' ) != '' ) : ?>
									<?php echo do_shortcode( woodmart_get_opt( 'copyrights' ) ); ?>
								<?php else : ?>
								<p> <a href="https://iran-woodmart.ir/product/%d9%82%d8%a7%d9%84%d8%a8-%d9%88%d9%88%d8%af%d9%85%d8%a7%d8%b1%d8%aa/">قالب وودمارت </a>- <?php esc_html_e( 'تمامی حقوق برای این سایت محفوظ است.', 'ایران وودمارت' ) ?></p>
							<?php endif ?>
							</div>
							<?php if ( woodmart_get_opt( 'copyrights2' ) != '' ) : ?>
								<div class="col-right set-cont-mb-s reset-last-child">
									<?php echo do_shortcode( woodmart_get_opt( 'copyrights2' ) ); ?>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			<?php endif ?>
		</footer>
	<?php endif ?>
<?php endif ?>
</div> <!-- end wrapper -->
<div class="wd-close-side<?php echo woodmart_get_old_classes( ' woodmart-close-side' ); ?>"></div>
<?php do_action( 'woodmart_before_wp_footer' ); ?>
<?php wp_footer(); ?>
</body>
</html>
