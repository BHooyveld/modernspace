<?php

// Variables.
$post_type  = 'story';

// WP_Query arguments.
$args = array(
    'post_type' => array( $post_type ),
    'posts_per_page'   => -1,
	'meta_key'			=> 'year',
	'orderby'     => array( 'meta_value' => 'ASC', 'title' => 'ASC' ),
    'post_status'      => 'publish',
    'suppress_filters' => true
);

// The Query.
$story_query = new WP_Query( $args );

?>

<section class="section section--overlap section--experience bg-rose-gold">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <?php
			// The Loop.
			$lastRegion = null;
				while ( $story_query->have_posts() ) {
				$story_query->the_post();
				?>
                <div class="experience">
                    <div class="experience__content bg-white col-12 col-md-6">
                        <h5 class="experience__year font-weight-light red mb-2"><?php echo(get_field( 'year' )); ?></h5>
                        <h4 class="experience__title font-weight-bold mb-2"><?php echo(get_the_title()); ?></h4>
                        <?php the_content(); ?>
                    </div>
                    <?php if (has_post_thumbnail()): ?>
                    <div class="experience__image-wrapper col-12 col-md-5 col-lg-4 bg-red"><img
                            src="<?php the_post_thumbnail_url( 'large' ); ?>" class="w-100 experience__image" alt="">
                    </div>
                    <?php endif; ?>
                </div>


                <?php
				}
					// Restore original Post Data.
					wp_reset_postdata();
				?>

            </div>
        </div>
</section>