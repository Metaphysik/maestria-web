<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $domain \Application\Model\Domain
 * @var $theme \Application\Model\Theme
 * @var $item \Application\Model\Item
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('popup', 'replace');
?>

    <section id="popup">
        <section id="inpopup">
            <section class="titre optaff">
                <div class="awsm exit"></div>
                <h3>CHOISIR L'ITEM</h3></section>
            <section class="contenu itemchx">Selectionner l'item voulu
                <ul>
                    <?php
                    /**
                     * @var $d \Application\Entities\Domain
                     * @var $t \Application\Entities\Theme
                     * @var $i \Application\Entities\Item
                     */
                    foreach ($domain->all() as $d) {
                        ?>
                        <li><?php echo ucfirst($d->getLabel()); ?><i class="awsm fa fa-caret-down"
                                                                     style="color: darkgreen"></i></li>
                        <ul>
                            <?php foreach ($theme->getByRef($d->getId()) as $t) { ?>
                                <li><?php echo ucfirst($t->getLabel()); ?><i class="awsm fa fa-caret-down"
                                                                             style="color: darkmagenta"></i></li>
                                <ul>
                                    <?php foreach ($item->getByTheme($t->getId()) as $i) {
                                        if ($i->getStatus() >= 2) {
                                            ?>
                                            <li data-id="<?php echo $i->getId(); ?>">
                                                <?php echo ucfirst($i->getLabel()); ?><i class="awsm fa fa-check"></i>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            <?php } ?>
                        </ul>
                    <?php } ?>
            </section>
        </section>
    </section>

<?php
$this->endblock();
$this->block('container');
/**
 * @var $eval \Application\Entities\Evaluation
 */
?>
    <section id="corps" class="neweval">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm">  </span> <span id="classe">3<sup>2</sup></span></h3>

            <h1>PARAMETRES DE L'EVALUATION</h1>

        </section>
        <section id="contenu">
            <form action="/evaluation/<?php echo $eval->getId(); ?>/update" method="post">
                <div class="titre">
                    <h4 style="margin-top: -8px;">INFOS</h4>
                    <label for="title" class="titrant">TITRE</label>
                    <input name="title" id="title" value="<?php echo $eval->getTitle(); ?>">
                    <label for="date">DATE</label>
                    <input name="date" id="date" value="<?php echo date('d-m-Y', $eval->getCreatedate()); ?>"
                           type="date" readonly>
                </div>
                <div id="questions"><h4>QUESTIONS</h4></div>
                <?php
                /**
                 * @var $questions Array
                 * @var $question \Application\Entities\Question
                 */
                if (isset($questions) === true) {
                    foreach ($questions as $question) { ?>
                        <section class="float">
                            <div>
                                <label for="q<?php echo $question->getId(); ?>_title">TITRE</label>
                                <input name="q<?php echo $question->getId(); ?>_title"
                                       id="q<?php echo $question->getId(); ?>_title"
                                       placeholder="Titre de la question <?php echo $question->getId(); ?>"
                                       value="<?php echo $question->getTitle(); ?>" $/>
                            </div>
                            <div>
                                <label for="q<?php echo $question->getId(); ?>_taxo">NIVEAU TAXONOMIQUE</label>
                                <select name="q<?php echo $question->getId(); ?>_taxo"
                                        id="q<?php echo $question->getId(); ?>_taxo">
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
                                <label for="q<?php echo $question->getId(); ?>_note">POINTS</label>
                                <input name="q<?php echo $question->getId(); ?>_note"
                                       id="q<?php echo $question->getId(); ?>_note" min="0" max="100"
                                       placeholder="0"
                                       value="<?php echo $question->getPoint(); ?>"
                                       type="number"/>
                            </div>
                            <div>
                                <label for="q<?php echo $question->getId(); ?>_item1"><i
                                        class="awsm fa fa-graduation-cap"></i>
                                    CONNAISSANCE</label>
                                <input name="q<?php echo $question->getId(); ?>_item1"
                                       id="q<?php echo $question->getId(); ?>_item1_id"
                                       value="<?php echo $question->getItem1id(); ?>"
                                       class="hidden"/>
                                <input id="q<?php echo $question->getId(); ?>_item1"
                                       placeholder="A choisir parmi les items pédagogiques"
                                       value="<?php echo $question->getItem1(); ?>" readonly/>
                                <i class=" awsm fa fa-briefcase chitem"></i>
                            </div>
                            <div>
                                <label for="q<?php echo $question->getId(); ?>_item2"><i class="awsm fa fa-cogs"></i>
                                    SAVOIR-FAIRE OU
                                    ATTITUDE</label>
                                <input name="q<?php echo $question->getId(); ?>_item2"
                                       id="q<?php echo $question->getId(); ?>_item2_id"
                                       value="<?php echo $question->getItem2id(); ?>"
                                       class="hidden"/>
                                <input id="q<?php echo $question->getId(); ?>_item2"
                                       placeholder="A choisir parmi les items pédagogiques"
                                       value="<?php echo $question->getItem2(); ?>" readonly/>
                                <i class=" awsm fa fa-briefcase chitem"></i>
                            </div>
                        </section>
                    <?php }
                } ?>
                <!--                <div class="add"><i class="awsm fa fa-plus-square" title="Ajouter évaluation"></i> AJOUTER QUESTION-->
                <!--                </div>-->
                <input id="creer" value="ENREGISTRER" type="submit">
            </form>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>

        var itemText, itemID;
        $('#contenu').on('click', '.chitem', function () {
            itemText = '#' + $(this).prev('input').attr('id');
            itemID = '#' + $(this).prev('input').attr('id') + '_id';
            $('#popup').slideDown();
        });

        $('#inpopup').on('click', '.itemchx ul ul ul li .fa-check', function () {
            iditem = $(this).parent('li').data('id');
            nomitem = $(this).parent().text().trim();
            $(itemID).val(iditem);
            $(itemText).val(nomitem);
            $('#popup').slideUp();
        });


    </script>
<?php
$this->endblock(); ?>