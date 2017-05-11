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
  <div class="hero">
    <div class="container">
      <div class="hero-content">
        <h1 class="hero-headline"><span class="text-medium">Faux</span>the<span class="text-medium">love</span>of<span class="text-medium">hair</span></h1>
        <h2 class="hero-headline">'Let your hair floh!'</h2>
        <p class="hero-paragraph">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
          when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
        </p>
        <a href="#" class="btn btn-secondary">See More</a>
      </div>
    </div>
  </div>
</header>
