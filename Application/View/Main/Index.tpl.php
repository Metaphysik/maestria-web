<?php
/**
 * @var $this \Sohoa\Framework\View\Greut
 */

$this->inherits('hoa://Application/View/base.tpl.php');
$this->block('popup', 'append');
?>
    <section id="popupclasse">
        <section id="inpopup">
            <section class="titre classe">
                <div class="awsm exit"></div>
                <h3>CHOIX DE LA CLASSE</h3></section>
            <section class="contenu classechx">
                <h6 data-idclasse="1" data-lvl="3" data-niv="1">3<sup>1</sup></h6>
                <h6 data-idclasse="2" data-lvl="3" data-niv="2">3<sup>2</sup></h6>
                <h6 data-idclasse="3" data-lvl="3" data-niv="3">3<sup>3</sup></h6>
            </section>
        </section>
    </section>
    <section id="popupevl">
        <section id="inpopup">
            <section class="titre eval">
                <div class="awsm exit"></div>
                <h3 class="username"></h3></section>
            <section id="popupevlcontent" class="contenu inputresult">
            </section>
        </section>
    </section>

<?php
$this->endblock();
$this->block('container');
?>
    <section id="corps" class="evaluer">
        <section id="titre">
            <h3 class="classe">CLASSE <span class="awsm">  </span> <span id="classe">?</sup></span></h3>

            <h1>EVALUER <span class="awsm">  </span><span id="evalchx">?</span></h1>

        </section>
        <section id="contenu" style="width: 90%">
            <!--      <div class="boutons">
                      <h4 class="optaff">OPTIONS D'AFFICHAGE</h4>
                  </div>-->
            <section id="cases">

            </section>
        </section>
    </section>
<?php
$this->endblock();
$this->block('js:script');
?>
    <script>
        var current_class = null;
        var current_eval = null;
        var current_elv = null;


        $('.classechx > h6').click(function () {
            current_class = $(this).data('idclasse');
            lvl = $(this).data('lvl');
            niv = $(this).data('niv');

            $('#classe').html(lvl + '<sup>' + niv + '</sup>');
            $('#popupclasse').slideUp()
        });

        $('.itemchx > a').click(function (e) {
            e.preventDefault();
            current_eval = $(this).data('ideval');


            $('#evalchx').text($(this).text());
            $('#popup').slideUp()

            if (current_class != null && current_eval != null) {

                $.get('/api/classe/' + current_class + '/users/', function (data) {

                    var users = JSON.parse(data).log[0];
                    var html = '';

                    for (var i = 0; i < users.length; i++) {

                        html += '<article class="elv" draggable="true" data-idelv="' + users[i].id + '">';
                        html += '<div class="awsm perso" style="color:rgb(255,153,0)"><i class="fa fa-user"></i></div>';
                        html += '<div class="nom">' + users[i].name + '</div>';
                        html += '<div class="awsm taxo" style="color:rgb(51,255,0)">';
                        html += '<span><i class="fa fa-book"></i></span>';
                        html += '<span><i class="fa fa-rotate-left" style="color:rgb(0,255,0)"></i></span>';
                        html += '<span><i class="fa fa-wrench" style="color:rgb(255,204,0)"></i></span>';
                        html += '<span><i class="fa fa-star" style="color:rgb(0,255,0)"></i></span>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="prctg">' + users[i].note + '</div>';
                        html += '</article>';
                    }

                    $('#cases').html(html);

                });
            }
        });

        var evaluateAnStudent = function (idStudent, eval) {
            var html = '';
            var url = "/api/eval/" + current_eval + "/user/" + idStudent + "/";
            console.log(url);
            $.get(url, function (data) {

                var json = JSON.parse(data);
                var questions = json.data;
                var log = json.log[0];
                var user = log[0]; // current user
                var next = log[1]; // next user
                var prev = log[2]; // previous user

                for (var i = 0; i < questions.length; i++) {

                    var q = questions[i];


                    html += '<article class="note" data-id="' + q.id + '"><aside><h5>' + (i + 1) + ') ' + q.title + '</h5>';
                    html += '<div><span class="awsm"></span> Appliquer';
                    html += '<span class="note">/' + q.note + '</span></div>' +
                        '<div><span class="awsm"></span> ' + q.item1 + '</div>' +
                        '<div><span class="awsm"></span> ' + q.item2 + '</div>' +
                        '</aside><div class="input">';

                    var uid = 'u' + user.id + 'e' + current_eval + 'q' + q.id;
                    var iid = 'i' + user.id + 'e' + current_eval + 'q' + q.id;

                    html += '<p class="options">';
                    if (q.current == 2) {
                        html += '<input type="radio" id="' + iid + '1" name="' + uid + '" value="2" checked /><label for="' + iid + '1" class="top">A</label>';
                    }
                    else {
                        html += '<input type="radio" id="' + iid + '1" name="' + uid + '" value="2"/><label for="' + iid + '1" class="top">A</label>';
                    }
                    if (q.current == 1) {
                        html += '<input type="radio" id="' + iid + '2" name="' + uid + '" value="1" checked /><label for="' + iid + '2" class="mid">B</label>';
                    }
                    else {
                        html += '<input type="radio" id="' + iid + '2" name="' + uid + '" value="1"/><label for="' + iid + '2" class="mid">B</label>';
                    }
                    if (q.current == 0) {
                        html += '<input type="radio" id="' + iid + '3" name="' + uid + '" value="0" checked /><label for="' + iid + '3" class="min">C</label>';
                    }
                    else {
                        html += '<input type="radio" id="' + iid + '3" name="' + uid + '" value="0"/><label for="' + iid + '3" class="min">C</label>';
                    }
                    if (q.current == -1) {
                        html += '<input type="radio" id="' + iid + '4" name="' + uid + '" value="-1" checked />'; // TODO: Modify here
                    }
                    else {
                        html += '<input type="radio" id="' + iid + '4" name="' + uid + '" value="-1"/>'; // TODO: Modify here
                    }
                    html += '</p>';

                    html += '</div></article>';
                }

                // Set student name in title
                $('.username').text('EVALUER ' + user.name + ' SUR ' + user.currentevalname);

                // Set button for next / previous

                html += '<div class="boutons">';

                if (prev != undefined) {
                    html += '<h4 data-idelv="' + prev.id + '">EVALUER ' + prev.name + '</h4>';
                }

                if (next != undefined) {
                    html += '<h4 style="float:right" data-idelv="' + next.id + '">EVALUER ' + next.name + '</h4>'
                }

                html += '</div>';
                $("#popupevlcontent").empty().html(html);
            });

        };

        form_state = false;

        $('body').on('click', '.elv', function () {
            if (current_class != null && current_eval != null) {
                current_elv = $(this).data('idelv');
                sendForm();
                evaluateAnStudent(current_elv);
                $('#popupevl').slideDown();

            }
        }).on('click', '.boutons > h4', function () {
            if (current_class != null && current_eval != null) {
                var id = $(this).data('idelv');
                sendForm();
                evaluateAnStudent(id);
            }
        }).on('click', '.options > input', function () {
            if (current_class != null && current_eval != null) {
                form_state = true;
                console.log($(this).attr('id'));
                sendForm();
            }
        });

        function sendForm() {
            var table = [];
            $('input:checked').each(function (i, e) {
                    table.push(
                        {
                            name: $(e).attr('name'),
                            value: $(e).val()
                        });
                }
            )
            ;
            table = JSON.stringify(table);
            $.post('/api/eval/' + current_eval + '/', 'elmt=' + table, function (data) {
                // console.log(data)
            });

        }

//        current_eval = 4;
//        current_class = 1;
//        evaluateAnStudent(82);
//        $('#popupevl').slideDown();

    </script>
<?php
$this->endblock();