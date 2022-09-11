<?php
/**
* @version      1.0.0 13.07.2022
* @author       Igor Generalov
* @copyright    Copyright (C) 2022 generalov.net. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>

<h1 class="uk-h1">
	<?php print JText::_('JSHOP_SEARCH_RESULT')?> <?php if ($this->search) {
    print '"'.$this->search.'"';
}?>
</h1>
<div class="uk-margin">
    <?php echo JText::_('JSHOP_NO_SEARCH_RESULTS')?>
</div>
