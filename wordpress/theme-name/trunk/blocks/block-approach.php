<?php

// Variables.
$post_type  = 'approach';

// WP_Query arguments.
$args = array(
    'post_type' => array( $post_type ),
    'posts_per_page'   => -1,
	'meta_key'			=> 'order',
	'orderby'     		=> 'meta_key',
    'order'            => 'ASC',
    'post_status'      => 'publish',
    'suppress_filters' => true
);

// The Query.
$approach_query = new WP_Query( $args );
?>
<section class="section section--overlap section--approach bg-rose-gold">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <ul class="approach-steps">

                    <?php
						// The Loop.
						while ( $approach_query->have_posts() ) {
							$approach_query->the_post();
					?>
                    <li>
                        <div class="approach">
                            <div class="approach__content bg-white col-12 col-md-7 col-lg-6">
                                <div class="mb-1 mb-md-4">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    <?php
											$id = get_post_thumbnail_id();
											echo wp_get_attachment_image($id, 'large', false, ["class" => "approach__image"]);
										?>
                                    <?php endif; ?>
                                </div>
                                <h4 class="font-weight-bold mb-1">
                                    <?php echo(get_the_title()); ?>
                                </h4>
                                <h5 class="font-weight-light mb-2 mb-md-3">
                                    <?php echo(get_field( 'subtitle' )) ?>
                                </h5>
                                <?php echo(get_the_content()); ?>
                            </div>
                            <div class="approach__list col-12 col-md-5 col-lg-4 bg-red">
                                <h5 class="p font-weight-bold mb-1">
                                    <?php echo(get_field( 'list_title' )); ?>
                                </h5>
                                <?php echo(get_field( 'list_content' )); ?>
                            </div>
                        </div>
                        <div class="row approach__footer">
                            <div class="col-12 col-md-10">
                                <?php echo(get_field( 'footer' )); ?>
                            </div>
                        </div>
                    </li>
                    <?php
						}
						// Restore original Post Data.
						wp_reset_postdata();
					?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="approach__padding">
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
    </div>
</section>
<section class="section section--spacing bg-white position-relative"><svg class="skew skew--top skew--white"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>

</section>