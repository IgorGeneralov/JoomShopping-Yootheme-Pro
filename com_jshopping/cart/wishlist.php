<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();

$countprod = count($this->products);
$document = JFactory::getDocument();
?>

<?php if ($countprod > 0) : ?>
<h1 class="uk-h1 uk-margin"><?php echo $document->getTitle(); ?></h1>
<div class="tm-grid-expand uk-margin-remove-bottom uk-grid-column-medium uk-grid-row-large uk-margin uk-grid" uk-grid>
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
                                        <div class="uk-inline-clip uk-transition-toggle">
                                            <img class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_product_path ?>/<?php if ($prod['thumb_image']) {
        print $prod['thumb_image'];
    } else {
        print $this->no_image;
    } ?>" alt="<?php print htmlspecialchars($prod['product_name']); ?>" />
        </div>
            </a>
                </div>

                    <?php echo $prod['_tmp_img_after']; ?>

                        <div class="">
                            <div>
                                <a class="uk-h5" href="<?php print $prod['href']?>">
                                    <?php print $prod['product_name']?>
                                        </a>
                                            <br />
                                                <?php if ($this->config->show_product_code_in_cart) {?>
                                                <span class="uk-text-meta">
                                                    (<?php print $prod['ean']?>)
                                                </span>
                                                <?php } ?>

                                                <?php print $prod['_ext_product_name'] ?>

                                                <?php if ($prod['manufacturer']!='') {?>
                                                <div class="uk-margin uk-margin-small uk-margin-remove-bottom">
                                                    <span class="uk-text-meta">
                                                        <?php print JText::_('JSHOP_MANUFACTURER')?>:
                                                    </span>
                                                    <?php print $prod['manufacturer']?>
                                                </div>
                                                <?php } ?>

                                                <?php if ($this->config->manufacturer_code_in_cart && $prod['manufacturer_code']) {?>
                                                <div class="uk-text uk-margin-remove-bottom">
                                                    <span class="uk-text-meta">
                                                        <?php print JText::_('JSHOP_MANUFACTURER_CODE')?>:
                                                    </span>
                                                    <?php print $prod['manufacturer_code'] ?>
                                                </div>
                                                <?php } ?>
                                                <?php print \JSHelper::sprintAtributeInCart($prod['attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeAtributeInCart($prod['free_attributes_value']); ?>
                                                <?php print \JSHelper::sprintFreeExtraFiledsInCart($prod['extra_fields']); ?>
                                                <?php print $prod['_ext_attribute_html']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-price">
                                <div class="tm-single_price uk-margin-bottom">
                                    <span uk-tooltip="<?php print JText::_('JSHOP_SINGLEPRICE')?>">
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
                                    <div class="el-item uk-margin uk-text-center">
                                        <a class="uk-button uk-button-default uk-width-1-1" uk-tooltip="<?php print JText::_('JSHOP_DELETE')?>" href="<?php print $prod['href_delete']?>" onclick="return confirm('<?php print JText::_('JSHOP_CONFIRM_REMOVE')?>')">
                                            <span class="uk-icon" uk-icon="icon: trash;"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-quantity uk-text-center">
                                <div uk-tooltip="<?php print JText::_('JSHOP_NUMBER')?>">
                                    <span class="">
                                        <?php print $prod['quantity']?>
                                    </span>
                                    <?php print $prod['_qty_unit']; ?>
                                </div>
                            </div>

                            <div class="uk-width-1-3@s uk-width-1-5@m tm-price">
                                <div class="tm-single_price uk-margin-bottom" uk-tooltip="<?php print JText::_('JSHOP_PRICE_TOTAL')?>">
                                    <?php print \JSHelper::formatprice($prod['price']*$prod['quantity']); ?>

                                    <?php print $prod['_ext_price_total_html']?>

                                    <?php if ($this->config->show_tax_product_in_cart && $prod['tax']>0) {?>
                                    <br>
                                    <span class="uk-text-meta">
                                        <?php print \JSHelper::productTaxInfo($prod['tax']);?>
                                    </span>
                                    <?php } ?>
                                </div>

                                <div class="el-item uk-margin uk-text-center">
                                    <a class="uk-button uk-button-primary uk-width-1-1" uk-tooltip="<?php print JText::_('JSHOP_REMOVE_TO_CART')?>" href="<?php print $prod['remove_to_cart'] ?>">
                                        <span class="uk-icon" uk-icon="icon: pull;"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php echo $prod['_tmp_tr_after'];
    $i++;
} ?>

    </tbody>
        </table>
    </div>
</div>

<?php else : ?>
<div class="uk-width-1-1 uk-panel uk-margin-remove-top">
    <div class="uk-h1">
        <?php print JText::_('JSHOP_WISHLIST_EMPTY') ?>
    </div>
</div>
<?php endif; ?>

<hr class="uk-margin uk-margin-remove-top" />

<?php print $this->_tmp_html_before_buttons?>

<div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin uk-margin-top" uk-grid>
    <div class="el-item">
        <a class="uk-button uk-button-secondary" href="<?php print $this->href_shop ?>">
            <span class="uk-icon" uk-icon="icon: chevron-double-left"></span>
            <?php print JText::_('JSHOP_BACK_TO_SHOP')?>
        </a>
    </div>
    <div class="el-item">
        <a class="uk-button uk-button-primary" href="<?php print $this->href_checkout ?>">
            <?php print JText::_('JSHOP_GO_TO_CART')?>
            <span class="uk-icon" uk-icon="icon: chevron-double-right"></span>
        </a>
    </div>
</div>

<?php print $this->_tmp_html_after_buttons?>