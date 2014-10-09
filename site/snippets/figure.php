<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
// Example embed code:
//
// echo snippet('figure', array(
// 		'image'  => $image,
// 		'class'  => $class,
// 		'alt'    => smartypants($page->title()),
// ));
// ----------------------------------------------------------

// Only for development env's, set a smaller thumb instead of full size
if(c::get('environment') == 'local' && c::get('resrc') == false) {
	$width = c::get('thumb.dev.width',800);
}

$thumburl = thumb($image,array(
	'width' => $width, // use maximum image width for thumb
	'height' => $height
), false);

////////////////////////////////////////////////////////// ?>

<figure class="FigureImage">

	<?php if(c::get('lazyload') == false && c::get('resrc') == false) : // Regular image tag, full size thumbnail ?>
		<img src="<?php echo $thumburl; ?>" width="<?php echo $image->width(); ?>" height="<?php echo $image->height(); ?>" class="FigureImage-item <?php echo $class; ?>" alt="<?php echo $alt; ?>" />
	<?php endif; ?>

	<?php if(c::get('lazyload') == true && c::get('resrc') == false) : // Lazyload (echo.js) image tag ?>
		<img data-src="<?php echo $thumburl; ?>" src="/assets/images/loader.gif" class="FigureImage-item <?php echo $class; ?>" alt="<?php echo $alt; ?>" />
	<?php endif; ?>

	<?php if(c::get('lazyload') == false && c::get('resrc') == true) : // Resrc image tag ?>
		<img data-src="<?php echo 'http://' . c::get('resrc.plan') . '/' . c::get('resrc.params') . '/' . $thumburl; ?>" width="<?php echo $image->width(); ?>" height="<?php echo $image->height(); ?>" class="FigureImage-item <?php echo $class . ' resrc'; ?>" alt="<?php echo $alt; ?>" />
	<?php endif; ?>

	<?php if(c::get('lazyload') == true && c::get('resrc') == true) : // Resrc image via lazyload (echo.js) image tag ?>
		<img data-src="<?php echo 'http://' . c::get('resrc.plan') . '/' . c::get('resrc.params') . '/' . $thumburl; ?>" src="/assets/images/loader.gif" class="FigureImage-item  <?php echo $class . ' js-resrcIsLazy'; ?>" alt="<?php echo $alt; ?>" />
	<?php endif; ?>

</figure>
