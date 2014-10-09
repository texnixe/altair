<?php
/**
 * Figure
 * ----
 * Custom (multi)figure tag in kirbytext
 *
 * What it does:
 * Generates an image in a figure, with a lot of possible options. Multiple images
 * within a figure is one of the possibilities. Use a 'relative' width (i.e. 1of3)
 * for responsive widths.
 *
 * Usage:
 * 1) (figure: myimage.jpg width: 1of3)
 * 2) (figure: myimage.jpg width: 1of3 caption: Nice figure caption!)
 * 3) (figure: myimage.jpg griditem: true caption: Single image in a multifigure grid)
 * 4) (figure: myimage.jpg width: 2of3 height: 200 crop: true caption: Nice figure caption!)
 * 5) (figure: myimage.jpg width: width: 2of3 align: center)
 * 6) (figure: myimage1.jpg | myimage2.jpg | myimage3.jpg width: 1of3 | 1of3 | 1of3 breakfrom: compact)
 */

kirbytext::$tags['figure'] = array(
	'attr' => array(
		// Basics
		'caption',
		// Widths
		'width',
		// Cropping and quality
		'crop',
		'upscale',
		'quality',
		// CSS class setting
		'break',
		'align',
		'griditem',
		// Single figure specific
		'height',
		'alt',
		),
	'html' => function($tag) {

		$images = $tag->attr('figure');

		// check if the figure has multiple images to output, check for pipe character: |
		if(strpos($images,'|')===false) {
			$is_multifigure = false;
			$images = array($images); // set the one images as the first in an images array
		}
		else {
			$is_multifigure = true;
			$images = str::split(str_replace(' ', '', $images), '|'); // set all images to the array
		}

		// check if there images passed to the array
		if(empty($images)) return false;

		// build array of image objects
		foreach($images as $img) {
			$imgObj = $tag->file($img);
			if($imgObj) $imageresult[] = $imgObj;
		}

		// check of array of images has real items (after building objects)
		if(empty($imageresult)) return false;

		// set variables for both single and multi figures
		$upscale    = $tag->attr('upscale');
		$quality    = $tag->attr('quality', c::get('thumb.quality', 100));
		$caption    = $tag->attr('caption');
		$break      = $tag->attr('break', c::get('thumb.multifigure.break', 'small'));
		$offset     = $tag->attr('offset');
		$align      = $tag->attr('align');
		$griditem   = $tag->attr('griditem');
		$alt        = $tag->attr('alt');
		$crop       = $tag->attr('crop');
		$height     = $tag->attr('height');

		if($is_multifigure) {
			$widths    = str::split(str_replace(' ', '', $tag->attr('width')), '|');
		}
		else {
			$widths    = str::split($tag->attr('width'));
			if (empty($widths)) $widths = null;
		}

		if(count($imageresult) > 1 || isset($griditem)) {
			$gridclass = ' Grid Grid--withGutterPercentage';
			$itemgridclass = 'Grid-cell ';
		}
		else {
			$gridclass = '';
			$itemgridclass = '';
		}
		$itemclassprefix = $itemgridclass . 'FigureImage'; // If more than one image, Grid-cell is prepended

		if(isset($align)) {
			$alignclass = ' FigureImage--align'.ucfirst($align); // add capitalized align class (IE: Grid--alignCenter)
		}
		else {
			$alignclass = '';
		}

		$figure = new Brick('figure');
		$figure->addClass('FigureImage'.$gridclass.$alignclass);

		$i = 0;
		foreach($imageresult as $image) {
			// set widths of all images
			$width = $widths[$i];
			// If there is one or more width set, use width variable(s)
			if(count($widths) > 0) {
				// the first part (the 1 of 3)
				$classgridpart = str::substr($width, 0, 1);
				// the total (the 3)
				$classgridtot = str::substr($width, 3, 1);
				$class = $itemclassprefix.'-item u-size' . $width . '--' . $break;
			}
			else {
				$class = $itemclassprefix.'-item';
			}

			if(c::get('environment') == 'local' && c::get('resrc') == false) {
				// on local development, without resrc, maximize thumb
				$thumbwidth = c::get('thumb.dev.width',1200);
			}
			else {
				$thumbwidth = null; // use maximum image width for thumb
			}

			$thumburl = thumb($image,array(
				'width' => $thumbwidth,
				'height' => $height,
				'quality' => $quality,
				'crop' => $crop,
			), false);

			/**
			 * Different options for different image configurations.
			 */

			// Regular image tag, full size thumbnail
			if(c::get('lazyload') == false && c::get('resrc') == false) {

				$imagethumb = html::img($thumburl,array(
					'width'     => $image->width(),
					'height'    => $image->height(),
					'class'     => $class,
					'alt'       => html($alt). ' '
					)
				);

			}

			// Lazyload (echo.js) image tag
			if(c::get('lazyload') == true && c::get('resrc') == false) {

				$imagethumb = html::img('/assets/images/loader.gif',array(
					'data-src'  => $thumburl,
					// 'width'     => $image->width(),
					// 'height'    => $image->height(),
					'class'     => $class,
					'alt'       => html($alt). ' '
					)
				);

			}

			// Resrc image tag
			if(c::get('lazyload') == false && c::get('resrc') == true) {

					$imagethumb = html::img('',array(
						'data-src'  => 'http://' . c::get('resrc.plan') . '/' . c::get('resrc.params') . '/' . $thumburl,
						'width'     => $image->width(),
						'height'    => $image->height(),
						'class'     => $class . ' resrc',
						'alt'       => html($alt) . ' '
						)
					);

			}

			// Resrc image via lazyload (echo.js) image tag
			if(c::get('lazyload') == true && c::get('resrc') == true) {

				$imagethumb = html::img('/assets/images/loader.gif',array(
					'data-src'  => 'http://' . c::get('resrc.plan') . '/' . c::get('resrc.params') . '/' . $thumburl,
					'width'     => $image->width(),
					'height'    => $image->height(),
					'class'     => $class . ' js-resrcIsLazy',
					'alt'       => html($alt) . ' '
					)
				);

			}

			$figure->append($imagethumb);

			$i++;

		}

		if(!empty($caption)) {
			$figure->append('<figcaption class="FigureImage-caption"><p>' . html($caption) . '</p></figcaption>');
		}

		return $figure;

	}
);

?>
