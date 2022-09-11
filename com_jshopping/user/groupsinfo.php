<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<h1 class="uk-h1">
    <?php print JText::_('JSHOP_USER_GROUPS_INFO')?>
</h1>

<?php echo $this->_tmpl_start?>
<div class="uk-width-1-3@m">
    <div class="uk-card uk-card-body uk-card-default uk-card-small uk-margin-remove-first-child uk-margin">
        <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-margin-top uk-grid" uk-grid="">
            <div class="uk-width-expand">
                <div class="el-title uk-margin-remove uk-text-meta">
                    <span class="uk-leader-fill">
                        <?php print JText::_('JSHOP_TITLE')?>
                    </span>
                </div>
            </div>
            <div class="uk-text-meta">
                <?php print JText::_('JSHOP_DISCOUNT')?>
            </div>
        </div>
        <?php foreach ($this->rows as $row) : ?>
            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-margin-top uk-grid" uk-grid="">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-leader-fill">
                            <?php print $row->name?>
                        </span>
                    </div>
                </div>
                <div>
                    <?php print floatval($row->usergroup_discount)?>%
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php echo $this->_tmpl_end?>