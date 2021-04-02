<div class="hero bg-dark">

    <?php if ( !block_rows( 'hero-images' ) && has_post_thumbnail()) : ?>
    <figure class="hero__image-wrapper">
        <?php
			$hero = get_post_thumbnail_id();
			echo wp_get_attachment_image( $hero, 'large', false, ["class"=>"hero__image"] );
	?>
    </figure>
    <?php endif; ?>

    <?php $titles = ""; $count = 0;?>
    <?php if ( block_rows( 'hero-images' )): ?>
    <div class="slider slider--hero" id="slider--hero">
        <div class="slides">
            <?php
				while (
					block_rows( 'hero-images' ) ) : block_row( 'hero-images' ); ?>
            <?php

				$class = ($count++===0) ? "is-visible":"is-hidden";
				$titles = $titles . "<b class=\"fix-richtext red " . $class . "\">".block_sub_value( 'title' )."</b>";
			?>
            <div class="slide">

                <div class=" gallery__image-wrapper">
                    <?php
						$id = block_sub_value( 'hero-image' );
						echo wp_get_attachment_image($id, 'large', false, ["class" => "gallery__image"]);
					?>
                </div>
            </div>

            <?php endwhile; ?>
            <?php reset_block_rows( 'hero-images') ; ?>
            ?>
        </div>
    </div>
    <?php endif; ?>

    <svg class="skew skew--rose-gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
        preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>
    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="hero__caption">

                    <?php if ( $count === 0 ): ?>
                    <h1 class="hero__title font-weight-bolder mb-3 fix-richtext fadein">
                        <?php block_field( 'title' ) ?>
                    </h1>
                    <?php endif; ?>

                    <?php if ( $count > 0 ): ?>
                    <h1 class="rotate hero__titles font-weight-bolder mb-3 fix-richtext fadeIn">
                        <?php
							$titles = "<span class=\"cd-words-wrapper initializing\">". $titles. "</span>";
							$title = str_replace("[titles]",$titles,block_field( 'title', false ))
						?>

                        <?php echo $title ?>
                    </h1>
                    <?php endif; ?>

                    <?php if ( block_field( 'subtitle', false )): ?>
                    <h4 class="font-weight-light hero__subtitle fix-richtext">
                        <?php block_field( 'subtitle' );
							?>
                    </h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>