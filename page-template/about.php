<?php
	/**
	 * Template Name: About page Template
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
			<div class="s-content__post-thumb">
				<?php
					if (has_post_thumbnail()){
						the_post_thumbnail("large");
					}
				?>
			</div>
		</div> <!-- end s-content__media -->

		<div class="col-full s-content__main">

			<?php
				the_content();
			?>

			<div class="row block-1-2 block-tab-full">
				<?php
					if (is_active_sidebar("about_page_widgets")){
						dynamic_sidebar("about_page_widgets");
					}
				?>

			</div>


		</div> <!-- end s-content__main -->

	</div> <!-- end row -->

</section> <!-- s-content -->

<?php get_footer(); ?>