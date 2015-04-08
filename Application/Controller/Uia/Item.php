<?php
/**
 * Created by PhpStorm.
 * User: camael
 * Date: 01/04/15
 * Time: 20:04
 */

namespace Application\Controller\Uia;

use Application\Controller\Api;
use Application\Model\Domain;
use Application\Model\Theme;

class Item extends Api
{
    public function indexAction()
    {
        $this->data->domain = new Domain();
        $this->data->theme  = new Theme();
        $this->data->item   = new \Application\Model\Item();


        return $this->greut->render();
    }

    public function createDomainActionAsync()
    {
        if (isset($_POST['label'])) {
            $label  = $_POST['label'];
            $domain = new Domain();
            $domain->insert($label);

            $this->ok($label);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function createThemeActionAsync($domain_id)
    {
        if (isset($_POST['label'])) {
            $label = $_POST['label'];
            $theme = new Theme();
            $theme->insert($label, $domain_id);

            $this->ok($label);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function createItemActionAsync()
    {
        if (isset($_POST['label']) and isset($_POST['theme'])) {
            $label = $_POST['label'];
            $theme = $_POST['theme'];
            $item  = new \Application\Model\Item();

            $item->insert($theme, $label, 1, 0, 0);
            $this->ok($label);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }
}