<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// PARTIAL :: DESKTOP
// ----------------------------------------------------------
/////////////////////////////////////////////////////////////

// Assets (dev vs. min+hash)
$assets_css = f::read(server::get('document_root') . '/assets/stylesheets/min/hash.css.json');
$assets_js = f::read(server::get('document_root') . '/assets/javascript/min/hash.js.json');
$assets_css_json = json_decode($assets_css);
$assets_js_json = json_decode($assets_js);
// a::show($assets_css, $echo=true); // Show hash.json contents
// a::show($assets_js, $echo=true); // Show hash.json contents

if(c::get('environment') == 'local'):
	$env_suffix = 'dev';
	$main_css = 'main.dev';
	$print_css = 'print.dev';
	// $oldie_css = 'oldie.dev';
	$head_js = 'head.scripts.dev';
	$main_js = 'main.scripts.dev';
else:
	$env_suffix = 'min';
	$main_css = $assets_css_json->main;
	$print_css = $assets_css_json->print;
	// $oldie_css = $assets_css_json->oldie;
	$head_js = $assets_js_json->head;
	$main_js = $assets_js_json->main;
endif;

// Language code(s)
foreach($site->languages() as $language):
	if($site->language() == $language): $language_code = $language->code(); $language_locale = $language->locale(); endif;
endforeach;

// Page title
if($page->isHomePage() && $site->descriptor() != ''): $pagetitle = smartypants(titlecase($site->descriptor()));
elseif($page->subtitle() != ''): $pagetitle = smartypants(titlecase($page->subtitle()));
else: $pagetitle = smartypants(titlecase($page->title())); endif;

// Meta description
if($page->isHomePage()):
	if($site->meta_description() != ''): $meta_description = smartypants($site->meta_description());
	else: $meta_description = ''; endif;
else:
	if($page->meta_description() != ''): $meta_description = smartypants($page->meta_description());
	elseif($site->meta_description() != ''): $meta_description = smartypants($site->meta_description());
	else: $meta_description = ''; endif;
endif;

// Variable to set 'critical' css file to link to on a template basis.
// To enable add array to 'snippet_detect('html_head');' at top of template:
// 'snippet_detect('html_head', array('criticalcss' => 'home'));'
// If no varibale is set for a template the critical css of the
// 'home' page is used as a 'fallback'.
if(!isset($criticalcss) || $criticalcss == false): $criticalcss = 'home'; endif;

// Variable to set next and previous rel="next/prev" links.
// To enable add array to 'snippet_detect('html_head');' at top of template:
// 'snippet_detect('html_head', array('prev_next' => true));'
if(!isset($prev_next)): $prev_next = false; endif;

// Variable to set next and previous rel="prerender" links.
// To enable add add array to 'snippet_detect('html_head');' at top of template:
// 'snippet_detect('html_head', array('prerender' => true));'
if(!isset($prerender)): $prerender = false; endif;

// Variable to set next and previous rel="prefetch" links.
// To enable add add array to 'snippet_detect('html_head');' at top of template:
// 'snippet_detect('html_head', array('prefetch' => true));'
if(!isset($prefetch)): $prefetch = false; endif;

////////////////////////////////////////////////////////// ?>

<!doctype html>
<!--[if lte IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $language_locale; ?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="<?php echo $language_locale; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $language_locale; ?>"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php // Prefetch DNS for external assets (Typekit, Google APIs, etc). ?>
	<link rel="dns-prefetch" href="//use.typekit.net">
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">

	<title><?php echo smartypants($site->title()) . ': ' . $pagetitle; ?></title>

	<meta name="author" content="<?php echo smartypants($site->author()); ?>">
	<?php if($meta_description != ''): ?><meta name="description" content="<?php echo smartypants($meta_description); ?>"><?php endif; ?>
	<meta name="robots" content="<?php if(c::get('environment') == 'local' || c::get('environment') == 'stage'): echo 'noindex, nofollow'; else: echo 'index, follow'; endif; ?>">
	<?php if($site->ios_title() != ''): ?><meta name="apple-mobile-web-app-title" content="<?php echo smartypants($site->ios_title()); ?>"><?php endif; ?>

	<link rel="home" href="<?php echo $site->url(); ?>">
	<?php if($site->find('sitemap')): ?><link rel="sitemap" type="application/xml" title="<?php echo smartypants(titlecase($site->find('sitemap')->title())); ?>" href="<?php echo html($site->find('sitemap')->url()); ?>"><?php endif; ?>
	<?php if($site->find('blog/feed')): ?><link rel="alternate" type="application/rss+xml" title="<?php echo smartypants(titlecase($site->find('blog/feed')->title())); ?>" href="<?php echo html(url('blog/feed')); ?>"><?php endif; ?>
	<?php if($site->google_plus() != ''): ?><link rel="publisher" href="https://plus.google.com/xxxxxxxxxxxxxxxxxxxxx"><?php endif; ?>

	<?php // Canonical rel link on pages that can be dynamic (e.g. …/tags:category-name); check is on 'tags' field, change or add based on project specifics ?>
	<?php foreach($page->children()->visible() as $child_page): if($child_page->tags() && !param()): ?><link rel="canonical" href="<?php echo $page->url($language_code); ?>"><?php break; endif; endforeach; ?>

	<?php // Alternate language rel link(s) for matching languages in config and available text files (e.g. blogarticle.md, blogarticle.en.md) ?>
	<?php foreach($site->languages() as $language): if($site->languages()->count() > 1 && $site->language() != $language && $page->inventory()['content'][$language->code()]): ?><link rel="alternate" href="<?php echo $page->url($language->code()); ?>" hreflang="<?php echo $language->locale(); ?>"><?php endif; endforeach; ?>

	<?php // Shortlink (to use enable tinyurl in config.php) ?>
	<?php if(c::get('tinyurl.enabled') && !$page->isHomepage()): ?><link rel="shortlink" href="<?php echo $page->tinyurl(); ?>"><?php endif; ?>

	<?php // Next and previous rel links (to use set $prev_next varibale in template) ?>
	<?php if($prev_next && $page->hasNextVisible()): ?><link rel="next" href="<?php echo $page->nextVisible()->url(); ?>" title="<?php echo smartypants($page->nextVisible()->title()); ?>"><?php endif; ?>
	<?php if($prev_next && $page->hasPrevVisible()): ?><link rel="prev" href="<?php echo $page->prevVisible()->url(); ?>" title="<?php echo smartypants($page->prevVisible()->title()); ?>"><?php endif; ?>

	<?php // Prerender next and previous pages (to use set $prerender varibale in template). Chrome only?! ?>
	<?php if($prerender): ?>
		<?php if($page->hasNextVisible()): ?><link rel="prerender" href="<?php echo $page->nextVisible()->url(); ?>"><?php endif; ?>
		<?php if($page->hasPrevVisible()): ?><link rel="prerender" href="<?php echo $page->prevVisible()->url(); ?>"><?php endif; ?>
	<?php endif; ?>

	<?php // Favicons & Apple Touch Icons ?>
	<?php snippet('icons'); ?>

	<?php // Initialize JS variables used later on ?>
	<script>var push_message = [];</script>
	<?php if((c::get('environment') == 'local') && c::get('resrc') == true) : ?><script>var custom_resrc = { server : 'local.roxy:8080' };</script><?php endif; ?>

	<?php // Enhance stysheets and scripts (https://github.com/filamentgroup/enhance) ?>
	<meta name="fullcss" content="<?php echo '/assets/stylesheets/' . $env_suffix . '/' . $main_css . '.css'; ?>">
	<meta name="fulljs" content="<?php echo '/assets/javascript/'. $env_suffix .'/' . $main_js . '.js'; ?>">
	<script><?php include_once(server::get('document_root') . '/assets/javascript/'. $env_suffix .'/' . $head_js . '.js'); ?></script>

	<?php if(isset($_COOKIE['fullcss'])): ?>
		<link rel="stylesheet" href="<?php echo '/assets/stylesheets/' . $env_suffix . '/' . $main_css . '.css'; ?>">
	<?php else: ?>
		<style><?php if(c::get('environment') == 'local' || c::get('environment') == 'stage'): echo '/* ' . $criticalcss . ' css */' . "\n"; endif; include_once(server::get('document_root') . '/assets/stylesheets/critical/' . $criticalcss . '.css'); ?></style>
		<noscript><link rel="stylesheet" href="<?php echo '/assets/stylesheets/' . $env_suffix . '/' . $main_css . '.css'; ?>"></noscript>
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo '/assets/stylesheets/' . $env_suffix . '/' . $print_css . '.css'; ?>" media="print">

	<!--[if (gte IE 7) & (lte IE 8)]>
	<script src="/assets/javascript/vendor/html5shiv.min.js'); ?>"></script>
	<script src="/assets/javascript/vendor/nwmatcher.min.js'); ?>"></script>
	<script src="/assets/javascript/vendor/selectivizr.min.js'); ?>"></script>
	<![endif]-->

</head>
<body>

	<?php snippet('oldie_message'); ?>
