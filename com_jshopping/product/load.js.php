<?php
/**
* @version      5.0.0 15.09.2018
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();
?>
<script type="text/javascript">
    var jshopParams = jshopParams || {};

    <?php if ($this->product->product_quantity >0) {?>
    jshopParams.translate_not_available = "<?php print addslashes(JText::_('JSHOP_PRODUCT_NOT_AVAILABLE_THIS_OPTION'))?>";
    <?php } else {?>
    jshopParams.translate_not_available = "<?php print addslashes(JText::_('JSHOP_PRODUCT_NOT_AVAILABLE'))?>";
    <?php }?>

    jshopParams.translate_zoom_image = "<?php print addslashes(JText::_('JSHOP_ZOOM_IMAGE'))?>";
    jshopParams.product_basic_price_volume = <?php print $this->product->weight_volume_units;?>;
    jshopParams.product_basic_price_unit_qty = <?php print $this->product->product_basic_price_unit_qty;?>;
    jshopParams.currency_code = "<?php print $this->config->currency_code;?>";
    jshopParams.format_currency = "<?php print $this->config->format_currency[$this->config->currency_format];?>";
    jshopParams.decimal_count = <?php print $this->config->decimal_count;?>;
    jshopParams.decimal_symbol = "<?php print $this->config->decimal_symbol;?>";
    jshopParams.thousand_separator = "<?php print $this->config->thousand_separator;?>";
    jshopParams.attr_value = new Object();
    jshopParams.attr_list = new Array();
    jshopParams.attr_img = new Object();

    <?php if (count($this->attributes)) {?>
        <?php $i=0; foreach ($this->attributes as $attribut) {?>
        jshopParams.attr_value["<?php print $attribut->attr_id?>"] = "<?php print $attribut->firstval?>";
        jshopParams.attr_list[<?php print $i++;?>] = "<?php print $attribut->attr_id?>";
        <?php } ?>
    <?php } ?>

    <?php foreach ($this->all_attr_values as $attrval) {
    if ($attrval->image) {?>
    jshopParams.attr_img[<?php print $attrval->value_id?>] = "<?php print $attrval->image?>";<?php }
}?>
    jshopParams.liveurl = '<?php print \JURI::root()?>';
    jshopParams.liveattrpath = '<?php print $this->config->image_attributes_live_path;?>';
    jshopParams.liveproductimgpath = '<?php print $this->config->image_product_live_path;?>';
    jshopParams.liveimgpath = '<?php print $this->config->live_path."images";?>';
    jshopParams.urlupdateprice = '<?php print $this->urlupdateprice;?>';
    jshopParams.joomshoppingVideoHtml5Type = '<?php print $this->config->video_html5_type?>';
    <?php print $this->_tmp_product_ext_js;?>
</script>
