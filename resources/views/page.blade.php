@extends('layouts.app')

  @section('content')

  @php $sections = get_field('components') @endphp

  @if($sections)
    @foreach ($sections as $section)
      @php ($sectionName = $section['acf_fc_layout']) @endphp
        @include('sections.' . $sectionName, ['data'=>$section])
    @endforeach
  @endif

@endsection
<?php the_post(); ?>

<?php
	$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
	if ($pagekids) wp_redirect(get_permalink($pagekids[0]->ID));
?>

<?php get_header(); ?>

<main>
	<?php do_action('_hero', ' ', ' '); ?>
	
	<section class="text-section">
		<div class="container-fluid col-p-normal">
			<h3><?php the_title(); ?></h3>
			<div><?php the_content(); ?></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
