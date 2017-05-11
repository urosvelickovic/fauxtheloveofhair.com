<?php while (have_posts()) : the_post(); ?>
<div class="page-header">
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display')){
        bcn_display();
    }?>

  </div>
  <h1 class="entry-title underscore"><?php the_title(); ?></h1>
</div>
    
    <?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail();
      } 
    ?>
    <div class="text-address row">
        <div class="entry-content col-sm-12 col-md-6 col-lg-6">
        <?php the_content(); ?>
        </div>
        <?php if( have_rows('contact') ): ?>
            <div class="entry-address col-sm-12 col-md-6 col-lg-6">
                <div class="row">
                <?php while( have_rows('contact') ): the_row(); 
                    $phone = get_sub_field('phone');
                    $email = get_sub_field('email');
                    $address_1 = get_sub_field('address_1');
                    $address_2 = get_sub_field('address_2');
                ?>
            
                <div class="address-box col-xs-12 col-sm-6 col-md-12 col-lg-6">
                    <?php echo $phone . "<br>" . $email . "<br>" . $address_1 . "<br>" . $address_2; ?>
                </div>
                <? endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="products row">
        <?php if( have_rows('product') ): ?>
            <?php while( have_rows('product') ): the_row(); 
                $image = get_sub_field('image');
                $price = get_sub_field('price');
            ?>
            <div class="product-box col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                <div class="price-field">From: <strong>$ <?php echo $price ?></strong></div>
            </div>
            <? endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="seemore">
        <a href="<?php echo the_field('link') ?>" class="btn btn-secondary">See More</a>
    </div>
<?php endwhile; ?>
