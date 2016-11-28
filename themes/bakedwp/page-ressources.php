<?php

    /* Template Name: Ressources */
?>
<?php get_header();
$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
?>
  <div id="content">
    <div class="barre medium-12 large-12 columns" id="btnRessource">
         <div class='button-group float-center'>
          <p class="btn-barre">
            <button  data-filter="*">Toutes Les Catégories</button><?php
              $terms = get_terms( array(
                'taxonomy' => array('analyse','methodologie','temoignage'),
                'hide_empty' => false,
              ) );
              for($j = 0; $j < sizeof($terms);$j++){
                $var = str_replace(array(' ','-'),'_',$terms[$j]->slug);
                echo '<button  data-filter=".'.$var.'">'.$var.'</button>';
              }
            ?>
          </p>
        </div>
          <div class='button-group float-center'>

            <p class="barre-cate">
              <button  data-filter="*">Tous Les Post Type</button><?php
                foreach($tab_array as $menu){
                  if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery' || $menu === 'mc4wp-form'){
                  }else{
                    echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
                  }
                }
                ?>
            </p>
          </div>
          </div>
          <div id="inner-content" class="centerArt">
      <div id="main" class="large-12 medium-10 small-centered columns" role="main">
        <div class="columns">
            <div class="relativArt">
            <div class="AllPostInOneDiv">
              <div class="isotope">
             <?php
                  foreach($tab_array as $menu){
                    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery' || $menu === 'mc4wp-form'){
                    }else{
              ?>



                         <?php
                            $var = str_replace(' ','_',$menu);
                            $args = array( 'post_type' => $menu,
                                    'posts_per_page' => 3,
                                    );
                            include get_template_directory().'/parts/loop-posts.php';

                          ;?>


                        <!-- </div> -->

                        <?php

                              }
                            }
                      //}?>


       </div>
       </div>
       </div>
       </div>
        </div>
    </div>
  </div>

<?php get_footer(); ?>
