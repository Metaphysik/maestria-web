<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="items">

        <section id="titre">
            <h1>GESTION DES ITEMS PEDAGOGIQUES</h1>

        </section>
        <section id="contenu">
            <div>
                <h4>DOMAINE</h4><h4>THEMES</h4><h4>ITEMS</h4>
            </div>
            <ul>
                <li data-id="1">
                    <span>Physique sss</span>

                    <i class="aws del fa fa-trash-o"></i>
                    <i class="aws edit fa fa-pencil"></i>
                </li>
                <li data-id="2"><span>Chimie</span><span class="awsm del"></span><span class="awsm edit"></span></li>
                <ul>
                    <li data-id="2-1"><span>Corps pur</span><span class="awsm del"></span><span
                            class="awsm edit"></span></li>
                    <ul>
                        <li data-id="2-1-0"><span>Un corps pur est constitué d'un seul type de molécule</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <span class="awsm add" title="Ajouter item"></span></ul>
                    <span class="awsm add" title="Ajouter thème"></span></ul>
                <li class="actif" data-id="3"><span>Savoir-faire</span><span class="awsm del"></span><span
                        class="awsm edit"></span></li>
                <ul style="display: block;">
                    <li class="" data-id="3-1"><span>Réaliser Test</span><span class="awsm del"></span><span
                            class="awsm edit"></span></li>
                    <li class="actif" data-id="3-2"><span>Interpreter test</span><span class="awsm del"></span><span
                            class="awsm edit"></span></li>
                    <ul style="display: block;">
                        <li data-id="3-2-0"><span>Associer les grandeurs aux unités correspondantes</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <li data-id="3-2-1"><span>Verifier la cohérence des résultats obtenus</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <li data-id="3-2-2"><span>Avoir l'esprit critique vis-à-vis de ses résultats</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <li data-id="3-2-3"><span>Utiliser du vocabulaire de la métrologie</span><span class="awsm del"></span><span
                                class="awsm edit"></span></li>
                        <li data-id="3-2-4"><span>Percevoir la différence entre réalité et simulation</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <li><input placeholder="Nouvel item" type="text"></li>
                        <li><input placeholder="Nouvel item" type="text"></li>
                        <li><input placeholder="Nouvel item" type="text"></li>
                        <span class="awsm add" title="Ajouter item"></span></ul>
                    <li class="actif" data-id="3-3"><span>Démarche déductive</span><span class="awsm del"></span><span
                            class="awsm edit"></span></li>
                    <li><input placeholder="Nouveau thème" type="text"></li>
                    <span class="awsm add" title="Ajouter thème"></span></ul>
                <li class="" data-id="4"><span>Attitude</span><span class="awsm del"></span><span
                        class="awsm edit"></span></li>
                <li><input placeholder="Nouveau domaine" type="text"></li>
                <span class="awsm add" title="Ajouter domaine"></span></ul>

        </section>


    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
<script>
    $('.items .add').on('click', function () {
        niveau = $(this).parents('ul').length;
        if (niveau == 3) {
            $(this).before('<li><input type="text" placeholder="Nouvel item"></li>');
        }
        else if (niveau == 2) {
            $(this).before('<li><input type="text" placeholder="Nouveau thème"></li>');
        }
        else {
            $(this).before('<li><input type="text" placeholder="Nouveau domaine"></li>');
        }

    });
</script>
<?php $this->endblock(); ?>