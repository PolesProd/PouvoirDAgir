<?php /* Template Name: Auteurs */ ?>
<?php get_header(); ?>

<div class="hero">
    <div class="row">
        <div class="large-12 columns">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div id="content">
    <div id="inner-content" class="row">
        <div id="main" class="large-12 medium-10 small-centered columns" role="main">
            <div class="columns">
                <div class="row">
                   <?php
                     custom_wp_list_authors();

                   $post_type = array('post','events','partenaires','analyse','methodologie','temoignage','glossary');
                    $args = array(
                        'post_type'=> $post_type,
                        'post_per_page' => 1,
                        'author' => $_GET['author']
                    );

                $queryGlossary = new WP_Query( $args );
                if($queryGlossary->have_posts()){
                    while ($queryGlossary->have_posts() ) {
                        echo '<div class="events large-3">'.
                        //$id = get_the_ID();
                        //$author = get_the_author();
                         
                        $queryGlossary->the_post();?>
                        <div class="dateArt">
                            <?php echo '<div class="positionDate">'.get_the_date( 'd/m/Y' ).'</div>'; ?>
                            <?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author_link().'</a></div>'; ?>
                        </div>
                        <div class="titreArt">
                            <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
                        </div><?php
                        echo '</div>';
                    }
                }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
