<?php
    /* Template Name: Ressources */
?>
<?php get_header(); 
$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
?>
  <div id="content">
     <div id="inner-content" class="row">
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
         <div class='button-group float-center'>
          <p>
            <button  data-filter="*">Toutes Les Catégories</button><?php
              $terms = get_terms( array(
                'taxonomy' => array('analyse','methodologie','temoignage'),
                'hide_empty' => false,
              ) );
              for($j = 0; $j < sizeof($terms);$j++){
                echo '<button  data-filter=".'.$terms[$j]->slug.'">'.$terms[$j]->name.'</button>';
              }
            ?>
          </p>
        </div>
          <div class='button-group float-center'>
            <p>
              <button  data-filter="*">Tous Les Post Type</button><?php
                foreach($tab_array as $menu){
                  if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires'){
                  }else{
                    echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
                  }
                }?>
            </p>
          </div>
<?php
                  foreach($tab_array as $menu){
                    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires'){
                    }else{
                    //var_dump($ajax_query);
                    ?>
                       <div class="<?=$menu;?>" style='border:solid 1px #ccc;'>
                        <?php
                          $args = array( 'post_type' => $menu,
                                  'posts_per_page' => 9,
                                  );
                          //print_r($args);
                          //include get_template_directory().'/parts/loop-posts.php';
                          $taxo = $args['post_type'];
                          $loopy = new WP_Query( $args );
                          if($loopy->have_posts()){
                            while ( $loopy->have_posts() ) {
                                $loopy->the_post();
                                if($post->post_type == 'analyse'){
                                  $termsFirst = wp_get_post_terms( $post->ID, 'analyse' );
                                  $term = $termsFirst[0]->slug;
                                  $post_type = 'analyse';
                                }else if($post->post_type == 'methodologie'){
                                  $termsFirst = wp_get_post_terms( $post->ID, 'methodologie' );
                                  $term = $termsFirst[0]->slug;
                                  $post_type = 'methodologie';
                                }else if($post->post_type == 'temoignage'){
                                  $termsFirst = wp_get_post_terms( $post->ID, 'temoignage' );
                                  $term = $termsFirst[0]->slug;
                                  $post_type = 'temoignage';
                                }
                                  echo '<div class="grid-item '.$post_type.' '. $term.'" data-category="transtition"">';
                                    $id = get_the_ID();
                                    $author = get_the_author();
                                    $terms = wp_get_post_terms( $id, $taxo , $args );
                                    $my_date = get_the_date( 'l j F  Y' );
                                    $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
                                    ?>
                                    <!-- Structure Date et Catégorie -->
                                    
                                      <div class="row">

                                        <!-- Date -->
                                        <div class="large-4 columns ressource__date">

                                          <div class="primary callout">
                                            <?php echo '<strong>'.$my_date.'</strong>'; ?>
                                          </div>
                                        </div><!-- Fin colonne date -->

                                        <!-- Catégorie / Taxonomy -->
                                        <div class="large-4 columns ressource__taxonomy">
                                          <div class="primary callout">
                                              <?php echo '<strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong>'; ?>
                                          </div>
                                        </div><!-- Fin colonne catégorie / taxonomy -->
                                      </div> <!-- Fin structure Date et Catégorie -->

                                      <!-- Structure Principale (Extrait article) -->
                                      <div class="row">
                                        <div class="large-12 columns">
                                          <div class="primary callout">
                                            <div class="row">
                                            <!-- Colonne image -->
                                              <div class="large-4 columns">
                                                <div class="primary callout ressource__image">
                                                  <?php
                                                      if(has_post_thumbnail()){
                                                    ?>
                                                      <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:100%;height:200px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                                                      </div><!-- Fin de la div imgArticle -->
                                                    <?php
                                                      }
                                                      else{
                                                    ?>
                                                      <div class="imgArticle" style="font-family: 'Ruda', sans-serif;background-image:url('http://suplugins.com/podium/images/placeholder-02.jpg');width:100%;height:200px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                                                      </div><!-- Fin de la div imgArticle -->
                                                    <?php
                                                      }
                                                     ?>
                                                </div>
                                              </div> <!-- Fin colonne image -->

                                              <!-- Colonne Titre -->
                                              <div class="large-8 columns">
                                               <div class="primary callout">
                                                 <h2><?php the_title(); ?></h2>
                                               </div>
                                              </div><!-- Fin colonne titre -->

                                              <!-- Colonne auteur -->
                                              <div class="large-8 columns">
                                                <div class="primary callout">
                                                  <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>
                                                </div>
                                              </div><!-- Fin colonne titre -->

                                              <!-- Colonne Chapeau -->
                                              <div class="large-8 columns">
                                                <div class="primary callout">
                                                  <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), $taxo.'_chapeau')).'</em></strong><br>'; ?>
                                                </div>
                                              </div><!-- Fin colonne chapeau -->

                                              <!-- Colonne Texte -->
                                              <div class="large-12 medium-12 columns">
                                                <div class="primary callout">
                                                  <?php the_excerpt().'<br>'; ?>
                                                </div>
                                              </div><!-- Fin colonne texte -->

                                              <!-- Colonne Partage RS -->
                                              <div class="large-4 medium-4 columns">
                                                <div class="primary callout">
                                                  <?php echo do_shortcode('[ssba]'); ?>
                                                </div>
                                              </div><!-- Fin colonne partage RS -->

                                              <!-- Colonne Lien -->
                                              <div class="large-8 medium-8 columns">
                                                <div class="primary callout">
                                                  <?php echo 'Lien vers la ressource externe : ';?>
                                                    <strong><a href="<?=implode(get_post_meta(get_the_ID(), $taxo.'_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), $taxo.'_externes'))?></a></strong>

                                                </div>
                                              </div><!-- Fin colonne lien -->
                                            </div>
                                          </div>
                                        </div>
                                      </div><!-- Fin Structure Principale (Extrait d'Article) -->
                            
                                   <?php
                                  echo '</div>';
                                
                              }
                            }
                      //}?>
                          <a href="?page_id=47" target="_blank">Plus &raquo;</a>
                         </div><?php
                    }
                  }
?>
        <!--Fin Div Méthodologie -->
    </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>