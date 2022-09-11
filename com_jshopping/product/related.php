<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
$in_row=$this->config->product_count_related_in_row;
?>
<?php if (count($this->related_prod)) {?>
    <h3 class="h3 uk-heading-line uk-margin-remove-bottom">
        <?php print JText::_('JSHOP_RELATED_PRODUCTS')?>
    </h3>
    <div class="tm-grid-expand uk-grid-margin uk-grid" uk-height-match="target: .uk-card" uk-grid>
        <?php foreach ($this->related_prod as $k=>$product) : ?>
        <div class="uk-width-1-<?php echo $in_row?>@m">
            <?php include(dirname(__FILE__)."/../".$this->folder_list_products."/".$product->template_block_product);?>
        </div>
        <?php endforeach; ?>
    </div>
<?php }?>
