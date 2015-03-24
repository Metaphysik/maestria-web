<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="login">
        <section id="titre">
            <h1>GESTION DES CLASSES</h1>
        </section>
        <section id="contenu">
            <div>
                <h4>CLASSES</h4><h4>ELEVES</h4>
            </div>
            <ul>
                <li>3<sup>1</sup><span class="awsm del"></span><i class="aws fa fa-edit"></i> </li>
                <ul>
                    <li>Allan Wauters de Besterfeld<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Nana Cerise<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Nicolas<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <span class="awsm add" title="Ajouter élève"></span></ul>
                <li>3<sup>2</sup><span class="awsm del"></span><span class="awsm edit"></span></li>
                <ul>
                    <li>Nicolass<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Allann Wauters de Besterfeld<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Nanana Cerise<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Bertrand<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Alizé<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Massilia<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Ernest<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Biroute<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Julien<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Maxime<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Laurent<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Catherine<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Le Suisse<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Berthe aux grands pieds<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Bruno<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Phillipe<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Kuntakinté<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Zoubida<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <span class="awsm add" title="Ajouter élève"></span></ul>
                <li>3<sup>3</sup><span class="awsm del"></span><span class="awsm edit"></span></li>
                <ul>
                    <li>Mohammed<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Bachibouzouk<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <li>Cunégonde<span class="awsm del"></span><span class="awsm edit"></span></li>
                    <span class="awsm add" title="Ajouter élève"></span></ul>
                <span class="awsm add" title="Ajouter classe"></span></ul>


        </section>
    </section>
<?php
$this->endBlock();