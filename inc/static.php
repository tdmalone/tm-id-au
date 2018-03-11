<?php
/**
 * Tweaks and addons to support use of the Simply Static plugin.
 *
 * TODO: Use a better method for auth, such as https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/
 *
 * @author Tim Malone <tdmalone@gmail.com>
 * @see https://wordpress.org/plugins/simply-static/
 * @see https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
 * @see https://developer.wordpress.org/rest-api/using-the-rest-api/authentication/
 */

/**
 * Hooks into the Simply Static plugin, and starts its static site generation task. Attached to eg.
 * a REST route, this allows the static generation to be called remotely, such as during a CI job.
 *
 * @param WP_Rest_Request $request Data from the incoming REST API request.
 * @return void
 * @see https://developer.wordpress.org/reference/classes/wp_rest_request/
 */
function tm_simply_static_generate( WP_REST_Request $request ) {

  if ( ! is_plugin_active( 'simply-static/simply-static.php' ) ) {
    return new WP_REST_Response([
      'error' => 'Plugin Simply Static is not activated.'
    ], 500 );
  }

  $simply_static = new Simply_Static\Archive_Creation_Job();
  $simply_static->start();

  return new WP_REST_Response([
    'message' => 'Job started.'
  ], 200 );

} // Function tm_simply_static_generate.

add_action( 'rest_api_init', function() {
  register_rest_route( 'tm/v1', '/ss/generate', [

    'methods'  => 'POST',
    'callback' => 'tm_simply_static_generate',

    'permission_callback' => function() {
      return isset( $_GET['token'] ) && getenv( 'TM_WP_REST_API_TOKEN' ) === $_GET['token'];
    },

  ]);
});
