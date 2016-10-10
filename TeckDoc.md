# CAHIER DES CHARGES TECHNIQUES DU PROJET POUVOIR D'AGIR  

> Le cahier des charges technique à pour but de formaliser les fonctionnalités à developper pour le projet Pouvoir d'Agir.

Nous aborderons les differentes etapes de productions afin de mettre en place un backoffice fonctionnel pour la réalisation du site du collectif.

## I.l'arborescence

    * HOME PAGE (1)
    * EVENEMENTS (1)
      [Dans cette page]
      * Calendrier (sert de navigation dans les evenements)
      * Evenements (Par dates)
        [Page / Page]
        * Page de l'Evenements
        * Page Categories Evenements
        * Page Lieux Evenements
    * RESSOURCES (1)
      [Dans cette page]
      * Methodologies
      * Analyses
      * Temoignages
      * Ajout de Ressource (via admin)
      [Page à part]
      * Galerie Photos / Vidéos (2)
      * Glossaire (2)
        [Page / Page]
        * Methodologie (2)
        * Analyse (2)
        * Temoignages (2)
        * categories
        * Auteur
        * Tags
    * LE COLLECTIF (1)
      [Dans cette page]
      * Qui sommes nous?
      * Les reseaux impliqués
      * Actions (2)
        [Page à part]
        * Categories
        * Auteurs
        * Tags
    * CONTACT (1)
      * Inscription à la Newsletter
      * Formulaire de contacts
      * Formulaire d'adhésion
      [L'ajout devenements se fait via l'admin]
        * lien Ajout d'Evenements
        * lien Ajout Ressources
    * RECHERCHES (via bar de recherche --> amene sur page)
    * PLAN DU SITE
    * MENTIONS LEGALES

## II. L'administration de wordpress

Dans l'administration il est important de pouvoir intégrer les contenus de manière fluide et simple pour l'utilisateur.

### 1.Événements

Un marqueur apparait sur le calendrier là ou des événements ont été ajouté.
Le lieu et la date affiché en front.
On aura donc besoin :

  * Titre de l'Evenement
  * Un champ date
  * Un champ lieu
  * Contenus
  * Thumbnail (image)

### 2.Ressources

Les ressources se divisent en 3 sous catégories qui doivent être selectionné au moment de la publication.
C'est une meta importante qui se repercute directement sur l'article, elle est donc indispensable.
L'article ne doit pas pouvoir être validé si l'information manque.

  * Analyses
    * (En attente des informations liées aux champs specifiques)
  * Methodologies
    * (En attente des informations liées aux champs specifiques)
  * Temoignages
    * (En attente des informations liées aux champs specifiques)

### 3.Glossaire

Le glossaire se fait via un formulaire dans la categorie article.
Les mots seront presenté par la suite par ordre alphabetique.
Dans l'administration il nous faut donc un onglet reservé a cet usage. On doit pouvoir ajouter/modifier/supprimer un mot.
Il nous faut donc :

  * Un titre
  * Un contenus
  * l'auteur

### 4.Actions

Les articles de base seront dans la page actions.
Ils sont donc déja existants et ne necessitent pas de traitement particulier.

### 5.Les pages

Pour le reste des pages nous utiliserons le content() de wordpress sans passer pâr l'editeur de texte html.
En ce qui concerne le contenus descriptif il est important d'utiliser le contenus de la sorte.

## III.L'integration des pages avec leur fonctionnalités respactives

### a.Header

Le header contient les accés aux differents espaces. Il se compose de deux etages.
En Haut : Espace Collaboratif / Connexion utilisateur
Au milieu : Logo + texte / contact + Social media + Newsletter / Recherche

##### RECHERCHES
Il sera intégré un plug-in d'autocompletion fait maison qui va chercher le contenus des articles et l'integre directement dans une variable JS qui permet l'autocompletion sur une base Jquery.
Voila le code a adapter pour le site PVA

En Bas : Nav =>  Acceuil / Evenements / Ressources / Le collectif

La page recherche se base sur la page Archives.php
Elle permet d'avoir accé a un contenus personnalisé.

#### Espace collaboratif :  
Forum (loomio) ==> Liens href sortant target: blank

#### Connexion utilisateur :

On mettra la boucle à l'interieur de la boucle du menu ou alors dans une structure similaire pour la traiter de la meme façon (ul>li...)

    <?php if( is_user_logged_in() ){
      $current_user = wp_get_current_user();?>
       <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-178"><a href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li><li id="menu-item-177" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-177"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
      } else {
         ?><li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-178"><a href="/wp-admin/profile.php"><a href="/wp-login.php">connexion</a></li><?php
      }
    ?>

#### Le menu nav :

    <?php wp_nav_menu( array('menu' => 'menuName' ) ); ?>

### b.Footer  

Le footer contient les principaux element liées au suivis de la structure
Dans l'ordre : Social network / Adresse / Tel / Mail
On fera l'ensemble en liens href mis en page celon le design fournis avec le frameword fondation 6

###  c.Page d'Accueil

La page d'accueil est le hub qui donne accés au reste du site internet.
Elle contient plusieurs elements assemblé ensemble. (cf zoning)

##### Slideshow :
Le slide show doit contenir une boucle qui génere un nombre definis de tuilles a partir des articles dans evenement / article / ressource.
Il prend tous les elements de type post. A factoriser celon le nombre de post que l'on voudra mettre en avant.

le model AVEC BOOTSTRAP à adapter sur Fondation 6 :

    <div id="pushActus" class="carousel slide vertical row col-lg-12" data-ride="carousel" data-interval="9000">
      <div class="carousel-inner" role="listbox">
      <?php if ( have_posts() ) : while ( have_posts() ) the_post();
        $args = array( 'post_type' =>'post','post__in'  => get_option( 'sticky_posts' ),'ignore_sticky_posts' => 'false', 'numberposts' => 3, 'order'=> 'DESC', 'orderby' => 'date' );
        $postslist = get_posts( $args );
        $i = 0;
        foreach ($postslist as $post) : setup_postdata($post);
        ?>
        <div id="post-<?php the_ID(); ?>" class="item <?php if($i==0){echo 'active';};?>">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
          <div class="">
            <img class="parrallaxImg" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
              </div>
                <div class="carousel-caption">
                  <h5 class="taxonomy"><?php the_category();?></h5>
                  <h3 class="titleCar"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                  <span class="exerpt"><p><span><?php echo excerpt(25); ?></span></p></span>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#prev" role="button" data-slide="prev" onclick="jQuery.noConflict()('#pushActus').carousel('prev')"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Prec.</span></a>
            <a class="right carousel-control" href="#next" role="button" data-slide="next"Onclick="jQuery.noConflict()('#pushActus').carousel('next')"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Suiv.</span></a>
      <?php endif ?>
      </div>

##### Ressources :

Un simple affichage d'icone avec titre / liens sur les pages specifiques

##### Calendrier :

Calendrier Jquery :
Utiliser la representation classic du calendrier Jquery en adaptant les couleurs au theme chhoisis

Le calendrier doit pouvoir servir de navigation dans la page evenements. Encliquant sur une date, on arrive a la date choisis et la liste d'evenements s'affiche. Si aucun evenement n'a étét enregistré a ce jour il doit etre possible de se caler sur un entre deux.
###### Exemple :
[Meetup](http://www.meetup.com/fr-FR/cities/fr/paris/events/?country=fr&zipstatecity=paris&state=&radius=25&events=true) le fonctionnement d'un tel system.

##### Cartographie des menmbres

Une carte open street map des structures de Pouvoir d'Agir existe déjà. Il faut simplement faire un embed a l'endroit indiqué.

[La carte]('http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384#6/48.422/4.900')

Voici le code pour l'embed dans la partie :

    <iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384">See full screen</a></p>

### d.Evenements / Ressources / articles

Que ce soit l'une ou l'autre, ces trois pages ont une structure similaire. Les posts sur la colonnes de gauche, classé par date du plus recent. A droite une colonne specifique par page construite sur le meme model, deux bloc l'un sur l'autre avec une nav pour le bloc d'en bas.
