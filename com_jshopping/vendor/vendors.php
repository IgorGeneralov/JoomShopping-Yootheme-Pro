<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<div class="<?php print $this->params->get('pageclass_sfx');?>">
    <?php if ($this->params->get('show_page_title') && $this->params->get('page_title')) : ?>
    <?php print $this->params->get('page_title')?>
    <?php endif; ?>

    <?php if (count($this->rows)) : ?>
    <div class="tm-grid-expand uk-grid-column-medium uk-grid-row-medium uk-margin uk-grid" uk-height-match="target: .uk-card" uk-grid>
        <?php foreach ($this->rows as $k=>$row) : ?>
        <div class="uk-width-1-<?php echo $this->count_to_row?>@m">
            <div class="uk-card uk-card-default uk-card-hover uk-card-small">
                <div class="uk-card-media-top uk-text-center">
                    <a href="<?php print $row->link?>">
                        <div class="uk-inline-clip uk-transition-toggle">
                            <img class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $row->logo;?>" alt="<?php print htmlspecialchars($row->shop_name);?>" />
                        </div>
                    </a>
                </div>
                <div class="uk-card-body">
                    <div class="uk-h4">
                        <a class="el-content" href="<?php print $row->link?>">
                            <?php print $row->shop_name?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if ($this->display_pagination) : ?>
        <div class="uk-width-1-1">
            <?php print $this->pagination?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif;  ?>
</div>