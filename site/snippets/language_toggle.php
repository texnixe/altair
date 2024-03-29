<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<?php if($site->languages()->count() > 1 && $page->inventory()['content'][$site->language()->code()]): ?>
	<ul class="LanguageToggle">
		<?php foreach($site->languages() as $language): ?>
			<?php /* SHOW SLOW ACTIVE LANGUAGE if($site->languages()->count() > 1 && $page->inventory()['content'][$language->code()]): */ ?>
			<?php if($site->languages()->count() > 1 && $site->language() != $language && $page->inventory()['content'][$language->code()]): ?>
				<li class="LanguageToggle-Link<?php e($site->language() == $language, ' LanguageToggle-Link--active"') ?>">
					<a href="<?php echo $page->url($language->code())?>">
						<?php echo html($language->name()); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach ?>
	</ul>
<?php else: ?>
	<p>Do something here:</p>
	<ul>
		<li>* don't show the language toggle or</li>
		<li>* redirect to the error page: <code>go(url('error'));</code></li>
		<li>* redirect to a 'not available in this language' page: <code>go(url('language'));</code></li>
	</ul>
<?php endif; ?>
