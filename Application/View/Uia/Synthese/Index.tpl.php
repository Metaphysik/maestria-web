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
                    echo '<h6 data-idclasse="' . $classe->getId() . '" data-lvl="3" data-niv="1">' . $classe->getLabel() . '</h6>';
                } ?>

            </section>
        </section>
    </section>
<?php
$this->endblock();
$this->block('container');
?>
    <section id="corps" class="synthese">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm"><i class="fa fa-caret-right"></i></span> <span
                    id="classe">?</span></h3>

            <h1>SYNTHESE</h1>

        </section>
        <section id="contenu">
            <div id="synthese"
            ">
            <section id="listeleve"><h5><span class="awsm" style="color:rgb(51,255,0)"></span>Nicolass</h5><h5><span
                        class="awsm" style="color:rgb(102,255,0)"></span>Allann Wauters de Besterfeld</h5><h5><span
                        class="awsm" style="color:rgb(153,255,0)"></span>Nanana Cerise</h5><h5><span class="awsm"
                                                                                                      style="color:rgb(204,255,0)"></span>Bertrand
                </h5><h5><span class="awsm" style="color:rgb(255,255,0)"></span>Alizé</h5><h5><span class="awsm"
                                                                                                     style="color:rgb(255,229,0)"></span>Massilia
                </h5><h5><span class="awsm" style="color:rgb(255,204,0)"></span>Ernest</h5><h5><span class="awsm"
                                                                                                      style="color:rgb(255,153,0)"></span>Biroute
                </h5><h5><span class="awsm" style="color:rgb(255,102,0)"></span>Julien</h5><h5><span class="awsm"
                                                                                                      style="color:rgb(255,51,0)"></span>Maxime
                </h5><h5><span class="awsm" style="color:rgb(255,0,0)"></span>Laurent</h5><h5><span class="awsm"
                                                                                                     style="color:rgb(26,255,0)"></span>Catherine
                </h5><h5><span class="awsm" style="color:rgb(0,255,0)"></span>Le Suisse</h5><h5><span class="awsm"
                                                                                                       style="color:rgb(102,255,0)"></span>Berthe
                    aux grands pieds</h5><h5><span class="awsm" style="color:rgb(51,255,0)"></span>Bruno</h5><h5><span
                        class="awsm" style="color:rgb(255,10,0)"></span>Phillipe</h5><h5><span class="awsm"
                                                                                                style="color:rgb(102,255,0)"></span>Kuntakinté
                </h5><h5><span class="awsm" style="color:rgb(51,255,0)"></span>Zoubida</h5></section>
            <section id="domain" class="">
                <section data-id="1">
                    <button class="visuel awsm" title="Colore l'icône élève en fonction de cette colonne"> </button>
                    <h6>Physique</h6>

                    <div><span>5%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>10%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>20%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>25%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>35%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>40%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>45%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>55%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>60%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>65%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>70%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>75%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>85%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>90%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>95%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>99%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                </section>
                <section data-id="2">
                    <button class="visuel awsm" title="Colore l'icône élève en fonction de cette colonne"> </button>
                    <h6>Chimie</h6>

                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>52%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                </section>
                <section data-id="3">
                    <button class="visuel awsm" title="Colore l'icône élève en fonction de cette colonne"> </button>
                    <h6>Savoir-faire</h6>

                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>52%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                </section>
                <section data-id="4">
                    <button class="visuel awsm" title="Colore l'icône élève en fonction de cette colonne"> </button>
                    <h6>Attitude</h6>

                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>52%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                </section>
                <section data-id="5">
                    <button class="visuel awsm" title="Colore l'icône élève en fonction de cette colonne"> </button>
                    <h6>Résumé</h6>

                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>52%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>30%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>80%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                    <div><span>50%</span>
                        <aside>Graphe</aside>
                    </div>
                </section>
            </section>

            </div>
        </section>
    </section>

<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        var current_class = null;
    </script>
<?php $this->endblock(); ?>