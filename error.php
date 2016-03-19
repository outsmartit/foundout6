<?php
defined('_JEXEC') or die;
/* =====================================================================
  Gumber Template: Based on Foundation framework 6, Adapted for Joomla
  Author:   Diederik
  Version:  1.0
  Created:  January 2016
  Copyright:  Outsmartit.be - (C) 2016 - All rights reserved
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
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/app.min.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/outsmartit.css" />
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
                    <?php $module = & JModuleHelper::getModule('menu'); ?>
                    <?php echo JModuleHelper::renderModule($module); ?>
    </div> 

    <div class="row" style="margin-top:5rem;">
        <hr/>
        <div class="medium-6 columns">
            <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/uil-oops.jpg"/></div>
        <div class="medium-6 columns">
            <?php echo "<h2>Ooops,</h2> something went wrong.<br />  Please use the menu for correct navigation."; ?>
        </div>
    </div>

    <div class="footer-row">
        <div class="wrapper">
            <footer class="row">
                <div class="moduletable medium-12 columns text-right">
                    <?php $module1 = JModuleHelper::getModule('custom', 'footer'); ?>
                    <?php echo JModuleHelper::renderModule($module1); ?>
                </div>
            </footer>
        </div>
    </div>
    <div class="row text-center">
        <small>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($params->get('sitetitle')); ?></small>
    </div>
    <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/foundation.min.js"></script>
    <script>
                jQuery(document).foundation();
    </script>
</body>
</html>
