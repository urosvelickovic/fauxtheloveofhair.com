<?php
/**
 * Template Name: Cap Construction Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php if( have_rows('cap') ): ?>
  <div class="mvp row">
    <?php while( have_rows('cap') ): the_row(); 
      $image = get_sub_field('image');
      $title = get_sub_field('title');
      $text = get_sub_field('text');
		?>
    <div class="mvp-box cap col-sm-12 col-md-6 col-lg-4">
      <div class="mvp-header">
        <h3><?php echo $title; ?></h3>
        <div><img class="border-blue" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
      </div>
      <div class="mvp-body">
        <p><?php echo $text; ?></p>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>