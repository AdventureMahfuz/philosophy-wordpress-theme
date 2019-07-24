<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!--- basic page needs
	================================================== -->
    <meta charset="utf-8">
    <!-- mobile specific metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php
		wp_head();
	?>
</head>

<body id="top" <?php body_class(); ?>>

<!-- pageheader
================================================== -->
<section class="s-pageheader <?php if (is_home()){echo "s-pageheader--home";} ?>">

    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="<?php echo site_url(); ?>">
					<?php
						if (current_theme_supports("custom-logo")) {
							echo get_custom_logo();
						} else {
							?>
                            <h1>
                                <a href="<?php echo site_url(); ?>">
									<?php
										bloginfo("name");
									?>
                                </a>
                            </h1>
							<?php
						}
					?>
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->
            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

	            <?php
                    get_search_form();
	            ?>

            </div>  <!-- end header__search -->


			<?php get_template_part("/template-parts/common/menu/top-menu"); ?>

        </div> <!-- header-content -->
    </header> <!-- header -->


	<?php
		if (is_home()) {
			get_template_part("/template-parts/home-feat/featured-post");
		}
	?>

</section> <!-- end s-pageheader -->
