<?php
/**
 * Template Name: Video Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php if( have_rows('video') ): ?>
  <div class="video-section row">
    <?php while( have_rows('video') ): the_row(); 
      $embed = get_sub_field('embed');
	  ?>
    <div class="video-box col-sm-12 col-md-6 col-lg-6">
      <div class="embed-responsive embed-responsive-16by9">
        <?php echo $embed; ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>