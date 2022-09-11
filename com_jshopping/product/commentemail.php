<?php
/**
* @version      5.0.0 15.09.2018
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die;
?>
<?php print JText::_('JSHOP_PRODUCT')?>: <?php print $this->product_name;?><br />
<?php print JText::_('JSHOP_REVIEW_USER_NAME')?>: <?php print $this->user_name;?><br />
<?php print JText::_('JSHOP_REVIEW_USER_EMAIL')?>: <?php print $this->user_email;?><br />
<?php print JText::_('JSHOP_REVIEW_MARK_PRODUCT')?>: <?php print $this->mark;?><br />
<?php print JText::_('JSHOP_COMMENT')?>:<br />
<?php print nl2br($this->review)?>