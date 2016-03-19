<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
<li class="accordion-item">
                    <a href="#panel9d" role="tab" class="accordion-title" id="panel9d-heading" aria-controls="panel9d"><?php echo JText::_('COM_CONTACT_LINKS'); ?></a>
                    <div id="panel9d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel9d-heading">
<?php endif; ?>
<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
    <div class="tabs-panel" id="tab9">	
<?php endif; ?>
<?php if ($this->params->get('presentation_style') == 'plain'):?>
	<?php echo '<h3>' . JText::_('COM_CONTACT_LINKS') . '</h3>';  ?>
<?php endif; ?>

<div class="contact-links">
	<ul class="nav nav-tabs nav-stacked">
		<?php
		// Letters 'a' to 'e'
		foreach (range('a', 'e') as $char) :
			$link = $this->contact->params->get('link' . $char);
			$label = $this->contact->params->get('link' . $char . '_name');

			if (!$link) :
				continue;
			endif;

			// Add 'http://' if not present
			$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link;

			// If no label is present, take the link
			$label = ($label) ? $label : $link;
			?>
			<li>
				<a href="<?php echo $link; ?>" itemprop="url">
					<?php echo $label; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
</div>
</li>
<?php endif; ?>
<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
</div>
<?php endif; ?>
