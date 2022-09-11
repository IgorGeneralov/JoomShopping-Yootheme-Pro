<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php if (count($this->demofiles)) {?>
<ul class="uk-list uk-list-collapse uk-margin-top">
    <?php foreach ($this->demofiles as $demo) {?>
    <li class="el-item">
        <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid="">
            <div class="uk-width-4-5 uk-text-break">
                <div class="el-title uk-margin-remove">
                    <?php print $demo->demo_descr?>
                </div>
            </div>

            <?php if ($this->config->demo_type == 1) { ?>
            <div class="uk-text-right">
                <div class="el-content uk-panel">
                    <a target="_blank" class="uk-button uk-button-default" href="<?php print $this->config->demo_product_live_path."/".$demo->demo;?>" uk-tooltip="" onClick="popupWin = window.open('<?php print \JSHelper::SEFLink("index.php?option=com_jshopping&controller=product&task=showmedia&media_id=".$demo->id);?>', 'video', 'width=<?php print $this->config->video_product_width;?>,height=<?php print $this->config->video_product_height;?>,top=0,resizable=no,location=no');
                popupWin.focus();
                    return false;">
                        <span class="uk-icon" uk-icon="icon: play;"></span>
                    </a>
                    <?php } else { ?>
                    <a target="_blank" class="uk-button uk-button-default" href="<?php print $this->config->demo_product_live_path."/".$demo->demo;?>" uk-tooltip="<?php print JText::_('JSHOP_DOWNLOAD')?>">
                        <?php print JText::_('JSHOP_DOWNLOAD')?>
                        <span class="uk-icon" uk-icon="icon:  download;"></span>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>
<?php } ?>