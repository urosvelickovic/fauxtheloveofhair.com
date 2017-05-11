<?php
/**
 * Template Name: Shell Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  	<?php  $key = get_the_ID();
      $args = array(
        'child_of' => $key
      );
      $pages = get_pages($args);
      foreach ( $pages as $page ) {
        $link = get_page_link( $page->ID );
        $excript = $page->post_excerpt;
        $title = $page->post_title;
    ?>
    <div class="shell-child">
      <h2 class="underscore"><?php echo $title; ?></h2>
      <div class="shell-exc">
      	<?php echo $excript; ?>
      </div>
      <div class="shell-link">
        <a href="<?php echo $link; ?>" class="btn btn-secondary">See More</a>
      </div>
    </div>
    <?php
      }
    ?>
    
<?php endwhile; ?>
