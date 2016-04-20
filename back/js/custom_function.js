(function($) {

Drupal.kpaneSettingsFormUpdateTemplate = function() {
  var kpane = $(":input[name='kpane']").val();
  var display = $(":input[name='settings[theme][display]']").val();
  var style = $(":input[name='settings[theme][style]']").val();
  var identity = $(":input[name='settings[theme][identity]']").val();
  var template = kpane;
  if (display != 'none') {
    template += '-' + display;
    if (style != 'none') {
      template += '-' + style;
      if (identity.length > 0) {
        template += '--' + identity;
      }
    }
  }
  $("#kpane-theme-hook-suggestion").text(template + '.tpl.php');
}

Drupal.behaviors.kpaneSettingsForm = {
  attach: function (context, settings) {
    // @issue Run 4 times after changed????
    $(":input[name='settings[theme][display]']").change(function () {Drupal.kpaneSettingsFormUpdateTemplate();});
    $(":input[name='settings[theme][style]']").change(function () {Drupal.kpaneSettingsFormUpdateTemplate();});
    $(":input[name='settings[theme][identity]']").change(function () {Drupal.kpaneSettingsFormUpdateTemplate();});
  }
}

})(jQuery);


(function ($) {
  $.fn.koreEqualHeight = function () {
    var maxHeight = 0,
      wrapper,
      wrapperHeight;

    return this.each(function () {

      // Applying a wrapper to the contents of the current element to get reliable height
      wrapper = $(this).wrapInner('<div class="wrapper" />').children('.wrapper');
      wrapperHeight = wrapper.outerHeight();

      maxHeight = Math.max(maxHeight, wrapperHeight);

      // Remove the wrapper
      wrapper.children().unwrap();

    }).height(maxHeight);
  }
})(jQuery);
