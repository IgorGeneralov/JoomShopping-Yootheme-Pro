<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php
    $characteristic_displayfields = $this->characteristic_displayfields;
    $characteristic_fields = $this->characteristic_fields;
    $characteristic_fieldvalues = $this->characteristic_fieldvalues;
    $groupname = "";
?>
<?php print $this->tmp_ext_search_html_characteristic_start;?>

<div class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack" uk-grid>
    <?php if (is_array($characteristic_displayfields) && count($characteristic_displayfields)) : ?>
    <div class="filter_characteristic">
        <?php foreach ($characteristic_displayfields as $ch_id) : ?>
        <fieldset class="uk-fieldset">
            <div class="uk-margin">
                <label class="uk-form-label">
                    <?php if ($characteristic_fields[$ch_id]->groupname!=$groupname) {
    $groupname = $characteristic_fields[$ch_id]->groupname; ?>
                    <?php print $groupname; ?>
                    <?php
}?>
                    <span class="uk-margin">
                        <?php print $characteristic_fields[$ch_id]->name;?>
                    </span>
                </label>

                <div class="uk-form-controls">
                    <?php if ($characteristic_fields[$ch_id]->type==0) {?>
                    <input type="hidden" name="extra_fields[<?php print $ch_id?>][]" value="0" />
                    <?php if (is_array($characteristic_fieldvalues[$ch_id])) {?>
                    <?php foreach ($characteristic_fieldvalues[$ch_id] as $val_id=>$val_name) {?>
                    <div class="characteristic_val">
                        <input class="uk-checkbox uk-margin-left" type="checkbox" name="extra_fields[<?php print $ch_id?>][]" value="<?php print $val_id;?>" <?php if (is_array($extra_fields_active[$ch_id]) && in_array($val_id, $extra_fields_active[$ch_id])) {
        print "checked";
    }?> />
                        <?php print $val_name;?>
                    </div>
                    <?php }?>
                    <?php }?>
                    <?php } else {?>
                    <div class="uk-margin">
                        <input type="text" name="extra_fields[<?php print $ch_id?>]" class="el-input uk-input" />
                    </div>
                    <?php }?>
                </div>
            </div>
        </fieldset>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?php print $this->tmp_ext_search_html_characteristic_end;?>