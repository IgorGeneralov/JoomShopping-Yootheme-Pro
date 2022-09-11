<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<div class="uk-text-center">
    <h1 class="uk-h1">
        <?php print JText::_('JSHOP_LOGOUT')?>
    </h1>
    <?php print $this->checkout_navigator?>

    <input type="button" class="uk-button uk-button-default uk-button-large" value="<?php print JText::_('JSHOP_LOGOUT')?>" onclick="location.href='<?php print \JSHelper::SEFLink("index.php?option=com_jshopping&controller=user&task=logout"); ?>'" />
</div>