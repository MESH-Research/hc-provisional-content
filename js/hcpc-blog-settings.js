jQuery( function() {
  // disable relevant visibility radio buttons and add explanatory notice to label
  jQuery( '#blog-public, #blog-norobots, #blog_public_on, #blog_public_off, #blog-private-1, #blog-private-2' ).each( function() {
    jQuery( this )
      .attr( 'checked', false )
      .attr( 'disabled', true );

    jQuery( 'label[for="' + jQuery( this ).attr( 'id' ) + '"]' )
      .append( '<br><br><small><em>This option is only available to vetted users.</em></small>' );
  } );

  // since blogs don't get created before the user sees visibility options (so we can't filter initial values), set them here
  jQuery( '#blog-private-3' )
    .attr( 'checked', true );
} );
