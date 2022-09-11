<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
$product = $this->product;
include(dirname(__FILE__)."/load.js.php");
?>
<form name="product" method="post" action="<?php print $this->action?>" enctype="multipart/form-data" autocomplete="off">
    <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid>
        <div class="uk-width-expand">
            <h1 class="uk-article-title uk-margin-small">
                <?php print $this->product->name?>
            </h1>
            <div class="uk-flex uk-flex-between uk-flex-middle uk-text-meta">
                <div class="el-item">
                    <?php if ($this->config->show_product_code) {?>
                    <span class="">
                        <?php print JText::_('JSHOP_EAN')?>:
                        <span id="product_code">
                            <?php print $this->product->getEan();?>
                        </span>
                    </span>
                    <?php } ?>
                </div>

                <?php print $this->_tmp_product_html_start;?>

                <div class="el-item uk-flex uk-flex-between uk-flex-middle ">
                    <?php include(dirname(__FILE__)."/ratingandhits.php");?>
                    <?php
                    if ($this->config->display_button_print) {
                        print \JSHelper::printContent();
                    } ?>
                </div>
            </div>
            <hr class="uk-margin-remove-top uk-margin-bottom">
        </div>
    </div>

    <div class="tm-grid-expand uk-grid-column-medium uk-grid-row-small uk-grid-margin uk-grid-stack" uk-grid>
        <!-- Изображения -->
        <div class="uk-width-2-3@m">
            <div class="uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid>
                <div class="tm-img-product">
                    <?php print $this->_tmp_product_html_before_image;?>

                    <?php print $this->_tmp_product_html_body_image?>

                    <?php if (!count($this->images)) {?>
                    <div class="uk-inline-clip uk-transition-toggle">
                        <img id="main_image" class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt="<?php print htmlspecialchars($this->product->name)?>" />
                    </div>
                    <?php } ?>

                    <?php foreach ($this->images as $k=>$image) {?>
                    <div class="uk-inline-clip uk-transition-toggle">
                        <a class="lightbox" id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" <?php if ($k!=0) {?>style="display:none" <?php } ?> title="<?php print htmlspecialchars($image->_title)?>">
                            <img id="main_image_<?php print $image->image_id?>" class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
                        </a>
                        <div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-small">
                            <?php print $this->product->name?>
                        </div>
                        <div class="uk-position-center">
                            <span class="uk-transition-fade uk-icon" uk-icon="icon: plus; ratio: 2"></span>
                        </div>

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
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div>
                    <?php if (count($this->videos)) {?>
                    <?php foreach ($this->videos as $k=>$video) {?>
                    <?php if ($video->video_code) { ?>
                    <div style="display:none" class="video_full" id="hide_video_<?php print $k?>">
                        <?php echo $video->video_code?>
                    </div>
                    <?php } else { ?>
                    <a style="display:none" class="video_full" id="hide_video_<?php print $k?>" href=""></a>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </div>

                <?php print $this->_tmp_product_html_after_image;?>


                <!-- Превью картинок -->
                <?php print $this->_tmp_product_html_before_image_thumb;?>

                <?php if ((count($this->images)>1) || (count($this->videos) && count($this->images))) {?>
                <div class="uk-margin-small-top">
                    <ul class="el-nav uk-thumbnav uk-flex-nowrap uk-flex-left uk-margin uk-visible@s" uk-margin="">
                        <?php foreach ($this->images as $k=>$image) {?>
                        <li>
                            <a onclick="jshop.showImage(<?php print $image->image_id?>)">
                                <div class="uk-inline-clip uk-transition-toggle">
                                    <canvas class="uk-background-cover null uk-transition-scale-up uk-transition-opaque" width="100" height="75" style="background-image: url(<?php print $this->image_product_path?>/<?php print $image->image_thumb?>)" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>">
                                    </canvas>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>

                <?php print $this->_tmp_product_html_after_image_thumb;?>
            </div>
        </div>

        <!-- Правая панель -->

        <div class="uk-width-1-3@m">
            <div class="uk-card uk-card-body uk-card-default uk-card-small uk-margin-remove-first-child uk-margin">
                <h2 class="el-title uk-card-title uk-margin-top uk-margin-remove-bottom">
                    <?php print JText::_('JSHOP_BUY')?> &#171;<?php echo $this->product->name; ?>&#187;
                </h2>
                <ul class="uk-list uk-margin-small">
                    <li class="uk-text-muted" <?php if ($this->product->product_old_price == 0) {?>style="display:none" <?php } ?>>
                        <del>
                            <?php print \JSHelper::formatprice($this->product->product_old_price)?>
                            <?php print $this->product->_tmp_var_old_price_ext;?>
                        </del>
                    </li>

                    <?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default) {?>
                    <li class="el-item uk-margin-remove-top">
                        <?php print JText::_('JSHOP_DEFAULT_PRICE')?>:
                        <span id="pricedefault" class="uk-h3 uk-text-primary uk-margin-remove-bottom uk-margin-remove-top">
                            <?php print \JSHelper::formatprice($this->product->product_price_default)?>
                        </span>
                    </li>
                    <?php } ?>

                    <?php print $this->_tmp_product_html_before_price;?>

                    <?php if ($this->product->_display_price) {?>
                    <li class="el-item uk-margin-remove-top">
                        <?php print JText::_('JSHOP_PRICE')?>:
                        <span id="block_price" class="uk-h3 uk-text-primary uk-margin-remove-bottom uk-margin-remove-top">
                            <?php print \JSHelper::formatprice($this->product->getPriceCalculate())?>
                            <?php print $this->product->_tmp_var_price_ext;?>
                        </span>
                    </li>
                    <?php } ?>

                    <?php print $this->product->_tmp_var_bottom_price;?>

                    <?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0) {?>
                    <li class="el-item uk-text-meta uk-margin-remove-top">
                        <?php print \JSHelper::productTaxInfo($this->product->product_tax);?>

                        <?php if ($this->config->show_plus_shipping_in_product) {?>
                        <?php print sprintf(JText::_('JSHOP_PLUS_SHIPPING'), $this->shippinginfo);?>
                        <?php }?>
                    </li>
                    <?php }?>

                    <?php if ($this->product->product_basic_price_show) {?>
                    <li class="el-item uk-margin-remove-top">
                        <?php print JText::_('JSHOP_BASIC_PRICE')?>:
                        <span id="block_basic_price">
                            <?php print \JSHelper::formatprice($this->product->product_basic_price_calculate)?>
                        </span>
                        / <?php print $this->product->product_basic_price_unit_name;?>
                    </li>
                    <?php }?>
                </ul>

                <?php print $this->product->_tmp_var_bottom_allprices;?>

                <!-- Характеристики продукта-->
                <?php if (isset($this->product->freeattributes) && count($this->product->freeattributes)) {?>
                <ul class="uk-list uk-margin-small">
                    <?php foreach ($this->product->freeattributes as $freeattribut) {?>
                    <li class="el-item">
                        <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-margin-top uk-grid" uk-grid="">
                            <div class="uk-width-expand row-free-attr-<?php print $freeattribut->id?>">
                                <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader="">
                                    <?php print $freeattribut->name;?>
                                </div>
                            </div>
                            <div class="uk-text-small">
                                <?php if ($freeattribut->required) {?>
                                <span>*</span>
                                <?php }?>
                                <span class="freeattribut_description">
                                    <?php print $freeattribut->description;?>
                                </span>
                            </div>
                        </div>

                        <div class="uk-text">
                            <?php print $freeattribut->input_field;?>
                        </div>
                    </li>
                    <?php }?>

                    <?php if ($this->product->freeattribrequire) {?>
                    <li class="uk-text">
                        * <?php print JText::_('JSHOP_REQUIRED')?>
                    </li>
                    <?php }?>
                </ul>
                <?php }?>

                <?php print $this->_tmp_product_html_after_freeatributes;?>

                <?php print $this->_tmp_product_html_before_atributes;?>

                <?php if (isset($this->attributes) && count($this->attributes)) : ?>
                <hr class="uk-margin-remove-bottom uk-margin-remove-top" />
                <ul class="uk-list uk-margin-small">
                    <?php foreach ($this->attributes as $attribut) : ?>
                    <?php if ($attribut->grshow) {?>
                    <!--strong class="uk-text-small">
                        <?php print $attribut->groupname?>
                    </strong-->
                    <?php }?>

                    <li class="el-item uk-margin-remove-top">
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin-small-bottom row-attr-<?php print $attribut->attr_id?>" uk-grid="">
                            <div class="uk-text-meta">
                                <?php print $attribut->attr_name?>:
                            </div>
                            <div class="uk-text-small uk-margin-remove-top">
                                <span id='block_attr_sel_<?php print $attribut->attr_id?>'>
                                    <?php print $attribut->selects?>
                                </span>
                            </div>
                        </div>

                        <div class="el-item">
                            <?php print $attribut->attr_description;?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php print $this->_tmp_product_html_after_atributes;?>

                <div class="el-content uk-panel uk-margin-small-top">
                    <?php if ($this->product->product_is_add_price) {?>
                    <div class="price_prod_qty_list_head">
                        <?php print JText::_('JSHOP_PRICE_FOR_QTY')?>
                    </div>
                    <table class="price_prod_qty_list">
                        <?php foreach ($this->product->product_add_prices as $k=>$add_price) {?>
                        <tr>
                            <td class="qty_from" <?php if ($add_price->product_quantity_finish==0) {?>colspan="3" <?php } ?>>
                                <?php
                                if ($add_price->product_quantity_finish==0) {
                                    print JText::_('JSHOP_FROM');
                                }?>
                                <?php print $add_price->product_quantity_start?>
                                <?php print $this->product->product_add_price_unit?>
                            </td>

                            <?php if ($add_price->product_quantity_finish > 0) {?>
                            <td class="qty_line"> - </td>
                            <?php } ?>

                            <?php if ($add_price->product_quantity_finish > 0) {?>
                            <td class="qty_to">
                                <?php print $add_price->product_quantity_finish?>
                                <?php print $this->product->product_add_price_unit?>
                            </td>
                            <?php } ?>

                            <td class="qty_price">
                                <span id="pricelist_from_<?php print $add_price->product_quantity_start?>">
                                    <?php print \JSHelper::formatprice($add_price->price)?><?php print $add_price->ext_price?>
                                </span>
                                <span class="per_piece">
                                    / <?php print $this->product->product_add_price_unit?>
                                </span>
                            </td>
                            <?php print $add_price->_tmp_var?>
                        </tr>
                        <?php }?>
                    </table>
                    <?php }?>

                    <?php if (!$this->config->hide_text_product_not_available) { ?>
                    <div class="uk-text-muted" id="not_available">
                        <?php print $this->available?>
                    </div>
                    <?php }?>

                    <?php print $this->_tmp_product_html_before_buttons;?>

                    <?php if (!$this->hide_buy) {?>
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin-top <?php print $this->displaybuttons?>" uk-grid="">
                        <div class="el-item">
                            <span class="el-item uk-margin-small-right tm-qty">
                                <input type="number" name="quantity" id="quantity" oninput="jshop.reloadPrices();" class="uk-input uk-form-width-small" value="<?php print $this->default_count_product?>" min="0">
                                <?php print $this->_tmp_qty_unit;?>
                            </span>
                            <span class="el-item">
                                <button type="submit" class="el-content uk-button uk-button-primary uk-flex-inline uk-flex-center uk-flex-middle" onclick="jQuery('#to').val('cart');">
                                    <?php print JText::_('JSHOP_ADD_TO_CART')?>
                                </button>
                            </span>
                        </div>

                        <div class="">
                            <?php if ($this->enable_wishlist) {?>
                            <span class="el-item uk-margin-small-left">
                                <button type="submit" class="uk-button uk-button-link" onclick="jQuery('#to').val('wishlist');" uk-tooltip="<?php print JText::_('JSHOP_ADD_TO_WISHLIST')?>">
                                    <span class="uk-icon" uk-icon="icon: heart"></span>
                                </button>
                            </span>
                            <?php }?>
                        </div>
                    </div>
                    <?php print $this->_tmp_product_html_buttons;?>
                    <?php }?>

                    <div id="jshop_image_loading" style="display:none"></div>

                    <?php print $this->_tmp_product_html_after_buttons;?>

                    <?php if ($this->config->product_show_qty_stock) {?>
                    <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-margin-top uk-grid" uk-grid="">
                        <div class="uk-width-expand">
                            <div class="el-title uk-margin-remove uk-text-meta uk-leader" uk-leader="">
                                <?php print JText::_('JSHOP_QTY_IN_STOCK')?>:
                            </div>
                        </div>
                        <div class="uk-text-small">
                            <?php print \JSHelper::sprintQtyInStock($this->product->qty_in_stock);?>
                        </div>
                    </div>
                    <?php }?>

                    <div class="uk-text-small uk-margin-top">
                        <?php print $product->short_description?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="to" id='to' value="cart" />
    <input type="hidden" name="product_id" id="product_id" value="<?php print $this->product->product_id?>" />
    <input type="hidden" name="category_id" id="category_id" value="<?php print $this->category_id?>" />

    <!-- Описание / Характеристики / Видео / Отзывы / Демо-файлы -->
    <div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid>
        <div class="uk-width-expand">
            <div class="uk-margin" uk-filter="target: .js-filter;">
                <ul class="el-nav uk-margin uk-tab" data-uk-tab="{connect:'#prod_tabcont'} animation: uk-animation-fade;">
                    <li class="active">
                        <a href="#">
                            <span class="uk-icon " uk-icon="icon: info;"></span>
                            <?php print JText::_('JSHOP_DESCRIPTION')?>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <span class="uk-icon" uk-icon="icon: list;"></span>
                            <?php print JText::_('JSHOP_CHARACTERISTICS')?>
                        </a>
                    </li>

                    <?php if (count($this->videos)) {?>
                    <li class="">
                        <a href="#">
                            <span class="uk-icon" uk-icon="icon: video-camera;"></span>
                            <?php print JText::_('JSHOP_TABS_VIDEO')?>
                        </a>
                    </li>
                    <?php }?>

                    <li class="">
                        <a href="#">
                            <span class="uk-icon" uk-icon="icon: comments;"></span>
                            <?php print JText::_('JSHOP_REVIEWS')?>
                        </a>
                    </li>

                    <?php if (count($this->demofiles)) {?>
                    <li class="">
                        <a href="#">
                            <span class="uk-icon" uk-icon="icon: copy;"></span>
                            <?php print JText::_('JSHOP_DEMO')?>
                        </a>
                    </li>
                    <?php }?>
                </ul>

                <ul class="uk-switcher uk-margin" style="touch-action: pan-y pinch-zoom;">
                    <!-- Описание -->
                    <li class="el-item">
                        <div class="tm-grid-expand uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
                            <div>
                                <h3 class="el-title uk-margin-remove-bottom"><?php print JText::_('JSHOP_DESCRIPTION')?></h3>
                                <div class="uk-panel uk-margin">
                                    <?php print $this->product->description; ?>

                                    <?php if ($this->product->product_url!="") {?>
                                    <div class="el-content uk-panel uk-margin-top uk-text-right">
                                        <a target="_blank" class="uk-button uk-button-default" href="<?php print $this->product->product_url;?>">
                                            <?php print JText::_('JSHOP_READ_MORE')?>
                                            <span class="uk-icon" uk-icon="icon: forward"></span>
                                        </a>
                                    </div>
                                    <?php }?>
                                </div>

                                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin uk-width-xlarge">
                                    <div class="uk-child-width-expand uk-grid-column-small uk-grid" uk-grid="">
                                        <div class="uk-width-1-4@m">
                                            <?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!="") {?>
                                            <a href="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
                                                <img src="<?php print $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
                                            </a>
                                            <?php }?>
                                        </div>

                                        <div>
                                            <?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!="") {?>
                                            <h4 class="el-title uk-h4 uk-text-primary uk-margin-remove-bottom">
                                                <?php print JText::_('JSHOP_MANUFACTURER')?>:
                                                <span>
                                                    <?php print $this->product->manufacturer_info->name?>
                                                </span>
                                            </h4>
                                            <?php }?>
                                            <div class="el-meta uk-text-meta">
                                                <?php print JText::_('JSHOP_MANUFACTURER_CODE')?>:
                                                <span id="manufacturer_code">
                                                    <?php print $this->product->getManufacturerCode()?>
                                                </span>
                                            </div>
                                            <div class="el-content uk-panel uk-text-meta uk-margin-top">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a dignissim mauris. Duis tincidunt dignissim molestie. Vestibulum a nulla interdum, fermentum augue non, iaculis massa. Proin interdum luctus orci, eu porttitor lorem tincidunt et.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Характеристики -->
                    <li class="el-item">
                        <h3 class="el-title uk-margin-top uk-margin-remove-bottom"><?php print JText::_('JSHOP_CHARACTERISTICS')?></h3>
                        <?php if (is_array($this->product->extra_field)) {?>
                        <ul class="uk-list uk-list-collapse uk-margin-top">
                            <?php foreach ($this->product->extra_field as $extra_field) {?>
                            <li class="el-item">
                                <?php if ($extra_field['grshow']) {?>
                                <div>
                                    <strong>
                                        <?php print $extra_field['groupname']?>
                                    </strong>
                                </div>
                                <?php }?>
                                <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-medium uk-text-break">
                                        <div class="el-title uk-margin-remove" uk-leader>
                                            <?php print $extra_field['name'];?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="el-content uk-panel">
                                            <?php if ($extra_field['description']) {?>
                                            <span class="extra_fields_description">
                                                <?php print $extra_field['description'];?>:
                                            </span>
                                            <?php } ?>
                                            <span class="extra_fields_value">
                                                <?php print $extra_field['value'];?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                        <?php }?>

                        <?php print $this->_tmp_product_html_after_ef;?>

                        <?php if ($this->product->delivery_time != '') {?>
                        <div class="el-content uk-panel uk-margin-top" <?php if ($product->hide_delivery_time) {?>style="display:none" <?php }?>>
                            <ul class="uk-list uk-list-collapse uk-margin-top">
                                <li class="el-item">
                                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid="">
                                        <div class="uk-width-medium uk-text-break">
                                            <div class="el-title uk-margin-remove" uk-leader>
                                                <?php print JText::_('JSHOP_DELIVERY_TIME')?>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="el-content uk-panel">
                                                <?php print $this->product->delivery_time?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php }?>

                        <?php if ($this->config->product_show_weight && $this->product->product_weight > 0) {?>
                        <ul class="uk-list uk-list-collapse uk-margin-top">
                            <li class="el-item">
                                <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-medium uk-text-break">
                                        <div class="el-title uk-margin-remove" uk-leader>
                                            <?php print JText::_('JSHOP_WEIGHT')?>:
                                        </div>
                                    </div>
                                    <div>
                                        <div class="el-content uk-panel">
                                            <?php print \JSHelper::formatweight($this->product->getWeight())?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php }?>

                        <?php if ($this->product->vendor_info) {?>
                        <ul class="uk-list uk-list-collapse uk-margin-top">
                            <li class="el-item">
                                <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-medium uk-text-break">
                                        <div class="el-title uk-margin-remove" uk-leader>
                                            <?php print JText::_('JSHOP_VENDOR')?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="el-content uk-panel">
                                            <a href="<?php print $this->product->vendor_info->urlinfo?>">
                                                <?php print $this->product->vendor_info->shop_name?> / <?php print $this->product->vendor_info->l_name." ".$this->product->vendor_info->f_name;?>
                                            </a>
                                            <span>
                                                <a class="uk-button uk-button-text" href="<?php print $this->product->vendor_info->urllistproducts?>">
                                                    <?php print JText::_('JSHOP_VIEW_OTHER_VENDOR_PRODUCTS')?>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php }?>
                    </li>

                    <!-- Видео -->
                    <?php if (count($this->videos)) {?>
                    <li class="el-item">
                        <h3 class="el-title uk-margin-top uk-margin-remove-bottom">
                            <?php print JText::_('JSHOP_TABS_VIDEO')?>
                        </h3>
                        <div class="el-content uk-panel uk-margin-top">
                            <?php if (count($this->videos)) {?>
                            <?php foreach ($this->videos as $k=>$video) {?>
                            <?php if ($video->video_code) { ?>
                            <a href="#" id="video_<?php print $k?>" onclick="jshop.showVideoCode(this.id);return false;">
                                <img class="" src="<?php print $this->video_image_preview_path."/";
                                    if ($video->video_preview) {
                                        print $video->video_preview;
                                    } else {
                                        print 'video.gif';
                                    }?>" alt="video" />
                            </a>
                            <?php } else { ?>
                            <video src="<?php print $this->video_product_path?>/<?php print $video->video_name?>" width="<?php print $this->config->video_product_width;?>" height="<?php print $this->config->video_product_height;?>" loop controls playsinline uk-video="autoplay: inview"></video>
                            <?php } ?>
                            <?php } ?>
                            <?php }?>

                            <?php print $this->_tmp_product_html_after_video;?>

                        </div>
                    </li>
                    <?php }?>

                    <!-- Отзывы -->
                    <li class="el-item">
                        <?php print $this->_tmp_product_html_before_review; ?>

                        <div class="el-content uk-panel uk-margin-top">
                            <?php include(dirname(__FILE__)."/review.php"); ?>
                        </div>
                    </li>

                    <!-- Демо файлы -->
                    <?php if (count($this->demofiles)) {?>
                    <li class="el-item">
                        <?php print $this->_tmp_product_html_before_demofiles; ?>

                        <div class="el-content uk-panel uk-margin-top">
                            <?php include(dirname(__FILE__)."/demofiles.php");?>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</form>

<div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid>
    <?php if (count($this->related_prod)) {?>
    <div class="uk-width-expand">
        <?php
            print $this->_tmp_product_html_before_related;
            include(dirname(__FILE__)."/related.php");
            ?>
    </div>
    <?php } ?>

    <?php print $this->_tmp_product_html_end;?>

</div>
<?php if ($this->config->product_show_button_back) {?>
<div class="uk-width-expand uk-margin-top">
    <button class="uk-button uk-button-default" type="button" value="" onclick="<?php print $this->product->button_back_js_click;?>">
        <span class="uk-icon" uk-icon="icon: chevron-double-left"></span>
        <?php print JText::_('JSHOP_BACK')?>
    </button>
</div>
<?php }?>
<!-- Модальное окно -->
<div id="my-shipping" uk-modal>
    <button class="uk-modal-close" type="button"></button>
</div>