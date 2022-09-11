<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<h1 class="uk-h1">
    <?php print $this->vendor->shop_name?>
</h1>

<?php if ($this->display_list_products) { ?>
<div class="tm-grid-expand uk-child-width-1-1 uk-margin-small uk-grid-margin uk-grid uk-grid-stack" uk-grid uk-height-match="target: .uk-card">
    <?php
        include(dirname(__FILE__)."/../".$this->template_block_form_filter);
        if (count($this->rows)) {
            include(dirname(__FILE__)."/../".$this->template_block_list_product);
        } else {
            include(dirname(__FILE__)."/../".$this->template_no_list_product);
        }
    ?>
</div>
<?php
    if ($this->display_pagination) {
        include(dirname(__FILE__)."/../".$this->template_block_pagination);
    }
    ?>
<?php }?>