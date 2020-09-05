<?php


$args = array(
	
	'post_type'      => 'testimonios',
	'orderby'        => 'rand',
	'posts_per_page' => 10,
);

$query = new WP_Query( $args );

?>

<div class="slider-wrapper">
	<div class="slider-container">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="slide">

				<div class="item-info">
					<div class="item-image">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
					<div class="item-title"><?php the_title(); ?></div>
				</div>
				<div class="item-content">
					<?php the_content(); ?>
				</div>

			</div>
		<?php endwhile; ?>
	</div>
	<div class="slider-navigation">
		<div class="navs">
			<div class="prev">
				&#8249;
			</div>
			<div class="next">
				&#8250;
			</div>
		</div>
	</div>
</div>