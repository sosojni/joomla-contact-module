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
<div class="razor_contact vertical <?php echo $mod_class_suffix; ?>">
	<form action="<?php echo $url; ?>" method="POST" enctype="multipart/form-data">
		<div class="razor_contact intro_text <?php echo $mod_class_suffix; ?>">
			<?php echo $pre_text; ?>
		</div>
		<?php if ($myError != '') : ?>
		  <?php echo $myError; ?>
		<?php endif; ?>
		<?php if ($enable_anti_spam && $anti_spam_position == 0) : ?>
			<?php echo $myAntiSpamQuestion; ?><input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_anti_spam_answer" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_ANTISPAM_ANSWER; ?>"/>
		<?php endif; ?>

		<?php if ($myAditional1Active == 1) : ?>
			<div class="aditional1-lable lable">
				<?php echo $myAditional1Label; ?>
			</div>
			<div class="aditional1-input">
				<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_aditional1" value="<?php echo $CORRECT_ADITIONAL1; ?>"/>
			</div>
		<?php endif; ?>

		<?php if ($myAditional2Active == 1) : ?>
			<div class="aditional2-lable lable">
				<?php echo $myAditional2Label; ?>
			</div>
			<div class="aditional2-input">
				<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_aditional2" value="<?php echo $CORRECT_ADITIONAL2; ?>"/>
			</div>
		<?php endif; ?>

		<?php if ($myAditional3Active == 1) : ?>
			<div class="aditional3-lable lable">
				<?php echo $myAditional3Label; ?>
			</div>
			<div class="aditional3-input">
				<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_aditional3" value="<?php echo $CORRECT_ADITIONAL3; ?>"/>
			</div>
		<?php endif; ?>

		<?php if ($myAditional4Active == 1) : ?>
			<div class="aditional4-lable lable">
				<?php echo $myAditional4Label; ?>
			</div>
			<div class="aditional4-input">
				<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_aditional4" value="<?php echo $CORRECT_ADITIONAL4; ?>"/>
			</div>
		<?php endif; ?>

		<?php if ($myAditional5Active == 1) : ?>
			<div class="aditional5-lable lable">
				<?php echo $myAditional5Label; ?>
			</div>
			<div class="aditional5-input">
				<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_aditional5" value="<?php echo $CORRECT_ADITIONAL5; ?>"/>
			</div>
		<?php endif; ?>
		<div class="subject-lable lable">
			<?php echo $mySubjectLabel; ?>
		</div>
		<div class="subject-input">
			<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_subject" size="<?php echo $subjectWidth; ?>" value="<?php echo $CORRECT_SUBJECT; ?>"/>
		</div>
		<div class="email-lable lable">
			<?php echo $myEmailLabel; ?>
		</div>
		<div class="email-input">
			<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_email" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_EMAIL; ?>"/>
		</div>
		<div class="message-lable lable">
			<?php echo $myMessageLabel; ?>
		</div>
		<div class="message-input">
			<textarea class="razor_contact textarea <?php echo $mod_class_suffix; ?>" name="rp_message" cols="<?php echo $messageWidth; ?>" rows="4"><?php echo $CORRECT_MESSAGE; ?></textarea>
		</div>
		<div class="fileUpload">
		    <span class="upload-image">+ </span><span><?php echo $uploadButtonText; ?></span>
		    <input name="attachment" type="file" class="upload" />
		</div>
		<?php if ($enable_anti_spam && $anti_spam_position == 1) : ?>
			<?php echo $myAntiSpamQuestion; ?>
			<input class="razor_contact inputbox <?php echo $mod_class_suffix; ?>" type="text" name="rp_anti_spam_answer" size="<?php echo $emailWidth; ?>" value="<?php echo $CORRECT_ANTISPAM_ANSWER; ?>"/>
		<?php endif; ?>
		<?php echo JHtml::_( 'form.token' ); ?>
		<input type="hidden" name="form_id" value="<?php echo $module->id; ?>">
		<input class="razor_contact button <?php echo $mod_class_suffix; ?>" type="submit" value="<?php echo $buttonText; ?>" />
	</form>
</div>