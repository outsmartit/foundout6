<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact adapted for Foundation 5 & 6
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

//jimport('joomla.html.html.bootstrap');
?>
<div class="found6contact<?php echo $this->pageclass_sfx ?>" itemscope itemtype="http://schema.org/Person">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>
    <?php if ($this->contact->name && $this->params->get('show_name')) : ?>
        <div class="page-header">
            <h2>
                <?php if ($this->item->published == 0) : ?>
                    <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
                <?php endif; ?>
                <span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
            </h2>
        </div>
    <?php endif; ?>
    <?php if ($this->params->get('show_contact_category') == 'show_no_link') : ?>
        <h3>
            <span class="contact-category"><?php echo $this->contact->category_title; ?></span>
        </h3>
    <?php endif; ?>
    <?php if ($this->params->get('show_contact_category') == 'show_with_link') : ?>
        <?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
        <h3>
            <span class="contact-category"><a href="<?php echo $contactLink; ?>">
                    <?php echo $this->escape($this->contact->category_title); ?></a>
            </span>
        </h3>
    <?php endif; ?>
    <?php if ($this->params->get('show_contact_list') && count($this->contacts) > 1) : ?>
        <form action="#" method="get" name="selectForm" id="selectForm">
            <?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?>
            <?php echo JHtml::_('select.genericlist', $this->contacts, 'id', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link); ?>
        </form>
    <?php endif; ?>

    <?php if ($this->params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
        <?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
        <?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
    <?php endif; ?>

    <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
        <!-- insert foundout6 -->
        <ul class="accordion" data-accordion role="tablist" data-allow-all-closed="true">
    <?php endif; ?>
        <?php if ($this->params->get('presentation_style') == 'tabs') : ?>

            <ul class="tabs" data-tabs id="example-tabs">
                <li class="tabs-title is-active"><a href="#tab1" aria-selected="true"><?php echo JText::_('COM_CONTACT_DETAILS'); ?></a></li>
                <li class="tabs-title"><a href="#tab2"><?php echo JText::_('COM_CONTACT_EMAIL_FORM'); ?></a></li>
                <?php if ($this->params->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>
                    <li class="tabs-title"><a href="#tab3"><?php echo JText::_('JGLOBAL_ARTICLES'); ?></a></li>
                <?php endif ?>
                <?php if ($this->params->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>
                    <li class="tabs-title"><a href="#tab4"><?php echo JText::_('COM_CONTACT_PROFILE'); ?></a></li>
                <?php endif; ?>
                <?php if ($this->contact->misc && $this->params->get('show_misc')) : ?>
                    <li class="tabs-title"><a href="#tab5"><?php echo JText::_('COM_CONTACT_OTHER_INFORMATION'); ?></a></li>
                <?php endif; ?>
                    <?php if ($this->params->get('show_links')) : ?>
                    <li class="tabs-title"><a href="#tab9"><?php echo JText::_('COM_CONTACT_LINKS'); ?></a></li>
                <?php endif; ?>
            </ul>
            <div class="tabs-content" data-tabs-content="example-tabs">
            <?php endif; ?>

            <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                <!-- insert foundout6 -->
                <li class="accordion-item is-active">
                    <!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
                    <a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d"><?php echo JText::_('COM_CONTACT_DETAILS'); ?></a>
                    <div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">
                    <?php endif; ?>
                    <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                        <div class="tabs-panel is-active" id="tab1">
                        <?php endif; ?>
                        <?php if ($this->params->get('presentation_style') == 'plain'): ?>
                            <?php echo '<h3>' . JText::_('COM_CONTACT_DETAILS') . '</h3>'; ?>
                        <?php endif; ?>

                        <?php if ($this->contact->image && $this->params->get('show_image')) : ?>
                            <div class="thumbnail pull-right">
                                <?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'itemprop' => 'image')); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->contact->con_position && $this->params->get('show_position')) : ?>
                            <dl class="contact-position dl-horizontal">
                                <dd itemprop="jobTitle">
                                    <?php echo $this->contact->con_position; ?>
                                </dd>
                            </dl>
                        <?php endif; ?>
                        <div class="mygrey">
                            <div class="medium-12 columns">
                                <?php echo $this->loadTemplate('address'); ?>
                            </div>
                        </div>
                        <?php if ($this->params->get('allow_vcard')) : ?>
                            <?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS'); ?>
                            <a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id=' . $this->contact->id . '&amp;format=vcf'); ?>">
                                <?php echo JText::_('COM_CONTACT_VCARD'); ?></a>
                        <?php endif; ?>

                        <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                            <!-- insert foundout6 -->
                        </div>
                </li>
            <?php endif; ?>
            <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                <!-- insert foundout6 -->
            </div>
        <?php endif; ?>

        <?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>

            <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                <!-- insert foundout6 -->
                <li class="accordion-item">
                    <a href="#panel2d" role="tab" class="accordion-title" id="panel2d-heading" aria-controls="panel2d"><?php echo JText::_('COM_CONTACT_EMAIL_FORM'); ?></a>
                    <div id="panel2d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel2d-heading">

                    <?php endif; ?>

                    <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                        <div class="tabs-panel" id="tab2">
                        <?php endif; ?>
                        <?php if ($this->params->get('presentation_style') == 'plain'): ?>
                            <?php echo '<h3>' . JText::_('COM_CONTACT_EMAIL_FORM') . '</h3>'; ?>
                        <?php endif; ?>

                        <?php echo $this->loadTemplate('form'); ?>

                        <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                            <!-- insert foundout6 -->
                        </div>
                </li>
            <?php endif; ?>
            <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->params->get('show_links')) : ?>
    <?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>

<?php if ($this->params->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>

    <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
        <li class="accordion-item">
            <a href="#panel3d" role="tab" class="accordion-title" id="panel3d-heading" aria-controls="panel3d"><?php echo JText::_('JGLOBAL_ARTICLES'); ?></a>
            <div id="panel3d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel3d-heading">
            <?php endif; ?>
            <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                <div class="tabs-panel is-active" id="tab3">
                <?php endif; ?>
                <?php if ($this->params->get('presentation_style') == 'plain'): ?>
                    <?php echo '<h3>' . JText::_('JGLOBAL_ARTICLES') . '</h3>'; ?>
                <?php endif; ?>

                <?php echo $this->loadTemplate('articles'); ?>

                <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                </div>
        </li>
    <?php endif; ?>
    <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->params->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>

    <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
        <li class="accordion-item">
            <a href="#panel4d" role="tab" class="accordion-title" id="panel4d-heading" aria-controls="panel4d"><?php echo JText::_('COM_CONTACT_PROFILE'); ?></a>
            <div id="panel4d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel4d-heading">
            <?php endif; ?>
            <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                <div class="tabs-panel is-active" id="tab4">
                <?php endif; ?>
                <?php if ($this->params->get('presentation_style') == 'plain'): ?>
                    <?php echo '<h3>' . JText::_('COM_CONTACT_PROFILE') . '</h3>'; ?>
                <?php endif; ?>

                <?php echo $this->loadTemplate('profile'); ?>

                <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                </div>
        </li>
    <?php endif; ?>
    <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->contact->misc && $this->params->get('show_misc')) : ?>

    <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
        <li class="accordion-item">
            <a href="#panel5d" role="tab" class="accordion-title" id="panel5d-heading" aria-controls="panel5d"><?php echo JText::_('COM_CONTACT_OTHER_INFORMATION'); ?></a>
            <div id="panel5d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel5d-heading">
            <?php endif; ?>
            <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
                <div class="tabs-panel is-active" id="tab5">
                <?php endif; ?>
                <?php if ($this->params->get('presentation_style') == 'plain'): ?>
                    <?php echo '<h3>' . JText::_('COM_CONTACT_OTHER_INFORMATION') . '</h3>'; ?>
                <?php endif; ?>

                <div class="contact-miscinfo">
                    <dl class="dl-horizontal">
                        <dt>
                        <span class="<?php echo $this->params->get('marker_class'); ?>">
                            <?php echo $this->params->get('marker_misc'); ?>
                        </span>
                        </dt>
                        <dd>
                            <span class="contact-misc">
                                <?php echo $this->contact->misc; ?>
                            </span>
                        </dd>
                    </dl>
                </div>

                <?php if ($this->params->get('presentation_style') == 'sliders') : ?>
                </div>
        </li>
    <?php endif; ?>
    <?php if ($this->params->get('presentation_style') == 'tabs') : ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
    </ul>
<?php endif; ?>
<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
    </div>
<?php endif; ?>
</div>
