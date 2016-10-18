<?php
  /* Template Name: Calendrier */
?>
<?php get_header(); ?>
<link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=fontawesome">

<div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</div>

<div id="content">
  <div id="inner-content" class="row">
      <div id="main" class="large-12 medium-10 small-centered columns" role="main">
        <div class="columns">
          <div class="row">
            <div class="medium-6 large-4 columns">
              <label class="print pull-right">
              <span class="print-btn hidden-print">Print your list!</span>
              </label>
              <h2>Personal list</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <div class="person-list"></div>
            </div>
            <div class="medium-6 large-8 columns">
              <div class="calendar hidden-print">
                <header>
                  <h2 class="month"></h2>
                  <a class="btn-prev fontawesome-angle-left" href="#"></a>
                  <a class="btn-next fontawesome-angle-right" href="#"></a>
                </header>
                <table>
                  <thead class="event-days">
                    <tr></tr>
                  </thead>
                  <tbody class="event-calendar">
                    <tr class="1"></tr>
                    <tr class="2"></tr>
                    <tr class="3"></tr>
                    <tr class="4"></tr>
                    <tr class="5"></tr>
                  </tbody>
                </table>
                <div class="list">
                  <div class="day-event" date-day="2" date-month="2" date-year="2016"  data-number="1">
                    <a href="#" class="close fontawesome-remove"></a>
                    <h2 class="title">Lorem ipsum 1</h2>
                    <p>Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin. Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd boksättare tog att antal bokstäver och blandade dem för att göra ett provexemplar av en bok.</p>
                    <label class="check-btn">
                    <input type="checkbox" class="save" id="save" name="" value=""/>
                    <span>Save to personal list!</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
