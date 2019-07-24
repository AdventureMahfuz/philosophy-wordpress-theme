<article class="masonry__brick entry format-audio" data-aos="fade-up">
    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
			<?php
				the_post_thumbnail("philosophy_post_thumb_square")
			?>
        </a>
    </div>
	<?php get_template_part("/template-parts/common/post-format-content/pf-content"); ?>
</article> <!-- end article -->