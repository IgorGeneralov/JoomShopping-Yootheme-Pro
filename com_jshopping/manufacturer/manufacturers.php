<?php
/**
* @version      5.0.0 15.09.2018
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<div class="<?php print $this->params->get('pageclass_sfx');?>">
    <?php if ($this->params->get('show_page_heading') && $this->params->get('page_heading')) : ?>
    <h1 class="uk-h1">
        <?php print $this->params->get('page_heading')?>
    </h1>
    <?php endif; ?>

    <?php if (count($this->rows)) : ?>
    <div class="tm-grid-expand uk-grid-margin uk-grid" uk-height-match="target: .uk-card" uk-grid>
        <?php foreach ($this->rows as $k=>$row) : ?>
        <div class="uk-width-1-<?php echo $this->count_manufacturer_to_row?>@m uk-width-1-1 uk-width-1-2@s">
            <div class="uk-card uk-card-default uk-card-hover uk-card-small">
                <div class="uk-card-media-top uk-text-center">
                    <a href="<?php print $row->link;?>">
                        <div class="uk-inline-clip uk-transition-toggle">
                            <img lass="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_manufs_live_path;?>/<?php if ($row->manufacturer_logo) {
    print $row->manufacturer_logo;
} else {
    print $this->noimage;
}?>" alt="<?php print htmlspecialchars($row->name);?>" />
                        </div>
                    </a>
                </div>

                <div class="uk-card-body">
                    <div class="uk-h4">
                        <a class="el-content" href="<?php print $row->link?>">
                            <?php print $row->name?>
                        </a>
                    </div>
                    <div class="uk-margin uk-text-small">
                        <?php print $row->short_description?>
                    </div>
                </div>

                <?php if ($row->manufacturer_url != "") : ?>
                <div class="uk-card-footer uk-text-right">
                    <a target="_blank" href="<?php print $row->manufacturer_url?>">
                        <?php print JText::_('JSHOP_MANUFACTURER_INFO')?>
                        <span class="uk-icon" uk-icon="icon: sign-out;"></span>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="uk-margin uk-text-meta">
        <?php print $this->manufacturer->description?>
    </div>
</div>