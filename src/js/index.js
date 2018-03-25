
( () => {

  // Add a body class when the window has completed loading.
  window.addEventListener( 'load', () => {
    document.querySelectorAll( 'body' )[0].classList.add( 'loaded' );
  });

})();
