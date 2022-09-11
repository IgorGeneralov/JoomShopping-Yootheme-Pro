<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<div class="uk-card uk-card-default uk-card-hover uk-card-small">
    <?php if ($product->image) {?>
    <div class="uk-card-media-top uk-text-center tm-img-product">
        <?php print $product->_tmp_var_image_block;?>

        <a href="<?php print $product->product_link?>">
            <div class="uk-inline-clip uk-transition-toggle">
                <img class="tm-image-card el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $product->image?>" alt="<?php print htmlspecialchars($product->name);?>" title="<?php print htmlspecialchars($product->name);?>" uk-img />

                <?php if ($product->label_id) {?>
                <div class="uk-card-badge uk-label">
                    <?php if ($product->_label_image) {?>
                    <img src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" />
                    <?php } else {?>
                    <span class="">
                        <?php print $product->_label_name;?>
                    </span>
                    <?php } ?>
                </div>
                <?php }?>
            </div>
        </a>
    </div>
    <?php }?>

    <div class="uk-card-body">
        <h4 class="uk-h4 uk-margin-remove-bottom">
            <a href="<?php print $product->product_link?>">
                <?php print $product->name?>
            </a>
        </h4>
        <?php if ($this->config->product_list_show_product_code) {?>
        <div class="uk-text-meta">
            (<?php print JText::_('JSHOP_EAN')?>:
            <span>
                <?php print $product->product_ean;?>
            </span>
            )
        </div>
        <?php }?>

        <?php if ($this->allow_review) {?>
        <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid" uk-grid="">
            <div class="el-item">
                <?php if (!$this->config->hide_product_rating) {?>
                <?php print \JSHelper::showMarkStar($product->average_rating);?>
                <?php }?>
            </div>
            <div>
                <?php print sprintf(JText::_('JSHOP_X_COMENTAR'), $product->reviews_count);?>
            </div>
        </div>
        <?php }?>

        <?php print $product->_tmp_var_bottom_foto;?>


        <!-- Подробнее о товаре -->
        <ul class="uk-list uk-margin-small">

            <?php if (!$this->config->hide_text_product_not_available) {?>
            <?php if ($product->product_quantity <=0) {?>
            <li class="el-item">
                <div class="uk-text-small">
                    <?php print JText::_('JSHOP_PRODUCT_NOT_AVAILABLE')?>
                </div>
                <?php } elseif (!$this->config->hide_text_product_available) {?>
                <div class="uk-text-small">
                    <?php print JText::_('JSHOP_PRODUCT_AVAILABLE')?>
                </div>
            </li>
            <?php }?>
            <?php }?>

            <?php if ($product->product_old_price > 0) {?>
            <li class="el-item uk-text-muted uk-margin-remove-top">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <del>
                        <?php print \JSHelper::formatprice($product->product_old_price)?>
                        <?php print $product->_tmp_var_old_price_ext?>
                    </del>
                </div>
            </li>
            <?php }?>

            <?php print $product->_tmp_var_bottom_old_price;?>

            <?php if ($product->product_price_default > 0 && $this->config->product_list_show_price_default) {?>
            <li class="el-item">
                <h3 class="uk-h3 uk-text-primary uk-margin-remove-bottom uk-margin-remove-top">
                    <?php print \JSHelper::formatprice($product->product_price_default)?>
                </h3>
            </li>
            <?php }?>

            <?php if ($product->_display_price) {?>
            <li class="el-item">
                <div class="uk-width-expand">
                    <?php
                    if ($this->config->product_list_show_price_description) {
                        print JText::_('JSHOP_PRICE').': ';
                    }?>
                    <?php
                    if ($product->show_price_from) {
                        print JText::_('JSHOP_FROM');
                    }?>
                    <span>
                        <span class="uk-h3 uk-text-primary uk-margin-remove-bottom uk-margin-remove-top">
                            <?php print \JSHelper::formatprice($product->product_price);?>
                        </span>
                        <?php print $product->_tmp_var_price_ext;?>
                    </span>
                </div>
            </li>
            <?php }?>

            <?php print $product->_tmp_var_bottom_price;?>


            <?php if ($this->config->show_tax_in_product && $product->tax > 0) {?>
            <li class="el-item uk-text-meta uk-margin-remove-top uk-margin-small">
                <?php print \JSHelper::productTaxInfo($product->tax);?>
                <?php }?>

                <?php if ($this->config->show_plus_shipping_in_product) {?>
                <span>
                    <?php print sprintf(JText::_('JSHOP_PLUS_SHIPPING'), $this->shippinginfo);?>
                </span>
            </li>
            <?php }?>

            <?php if ($product->basic_price_info['price_show']) {?>
            <li class="el-item uk-margin-small">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_BASIC_PRICE')?>:
                        </div>
                    </div>
                    <div>
                        <?php
                        if ($product->show_price_from && !$this->config->hide_from_basic_price) {
                            print JText::_('JSHOP_FROM');
                        }?>
                        <?php print \JSHelper::formatprice($product->basic_price_info['basic_price'])?> / <?php print $product->basic_price_info['name'];?>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if ($product->manufacturer->name) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_MANUFACTURER')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print $product->manufacturer->name?>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if ($this->config->manufacturer_code_in_product_list && $product->manufacturer_code) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_MANUFACTURER_CODE')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print $product->manufacturer_code?>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if ($this->config->product_list_show_weight && $product->product_weight > 0) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_WEIGHT')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print \JSHelper::formatweight($product->product_weight)?>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if ($product->delivery_time != '') {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_DELIVERY_TIME')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print $product->delivery_time?>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if (is_array($product->extra_field)) {?>
            <?php foreach ($product->extra_field as $extra_field) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print $extra_field['name'];?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print $extra_field['value'];?>
                    </div>
                </div>
            </li>
            <?php }?>
            <?php }?>

            <?php if ($product->vendor) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_VENDOR')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <a href="<?php print $product->vendor->products?>">
                            <?php print $product->vendor->shop_name?>
                        </a>
                    </div>
                </div>
            </li>
            <?php }?>

            <?php if ($this->config->product_list_show_qty_stock) {?>
            <li class="el-item uk-margin-remove">
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid" uk-grid>
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader>
                            <?php print JText::_('JSHOP_QTY_IN_STOCK')?>:
                        </div>
                    </div>
                    <div class="uk-text-small">
                        <?php print \JSHelper::sprintQtyInStock($product->qty_in_stock)?>
                    </div>
                </div>
            </li>
            <?php }?>

            <div class="uk-text-small">
                <?php print $product->short_description?>
            </div>
        </ul>
    </div>

    <?php print $product->_tmp_var_top_buttons;?>

    <div class="uk-card-footer uk-flex-bottom">
        <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid" uk-grid="">
            <div class="el-item">
                <span class="el-item">
                    <?php if ($product->buy_link) {?>
                    <div class="el-item">
                        <a class="el-content uk-button uk-button-primary uk-flex-inline uk-flex-center uk-flex-middle" href="<?php print $product->buy_link?>">
                            <?php print JText::_('JSHOP_BUY')?>
                        </a>
                    </div>
                    <?php }?>
                </span>
            </div>

            <div>
                <span class="el-item uk-margin-small-left">
                    <a class="el-content uk-button uk-button-link uk-flex-inline uk-flex-center uk-flex-middle" uk-tooltip="<?php print JText::_('JSHOP_DETAIL')?>" href="<?php print $product->product_link?>">
                        <span class="uk-icon" uk-icon="icon: question"></span>
                    </a>
                </span>
                <span class="el-item uk-margin-small-left">
                    <?php
                    $wish = JRoute::_('index.php?option=com_jshopping&controller=cart&task=add&to=wishlist&category_id=' .$product->category_id. '&product_id=' .$product->product_id. '');
                    ?>
                    <a uk-tooltip="<?php print JText::_('JSHOP_ADD_TO_WISHLIST')?>" class="uk-button uk-button-link" href="<?php print $wish?>">
                        <span class="uk-icon" uk-icon="icon: heart"></span>
                    </a>
                </span>
            </div>
        </div>

        <?php print $product->_tmp_var_buttons;?>
        <?php print $product->_tmp_var_bottom_buttons;?>

    </div>
</div>