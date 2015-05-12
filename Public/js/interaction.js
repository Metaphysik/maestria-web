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
$('#popup').on('click', '.evalchx h6', function () {
    IDeval = $(this).data('ideval');
    $('#evalchx').html($(this).html());
//changer l'information Ã©valuation remplie ou pas
    $('#popup').slideToggle();
}).on('click', '.classechx h6', function () {
    $('#popup').slideToggle();
}).on('click', ' .exit', function () {
    $('#popup').slideToggle();
});