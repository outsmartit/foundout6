<?php
defined('_JEXEC') or die;
/* =====================================================================
  Gumber Template: Based on Foundation framework 5, Adapted for Joomla
  Author:   Diederik
  Version:  1.0
  Created:  January 2015
  Copyright:  Outsmartit.be - (C) 2015 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  /* ===================================================================== */

// Load template parameters

$app = JFactory::getApplication();
$params = $app->getTemplate(true)->params;
$logo = $params->get('logo');
$customCSS = $params->get('customCSS');
?>
<!DOCTYPE html>
<!--[if IE 8]>
        <html class="no-js lt-ie9" lang="en" > 
<![endif]-->
<!--[if gt IE 8]>
<!--> <html class="no-js" lang="en" > <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
    <jdoc:include type="head" />
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/outsmartit.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/owl-carousel/owl.theme.css" />
    <?php if ($customCSS != -1) : ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/<?php echo $customCSS ?>" />
    <?php endif; ?>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?php echo htmlspecialchars($params->get('sitetitle')); ?></title>
</head>
<body>
    <div class="row">
        <nav class="top-bar data-topbar">
            <ul class="title-area">
                <li class="name">
                   
                        <?php if ($logo) : ?>
                            <img src="<?php echo $this->baseurl; ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($params->get('sitetitle')); ?>" />
                        <?php else : ?>
                            <?php echo htmlspecialchars($params->get('sitetitle')); ?>
                        <?php endif; ?>
                    
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	        </ul>
	      <section class="top-bar-section">
	        <ul class="right">           
                    <?php $module = & JModuleHelper::getModule('menu'); ?>
                    <?php echo JModuleHelper::renderModule($module); ?>
                </ul>
        </nav>
    </div> 

    <div class="row">
        <div class="large-6 columns">
            <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/uil-oops.jpg"/></div>
        <div class="large-6 columns">
            <?php echo "<h2>Ooops,</h2> something went wrong.<br />  Please use the menu for correct navigation."; ?>
        </div>
    </div>

    <div class="footer-row">
        <div class="wrapper">
            <footer class="row">
                <div class="moduletable large-12 columns text-right">
                    <?php $module1 = JModuleHelper::getModule('custom', 'footer'); ?>
                    <?php echo JModuleHelper::renderModule($module1); ?>
                </div>
            </footer>
        </div>
    </div>
    <div class="row text-center">
        <small>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($params->get('sitetitle')); ?></small>
    </div>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/vendor/jquery-2.10.0.min.js"></script>

</body>
</html>
