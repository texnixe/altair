<?php snippet_detect('html_head', array(
	'criticalcss' => false,
	'prev_next' => false,
	'prerender' => false
)); ?>

	<?php snippet('banner'); ?>

	<div class="Container">

		<div role="main" class="Copy">

			<h1><?php echo smartypants(widont($page->title())); ?></h1>

			<?php echo kirbytext($page->intro()); ?>
			<?php echo kirbytext($page->text()); ?>
			<?php echo kirbytext($page->multi_figure()); ?>
			<?php echo kirbytext($page->imgrid()); ?>

			<?php snippet('share_page'); ?>

		</div>

	</div>

<?php snippet_detect('footer'); ?>
