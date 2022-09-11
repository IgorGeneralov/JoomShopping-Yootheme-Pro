<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>

<form action="<?php print $this->action;?>" method="post" name="sort_count" id="sort_count" class="uk-form uk-form-horizontal uk-panel">
    <div class="tm-grid-expand uk-grid-column-small uk-margin uk-grid uk-margin-small-bottom" uk-grid>
        <div class="uk-width-1-5@m tm-filter">
            <?php if ($this->config->show_sort_product || $this->config->show_count_select_products) : ?>
            <?php if ($this->config->show_sort_product) : ?>
            <div class="uk-child-width-expand uk-grid-small" uk-grid="">
                <div class="uk-width-small uk-text-break">
                    <div class="el-title">
                        <?php print JText::_('JSHOP_ORDER_BY');?>:
                    </div>
                </div>
                <div>
                    <div class="el-content uk-panel">
                        <?php echo $this->sorting?>
                        <span class="" id="submit_product_list_filter_sort_dir">
                            <?php if ($this->orderby==1) {?>
                            <span uk-icon="chevron-down"></span>
                            <?php } else {?>
                            <span uk-icon="chevron-up"></span>
                            <?php }?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="uk-width-2-5@m tm-filter uk-flex">
            <?php if ($this->config->show_count_select_products) : ?>
            <div class="uk-child-width-expand uk-grid-small uk-grid uk-margin-remove-top uk-margin-right" uk-grid="">
                <div class="uk-width-small uk-text-break">
                    <div class="el-title">
                        <?php print JText::_('JSHOP_DISPLAY_NUMBER').": "; ?>
                    </div>
                </div>
                <div>
                    <div class="el-content uk-panel">
                        <?php echo $this->product_count?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($this->pagination_obj) && $this->config->product_list_pagination_result_counter) {?>
            <div class="uk-text-muted">
                <?php print $this->pagination_obj->getResultsCounter()?>
            </div>
            <?php }?>
        </div>

        <div class="uk-width-1-5@m uk-text-right@m">
            <?php if ($this->config->show_product_list_filters && $this->filter_show) : ?>
            <button uk-toggle=" target: #my-filters" type="button" class="uk-button uk-button-default">
                <span uk-icon="icon: settings;" class="uk-icon"></span>
            </button>
            <?php endif; ?>
        </div>

        <input type="hidden" name="orderby" id="orderby" value="<?php print $this->orderby?>">
        <input type="hidden" name="limitstart" value="0">
    </div>

    <!-- Off-canvas filters -->
    <div id="my-filters" uk-offcanvas="overlay: true; flip: true; width:600px;">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <div class="uk-grid-item-match uk-width-1-2@m">
                <div class="uk-title uk-h3">
                    <?php print JText::_('JSHOP_FILTERS')?>
                </div>
                <div class="uk-grid-small uk-margin-small uk-child-width-expand uk-grid" uk-grid>
                    <?php if ($this->filter_show_category) : ?>
                    <div class="uk-width-auto@s uk-margin-small">
                        <fieldset class="uk-fieldset tm-filter">
                            <label class="uk-text-meta uk-form-label">
                                <?php print JText::_('JSHOP_CATEGORY').": "; ?>
                            </label>
                            <div class="uk-form-controls">
                                <?php echo $this->categorys_sel?>
                            </div>
                        </fieldset>
                    </div>
                    <?php endif; ?>

                    <?php if ($this->filter_show_manufacturer) : ?>
                    <div class="uk-width-auto@s uk-margin-small">
                        <fieldset class="uk-fieldset tm-filter">
                            <label class="uk-text-meta uk-form-label">
                                <?php print JText::_('JSHOP_MANUFACTURER').": "; ?>
                            </label>
                            <div class="uk-form-controls">
                                <?php echo $this->manufacuturers_sel; ?>
                            </div>
                        </fieldset>
                    </div>
                    <?php endif; ?>

                    <?php print $this->_tmp_ext_filter_box;?>

                    <?php if (\JSHelper::getDisplayPriceShop()) : ?>
                    <div class="uk-width-auto@s">
                        <fieldset class="uk-fieldset tm-filter">
                            <label class="uk-text-meta uk-form-label">
                                <?php print JText::_('JSHOP_PRICE')?> (<?php print $this->config->currency_code?>):
                            </label>
                            <div class="uk-form-controls">
                                <div class="uk-flex-inline">
                                    <input type="text" class="uk-input uk-form-width-small uk-margin-small-right" name="fprice_from" id="price_from" size="7" placeholder="<?php print \JText::_('JSHOP_FROM')?>" value="<?php if ($this->filters['price_from']>0) {
    print $this->filters['price_from'];
}?>" />
                                    <span uk-icon="icon: more;" class="uk-icon" style="width: 20px;height: 20px;padding-top: 10px;"></span>
                                    <input type="text" class="uk-input uk-form-width-small uk-margin-small-left" name="fprice_to" id="price_to" size="7" placeholder="<?php print \JText::_('JSHOP_TO')?>" value="<?php if ($this->filters['price_to']>0) {
    print $this->filters['price_to'];
}?>" />
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <?php print $this->_tmp_ext_filter;?>
                </div>
            </div>

            <?php if ($this->config->show_sort_product || $this->config->show_count_select_products) : ?>
            <div class="uk-margin"></div>
            <?php endif; ?>

            <div class="uk-grid-small uk-margin-small uk-child-width-expand@s uk-grid" uk-grid="">
                <div class="uk-width-auto@s">
                    <button class="el-button uk-button uk-button-primary" id="submit_product_list_filter">
                        <?php print JText::_('JSHOP_GO')?>
                        <span class="uk-margin-small-left uk-icon" uk-icon="search"></span>
                    </button>
                </div>

                <div class="uk-flex-middle uk-grid-small uk-flex-right uk-grid">
                    <span class="uk-margin-small-right">
                        <button href="#" class="el-button uk-button uk-button-secondary" id="clear_product_list_filter">
                            <?php print JText::_('JSHOP_CLEAR_FILTERS')?>
                        </button>
                    </span>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <hr class="uk-margin-remove" />
</form>