<section class="section section--overlap section--approach bg-rose-gold">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-8	">
                <?php while (
						block_rows( 'reason-list' ) ) : block_row( 'reason-list' ); ?>
                <div class="reason bg-white">
                    <div class="row">
                        <div class="col-12 col-md-6 text-md-center">
                            <div class="mb-2 mb-md-4"><img src="<?php block_sub_field( 'icon' ); ?> "></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 text-md-center">
                            <h4 class="font-weight-bold mb-1 mb-md-3"><?php block_sub_field( 'title' ); ?> </h4>
                            <a class="h5 red font-weight-bold d-none d-md-block"
                                href="<?php block_sub_field( 'button-link' ); ?> ">
                                <?php block_sub_field( 'button-label' ); ?>
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <p>
                                <?php block_sub_field( 'content' ); ?>
                            </p>
                            <a class="h5 red font-weight-bold d-block d-md-none mt-2"
                                href="<?php block_sub_field( 'button-link' ); ?> ">
                                <?php block_sub_field( 'button-label' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php reset_block_rows( 'reason-list') ; ?>
            </div>
        </div>
    </div>
</section>