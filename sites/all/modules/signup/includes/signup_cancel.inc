<?php
/**
 * @file
 * Code for the page to cancel a signup from a secure link.
 */

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function signup_cancel_signup_page($signup, $token) {
  if (signup_valid_token($token, $signup->sid, 'cancel')) {
    return drupal_get_form('signup_cancel_link_confirm_form', $signup->sid);
  }
  drupal_set_message(t('Invalid link to cancel a signup.'), 'error');
  drupal_goto();
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function signup_cancel_link_confirm_form($form, $form_state, $sid) {
  $info = db_query("SELECT n.nid, n.title, s.* FROM {node} n INNER JOIN {signup_log} s ON n.nid = s.nid WHERE s.sid = :sid", array(':sid' => $sid))->fetchObject();

  $form['sid'] = array(
    '#type' => 'hidden',
    '#value' => $sid,
  );
  $form['nid'] = array(
    '#type' => 'hidden',
    '#value' => $info->nid,
  );
  $form['#submit'][] = 'signup_cancel_link_confirm_form_submit';

  $abort_url = isset($_GET['destination']) ? $_GET['destination'] : "node/$info->nid";

  // TODO: Should this include information to identify the username,
  // anon_mail, and possibly the custom signup form data, too?
  return confirm_form(
    $form,
    t('Are you sure you want to cancel the signup to %node_title?', array('%node_title' => $info->title)),
    $abort_url,
    t('This action cannot be undone.'),
    t('Cancel signup'), t('Keep signup')
  );
}

/**
 * @todo Please document this function.
 * @see http://drupal.org/node/1354
 */
function signup_cancel_link_confirm_form_submit($form, &$form_state) {
  signup_cancel_signup($form_state['values']['sid']);
  $form_state['redirect'] = 'node/' . $form_state['values']['nid'];
}

