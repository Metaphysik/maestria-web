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
                    <li data-domain="<?php echo $d->getId(); ?>" class="domain">
                        <?php echo ucfirst($d->getLabel()); ?>
                        <i class="aws del fa fa-trash-o"></i>
                        <i class="aws edit fa fa-pencil"></i>
                    </li>
                    <ul data-domain="<?php echo $d->getId(); ?>">
                        <?php foreach ($theme->getByRef($d->getId()) as $t) { ?>
                            <li data-theme="<?php echo $t->getId(); ?>" data-domain="<?php echo $d->getId(); ?>" class="theme">
                                <?php echo ucfirst($t->getLabel()); ?>
                                <i class="aws del  fa fa-trash-o"></i>
                                <i class="aws edit fa fa-pencil"></i>
                            </li>
                            <ul data-theme="<?php echo $t->getId(); ?>">
                                <?php foreach ($item->getByTheme($t->getId()) as $i) { ?>
                                    <li
                                        data-theme="<?php echo $t->getId(); ?>"
                                        data-item="<?php echo $i->getId(); ?>"
                                        class="ite">
                                        <?php echo ucfirst($i->getLabel()); ?>
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

                    $.post('/item/domain/theme', {"label": $(this).val(), "domain": did}, function (data) {
                        console.log(data);
                    });
                }
            })
            .on('keypress', '.newitem', function (event) {
                if (event.which == 13) {
                    event.preventDefault();

                    var t = $(this).parent().parent();
                    var tid = t.attr('data-theme');

                    $.post('/item/', {"label": $(this).val(), "theme": tid}, function (data) {
                        console.log(data);
                    });
                }
            })
        ;


        $('.domain > .edit').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-domain');
            var txt = $(this).parent().text().trim();
            var prompt = window.prompt('Nouveau nom du domaine '+"\n" + txt + '(#' + id + ')', '');

            if (prompt != null) {
                $.post('/item/domain/update', {"label": prompt, "id": id}, function (data) {
                    console.log(data);
                });
            }
        });

        $('.domain > .del').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-domain');
            $.get('/item/domain/delete', {"id": id}, function (data) {
                console.log(data);
            });
        });

        $('.theme > .edit').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-theme');
            var did = $(this).parent().attr('data-domain');
            var txt = $(this).parent().text().trim();
            var prompt = window.prompt('Nouveau nom du theme '+"\n" + txt + '(#' + id + ')', '');

            if (prompt != null) {
                $.post('/item/domain/theme/update', {"label": prompt, "id": id, "ref": did}, function (data) {
                    console.log(data);
                });
            }

        });

        $('.theme > .del').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-domain');
            $.get('/item/domain/theme/delete', {"id": id}, function (data) {
                console.log(data);
            });
        });

        $('.ite > .edit').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-item');
            var tid = $(this).parent().attr('data-theme');
            var txt = $(this).parent().text().trim();
            var prompt = window.prompt('Nouveau nom de l\'item '+"\n" + txt + '(#' + id + ')', '');

            if (prompt != null) {
                $.post('/item/'+id+'/update', {"label": prompt, "tid": tid, "id": id}, function (data) {
                    console.log(data);
                });
            }

        });

        $('.ite > .del').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            var id = $(this).parent().attr('data-domain');
            $.get('/item/'+id+'/delete', {"id": id}, function (data) {
                console.log(data);
            });
        });

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