<?php
/*
Template Name: Plantilla Portfoli CPT
*/
get_header();
?>

<main style="padding-top: 120px;">
    <h1>El Nostre Portfoli</h1>

    <div class="llista-projectes" style="padding-top: 120px;">

        <?php
        // 1. Definir la consulta per obtenir tots els posts del CPT 'projecte'
        $args = array(
            'post_type'      => 'projecte', // L'slug del CPT
            'posts_per_page' => -1,          // Mostrar tots els projectes
            'post_status'    => 'publish'    // Només els publicats
        );

        $projectes_query = new WP_Query($args);

        // 2. Començar el bucle de WordPress
        if ($projectes_query->have_posts()) :
            while ($projectes_query->have_posts()) : $projectes_query->the_post();

                // 3. Obtenir els camps d'ACF per al Projecte actual
                $url_projecte = get_field('url_projecte');
                $client = get_field('client');
                $tecnologies = get_field('tecnologies');

                // 4. Mostrar el contingut
        ?>
                <div class="projecte-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>

                    <h2><?php the_title(); ?></h2>
                    <p><strong>Client:</strong> <?php echo esc_html($client); ?></p>
                    <p><strong>Tecnologies:</strong> <?php echo esc_html($tecnologies); ?></p>

                    <?php if ($url_projecte) : ?>
                        <a href="<?php echo esc_url($url_projecte); ?>" target="_blank">Veure Projecte</a>
                    <?php endif; ?>
                </div>
        <?php
            endwhile;

            // 5. Reinicialitzar les dades de la consulta principal (és una bona pràctica)
            wp_reset_postdata();

        else :
            // No s'ha trobat cap projecte
            echo '<p>Encara no hi ha projectes al portfoli.</p>';
        endif;
        ?>

    </div>
</main>

<?php
get_footer();
?>