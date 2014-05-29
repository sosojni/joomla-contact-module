<?php
// no direct access
defined('_JEXEC') or die;

//Email Parameters
$recipient = $params->get('email_recipient', '');
$fromName = @$params->get('from_name', 'Rapid Contact');
$fromEmail = @$params->get('from_email', 'rapid_contact@yoursite.com');

$myEmailLabel = $params->get('email_label', 'Email:');
$mySubjectLabel = $params->get('subject_label', 'Subject:');
$myMessageLabel = $params->get('message_label', 'Message:');
$myAditional1Active = $params->get('rc_field_1_active', '0');
$myAditional1Label = $params->get('rc_field_1_label', 'Aditional field 1');
$myAditional2Active = $params->get('rc_field_2_active', '0');
$myAditional2Label = $params->get('rc_field_2_label', 'Aditional field 2');
$myAditional3Active = $params->get('rc_field_3_active', '0');
$myAditional3Label = $params->get('rc_field_3_label', 'Aditional field 3');
$myAditional4Active = $params->get('rc_field_4_active', '0');
$myAditional4Label = $params->get('rc_field_4_label', 'Aditional field 4');
$myAditional5Active = $params->get('rc_field_5_active', '0');
$myAditional5Label = $params->get('rc_field_5_label', 'Aditional field 5');

$uploadButtonText = $params->get('upload_button_text', 'Upload');
$buttonText = $params->get('button_text', 'Send Message');
$pageText = $params->get('page_text', 'Thank you for your contact.');
$errorText = $params->get('error_text', 'Your message could not be sent. Please try again.');
$noEmail = $params->get('no_email', 'Please write your email');
$invalidEmail = $params->get('invalid_email', 'Please write a valid email');
$invalidExtension = $params->get('invalid_extension', 'File extension is ilegal. Please upload jpg, jpeg, pdf or png file');
$wrongantispamanswer = $params->get('wrong_antispam', 'Wrong anti-spam answer');
$pre_text = $params->get('pre_text', '');

// Size and Color Parameters
$thanksTextColor = $params->get('thank_text_color', '#FF0000');
$error_text_color = $params->get('error_text_color', '#FF0000');
$emailWidth = $params->get('email_width', '15');
$subjectWidth = $params->get('subject_width', '15');
$messageWidth = $params->get('message_width', '13');
$buttonWidth = $params->get('button_width', '100');
$label_pos = $params->get('label_pos', '0');

// URL Parameters
$exact_url = $params->get('exact_url', true);
$disable_https = $params->get('disable_https', true);
$fixed_url = $params->get('fixed_url', true);
$myFixedURL = $params->get('fixed_url_address', '');

// Anti-spam Parameters
$enable_anti_spam = $params->get('enable_anti_spam', true);
$myAntiSpamQuestion = $params->get('anti_spam_q', 'How many eyes has a typical person?');
$myAntiSpamAnswer = $params->get('anti_spam_a', '2');
$anti_spam_position = $params->get('anti_spam_position', 0);

// Module Class Suffix Parameter
$mod_class_suffix = $params->get('moduleclass_sfx', '');


if ($fixed_url) {
  $url = $myFixedURL;
}
else {
  if (!$exact_url) {
    $url = JURI::current();
  }
  else {
    if (!$disable_https) {
      $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
    else {
      $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
  }
}

$url = htmlentities($url, ENT_COMPAT, "UTF-8");

$myError = '';
$CORRECT_ANTISPAM_ANSWER = '';
$CORRECT_EMAIL = '';
$CORRECT_SUBJECT = '';
$CORRECT_MESSAGE = '';

if (isset($_POST["rp_email"]) && $_POST["form_id"] == $module->id) {
  $CORRECT_SUBJECT = htmlentities($_POST["rp_subject"], ENT_COMPAT, "UTF-8");
  $CORRECT_MESSAGE = htmlentities($_POST["rp_message"], ENT_COMPAT, "UTF-8");
  // check anti-spam
  if ($enable_anti_spam) {
    if ($_POST["rp_anti_spam_answer"] != $myAntiSpamAnswer) {
      $myError = '<span style="color: ' . $error_text_color . ';">' . $wrongantispamanswer . '</span>';
    }
    else {
      $CORRECT_ANTISPAM_ANSWER = htmlentities($_POST["rp_anti_spam_answer"], ENT_COMPAT, "UTF-8");
    }
  }

  // check email
  if ($_POST["rp_email"] === "") {
    $myError = '<span style="color: ' . $error_text_color . ';">' . $noEmail . '</span>';
  }
  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", strtolower($_POST["rp_email"]))) {
    $myError = '<span style="color: ' . $error_text_color . ';">' . $invalidEmail . '</span>';
  }
  else {
    $CORRECT_EMAIL = htmlentities($_POST["rp_email"], ENT_COMPAT, "UTF-8");
  }

  /* GET File Variables */
	$tmpName = $_FILES['attachment']['tmp_name'];
	$fileType = $_FILES['attachment']['type'];
	$fileName = $_FILES['attachment']['name'];
	$uploadext = pathinfo($fileName, PATHINFO_EXTENSION);
	$allowedext = array('jpg','jpeg','png','pdf');
	$allowedattachment = false;
	foreach ($allowedext as $extension) {
		if ($extension == $uploadext) {
			$allowedattachment = true;
		}
	}
	if (isset($_FILES['attachment']) && $allowedattachment == false)
	{
		$myError = '<span style="color: ' . $error_text_color . ';">' . $invalidExtension . '</span>';
	}

  if ($myError == '') {

    if (isset($_POST["rp_aditional1"])) $myAditional1 = $_POST["rp_aditional1"];
    if (isset($_POST["rp_aditional2"])) $myAditional2 = $_POST["rp_aditional2"];
    if (isset($_POST["rp_aditional3"])) $myAditional3 = $_POST["rp_aditional3"];
    if (isset($_POST["rp_aditional4"])) $myAditional4 = $_POST["rp_aditional4"];
    if (isset($_POST["rp_aditional5"])) $myAditional5 = $_POST["rp_aditional5"];

    $mySubject = $_POST["rp_subject"];
    $myMessage = 'You received a message from '. $_POST["rp_email"] ."\n\n". $_POST["rp_message"];
    if ($myAditional1 != "") $myMessage .= "\n\n".$myAditional1Label." :".$myAditional1;
    if ($myAditional2 != "") $myMessage .= "\n\n".$myAditional2Label." :".$myAditional2;
    if ($myAditional3 != "") $myMessage .= "\n\n".$myAditional3Label." :".$myAditional3;
    if ($myAditional4 != "") $myMessage .= "\n\n".$myAditional4Label." :".$myAditional4;
    if ($myAditional5 != "") $myMessage .= "\n\n".$myAditional5Label." :".$myAditional5;

    $mailSender = &JFactory::getMailer();
    $mailSender->addRecipient($recipient);

    $mailSender->setSender(array($fromEmail,$fromName));
    $mailSender->addReplyTo(array( $_POST["rp_email"], '' ));

    $mailSender->setSubject($mySubject);
    $mailSender->setBody($myMessage);

	if ($allowedattachment == true) {
		$mailSender->addAttachment($tmpName, $fileName);
	}
    
    if ($mailSender->Send() !== true) {
      $myReplacement = '<span style="color: ' . $error_text_color . ';">' . $errorText . '</span>';
      print $myReplacement;
      return true;
    }
    else {
      $myReplacement = '<span style="color: '.$thanksTextColor.';">' . $pageText . '</span>';
      print $myReplacement;
      return true;
    }

  }
} // end if posted

// check recipient
if ($recipient === "") {
  $myReplacement = '<span style="color: ' . $error_text_color . ';">No recipient specified</span>';
  print $myReplacement;
  return true;
}

require JModuleHelper::getLayoutPath('mod_rapid_contact', $params->get('layout', 'horizontal'));