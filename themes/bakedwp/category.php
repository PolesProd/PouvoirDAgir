<?php
/* template name: Posts by Category! */
?>
<?php get_header(); ?>
<div class="hero">
    <div class="row">
        <div class="large-12 columns">
            <?php single_cat_title(); ?></h1>
        </div>
    </div>
</div>

<div id="container">
    <div id="content" role="main">

        <h1 class="page-title"><?php
        printf( __( 'Category Archives: %s', 'bakedwp' ), '<span>' . single_cat_title( '', false ) . '</span>' );
        ?></h1>
        <?php
            get_template_part( 'parts/loop', 'archive-grid' );
        ?>
</div><!-- #content -->
</div><!-- #container -->

<?php get_footer();?>
