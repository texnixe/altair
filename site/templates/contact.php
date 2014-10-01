<?php snippet_detect('html_head', array(
	'criticalcss' => false,
	'prev_next' => false,
	'prerender' => false
)); ?>

	<?php snippet('banner'); ?>

	<div role="main" class="Container">

		<div class="Copy">

			<h1><?php echo smartypants(widont($page->title())); ?></h1>

			<?php echo kirbytext($page->text()); ?>

			<!-- Inline Alert example -->
			<div class="Alert Alert--inline js-dismissable">
				<div class="Alert-message">
					<p>Because the contactform in Kirby2 is broken, we're displaying an empty page.</p>
				</div>
					<button type="button" class="Alert-close" data-dismiss="Alert" aria-hidden="true" role="presentation">&times;</button>
			</div>

		</div>

		<?php //snippet('contactform'); ?>

	</div>

<?php snippet_detect('footer'); ?>
