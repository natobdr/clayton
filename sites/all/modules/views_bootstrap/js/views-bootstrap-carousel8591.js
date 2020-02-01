(function ($) {
  Drupal.behaviors.viewsBootstrapCarousel = {
    attach: function(context, settings) {
      $(function () {
        $.each(settings.viewsBootstrap.carousel, function(id, carousel) {
          try {
            carousel = $('#views-bootstrap-carousel-' + carousel.id);
            if(carousel !== undefined ) {
              $('#views-bootstrap-carousel-' + carousel.id, context).carousel(carousel.attributes);
            }
          }
          catch(err) {
            err = '';
          }
        });
      });
    }
  };
})(jQuery);
