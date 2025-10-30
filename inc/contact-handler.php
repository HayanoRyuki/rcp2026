<?php
// 提案フォームの送信処理

function handle_proposal_form_submission() {
  $params = [
    'contact' => [
      'contact_type'   => sanitize_text_field($_POST['contact_type']),
      'company_name'   => sanitize_text_field($_POST['company_name']),
      'last_name'      => sanitize_text_field($_POST['last_name']),
      'first_name'     => sanitize_text_field($_POST['first_name']),
      'email'          => sanitize_email($_POST['email']),
      'phone_no'       => sanitize_text_field($_POST['phone_no']),
      'body'           => sanitize_textarea_field($_POST['body']),
    ]
  ];

  $response = wp_remote_post('https://api.receptionist.jp/api/contacts', [
    'method'  => 'POST',
    'headers' => [
      'Content-Type' => 'application/json',
    ],
    'body'    => wp_json_encode($params),
    'timeout' => 15,
  ]);

  if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
    wp_redirect(home_url('/thanks'));
    exit;
  } else {
    wp_redirect(add_query_arg('error', '1', wp_get_referer()));
    exit;
  }
}

add_action('admin_post_submit_proposal_form', 'handle_proposal_form_submission');
add_action('admin_post_nopriv_submit_proposal_form', 'handle_proposal_form_submission');
