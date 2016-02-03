<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once (JPATH_THEMES . '/foundout6/helpers/foundoutsixhtml.php');
/**
 * Layout variables
 * ---------------------
 * 	$text         : (string)  The label text
 * 	$description  : (string)  An optional description to use in a tooltip
 * 	$for          : (string)  The id of the input this label is for
 * 	$required     : (boolean) True if a required field
 * 	$classes      : (array)   A list of classes
 * 	$position     : (string)  The tooltip position. Bottom for alias
 */

$text		= $displayData['text'];
$desc		= $displayData['description'];
$for		= $displayData['for'];
$req		= $displayData['required'];
$classes	= array_filter((array) $displayData['classes']);
$position	= $displayData['position'];

$id = $for . '-lbl';
$title = '';

// If a description is specified, use it to build a tooltip.
if (!empty($desc))
{

	$classes[] = 'hasTooltip';
	$title = ' title="' . JHtmlFoundoutsix::tooltipText(trim($text, ':'), $desc, 0,1) . '"';
}

// If required, there's a class for that.
if ($req)
{
	$classes[] = 'required';
}

?>
<span data-tooltip aria-haspopup="true" class="has-tip"  <?php echo $title; ?> >
<label id="<?php echo $id; ?>" for="<?php echo $for; ?>" class="<?php echo implode(' ', $classes); ?>">
	<?php echo $text; ?> <?php if ($req) : ?><i class="fa fa-asterisk"></i><?php endif; ?>
</label>
</span>