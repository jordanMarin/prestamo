// The function that will initialize your Snap.js instance
var doSnap = function(){
    if(window.snapper){
         // Snap.js already exists, we just need to re-bind events
        window.snapper.enable();
    } else {
        // Initialize Snap.js
        if ($(window).width() <= 767 ) {
          window.snapper = new Snap({
              element: document.getElementById('content'),
              disable: 'left'
          });
        }
    } 
};

$(document).ready(function () {
  // $('#mvcIcon').hide();
  $('#mvcIcon .mvcPointer').click(function () {
    $('#mvcMain').toggle(150);
    $('#mvcIcon').toggle(150);
  });
  $('#mvcMain .mvcPointer').click(function () {
    $('#mvcMain').toggle(150);
    $('#mvcIcon').toggle(150);
  });
  
  window.addEventListener('push', doSnap);
  doSnap();

  $('#open-right').click(function () {
    if (snapper.state().state === "right") {
      snapper.close();
    } else {
      snapper.open('right');
    }
  });
});