<?php
	define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
	add_filter( 'attachments_default_instance', '__return_false' );

	function philosophy_gallery_post_attachment( $attachments )
	{
		$fields         = array(
			array(
				'name'      => 'title',
				'type'      => 'text',
				'label'     => __( 'Title', 'attachments' ),
			),
		);

		$args = array(
			'label'         => 'Post format gallery Attachments',
			'post_type'     => array( 'post'),
			'position'      => 'normal',
			'priority'      => 'high',
			'filetype'      => array("image"),
			'note'          => 'Attach image here!',
			'button_text'   => __( 'Attach Files', 'philosophy' ),
			'fields'        => $fields,

		);

		$attachments->register( 'post_format_gallery', $args );
	}

	add_action( 'attachments_register', 'philosophy_gallery_post_attachment' );