<?php get_header(); ?>

<?php 
	$investments = array();
	
	if (have_posts()) {
		while (have_posts()) {
			the_post(); 
			array_push($investments, get_post());
		} 
	} 
?>

<main>
	<?php do_action('_hero', get_field('status_title', get_queried_object()), term_description(get_queried_object()->term_id), get_field('status_image', get_queried_object())['url']); ?>
	<?php do_action('_slider', 'light', $investments); ?>
</main>

<?php get_footer(); ?>