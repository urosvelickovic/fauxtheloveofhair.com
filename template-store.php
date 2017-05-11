<?php
/**
 * Template Name: Store Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <div class="sort-box">
    <h3>Sort by: </h3>
    <select id="sort1">
        <option selected>Sort by price</option>
        <option value="1">From lowest to highest</option>
        <option value="2">From highest to lowest</option>
    </select>
    <select id="sort2">
        <option selected>Sort by name</option>
        <option value="3">From A to Z</option>
        <option value="4">From Z to A</option>
    </select>
 </div>
 <?php 
    $mode = 1;
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    switch ($mode) {
        case 1:
            $orderby = 'meta_value';
            $order = 'ASC';
            break;
        case 2:
            $orderby = 'meta_value';
            $order = 'DESC';
            break;
        case 3:
            $orderby = 'title';
            $order = 'ASC';
            break;
        case 4:
            $orderby = 'title';
            $order = 'DESC';
            break;
    }

 ?>
 <script>
    document.getElementById('sort1').onchange = function() {
        window.location = "?mode=" + this.value;
    };
    document.getElementById('sort2').onchange = function() {
        window.location = "?mode=" + this.value;
    };
 </script>
  <div class="row">
    <?php
        $medalist_args = array(
            'post_type'         => 'store', 
            'posts_per_page'    => 4,
            'meta_key'			=> 'from',
	        'orderby'			=> $orderby,
	        'order'				=> $order
        );
        $medalist_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $medalist_query = new WP_Query( $medalist_args );
        $temp_query = $wp_query;
        $wp_query   = NULL;
        $wp_query   = $medalist_query;
        while ( $medalist_query->have_posts() ) : $medalist_query->the_post(); ?>
            <div class="shopbox col-sm-12 col-md-6 col-lg-6 ">
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
            get_template_part('templates/page-navi');
            $wp_query = NULL;
            $wp_query = $temp_query;
        ?>
        
    </div>
   <?php the_posts_navigation(); ?>

<?php endwhile; ?>