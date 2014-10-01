<?php snippet_detect('html_head', array(
	'criticalcss' => false,
	'prev_next' => false,
	'prerender' => false
)); ?>

	<?php snippet('banner'); ?>

	<div class="Container">

		<div role="main" class="Copy">

			<h1><?php echo smartypants($page->title()); ?></h1>

			<?php echo kirbytext($page->intro()); ?>
			<?php echo kirbytext($page->text()); ?>

			<section>

				<!-- <h2>&lsquo;BlockGrid&rsquo; grid</h2> -->
				<h2>BlockGrid &lsquo;grid&rsquo;</h2>

				<div class="BlockGrid BlockGrid--withGutter BlockGrid--compact2col BlockGrid--medium3to1 BlockGrid--large4col">

					<div class="BlockGrid-cell BlockGrid-cell--1">

						<p class="u-spaceTrailerM"><strong>BlockGrid column I</strong>: etiam commodo fermentum imperdiet. Aliquam non velit ac nisi sollicitudin suscipit id et eros. Cras sed erat eros, imperdiet cursus odio. Nunc et commodo.</p>

					</div>

					<div class="BlockGrid-cell BlockGrid-cell--2">

						<p class="u-spaceTrailerM"><strong>BlockGrid column II</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

					<div class="BlockGrid-cell BlockGrid-cell--3">

						<p class="u-spaceTrailerM"><strong>BlockGrid column III</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

					<div class="BlockGrid-cell BlockGrid-cell--4">

						<p class="u-spaceTrailerM"><strong>BlockGrid column IV</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

				</div>

			</section>

			<section>

				<!-- <h2>&lsquo;Grid&rsquo; grid</h2> -->
				<h2>Grid &lsquo;grid&rsquo;</h2>

				<div class="Grid Grid--withGutter">

					<div class="Grid-cell u-size1of1--small u-size1of2--compact u-size1of4--medium u-size2of6--wide">

						<p class="u-spaceTrailerM"><strong>Grid column I</strong>: etiam commodo fermentum imperdiet. Aliquam non velit ac nisi sollicitudin suscipit id et eros. Cras sed erat eros, imperdiet cursus odio. Nunc et commodo.</p>

					</div>

					<div class="Grid-cell u-size1of1--small u-size1of2--compact u-size1of4--medium u-size2of6--wide">

						<p class="u-spaceTrailerM"><strong>Grid column II</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

					<div class="Grid-cell u-size1of1--small u-size1of2--compact u-size1of4--medium u-size1of6--wide">

						<p class="u-spaceTrailerM"><strong>Grid column III</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

					<div class="Grid-cell u-size1of1--small u-size1of2--compact u-size1of4--medium u-size1of6--wide">

						<p class="u-spaceTrailerM"><strong>Grid column IV</strong>: nulla vestibulum magna quis eros accumsan in ultrices massa imperdiet. Curabitur at enim risus. Ut lacus nulla, tincidunt sit amet euismod eu, vehicula ut nisl. Duis a sapien.</p>

					</div>

				</div>

			</section>

		</div>

		<?php snippet('share_page'); ?>

	</div>

<?php snippet_detect('footer'); ?>
