<?php

// Variables.
$post_type  = 'project';

// WP_Query arguments.
$args = array(
	'post_type' => array( $post_type ),
	'posts_per_page'   	=> 8,
	'meta_key'			=> 'order',
	'orderby'     		=> 'meta_key',
	'order'            => 'ASC',
	'post_status'      => 'publish',
	'suppress_filters' => true
);


// The Query.
$project_query = new WP_Query( $args );
?>

<section class="section section--xs-overlap section--gallery bg-rose-gold position-relative"><svg
        class="skew skew--white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>
    <div class="container-fluid">
        <div class="row align-items-center mb-3 mb-md-5">
            <div class="col-12">
                <h2 class="font-weight-light mb-3 mb-md-4 fix-richtext">
                    <?php block_field( 'title' ); ?>
                </h2>
                <a class="btn btn-primary" href="<?php block_field( 'button-link' ); ?>">
                    <?php block_field( 'button-label' ); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="slider slider--homepage" id="slider--homepage">
        <div class="slides">
            <?php
				// The Loop.
				while ( $project_query->have_posts() ) {
					$project_query->the_post();
			?>
            <?php if ( has_post_thumbnail() ) : ?>
            <?php
				$logo = get_field('logo');
				$logo_size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $logo ) {
					 $logo =  wp_get_attachment_image( $logo, $logo_size );
				} else {
					$logo = "<h4 class=\"font-weight-bold\">" .  get_the_title() . "</h4>";

				}
			?>

            <div class="slide" data-logo="<?php echo(htmlspecialchars($logo,ENT_QUOTES)) ?>"
                data-location="<?php echo(htmlspecialchars(get_field( 'location' ),ENT_QUOTES)) ?>"
                data-category="<?php echo(htmlspecialchars(get_field( 'category' ),ENT_QUOTES)) ?>"
                data-year="<?php echo(htmlspecialchars(get_field( 'year' ),ENT_QUOTES)) ?>"
                data-type_of_project="<?php echo(htmlspecialchars(get_field( 'type_of_project' ),ENT_QUOTES)) ?>"
                data-scope_of_work="<?php echo(htmlspecialchars(get_field( 'scope_of_work' ),ENT_QUOTES)) ?>">
                <div class="gallery__image-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php
						$id = get_post_thumbnail_id();
						echo wp_get_attachment_image($id, 'large', false, ["class" => "gallery__image"]);
					?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php
			}
				// Restore original Post Data.
				wp_reset_postdata();
			?>
        </div>
        <div class="caption__wrapper">
            <div class="caption">
                <div class="caption__body-bg bg-red">
                    <div class="caption__body p-2 p-md-4">
                        <div class="caption__logo mb-2">
                            <div class="logo content"></div>
                        </div>
                        <table class="caption__table">
                            <tr>
                                <td>
                                    <div class="label font-weight-bold">Location</div>
                                    <p class="location content"></p>
                                </td>
                                <td>
                                    <div class="label font-weight-bold">Category</div>
                                    <p class="category content"></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="label font-weight-bold">Type of project</div>
                                    <p class="type_of_project content"></p>
                                </td>
                                <td>
                                    <div class="label font-weight-bold">Year</div>
                                    <p class="year content"></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="label font-weight-bold">Scope of work</div>
                                    <p class="scope_of_work content"></p>
                                </td>
                            </tr>
                        </table>
                        <div class="caption__cta"><button type="button" class="caption__btn slick__prev"><img
                                    src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow-left.svg"
                                    alt=""></button><button type="button" class="caption__btn slick__next" o><img
                                    src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow-right.svg"
                                    alt=""></button></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>