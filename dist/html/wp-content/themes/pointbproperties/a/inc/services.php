<?php

    $posts = get_field('services', 'option');

if( $posts ): ?>

    <div id="services">

        <div class="wrap">

            <div class="header">

                <h3 class="title"><?php the_field('services_headline', 'option'); ?></h3>

            </div>

            <div class="content">

                <ul>

                    <?php foreach( $posts as $post): ?>

                        <?php setup_postdata($post); ?>

                        <li>

                            <div class="icon">



                            </div>

                            <h4 class="title"><?php the_title(); ?></h4>

                            <div class="description">

                                <p><?php the_field('service_description'); ?></p>

                            </div>

                            <div class="more">

                                <a href="<?php the_field('service_page_link', 'option'); ?>">Learn More</a>

                            </div>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        </div>

    </div>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>