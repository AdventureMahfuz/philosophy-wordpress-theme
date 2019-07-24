<?php
	//Get only the approved comments
	$args = array(
		'status' => 'approve',
		'post_id' => get_the_ID(),
	);

	// The comment Query
	$comments_query = new WP_Comment_Query;
	$comments       = $comments_query->query($args);
?>
<h3 class="h2">
	<?php
		$philosopy_cn = get_comments_number();
		if ($philosopy_cn <= 1) {
			echo $philosopy_cn . " " . __("comment", "philosophy");
		} else {
			echo $philosopy_cn . " " . __("comments", "philosophy");
		}
	?>
</h3>
<?php
	// Comment Loop
	if ($comments) {
		foreach ($comments as $comment) {
			?>
            <ol class="commentlist">
                <li class="thread-alt depth-1 comment">
                    <div class="comment__avatar">
						<?php
							echo get_avatar($comment);
						?>
                    </div>
                    <div class="comment__content">
                        <div class="comment__info">
                            <cite>
								<?php
									comment_author($comment);
								?>
                            </cite>
                        </div>
                        <div class="comment__text">
                            <p><?php comment_text($comment); ?></p>
                        </div>
                    </div>
                </li> <!-- end comment level 1 -->
            </ol> <!-- end commentlist-->
			<?php
		}
	} else {
		echo 'No comments found.';
	}
?>
<div class="comment-form">
	<?php
		if (comments_open()) {
			comment_form();
		} else {
			_e("Comments are disable", "philosophy");
		}
	?>
</div>
