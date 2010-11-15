<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=search.page.loop
[END_COT_EXT]
==================== */

/**
 * Displays translated pages in search results
 *
 * @package i18n
 * @version 0.7.0
 * @author Trustmaster
 * @copyright Copyright (c) Cotonti Team 2010
 * @license BSD License
 */

defined('COT_CODE') or die('Wrong URL');

if (!empty($row['ipage_title']))
{
	$page_url = empty($row['page_alias'])
		? cot_url('page', 'id='.$row['page_id'].'&l='.$row['ipage_locale'].'&highlight='.$hl)
		: cot_url('page', 'al='.$row['page_alias'].'&l='.$row['ipage_locale'].'&highlight='.$hl);
	$t->assign(array(
		'PLUGIN_PR_CATEGORY' => cot_i18n_build_catpath('page', $row['page_cat'], $row['ipage_locale']),
		'PLUGIN_PR_TITLE' => cot_rc_link($page_url, htmlspecialchars($row['ipage_title'])),
		'PLUGIN_PR_TEXT' => cot_clear_mark($row['ipage_text'], $row['page_type'], $words),
		'PLUGIN_PR_TIME' => @date($cfg['dateformat'], $row['ipage_date'] + $usr['timezone'] * 3600)
	));
}

?>
