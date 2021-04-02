<?php

// Variables.
$post_type  = 'contact';

// WP_Query arguments.
$args = array(
    'post_type' => array( $post_type ),
    'posts_per_page'   => -1,
	'meta_key'			=> 'region',
	'orderby'     		=> array( 'meta_value' => 'ASC', 'title' => 'ASC' ),
    'order'            => 'ASC',
    'post_status'      => 'publish',
    'suppress_filters' => true
);

// The Query.
$contact_query = new WP_Query( $args );

?>

<section class="section section--xs-overlap section--presence bg-rose-gold">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6">
                <h2 class="mb-3 mb-md-4 font-weight-light fix-richtext"><?php block_field( 'title' ); ?></h2>
                <?php block_field( 'content' ); ?>
            </div>
        </div>
        <?php if ($contact_query->have_posts()): ?>
        <div class="row my-2 my-md-4">
            <?php
			// The Loop.
			$lastRegion = null;
			while ( $contact_query->have_posts() ) {
				$contact_query->the_post();
				?>

            <div class="col-12 col-lg-4">
                <div class="contact-block mb-2 mb-md-3 mb-lg-0">
                    <h5 class="font-weight-light mb-s red"><?php echo(get_field( 'subtitle' )); ?></h5>
                    <h4 class="font-weight-bold mb-2"><?php echo(get_field( 'region' )); ?></h4>
                    <div class="contact__cta mt-auto">
                        <a class="btn btn-primary mt-2" href="<?php echo(get_field( 'button_link' )); ?>">
                            <?php echo(get_field( 'button_label' )); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
				}
					// Restore original Post Data.
					wp_reset_postdata();
				?>

        </div>
        <?php endif; ?>

        <div class="row mt-4 mt-md-6">
            <div class=" col-12 col-lg-6">
                <h3 class="mb-2 mb-md-2 font-weight-light fix-richtext">
                    <?php block_field( 'title-careers' ); ?>
                </h3>
                <?php block_field( 'content-careers' ); ?>
                <div class="contact__cta mt-3">
                    <a class="btn btn-primary mt-2" href="<?php block_field( 'link-careers' ); ?>">
                        <?php block_field( 'label-careers' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>