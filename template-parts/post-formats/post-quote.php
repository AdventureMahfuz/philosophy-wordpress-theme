<article class="masonry__brick entry format-quote" data-aos="fade-up">

    <div class="entry__thumb">
        <blockquote>
			<?php
				the_content();
			?>
            <cite>
                <a href="<?php the_permalink(); ?>">
					<?php
						the_title();
					?>
                </a>
            </cite>
        </blockquote>
    </div>

</article> <!-- end article -->