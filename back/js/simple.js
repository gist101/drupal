(function($) {

Drupal.behaviors.exampleAction = {
  attach: function(context, settings) {
    $('.example-action', context).once('example-action', function() {
      $('.thumbnails.equal-height').find('.thumbnail').koreEqualHeight();

      $(window).resize(function () {
        $('.thumbnails.equal-height').find('.thumbnail').koreEqualHeight();
      });
    });
  }
}

})(jQuery);
