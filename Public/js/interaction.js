$('body').on('click', 'ul li', function () {
    $(this).toggleClass('actif').next('ul').slideToggle();
});

$('#evalchx').on('click', function () {
    $('#popup').slideToggle();
});


$('.classe').on('click', function () {
    liste = "";
    for (var i in classes) {
        liste += '<h6 data-idclasse="' + i + '">' + classes[i]['nom'] + '</h6>';
    }
    genererpopup("classe", "CHOIX DE LA CLASSE", 'classechx">', liste);
});
$('#popup').on('click', ' .exit', function () {
    $('#popup').slideToggle();
});