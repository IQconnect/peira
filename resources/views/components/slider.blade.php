<section class="slider slider--<?= $type; ?>">
	<div class="slider1">
		<?php foreach ($data as $inv) : ?>
			<div class="slider1__cell">
				<div class="container-fluid col-p-normal">
					<div class="row justify-content-between">
						<div class="col-xl-4 slider1__content">
							<h4><?= $inv->post_title; ?></h4>
							<p><?= $inv->post_content; ?></p>
							<a target="_blank" href="<?= get_field('link', $inv->ID); ?>" class="btn btn--one"><?= __('Zobacz stronę inwestycji', 'peira'); ?></a>
						</div>
						<div class="col-xl-6 slider1__photos">
							<div class="slider2">
								<?php foreach (get_field('gallery', $inv->ID) as $img) : ?>
									<div style="background-image:url('<?= $img['sizes']['large']; ?>')" class="slider2__cell"></div>
								<?php endforeach; ?>
							</div>
							<ul class="slider2__dots dots">
								<?php foreach (get_field('gallery', $inv->ID) as $i => $img) : ?>
									<li><button class="<?= $i === 0 ? 'active' : ''; ?>"><?= __('Wizualizacja', 'peira'); ?> <?= ($i + 1); ?></button></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="col-xl-1">
							<ul class="slider1__dots dots">
								<?php foreach ($data as $i => $inv) : ?>
									<li><button class="<?= $i === 0 ? 'active' : ''; ?>"><?= ($i + 1); ?></button></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>