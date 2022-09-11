<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php if ($this->header) {?>
<h1 class="uk-h1 listproduct<?php print $this->prefix;?>">
    <?php print $this->header?>
</h1>
<?php }?>

<?php if ($this->display_list_products) { ?>
<!-- Продукты -->
<?php
        include(dirname(__FILE__)."/../".$this->template_block_form_filter);

        if (count($this->rows)) {
            include(dirname(__FILE__)."/../".$this->template_block_list_product);
        } elseif ($this->willBeUseFilter) {
            include(dirname(__FILE__)."/../".$this->template_no_list_product);
        }
    ?>
<?php if ($this->display_pagination) {
        include(dirname(__FILE__)."/../".$this->template_block_pagination);
    } ?>
<?php }?>