<?php


namespace Application\Model;


use Hoa\Core\Exception\Exception;

class Uia extends Generic
{

    public function getBySlug($slug)
    {
        return $this->getBy('slug', $slug);
    }

    public function getBy($column, $value)
    {
        /**
         * @var $entity \Application\Entities\Uia
         */
        $entity = $this->_repository->findBy([$column => $value]);

        if (count($entity) === 1) {
            return $entity[0];
        } else {
            throw new Exception('Item %s with value %s are not in database', 0, [$column, $value]);
        }
    }

    public function slugExist($slug)
    {
        return $this->_exists('slug', $slug);
    }

    protected function _exists($column, $value)
    {
        $e = $this->_repository->findBy([$column => $value], null, 1);

        return (count($e) >= 1);
    }

    public function insert($slug, $name, $address, $city, $dept, $region, $chiefidentity, $logourl)
    {

        if($this->slugExist($slug) === false)
            $this->_insert($slug, $name, $address, $city, $dept, $region, $chiefidentity, $logourl);
    }


    protected function _insert($slug, $name, $address, $city, $dept, $region, $chiefidentity, $logourl)
    {
        $uia = new \Application\Entities\Uia();
        $uia->setSlug($slug);
        $uia->setName($name);
        $uia->setAddress($address);
        $uia->setCity($city);
        $uia->setDept($dept);
        $uia->setRegion($region);
        $uia->setChiefidentity($chiefidentity);
        $uia->setLogourl($logourl);

        $this->_em->persist($uia);
        $this->_em->flush();
    }
}
