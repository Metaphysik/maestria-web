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
                foreach($classes as $classe) {
                    ?>
                    <li>
                        <?php echo $classe->getLabel(); ?>
                        <i class="aws edit fa fa-trash-o" data-id="<?php echo $classe->getId(); ?>"></i>
                        <i class="aws edit fa fa-pencil"  data-id="<?php echo $classe->getId(); ?>"></i>
                    </li>
                    <ul>
                        <li>Allan Wauters de Besterfeld<i class="aws edit fa fa-trash-o"></i><i
                                class="aws edit fa fa-pencil"></i></li>
                        <li>Nana Cerise<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                        <li>Nicolas<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                        <i class="aws add fa fa-check-square-o" title="Ajouter élève"></i>
                    </ul>
                <?php } ?>
                <li><i class="aws add fa fa-check-square" title="Ajouter classe"></i></li>
        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        $('body')
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
        })
            .on('keypress', '.newinputeleve', function (event) {
            if (event.which == 13) {
                event.preventDefault();
                var t = $(this).parent().parent().parent();;
                $.post('/user/', {"label": $(this).val()}, function (data) {
                    console.log(data);
                    data = jQuery.parseJSON(data);
                    // $(this).val('');
                    // t.end().before('<li>' + data.data + '<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li><ul></ul>');
                    //t.end().children().first().remove();

                });
            }
        }).on('click', '.classes .add', function () {
            var niveau = $(this).parents('ul').length;
            if (niveau == 2) {
                $(this).before('<li><input type="text" class="newinputeleve placeholder="Nouvel élève" /></li>');
            }
            else {
                $(this).before('<li><input type="text" class="newinputclass" placeholder="Nouvelle classe" /></li>');
            }

        });
    </script>
<?php $this->endblock(); ?>