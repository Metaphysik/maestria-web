<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $evaluation \Application\Entities\Evaluation
 * @var $questions Array
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('popup', 'append');
?>
    <section id="popupclasse">
        <section id="inpopup">
            <section class="titre classe">
                <div class="awsm exit"><i class="fa fa-close"></i></div>
                <h3>CHOIX DE LA CLASSE</h3></section>
            <section class="contenu classechx">

                <?php foreach ($classes as $classe) {
                    /**
                     * @var $classe \Application\Entities\Classroom
                     */
                    echo '<h6 data-idclasse="'.$classe->getId().'" data-lvl="3" data-niv="1">'.$classe->getLabel().'</h6>';
                } ?>

            </section>
        </section>
    </section>
    <section id="popupevl">
        <section id="inpopup">
            <section class="titre eval">
                <div class="awsm exit"><i class="fa fa-close"></i> </div>
                <h3 class="username"></h3>
            </section>
            <section id="popupevlcontent" class="contenu inputresult">
            </section>
        </section>
    </section>

<?php
$this->endblock();
$this->block('container');
?>
    <section id="corps" class="correction">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm"><i class="fa fa-caret-right"></i></span> <span id="classe">?</span></h3>
            <h1>CORRECTION <span class="awsm"><i class="fa fa-caret-right"></i></span><span id="evalchx"> ?</span></h1>

        </section>
        <section id="contenu">
            <div class="boutons">
                <h4 id="note">NOTE</h4>
                <h4 id="taxo">NIVEAUX TAXONOMIQUES</h4>
                <h4 id="conn">CONNAISSANCES</h4>
                <h4 id="comp">SAVOIR-FAIRE/ATTITUDE</h4>
            </div>
            <div id="correction" data-id="<?= $correction ?>">

            </div>
        </section>
    </section>

<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        var current_class = null;
        var current_eval = null;
        var current_elv = null;


        $('.classechx > h6').click(function () {
            current_class = $(this).data('idclasse');


            $('#classe').html($(this).text());
            $('#popupclasse').slideUp()

            viewData(current_class, current_eval);
        });

        $('.itemchx > a').click(function (e) {
            e.preventDefault();
            current_eval = $(this).data('ideval');


            $('#evalchx').text($(this).text());
            $('#popup').slideUp()

            viewData(current_class, current_eval);

        });

        var viewData = function (current_class, current_eval) {
            if (current_class != null && current_eval != null) {

                $.get('/api/classe/' + current_class + '/correction/'+current_eval+'/', function (data) {

//                    var users = JSON.parse(data).log[0];
                    var html = '';

                    $('#correction').text(data);

                    for (var i = 0; i < 11; i++) {
//                    for (var i = 0; i < users.length; i++) {

                        html += '<section>';
                        html += '    <div class="name">Nicolas</div>';
                        html += '    <div class="note">2</div>';
                        html += '    <div class="taxo">';
                        html += '        <div>';
                        html += '            <div class="awsm"><i class="fa fa-book"></i> </div><h5>Connaître</h5><!--div class="graf">graphe1</div-->';
                        html += '        </div>';
                        html += '        <div>';
                        html += '            <div class="awsm"><i class="fa fa-rotate-left"></i></div><h5>Comprendre</h5><!--div class="graf">graphe2</div-->';
                        html += '        </div>';
                        html += '        <div>';
                        html += '            <div class="awsm"><i class="fa fa-wrench"></i></div><h5>Appliquer</h5><!--div class="graf">graphe3</div-->';
                        html += '        </div>';
                        html += '        <div>';
                        html += '            <div class="awsm"><i class="fa fa-star"></i></div><h5>Analyser</h5><!--div class="graf">graphe4</div-->';
                        html += '        </div>';
                        html += '        <div class="apprct">Tu dois commencer par apprendre les définitions car elles te serviront souvent,';
                        html += '            il faut reformuler les explications pour bien les comprendre.Tu peux progresser encore en travaillant davantage les exercices.</div>';
                        html += '    </div>';
                        html += '    <div class="item conn">';
                        html += '        <article><div class="graf">l</div><div class="libelle">Le feu ça brule</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">L\'eau, ça mouille</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">Tous les oiseaux volent dans le ciel</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">Ta soeur bat le beurre à 300 à l\'heure sur le cyclo du facteur!</div></article>';
                        html += '    </div>';
                        html += '    <div class="item comp">';
                        html += '        <article><div class="graf">l</div><div class="libelle">Utiliser une fourchette</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">Savoir lécher son coude</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">Pouvoir écrire son nom dans la neige</div></article>';
                        html += '        <article><div class="graf">l</div><div class="libelle">Savoir quand se taire et quand parler à très bon escient ;-)</div></article>';
                        html += '    </div>';
                        html += '</section>';
                    }

//                    $('#correction').html(html);

                });
            }
        };
    </script>
<?php $this->endblock(); ?>