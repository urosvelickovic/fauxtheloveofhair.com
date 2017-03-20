<header class="banner">
  <div class="container">
    <div class="brand">
      <?php
      if ( function_exists( 'the_custom_logo' ) ) {
		    the_custom_logo();
	    }
      ?>
    </div>
    <div class="header-social">
      <?php get_template_part('templates/links', 'social'); ?>  
    </div>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
         wp_nav_menu( array( 'theme_location' => 'primary_navigation' ) );
      endif;
      ?>
    </nav>
  </div>
</header>
