
'use strict';

( () => {

  const FIRST_INDEX = 0;

  // Add a body class when the window has completed loading.
  window.addEventListener( 'load', function() {
    document.querySelectorAll( 'body' )[ FIRST_INDEX ].classList.add( 'loaded' );
  });

})();
