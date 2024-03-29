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

			<aside class="Accordion Copy">
				<h1>Accordion</h1>
				<p>Basic expand and collapse&hellip;</p>
				<a class="Accordion-button js-expandbutton" href="#expandthis">Read more</a>
				<div class="Accordion-target js-expandtarget" id="expandthis">
					<p>This is a very rudimental expand and collapse functionality. The only purpose is to show you can expand and collapse a block of content by watching a button with a Javascript listener.</p>
					<p>The Javascript object <code>expand</code> can ofcourse be extended according to the project specifications. You can add an icon, change the 'read more' text on toggle or position the expand link elsewhere.</p>
					<p>In this example the expand class makes use of the cookie utility. Which can also be deactivated if you want.</p>
					<p><strong>TL;DR</strong> This is just a basic implementation. Please modify it to your needs!</p>
				</div>
			</aside>

		</div>

		<?php snippet('share_page'); ?>

	</div>

	<script>
		push_message.push({status: 'info', type: 'modal', text: 'This page displays a few basic javascript functionality examples available in Altair.'});
	</script>

<?php snippet_detect('footer'); ?>
