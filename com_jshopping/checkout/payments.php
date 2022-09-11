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

<form id="payment_form" name="payment_form" class="uk-form-stacked" action="<?php print $this->action?>" method="post" autocomplete="off" enctype="multipart/form-data">

    <?php print $this->_tmp_ext_html_payment_start?>

    <div class="tm-grid-expand uk-margin uk-grid-margin uk-margin-remove-bottom uk-grid" uk-grid>
        <div id="uk-card uk-card-default uk-margin">
            <div class="uk-card-body uk-card-small">
                <?php foreach ($this->payment_methods as  $payment) {?>
                <div class="uk-margin-small-bottom">
                    <input type="radio" class="uk-radio" name="payment_method" id="payment_method_<?php print $payment->payment_id?>" value="<?php print $payment->payment_class?>" <?php if ($this->active_payment==$payment->payment_id) {?>checked<?php } ?>>
                    <span for="payment_method_<?php print $payment->payment_id ?>" class="uk-margin uk-margin-left">
                        <?php if ($payment->image) {?>
                        <span class="">
                            <img src="<?php print $payment->image?>" alt="<?php print htmlspecialchars($payment->name)?>" />
                        </span>
                        <?php }?>
                        <strong>
                            <?php print $payment->name;?>
                        </strong>

                        <?php if ($payment->price_add_text!='') {?>
                        <span class="">
                            (<?php print $payment->price_add_text?>)
                        </span>
                        <?php }?>
                    </span>
                </div>

                <div class="uk-margin-medium-left" id="tr_payment_<?php print $payment->payment_class ?>" <?php if ($this->active_payment != $payment->payment_id) {?>style="display:none" <?php } ?>>
                    <div class=uk-text-meta">
                        <?php print $payment->payment_description?>
                    </div>
                    <div class="uk-margin">
                        <?php print $payment->form?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php print $this->_tmp_ext_html_payment_end?>

    <div class="tm-grid-expand uk-margin uk-grid-margin uk-margin-remove-top uk-grid" uk-grid>
        <div class="uk-margin-1-2 uk-margin-top uk-text-right">
            <button type="submit" id="payment_submit" class="uk-button uk-button-primary" name="payment_submit">
                <?php print JText::_('JSHOP_NEXT')?>
                <span class="uk-margin-small-left uk-icon" uk-icon="chevron-double-right"></span>
            </button>
        </div>
    </div>
</form>