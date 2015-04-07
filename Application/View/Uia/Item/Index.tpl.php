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
    <section id="corps" class="items">

        <section id="titre">
            <h1>GESTION DES ITEMS PEDAGOGIQUES</h1>

        </section>
        <section id="contenu">
            <div>
                <h4>DOMAINE</h4><h4>THEMES</h4><h4>ITEMS</h4>
            </div>
            <ul>
                <?php
                /**
                * @var $d \Application\Entities\Domain
                * @var $t \Application\Entities\Theme
                * @var $i \Application\Entities\Item
                */
                foreach($domain->all() as $d) {
                ?>
                    <li>
                    <span><?php echo $d->getLabel(); ?></span>

                    <i class="aws del fa fa-trash-o"></i>
                    <i class="aws edit fa fa-pencil"></i>
                    </li>
                    <ul>
                        <?php foreach($theme->getByRef($d->getId()) as $t) { ?>
                            <li data-id="<?php echo $t->getId(); ?>-<?php echo $d->getId(); ?>">
                                <span><?php echo $t->getLabel(); ?></span>
                                <i class="aws del fa fa-trash-o"></i>
                                <i class="aws edit fa fa-pencil"></i>
                            </li>
                            <ul>
                                <?php foreach($item->getByTheme($t->getId()) as $i) { ?>
                                    <li data-id="<?php echo $i->getId(); ?>-<?php echo $t->getId(); ?>-<?php echo $d->getId(); ?>">
                                        <span><?php echo $i->getLabel(); ?></span>
                                        <i class="aws del fa fa-trash-o"></i>
                                        <i class="aws edit fa fa-pencil"></i>
                                    </li>
                                <?php } ?>
                                <span class="awsm add fa fa-check-square-o" title="Ajouter item"></span>
                            </ul>
                        <?php } ?>

                        <span class="awsm add fa fa-check-square-o" title="Ajouter item"></span>
                    </ul>
<?php } ?>


                <li data-id="2"><span>Chimie</span><span class="awsm del"></span><span class="awsm edit"></span></li>
                <ul>
                    <li data-id="2-1"><span>Corps pur</span><span class="awsm del"></span><span
                            class="awsm edit"></span></li>
                    <ul>
                        <li data-id="2-1-0"><span>Un corps pur est constitué d'un seul type de molécule</span><span
                                class="awsm del"></span><span class="awsm edit"></span></li>
                        <span class="awsm add" title="Ajouter item"></span></ul>
                    <span class="awsm add" title="Ajouter thème"></span></ul>

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