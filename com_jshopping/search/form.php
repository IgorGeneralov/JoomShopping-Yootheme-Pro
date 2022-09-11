<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
use Joomla\Component\Jshopping\Site\Helper\Selects;

defined('_JEXEC') or die();

?>
<div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid>
    <h1 class="uk-h1">
        <?php print JText::_('JSHOP_SEARCH')?>
    </h1>

    <form action="<?php print $this->action?>" name="form_ad_search" method="<?php print $this->config->search_form_method?>" class="uk-form-horizontal">
        <?php if ($this->config->search_form_method=='get') {?>
        <input type="hidden" name="option" value="com_jshopping">
        <input type="hidden" name="controller" value="search">
        <input type="hidden" name="task" value="result">
        <?php } ?>

        <input type="hidden" name="setsearchdata" value="1">
        <?php print $this->_tmp_ext_search_html_start;?>

        <fieldset class="uk-fieldset">
            <div>
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_TEXT')?>
                </label>
                <div class="uk-form-controls">
                    <input type="text" name="search" class="uk-input uk-form-width-large" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_FOR')?>
                </label>
                <div class="uk-form-controls">
                    <span>
                        <input class="uk-radio uk-margin-small-left" type="radio" name="search_type" value="any" id="search_type_any" checked="checked" />
                        <span class="uk-margin-small-left">
                            <?php print JText::_('JSHOP_ANY_WORDS')?>
                        </span>
                    </span>
                    <span class="uk-margin-small-left">
                        <input class="uk-radio uk-margin-small-left" type="radio" name="search_type" value="all" id="search_type_all" />
                        <span class="uk-margin-small-left">
                            <?php print JText::_('JSHOP_ALL_WORDS')?>
                        </span>
                    </span>
                    <span class="uk-margin-small-left">
                        <input class="uk-radio uk-margin-small-left" type="radio" name="search_type" value="exact" id="search_type_exact" />
                        <span class="uk-margin-small-left">
                            <?php print JText::_('JSHOP_EXACT_WORDS')?>
                        </span>
                    </span>
                </div>
            </div>
        </fieldset>

        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_CATEGORIES')?>
                </label>
                <div class="uk-form-controls">
                    <options>
                        <?php print Selects::getSearchCategory(null, 'class="uk-select uk-form-width-medium el-input"');?>
                    </options>
                    <input class="uk-checkbox uk-margin-left" type="checkbox" name="include_subcat" id="include_subcat" value="1" />
                    <span class="uk-margin-small-left">
                        <?php print JText::_('JSHOP_SEARCH_INCLUDE_SUBCAT')?>
                    </span>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_MANUFACTURERS')?>
                </label>
                <div class="uk-form-controls">
                    <options>
                        <?php print Selects::getManufacturer(null, 'class="uk-select uk-form-width-medium el-input"');?>
                    </options>
                </div>
            </div>
        </fieldset>

        <?php if (\JSHelper::getDisplayPriceShop()) {?>
        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <label class="uk-form-label"></label>
                <div class="uk-form-controls">
                    <input type="text" class="el-input uk-input uk-form-width-small" name="price_from" id="price_from" placeholder="<?php print JText::_('JSHOP_SEARCH_PRICE_FROM')?>" />
                    <span class="uk-margin-small-left" uk-icon="more"></span>
                    <span class="uk-margin-small-left">
                        <input type="text" class="el-input uk-input uk-form-width-small" name="price_to" id="price_to" placeholder="<?php print JText::_('JSHOP_SEARCH_PRICE_TO')?>" />
                    </span>
                    <span class="uk-text-meta">
                        (<?php print $this->config->currency_code?>)
                    </span>
                </div>
            </div>
        </fieldset>

        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_DATE_FROM')?>
                </label>
                <div class="uk-form-controls uk-form-width-medium">
                    <?php echo \JHTML::_('calendar', '', 'date_from', 'date_from', '%d-%m-%Y', array('class'=>'uk-input')); ?>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php print JText::_('JSHOP_SEARCH_DATE_TO')?>
                </label>
                <div class="uk-form-controls uk-form-width-medium">
                    <?php echo \JHTML::_('calendar', '', 'date_to', 'date_to', '%d-%m-%Y', array('class'=>'uk-input')); ?>
                </div>
            </div>
        </fieldset>

        <div class="uk-margin uk-margin-small" id="list_characteristics">
            <?php print $this->characteristics?>
        </div>

        <?php print $this->_tmp_ext_search_html_end;?>

        <?php }?>

        <div class="uk-margin">
            <button input type="submit" class="uk-button uk-button-primary">
                <?php print JText::_('JSHOP_SEARCH')?>
                <span class="uk-margin-small-left uk-icon" uk-icon="search"></span>
            </button>
        </div>
    </form>
</div>