<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('popup', 'append');
?>
    <section id="popupclasse">
        <section id="inpopup">
            <section class="titre classe">
                <div class="awsm exit"></div>
                <h3>CHOIX DE LA CLASSE</h3></section>
            <section class="contenu classechx">
                <h6 data-idclasse="1" data-lvl="3" data-niv="1">3<sup>1</sup></h6>
                <h6 data-idclasse="2" data-lvl="3" data-niv="2">3<sup>2</sup></h6>
                <h6 data-idclasse="3" data-lvl="3" data-niv="3">3<sup>3</sup></h6>
            </section>
        </section>
    </section>
<?php
$this->endblock();
$this->block('container');
?>
    <section id="corps" class="evaluer">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm">  </span> <span id="classe">?</sup></span></h3>

            <h1>EVALUER <span class="awsm">  </span><span id="evalchx">?</span></h1>

        </section>
        <section id="contenu" style="width: 90%">
            <!--      <div class="boutons">
                      <h4 class="optaff">OPTIONS D'AFFICHAGE</h4>
                  </div>-->
            <section id="cases">

            </section>
        </section>
    </section>
<?php
$this->endblock();
$this->block('js:script');
?>
    <script>
        var current_class = null;
        var current_eval = null;


        $('.classechx > h6').click(function () {
            current_class = $(this).data('idclasse');
            lvl = $(this).data('lvl');
            niv = $(this).data('niv');

            $('#classe').html(lvl + '<sup>' + niv + '</sup>');
            $('#popupclasse').slideUp()
        });

        $('.itemchx > a').click(function (e) {
            e.preventDefault();
            current_eval = $(this).data('ideval');


            $('#evalchx').text($(this).text());
            $('#popup').slideUp()

            if (current_class != null && current_eval != null) {

                $.get('/api/classe/' + current_class + '/users/', function (data) {

                    var users = JSON.parse(data).log[0];
                    var html = '';

                    for (var i = 0; i < users.length; i++) {

                        html += '<article draggable="true" data-idelv="' + users[i].id + '">';
                        html += '<div class="awsm perso" style="color:rgb(255,153,0)"></div>';
                        html += '<div class="nom">' + users[i].name + '</div>';
                        html += '<div class="awsm taxo" style="color:rgb(51,255,0)"><span></span>';
                        html += '<span style="color:rgb(0,255,0)"></span><span style="color:rgb(255,204,0)"></span>';
                        html += '<span style="color:rgb(0,255,0)"></span></div>';
                        html += '<div class="prctg">60</div>';
                        html += '</article>';
                    }

                    $('#cases').html(html);

                });
            }
        });

    </script>
<?php
$this->endblock();