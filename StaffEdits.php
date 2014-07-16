<?php
/**
 * StaffEdits -- allows to tag edits as "official staff edits" in the edit
 * view (action=edit)
 *
 * @file
 * @ingroup Extensions
 * @version 0.1
 * @author Jack Phoenix <jack@countervandalism.net>
 * @link https://www.mediawiki.org/wiki/Extension:StaffEdits Documentation
 * @license https://en.wikipedia.org/wiki/Public_domain Public domain
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Go away.' );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'StaffEdits',
	'version' => '0.1',
	'author' => 'Jack Phoenix',
	'description' => 'Allows to tag edits as "official [[Special:ListUsers/staff|staff]] edits" in the edit view',
	'url' => 'https://www.mediawiki.org/wiki/Extension:StaffEdits',
);

$wgAvailableRights[] = 'staffedit';
$wgGroupPermissions['staff']['staffedit'] = true;

// Set up i18n
$wgMessagesDirs['StaffEdits'] = __DIR__ . '/i18n';

// Set up the extension itself
$wgAutoloadClasses['StaffEdits'] = __DIR__ . '/StaffEdits.class.php';

$wgHooks['EditPage::showEditForm:initial'][] = 'StaffEdits::onEditPage';
$wgHooks['ListDefinedTags'][] = 'StaffEdits::onListDefinedTags';
$wgHooks['RecentChange_save'][] = 'StaffEdits::onRecentChange_save';