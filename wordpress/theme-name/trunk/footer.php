<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modernspace
 */

?>

<footer class="footer bg-dark">
    <div class="container-fluid">
        <div class="row">

            <?php
				wp_nav_menu([
					'theme_location'  => 'menu-footer-col-1',
					'container'       => 'div',
					'container_id'    => 'footer_navbar_1',
					'container_class' => 'col-6 col-md-3 mb-md-0 mb-3',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav navbar-nav--footer list-unstyled',
					'depth'           => 2,
					'walker'          => new bs4navwalker()

				]);
   			?>

            <?php
				wp_nav_menu([
					'theme_location'  => 'menu-footer-col-2',
					'container'       => 'div',
					'container_id'    => 'footer_navbar_2',
					'container_class' => 'col-6 col-md-3 mb-md-0 mb-3',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav navbar-nav--footer list-unstyled',
					'depth'           => 2,
					'walker'          => new bs4navwalker()

				]);
   			?>

            <div class="col-12 col-md-6">
                <aside id="footer-widget" class="widget-area text-md-right">
                    <?php dynamic_sidebar( 'footer-widget' ); ?>
                </aside><!-- #secondary -->
            </div>
        </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
