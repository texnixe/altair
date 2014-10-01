<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
/////////////////////////////////////////////////////////////

if($page->isHomepage()) { $shareUrl = $site->url(); } else { $shareUrl = $page->tinyurl(); } // make sure to enable tinyurl in config.php
$twittertext = 'Check out this “' . $page->title() . '” page on ' . $site->title() . ': ' . $shareUrl;

////////////////////////////////////////////////////////// ?>

<aside class="u-spaceTrailerM">
	<h2 class="DeltaHeading">Share this page</h2>
	<ul class="ShareLinks List List--links">
		<li><a href="http://www.facebook.com/sharer.php?u=<?php echo $shareUrl; ?>&amp;t=<?php echo $page->title(); ?>" title="Share this page on Facebook (opens in new window)" target="external" class="js-popup">On Facebook</a></li>
		<li><a href="http://twitter.com/share?text=<?php echo rawurlencode($twittertext); ?>&amp;url=" title="Share this page on Twitter (opens in new window)" target="external" class="js-popup">On Twitter</a></li>
	</ul>
</aside>
