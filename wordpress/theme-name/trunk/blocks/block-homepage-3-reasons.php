<section class="section section--sm-overlap section--reasons bg-rose-gold">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-4">
                <h2 class="font-weight-light mb-3 mb-md-4 fix-richtext">
                    <?php block_field( 'title' ); ?>
                </h2>
                <a class="btn btn-primary mb-3 mb-md-0"
                    href="<?php block_field( 'button-link' ); ?>"><?php block_field( 'button-label' ); ?>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <div class="box text-center">
                    <div class="box__icon mb-2 mb-md-4">
                        <img src="<?php block_field( 'reason-1-icon' ); ?>" />
                    </div>
                    <h3 class="lead box__title font-weight-bold mb-1"><?php block_field( 'reason-1-title' ); ?></h3>
                    <p><?php block_field( 'reason-1-content' ); ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="box text-center">
                    <div class="box__icon mb-2 mb-md-4">
                        <img src="<?php block_field( 'reason-2-icon' ); ?>" />
                    </div>
                    <h3 class="lead box__title font-weight-bold mb-1"><?php block_field( 'reason-2-title' ); ?></h3>
                    <p><?php block_field( 'reason-2-content' ); ?></p>
                </div>
                <div class="box text-center">
                    <div class="box__icon mb-2 mb-md-4">
                        <img src="<?php block_field( 'reason-3-icon' ); ?>" />
                    </div>
                    <h3 class="lead box__title font-weight-bold mb-1"><?php block_field( 'reason-3-title' ); ?></h3>
                    <p><?php block_field( 'reason-3-content' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>