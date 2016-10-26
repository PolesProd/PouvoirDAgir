<?php
/*
Template Name: Category_Centrale
*/
?>
<?php get_header();?>
<h1>Ressources</h1>
<ul>
<?php
$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
    $url = $_SERVER['REQUEST_URI'];
    $post_type = get_post_types();
    $string_arr = implode(',',$post_type);
    $tab_array = explode(',',$string_arr);


    foreach($tab_array as $menu){
      echo '<form action="" method="get">';
        echo '<input type="hidden" value="'.$menu.'" name="post_type">';
        echo '<input type="submit" value="'.$menu.'">';
      echo '</form>';
    }
    die();
    for($i = 0; $i<count($tab_array);$i++){
    $posts = array();
    //echo $tab_array[$i];
      //print_r($tab_array);
      ?>
      <?php
      $post_array = get_posts(array( 'posts_per_page' => -1, 'post_type' => $tab_array[$i]));
      if(count($post_array) !== 0){
        echo '<p>il y a '.count($post_array).' article dans '.$tab_array[$i].'</p>';
      }
      //print_r($post_array);
      for($x = 0;$x <count($post_array);$x++){
            echo '<article>';
            echo '<p><h2>'.$post_array[$x]->post_title.'</h2></p>';
            echo '<p>'.$post_array[$x]->post_content.'</p>';
            echo '</article><hr>';
      }

    }
?>
</ul>
<?php

 ?>
<?php get_footer();?>
