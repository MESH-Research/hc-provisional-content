jQuery( function() {
  // disable relevant visibility radio buttons and add explanatory notice to label
  $( '#blog_public_on, #blog_public_off, #blog-private-1, #blog-private-2' ).each( function() {
    $( this )
      .attr( 'checked', false )
      .attr( 'disabled', true )
      .parents( 'label' )
      .append( '<br><small><em>This option is only available to vetted users.</em></small>' );
  } );

  // since blogs don't get created before the user sees visibility options (so we can't filter initial values), set them here
  $( '#blog-private-3' )
    .attr( 'checked', true );
} );
