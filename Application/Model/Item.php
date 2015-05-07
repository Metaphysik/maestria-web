<?php


namespace Application\Model;


class Item extends Generic
{

    public function getByTheme($themeID)
    {
        return $this->_repository->findBy(['refTheme' => $themeID]);
    }

    public function insert($refTheme, $label, $type, $status, $lvl)
    {

        if ($this->labelExists($refTheme, $label) === false) {
            return $this->_insert($refTheme, $label, $type, $status, $lvl);
        }

        return false;
    }

    public function labelExists($refTheme, $label)
    {

        $e = $this->_repository->findBy(
            [
                'label'    => $label,
                'refTheme' => $refTheme
            ], null, 1);

        return (count($e) >= 1);
    }

    protected function _insert($refTheme, $label, $type, $status, $lvl)
    {
        $item = new \Application\Entities\Item();
        $item->setRefTheme($refTheme);
        $item->setLabel($label);
        $item->setType($type);
        $item->setStatus($status);
        $item->setLvl($lvl);

        $this->_em->persist($item);
        $this->_em->flush();

        $this->id = $item->getId();

        return true;
    }

    public function pendingTrash($id)
    {
        /**
         * @var $e \Application\Entities\Item
         */
        $e = $this->get($id);

        $e->setStatus(-1);
        $this->update($e);

        return true;
    }
}
