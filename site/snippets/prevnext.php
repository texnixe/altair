<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------

// If there is a param in the url
if(param()) {

	// Get the first key of the param array, but when the first key in url is `category` (singular), make sure to use `categrories` (plural; used in the text files) as the key value!
	$paramkey = (key(param()) == 'category') ? 'categories' : key(param());

	// Unslug the param to a tag
	$tag = tagunslug(param(key(param())));

	// Save param and tag for use in URL
	$paramURL = key(param()) . ':' . param(key(param()));

	// Filter projects by param
	$pageItems = $page->siblings()->visible()->filterBy($paramkey, ($tag), ',')->flip();

	$lookupPage = [];
	$i = 0;

	// Build an array with all project id's of the filtered projects
	foreach($pageItems as $pageItem) {
		$lookupPage[$i] = $pageItem->id();
		$i++;
	}

	// return the key of the array where the current page is located
	$currentpageIndex = array_search($page->id(), $lookupPage);

	if(isset($currentpageIndex)) {
		// If the current page is not the first of the filtered list
		if($currentpageIndex > 0) {
			$prevPage = $pages->find($lookupPage[$currentpageIndex - 1]);
			$prevTitle = $prevPage->title();
			$prevURL = $prevPage->url() . '/' . $paramURL;
			$hasPrev = true;
		}
		// If the current page is not the last of the filtered list
		if(($currentpageIndex + 1) < count($lookupPage)) {
			$nextPage = $pages->find($lookupPage[$currentpageIndex + 1]);
			$nextTitle = $nextPage->title();
			$nextURL = $nextPage->url() . '/' . $paramURL;
			$hasNext = true;
		}
	}
}
// There is no param in the url
else {
	$hasPrev = $page->hasPrevVisible();
	$prevTitle = $page->prevVisible()->title();
	$prevURL = $page->prevVisible()->url();

	$hasNext = $page->hasNextVisible();
	$nextTitle = $page->nextVisible()->title();
	$nextURL = $page->nextVisible()->url();
}
////////////////////////////////////////////////////////// ?>

<nav>
	<h2 class="u-isHiddenVisually">Next/previous navigation</h2>
	<?php if($hasPrev): ?>
		<a href="<?php echo $prevURL; ?>" class="Pagination-prev<?php if($hasNext == false): echo ' Pagination--full'; endif; ?>">&larr; <?php echo $prevTitle; ?></a>
	<?php endif; ?>

	<?php if($hasNext): ?>
		<a href="<?php echo $nextURL; ?>" class="Pagination-next<?php if($hasPrev == false): echo ' Pagination--full'; endif; ?>"><?php echo $nextTitle; ?>&rarr;</a>
	<?php endif; ?>
</nav>
