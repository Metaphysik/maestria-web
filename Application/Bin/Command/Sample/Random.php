<?php
/**
 * Created by PhpStorm.
 * User: Camael24
 * Date: 16/01/14
 * Time: 17:22.
 */

namespace Application\Bin\Command\Sample;

use Application\Model\Classroom;
use Application\Model\Domain;
use Application\Model\Evaluation;
use Application\Model\Question;
use Application\Model\Theme;
use Application\Model\Uia;
use Application\Model\User;
use Application\Model\UserClass;
use Faker\Factory;

class Random extends \Hoa\Console\Dispatcher\Kit
{
    /**
     * Options description.
     *
     * @var \Hoa\Core\Bin\Welcome array
     */
    protected $options          = [
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, 'h'],
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, '?'],
        ['test', \Hoa\Console\GetOption::NO_ARGUMENT, 't'],
    ];
    protected $verbose          = true;
    protected $_countStudent    = 5;
    protected $_countClasse     = 7;
    protected $_countEvaluation = 1;
    protected $_countQuestion   = 1;
    protected $_countItemImport = 10;
    protected $_bufferItem      = 0;
    protected $uias             = [
        'demo',
        'caraminot',
    ];

    protected $classes = [
        '1°S',
        '1°ES',
        '1°STI',
        '2nd1',
        '2nd2',
        'TS',
        'TSTI',
    ];

    /**
     * The entry method.
     *
     * @return int
     */
    public function main()
    {
        require 'hoa://Application/Config/Environnement.php';

        $this->hydrateUia();
        $this->hydrateUser();
        $this->hydrateClassroom();
        $this->hydateStudentAndAssociation();
        $this->hydrateDomain();
        $this->hydrateThemeItem();
        $this->hydrateEvaluation();
    }

    public function hydrateUia()
    {
        $model = new Uia();

        $model->insert('demo', 'Lycée de la démologie', '1 Place du Mont Blanc', 'Sarlat la Canéda', 'Dordogne',
            'Aquitaine', 'Mr Toupasbo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');

        $model->insert('caraminot', 'Lycée Professionnel Pierre Caraminot', '15 Avenue du paradis', 'Egletons',
            'Correze', 'Limousin', 'Mr Vraimentbobo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');

        if ($this->verbose === true) {
            echo '# UIA' . "\n";
        }

    }

    public function hydrateUser()
    {
        $user = new User();

        foreach ($this->uias as $uia) {
            $user->insert($uia, 'admin', 'admin@nowhere.com', sha1('admin'), 1, 1, 0, 'Admin Istrator', 0, time(), '',
                2);
            $user->insert($uia, 'modo', 'modo@nowhere.com', sha1('modo'), 0, 1, 0, 'Maude Erator', 0, time(), '', 2);
            $user->insert($uia, 'prof', 'prof@nowhere.com', sha1('prof'), 0, 1, 0, 'Prof Essor', 0, time(), '', 2);
        }
        if ($this->verbose === true) {
            echo '# MASTER USER' . "\n";
        }
    }

    public function hydrateClassroom()
    {
        $class = new Classroom();

        foreach ($this->uias as $uia) {
            foreach ($this->classes as $classe) {
                $class->insert($uia, $classe);
            }
        }
        if ($this->verbose === true) {
            echo '# CLASSROOM' . "\n";
        }
    }

    public function hydateStudentAndAssociation()
    {
        $faker = Factory::create();
        $uc    = new UserClass();

        foreach ($this->uias as $uia) {
            for ($classe = 0; $classe < 7; ++$classe) {
                for ($i = 0; $i < $this->_countStudent; ++$i) {
                    $id = $this->hydrateStudent($uia, $faker->name);
                    $uc->associate($uia, $classe, $id);
                }
            }
        }

        if ($this->verbose === true) {
            echo '# STUDENT' . "\n";
        }
    }

    protected function hydrateEvaluation()
    {
        $faker = Factory::create();

        foreach ($this->uias as $uias) {
            foreach ([3, 6] as $profid) {
                for ($i = 0; $i <= $this->_countEvaluation; ++$i) {
                    $evaluation = new Evaluation();
                    if ($this->verbose === true) {
                        echo $faker->sentence() . "\n";
                    }
                    $evaluation->insert($uias, $profid, $faker->sentence());
                    $id        = $evaluation->id;
                    $questions = new Question();

                    for ($i = 1; $i <= $this->_countQuestion; ++$i) {
                        if ($this->verbose === true) {
                            echo "\t" . $faker->sentence() . "\n";
                        }
                        $questions->insert($id, $faker->sentence(), 1, $i, $i + 1, $i + 50);
                    }
                }
            }
        }
    }

    protected function hydrateStudent($uia, $name)
    {
        $user = new User();
        $user->insertStudent($uia, $name);

        if ($this->verbose === true) {
            echo "\t" . '> ' . $name . "\n";
        }

        return $user->id;
    }

    public function hydrateThemeItem()
    {
        $connaissance = 'hoa://Application/Config/pedagogiques.csv';
        $connaissance = new \Hoa\File\Read($connaissance);
        $eof          = $connaissance->eof();

        while ($eof !== true) {
            $line = str_getcsv($connaissance->readLine());
            if ($line[0] !== '' and $line[0] !== '1') {
                if ($this->_bufferItem > $this->_countItemImport) {
                    $eof = true;
                } else {
                    $this->_bufferItem++;
                    $id = trim($line[0]);
                    $th = trim($line[1]);
                    switch ($id[0]) {
                        case '1':
                            $do = 1;
                            break;
                        case '3':
                            $do = 2;
                            break;
                        case '4':
                            $do = 3;
                            break;
                        case '5':
                            $do = 4;
                            break;
                        case '6':
                            $do = 5;
                            break;
                        case '7':
                            $do = 6;
                            break;
                        case '9':
                            $do = 7;
                            break;
                        default:
                            $do = 7;
                            $ty = 1;
                            break;
                    }


                    if ($th !== '') {
                        $idTheme = $this->hydrateTheme($th, $do);
                        $lvl     = 1;
                        for ($i = 2; $i < count($line); ++$i) {
                            if ($line[$i] !== '') {
                                $this->hydrateItem($idTheme, $line[$i], $lvl);
                            }
                            ++$lvl;
                        }
                    }
                }
            }
        }
        if ($this->verbose === true) {
            echo '# ITEM' . "\n";
        }
    }

    protected function hydrateTheme($label, $ref)
    {
        $theme = new Theme();
        $theme->insert($label, $ref);

        if ($this->verbose === true) {
            echo "\t" . '> Theme  ' . $label . "\n";
        }

        return $theme->id;
    }

    protected function hydrateItem($theme, $label, $lvl)
    {

        $item = new \Application\Model\Item();
        $item->insert($theme, $label, 0, 2, $lvl);
        if ($this->verbose === true) {
            echo "\t" . '> Item ' . $label . "\n";
        }

        return $item->id;
    }

    public function hydrateDomain()
    {
        $m_do    = new Domain();
        $domains = [
            'Electricité',
            'Physique',
            'Optique',
            'Chimie',
            'Thermo-dynamique',
            'Mathematique',
            'Général',
        ];

        foreach ($domains as $domain) {
            $m_do->insert($domain);
        }
        if ($this->verbose === true) {
            echo '# DOMAIN' . "\n";
        }
    }

    /**
     * The command usage.
     *
     * @return int
     */
    public function usage()
    {
        echo \Hoa\Console\Chrome\Text::colorize('Usage:', 'fg(yellow)') . "\n";
        echo '   Welcome ' . "\n\n";

        echo $this->stylize('Options:', 'h1'), "\n";
        echo $this->makeUsageOptionsList([
            'help' => 'This help.',
        ]);

        return;
    }
}

__halt_compiler();
Generate data
