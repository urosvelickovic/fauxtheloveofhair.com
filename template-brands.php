<?php
/**
 * Template Name: Brands Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php if( have_rows('brand') ): ?>
  <div class="mvp row">
    <?php while( have_rows('brand') ): the_row(); 
      $image = get_sub_field('logo');
      $text = get_sub_field('link');
		?>
    <div class="mvp-box cap col-sm-12 col-md-6 col-lg-4">
      <div class="mvp-header">
        <div><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
      </div>
      <div class="mvp-body">
        <?php if( have_rows('colors') ): ?>
        <div class="row">
            <?php while( have_rows('colors') ): the_row();
                $value = get_sub_field('color');
            ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <span>Color: <?php echo $value; ?>;</span>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>        
        <a href="<?php echo $text; ?>" class="btn btn-secondary">See More</a>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>