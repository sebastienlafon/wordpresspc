<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'idnature' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'idnature' ); ?>"><?php _e( 'Skip to content', 'idnature' ); ?></a>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'container_class' => 'sf-menu','items_wrap' => '<ul class="sf-menu"><li>%3$s</li></ul>' )); ?>
		</nav><!-- #site-navigation -->