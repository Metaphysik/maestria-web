<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 * @var $evaluation \Application\Entities\Evaluation
 * @var $questions Array
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('popup', 'append');
?>
    <section id="popupclasse">
        <section id="inpopup">
            <section class="titre classe">
                <div class="awsm exit"><i class="fa fa-close"></i></div>
                <h3>CHOIX DE LA CLASSE</h3></section>
            <section class="contenu classechx">

                <?php foreach ($classes as $classe) {
                    /**
                     * @var $classe \Application\Entities\Classroom
                     */
                    echo '<h6 data-idclasse="' . $classe->getId() . '" data-lvl="3" data-niv="1">' . $classe->getLabel() . '</h6>';
                } ?>

            </section>
        </section>
    </section>
<?php
$this->endblock();
$this->block('container');
/**
 * @var $users Array
 * @var $user  \Application\Entities\User
 * @var $uid Array
 *
 */
?>
    <section id="corps" class="synthese">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm"><i class="fa fa-caret-right"></i></span> <span
                    id="classe">?</span></h3>

            <h1>SYNTHESE</h1>

        </section>
        <section id="contenu">
            <div id="synthese">
                <section id="listeleve" data-uid="<?= json_encode($uid); ?>">
                    <?php foreach ($users as $user): ?>
                        <h5>
                            <span class="awsm" style="color:rgb(51,255,0)">
                                <i class="fa fa-user"></i>
                            </span>
                            <?= $user->getRealName(); ?>
                        </h5>
                    <?php endforeach; ?>
                </section>
                <section id="domain" class="">

                </section>

            </div>
        </section>
    </section>

<?php
$this->endBlock();
$this->block('js:script');
?>
    <script>
        $(function () {


            function readTheme(parent, header, content) {
                console.log(header.label);
                var list = $('#listeleve').data('uid');
                var html = '<section data-parent="' + parent + '" data-id="' + header.id + '" style="display: none">' +
                    '<button class="visuel awsm"><i class="fa fa-arrow-right"></i><i class="fa fa-user"></i> </button><h6>' + header.label + '</h6>';
                for ($i = 0; $i < list.length; $i++) {
                    if(content.length == undefined) {
                        var c = content['u' + list[$i]]; // get the note & graph ?
                        html += '<div><span>' + c[0] + '</span><aside>' + c[1] + '</aside></div>';
                    }
                    else {
                        html += '<div><span></span><aside></aside></div>';
                    }


                }
                return html + '</section>';
            }

            function readDomain(header, content) {
                var $domain = $('#domain');
                var list = $('#listeleve').data('uid');
                console.log(header.label);
                var html = '<section data-id="' + header.id + '" class="foo"><button class="vDom visuel awsm"><i class="fa fa-arrow-right"></i><i class="fa fa-user"></i> </button><h6>' + header.label + '</h6>';

                for ($i = 0; $i < list.length; $i++) {

                    console.log(content.length);

                    if(content.length == undefined) {
                        var c = content['u' + list[$i]]; // get the note & graph ?
                        html += '<div><span>' + c[0] + '</span><aside>' + c[1] + '</aside></div>';
                    }
                    else {
                        html += '<div><span></span><aside></aside></div>';
                    }


                }

                $domain.append(html);
                $.ajax('/api/synthese/theme/' + header.id + '/', {
                    async: false,
                    dataType: 'json',
                    success: function (data) { // TODO : do this sync

                        var domain_header = data.data.domainHeader;
                        var domain_data = data.data.domainData;

                        if (domain_header != undefined) {

                            for (var $i = 0; $i < domain_header.length; $i++) {
                                $('#domain').append(readTheme(header.id, domain_header[$i], domain_data[$i]));
                            }
                        }

                    }

                });
                $domain.append('</section>');
            }

            $.getJSON('/api/synthese/domain/', function (data) {

                var domain_header = data.data.domainHeader;
                var domain_data = data.data.domainData;

                for (var $i = 0; $i < domain_header.length; $i++) {
                    readDomain(domain_header[$i], domain_data[$i]);
                }
            })


            $('#domain').on('click', '.vDom', function () {

                var parent = $(this).parent().data('id');
                $('section[data-parent="' + parent + '"').toggle();


                // Next

                $(this).parent().nextAll().each(function () {
                    var c = $(this);

                    if (c.hasClass('foo')) {
                        if (c.css('display') == "none") {
                            c.show();
                        }
                        else {
                            c.hide();
                        }
                    }

                })
                $(this).parent().prevAll().each(function () {
                    var c = $(this);

                    if (c.hasClass('foo')) {
                        if (c.css('display') == "none") {
                            c.show();
                        }
                        else {
                            c.hide();
                        }
                    }

                })


            });

        });
    </script>
<?php $this->endblock(); ?>