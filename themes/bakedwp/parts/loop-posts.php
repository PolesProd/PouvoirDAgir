<?php
//get_template_part( 'parts/loop', 'posts' );
  $taxo = $args['post_type'];
  $loopy = new WP_Query( $args );
  if($loopy->have_posts()){
    while ( $loopy->have_posts() ) {
        $loopy->the_post();
        if($post->post_type == 'analyse'){
          $termsFirst = wp_get_post_terms( $post->ID, 'analyse' );
          $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
          if($term === "hello_world"){
            $term = 'hello';
          }
          $post_type = 'analyse';
        }else if($post->post_type == 'methodologie'){
          $termsFirst = wp_get_post_terms( $post->ID, 'methodologie' );
          $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
          $post_type = 'methodologie';
        }else if($post->post_type == 'temoignage'){
          $termsFirst = wp_get_post_terms( $post->ID, 'temoignage' );
          $term = str_replace(array(' ','-'),'_',$termsFirst[0]->slug);
          $post_type = 'temoignage';
        }
          echo '<div class="ressource grid-item  '.$post_type.' '. $term.' events large-3 medium-3 " data-category="transtition" >';
            $id = get_the_ID();
            $author = get_the_author();
            $terms = wp_get_post_terms( $id, $taxo , $args );
            $my_date = get_the_date( 'd/m/Y' );
            $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
            ?>
           
              <div class="dateArt">
                <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
                <?php echo '<div class="auteurArt">'.$author.'</div>'; ?>
              </div>
              <div class="titreArt">
                <?php the_title(); ?>
              </div>
              <div class="tagArt">
                <ul>
                  <li>Tag</li>
                  <li>Tag</li>
                  <li>Tag</li>
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