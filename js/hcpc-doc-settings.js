// this one has to use an observer unlike groups & blogs because:
// bpdv_refresh_access_settings() in buddypress-docs/includes/js/edit-validation.js
// overwrites the content of '#toggle-table-settings tbody' after the page has loaded
jQuery( function() {
    var observer = new MutationObserver( function() {
      if ( ! $( '#settings-read' ).prop( 'disabled' ) ) {
        $( '#settings-read' ).attr( 'disabled', true );
        $( 'label[for="settings-read"]' ).append( '<br><br><small><em>Only vetted users can create public docs.</em></small>' );
        observer.disconnect();
      }
    } );

    observer.observe( $( '#toggle-table-settings tbody' )[0], { childList: true } );
} );
