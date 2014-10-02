<?php ///////////////////////////////////////////////////////
// ----------------------------------------------------------
// SNIPPET
// ----------------------------------------------------------
// Example embed code:
// $projects = $pages->find('work')->children()->visible()->paginate(10);
// snippet('pagination', array('pagination' => $projects->pagination(), 'range' => 5));
// ----------------------------------------------------------
////////////////////////////////////////////////////////// ?>

<div role="pagination" class="Pagination">

	<p class="Pagination-count">
		<strong><?php echo $pagination->items(); ?></strong> results / showing <strong><?php echo $pagination->numStart(); ?></strong> &ndash; <strong><?php echo ($pagination->items() < $pagination->numEnd()) ? $pagination->items() : $pagination->numEnd(); ?></strong>
	</p>

	<?php if($pagination->countItems() > $pagination->limit()): ?>
	<nav>
		<h2 class="u-isHiddenVisually">Page navigation</h2>
		<?php if(isset($range) && $pagination->items() > $range): ?>
			<?php if(!$pagination->isFirstPage()): ?>
				<a href="<?php echo $pagination->firstPageURL(); ?>" class="Pagination-first">&larr;&larr; Newest</a>
			<?php else: ?>
				<span class="Pagination-newest">(&larr;&larr; Newest)</span>
			<?php endif; ?>
		<?php endif; ?>

		<?php if($pagination->hasPrevPage()): ?>
			<a href="<?php echo $pagination->prevPageURL(); ?>" class="Pagination-newer">&larr; Newer</a>
		<?php else: ?>
			<span class="Pagination-newer">(&larr; Newer)</span>
		<?php endif; ?>

		<?php if(isset($range) && $pagination->items() > 1): ?>
			<?php foreach($pagination->range($range) as $range_num): ?>
				<a href="<?php echo $pagination->pageURL($range_num) ?>" class="Pagination-range<?php if($pagination->page() == $range_num) echo ' is-active' ?>"><?php echo $range_num ?></a>
			<?php endforeach ?>
		<?php endif; ?>

		<?php if($pagination->hasNextPage()): ?>
			<a href="<?php echo $pagination->nextPageURL(); ?>" class="Pagination-older">Older &rarr;</a>
		<?php else: ?>
			<span class="Pagination-older">(Older &rarr;)</span>
		<?php endif; ?>

		<?php if(isset($range) && $pagination->items() > $range): ?>
			<?php if(!$pagination->isLastPage()): ?>
				<a href="<?php echo $pagination->lastPageURL() ?>" class="Pagination-oldest">Oldest &rarr;&rarr;</a>
			<?php else: ?>
				<span class="Pagination-oldest">(Oldest &rarr;&rarr;)</span>
			<?php endif; ?>
		<?php endif; ?>
	</nav>
	<?php endif; ?>

</div>
