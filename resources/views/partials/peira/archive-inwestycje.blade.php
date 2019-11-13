<?php get_header(); ?>

<main>
	<?php do_action('_hero', 'Inwestycje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://peira.ila.li/wp-content/uploads/2018/06/I-LIKE-ART-Srebrzynska-Park_05_www_ilikeart_pl-1920x1080.jpg'); ?>
	<section class="investment-archive">
		<div class="container-fluid col-p-normal">
			<h3><?= __('Wybierz kategorię', 'peira'); ?></h3>
			<?php $terms = get_terms('status'); ?>	
			<div class="row justify-content-center choose-box-container">
				<?php foreach ($terms as $term) : ?>
					<div class="col-sm-6 col-xl-5">
						<a href="<?= get_term_link($term, 'status'); ?>" class="choose-box" style="background-image:url('<?= get_field('status_image', $term)['url']; ?>')">
							<h4><?= $term->name; ?></h4>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>