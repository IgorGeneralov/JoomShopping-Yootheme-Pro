<?php
/**
* @version      5.0.0 15.09.2018
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<?php if (($this->allow_review && !$this->config->hide_product_rating) || $this->config->show_hits) {?>
<div class="uk-flex">
    <?php if ($this->config->show_hits) {?>
    <div class="uk-margin-small-left">
        <?php print JText::_('JSHOP_HITS')?>:
        <span><?php print $this->product->hits;?></span>
    </div>
    <?php } ?>

    <?php if (($this->allow_review && !$this->config->hide_product_rating) && $this->config->show_hits) {?>
    <span class="uk-margin-small-left"> | </span>
    <?php } ?>

    <?php if ($this->allow_review && !$this->config->hide_product_rating) {?>
    <div class="uk-margin-small-left uk-flex">
        <?php print JText::_('JSHOP_RATING')?>:
        <span class="uk-margin-small-left">
            <?php print \JSHelper::showMarkStar($this->product->average_rating);?>
        </span>
    </div>
    <?php } ?>
</div>
<?php } ?>