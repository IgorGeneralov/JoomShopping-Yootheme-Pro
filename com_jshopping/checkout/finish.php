<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php if (!empty($this->text)) {?>
<?php echo $this->text;?>
<?php } else {?>
<div>
    <?php print JText::_('JSHOP_THANK_YOU_ORDER')?>
</div>
<?php }?>

<div class="tm-grid-expand uk-margin uk-grid-margin uk-grid-divider uk-grid  uk-grid-stack" uk-grid>
    <div class="uk-width-1-1">
        <hr />
        <a class="uk-button uk-button-secondary" href="<?php print $this->href_shop ?>">
            <span class="uk-icon" uk-icon="icon: chevron-double-left"></span>
            <?php print _JSHOP_BACK_TO_SHOP ?>
        </a>
    </div>
</div>