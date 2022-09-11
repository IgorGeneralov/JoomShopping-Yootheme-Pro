<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<div class="tm-grid-expand uk-margin-left uk-margin uk-grid tm-checkout-menu">
    <ul class="uk-subnav uk-subnav-divider" uk-margin="">
        <?php foreach ($this->steps as $k=>$step) {?>
        <li class="el-item <?php print $this->cssclass[$k]?>">
            <?php print $step;?>
        </li>
      <?php }?>
    </ul>
</div>
