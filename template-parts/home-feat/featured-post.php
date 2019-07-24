<?php
	$feat_post_query = new WP_Query(array(
		"meta_key" => "featured_post",
		"meta_value" => "1",
		"posts_per_page" => 3,
	));
	$categories = get_the_category();
	$category = $categories[mt_rand(0,count($categories)-1)];
	$post_data       = array();
	while ($feat_post_query->have_posts()) {
		$feat_post_query->the_post();
		$post_data[] = array(
			"feat_bg_img" => get_the_post_thumbnail_url(get_the_ID(), "large"),
			"feat_post_url" => get_permalink(),
			"title" => get_the_title(),
			"author_avatar" => get_avatar_url(get_the_author_meta("ID")),
			"author_name" => get_the_author_meta("display_name"),
			"author_url" => get_author_posts_url(get_the_author_meta("ID")),
			"date" => get_the_date(),
            "cat" => $category->name,
            "catlink" => get_category_link($category),
		);
	}
?>

<?php
	if ($feat_post_query->post_count > 1) : ?>
        <div class="pageheader-content row">
            <div class="col-full">
                <div class="featured">
                    <div class="featured__column featured__column--big">
                        <div class="entry"
                             style="background-image: url('<?php echo esc_url($post_data[0]["feat_bg_img"]); ?>')">
                            <img src="" alt="">
                            <div class="entry__content">
                                <span class="entry__category"><a href="<?php echo esc_html($post_data[0]["catlink"]); ?>"><?php echo esc_html($post_data[0]["cat"]); ?></a></span>

                                <h1>
                                    <a href="<?php echo esc_html($post_data[0]["feat_post_url"]); ?>" title="">
										<?php echo esc_html($post_data[0]["title"]); ?>
                                    </a>
                                </h1>

                                <div class="entry__info">
                                    <a href="<?php echo esc_html($post_data[0]["author_url"]); ?>" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo esc_url($post_data[0]["author_avatar"]); ?>"
                                             alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="<?php echo esc_html($post_data[0]["author_url"]); ?>"><?php echo esc_html($post_data[0]["author_name"]); ?></a></li>
                                        <li><?php echo esc_html($post_data[0]["date"]); ?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">
						<?php
							for ($i = 1; $i < 3; $i++):
								?>
                                <div class="entry"
                                     style="background-image:url('<?php echo esc_url($post_data[$i]["feat_bg_img"]); ?>');">

                                    <div class="entry__content">
                                        <span class="entry__category"><a href="<?php echo esc_html($post_data[$i]["catlink"]); ?>"><?php echo esc_html($post_data[$i]["cat"]); ?></a></span>

                                        <h1><a href="<?php echo esc_html($post_data[$i]["feat_post_url"]); ?>" title=""><?php echo esc_html($post_data[$i]["title"]); ?></a></h1>

                                        <div class="entry__info">
                                            <ul class="entry__meta">
                                                <li>
                                                    <a href="<?php echo esc_html($post_data[$i]["author_url"]); ?>"><?php echo esc_html($post_data[$i]["author_name"]); ?></a>
                                                </li>
                                                <li><?php echo esc_html($post_data[$i]["date"]); ?></li>
                                            </ul>
                                        </div>
                                    </div> <!-- end entry__content -->

                                </div> <!-- end entry -->
							<?php
							endfor;
						?>



                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->
	<?php endif; ?>