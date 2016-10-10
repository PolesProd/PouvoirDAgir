<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation Starter Template</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="assets/foundation-icons/foundation-icons.css" />
  </head>
  <body>
    <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper >

      <!-- Menu en responsive -->
      <div class="off-canvas position-left" id="offCanvas" data-off-canvas data-options data-force-top="true">

        <!-- Close button -->
        <button class="close-button" aria-label="Close menu" type="button" data-close>
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Menu masqué -->
        <ul class="vertical menu">
          <li><a href="#">Accueil</a></li>
          <li><a href="#">Evenements</a></li>
          <li><a href="#">ressources</a></li>
          <li><a href="#">Le collectif</a></li>
          <li><a href="#">Adhérer</a></li>
        </ul>
      </div>
      <!-- Page content -->

      <!-- menu off canvas small-screen -->
      <div class="title-bar  clearfix hide-for-medium">
        <div class="title-bar-lef float-left clearfix">
          <!-- Bouton d'action pour le menu off canvas -->
          <button type="button" class="menu-icon " data-toggle="offCanvas"></button>
        </div>
        <img class="float-center small-2" src="assets/img/logoPVA.png">

        <div class="title-bar-right">
          <ul class="menu">
            <li><a href="#">recherche</a></li>
            <li><a href="#">connexion</a></li>
            <li><a href="#">espace Coop</a></li>
          </ul>
        </div>
      </div>
      <!-- menu off canvas medium-screen -->
