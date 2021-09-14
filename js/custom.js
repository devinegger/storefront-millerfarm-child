/**
 * Handheld Footer Bar scroll control
 * When the user scrolls down the page hide the Footer Bar, when they scroll up show it.
 */
var lastScrollPosition;

$(document).scroll( function() {
  var scrollPosition = $(this).scrollTop();
    console.log('scrolling down');

  // Scrolling down
  if (scrollPosition > lastScrollPosition){
        $('.storefront-handheld-footer-bar').hide();
    /* If the footer is currently showing
    if (!$('[data-role=header].ui-fixed-hidden').length) {
      $('[data-role=header]').toolbar('hide');
    }
    */
  } 

  // Scrolling up
  else {
        $('.storefront-handheld-footer-bar').show();
    /* If the header is currently hidden
    if ($('[data-role=header].ui-fixed-hidden').length) {
      $('[data-role=header]').toolbar('show');
    }
    */
  }

  lastScrollPosition = scrollPosition;  
});