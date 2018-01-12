<?php
/**
 * Extension displays index of words in an article.
 *
 * Add tag <aindex></aindex>. Words in these tags are displayed
 * instead of tag <articleindex/> in alphabet order grouped by first letters.
 *
 * Clicking the word highlights his occurrences and moves page to the first one
 * Navigation buttons on mouseover.
 *
 */
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'ArticleIndex' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['ArticleIndex'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for the ArticleIndex extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the ArticleIndex extension requires MediaWiki 1.29+' );
}
