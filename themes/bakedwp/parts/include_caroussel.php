<?php
  $args = array( 'post_type' => array('post','events'),
    'posts_per_page' => 5,
    );
?>
<section id="owl-demo" class="owl-carousel owl-theme">
  <?php
  $loopy = new WP_Query( $args );
  if($loopy->have_posts()){
    while ( $loopy->have_posts() ) {
        $loopy->the_post();

        $author = get_the_author();
        $my_date = get_the_date( 'l j F  Y' );
        ?>

  <div class="" style="background-image:url('<?php the_post_thumbnail_url( "full" ); ?>');">
    <div class="sliderCont ">
      <h2><a href="<?php the_permalink();?>"> <?php the_title(); ?></a></h2>
      <?php echo $my_date;
      echo $author;
      // the_taxonomies();
      // wp_get_post_terms();?>
      <p><?php the_excerpt(); ?></p>
    </div>
  </div><?php
    }
  };?>
</section>
