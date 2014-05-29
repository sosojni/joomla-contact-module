<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="rapid_contact horizontal <?php echo $mod_class_suffix; ?>">
	<form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
		<div class="rapid_contact intro_text <?php echo $mod_class_suffix; ?>">
			<?php echo $pre_text; ?>
		</div>
		<?php if ($myError != '') : ?>
		  <?php echo $myError; ?>
		<?php endif; ?>
		<?php if ($enable_anti_spam && $anti_spam_position == 0) : ?>
			<?php echo $myAntiSpamQuestion; ?><input class="rapid_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_anti_spam_answer" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_ANTISPAM_ANSWER; ?>"/>
		<?php endif; ?>
		<div class="column1">
			<div class="subject-lable">
				<?php echo $mySubjectLabel; ?>
			</div>
			<div class="subject-input">
				<input class="rapid_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_subject" size="<?php echo $subjectWidth; ?>" value="<?php echo $CORRECT_SUBJECT; ?>"/>
			</div>
			<div class="email-lable">
				<?php echo $myEmailLabel; ?>
			</div>
			<div class="email-input">
				<input class="rapid_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_email" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_EMAIL; ?>"/>
			</div>
			<div class="fileUpload">
			    <span class="upload-image">+ </span><span><?php echo $uploadButtonText; ?></span>
			    <input name="attachment" type="file" class="upload" />
			</div>
		</div>
		<div class="column2">
			<div class="message-lable">
				<?php echo $myMessageLabel; ?>
			</div>
			<div class="message-input">
				<textarea class="rapid_contact textarea <?php echo $mod_class_suffix; ?>" name="rp_message" cols="<?php echo $messageWidth; ?>" rows="4"><?php echo $CORRECT_MESSAGE; ?></textarea>
			</div>
			<?php if ($enable_anti_spam && $anti_spam_position == 1) : ?>
				<?php echo $myAntiSpamQuestion; ?>
				<input class="rapid_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_anti_spam_answer" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_ANTISPAM_ANSWER; ?>"/>
			<?php endif; ?>
			<?php echo JHtml::_( 'form.token' ); ?>
			<input type="hidden" name="form_id" value="<?php echo $module->id; ?>">
			<input class="rapid_contact button <?php echo $mod_class_suffix; ?>" type="submit" value="<?php echo $buttonText; ?>" style="width: <?php echo $buttonWidth; ?>%"/>
		</div>
	</form>
</div>