<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="neweval">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm">  </span> <span id="classe">3<sup>2</sup></span></h3>

            <h1>PARAMETRES DE L'EVALUATION</h1>

        </section>
        <section id="contenu">
            <form>
                <div class="titre">
                    <h4 style="margin-top: -8px;">INFOS</h4>
                    <label for="title" class="titrant">TITRE</label>
                    <input name="title" id="title" value="">
                    <label for="date">DATE</label>
                    <input name="date" id="date" value="<?php echo date('d-m-Y'); ?>" type="date">
                </div>
                <div id="questions"><h4>QUESTIONS</h4></div>
                <?php for($i = 1; $i <= 2; $i++) { ?>
                    <section class="float">
                        <div>
                            <label for="q<?php echo $i; ?>_title">TITRE</label>
                            <input name="q<?php echo $i; ?>_title" id="q<?php echo $i; ?>_title" placeholder="Titre de la question <?php echo $i; ?>"/>
                        </div>
                        <div>
                            <label for="q<?php echo $i; ?>_taxo">NIVEAU TAXONOMIQUE</label>
                            <select name="q<?php echo $i; ?>_taxo" id="q<?php echo $i; ?>_taxo">
                                <option value="1">Connaissance</option>
                                <option value="2">Compréhension</option>
                                <option value="3">Application</option>
                                <option value="4">Analyse</option>
                            </select>
                        </div>
                        <div>
                            <label for="q<?php echo $i; ?>_note">POINTS</label>
                            <input name="q<?php echo $i; ?>_note" id="q<?php echo $i; ?>_note" min="0" max="100" placeholder="0"
                                   type="number"/>
                        </div>
                        <div>
                            <label for="q<?php echo $i; ?>_item1"><i class="awsm fa fa-graduation-cap"></i> CONNAISSANCE</label>
                            <input name="q<?php echo $i; ?>_item1" id="q<?php echo $i; ?>_item1" placeholder="A choisir parmi les items pédagogiques">
                            <i class="awsm fa fa-briefcase chitem"></i>
                        </div>
                        <div>
                            <label for="q<?php echo $i; ?>_item2"><i class="awsm fa fa-cogs"></i> SAVOIR-FAIRE OU ATTITUDE</label>
                            <input name="q<?php echo $i; ?>_item2" id="q<?php echo $i; ?>_item2" placeholder="A choisir parmi les items pédagogiques">
                            <i class="awsm fa fa-briefcase chitem"></i>
                        </div>
                    </section>
                <?php } ?>
                <div class="add"><i class="awsm fa fa-plus-square" title="Ajouter évaluation"></i> AJOUTER QUESTION
                </div>
                <input id="creer" value="ENREGISTRER" type="submit">
            </form>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>

<?php $this->endblock(); ?>