<?php get_header(); ?>
    <!-- s-content
    ================================================== -->
    <section class="s-content no-padding">
		<?php
			if (is_search()) {
				?>
                <h1 class="text-center">
					<?php
						_e("you search for: ", "philosophy");
						the_search_query();
					?>
                </h1>
				<?php
			}
		?>
        <div class="row masonry-wrap">
            <div class="masonry">
                <div class="grid-sizer"></div>
				<?php
					if (!have_posts()) {
						?>
                        <h2 class="text-center search-style">
							<?php
								_e("NO Result Found", "philosophy");
							?>
                        </h2>
						<?php
					}
				?>
				<?php
					while (have_posts()) {
						the_post();
						get_template_part("/template-parts/post-formats/post", get_post_format());
					}
				?>
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
					<?php
						echo philosophy_pagination();
					?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->


<?php get_footer(); ?>