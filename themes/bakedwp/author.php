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
                    if(isset($_GET['author_name'])) :
                        $curauth = get_userdatabylogin($author_name);
                    else :
                        $curauth = get_userdata(intval($author));
                    endif;
                    ?>

                    <h2>Les articles de <?php echo $curauth->nickname; ?> sur <a href="#">Pouvoir d'agir</a> :</h2>

                    <?php while (have_posts()) : the_post(); ?>
                        <h2>Liste des Auteurs:</h2>
                        <ul>
                            <?php wp_list_authors(); ?>
                        </ul>
                    <h3>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    <h3>
                    <?php the_time('j/n/Y'); ?></span>, <?php $category = get_the_category(); echo $category[0]->cat_name;?>

                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
