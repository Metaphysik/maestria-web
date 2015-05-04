<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $domain \Application\Model\Domain
 * @var $theme \Application\Model\Theme
 * @var $item \Application\Model\Item
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
<!--                <li data-ideval="111">-->
<!--                    <span class="titre">Puissance</span>-->
<!--                    <span class="date">07/03/2015</span>-->
<!--                    <span class="awsm del"></span>-->
<!--                    <a href="/evaluation/1/edit"><i class="aws edit fa fa-pencil"></i></a>-->
<!--                </li>-->
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