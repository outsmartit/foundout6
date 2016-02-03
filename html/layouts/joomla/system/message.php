<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$msgList = $displayData['msgList'];
?>
<div id="system-message-container">
    <?php if (is_array($msgList) && !empty($msgList)) : ?>
        <div id="system-message">
            <?php foreach ($msgList as $type => $msgs) : ?>
                <?php
                if (!$type) {
                    $classtype = 'success';
                }
                elseif ($type == "message") {
                    $classtype = "secondary";
                }else{
                    $classtype = $type;
                }
                ?>
                <div class="callout <?php echo $classtype; ?>" data-closable>

                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>

        <?php if (!empty($msgs)) : ?>
                        <h4><?php echo JText::_($type); ?></h4>
                        <div>
                            <?php foreach ($msgs as $msg) : ?>
                                <p><?php echo $msg; ?></p>
                        <?php endforeach; ?>
                        </div>
                <?php endif; ?>
                </div>
        <?php endforeach; ?>
        </div>
<?php endif; ?>
</div>
