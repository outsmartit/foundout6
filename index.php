
<?php
defined('_JEXEC') or die;
/* =====================================================================
  Foundout6 Template: Based on Foundation 6 for Joomla
  Author:   Diederik - outsmartit.be
  Version:  1.04
  Created:  January 2016
  Copyright:  Outsmartit.be - (C) 2015 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  /* ===================================================================== */

// Load template framework
include_once JPATH_THEMES . '/' . $this->template . '/framework.php';
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
        <link rel="apple-touch-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/apple-touch-icon.png">
    <jdoc:include type="head" />
    <?php
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/app.css');
    //$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/foundout6.css');
    ?>
    <?php
    if ($customCSS != -1) {
        $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/' . $customCSS);
    }
    ?>
    <?php
    //$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/vendor/modernizr.js');
    JHtml::_('jquery.framework');
    if (!$unsetBootstrap == 0) {
        unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
    }
    ?>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <?php if ($setWidth != $defaultWidth) : ?>
        <style>
            .row {
                max-width: <?php echo $setWidth ?><?php echo $widthUnit ?>;
            }
        </style>
    <?php endif; ?>
</head>
<body class="<?php if ($active) : echo $active->alias;
    endif; ?>">
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="row">
<?php if ($this->countModules('above-nav')) : ?>
                    <div class="medium-3 columns above-nav">
                        <jdoc:include type="modules" name="above-nav"  />  
                    </div>
                    <?php $offset = "" ?>
                <?php else: ?>
                    <?php $offset = "medium-offset-8" ?>
                <?php endif; ?>
<?php if ($this->countModules('lang-sel')) : ?>
                    <div class="medium-4 <?php echo $offset; ?> columns text-right lang-sel">
                        <jdoc:include type="modules" name="lang-sel" /> 
                    </div>

            <?php endif; ?>
            </div>
            <?php if ($this->countModules('nav')) : ?>                   
                <jdoc:include type="modules" name="nav" />                
            <?php endif; ?>

<?php if ($this->countModules('top')) : ?>
                <div style="position:static;"><br/></div>
                <div class="hero" id="topA">                  
                       <section class="myrow">                           
                           <jdoc:include type="modules" name="top" style="joomberui" /> 
                       </section> 
                    
                </div>
            <?php endif; ?>

<?php if ($this->countModules('above')) : ?>
                <div class="above-row">
                    <div class="wrapper">
                        <section class="row">
                            <!--aboverow-->
                            <jdoc:include type="modules" name="above" style="joomberui" />
                        </section>
                    </div>
                </div>
<?php endif; ?>

            <div class="row">
                <!--mainrow-->
<?php if ($this->countModules('left')) : ?>
                    <section class="<?php echo $leftWidth ?> columns sidebar">
                        <!--left-row-->
                        <jdoc:include type="modules" name="left" style="joomberui" />
                    </section>
<?php endif; ?>
                <div class="<?php echo $mainwidth ?> columns">
                    <!--mainrow-->
<?php if ($this->countModules('above-content')) : ?>
                        <div class="above-content">
                            <!--above-content-->
                            <jdoc:include type="modules" name="above-content" style="joomberui" />
                        </div>
                    <?php endif; ?>

<?php if ($this->countModules('breadcrumbs')) : ?>
                        <div class="breadcrumbs-row">
                            <div class="wrapper">

                                <jdoc:include type="modules" name="breadcrumbs" style="none" />

                            </div>
                        </div>
<?php endif; ?>

                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
<?php if ($this->countModules('below-content')) : ?>
                        <section class="below-content">
                            <!--below-content-->
                            <jdoc:include type="modules" name="below-content" style="joomberui" />
                        </section>
                <?php endif; ?>
                </div>
<?php if ($this->countModules('right')) : ?>
                    <section class="<?php echo $rightWidth ?> columns sidebar">
                        <!--right-row-->
                        <jdoc:include type="modules" name="right" style="joomberui" />
                    </section>
<?php endif; ?>
            </div>

<?php if ($this->countModules('below')) : ?>
                <div class="below-row">
                    <div class="wrapper">
                        <section class="row">
                            <!--belowrow-->
                            <jdoc:include type="modules" name="below" style="joomberui" />
                        </section>
                    </div>
                </div>
            <?php endif; ?>

<?php if ($this->countModules('bottom')) : ?>
                <div class="bottom-row">
                    <div class="wrapper">
                        <section class="row">
                            <!--bottomrow-->
                            <jdoc:include type="modules" name="bottom" style="joomberui" />
                        </section>
                    </div>
                </div>
            <?php endif; ?>

<?php if ($this->countModules('footer')) : ?>
                <div class="footer-row">
                    <div class="wrapper">
                        <footer class="row">
                            <!--footerrow-->
                            <jdoc:include type="modules" name="footer" style="joomberui" />
                        </footer>
                    </div>
                </div>
<?php endif; ?>
            <jdoc:include type="modules" name="debug" />

            <footer class="row" id="found6footer">
<?php if ($social > 0) : ?>
                    <div class="large-9 small-6 columns">
                        <ul class="mysocial">
                            <?php if ($twitterLink != "") : ?>
                                <li><a href="<?php echo ($twitterLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_TWITTER_LABEL'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if ($instagramLink != "") : ?>
                                <li><a class="instagram" href="<?php echo ($instagramLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_INSTAGRAM_LABEL'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if ($pinterestLink != "") : ?>
                                <li><a class="instagram" href="<?php echo ($pinterestLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_PINTEREST_LABEL'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if ($dribbbleLink != "") : ?>
                                <li><a href="<?php echo ($dribbbleLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_DRIBBBLE_LABEL'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <?php endif; ?>
                            <?php if ($facebookLink != "") : ?>
                                <li><a  href="<?php echo ($facebookLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_FACEBOOK_LABEL'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if ($googleplusLink != "") : ?>
                                <li><a href="<?php echo ($googleplusLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_GOOGLEPLUS_LABEL'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if ($linkedinLink != "") : ?>
                                <li><a href="<?php echo ($linkedinLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_LINKEDIN_LABEL'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if ($githubLink != "") : ?>
                                <li><a href="<?php echo ($githubLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_GITHUB_LABEL'); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
                            <?php endif; ?>
                                <?php if ($youtubeLink != "") : ?>
                                <li><a href="<?php echo ($youtubeLink); ?>" title="<?php echo JText::_('TPL_FOUNDOUT6_YOUTUBE_LABEL'); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="large-3 small-6 columns text-right">
                        <ul class="mysocial"><li>
                                <a href="#">Back to top <i class="fa fa-arrow-up"></i></a>
                            </li></ul>
                    </div>
<?php else : ?>
                    <div class="large-3 large-offset-9 columns text-right">
                        <ul class="mysocial"><li>
                                <a href="#">Back to top <i class="fa fa-arrow-up"></i></a>
                            </li></ul>
                    </div>
<?php endif; ?>
                <div class="row">
                    <div class="large-12 columns text-center">
                        <small>
                            <?php if ($disclaimer == 1 && $disclaimerlink) : ?>
                            <a href="<?php echo $disclaimerlink; ?>"><?php echo JText::_("TPL_FOUNDOUT6_DISCLAIMER"); ?></a><br/>
                        <?php endif; ?>
                            &copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($app->getCfg('sitename')); ?>
                        </small>
                    </div>
                </div>
            </footer>
            <!-- end of credit row -->
            <?php
            $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/foundation.min.js');

            ?>
            <script>
                jQuery(document).foundation();
            </script>

<!--[if lte IE 8]>  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/respond.js"></script> <![endif]-->

<?php if ($analytics != "UA-XXXXX-X") : ?>

                <script>
                    var _gaq = [['_setAccount', '<?php echo htmlspecialchars($analytics); ?>'], ["_trackPageview"]];
                    (function (d, t) {
                        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                        g.async = 1;
                        g.src = ("https:" == location.protocol ? "//ssl" : "//www") + ".google-analytics.com/ga.js";
                        s.parentNode.insertBefore(g, s)
                    }(document, "script"));
                </script>
<?php endif; ?>
        </div>
    </div>
    <noscript>JavaScript is unavailable or disabled; so you are probably going to miss out on a few things. Everything should still work, but with a little less pzazz!</noscript>

</body>
</html>
