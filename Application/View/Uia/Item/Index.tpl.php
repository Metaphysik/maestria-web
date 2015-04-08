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
            <ul class="domain">
                <?php
                /**
                 * @var $d \Application\Entities\Domain
                 * @var $t \Application\Entities\Theme
                 * @var $i \Application\Entities\Item
                 */
                foreach ($domain->all() as $d) {
                    ?>
                    <li>
                        <span><?php echo ucfirst($d->getLabel()); ?></span>

                        <i class="aws del fa fa-trash-o"></i>
                        <i class="aws edit fa fa-pencil"></i>
                    </li>
                    <ul data-domain="<?php echo $d->getId(); ?>">
                        <?php foreach ($theme->getByRef($d->getId()) as $t) { ?>
                            <li>
                                <span><?php echo ucfirst($t->getLabel()); ?></span>
                                <i class="aws del fa fa-trash-o"></i>
                                <i class="aws edit fa fa-pencil"></i>
                            </li>
                            <ul data-theme="<?php echo $t->getId(); ?>">
                                <?php foreach ($item->getByTheme($t->getId()) as $i) { ?>
                                    <li>
                                        <span><?php echo ucfirst($i->getLabel()); ?></span>
                                        <i class="aws del fa fa-trash-o"></i>
                                        <i class="aws edit fa fa-pencil"></i>
                                    </li>
                                <?php } ?>
                                <span class="awsm add fa fa-check-square-o" title="Ajouter item"></span>
                            </ul>
                        <?php } ?>

                        <span class="awsm add fa fa-check-square-o" title="Ajouter Theme"></span>
                    </ul>

                <?php } ?>
                <span class="awsm add fa fa-check-square-o" title="Ajouter Domaine"></span>
        </section>


    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        $('body')
            .on('keypress', '.newdomain', function (event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $.post('/item/domain', {"label": $(this).val()}, function (data) {
                        console.log(data);
                    });
                }
            })
            .on('keypress', '.newtheme', function (event) {
                if (event.which == 13) {
                    event.preventDefault();

                    var t = $(this).parent().parent();
                    var did = t.attr('data-domain');

                    $.post('/item/domain/' + did + '/theme', {"label": $(this).val()}, function (data) {
                        console.log(data);
                    });
                }
            })
            .on('keypress', '.newitem', function (event) {
                if (event.which == 13) {
                    event.preventDefault();

                    var t = $(this).parent().parent();
                    var tid = t.attr('data-theme');

                    console.log(tid);

                    $.post('/item/', {"label": $(this).val(), "theme": tid}, function (data) {
                        console.log(data);
                    });
                }
            })
        ;


        $('.items .add').on('click', function () {
            niveau = $(this).parents('ul').length;
            if (niveau == 3) {
                $(this).before('<li><input type="text" class="newitem" placeholder="Nouvel item"></li>');
            }
            else if (niveau == 2) {
                $(this).before('<li><input type="text" class="newtheme" placeholder="Nouveau thème"></li>');
            }
            else {
                $(this).before('<li><input type="text" class="newdomain" placeholder="Nouveau domaine"></li>');
            }

        });
    </script>
<?php $this->endblock(); ?>