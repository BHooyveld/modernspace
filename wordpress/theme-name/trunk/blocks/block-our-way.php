<section class="section section--xs-overlap section--passion bg-rose-gold">

    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 col-md-6">
                <div class="content--overlap">
                    <h2 class="font-weight-light mb-3 mb-md-4 fix-richtext">
                        <?php block_field( 'title' ); ?>
                    </h2>
                    <?php block_field( 'content' ); ?>
                </div>
            </div>
        </div>
        <div class="row postion-relative">
            <div class="col-12 ">
                <figure class="our-way__image-wrapper">
                    <?php
						$hero = block_value( 'image' );
						echo wp_get_attachment_image( $hero, 'large', false, ["class"=>"our-way__image"] );
					?>
                </figure>
            </div>
        </div>
</section>


<?php if (block_field( 'quote-content', false)): ?>
<section class="section pt-2 pb-5 section--quote bg-rose-gold position-relative"><svg class="skew skew--white"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 0,100 100,100"></polygon>
    </svg>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <div class="quote-block text-center bg-white">
                    <div class="quote__icon mb-4"><img
                            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNDRweCIgaGVpZ2h0PSI0MHB4IiB2aWV3Qm94PSIwIDAgNDQgNDAiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8dGl0bGU+aWNvbi1xdW90ZTwvdGl0bGU+CiAgICA8ZyBpZD0i8J+aqUZpbmFsLWRlc2lnbi0iIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJtb2Rlcm5zcGFjZS1hYm91dC11cy0tLeKIni1wYXNzaW9uLWZvci13aGF0LXdlLWRvIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNzI2LjAwMDAwMCwgLTE3NTIuMDAwMDAwKSIgZmlsbD0iI0Y1NDI0MSI+CiAgICAgICAgICAgIDxnIGlkPSJGaXJzdC1zZWN0aW9uIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCwgNjc4LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgPGcgaWQ9InF1b3RlIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzNTEuMDAwMDAwLCAxMDE0LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0zOTcsOTQgQzM5NS4wOTM0LDk0IDM5My4xNzQ0LDkzLjc3MjIgMzkxLjI5MjIsOTMuMzI0IEMzOTEuMTM5NCw5My4yODcgMzkwLjk4MjYsOTMuMjY4NiAzOTAuODI3OCw5My4yNjg2IEMzOTAuNTc1Miw5My4yNjg2IDM5MC4zMjI2LDkzLjMxNjYgMzkwLjA4NjIsOTMuNDEzIEwzODEuODI4Miw5Ni43MTQ4IEwzODMuMTc0Niw5MC45OTA4IEMzODMuMzQ3OCw5MC4yNTc0IDM4My4wOTEyLDg5LjQ4ODggMzgyLjUxNDYsODkuMDAzOCBDMzc4Ljk2LDg2LjAwOTIgMzc3LjAwMDQsODIuMSAzNzcuMDAwNCw3OCBDMzc3LjAwMDQsNjkuMTc3OCAzODUuOTczNiw2MiAzOTcsNjIgQzQwOC4wMjg2LDYyIDQxNi45OTk2LDY5LjE3NzggNDE2Ljk5OTYsNzggQzQxNi45OTk2LDg2LjgyMjIgNDA4LjAyODYsOTQgMzk3LDk0IE0zOTcsNjAgQzM4NC44NDksNjAgMzc1LDY4LjA1OTIgMzc1LDc4IEMzNzUsODIuODc2IDM3Ny4zNzkyLDg3LjI5MjYgMzgxLjIyNzIsOTAuNTMzNCBMMzc5LjAwMDgsMTAwIEwzOTAuODI3OCw5NS4yNzA0IEMzOTIuNzg3NCw5NS43MzcgMzk0Ljg1NSw5NiAzOTcsOTYgQzQwOS4xNTEsOTYgNDE5LDg3Ljk0MjYgNDE5LDc4IEM0MTksNjguMDU5MiA0MDkuMTUxLDYwIDM5Nyw2MCIgaWQ9Imljb24tcXVvdGUiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+"
                            alt=""></div>
                    <h4 class="quote__title font-weight-bold mb-3">
                        <?php block_field( 'quote-content' ); ?>
                    </h4>
                    <h6 class="quote__author">
                        <?php block_field( 'quote-author' ); ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
