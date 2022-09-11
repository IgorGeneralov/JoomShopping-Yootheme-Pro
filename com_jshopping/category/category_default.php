<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die();

print $this->_tmp_category_html_start;

?>
<h1 class="uk-h1">
    <?php print $this->category->name?>
</h1>

<?php if (count($this->categories)) : ?>
<div class="tm-category uk-grid-medium uk-grid-match uk-grid" uk-height-match="target: .uk-card" uk-grid>
    <?php foreach ($this->categories as $k=>$category) : ?>
    <div class="uk-width-1-<?php echo $this->count_category_to_row;?>@m uk-width-1-1 uk-width-1-2@s">
        <div class="uk-card uk-card-default uk-card-hover uk-card-small">
            <div class="uk-card-media-top uk-text-center">
                <div class="uk-inline-clip uk-transition-toggle">
                    <a href="<?php print $category->category_link;?>">
                        <img class="el-image uk-transition-scale-up uk-transition-opaque" src="<?php print $this->image_category_path;?>/<?php if ($category->category_image) {
    print $category->category_image;
} else {
    print $this->noimage;
} ?>" alt="<?php print htmlspecialchars($category->name)?>" title="<?php print htmlspecialchars($category->name)?>" />
                    </a>
                    <div class="uk-position-center">
                        <span class="uk-transition-fade uk-icon" uk-icon="icon: plus; ratio: 2"></span>
                    </div>
                </div>


            </div>
            <div class="uk-card-body">
                <h4 class="uk-h4">
                    <a class="product_link" href="<?php print $category->category_link?>">
                        <?php print $category->name?>
                    </a>
                </h4>
                <div class="uk-text-small">
                    <?php print $category->short_description?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div class="uk-margin uk-text-meta">
    <?php print $this->category->description?>
</div>

<?php print $this->_tmp_category_html_before_products;?>

<?php include(dirname(__FILE__)."/products.php");?>

<?php print $this->_tmp_category_html_end;?>