<?php
	$video_url = "";
	if (function_exists("the_field")) {
		$video_url = get_field("source_url");
	}
?>
<article class="masonry__brick entry format-video" data-aos="fade-up">

    <div class="entry__thumb video-image">
        <a href="<?php echo esc_url($video_url); ?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
			<?php
				the_post_thumbnail("philosophy_post_thumb_square");
			?>
        </a>
    </div>

	<?php get_template_part("/template-parts/common/post-format-content/pf-content"); ?>

</article> <!-- end article -->