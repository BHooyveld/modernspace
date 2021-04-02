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

<section class="section section--xs-overlap section--projects bg-rose-gold ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6">
                <h2 class="font-weight-light mb-3 mb-md-4 fix-richtext">
                    <?php block_field( 'title' ); ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="project-wrapper">
        <?php
				// The Loop.
				$projectCount=0;
				while ( $project_query->have_posts() ) {
					$project_query->the_post();
					$projectCount++;

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
        <div class="slider slider--projectpage" id="slider--projectpage">
            <div class="slides">

                <?php
					for ($i = 0; $i <= 5; $i++) {
						$id=null;
				?>

                <?php if ( $i === 0 && has_post_thumbnail() )$id = get_post_thumbnail_id();?>
                <?php if ( $i > 0) $id = get_field( 'image-'.$i )?>

                <?php if ($id && id !==null) : ?>
                <div class="slide">
                    <div class="gallery__image-container">
                        <div class="gallery__image-wrapper">
                            <?php echo wp_get_attachment_image($id, 'large', false, ["class" => "gallery__image"]);?>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

                <?php
				}
				?>

            </div>

            <div class="caption__cta"><button type="button" class="caption__btn slick__prev"><img
                        src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow-left.svg"
                        alt=""></button><button type="button" class="caption__btn slick__next" o><img
                        src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow-right.svg"
                        alt=""></button></div>

            <div class="caption__wrapper">
                <div class="caption fadeIn bg-red p-2 p-md-4">
                    <div class="caption__body">
                        <div class="caption__logo mb-2">
                            <div class="logo content">
                                <?php echo($logo) ?>
                            </div>
                        </div>
                        <div class="collapse collapse--md" id="collapseCaption<?php echo($projectCount)?>">
                            <table class="caption__table">
                                <tr>
                                    <td>
                                        <div class="label font-weight-bold">Location</div>
                                        <p class="location content">
                                            <?php echo(get_field( 'location' )) ?>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="label font-weight-bold">Category</div>
                                        <p class="category content">
                                            <?php echo(get_field( 'category' )) ?>

                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="label font-weight-bold">Type of project</div>
                                        <p class="type_of_project content">
                                            <?php echo(get_field( 'type_of_project' )) ?>

                                        </p>
                                    </td>
                                    <td>
                                        <div class="label font-weight-bold">Year</div>
                                        <p class="year content">
                                            <?php echo(get_field( 'year' )) ?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <a class="caption__collapse collapsed collapse-toggle collapse-toggle--md"
                            data-toggle="collapse" href="#collapseCaption<?php echo($projectCount)?>" role="button"
                            aria-expanded="false" aria-controls="collapseCaption<?php echo($projectCount)?>">
                            <span class="hiddenOnCollapsed">
                                Show less
                            </span>
                            <span class="showOnCollapsed">
                                Show more
                            </span>
                        </a>
                        <table class="caption__table">
                            <tr>
                                <td colspan="2">
                                    <div class="label font-weight-bold">Scope of work</div>
                                    <p class="scope_of_work content">
                                        <?php echo(get_field( 'scope_of_work' )) ?>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <?php endif; ?>
        <?php
			}
				// Restore original Post Data.
				wp_reset_postdata();
			?>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
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
<section class="section section--spacing bg-white position-relative"><svg class="skew skew--top skew--white"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>

</section>