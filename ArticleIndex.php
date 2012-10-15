<?php

/**
 * Extension displays index of words in an article.
 * Add tag <aindex></aindex>.
 * Words in these tags are displayed instead of tag <articleindex/> in alphabet order
 * grouped by first letters.
 * Clicking the word highlights his occurrences and moves page to the first one
 * Navigation buttons on mouseover
 */

if ( !defined( 'MEDIAWIKI' ) ) {
echo <<<EOT
	To install my extension, put the following line in LocalSettings.php:
	require_once( "\$IP/extensions/ArticleIndex/ArticleIndex.php");
EOT;
exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'ArticleIndex',
	'author' => 'Josef Martiňák',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ArticleIndex',
	'descriptionmsg' => 'articleindex-desc',
	'version' => '0.3'
);

# Register a module
$wgResourceModules['ext.ArticleIndex'] = array(
	'styles' => array( 'ext.ArticleIndex.css' ),
	'scripts' => array( 'ext.ArticleIndex.js' ),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ArticleIndex',
	'messages' => array(
		'articleindex-prev',
		'articleindex-next',
		'articleindex-index')
);

$wgAutoloadClasses['ArticleIndexHooks'] = __DIR__ . '/ArticleIndexHooks.php';
$wgExtensionMessagesFiles['ArticleIndex'] = __DIR__ . '/ArticleIndex.i18n.php';
$wgHooks['ParserFirstCallInit'][] = 'ArticleIndexHooks::registerParserHook';
$wgHooks['BeforePageDisplay'][] = 'ArticleIndexHooks::showIndex';
