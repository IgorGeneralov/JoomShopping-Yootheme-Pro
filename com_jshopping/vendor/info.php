<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>

<?php if ($this->header) : ?>
<h1 class="uk-h1">
    <?php print $this->header ?>
</h1>
<?php endif; ?>

<div class="tm-grid-expand uk-grid-margin uk-grid" id="comjshop" uk-height-match="target: .uk-card" uk-grid>
    <div class="uk-width-1-2@m">
        <div class="uk-card uk-width-large uk-card-small uk-margin-remove-first-child uk-margin">
            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_F_NAME')?>:
                        </span>
                    </div>
                </div>
                <div class="el-content uk-panel">
                    <?php print $this->vendor->f_name ?>
                </div>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_L_NAME')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->l_name ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_FIRMA_NAME')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->company_name ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_EMAIL')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->email ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_TELEFON')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->phone ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_FAX')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->fax ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_COUNTRY')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->country ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_STATE')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->state ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_ZIP')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->zip ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_CITY')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->city ?>
            </div>

            <div class="uk-child-width-auto uk-grid-small uk-flex-bottom uk-grid">
                <div class="uk-width-expand">
                    <div class="el-title uk-margin-remove uk-leader" uk-leader="">
                        <span class="uk-text-small uk-leader-fill">
                            <?php print JText::_('JSHOP_STREET_NR')?>:
                        </span>
                    </div>
                </div>
                <?php print $this->vendor->adress ?>
            </div>
        </div>
    </div>

    <div class="uk-width-1-2@m">
        <?php if ($this->vendor->logo!="") : ?>
        <img src="<?php print $this->vendor->logo?>" alt="<?php print htmlspecialchars($this->vendor->shop_name);?>" />
        <?php endif; ?>
    </div>
</div>