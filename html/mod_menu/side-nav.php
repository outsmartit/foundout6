<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * 
 * Adapted for side navigation (accordion) for Foundation 6.
 * 
 */
defined('_JEXEC') or die;
?>

<!-- Left Nav Section -->
<ul class="vertical menu"  <?php echo $class_sfx; ?>"<?php
    $tag = '';
    if ($params->get('tag_id') != null) {
        $tag = $params->get('tag_id') . '';
        echo ' id="' . $tag . '"';
    }
    ?> data-accordion-menu>
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
                echo '<ul class="menu vertical nested">';
            }
            // The next item is shallower.
            elseif ($item->shallower) {
                echo '</li>';
                echo str_repeat('</ul></li>', $item->level_diff);
            }
            // The next item is on the same level.
            else {
                if ($drop) {
                    echo '</a>';
                } else {
                    echo '</li>';
                }
            }
        endforeach;
        ?></ul>
