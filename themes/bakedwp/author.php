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
                    <!-- This sets the $curauth variable -->
                    <?php
                        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                    ?>

                    <h2>About: <?php echo $curauth->nickname; ?></h2>
                    <dl>
                        <dt>Website</dt>
                        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
                        <dt>Profile</dt>
                        <dd><?php echo $curauth->user_description; ?></dd>
                    </dl>

                    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
                    <ul>
                    <!-- The Loop -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                            <?php the_title(); ?></a>,
                            <?php the_time('d M Y'); ?> in <?php the_category('&');?>
                        </li>

                        <?php endwhile; else: ?>
                            <p><?php _e('No posts by this author.'); ?></p>
                        <?php endif; ?>
                        <!-- End Loop -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
