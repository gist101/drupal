// @doc http://stackoverflow.com/questions/318630/get-real-image-width-and-height-with-javascript-in-safari-chrome
// @doc http://stackoverflow.com/questions/19509865/chrome-cannot-get-the-width-and-height-from-an-image-created-by-javascript

http://css-tricks.com/snippets/jquery/get-an-images-native-width/

var image = new Image();
image.onload = function() {
    var width = image.width;
    var height = image.height;
}
image.src = IMAGE_URL;


    (function($) {
      $(function() {
        /*
        var image = new Image();
        image.src = $('#hello-world').attr('src');
        image.onload = function() {
          anno.makeAnnotatable($('#hello-world')[0]);
        };
        */
        $('#hello-world').on('load', function() {
          anno.makeAnnotatable($(this)[0]);
        });
      });
    })(jQuery);
    
// Another issue: Cached image
http://mikefowler.me/2014/04/22/cached-images-load-event/  // This seems not so correct
http://stackoverflow.com/questions/3877027/jquery-callback-on-image-load-even-when-the-image-is-cached

$("img").one("load", function() {
  // do stuff
}).each(function() {
  if(this.complete) $(this).load();
});