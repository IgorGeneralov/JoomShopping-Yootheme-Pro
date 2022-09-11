<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();

$countprod=count($this->products);
$document = JFactory::getDocument();
?>

<?php print $this->checkout_navigator?>

<form action="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=cart&task=refresh') ?>" method="post" name="updateCart" id="updateCart" class="uk-form-horizontal">

    <?php print $this->_tmp_ext_html_cart_start ?>

    <?php if ($countprod > 0) : ?>
    <h1 class="uk-h1 uk-margin"><?php echo $document->getTitle(); ?></h1>
    <div class="tm-grid-expand uk-margin-remove-bottom uk-grid-column-medium uk-grid-row-large uk-margin uk-grid" uk-grid>
        <div class="uk-width-1-1 uk-panel">
            <table class="uk-table uk-table-striped uk-table-divider">
                <tbody>
                    <?php $i=1; foreach ($this->products as $key_id => $prod) {
    echo $prod['_tmp_tr_before']; ?>
        <tr>
            <td>
                <div class="tm-grid-expand uk-grid-row-small uk-grid-divider uk-grid-margin-small uk-grid" uk-grid>
                    <div class="uk-grid-item-match uk-flex-middle uk-width-1-1@s uk-width-3-5@m">
                        <div class="uk-panel uk-margin">
                            <div class="uk-child-width-expand uk-grid-column-small uk-grid" uk-grid>
                                <div class="uk-width-2-5@m">
                                    <?php echo $prod['_tmp_img_before']; ?>
                                        <a href="<?php print $prod['href'] ?>">
                                            <div class="uk-inline-clip uk-transition-toggle">
                                                <img class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_product_path ?>/<?php
                    if ($prod['thumb_image']) {
                        print $prod['thumb_image'];
                    } else {
                        print $this->no_image;
                    } ?>" alt="<?php print htmlspecialchars($prod['product_name']); ?>" />
                        </div>
                            </a>
                                <?php echo $prod['_tmp_img_after']; ?>
                                    </div>

                                        <div class="">
                                            <a class="uk-h5" href="<?php print $prod['href'] ?>">
                                                <?php print $prod['product_name'] ?>
                                                </a>
                                                <?php if ($this->config->show_product_code_in_cart) { ?>
                                                <span class="uk-text-meta">
                                                    (<?php print $prod['ean'] ?>)
                                                </span>
                                                <?php } ?>

                                                <?php print $prod['_ext_product_name'] ?>

                                                <?php if ($prod['manufacturer'] != '') { ?>
                                                <div class="uk-margin uk-margin-small uk-margin-remove-bottom">
                                                    <span class="uk-text-meta">
                                                        <?php print JText::_('JSHOP_MANUFACTURER')?>:
                                                    </span>
                                                    <?php print $prod['manufacturer'] ?>

                                                    <?php if ($this->config->manufacturer_code_in_cart && $prod['manufacturer_code']) {?>
                                                    <div class="uk-text uk-margin-remove-bottom">
                                                        <span class="uk-text-meta">
                                                            <?php print JText::_('JSHOP_MANUFACTURER_CODE')?>:
                                                        </span>
                                                        <?php print $prod['manufacturer_code'] ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <?php } ?>

                                                <?php print \JSHelper::sprintAtributeInCart($prod['attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeAtributeInCart($prod['free_attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeExtraFiledsInCart($prod['extra_fields']); ?>
                                                <?php print $prod['_ext_attribute_html'] ?>

                                                <?php if ($this->config->show_delivery_time_step5 && $prod['delivery_times_id']) {?>
                                                <div class="uk-text uk-margin-small uk-margin-remove-bottom">
                                                    <span class="uk-text-meta">
                                                        <?php print JText::_('JSHOP_DELIVERY_TIME')?>:
                                                    </span>
                                                    <?php print $this->deliverytimes[$prod['delivery_times_id']]?>
                                                </div>
                                                <?php } ?>

                                                <!--div class="uk-text-small uk-margin-top">
                                                    <?php print $product->short_description?>
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-width-1-2@s uk-width-1-5@m">
                                    <div class="tm-single_price uk-margin uk-margin-remove-bottom" uk-tooltip="<?php print JText::_('JSHOP_BASIC_PRICE')?>">
                                        <?php print \JSHelper::formatprice($prod['price']) ?>
                                        <?php print $prod['_ext_price_html'] ?>

                                        <?php if ($this->config->show_tax_product_in_cart && $prod['tax'] > 0) { ?>
                                        <br />
                                        <span class="uk-text-meta">
                                            <?php print \JSHelper::productTaxInfo($prod['tax']); ?>
                                        </span>
                                        <?php } ?>

                                        <?php if ($this->config->cart_basic_price_show && $prod['basicprice'] > 0) { ?>
                                        <div class="basic_price">
                                            <?php print \JSHelper::sprintBasicPrice($prod); ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="tm-qty el-item uk-margin-small-top">
                                        <span class="el-item">
                                            <?php if ($prod['not_qty_update']) {?>
                                            <span class="qtyval">
                                                <?php print $prod['quantity'] ?>
                                            </span>
                                            <?php } else {?>
                                            <input type="number" name="quantity[<?php print $key_id ?>]" value="<?php print $prod['quantity'] ?>" class="uk-input uk-form-width-small" min="0" uk-tooltip="<?php print JText::_('JSHOP_NUMBER')?>">
                                            <?php } ?>

                                            <?php print $prod['_qty_unit']; ?>

                                            <?php if (!$prod['not_qty_update']) {?>
                                            <span class="el-item uk-margin-left">
                                                <a class="uk-button uk-button-link" uk-tooltip="<?php print JText::_('JSHOP_UPDATE_CART')?>" onclick="document.updateCart.submit();">
                                                    <span class="uk-icon" uk-icon="icon: pull; width: 25; height: 25;"></span>
                                                </a>
                                            </span>
                                            <?php } ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="uk-width-1-2@s uk-width-1-5@m">
                                    <div class="uk-h5 uk-margin uk-margin-remove-top uk-margin-small-bottom" uk-tooltip="<?php print JText::_('JSHOP_PRICE_TOTAL')?>">
                                        <span uk-tooltip="<?php print $prod['_ext_price_total_html'] ?>">
                                            <?php print \JSHelper::formatprice($prod['price'] * $prod['quantity']); ?>
                                            <?php print $prod['_ext_price_total_html'] ?>
                                        </span>
                                        <?php if ($this->config->show_tax_product_in_cart && $prod['tax'] > 0) { ?>
                                        <br />
                                        <span class="uk-text-meta">
                                            <?php print \JSHelper::productTaxInfo($prod['tax']); ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                    <div class="uk-text-center uk-margin-right uk-margin-remove-top">
                                        <?php if ($prod['not_delete']) { ?>
                                        <?php echo $prod['not_delete_html'] ? $prod['not_delete_html'] : '-'; ?>
                                        <?php } else { ?>
                                        <a class="uk-button uk-button-default uk-width-1-1" href="<?php print $prod['href_delete']?>" uk-tooltip="<?php print \JText::_('JSHOP_REMOVE')?>" onclick="return confirm('<?php print JText::_('JSHOP_CONFIRM_REMOVE')?>')">
                                            <span class="uk-icon" uk-icon="icon: trash;"></span>
                                        </a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
        echo $prod['_tmp_tr_after'];
    $i++;
}
    ?>
        </tbody>
            </table>
        </div>
    </div>

    <hr class="uk-margin uk-margin-remove-top" />

    <div class="uk-width-1-1 uk-panel uk-margin-remove-top">
        <div class="uk-flex uk-flex-right">
            <ul class="uk-list">
                <?php if ($this->config->show_cart_clear) {?>
                <li class="el-item">
                    <div class="margin-top">
                        <button class="uk-button uk-button-secondary" href="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=cart&task=clear')?>" onclick="return confirm('<?php print JText::_('JSHOP_CONFIRM_REMOVE_ALL')?>')">
                            <?php print JText::_('JSHOP_CLEAR_CART')?>
                        </button>
                    </div>
                </li>
                <?php } ?>

                <?php if ($this->config->show_weight_order) : ?>
                <li class="el-item">
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
                <?php endif; ?>

                <?php if ($this->config->summ_null_shipping > 0) : ?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">

                            </div>
                        </div>
                        <div>
                            <?php printf(JText::_('JSHOP_FROM_PRICE_SHIPPING_FREE'), \JSHelper::formatprice($this->config->summ_null_shipping, null, 1));?>
                        </div>
                    </div>
                </li>
                <?php endif; ?>

                <?php if (!$this->hide_subtotal) {?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <?php print JText::_('JSHOP_SUBTOTAL')?>
                            </div>
                        </div>
                        <div class="">
                            <?php print \JSHelper::formatprice($this->summ);?><?php print $this->_tmp_ext_subtotal?>
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
                                <?php print JText::_('JSHOP_RABATT_VALUE')?><?php print $this->_tmp_ext_discount_text?>
                            </div>
                        </div>
                        <div class="uk-text-meta">
                            <?php print \JSHelper::formatprice(-$this->discount);?><?php print $this->_tmp_ext_discount?>
                        </div>
                    </div>
                </li>
                <?php } ?>

                <?php if (!$this->config->hide_tax) {?>
                <?php foreach ($this->tax_list as $percent=>$value) { ?>
                <li class="el-item uk-margin-remove-top">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="uk-text-meta uk-margin-remove">
                                <?php print \JSHelper::displayTotalCartTaxName();?>
                                <?php
                                if ($this->show_percent_tax) {
                                    print \JSHelper::formattax($percent)."%";
                                } ?>
                            </div>
                        </div>
                        <div class="uk-text-meta">
                            <?php print \JSHelper::formatprice($value);?><?php print $this->_tmp_ext_tax[$percent]?>
                        </div>
                    </div>
                </li>
                <?php } ?>
                <?php } ?>

                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="uk-h3 el-title">
                                <?php print JText::_('JSHOP_PRICE_TOTAL')?>
                            </div>
                        </div>
                        <div class="uk-h3">
                            <?php print \JSHelper::formatprice($this->fullsumm)?>
                            <?php print $this->_tmp_ext_total?>
                        </div>
                    </div>
                </li>

                <?php print $this->_tmp_html_after_total?>

                <?php if ($this->config->show_plus_shipping_in_product) {?>
                <li class="el-item uk-margin-remove-top">
                    <div class="uk-child-width-expand uk-grid-small uk-grid uk-text-muted" uk-grid>
                        <div class="uk-width-small uk-text-break">
                        </div>
                        <div class="uk-text">
                            <?php print sprintf(JText::_('JSHOP_PLUS_SHIPPING'), $this->shippinginfo);?>
                        </div>
                    </div>
                </li>
                <?php } ?>

                <?php if ($this->free_discount > 0) {?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <?php print JText::_('JSHOP_FREE_DISCOUNT')?>: <?php print \JSHelper::formatprice($this->free_discount); ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php else : ?>
    <div class="uk-width-1-1 uk-panel uk-margin-remove-top">
        <div class="uk-h1">
            <?php print JText::_('JSHOP_CART_EMPTY')?>
        </div>
    </div>
    <?php endif; ?>
</form>

<?php print $this->_tmp_ext_html_before_discount?>

<?php if ($this->use_rabatt && $countprod>0) : ?>
<div class="uk-width-1-1 uk-margin-remove-top">
    <form name="rabatt" method="post" action="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=cart&task=discountsave'); ?>">
        <div class="name">
            <?php print JText::_('JSHOP_RABATT')?>
        </div>
        <input type="text" class="uk-input uk-width-medium" name="rabatt" value="" placeholder="<?php print JText::_('JSHOP_RABATT_ACTIVE')?>" />
        <span class="uk-margin-left">
            <input type="submit" class="uk-button uk-button-primary" value="<?php print JText::_('JSHOP_RABATT_ACTIVE')?>" />
        </span>
    </form>
</div>
<?php endif; ?>


<?php if ($this->cartdescr>0) : ?>
<div class="tm-grid-expand uk-grid-margin uk-grid uk-margin-medium-top" uk-grid>
    <div class="uk-width-1-1">
        <div class="uk-margin uk-text-meta">
            <?php print $this->cartdescr; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<hr class="uk-margin uk-margin-remove-top" />

<?php print $this->_tmp_html_before_buttons?>

<div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin uk-margin-small-top" uk-grid>
    <div class="">
        <a href="<?php print $this->href_shop ?>" class="uk-button uk-button-secondary" placeholder="<?php print JText::_('JSHOP_BACK_TO_SHOP')?>">
            <span class="uk-icon" uk-icon="icon: chevron-double-left"></span>
            <?php print JText::_('JSHOP_BACK_TO_SHOP')?>
        </a>
    </div>

    <?php if ($countprod>0) : ?>
    <div class="">
        <a class="uk-button uk-button-primary" href="<?php print $this->href_checkout ?>">
            <?php print JText::_('JSHOP_CHECKOUT')?>
            <span class="uk-icon" uk-icon="icon: chevron-double-right"></span>
        </a>
    </div>
    <?php endif; ?>
</div>

<?php print $this->_tmp_html_after_buttons?>