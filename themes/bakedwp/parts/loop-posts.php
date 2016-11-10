<?php
//get_template_part( 'parts/loop', 'posts' );

  $taxo = $args['post_type'];

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
            $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );?>

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
                    <?php echo 'Cat : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong>'; ?>
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
                        <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
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
                          <strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong>

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
    }
?>
