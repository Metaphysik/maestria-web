<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('container');
?>
    <section id="corps" class="classes">
        <section id="titre">
            <h1>GESTION DES CLASSES</h1>
        </section>
        <section id="contenu">
            <div>
                <h4>CLASSES</h4><h4>ELEVES</h4>
            </div>
            <ul>
                <?php
                foreach ($classes as $classe) {
                    ?>
                    <li class="class">
                        <?php echo $classe->getLabel(); ?>
                        <i class="aws del fa fa-trash-o" data-type="classe"
                           data-id="<?php echo $classe->getId(); ?>"></i>
                        <i class="aws edit fa fa-pencil" data-type="classe"
                           data-id="<?php echo $classe->getId(); ?>"></i>
                    </li>
                    <ul>
                        <?php
                        if (isset($userByClasses[$classe->getId()]) === true) {
                            foreach ($userByClasses[$classe->getId()] as $user) {
                                if ($user !== null) {
                                    ?>
                                    <li class="student">
                                        <?php echo $user->getRealName(); ?>
                                        <i class="aws del fa fa-trash-o" data-type="student"
                                           data-id="<?php echo $user->getId(); ?>"></i>
                                        <i class="aws edit fa fa-pencil" data-type="student"
                                           data-id="<?php echo $user->getId(); ?>"></i>
                                    </li>
                                <?php }
                            }?>
                        <?php } ?>
                        <i class="aws add fa fa-check-square-o" title="Ajouter élève" data-type="student"
                           data-id="<?php echo $classe->getId(); ?>"></i>
                    </ul>
                <?php } ?>
                <li><i class="aws add fa fa-check-square" data-type="classe" title="Ajouter classe"></i></li>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        $('body')
            .on('click', '.classes .add', function () {
                var niveau = $(this).parents('ul').length;
                if (niveau == 2) {
                    var id = $(this).attr('data-id');
                    $(this).before('<li><input type="text" class="newinputeleve" data-id="' + id + '" placeholder="Nouvel élève" /></li>');
                }
                else {
                    $(this).before('<li><input type="text" class="newinputclass" placeholder="Nouvelle classe" /></li>');
                }

            })
            .on('keypress', '.newinputclass', function (event) {
            if (event.which == 13) {
                event.preventDefault();
                var t = $(this).parent().parent().parent();
                $.post('/classroom/', {"label": $(this).val()}, function (data) {
                    console.log(data);
                    data = jQuery.parseJSON(data);
                    $(this).val('');
                    t.end().before('<li>' + data.data + '<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li><ul></ul>');
                    t.end().children().first().remove();

                });
            }
        }).on('keypress', '.newinputeleve', function (event) {
            if (event.which == 13) {
                event.preventDefault();
                var t = $(this).parent().parent().parent();
                var id = $(this).attr('data-id');

                $.post('/user/', {"label": $(this).val(), "idclass": id}, function (data) {
                    console.log(data);
                    data = jQuery.parseJSON(data);
                    // $(this).val('');
                    // t.end().before('<li>' + data.data + '<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li><ul></ul>');
                    //t.end().children().first().remove();

                });
            }
        }).on('click', 'li.student > i.edit', function () {
            var id = $(this).attr('data-id');
            var newLabel = "Hello World";

            $.post('/user/' + id + '/update', {"name": newLabel}, function (data) {
                console.log(data);
                data = jQuery.parseJSON(data);
            });

        }).on('click', 'li.student > i.del', function () {
            var id = $(this).attr('data-id');
            $.get('/user/' + id + '/destroy', function (data) {
                console.log(data);
                data = jQuery.parseJSON(data);
            });
        }).on('click', 'li.class > i.edit', function () {
            var id = $(this).attr('data-id');
            $.post('/classroom/' + id + '/update',{"label" : "TotoABord" }, function (data) {
                console.log(data);
                data = jQuery.parseJSON(data);
            });
        }).on('click', 'li.class > i.del', function () {
            var id = $(this).attr('data-id');
            $.get('/classroom/' + id + '/destroy', function (data) {
                console.log(data);
                data = jQuery.parseJSON(data);
            });
        });
    </script>
<?php $this->endblock(); ?>