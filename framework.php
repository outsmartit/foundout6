<?php

defined('_JEXEC') or die;
/* =====================================================================
  Template: Based on Foundation 6 for Joomla
  Author:   outsmartit.be
  Version:  1.0
  Created:  January 2016
  Copyright:  outsmartit.be - (C) 2016 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  DBAD License http://philsturgeon.co.uk/code/dbad-license
  Credits: Code taken from the following:
  Seth Warburton  - https://github.com/nternetinspired/OneWeb
  Antony Doyle    - https://github.com/antonydoyle/siegeengine2
  /* ===================================================================== */

// Define shortcuts for template parameters
$unsetBootstrap = $this->params->get('unsetBootstrap');
//$loadMoo = $this->params->get('loadMoo');
$setGeneratorTag = $this->params->get('setGeneratorTag');
$analytics = $this->params->get('analytics');
$customCSS = $this->params->get('customCSS');
$defaultWidth = '';
$setWidth = $this->params->get('setWidth');
$widthUnit = $this->params->get('widthUnit');
$topbarTitle = $this->params->get('topbarTitle');
$stickyTopMenu = $this->params->get('stickyTopMenu');
$googleWebFonts = $this->params->get('googleWebFonts');
$twitter = $this->params->get('twitter');
$twitterLink = $this->params->get('twitterLink');
$dribbble = $this->params->get('dribbble');
$dribbbleLink = $this->params->get('dribbbleLink');
$facebook = $this->params->get('facebook');
$facebookLink = $this->params->get('facebookLink');
$googleplus = $this->params->get('googleplus');
$googleplusLink = $this->params->get('googleplusLink');
$github = $this->params->get('github');
$githubLink = $this->params->get('githubLink');
$linkedin = $this->params->get('linkedin');
$linkedinLink = $this->params->get('linkedinLink');
$youtube = $this->params->get('youtube');
$youtubeLink = $this->params->get('youtubeLink');
$logo = $this->params->get('logo');
$sitetitle = $this->params->get('sitetitle');
$disclaimer = $this->params->get('disclaimer');
$disclaimerlink = $this->params->get('disclaimerlink');
$active = JFactory::getApplication()->getMenu()->getActive();

$fixed = "";

if ($stickyTopMenu == 1) {
    $fixed = "data-sticky-container";
}
// Do we have social links?
$social = ($twitterLink ? 1 : 0) + ($dribbbleLink ? 1 : 0) + ($facebookLink ? 1 : 0) + ($googleplusLink ? 1 : 0) + ($githubLink ? 1 : 0);

if ($this->countModules('right') == 0) {
    $rightwidth = 0;
} else {
    $rightwidth = (int) ($this->params->get('rightwidth'));
}
if ($this->countModules('left') == 0) {
    $leftwidth = 0;
} else {
    $leftwidth = (int) ($this->params->get('leftwidth'));
}

$colcount = $rightwidth + $leftwidth;
$coltotal = 12 - $colcount;

$mainwidth = 'large-' . $coltotal;
$rightWidth = 'large-' . $rightwidth;
$leftWidth = 'large-' . $leftwidth;

// Modules
$header = (int) ($this->countModules('header') > 0);
$nav = (int) ($this->countModules('nav') > 0);
$top = (int) ($this->countModules('top') > 0);
$above = (int) ($this->countModules('above') > 0);
$abovecontent = (int) ($this->countModules('above-content') > 0);
$left = (int) ($this->countModules('left') > 0);
$right = (int) ($this->countModules('right') > 0);
$belowcontent = (int) ($this->countModules('below-content') > 0);
$below = (int) ($this->countModules('below') > 0);
$bottom = (int) ($this->countModules('bottom') > 0);
$footer = (int) ($this->countModules('footer') > 0);


#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/
// To enable use of site configuration
$app = JFactory::getApplication();
$pageParams = $app->getParams();
$sitename = $app->getCfg('sitename');
// Returns a reference to the global document object
$doc = JFactory::getDocument();

// Define relative path to the current template directory
$template = 'templates/' . $this->template;

// Change generator tag
$this->setGenerator($setGeneratorTag);

/* Remove MooTools if set to no.
if (!$loadMoo) {
    unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl . '/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl . '/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);
}
*/
#-------------End Construct Code--------------------------------------#

