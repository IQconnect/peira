<?php if (is_front_page()) : ?>

	<section class="hero" style="background-image:url('<?= $image; ?>')">
		<div class="container-fluid col-p-normal hero__container">
			<h2><?= $title; ?></h2>
			<p><?= $sub; ?></p>
			<a href="<?= get_home_url(); ?>/inwestycje" class="btn btn--one"><?= __('Zobacz nasze inwestycje', 'peira'); ?></a>
		</div>
	</section>

<?php else : ?>

	<section class="hero hero--small" style="background-image:url('<?= $image; ?>')">
		<div class="container-fluid col-p-normal hero__container">
			<h2><?= $title; ?></h2>
			<p><?= $sub; ?></p>
		</div>
	</section>

<?php endif; ?>

<?php // dodać obrazek ?>