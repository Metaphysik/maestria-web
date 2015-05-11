<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $evaluations Array
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="evals">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm"> &#xf0da; </span> <span id="classe">3<sup>2</sup></span></h3>

            <h1>GESTION DES EVALUATIONS</h1>

        </section>
        <section id="contenu">
            <div>
                <h4>EVALUATIONS</h4><h4>DATES</h4>
            </div>
            <ul>
                <?php if (isset($evaluations) === true) { ?>
                    <?php foreach ($evaluations as $evaluation) {
                        /**
                         * @var $evaluation \Application\Entities\Evaluation
                         */
                        ?>
                        <li data-ideval="111">
                            <span class="titre">
                                <a href="/evaluation/<?php echo $evaluation->getId(); ?>">
                                    <?php echo $evaluation->getTitle(); ?>
                                </a>
                            </span>
                            <span class="date"><?php echo date('d-m-Y H:i:s', $evaluation->getUpdatedate()); ?></span>
                            <a href="/evaluation/<?php echo $evaluation->getId(); ?>/destroy"><i
                                    class="aws del fa fa-trash"></i></a>
                            <a href="/evaluation/<?php echo $evaluation->getId(); ?>/edit"><i
                                    class="aws edit fa fa-pencil"></i></a>
                        </li>
                    <?php } ?>
                <?php } ?>
                <a href="/evaluation/new">
                    <i class="aws add fa fa-check-square" title="Nouvelle évaluation"></i>
                </a>
            </ul>


        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>

<?php $this->endblock(); ?>