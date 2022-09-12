<?php get_header(); ?>

  <div class="qu-hero wf-section">
    <div class="hero-inner qu-page">
      <div class="qu-page-wrap">
        <div class="qu-page-container">
          <h1 class="qu-page-h1"><?php the_title(); ?></h1>
          <div class="qu-page-rt w-richtext">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
