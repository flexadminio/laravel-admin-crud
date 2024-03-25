class Fullscreen {
  constructor() {

  }

  init() {
    this.toggle();
  }

  toggle() {
    $('[data-action="fullscreen"]').on('click', (e) => {
      e.preventDefault();

      if ($(this).children('i').hasClass('fa-expand')) {
        $(this).children('i').removeClass('fa-expand');
        $(this).children('i').addClass('fa-compress');
        $(this).closest('.card-widgets').find('a:not([data-action="fullscreen"])').hide();
      } else if ($(this).children('i').hasClass('fa-compress')) {
        $(this).children('i').removeClass('fa-compress');
        $(this).children('i').addClass('fa-expand');
        $(this).closest('.card-widgets').find('a:not([data-action="fullscreen"])').show();
      }

      $(this).closest('.card').toggleClass('card-fullscreen');
    });
  }

}

export default Fullscreen;
