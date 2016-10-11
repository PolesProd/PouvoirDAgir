<?php include('header.php')?>
<section class="small-11 small-centered" id="intro">
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </p>
</section>
<section class="small-12" id="slideHome">
  <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
    <ul class="orbit-container">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
      <li class="is-active orbit-slide">
        <img class="orbit-image" src="http://loremflickr.com/400/200" alt="Space">
        <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
      </li>
      <li class="orbit-slide">
        <img class="orbit-image" src="http://loremflickr.com/400/200" alt="Space">
        <figcaption class="orbit-caption">Lets Rocket!</figcaption>
      </li>
      <li class="orbit-slide">
        <img class="orbit-image" src="http://loremflickr.com/400/200" alt="Space">
        <figcaption class="orbit-caption">Encapsulating</figcaption>
      </li>
      <li class="orbit-slide">
        <img class="orbit-image" src="http://loremflickr.com/400/200" alt="Space">
        <figcaption class="orbit-caption">Outta This World</figcaption>
      </li>
    </ul>
    <nav class="orbit-bullets">
      <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
      <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
      <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
      <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
    </nav>
  </div>
</section>
<section id="socialTouch">
  <div class="small-12 text-center">
    <h3 class="subheader">Social Media</h3>
    <div class="row">
      <a href="#" class="small-6 columns"><i class="fi-social-facebook icon-size-small"></i></a>
      <a href="#" class="small-6 columns end "><i class="fi-social-twitter icon-size-small"></i></a>
    </div>
  </div>
  <div class="small-12">
    <h3 class="subheader text-center">Newsletter</h3>
    <p>ici se trouve le module de news letter</p>
  </div>
</section>
<section id="ressources" class="small-12 text-center">
  <h3 class="subheader">Ressources</h3>
  <div class="row">
    <dl class="small-4 columns">
      <dt>Analyses</dt>
      <dd><i class="fi-heart icon-size-small"></i></dd>
    </dl>
    <dl class="small-4 columns">
      <dt>Methodologie</dt>
      <dd><i class="fi-guide-dog icon-size-small"></i></dd>
    </dl>
    <dl class="small-4 columns">
      <dt>Temoignages</dt>
      <dd><i class="fi-social-myspace icon-size-small"></i></dd>
    </dl>
    <dl class="small-6 columns ">
      <dt>Glossaire</dt>
      <dd><i class="fi-book icon-size-small"></i></dd>
    </dl>
    <dl class="small-6 columns end">
      <dt>Galeries</dt>
      <dd><i class="fi-photo icon-size-small"></i></dd>
    </dl>
  </div>
</section>
<section id="cartographie" class="expanded row text-center">
  <h3 class="subheader">cartographie des membres de pouvoir d'agir</h3>
  <iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384">See full screen</a></p>
</section>
<?php include('footer.php')?>
