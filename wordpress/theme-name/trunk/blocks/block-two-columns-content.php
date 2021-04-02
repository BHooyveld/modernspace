<section class="section section--skew-at-top section--wecare bg-white position-relative"><svg
        class="skew skew--top skew--white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
        preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <h3 class="font-weight-bold mb-3 mb-md-6 fix-richtext"><?php block_field( 'title' ); ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="mb-2 mb-md-4"><img src=<?php block_field( 'left-icon' ); ?>></div>
                <h4 class="font-weight-bold mb-2"><?php block_field( 'left-title' ); ?></h4>
                <p class="mb-3">
                    <?php block_field( 'left-content' ); ?>
                </p>
            </div>
            <div class="col-12 offset-md-1 col-md-5">
                <div class="mb-2 mb-md-4 mt-5 mt-md-0"><img src="<?php block_field( 'right-icon' ); ?>"></div>
                <h4 class="font-weight-bold mb-2"><?php block_field( 'right-title' ); ?></h4>
                <p class="mb-3">
                    <?php block_field( 'right-content' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>