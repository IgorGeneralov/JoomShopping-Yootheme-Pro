<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<?php if ($this->allow_review) {?>

<div class="uk-grid-default" uk-grid>

    <?php if (count($this->reviews)) {?>
    <div class="uk-width-expand@m">
        <h3 class="">
            <?php print JText::_('JSHOP_REVIEWS')?>
        </h3>
        <?php foreach ($this->reviews as $curr) {?>
        <div class="uk-card uk-card-body uk-card-default uk-card-hover uk-card-small uk-margin-small">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin-top" uk-grid="">
                <div class="el-item">
                    <strong>
                        <?php print $curr->user_name?>
                    </strong> /
                    <span class='uk-text-meta'>
                        <?php print \JSHelper::formatdate($curr->time, 1);?>
                    </span>
                </div>

                <div class="el-item">
                    <?php if ($curr->mark && !$this->config->hide_product_rating) {?>
                    <div class="review_mark">
                        <?php print \JSHelper::showMarkStar($curr->mark);?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="uk-text uk-margin-small-top">
                <?php print nl2br($curr->review)?>
            </div>
        </div>
        <?php }?>

        <?php if ($this->display_pagination) {?>
        <div class="">
            <?php print $this->pagination?>
        </div>
        <?php }?>
    </div>
    <?php } ?>

    <div class="uk-width-1-3@m">
        <?php if ($this->allow_review > 0) {?>
        <?php JHtml::_('behavior.formvalidator'); ?>
        <h3 class="">
            <?php print JText::_('JSHOP_ADD_REVIEW_PRODUCT')?>
        </h3>

        <form method="post">
        </form>

        <form action="<?php print \JSHelper::SEFLink('index.php?option=com_jshopping&controller=product&task=reviewsave');?>" name="add_review" method="post" class="uk-form">
            <input type="hidden" name="product_id" value="<?php print $this->product->product_id?>" />
            <input type="hidden" name="back_link" value="<?php print \JSHelper::jsFilterUrl($_SERVER['REQUEST_URI'])?>" />
            <?php echo \JHTML::_('form.token');?>

            <div class="uk-panel uk-width-large">
                <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <input type="text" name="user_name" id="review_user_name" class="el-input uk-input required" value="<?php print $this->user->name?>" placeholder="<?php print JText::_('JSHOP_REVIEW_USER_NAME')?>" />
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <input type="text" name="user_email" id="review_user_email" class="el-input uk-input required" value="<?php print $this->user->email?>" placeholder="<?php print JText::_('JSHOP_REVIEW_USER_EMAIL')?>" />
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-controls">
                            <textarea name="review" id="review_review" rows="4" cols="40" class="el-input uk-textarea required" placeholder="<?php print JText::_('JSHOP_REVIEW_REVIEW')?>"></textarea>
                        </div>
                    </div>

                    <?php if (!$this->config->hide_product_rating) {?>
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-grid-small uk-child-width-auto uk-grid uk-margin-top" uk-grid="">
                        <div class="el-item">
                            <label class="uk-form-label" for="form-horizontal-text">
                                <?php print JText::_('JSHOP_REVIEW_MARK_PRODUCT')?>
                            </label>
                        </div>
                        <div class="uk-form-controls">
                            <?php for ($i=1; $i<=$this->stars_count*$this->parts_count; $i++) {?>
                            <input name="mark" type="radio" class="star uk-margin-small {split:<?php print $this->parts_count?>}" value="<?php print $i?>" <?php if ($i==$this->stars_count*$this->parts_count) {?>checked="checked" <?php }?> />
                            <?php } ?>
                        </div>
                    </div>
                    <?php }?>
                </fieldset>

                <?php print $this->_tmp_product_review_before_submit;?>

                <div class="uk-margin-top uk-text-right">
                    <input type="submit" class="uk-button-primary uk-button" value="<?php print JText::_('JSHOP_REVIEW_SUBMIT')?>" />
                </div>
            </div>
        </form>
        <?php } else {?>
        <div class="uk-text">
            <?php print $this->text_review?>
        </div>
        <?php }?>
    </div>
</div>
<?php }?>