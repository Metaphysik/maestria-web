<?php
/**
 * Created by PhpStorm.
 * User: Camael24
 * Date: 16/01/14
 * Time: 17:22
 */
namespace Application\Bin\Command\Sample;


use Application\Model\Classroom;
use Application\Model\Uia;
use Application\Model\User;
use Application\Model\UserClass;
use Faker\Factory;
use mageekguy\atoum\tests\units\notEmptyTest;

class Data extends \Hoa\Console\Dispatcher\Kit
{

    /**
     * Options description.
     *
     * @var \Hoa\Core\Bin\Welcome array
     */
    protected $options = [
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, 'h'],
        ['help', \Hoa\Console\GetOption::NO_ARGUMENT, '?'],
        ['test', \Hoa\Console\GetOption::NO_ARGUMENT, 't'],
    ];

    protected $uias = [
        'demo',
        'caraminot'
    ];

    /**
     * The entry method.
     *
     * @access  public
     * @return  int
     */
    public function main()
    {
        require 'hoa://Application/Config/Environnement.php';

        $this->hydrateUia();
        $this->hydrateUser();
        $this->hydrateClassroom();
        $this->hydateStudentAndAssociation();
    }


    public function hydrateUia()
    {

        $model = new Uia();

        $model->insert('demo', 'Lycée de la démologie', '1 Place du Mont Blanc', 'Sarlat la Canéda', 'Dordogne',
            'Aquitaine', 'Mr Toupasbo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');

        $model->insert('caraminot', 'Lycée Professionnel Pierre Caraminot', '15 Avenue du paradis', 'Egletons',
            'Correze', 'Limousin', 'Mr Vraimentbobo', 'https://gmkfreelogos.com/logos/I/img/Its__Demo.gif');
    }

    public function hydrateUser()
    {
        $user = new User();

        foreach($this->uias as $uia) {
            $user->insert($uia, 'admin', 'admin@nowhere.com', sha1('admin'), 1, 1, 0, 'Admin Istrator', 0, time(), '', 2);
            $user->insert($uia, 'modo', 'modo@nowhere.com', sha1('modo'), 0, 1, 0, 'Maude Erator', 0, time(), '', 2);
            $user->insert($uia, 'prof', 'prof@nowhere.com', sha1('prof'), 0, 1, 0, 'Prof Essor', 0, time(), '', 2);
        }

    }

    public function hydrateClassroom()
    {
        $class = new Classroom();
        $classes = [
          '1°S',
            '1°ES',
            '1°STI',
            '2nd1',
            '2nd2',
            'TS',
            'TSTI'
        ];

        foreach($this->uias as $uia) {
            foreach($classes as $classe) {
                $class->insert($uia, $classe);
            }
        }

    }

    public function hydateStudentAndAssociation()
    {
        $faker = Factory::create();
        $uc = new UserClass();


        foreach ($this->uias as $uia) {
            for ($classe = 0; $classe < 7; $classe++) {
                for($i = 0; $i < 20; $i++) {
                    $id = $this->hydrateStudent($uia, $faker->name);
                    $uc->associate($uia, $classe, $id);
                }
            }
        }
    }

    protected function hydrateStudent($uia, $name)
    {
        $user = new User();
        $user->insertStudent($uia, $name);


        return $user->id;
    }


    /**
     * The command usage.
     *
     * @access  public
     * @return  int
     */
    public function usage()
    {
        echo \Hoa\Console\Chrome\Text::colorize('Usage:', 'fg(yellow)') . "\n";
        echo '   Welcome ' . "\n\n";

        echo $this->stylize('Options:', 'h1'), "\n";
        echo $this->makeUsageOptionsList([
            'help' => 'This help.'
        ]);

        return;
    }
}

__halt_compiler();
Generate data
