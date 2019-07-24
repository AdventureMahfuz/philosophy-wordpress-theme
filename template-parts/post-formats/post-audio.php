<?php
	$audio_url = "";
	if (function_exists("the_field")) {
		$audio_url = get_field("source_url");
	}
?>
<article class="masonry__brick entry format-audio" data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php echo esc_url($audio_url); ?>" class="entry__thumb-link">
			<?php
				the_post_thumbnail("functions.php")
			?>
        </a>
		<?php if ($audio_url): ?>
            <div class="audio-wrap">
                <audio id="player" src="<?php echo esc_url($audio_url); ?>" width="100%" height="42"
                       controls="controls"></audio>
            </div>
		<?php endif; ?>
    </div>

	<?php get_template_part("/template-parts/common/post-format-content/pf-content"); ?>

</article> <!-- end article -->