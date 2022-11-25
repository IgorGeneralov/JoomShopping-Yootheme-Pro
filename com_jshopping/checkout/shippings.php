<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<?php print $this->checkout_navigator?>
<?php print $this->small_cart?>

<form id="shipping_form" class="uk-form-stacked" name="shipping_form" action="<?php print $this->action ?>" method="post" autocomplete="off" enctype="multipart/form-data">

    <?php print $this->_tmp_ext_html_shipping_start?>

    <div class="tm-grid-expand uk-margin uk-grid-margin uk-margin-remove-bottom uk-grid" uk-grid>
        <div id="uk-card uk-card-default uk-margin">
            <div class="uk-card-body uk-card-small">
                <?php foreach ($this->shipping_methods as $shipping) {?>
                <div class="uk-margin-small-bottom">
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin-small uk-grid-small uk-child-width-auto uk-grid">
                            <label>
                                <input type="radio" class="uk-radio" name="sh_pr_method_id" id="shipping_method_<?php print $shipping->sh_pr_method_id?>" value="<?php print $shipping->sh_pr_method_id ?>" <?php if ($shipping->sh_pr_method_id==$this->active_shipping) { ?>checked="checked" <?php } ?> data-shipping_id="<?php print $shipping->shipping_id?>">
                                <span for="shipping_method_<?php print $shipping->sh_pr_method_id ?>">
                                    <strong>
                                        <?php print $shipping->name?>
                                    </strong>
                                    <span class="">
                                        (<?php print \JSHelper::formatprice($shipping->calculeprice); ?>)
                                    </span>
                                </span>
                            </label>
                        </div>

                        <?php if ($shipping->image) {?>
                        <span class="tm-payment-shipping">
                            <img src="<?php print $shipping->image?>" alt="<?php print htmlspecialchars($shipping->name)?>" />
                        </span>
                        <?php }?>
                    </fieldset>

                    <?php if ($this->config->show_list_price_shipping_weight && count($shipping->shipping_price)) { ?>
                    <fieldset class="uk-fieldset">
                        <?php foreach ($shipping->shipping_price as $price) {?>
                        <tr>
                            <td class="weight">
                                <?php if ($price->shipping_weight_to!=0) {?>
                                <?php print \JSHelper::formatweight($price->shipping_weight_from);?> - <?php print \JSHelper::formatweight($price->shipping_weight_to);?>
                                <?php } else { ?>
                                <?php print JText::_('JSHOP_FROM')." ".\JSHelper::formatweight($price->shipping_weight_from);?>
                                <?php } ?>
                            </td>
                            <td class="price">
                                <?php print \JSHelper::formatprice($price->shipping_price); ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </fieldset>
                    <?php } ?>

                    <div class="uk-margin-left">
                        <div class="uk-text-meta">
                            <?php print $shipping->description?>
                        </div>
                    </div>

                    <div class="uk-margin-medium-left" id="shipping_form_<?php print $shipping->shipping_id?>" class="shipping_form <?php if ($shipping->sh_pr_method_id==$this->active_shipping) {
    print 'shipping_form_active';
}?>"><?php print $shipping->form?></div>

                    <?php if ($shipping->delivery) {?>
                    <div class="">
                        <?php print JText::_('JSHOP_DELIVERY_TIME').": ".$shipping->delivery?>
                    </div>
                    <?php }?>

                    <?php if ($shipping->delivery_date_f) {?>
                    <div class="">
                        <?php print JText::_('JSHOP_DELIVERY_DATE').": ".$shipping->delivery_date_f?>
                    </div>
                    <?php }?>
                </div>
                <?php } ?>
            </div>

            <?php print $this->_tmp_ext_html_shipping_end?>

            <div class="tm-grid-expand uk-margin uk-grid-margin uk-margin-remove-top uk-grid" uk-grid>
                <div class="uk-margin-1-2 uk-margin-top uk-text-right">
                    <button type="submit" class="uk-button uk-button-primary">
                        <?php print JText::_('JSHOP_NEXT')?>"
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
