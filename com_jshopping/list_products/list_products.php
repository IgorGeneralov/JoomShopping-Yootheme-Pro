<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<?php print $this->_tmp_list_products_html_start?>
<div class="tm-grid-expand uk-grid-column-medium uk-grid-row-medium uk-margin uk-margin-medium-top uk-grid" uk-height-match="target: .uk-card" uk-grid>
<?php foreach ($this->rows as $k=>$product) : ?>
    <div class="uk-width-1-<?php echo $this->count_product_to_row;?>@m uk-width-1-1 uk-width-1-2@s">
        <?php include(dirname(__FILE__)."/".$product->template_block_product);?>
    </div>
<?php endforeach; ?>
</div>
<?php print $this->_tmp_list_products_html_end;?>
