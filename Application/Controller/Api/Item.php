<?php


namespace Application\Controller\Api;


use Application\Controller\Api;
use Application\Maestria\Answer\Graph;
use Application\Maestria\Answer\Synthese;
use Application\Model\Domain;
use Application\Model\Theme;
use Application\Model\UserClass;

class Item extends Api
{

    public function domainActionAsync()
    {


        $d      = [];
        $domain = new Domain();
        $domain = $domain->all();
        $synt   = new Synthese();

        foreach ($domain as $a) {
            /**
             * @var $a \Application\Entities\Domain
             */
            $valuesByUser        = $synt->getAnswerByDomain($a->getId());
            $d['domainHeader'][] = ['id' => $a->getId(), 'label' => $a->getLabel()];
            $d['domainData'][]   = $this->getUserNote($valuesByUser); // TODO change this behind
        }


        $this->data($d);

        echo $this->getApiJson();
    }


    public function themeAction($theme)
    {
        $this->themeActionAsync($theme);
    }

    public function themeActionAsync($theme)
    {

        $d    = [];
        $t    = new Theme();
        $t    = $t->getByRef($theme);
        $synt = new Synthese();


        foreach ($t as $a) {
            /**
             * @var $a \Application\Entities\Theme
             */
            $valuesByUser        = $synt->getAnswerByTheme($a->getId());
            $d['domainHeader'][] = ['id' => $a->getId(), 'label' => $a->getLabel()];
            $d['domainData'][]   = $this->getUserNote($valuesByUser); // TODO change this behind
        }

        $this->data($d);

        echo $this->getApiJson();
    }


    protected function getUserNote($values)
    {
        $data  = [];
        $graph = new Graph();

        foreach ($values as $uid => $v) {

            if (is_array($v)) {
                $avg = array_sum($v) / count($v);
                $avg = round($avg, 0);

                if ($avg > 0) {
                    $data[$uid] = [$avg, $graph->render($v)];
                }
                else {
                    $data[$uid] = ['#NE', ''];
                }
            }

        }

        return $data;
    }

}