<?php
// THEME SETTINGS
function theme_settings_page() {
  ?>
  <div class="wrap">
  <h1>SendGrid Subscribe Button</h1>
  <form method="post" action="options.php">
    <?php
    settings_fields( 'section' );
    do_settings_sections( 'theme-options' );
    submit_button();
    ?>
  </form>
  </div>
  <?php
}

function add_theme_menu_item() {
  add_menu_page( 'SendGrid Subscribe Button', 'SSB', 'manage_options', 
  'sendgrid-subscribe-button', 'theme_settings_page', null, 99 );
}
add_action( 'admin_menu', 'add_theme_menu_item' );

// THEME OPTIONS
function setting_api_key() {
  ?>
  <input type="text" name="api_key" id="api_key" 
  value="<?php echo get_option( 'api_key' ); ?>" />
  <?php
}

function setting_use_old() {
  ?>
  <input type="checkbox" name="use_old" id="use_old" 
  value="1"<?php checked( '1', get_option('use_old') ); ?> />
  <?php
}

function setting_list_name() {
  ?>
  <input type="text" name="list_name" id="list_name" 
  value="<?php echo get_option( 'list_name' ); ?>" />
  <?php
}

function setting_success_response() {
  ?>
  <textarea rows="3" cols="36" name="success_response" id="success_response">
    <?php echo get_option( 'success_response' ); ?>
  </textarea>
  <?php
}

function setting_error_response() {
  ?>
  <textarea rows="3" cols="36" name="error_response" id="error_response">
    <?php echo get_option( 'error_response' ); ?>
  </textarea>
  <?php
}

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );

  add_settings_field( 'api_key', 'Enter API Key', 'setting_api_key', 'theme-options', 'section' );
  register_setting( 'section', 'api_key' );

  add_settings_field( 'use_old', 'Use Old Marketing', 'setting_use_old', 'theme-options', 'section' );
  register_setting( 'section', 'use_old' );

  add_settings_field( 'list_name', 'Enter List Name', 'setting_list_name', 'theme-options', 'section' );
  register_setting( 'section', 'list_name' );

  add_settings_field( 'success_response', 'Enter Success Response', 'setting_success_response', 'theme-options', 
  'section' );
  register_setting( 'section', 'success_response' );

  add_settings_field( 'error_response', 'Enter Error Response', 'setting_error_response', 'theme-options', 
  'section' );
  register_setting( 'section', 'error_response' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );
?>