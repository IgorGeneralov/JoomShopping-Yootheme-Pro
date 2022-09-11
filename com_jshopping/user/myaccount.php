<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();

$config_fields = $this->config_fields;
?>
<h4 class="uk-h4 uk-text-muted">
    <?php print JText::_('JSHOP_MY_ACCOUNT')?>
</h4>
<div class="tm-grid-expand uk-grid-margin uk-grid" id="comjshop" uk-height-match="target: .uk-card" uk-grid>
    <div class="uk-width-1-2@m">

        <?php echo $this->tmpl_my_account_html_start?>

        <div class="uk-card uk-width-large uk-card-small uk-margin-remove-first-child uk-margin">

            <?php if ($this->config->show_client_id_in_my_account) {?>
            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <span class="uk-text-mute">
                    <?php print JText::_('JSHOP_CLIENT_ID')?>:
                </span>
                <?php print $this->user->user_id?>
            </div>
            <?php }?>

            <?php if ($config_fields['f_name']['display'] || $config_fields['l_name']['display']) {?>
            <h1 class="uk-title-small">
                <?php print $this->user->f_name;?> <?php print $this->user->l_name;?>
            </h1>
            <?php }?>

            <div class="uk-margin-medium">
                <?php if ($config_fields['city']['display']) {?>
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                            <span class="uk-text-small uk-leader-fill">
                                <?php print JText::_('JSHOP_CITY')?>:
                            </span>
                        </div>
                    </div>
                    <div class="el-content uk-panel">
                        <?php print $this->user->city?>
                    </div>
                </div>
                <?php }?>

                <?php if ($config_fields['state']['display']) {?>
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                            <span class="uk-text-small uk-leader-fill">
                                <?php print JText::_('JSHOP_STATE')?>:
                            </span>
                        </div>
                    </div>
                    <div class="el-content uk-panel">
                        <?php print $this->user->state?>
                    </div>
                </div>
                <?php }?>

                <?php if ($config_fields['country']['display']) {?>
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                            <span class="uk-text-small uk-leader-fill">
                                <?php print JText::_('JSHOP_COUNTRY')?>:
                            </span>
                        </div>
                    </div>
                    <div class="el-content uk-panel">
                        <?php print $this->user->country?>
                    </div>
                </div>
                <?php }?>

                <?php if ($config_fields['email']['display']) {?>
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                            <span class="uk-text-small uk-leader-fill">
                                <?php print JText::_('JSHOP_EMAIL')?>:
                            </span>
                        </div>
                    </div>

                    <div class="el-content uk-panel">
                        <?php print $this->user->email?>
                    </div>
                </div>
                <?php }?>

                <?php if ($this->config->display_user_group) {?>
                <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                    <div class="uk-width-expand">
                        <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                            <span class="uk-text-small uk-leader-fill">
                                <?php print JText::_('JSHOP_GROUP')?>:
                            </span>
                        </div>
                    </div>

                    <div class="el-content uk-panel">
                        <?php print $this->user->groupname?>
                        <span class="uk-text">(<?php print JText::_('JSHOP_DISCOUNT')?>:
                            <?php print $this->user->discountpercent?>%)
                        </span>
                        <?php if ($this->config->display_user_groups_info) {?>
                        <a class="uk-button uk-button-link" href="<?php print $this->href_user_group_info?>">
                            <?php print JText::_('JSHOP_USER_GROUPS_INFO')?>
                        </a>
                        <?php }?>
                    </div>
                </div>
                <?php }?>

                <div class="uk-margin-medium">
                    <span class="uk-margin-right">
                        <a class="uk-button uk-button-secondary uk-button-small" href="<?php print $this->href_edit_data?>">
                            <?php print JText::_('JSHOP_EDIT_DATA')?>
                        </a>
                    </span>
                    <span class="uk-margin">
                        <a class="uk-button uk-button-primary uk-button-small uk-flex-inline uk-flex-center uk-flex-middle" href="<?php print $this->href_logout?>">
                            <?php print JText::_('JSHOP_LOGOUT')?>
                            <span class="uk-margin-small-left uk-icon" uk-icon="push"></span>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <?php echo $this->tmpl_my_account_html_end?>

    </div>

    <div class=" uk-grid-item-match uk-flex uk-flex-middle uk-width-1-2@m" uk-grid>
        <div class="uk-width-1-1">
            <a class="uk-card uk-card-default uk-card-small uk-card-hover uk-card-body uk-margin-remove-first-child uk-link-toggle uk-display-block uk-margin uk-text-center" href="<?php print $this->href_show_orders?>">
                <div class="uk-position-center uk-h2">
                    <?php print JText::_('JSHOP_SHOW_ORDERS')?>
                </div>
            </a>
        </div>
    </div>
    <?php echo $this->tmpl_my_account_html_content?>
</div>