$('body').on('click', 'ul li', function () {
    $(this).toggleClass('actif').next('ul').slideToggle();
});

$('#evalchx').on('click', function () {
    var liste = "";
    for (var i in evals) {
        liste += '<h6 data-ideval="' + i + '">' + evals[i]['nom'] + '</h6>';
    }
    genererpopup("eval", "CHOIX DE L'EVALUATION", 'evalchx">', liste);
});

$('#popup').on('click', '.evalchx h6', function () {
    IDeval = $(this).data('ideval');
    $('#evalchx').html($(this).html());
//changer l'information Ã©valuation remplie ou pas
    $('#popup').slideToggle();
});

$('.classe').on('click', function () {
    liste = "";
    for (var i in classes) {
        liste += '<h6 data-idclasse="' + i + '">' + classes[i]['nom'] + '</h6>';
    }
    genererpopup("classe", "CHOIX DE LA CLASSE", 'classechx">', liste);
});

$('#popup').on('click', '.classechx h6', function () {
    var IDclasse = $(this).data('idclasse');

    $('#titre .classe').html($(this).html());
    $('#cases').empty();
    if ($('#corps').hasClass('evaluer')) {
        gen_case_eleves(IDclasse);
    }


    $('#popup').slideToggle();
});

$('#popup').on('click', ' .exit', function () {
    $('#popup').slideToggle();
});