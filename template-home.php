<?php
/**
 * Template Name: Home Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php 
    $about = get_page_by_path( 'about-us' );
    $lace = get_page_by_path( 'lace-wigs-101/lace-wigs-information/all-about-lace-wigs' );
    $shop = get_page_by_path( 'on-line-shops' );
    $video = get_page_by_path( 'youtube-reviews' );
  ?>
  <div class="about-us-section">
    <h2 class="home-title" >About Us</h2>
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4">
        <?php $banner_image_obj = get_field('about_section_picture');  ?>
        <img class="img-responsive" src="<?php echo $banner_image_obj['url']; ?>" title="" alt="" />
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="excr">
          <?php echo $about->post_excerpt; ?>
        </div>
        <br>
        <a href="<?php echo get_permalink($about); ?>" class="btn btn-secondary">See More</a>
        <div class="home-subscribe subscribe">
          <?php $subscribe = get_field('subscribe', $about->ID); ?>
          <?php echo $subscribe; ?>
        </div>
      </div>
    </row>
    <div class="home-mvp">
      <?php if( have_rows('mvp', $about->ID) ): ?>
        <div class="mvp row">
          <?php while( have_rows('mvp', $about->ID) ): the_row(); 
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
    </div>
  </div>
  <div class="lace-section">
    <h2 class="home-title">Lace Wigs 101</h2>
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <?php $banner_image_obj = get_field('lace_section_picture');  ?>
		    <img class="img-responsive" src="<?php echo $banner_image_obj['url']; ?>" title="" alt="" />
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="excr">
          <?php echo $lace->post_excerpt; ?><br>
        </div>
        <a href="<?php echo get_permalink($lace); ?>" class="btn btn-secondary">See More</a>
      </div>
    </div>
  </div>
  <div class="store-section">
    <h2 class="home-title">On-Line Shops</h2>
    <div class="row">
      <?php
          $medalist_args = array(
              'post_type'         => 'store', 
              'posts_per_page'    => 3,
          );
          $medalist_query = new WP_Query( $medalist_args );
          while ( $medalist_query->have_posts() ) : $medalist_query->the_post();
      ?>
      <div class="shopbox col-sm-12 col-md-4 col-lg-4 ">
            <div class="border-blue">
                <div class="shop-header">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        } 
                    ?>
                    <h4 class="shop-title"><?php echo the_title(); ?></h4>
                </div>
                <div class="shop-body">
                    <div class="shop-text">
                        <?php  the_excerpt(); ?>
                    </div>
                    <span class="shop-from">From: <strong>$ <?php echo the_field('from'); ?></strong></span>
                    <a href="<?php echo get_permalink(); ?>" class="btn btn-secondary shop-button">Read More</a>
                </div>
            </div>
        </div>
      <?php endwhile; 
        wp_reset_postdata();
      ?>
    </div>
    <a href="<?php echo get_permalink($shop); ?>" class="btn btn-secondary">See More</a>
  </div>
  <div class=youtube-section>
    <h2 class="home-title">Video Reviews</h2>
    <?php if( have_rows('video', $video->ID) ): 
      $i = 0;
    ?>
      <div class="video-section row">     
        <?php while( have_rows('video', $video->ID) ): the_row(); 
          $embed = get_sub_field('embed');
        ?>
        <?php $i++; ?>
        <?php if( $i > 4 ): ?>
          <?php break; ?>
        <?php endif; ?>
        <div class="video-box col-sm-12 col-md-6 col-lg-6">
          <div class="embed-responsive embed-responsive-16by9">
            <?php echo $embed; ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <a href="<?php echo get_permalink($video); ?>" class="btn btn-secondary">See More</a>
  </div>
<?php endwhile; ?>
