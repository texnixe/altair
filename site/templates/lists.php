<?php snippet_detect('html_head', array(
	'criticalcss' => false,
	'prev_next' => false,
	'prerender' => false
)); ?>

	<?php snippet('banner'); ?>

	<div class="Container">

		<div role="main" class="Copy u-spaceTrailerM">

			<h1><?php echo smartypants(widont($page->title())); ?></h1>

			<?php echo kirbytext($page->intro()); ?>
			<?php echo kirbytext($page->text()); ?>

		</div>

		<h2 class="BetaHeading">Icons list</h2>
		<ul class="IconList u-spaceTrailerM">
			<li>
				<span aria-hidden="true" class="Icon Icon--phone"></span>
				phone
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--mobile"></span>
				smartphone
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--mouse"></span>
				mouse
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--address"></span>
				roadsign
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--paper-plane"></span>
				mail (paper plane)
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--pencil"></span>
				write
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--attach"></span>
				attachment
			</li>
			<li>
				<span aria-hidden="true" class="Icon Icon--facebook"></span>
				facebook
			</li>
		</ul>

		<h2 class="BetaHeading">Icons alone</h2>
		<a href="#" class="IconAlone u-spaceTrailerM">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--facebook"></span>
			<span class="u-isHiddenVisually">Facebook</span>
		</a>
		<a href="#" class="IconAlone">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--paper-plane"></span>
			<span class="u-isHiddenVisually">Email</span>
		</a>
		<a href="#" class="IconAlone">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--phone"></span>
			<span class="u-isHiddenVisually">Smartphone</span>
		</a>
		<a href="#" class="IconAlone">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--pencil"></span>
			<span class="u-isHiddenVisually">Write</span>
		</a>
		<a href="#" class="IconAlone">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--mobile"></span>
			<span class="u-isHiddenVisually">Smartphone</span>
		</a>
		<a href="#" class="IconAlone">
			<span aria-hidden="true" class="Icon Icon--fixedWidth Icon--attach"></span>
			<span class="u-isHiddenVisually">Attachment</span>
		</a>

		<h2 class="BetaHeading">Block link list</h2>
		<div class="BlockLink u-spaceTrailerM">
			<h3><a href="<?php echo url('base.php'); ?>">Base</a></h3>
			<p>A long list of all base elements and their styling</p>
			<a href="<?php echo url('base.php'); ?>" class="BlockLink-nestedLink">Visit the Base page</a>
		</div>
		<div class="BlockLink u-spaceTrailerM">
			<h3><a href="<?php echo url('grid.php'); ?>">Grid</a></h3>
			<p>Examples of the Altair grid system</p>
			<a href="<?php echo url('grid.php'); ?>" class="BlockLink-nestedLink">Visit the Grid page</a>
		</div>
		<div class="BlockLink u-spaceTrailerM">
			<h3><a href="<?php echo url('javascript.php'); ?>">Javascript</a></h3>
			<p>Some nifty javascript magic</p>
			<a href="<?php echo url('javascript.php'); ?>" class="BlockLink-nestedLink">Visit the Javascript page</a>
		</div>

		<?php snippet('share_page'); ?>

	</div>

<?php snippet_detect('footer'); ?>
