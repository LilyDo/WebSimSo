<?php 
	$banners = new WP_Query([
        'post_type' => 'banners'
    ]);
?>

<div class="owl-carousel">
	<?php foreach ($banners->posts as $value) : ?>
		<img src="<?= get_the_post_thumbnail_url($value->ID, 'full') ?>">
	<?php endforeach; ?>
</div>