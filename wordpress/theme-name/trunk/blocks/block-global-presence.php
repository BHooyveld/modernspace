<?php

// Variables.
$post_type  = 'office';

// WP_Query arguments.
$args = array(
    'post_type' => array( $post_type ),
    'posts_per_page'   => -1,
	'meta_key'			=> 'region',
	'orderby'     => array( 'meta_value' => 'ASC', 'title' => 'ASC' ),
    'order'            => 'ASC',
    'post_status'      => 'publish',
    'suppress_filters' => true
);

// The Query.
$city_query = new WP_Query( $args );

?>

<section class="section section--xs-overlap section--presence bg-rose-gold">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6">
                <h2 class="mb-3 mb-md-4 font-weight-light fix-richtext"><?php block_field( 'title' ); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12"><img src="<?php block_field( 'image' ); ?>" class="w-100 map__image" alt=""></div>
        </div>

        <?php
			// The Loop.
			$lastRegion = null;
			while ( $city_query->have_posts() ) {
				$city_query->the_post();
				?>

        <?php
			$region = get_field( 'region' );
			if ($lastRegion!==$region) {
				if ($lastRegion!==null) {
					echo '</div>';
				}
				echo '
				<div class="row">
					<div class="col-12">
						<h2 class="font-weight-bold mb-2 mb-md-3 mt-2 red"><span class="red">'.$region.'</span></h2>
					</div>
				</div>
				<div class="row">';

				$lastRegion=$region;
			}
		?>

        <div class="col-12 col-lg-4">
            <div class="city-block bg-white">
                <h4 class="font-weight-bold mb-1"><?php echo(get_the_title()); ?></h4>
                <h5 class="font-weight-light text-uppercase mb-2 red"><?php echo(get_field( 'country' )); ?></h5>
                <?php echo(get_field( 'content' )); ?>
            </div>
        </div>
        <?php
				}
					// Restore original Post Data.
					wp_reset_postdata();
				?>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-8">
            <div class="contact-block">
                <h4 class="font-weight-bold"><?php block_field( 'contact-title' ); ?></h4>
                <h5 class="mb-s"><?php block_field( 'contact-subtitle' ); ?></h5>
                <div class="contact__cta mt-3"><a class="btn btn-primary"
                        href="<?php block_field( 'contact-link' ); ?>"><?php block_field( 'contact-label' ); ?></a>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>