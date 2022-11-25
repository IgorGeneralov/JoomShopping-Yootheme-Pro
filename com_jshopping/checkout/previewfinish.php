<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php print $this->checkout_navigator?>
<?php print $this->small_cart?>

<div class="tm-grid-expand uk-margin uk-grid-margin uk-grid-divider uk-grid  uk-grid-stack" uk-grid>
    <div class="uk-margin-2-3">
        <?php print $this->_tmp_ext_html_previewfinish_start?>
        <div class="">
            <ul class="uk-list uk-list-divider">
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <strong><?php print JText::_('JSHOP_BILL_ADDRESS')?></strong>:
                            </div>
                        </div>
                        <div>
                            <div class="el-content uk-panel">
                                <?php if ($this->invoice_info['firma_name']) {
                                    print $this->invoice_info['firma_name'].", ";
                                }?>
                                <?php print $this->invoice_info['f_name'] ?>
                                <?php print $this->invoice_info['l_name'] ?>,
                                <?php if ($this->invoice_info['street'] && $this->invoice_info['street_nr']) {
                                    print $this->invoice_info['street']." ".$this->invoice_info['street_nr'].",";
                                }?>
                                <?php if ($this->invoice_info['street'] && !$this->invoice_info['street_nr']) {
                                    print $this->invoice_info['street'].",";
                                }?>
                                <?php if ($this->invoice_info['home'] && $this->invoice_info['apartment']) {
                                    print $this->invoice_info['home']."/".$this->invoice_info['apartment'].",";
                                }?>
                                <?php if ($this->invoice_info['home'] && !$this->invoice_info['apartment']) {
                                    print $this->invoice_info['home'].",";
                                }?>
                                <?php if ($this->invoice_info['state']) {
                                    print $this->invoice_info['state'].",";
                                } ?>
                                <?php print $this->invoice_info['zip']." ".$this->invoice_info['city']." ".$this->invoice_info['country']?>
                                <?php if ($this->invoice_info['email'] && $this->config->checkout_step5_show_email) {
                                    print $this->invoice_info['email'];
                                }?>
                                <?php if ($this->invoice_info['phone'] && $this->config->checkout_step5_show_phone) {
                                    print $this->invoice_info['phone'];
                                }?>
                            </div>
                        </div>
                    </div>
                </li>

                <?php if ($this->count_filed_delivery) {?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <strong><?php print JText::_('JSHOP_FINISH_DELIVERY_ADRESS')?></strong>:
                                <span>
                                    <?php if ($this->delivery_info['firma_name']) {
                                        print $this->delivery_info['firma_name'].", ";
                                    }?>
                                    <?php print $this->delivery_info['f_name'] ?>
                                    <?php print $this->delivery_info['l_name'] ?>,
                                    <?php if ($this->delivery_info['street'] && $this->delivery_info['street_nr']) {
                                        print $this->delivery_info['street']." ".$this->delivery_info['street_nr'].",";
                                    }?>
                                    <?php if ($this->delivery_info['street'] && !$this->delivery_info['street_nr']) {
                                        print $this->delivery_info['street'].",";
                                    }?>
                                    <?php if ($this->delivery_info['home'] && $this->delivery_info['apartment']) {
                                        print $this->delivery_info['home']."/".$this->delivery_info['apartment'].",";
                                    }?>
                                    <?php if ($this->delivery_info['home'] && !$this->delivery_info['apartment']) {
                                        print $this->delivery_info['home'].",";
                                    }?>
                                    <?php if ($this->delivery_info['state']) {
                                        print $this->delivery_info['state'].",";
                                    } ?>
                                    <?php print $this->delivery_info['zip']." ".$this->delivery_info['city']." ".$this->delivery_info['country']?>
                                </span>
                            </div>
                        </div>
                    </div>
                </li>
                <?php }?>

                <?php if (!$this->config->without_shipping) {?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <strong><?php print JText::_('JSHOP_FINISH_SHIPPING_METHOD')?></strong>:
                                <span><?php print $this->sh_method->name?></span>
                                <?php if ($this->delivery_time) {?>
                                <div class="delivery_time"><strong><?php print JText::_('JSHOP_DELIVERY_TIME')?></strong>:
                                    <span><?php print $this->delivery_time?></span>
                                </div>
                                <?php }?>
                                <?php if ($this->delivery_date) {?>
                                <div class="delivery_date"><strong><?php print JText::_('JSHOP_DELIVERY_DATE')?></strong>:
                                    <span><?php print $this->delivery_date?></span>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>

                <?php if (!$this->config->without_payment) {?>
                <li class="el-item">
                    <div class="uk-child-width-expand uk-grid-small uk-grid" uk-grid>
                        <div class="uk-width-small uk-text-break">
                            <div class="el-title uk-margin-remove">
                                <strong><?php print JText::_('JSHOP_FINISH_PAYMENT_METHOD')?>
                                </strong>: <span>
                                    <?php print $this->payment_name ?></span>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="uk-width-1-3@m">
        <form name="form_finish" action="<?php print $this->action ?>" method="post" enctype="multipart/form-data">
            <div class="uk-margin">
                <textarea class="uk-textarea" id="order_add_info" name="order_add_info" rows="5" placeholder="<?php print JText::_('JSHOP_ADD_INFO')?>" uk-icon="icon: pencil"></textarea>
            </div>

            <?php if ($this->config->display_agb) {?>
            <div class="">
                <input type="uk-checkbox" name="agb" id="agb" type="checkbox" class="uk-margin-small-right" />
                <span class="uk-text-small ">
                    <?php print JText::_('JSHOP_CONFIRM')?>
                </span>
                <a class="uk-button uk-text-small uk-button-link" href="#" onclick="window.open('<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=agb&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
                    <?php print JText::_('JSHOP_AGB')?>
                </a>
                <span class="uk-text-small ">
                    <?php print JText::_('JSHOP_AND')?>
                </span>
                <a class="uk-button uk-text-small uk-button-link" href="#" onclick="window.open('<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=return_policy&tmpl=component&cart=1', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
                    <?php print JText::_('JSHOP_RETURN_POLICY')?>
                </a>                
            </div>
            <?php }?>

            <?php if ($this->no_return) {?>
            <div class="">
                <input type="uk-checkbox" name="no_return" id="no_return" />
                <?php print JText::_('JSHOP_NO_RETURN_DESCRIPTION')?>
            </div>
            <?php }?>

            <?php print $this->_tmp_ext_html_previewfinish_agb?>

            <div class="uk-margin-1-2 uk-margin-top uk-text-right">
                <?php print $this->_tmp_ext_html_previewfinish_before_button?>
                <button class="uk-button uk-button-primary" id="previewfinish_btn" type="submit" name="finish_registration" data-agb="<?php echo $this->config->display_agb;?>" data-noreturn="<?php echo $this->no_return?>">
                    <?php print JText::_('JSHOP_ORDER_FINISH')?>
                    <span class="uk-margin-small-left uk-icon" uk-icon="chevron-double-right"></span>
                </button>
            </div>
            <?php print $this->_tmp_ext_html_previewfinish_end?>
        </form>
    </div>
</div>
