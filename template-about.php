<?php
/**
 * Template Name: About Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php if( have_rows('mvp') ): ?>
  <div class="mvp row">
    <?php while( have_rows('mvp') ): the_row(); 
      $image = get_sub_field('icon');
      $title = get_sub_field('title');
      $text = get_sub_field('text');
		?>
    <div class="mvp-box col-sm-12 col-md-12 col-lg-4">
      <div class="mvp-header">
        <div><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
        <h3><?php echo $title; ?></h3>
      </div>
      <div class="mvp-body">
        <p><?php echo $text; ?></p>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
  <div class="subscribe">
    <?php echo the_field('subscribe'); ?>
  </div>
<?php endwhile; ?>
