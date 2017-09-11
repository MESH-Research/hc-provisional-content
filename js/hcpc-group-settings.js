jQuery( function() {
  // disable relevant visibility radio buttons and add explanatory notice to label
  $( 'input[value="public"], input[value="private"]' ).each( function() {
    $( this )
      .attr( 'disabled', true )
      .parents( 'label' )
      .append( '<br><br><small><em>This option is only available to vetted users.</em></small>' );
  } );
} );
