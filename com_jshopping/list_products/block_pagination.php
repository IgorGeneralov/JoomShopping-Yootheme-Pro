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
<!-- Нумерация страниц -->
<div class="tm_pagination">
    <div class="uk-text-center">
        <?php print $this->pagination?>
    </div>
    <?php if (isset($this->pagination_obj) && $this->config->product_list_pagination_result_counter) {?>
    <!--div class="uk-text-muted uk-text-center">
        <?php print $this->pagination_obj->getResultsCounter()?>
    </div-->
    <?php }?>
</div>