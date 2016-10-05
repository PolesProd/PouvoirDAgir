# cahier des charges techniques du projet Pouvoir d'Agir #

> Le cahier des charges technique à pour but de formaliser les fonctionnalités à developper pour le projet Pouvoir d'Agir.

Nous aborderons les differentes etapes de productions afin de mettre en place un backoffice fonctionnel pour la réalisation du site du collectif.

## I.l'arborescence ##

    * Home page
    * Evenements
      [Dans la même page]
      * Calendrier
      * Initiative à venir
      * Initiative en cours
      * initiatives passées
    * Ressources
      [Dans la même page]
      * Partage d'analyse
      * Partage d'ecperience
      * Methodologie
      * Galerie Photos / Vidéos
    * Le collectif
      [Dans la même page]
      * Qui sommes nous?
      * Les reseaux impliqués
      * Les actiones du collectif
    * Contact
      * Inscription a la Newsletter
      * Formulaire de contacts
        [Possibilité de switcher entre les differents formulaire]
        * Ajout d'Evenements
        * Ajout Ressources
        * Formulaire d'adhésion

## II.Les differents elements ##

### a.LE HEADER ###

le header contient les accés aux differents espaces. Il se compose de deux etages.
En Haut : Espace Collaboratif / Connexion utilisateur
En Bas : Logo / Acceuil / Evenements Ressources Le collectif / contact

#### Espace collaboratif ####
Forum (loomio) + Cloud (a voir...) ==> Liens href

#### Connexion utilisateur : ####

On mettra la boucle à l'interieur de la boucle du menu ou alors dans une structure similaire pour la traiter de la meme façon (ul>li...)

    <?php if( is_user_logged_in() ){
      $current_user = wp_get_current_user();?>
       <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-178"><a href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li><li id="menu-item-177" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-177"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
      } else {
         ?><li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-178"><a href="/wp-admin/profile.php"><a href="/wp-login.php">connexion</a></li><?php
      }
    ?>

Le menu :
    <?php wp_nav_menu( array('menu' => 'menuName' ) ); ?>

  2. LE FOOTER

Le footer contient les principaux element liées au suivis de la structure
Dans l'ordre : Social network / Adresse / Tel / Mail
On fera l'ensemble en liens href

  3. Page d'Acceuil

La page d'accueil est le hub qui donne accés au reste du site internet.
