<?php

    $posts = get_field('cta', 'option');

if( $posts ): ?>

    <?php foreach( $posts as $post): ?>

        <?php setup_postdata($post); ?>

        <div class="cta">

            <div class="wrap">

                <div class="inner-wrap">

                    <h3 class="headline"><?php the_field('cta_headline'); ?></h3>

                    <div class="description">

                        <p>

                            <?php the_field('cta_description'); ?>

                        </p>

                    </div>

                    <div class="more">

                        <a href="<?php the_field('cta_page_link'); ?>"><?php the_field('cta_button_label'); ?></a>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>