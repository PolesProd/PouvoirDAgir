<?php
//get_template_part( 'parts/loop', 'posts' );
  $taxo = $args['post_type'];
  $loopy = new WP_Query( $args );
  if($loopy->have_posts()){
    while ( $loopy->have_posts() ) {
        $loopy->the_post();
        if($post->post_type == 'analyse'){
          $termsFirst = wp_get_post_terms( $post->ID, 'analyse' );
          if(!empty($termsFirst)){
            $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
            $post_type = 'analyse';
          }
        }else if($post->post_type == 'methodologie'){
          $termsFirst = wp_get_post_terms( $post->ID, 'methodologie' );
          if(!empty($termsFirst)){
            $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
            $post_type = 'methodologie';
          }
        }else if($post->post_type == 'temoignage'){
          $termsFirst = wp_get_post_terms( $post->ID, 'temoignage' );
          if(!empty($termsFirst)){
            $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
            $post_type = 'temoignage';
          }
        }else if($post->post_type == 'post'){
          $term = 'post';
          $post_type = 'post';
        }
          echo '<div class="ressource grid-item  '.$post_type.' '. $term.' events large-3 medium-3 " data-category="transtition" >';
            $id = get_the_ID();
            $author = get_the_author();
            $my_date = get_the_date( 'd/m/Y' );
            $terms = wp_get_post_terms( $id, $taxo , $args );
            $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
            ?>
           
              <div class="dateArt">
                <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
                <?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( "ID" ), get_the_author_meta( "user_nicename" ) ).'">'.$author.'</div>'; ?>
              </div>
              <div class="titreArt">
            <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
          </div>
              <div class="tagArt">
                    <ul>
                      <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                    </ul>
                </div>
              <div class="shareImg">
                  <p><a href="">  <img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
                  <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
                  <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
              </div>
           <?php
          echo '</div>';
          
        
      }
    }
?>
