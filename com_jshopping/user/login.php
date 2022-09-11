<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>

<h1><?php print JText::_('JSHOP_LOGIN')?></h1>

<?php print $this->checkout_navigator?>

<?php echo $this->tmpl_login_html_1?>

<div class="uk-panel uk-margin-top">
    <?php echo $this->tmpl_login_html_2?>
    <div class="uk-margin">
        <div class="uk-margin uk-margin-remove-bottom">
            <h4 class="uk-h4">
                <?php print JText::_('JSHOP_HAVE_ACCOUNT')?>
            </h4>
        </div>
    </div>

    <div class="tm-grid-expand uk-grid-column-medium uk-grid-row-large uk-margin uk-grid" uk-grid>
        <div class="uk-width-2-3@l">
            <form method="post" action="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=user&task=loginsave', 1, 0, $this->config->use_ssl)?>" name="jlogin" class="uk-form-horizontal">
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-remove-first-child uk-margin" uk-height-match="target: .uk-card">
                    <div class="uk-margin">
                        <div class="uk-h5 uk-margin-bottom uk-text-muted">
                            <?php print JText::_('JSHOP_PL_LOGIN')?>
                        </div>
                        <label class="uk-form-label" for="jlusername">
                            <?php print JText::_('JSHOP_USERNAME')?>
                        </label>
                        <div class="uk-form-controls">
                            <input type="text" id="jlusername" name="username" value="" class="uk-input" required placeholder="<?php print JText::_('JSHOP_USERNAME')?>">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label id="password-lbl" class="uk-form-label" for="jlpassword">
                            <?php print JText::_('JSHOP_PASSWORT')?>:
                        </label>
                        <div class="uk-form-controls">
                            <input type="password" id="jlpassword" name="passwd" value="" class="uk-input" required placeholder="<?php print JText::_('JSHOP_PASSWORT')?>">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-expand" uk-leader="fill: .">
                                    <input type="checkbox" name="remember" id="remember_me" value="yes" />
                                    <label class="uk-text-small uk-margin-small-left" for="remember_me">
                                        <?php print JText::_('JSHOP_REMEMBER_ME')?>
                                    </label>
                                </div>
                                <div>
                                    <a class="uk-button uk-text-small uk-button-link" href="<?php print $this->href_lost_pass ?>">
                                        <?php print JText::_('JSHOP_LOST_PASSWORD')?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <input type="hidden" name="return" value="<?php print $this->return ?>" />
                        <?php echo \JHTML::_('form.token');?>
                        <?php echo $this->tmpl_login_html_3?>
                    </div>

                    <div class="uk-text-right uk-margin-small">
                        <div class="uk-form-controls">
                            <button type="submit" class="uk-button-primary uk-button"><?php print JText::_('JSHOP_LOGIN')?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="uk-width-1-3@l uk-grid-item-match">
            <div class="uk-panel uk-margin-small uk-text-right@m">

                <?php if ($this->config->shop_user_guest && $this->show_pay_without_reg) : ?>
                <div class="uk-margin">
                    <div class="">
                        <?php print JText::_('JSHOP_ORDER_WITHOUT_REGISTER')?>
                    </div>
                    <a class="uk-button uk-button-primary" href="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=checkout&task=step2', 1, 0, $this->config->use_ssl);?>">
                        <?php print JText::_('JSHOP_GUEST_CHECKOUT')?>
                    </a>
                </div>
                <?php endif; ?>

                <?php echo $this->tmpl_login_html_4?>

                <?php if ($this->allowUserRegistration) {?>
                <h4 class="uk-h4"><?php print JText::_('JSHOP_HAVE_NOT_ACCOUNT')?>?</h4>
                <div class="">
                    <?php print JText::_('JSHOP_REGISTER')?>
                </div>
                <?php if (!$this->config->show_registerform_in_logintemplate) {?>
                <div class="uk-margin uk-text-right@m">
                    <input type="button" class="uk-button uk-button-secondary uk-button-large" value="<?php print JText::_('JSHOP_REGISTRATION')?>" onclick="location.href='<?php print $this->href_register ?>';" />

                    <?php } else {?>
                    <button class="uk-button uk-button-default uk-margin-top uk-button-large" type="button" uk-toggle="target: #modal-registry">
                        <?php print JText::_('JSHOP_REGISTRATION')?>
                    </button>
                </div>
                <?php }?>
                <?php }?>

                <?php echo $this->tmpl_login_html_5?>

            </div>
        </div>

        <?php echo $this->tmpl_login_html_6?>

    </div>
</div>

<div id="modal-registry" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <?php $hideheaderh1 = 1; include(dirname(__FILE__)."/register.php"); ?>
    </div>
</div>