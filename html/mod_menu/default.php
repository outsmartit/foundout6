<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu adapted for Foundation 6.
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * 
 * @author outsmartit.be
 * 
 * Small screens will show the accordion menu, others will have the normal horizontal menu
 * 
 */
defined('_JEXEC') or die;
// Note. It is important to remove spaces between elements.
$sitetitle = $app->getTemplate($myparams = true)->params->get('sitetitle');
$logo = $app->getTemplate($myparams = true)->params->get('logo');
$sitedescription = $app->getTemplate($myparams = true)->params->get('sitedescription');
$stickyTopMenu = $app->getTemplate($myparams = true)->params->get('stickyTopMenu');
if ($stickyTopMenu == 1) {
    $fixed = "data-sticky-container";
}else {
    $fixed = "";
}
    
?>
<div class="title-bar hide-for-medium" data-responsive-toggle="found-mobile-menu" data-hide-for="medium" >
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title"><?php echo JText::_('TPL_FOUNDOUT6_MENU'); ?></div>
</div>
<div class="row" <?php echo $fixed; ?>>
    <?php if ($stickyTopMenu == 1) {echo 
    '<div style="width:100%" class="sticky" data-sticky data-options="marginTop:1.3;">'; } ?>
    <div class="top-bar show-for-medium" >
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <!-- Title Area -->
                <li class="menu-text">
                    <?php if ($logo) : ?>
                        <img src="<?php echo JUri::root() ?>/<?php echo htmlspecialchars($logo); ?>"
                             title="<?php echo htmlspecialchars($sitetitle); ?>"
                             alt="<?php echo htmlspecialchars($sitedescription); ?>"
                             class=" foundlogo"/>
                    <?php else : ?> <h1><?php echo $sitetitle; ?> </h1>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">

            <ul class="dropdown menu"<?php
                $tag = '';
                if ($params->get('tag_id') != null) {
                    $tag = $params->get('tag_id') . '';
                    echo ' id="' . $tag . '"';
                }
                ?> data-dropdown-menu>
                    <?php
                    foreach ($list as $i => &$item) :
                        $class = 'item-' . $item->id;
                        if ($item->id == $active_id) {
                            $class .= ' current';
                        }

                        if (in_array($item->id, $path)) {
                            $class .= ' active';
                        } elseif ($item->type == 'alias') {
                            $aliasToId = $item->params->get('aliasoptions');
                            if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                                $class .= ' active';
                            } elseif (in_array($aliasToId, $path)) {
                                $class .= ' alias-parent-active';
                            }
                        }
                        if ($item->deeper) {
                            $class .= 'has-submenu';
                        }


                        if ($item->parent) {
                            $class .= ' parent';
                        }

                        if (!empty($class)) {
                            $class = ' class="' . trim($class) . '"';
                        }

                        echo '<li' . $class . '>';

                        // Render the menu item.
                        switch ($item->type) :
                            case 'separator':
                            case 'url':
                            case 'component':
                                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                                break;

                            default:
                                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                                break;
                        endswitch;

                        // The next item is deeper.
                        if ($item->deeper) {
                            echo '<ul class="submenu menu vertical" data-submenu>';
                        }
                        // The next item is shallower.
                        elseif ($item->shallower) {
                            echo '</li>';
                            echo str_repeat('</ul></li>', $item->level_diff);
                        }
                        // The next item is on the same level.
                        else {
                            echo '</li>';
                        }
                    endforeach;
                    ?></ul>
        </div>
    </div>
    <?php if ($stickyTopMenu == 1) {echo 
    '</div>' ;} ?> <!--sticky container -->
</div>

<div class="hide-for-medium" id="found-mobile-menu">
    
    <ul class="vertical menu" data-accordion-menu>
        <?php
        foreach ($list as $i => &$item) :
            $class = 'item-' . $item->id;
            $drop = false;
            if ($item->id == $active_id) {
                $class .= ' current';
            }

            if (in_array($item->id, $path)) {
                $class .= ' is-active';
            } elseif ($item->type == 'alias') {
                $aliasToId = $item->params->get('aliasoptions');
                if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                    $class .= ' is-active';
                } elseif (in_array($aliasToId, $path)) {
                    $class .= ' alias-parent-active';
                }
            }
            if ($item->deeper) {
                echo '<li><a>';
                $drop = true;
            }
            
            if ($item->parent) {
                $class .= ' parent';
            }

            if (!empty($class)) {
                $class = ' class="' . trim($class) . '"';
            }
            if (!$drop) {

                echo '<li' . $class . '>';
            }
            // Render the menu item.
            if($drop){
                require JModuleHelper::getLayoutPath('mod_menu', 'default_separator');
            }else{
            switch ($item->type) :
                case 'separator':
                case 'url':
                case 'component':
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                    break;

                default:
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                    break;
            endswitch;
            }
            // The next item is deeper. id="drop1" class="f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1"
            if ($item->deeper) {
                echo '</a><ul class="menu vertical nested">';
            }
            // The next item is shallower.
            elseif ($item->shallower) {
                echo '</li>';
                echo str_repeat('</ul></li>', $item->level_diff);
            }
            // The next item is on the same level.
            else {
                    echo '</li>';
            }
        endforeach;
        ?></ul>
</div>