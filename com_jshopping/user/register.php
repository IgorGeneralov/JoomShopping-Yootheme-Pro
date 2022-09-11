<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
use Joomla\Component\Jshopping\Site\Helper\Selects;

defined('_JEXEC') or die();

$config_fields=$this->config_fields;
JHtml::_('behavior.formvalidator');
?>
<div id="comjshop_register">
    <!--?php if (!isset($hideheaderh1)) : ?-->
    <h2 class="uk-heading uk-magin uk-margin-small">
        <?php print JText::_('JSHOP_REGISTRATION')?>
    </h2>
    <!--?php endif; ?-->
    <div class="uk-margin uk-text-right uk-margin-remove-top uk-margin-remove-bottom uk-text-small uk-text-danger">
        <span> * <?php print JText::_('JSHOP_REQUIRED')?></span>
    </div>

    <form action="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=user&task=registersave', 1, 0, $this->config->use_ssl)?>" class="uk-form-horizontal uk-margin" method="post" name="registration-form" autocomplete="off" enctype="multipart/form-data">

        <?php echo $this->_tmpl_register_html_1?>

        <div class="tm-grid-expand uk-grid-margin uk-margin uk-grid-large uk-grid uk-grid-stack" uk-grid>
            <div class="uk-width-1-1">
                <div class="uk-card uk-width-xlarge uk-card-small uk-margin-remove-first-child uk-margin">
                    <div class="">
                        <?php if ($config_fields['title']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_REG_TITLE')?> <?php if ($config_fields['title']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <?php
                if ($config_fields['title']['require']) {
                    $attribs='class="uk-form-small el-input uk-select required"';
                } else {
                    $attribs='class="uk-form-small el-input uk-select"';
                }
                ?>
                                <?php print Selects::getTitle($this->user->title, $attribs)?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['f_name']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_F_NAME')?> <?php if ($config_fields['f_name']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="f_name" id="f_name" value="<?php print $this->user->f_name?>" class="uk-form-small el-input uk-input <?php if ($config_fields['f_name']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['l_name']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_L_NAME')?>
                                <?php if ($config_fields['l_name']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="l_name" id="l_name" value="<?php print $this->user->l_name?>" class="uk-form-small el-input uk-input <?php if ($config_fields['l_name']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['m_name']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_M_NAME')?>
                                <?php if ($config_fields['m_name']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="m_name" id="m_name" value="<?php print $this->user->m_name?>" class="uk-form-small el-input uk-input <?php if ($config_fields['m_name']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['birthday']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_BIRTHDAY')?> <?php if ($config_fields['birthday']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>

                            <div class="uk-form-controls">
                                <?php $params=array('class'=>'uk-input', 'size'=>'25', 'maxlength'=>'19');
                            if ($config_fields['birthday']['require']) {
                                $params['class']='uk-input required';
                            }
                            ?>
                                <?php echo \JHTML::_('calendar', $this->user->birthday, 'birthday', 'birthday', $this->config->field_birthday_format, $params);?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['email']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_EMAIL')?> <?php if ($config_fields['email']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="email" id="email" value="<?php print $this->user->email?>" class="uk-form-small el-input uk-input validate-email <?php if ($config_fields['email']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['email2']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_EMAIL2')?> <?php if ($config_fields['email2']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="email2" id="email2" value="<?php print $this->user->email2?>" class="uk-form-small el-input uk-input validate-email <?php if ($config_fields['email2']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['mobil_phone']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_MOBIL_PHONE')?> <?php if ($config_fields['mobil_phone']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="mobil_phone" id="mobil_phone" value="<?php print $this->user->mobil_phone?>" class="uk-form-small el-input uk-input <?php if ($config_fields['mobil_phone']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['phone']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_TELEFON')?> <?php if ($config_fields['phone']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="phone" id="phone" value="<?php print $this->user->phone?>" class="uk-form-small el-input uk-input <?php if ($config_fields['phone']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php echo $this->_tmpl_register_html_2?>

                        <?php if ($config_fields['country']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_COUNTRY')?> <?php if ($config_fields['country']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <?php
                        if ($config_fields['country']['require']) {
                            $attribs='class="uk-form-small el-input uk-select required"';
                        } else {
                            $attribs='class="uk-form-small el-input uk-select"';
                        }
                        ?>
                                <?php print Selects::getCountry($this->user->country, $attribs)?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['state']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_STATE')?> <?php if ($config_fields['state']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="state" id="state" value="<?php print $this->user->state?>" class="uk-form-small el-input uk-input <?php if ($config_fields['state']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['zip']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_ZIP')?> <?php if ($config_fields['zip']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="zip" id="zip" value="<?php print $this->user->zip?>" class="uk-form-small el-input uk-input <?php if ($config_fields['zip']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['city']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_CITY')?> <?php if ($config_fields['city']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="city" id="city" value="<?php print $this->user->city?>" class="uk-form-small el-input uk-input <?php if ($config_fields['city']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['street']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_STREET_NR')?> <?php if ($config_fields['street']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="street" id="street" value="<?php print $this->user->street?>" class="uk-form-small el-input uk-input <?php if ($config_fields['street']['require']):?>required<?php endif?>">
                                <?php if ($config_fields['street_nr']['display']) {?>
                                <input type="text" name="street_nr" id="street_nr" value="<?php print $this->user->street_nr?>" class="uk-form-small el-input uk-input uk-form-width-small uk-margin uk-margin-remove-bottom <?php if ($config_fields['street_nr']['require']):?>required<?php endif?>">
                                <?php }?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['home']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_HOME')?> <?php if ($config_fields['home']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="home" id="home" value="<?php print $this->user->home?>" class="uk-form-small el-input uk-input <?php if ($config_fields['home']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['apartment']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_APARTMENT')?> <?php if ($config_fields['apartment']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="apartment" id="apartment" value="<?php print $this->user->apartment?>" class="uk-form-small el-input uk-input <?php if ($config_fields['apartment']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php echo $this->_tmpl_register_html_3?>

                        <?php if ($config_fields['firma_name']['display']) : ?>
                        <div class="uk-margin">
                            <hr />
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_FIRMA_NAME')?>
                                <?php if ($config_fields['firma_name']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="firma_name" id="firma_name" value="<?php print $this->user->firma_name?>" class="uk-form-small el-input uk-input <?php if ($config_fields['firma_name']['require']):?>required<?php endif?>">
                            </div>
                        </div>

                        <?php if ($config_fields['client_type']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_CLIENT_TYPE')?>
                                <?php if ($config_fields['client_type']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <?php if ($config_fields['client_type']['require']) {
                            $attribs='class="uk-form-small el-input uk-select required"';
                        } else {
                            $attribs='class="uk-form-small el-input uk-select"';
                        }
                                            ?>
                                <?php print Selects::getClientType($this->user->client_type, $attribs)?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['firma_code']['display']) : ?>
                        <div class="control-group" id='tr_field_firma_code' <?php if ($config_fields['client_type']['display']) : ?>style="display:none;" <?php endif; ?>>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">
                                    <?php print JText::_('JSHOP_FIRMA_CODE')?> <?php if ($config_fields['firma_code']['require']) : ?>
                                    <span>*</span>
                                    <?php endif; ?>
                                </label>
                                <div class="uk-form-controls">
                                    <?php if ($config_fields['tax_number']['require']) {
                                                if ($config_fields['client_type']['display']) {
                                                    $class="uk-form-small el-input uk-input required-company";
                                                } else {
                                                    $class="uk-form-small el-input uk-input required";
                                                }
                                            } else {
                                                $class='';
                                            }
                                                ?>
                                    <input type="text" name="firma_code" id="firma_code" value="<?php print $this->user->firma_code?>" class="uk-form-small el-input uk-input <?php print $class;?>">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['tax_number']['display']) : ?>
                        <div class="control-group" id='tr_field_tax_number' <?php if ($config_fields['client_type']['display']) : ?>style="display:none;" <?php endif; ?>>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-horizontal-text">
                                    <?php print JText::_('JSHOP_VAT_NUMBER')?> <?php if ($config_fields['tax_number']['require']) : ?>
                                    <span>*</span>
                                    <?php endif; ?>
                                </label>
                                <div class="uk-form-controls">
                                    <?php
                        if ($config_fields['tax_number']['require']) {
                            if ($config_fields['client_type']['display']) {
                                $class="uk-form-small el-input uk-input required-company";
                            } else {
                                $class="uk-form-small el-input uk-input required";
                            }
                        } else {
                            $class='';
                        }
                        ?>
                                    <input type="text" name="tax_number" id="tax_number" value="<?php print $this->user->tax_number?>" class="uk-form-small el-input uk-input <?php print $class?>">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['fax']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_FAX')?> <?php if ($config_fields['fax']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="fax" id="fax" value="<?php print $this->user->fax?>" class="uk-form-small el-input uk-input <?php if ($config_fields['fax']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($config_fields['ext_field_1']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_EXT_FIELD_1')?> <?php if ($config_fields['ext_field_1']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="ext_field_1" id="ext_field_1" value="<?php print $this->user->ext_field_1?>" class="uk-form-small el-input uk-input <?php if ($config_fields['ext_field_1']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['ext_field_2']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_EXT_FIELD_2')?> <?php if ($config_fields['ext_field_2']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="ext_field_2" id="ext_field_2" value="<?php print $this->user->ext_field_2?>" class="uk-form-small el-input uk-input <?php if ($config_fields['ext_field_2']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['ext_field_3']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_EXT_FIELD_3')?> <?php if ($config_fields['ext_field_3']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="ext_field_3" id="ext_field_3" value="<?php print $this->user->ext_field_3?>" class="uk-form-small el-input uk-input <?php if ($config_fields['ext_field_3']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php echo $this->_tmpl_register_html_5?>

                    <?php if ($config_fields['u_name']['display']) : ?>
                    <div class="uk-tile-muted">
                        <hr />
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_USERNAME')?> <?php if ($config_fields['u_name']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="text" name="u_name" id="u_name" value="<?php print $this->user->u_name?>" class="uk-form-small el-input uk-input validate-username <?php if ($config_fields['u_name']['require']):?>required<?php endif?>">
                            </div>
                        </div>

                        <?php if ($config_fields['password']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_PASSWORD')?> <?php if ($config_fields['password']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="password" name="password" id="password" value="" class="uk-form-small el-input uk-input registrationTestPassword validate-password <?php if ($config_fields['password']['require']):?>required<?php endif?>">
                                <span id="reg_test_password"></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($config_fields['password_2']['display']) : ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_PASSWORD_2')?> <?php if ($config_fields['password_2']['require']) : ?>
                                <span>*</span>
                                <?php endif; ?>
                            </label>
                            <div class="uk-form-controls">
                                <input type="password" name="password_2" id="password_2" value="" class="uk-form-small el-input uk-input <?php if ($config_fields['password_2']['require']):?>required<?php endif?>">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php echo $this->_tmpl_register_html_51?>
                </div>

                <div class="tm-grid-expand uk-grid-margin uk-margin-remove-top uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-panel">

                        <?php echo $this->_tmpl_register_html_4?>

                        <?php if ($config_fields['privacy_statement']['display']) : ?>
                        <div class="uk-margin uk-margin-small uk-margin-remove-top uk-text-right">
                            <hr />
                            <span class="">
                                <input type="checkbox" name="privacy_statement" id="privacy_statement" value="1" <?php if ($config_fields['privacy_statement']['require']):?>required<?php endif?>>
                            </span>
                            <span class="uk-margin uk-margin-left" for="form-horizontal-text">
                                <a class="uk-button uk-button-link uk-button-small" href="#" onclick="window.open('<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=privacy_statement&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
                                    <?php print JText::_('JSHOP_PRIVACY_STATEMENT')?> <?php if ($config_fields['privacy_statement']['require']) : ?>
                                    <span>*</span>
                                    <?php endif; ?>
                                </a>
                            </span>
                        </div>
                        <?php endif; ?>

                        <?php echo $this->_tmpl_register_html_6?>
                        <div class="uk-margin uk-margin-remove-top uk-text-right">
                            <button type="submit" value="<?php print JText::_('JSHOP_SEND_REGISTRATION')?>" class="uk-button-primary uk-button">
                                <?php print JText::_('JSHOP_SEND_REGISTRATION')?>
                            </button>
                        </div>
                    </div>
                    <?php echo \JHTML::_('form.token');?>
                </div>
            </div>
    </form>
</div>

<script type="text/javascript">
var jshopParams = jshopParams || {};
jshopParams.urlcheckpassword = '<?php print $this->urlcheckpassword?>';
</script>