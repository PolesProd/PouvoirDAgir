<?php
<<<<<<< HEAD

    /* Template Name: Ressources */
?>
<?php get_header(); 
$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
?>
=======
    /* Template Name: Ressources */
?>
<?php get_header(); 
$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
?>
>>>>>>> modif said 15/11/16
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
<<<<<<< HEAD
=======
                if($var === 'hello_world'){
                  $var = 'hello';
                }
>>>>>>> modif said 15/11/16
                echo '<button  data-filter=".'.$var.'">'.$var.'</button>';
              }
            ?>
          </p>
        </div>
          <div class='button-group float-center'>
<<<<<<< HEAD

=======
>>>>>>> modif said 15/11/16
            <p class="barre-cate">
              <button  data-filter="*">Tous Les Post Type</button><?php
                foreach($tab_array as $menu){
                  if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery'){
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
             <?php
                  foreach($tab_array as $menu){
                    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form' || $menu === 'post' || $menu === 'events' || $menu === 'partenaires' || $menu === 'glossary' || $menu === 'foogallery'){
                    }else{
              ?>
              
                      <div class="  isotope">
                       <div class="<?=$menu;?>" >
                         <?php
                            $var = str_replace(' ','_',$menu);
                            $args = array( 'post_type' => $menu,
                                    'posts_per_page' => 9,
                                    );
                            include get_template_directory().'/parts/loop-posts.php';
                            echo '</div>'
                          ;?>
<<<<<<< HEAD
                          <a href="?page_id=47">Lire &raquo;</a>
                        </div>
                        <?php     

=======
                        </div>
                        <?php     
>>>>>>> modif said 15/11/16
                              }
                            }
                      //}?>
        
<<<<<<< HEAD

=======
>>>>>>> modif said 15/11/16
       </div> 
       </div> 
       </div>
        </div> 
    </div> 
  </div> 
</div> 
<<<<<<< HEAD
<?php get_footer(); ?>
=======
<?php get_footer(); ?>
>>>>>>> modif said 15/11/16
