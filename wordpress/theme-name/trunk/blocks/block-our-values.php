<?php

// Variables.
$post_type  = 'value';

// WP_Query arguments.
$args = array(
    'post_type' => array( $post_type ),
    'posts_per_page'   => -1,
	'orderby'     		=> array( '' => 'ASC', 'title' => 'ASC' ),
    'order'            => 'ASC',
    'post_status'      => 'publish',
    'suppress_filters' => true
);

// The Query.
$value_query = new WP_Query( $args );
?>

<section class="section section--value bg-rose-gold position-relative"><svg class="skew skew--white"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <h2 class="font-weight-light mb-3 fix-richtext">
                    <?php block_field( 'title' ); ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="list--col-2-wide">
                    <?php
				// The Loop.
				while ( $value_query->have_posts() ) {
					$value_query->the_post();
			?>

                    <div>
                        <div class="passion-box">
                            <h4 class="font-weight-bold mb-2">
                                <?php echo(get_the_title()); ?></h4>
                            </h4>
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <?php
				}
				// Restore original Post Data.
				wp_reset_postdata();
            ?>
                </div>

            </div>
        </div>
</section>