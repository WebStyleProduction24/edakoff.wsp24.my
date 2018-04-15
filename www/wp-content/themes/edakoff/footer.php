        <footer>
        	<div class="content">
        		<div class="logo"><a href="<?php home_url();?>"><?php echo footer_name();?></a></div>
        		<?php wp_nav_menu(array(
        			'theme_location'  => 'footer-1',
        			'container' => 'div',
        			'container_class' => 'menu-1'
				) ); ?>
        		<?php wp_nav_menu(array(
        			'theme_location'  => 'footer-1',
        			'container' => 'div',
        			'container_class' => 'menu-2'
				) ); ?>
        		<div class="button">
        			<a href="#top">Наверх</a>
        		</div>
        		<div class="descriptor"></div>
        		<div class="phone"></div>
        	</div>
        </footer>

        <?php wp_footer(); ?>

    </body>
</html>