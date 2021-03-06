<?php
/**
 * Header modification functions for tm.id.au theme.
 *
 * @author Tim Malone <tdmalone@gmail.com>
 */

add_filter( 'the_generator', '__return_empty_string' );

/**
 * Outputs the Google Tag Manager code snippet designed for inclusion in the <head>.
 * Uses the TM_GTM_ID constant as the container ID.
 *
 * @return void
 */
function tm_add_google_tag_manager_head() {
  ?>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','<?php echo TM_GTM_ID; ?>');</script>
  <!-- End Google Tag Manager -->
  <?php
}

add_action( 'wp_head', 'tm_add_google_tag_manager_head' );

/**
 * Outputs the Google Tag Manager code snippet designed for inclusion in the <body>.
 * Uses the TM_GTM_ID constant as the container ID.
 *
 * @return void
 */
function tm_add_google_tag_manager_body() {
  ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo TM_GTM_ID; ?>"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <?php
}
