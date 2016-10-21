<?php
//get_template_part( 'parts/loop', 'posts' );

  //echo $args->tax_query[0]['taxonomy'];
  //$args['tax_query'][0]['taxonomy'];
  $taxo = $args['tax_query'][0]['taxonomy'];

  $loopy = new WP_Query( $args );
  if($loopy->have_posts()){
    while ( $loopy->have_posts() ) {
        $loopy->the_post();
        if (get_category($sqlTemoignage[$i]->term_id)->category_count > 0){
          echo '<div class="ressoure">';
              $id = get_the_ID();
              $author = get_the_author();
              $terms = wp_get_post_terms( $id, $taxo , $args );
              $my_date = get_the_date( 'l j F  Y' );
              $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
              echo 'Ressources n<sup>o</sup>'.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
              if(has_post_thumbnail()){
              ?>
                <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                </div><!-- Fin de la div imgArticle --><br><?php
              }
              else{
                ?>
                  <div class="imgArticle" style="font-family: 'Ruda', sans-serif;background-image:url('http://lorempixel.com/output/city-q-c-640-480-10.jpg');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                  </div><!-- Fin de la div imgArticle --><br><?php
              }
              ?>
              <?php echo 'Date d\'écriture : <strong>'.$my_date.'</strong><br>'; ?>
              <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>

              <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong><br>
              <?php the_title(); ?><br>
              <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
              <?php the_excerpt().'<br>';
          echo '</div>';
        }
      }
    }
