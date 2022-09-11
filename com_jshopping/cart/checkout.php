<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<div class="jshop tm-grid-expand uk-margin-remove-bottom uk-grid-column-medium uk-grid-row-large uk-margin uk-grid" uk-grid>
    <div class="uk-width-1-1 uk-panel">
        <table class="uk-table uk-table-striped uk-table-divider">
            <tbody>
                <?php $i=1; foreach ($this->products as $key_id=>$prod) {
    echo $prod['_tmp_tr_before']; ?>
                <tr>
                    <td>
                        <div class="tm-grid-expand uk-grid-row-small uk-grid-divider uk-grid-margin-small uk-grid" uk-grid>
                            <div class="uk-grid-item-match uk-flex-middle uk-width-1-1@s uk-width-3-5@m">
                                <div class="uk-panel uk-margin">
                                    <div class="uk-child-width-expand uk-grid-column-small uk-grid" uk-grid>
                                        <div class="uk-width-2-5@m">
                                            <a class="" href="<?php print $prod['href']; ?>">
                                                <img src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) {
        print $prod['thumb_image'];
    } else {
        print $this->no_image;
    } ?>" alt="<?php print htmlspecialchars($prod['product_name']); ?>" />
                                            </a>
                                        </div>

                                        <div class="">
                                            <div>
                                                <a class="uk-h4" href="<?php print $prod['href']?>">
                                                    <?php print $prod['product_name']?>
                                                </a>
                                                <br />
                                                <?php if ($this->config->show_product_code_in_cart) {?>
                                                <span class="uk-text-meta">
                                                    (<?php print $prod['ean']?>)
                                                </span>
                                                <?php } ?>
                                            </div>

                                            <div class="uk-margin uk-margin-small">
                                                <?php print $prod['_ext_product_name'] ?>
                                                <?php if ($prod['manufacturer']!='') {?>
                                                <div class="uk-text">
                                                    <?php print JText::_('JSHOP_MANUFACTURER')?>:
                                                    <span class="uk-text-meta">
                                                        <?php print $prod['manufacturer']?>
                                                    </span>
                                                </div>
                                                <?php } ?>

                                                <?php if ($this->config->manufacturer_code_in_cart && $prod['manufacturer_code']) {?>
                                                <div class="uk-text">
                                                    <?php print JText::_('JSHOP_MANUFACTURER_CODE')?>:
                                                    <span class="uk-text-meta">
                                                        <?php print $prod['manufacturer_code'] ?>
                                                    </span>
                                                </div>
                                                <?php } ?>
                                                <?php print \JSHelper::sprintAtributeInCart($prod['attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeAtributeInCart($prod['free_attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeExtraFiledsInCart($prod['extra_fields']); ?>
                                                <?php print $prod['_ext_attribute_html']?>
                                                <?php if ($this->config->show_delivery_time_step5 && $prod['delivery_times_id']) {?>
                                                <div class="uk-text">
                                                    <span class="uk-text-meta">
                                                        <?php print JText::_('JSHOP_DELIVERY_TIME')?>:
                                                    </span>
                                                    <?php print $this->deliverytimes[$prod['delivery_times_id']]?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-price">
                                <div class="tm-single_price uk-margin-bottom">
                                    <span class="price">
                                        <?php print \JSHelper::formatprice($prod['price'])?>
                                    </span>
                                    <?php print $prod['_ext_price_html']?>

                                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0) {?>
                                    <br>
                                    <span class="uk-text-meta">
                                        <?php print \JSHelper::productTaxInfo($prod['tax']);?>
                                    </span>
                                    <?php } ?>

                                    <?php if ($this->config->cart_basic_price_show && $prod['basicprice']>0) {?>
                                    <div class="basic_price">
                                        <?php print JText::_('JSHOP_BASIC_PRICE')?>:
                                        <span>
                                            <?php print \JSHelper::sprintBasicPrice($prod);?>
                                        </span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-quantity">
                                <div class="data">
                                    <span class="qtyval">
                                        <?php print $prod['quantity']?>
                                    </span>
                                    <?php print $prod['_qty_unit']; ?>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-price">
                                <div class="tm-single_price uk-margin-bottom">
                                    <?php print \JSHelper::formatprice($prod['price']*$prod['quantity']); ?>
                                    <?php print $prod['_ext_price_total_html']?>
                                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0) {?>
                                    <br>
                                    <span class="uk-text-meta">
                                        <?php print \JSHelper::productTaxInfo($prod['tax']);?>
                                    </span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php echo $prod['_tmp_tr_after'];
    $i++;
} ?>
        </table>
    </div>
</div>

<hr class="uk-margin uk-margin-remove-top uk-margin-remove-bottom" />

<div class="tm-grid-expand uk-margin-remove-bottom uk-margin-remove-top uk-grid-column-medium uk-grid-row-large uk-margin uk-grid" uk-grid>
    <div class="uk-width-1-1">
        <div class="tm-grid-expand uk-grid-margin uk-grid uk-margin-small-top" uk-grid>
            <div class="uk-width-1-1 uk-panel">
                <div class="uk-flex uk-flex-right">
                    <ul class="uk-list">
                        <?php if ($this->config->show_weight_order) {?>
                        <li class="el-item uk-margin-bottom">
                            <div class="uk-child-width-expand uk-grid-small uk-grid uk-text-muted" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_WEIGHT_PRODUCTS')?>:
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatweight($this->weight);?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if (!$this->hide_subtotal) {?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_SUBTOTAL')?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->summ);?>
                                    <?php print $this->_tmp_ext_subtotal?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php print $this->_tmp_html_after_subtotal?>

                        <?php if ($this->discount > 0) { ?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_RABATT_VALUE')?>
                                        <?php print $this->_tmp_ext_discount_text?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice(-$this->discount);?>
                                    <?php print $this->_tmp_ext_discount?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if (isset($this->summ_delivery)) {?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_SHIPPING_PRICE')?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->summ_delivery);?>
                                    <?php print $this->_tmp_ext_shipping?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if (isset($this->summ_package)) {?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_PACKAGE_PRICE')?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->summ_package);?>
                                    <?php print $this->_tmp_ext_shipping_package?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if ($this->summ_payment != 0) { ?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print $this->payment_name;?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->summ_payment);?>
                                    <?php print $this->_tmp_ext_payment?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                        <?php if (!$this->config->hide_tax) { ?>
                        <?php foreach ($this->tax_list as $percent=>$value) {?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print \JSHelper::displayTotalCartTaxName();?>
                                        <?php
                                        if ($this->show_percent_tax) {
                                            print \JSHelper::formattax($percent)."%";
                                        } ?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($value);?>
                                    <?php print $this->_tmp_ext_tax[$percent]?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>

                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print $this->text_total; ?>
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->fullsumm)?>
                                    <?php print $this->_tmp_ext_total?>
                                </div>
                            </div>
                        </li>

                        <?php print $this->_tmp_html_after_total?>

                        <?php if ($this->free_discount > 0) {?>
                        <li class="el-item">
                            <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                                <div class="uk-width-small uk-text-break">
                                    <div class="el-title uk-margin-remove">
                                        <?php print JText::_('JSHOP_FREE_DISCOUNT')?>:
                                    </div>
                                </div>
                                <div>
                                    <?php print \JSHelper::formatprice($this->free_discount); ?>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="uk-width-1-1">
            <?php print $this->checkoutcartdescr;?>
        </div>

        <?php print $this->_tmp_html_after_checkout_cart?>

    </div>
</div>