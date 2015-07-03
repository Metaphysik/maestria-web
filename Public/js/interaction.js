$('body').on('click', 'ul li', function () {
    $(this).toggleClass('actif').next('ul').slideToggle();
});

$('#evalchx').on('click', function () {
    $('#popup').slideDown();
});

$('.classe').on('click', function () {
    $('#popupclasse').slideDown();
});

$('#popup').on('click', ' .exit', function () {
    $('#popup').slideUp();
});

$('#popupclasse').on('click', ' .exit', function () {
    $('#popupclasse').slideUp();
});

$('#popupevl').on('click', ' .exit', function () {
    $('#popupevl').slideUp();
});