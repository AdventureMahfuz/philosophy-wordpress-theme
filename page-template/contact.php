<?php
	/**
	 * Template Name: Contact page Template.
	 */
?>
<?php
	the_post();
	get_header();
?>
    <!-- s-content
	================================================== -->
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
					<?php
						the_title();
					?>
                </h1>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
				<?php
					if (is_active_sidebar("contact_page_maps_widgets")) {
						dynamic_sidebar("contact_page_maps_widgets");
					}
				?>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

				<?php
					the_content();
				?>

                <div class="row">
					<?php
						if (is_active_sidebar("contact_page_info_widgets")) {
							dynamic_sidebar("contact_page_info_widgets");
						}
					?>
                </div> <!-- end row -->

                <h3>
					<?php
						_e("Say Hello.", "philosophy");
					?>
                </h3>
				<?php if (function_exists("the_field")): ?>
                    <form name="cForm" id="cForm" method="post" action="">
						<?php
							if (get_field("contact_form_short_code")) {
								echo do_shortcode(get_field("contact_form_short_code"));
							}
						?>
                    </form> <!-- end form -->
				<?php endif; ?>

            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->

<?php get_footer(); ?>