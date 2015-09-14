<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $evaluation \Application\Entities\Evaluation
 * @var $questions Array
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="neweval">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm"><i class="fa fa-caret-right"></i></span> <span id="classe">3<sup>2</sup></span></h3>

            <h1>PARAMETRES DE L'EVALUATION</h1>

        </section>
        <section id="contenu">
            <form action="/evaluation/" method="post">
                <div class="titre">
                    <h4 style="margin-top: -8px;">INFOS</h4>
                    <label for="title" class="titrant">TITRE</label>
                    <input name="title" id="title" value="<?php echo $evaluation->getTitle(); ?>" readonly>
                    <label for="date">DATE</label>
                    <input name="date" id="date" value="<?php echo date('d-m-Y', $evaluation->getCreatedate()); ?>"
                           type="date" readonly>
                </div>
                <div id="questions"><h4>QUESTIONS</h4></div>
                <?php
                if (isset($questions) === true) {
                    foreach ($questions as $i => $question) {
                        /**
                         * @var $question \Application\Entities\Question
                         */
                        ?>
                        <section class="float">
                            <div>
                                <label for="q<?php echo $i; ?>_title">TITRE</label>
                                <input readonly value="<?php echo $question->getTitle(); ?>"/>
                            </div>
                            <div>
                                <label for="q<?php echo $i; ?>_taxo">NIVEAU TAXONOMIQUE</label>
                                <select disabled>
                                    <option
                                        value="1" <?php echo(($question->getTaxo() === 1) ? 'selected="selected"' : ''); ?>>
                                        Connaissance
                                    </option>
                                    <option
                                        value="2" <?php echo(($question->getTaxo() === 2) ? 'selected="selected"' : ''); ?>>
                                        Compréhension
                                    </option>
                                    <option
                                        value="3" <?php echo(($question->getTaxo() === 3) ? 'selected="selected"' : ''); ?>>
                                        Application
                                    </option>
                                    <option
                                        value="4" <?php echo(($question->getTaxo() === 4) ? 'selected="selected"' : ''); ?>>
                                        Analyse
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label for="q<?php echo $i; ?>_note">POINTS</label>
                                <input readonly value="<?php echo $question->getPoint(); ?>" type="number"/>
                            </div>
                            <div>
                                <label for="q<?php echo $i; ?>_item1"><i class="awsm fa fa-graduation-cap"></i>
                                    CONNAISSANCE</label>
                                <?php
                                if ($question->getItem1() !== 0) {
                                    echo '<input id="q'.$i.'_item1" readonly value="' . $question->getItem1() . '"/>';
                                } else {
                                    echo '<input placeholder="A choisir parmi les items pédagogiques" readonly/>';
                                }
                                ?>
                            </div>
                            <div>
                                <label for="q<?php echo $i; ?>_item2"><i class="awsm fa fa-cogs"></i> SAVOIR-FAIRE OU
                                    ATTITUDE</label>
                                <?php
                                if ($question->getItem2() !== 0) {
                                    echo '<input id="q'.$i.'_item2" readonly value="' . $question->getItem2() . '"/>';
                                } else {
                                    echo '<input placeholder="A choisir parmi les items pédagogiques" readonly/>';
                                }
                                ?>

                            </div>
                        </section>
                    <?php }
                } ?>
            </form>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>

<?php $this->endblock(); ?>