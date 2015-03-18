<!DOCTYPE html>
<html>
<head>
    <title>Maestria</title>
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="/css/maestria.css" rel="stylesheet" type="text/css">
    <link href='/css/print.css' rel='stylesheet' type='text/css' media="print">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <a href="index.html">Maestria</a> Evaluer c'est connaître et comprendre c'est progresser
    <div id="logzone">
        <div class="login">Albert Einstein</div>
        <div class="logout">DECONNEXION</div>
    </div>
</header>
<nav>

    <h3><a href="classes.html">CLASSES</a></h3>

    <h3 class="synthese"><a href="synthese.html">SYNTHESE</a></h3>
    <br/>

    <h3><a href="evals.html">EVALUATIONS</a></h3>

    <h3 id="evalchx" class="eval">PUISSANCE</h3>

    <div class="flechebas"></div>
    <h3 class="eval"><a href="correction.html">CORRECTION</a></h3>
    <br/>

    <h3><a href="items.html">ITEMS PEDA</a></h3>

    <footer>
        <a href="">Contact</a>
        <a href="http://metaphysik.fr">Metaphysik</a>
    </footer>
</nav>
<section id="popup">
    <section id="inpopup">

    </section>
</section>
<section id="corps" class="evaluer">
    <div id="fleche"></div>
    <section id="titre">
        <h3 class="classe">3<sup>2</sup></h3>

        <h1>EVALUER</h1>

    </section>
    <section id="contenu">
        <div class="boutons">
            <h4 class="optaff">OPTIONS D'AFFICHAGE</h4>
        </div>
        <section id="cases">


        </section>
    </section>
</section>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/js/maestria.js"></script>
<script>

    gen_case_eleves(IDclasse);


    function gen_case_eleves(IDclasse) {
        content = "";
        var c = Object.keys(classes[IDclasse]).length;
        for (var i = 1; i < c; i++) {//i représentera la position de l'élève
            content += '<article data-idelv="' + classes[IDclasse][i][0];
            content += '"><div class="awsm perso" style="color:rgb(' + couleur(classes[IDclasse][i][6]);
            content += ',0)">&#xf007;</div><div class="nom">' + classes[IDclasse][i][1];
            content += '</div><div class="awsm taxo" style="color:rgb(' + couleur(classes[IDclasse][i][2]);
            content += ',0)"><span>&#xf02d;</span><span style="color:rgb(' + couleur(classes[IDclasse][i][3]);
            content += ',0)">&#xf0e2;</span><span style="color:rgb(' + couleur(classes[IDclasse][i][4]) + ',0)">&#xf0ad;</span><span style="color:rgb(' + couleur(classes[IDclasse][i][2]) + ',0)">&#xf005;</span></div>	<div class="prctg">' + classes[IDclasse][i][7] + '</div></article>';

        }

        $('#cases').html(content);
        //actualiser opt aff?
    }

    //ouverture fenetre popup options affichage
    $('.optaff').on('click', function () {
        genererpopup("optaff", "OPTIONS D'AFFICHAGE", 'optaffchx">', '<form ><label for="rangee">NOMBRE D\'ELEVE PAR LIGNE</label><input type="number" name="rangee" id="rangee" min="1"><div><h6>ITEM ASSOCIE AU CHIFFRE</h6><input name="itemchiffre" placeholder="A choisir parmi les items pédagogiques"><span class="awsm chitem">&#xf0b1;</span></div><div><h6>ITEM ASSOCIE A LA COULEUR</h6><input name="itemcouleur" placeholder="A choisir parmi les items pédagogiques"><span class="awsm chitem">&#xf0b1;</span> </div></div><div id="creer" class="similiexit">APPLIQUER</div></form><ul id="chitem"></ul>');
    });

    //gérer le nombre d'éleve par rangée
    $('#popup').on('click', '.similiexit', function () {
        rangee = $('#rangee').val();
        console.log(rangee);
        $("#cases").width(145 * rangee);
        $('#popup').slideToggle();
    });

    $('#popup').on('click', '.chitem', function () {
        list_item('#chitem', false);
    });


</script>

<script src="/js/interaction.js"></script>
</html>
