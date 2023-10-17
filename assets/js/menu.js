$('.menu').hover(function() {
    $(this).find('.menu-footer').show();
    $(this).find('.menu-price').show();
    $(this).find('.menu-header>.pull-right').show();
    $(this).find('.menu-header').addClass('bg-theme');
    $(this).find('.menu-filter').css('background-color', 'rgba(176,224,230,0.0)');
    $(this).find('.menu-header').css('color', 'white');
  }, function() {
    $(this).find('.menu-footer').hide();
    $(this).find('.menu-price').hide();
    $(this).find('.menu-header>.pull-right').hide();
    $(this).find('.menu-header').removeClass('bg-theme')
    $(this).find('.menu-filter').css('background-color', 'rgba(176,224,230,0.1)');
    $(this).find('.menu-header').css('color', 'black');
  });