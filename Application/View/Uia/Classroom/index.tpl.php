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
                <li>3<sup>1</sup><i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                <ul>
                    <li>Allan Wauters de Besterfeld<i class="aws edit fa fa-trash-o"></i><i
                            class="aws edit fa fa-pencil"></i></li>
                    <li>Nana Cerise<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Nicolas<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <i class="aws add fa fa-check-square-o" title="Ajouter élève"></i>
                </ul>
                <li>3<sup>2</sup><i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                <ul>
                    <li>Nicolass<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Allann Wauters de Besterfeld<i class="aws edit fa fa-trash-o"></i><i
                            class="aws edit fa fa-pencil"></i></li>
                    <li>Nanana Cerise<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Bertrand<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Alizé<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Massilia<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Ernest<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Biroute<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Julien<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Maxime<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Laurent<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Catherine<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Le Suisse<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Berthe aux grands pieds<i class="aws edit fa fa-trash-o"></i><i
                            class="aws edit fa fa-pencil"></i></li>
                    <li>Bruno<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Phillipe<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Kuntakinté<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Zoubida<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <i class="aws add fa fa-check-square-o" title="Ajouter élève"></i>
                </ul>
                <li>3<sup>3</sup><i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                <ul>
                    <li>Nicolass<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Allann Wauters de Besterfeld<i class="aws edit fa fa-trash-o"></i><i
                            class="aws edit fa fa-pencil"></i></li>
                    <li>Nanana Cerise<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Bertrand<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Alizé<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Massilia<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Ernest<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Biroute<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Julien<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Maxime<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Laurent<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Catherine<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Le Suisse<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Berthe aux grands pieds<i class="aws edit fa fa-trash-o"></i><i
                            class="aws edit fa fa-pencil"></i></li>
                    <li>Bruno<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Phillipe<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Kuntakinté<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <li>Zoubida<i class="aws edit fa fa-trash-o"></i><i class="aws edit fa fa-pencil"></i></li>
                    <i class="aws add fa fa-check-square-o" title="Ajouter élève"></i>
                </ul>
                <li><i class="aws add fa fa-check-square" title="Ajouter classe"></i></li>


        </section>
    </section>
<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        $('.classes .add').on('click', function () {
            niveau = $(this).parents('ul').length;
            if (niveau == 2) {
                $(this).before('<li><input type="text" placeholder="Nouvel élève"></li>');
            }
            else {
                $(this).before('<li><input type="text" placeholder="Nouvelle classe"></li>');
            }

        });
    </script>
<?php $this->endblock(); ?>