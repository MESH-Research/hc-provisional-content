// this one has to use an observer unlike groups & blogs because:
// bpdv_refresh_access_settings() in buddypress-docs/includes/js/edit-validation.js
// overwrites the content of '#toggle-table-settings tbody' after the page has loaded
jQuery( function() {
  var observer = new MutationObserver( function() {
    var input_ids = [
      'settings-read',
      'settings-edit',
      'settings-read_comments',
      'settings-post_comments',
      'settings-view_history',
    ];

    $.each( input_ids, function( i, input_id ) {
      $( '#' + input_id ).attr( 'disabled', true );
      $( 'label[for="' + input_id + '"]' )
        .append( '<br><br><small><em>Only vetted users can create public docs.</em></small>' );
    } );

    observer.disconnect();
  } );

  observer.observe( $( '#toggle-table-settings tbody' )[0], { childList: true } );
} );
