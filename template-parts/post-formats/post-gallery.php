<?php if (class_exists('Attachments')): ?>
<article class="masonry__brick entry format-gallery" data-aos="fade-up">

    <div class="entry__thumb slider">
        <div class="slider__slides">
			<?php $attachments = new Attachments('post_format_gallery'); ?>
			<?php if ($attachments->exist()) : ?>
				<?php while ($attachment = $attachments->get()) : ?>
                    <div class="slider__slide">
	                    <?php echo $attachments->image( 'philosophy_post_thumb_square' ); ?>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>

	<?php get_template_part("/template-parts/common/post-format-content/pf-content"); ?>

</article> <!-- end article -->
<?php endif; ?>