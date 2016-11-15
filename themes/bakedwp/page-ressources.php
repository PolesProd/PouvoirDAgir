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
                $var = str_replace(array(' ','-'),'_',$terms[$j]->slug);
                echo '<button  data-filter=".'.$var.'">'.$var.'</button>';
              }
            ?>
          </p>
        </div>
          <div class='button-group float-center'>
            <p>
              <button  data-filter="*">Tous Les Post Type</button><?php
                foreach($tab_array as $menu){
                  if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery'){
                  }else{
                    echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
                  }
                }?>
            </p>
          </div>
<?php

                  foreach($tab_array as $menu){
                    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery'){
                    }else{
                    //var_dump($ajax_query);
                    ?>
                      <div class="isotope">
                       <div class="<?=$menu;?>" style='border:solid 1px #ccc;'>
                        <?php
                          $var = str_replace(' ','_',$menu);
                          $args = array( 'post_type' => $var,
                                  'posts_per_page' => 9,
                                  );
                          //print_r($args);
                         
                          include get_template_directory().'/parts/loop-posts.php';
                          echo '</div>';?>
                        </div><a href="?page_id=47">En Voir plus &raquo;</a>
<?php
                                                        
                              }
                            }
                      //}?>
        
      </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
