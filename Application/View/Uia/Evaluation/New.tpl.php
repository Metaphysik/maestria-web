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
                    <input name="title" id="title" value="Découpage">
                    <label for="date">DATE</label>
                    <input name="date" id="date" value="1984-04-20" type="date">
                </div>
                <div id="questions"><h4>QUESTIONS</h4></div>
                <section class="float">
                    <div><label for="q1_title">TITRE</label><input kl_virtual_keyboard_secure_input="on" name="q1_title"
                                                                   id="q1_title" placeholder="Titre de la question 1"
                                                                   value="Nommer les ciseaux"></div>
                    <div><label for="q1_taxo">NIVEAU TAXONOMIQUE</label><select name="q1_taxo" id="q1_taxo">
                            <option value="1" undefined="">Connaissance</option>
                            <option value="2">Compréhension</option>
                            <option value="3">Application</option>
                            <option value="4">Analyse</option>
                        </select></div>
                    <div><label for="q1_note">POINTS</label><input name="q1_note" id="q1_note" min="0" placeholder="0"
                                                                   value="2" type="number"></div>
                    <div><label for="q1_item1"><span class="awsm"> </span>CONNAISSANCE</label><input
                            kl_virtual_keyboard_secure_input="on" name="q1_item1" id="q1_item1"
                            placeholder="A choisir parmi les items pédagogiques"
                            value="Savoir qu'on parle d'une paire de ciseaux"><span class="awsm chitem"></span></div>
                    <div><label for="q1_item2"><span class="awsm"> </span>SAVOIR-FAIRE OU ATTITUDE</label><input
                            kl_virtual_keyboard_secure_input="on" name="q1_item2" id="q1_item2"
                            placeholder="A choisir parmi les items pédagogiques"
                            value="Savoir nommer les objets de la classe"><span class="awsm chitem"></span></div>
                </section>
                <section class="float">
                    <div><label for="q1_title">TITRE</label><input kl_virtual_keyboard_secure_input="on" name="q1_title"
                                                                   id="q1_title" placeholder="Titre de la question 1"
                                                                   value="Nommer les ciseaux"></div>
                    <div><label for="q1_taxo">NIVEAU TAXONOMIQUE</label><select name="q1_taxo" id="q1_taxo">
                            <option value="1" undefined="">Connaissance</option>
                            <option value="2">Compréhension</option>
                            <option value="3">Application</option>
                            <option value="4">Analyse</option>
                        </select></div>
                    <div><label for="q1_note">POINTS</label><input name="q1_note" id="q1_note" min="0" placeholder="0"
                                                                   value="2" type="number"></div>
                    <div><label for="q1_item1"><span class="awsm"> </span>CONNAISSANCE</label><input
                            kl_virtual_keyboard_secure_input="on" name="q1_item1" id="q1_item1"
                            placeholder="A choisir parmi les items pédagogiques"
                            value="Savoir qu'on parle d'une paire de ciseaux"><span class="awsm chitem"></span></div>
                    <div><label for="q1_item2"><span class="awsm"> </span>SAVOIR-FAIRE OU ATTITUDE</label><input
                            kl_virtual_keyboard_secure_input="on" name="q1_item2" id="q1_item2"
                            placeholder="A choisir parmi les items pédagogiques"
                            value="Savoir nommer les objets de la classe"><span class="awsm chitem"></span></div>
                </section>
                <div class="add"><span class="awsm" title="Ajouter évaluation"> </span> AJOUTER QUESTION</div>

                <input id="creer" value="ENREGISTRER" type="submit">
            </form>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>

<?php $this->endblock(); ?>