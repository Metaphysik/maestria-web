<?php

/**
 * Created by PhpStorm.
 * User: camael
 * Date: 01/04/15
 * Time: 20:04.
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
        $this->data->theme = new Theme();
        $this->data->item = new \Application\Model\Item();

        return $this->greut->render();
    }

    public function createDomainActionAsync()
    {
        if (isset($_POST['label'])) {
            $label = $_POST['label'];
            $domain = new Domain();
            $domain->insert($label);

            $this->ok($label);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function createThemeActionAsync()
    {
        if (isset($_POST['label']) and isset($_POST['domain'])) {
            $domain_id = $_POST['domain'];
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
            $item = new \Application\Model\Item();

            $item->insert($theme, $label, 1, 0, 0);
            $this->ok($label);
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function updateDomainActionAsync()
    {
        if (isset($_POST['label']) and isset($_POST['id'])) {
            $label = $_POST['label'];
            $id = $_POST['id'];
            $domain = new Domain();

            if ($domain->labelExists($label) === false) {

                /**
                 * @var \Application\Entities\Domain
                 */
                $entity = $domain->get($id);
                $entity->setLabel($label);
                $domain->update($entity);
                $this->ok();
            } else {
                $this->nok('Label ever exists');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function updateThemeActionAsync()
    {
        if (isset($_POST['label']) and isset($_POST['id']) and isset($_POST['ref'])) {
            $label = $_POST['label'];
            $id = $_POST['id'];
            $domain = $_POST['ref'];
            $theme = new Theme();

            if ($theme->labelExists($label, $domain) === false) {

                /**
                 * @var \Application\Entities\Theme
                 */
                $entity = $theme->get($id);
                $entity->setLabel($label);

                $theme->update($entity);

                $this->ok();
            } else {
                $this->nok('Label ever exists');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function updateActionAsync()
    {
        if (isset($_POST['label']) and isset($_POST['tid']) and isset($_POST['id'])) {
            $label = $_POST['label'];
            $tid = $_POST['tid'];
            $id = $_POST['id'];
            $item = new \Application\Model\Item();

            if ($item->labelExists($tid, $label) === false) {
                /**
                 * @var \Application\Entities\Item
                 */
                $entity = $item->get($id);

                $entity->setLabel($label);
                $item->update($entity);
                $this->ok();
            } else {
                $this->nok('Label ever exists');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function deleteDomainActionAsync()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $dom = new Domain();
            $ent = $dom->get($id);
            if ($ent !== null) {
                $dom->delete($ent);
                $this->ok();
            } else {
                $this->nok('Ever deleted');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function deleteThemeActionAsync()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $theme = new Theme();
            $entity = $theme->get($id);
            if ($entity !== null) {
                $theme->delete($entity);
                $this->ok();
            } else {
                $this->nok('Ever deleted');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }

    public function deleteActionAsync()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $item = new \Application\Model\Item();
            $entity = $item->get($id);
            if ($entity !== null) {
                $item->pendingTrash($id);
                $this->ok();
            } else {
                $this->nok('Ever deleted');
            }
        } else {
            $this->nok('Api error');
        }

        echo $this->getApiJson();
    }
}
