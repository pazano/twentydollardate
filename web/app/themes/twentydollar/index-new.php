<?php get_header(); ?>
	
	<div class="container">

	<?php 
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$featured_items = new WP_Query(
			array(
				'meta_query' => array(
					array(
						'key' => 'is_featured',
						'value' => '1',
						'compare' => '=='
					)
				),
				'showposts' => 1,
			)
		);	
		?>
		<?php if ($featured_items->have_posts()) : while ($featured_items->have_posts()) : $featured_items->the_post(); ?>
			<?php get_template_part('home', 'feature'); ?>
		<?php endwhile; ?>
		<?php endif; ?>

		<div id="content">
		
			<div id="main" >
	
				
				<?php 

					$list_query = new WP_Query( 
						array(  
							'meta_query' => array(
								array(
									'key' => 'is_featured',
									'value' => '0',
									'compare' => '=='
								)
							), 
							'showposts' => 8,
							'paged' => $paged,
						) 
					); ?>
				
				<?php if ($list_query->have_posts()) : while ($list_query->have_posts()) : $list_query->the_post(); ?>
	

						<?php get_template_part('content', 'grid'); ?>
						
					
					<?php endwhile; ?>

					<?php solopine_pagination(); ?>
		
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

<?php get_footer(); ?>