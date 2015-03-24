<?php


namespace Application\Model;


class Uia extends Generic
{

    public function getBySlug($slug)
    {
        return $this->getBy('slug', $slug);
    }

    public function getBySludId($slug)
    {
        return $this->getBy('slug', $slug)->getId();
    }

    public function insert($slug, $name, $address, $city, $dept, $region, $chiefidentity, $logourl)
    {

        if ($this->slugExist($slug) === false) {
            return $this->_insert($slug, $name, $address, $city, $dept, $region, $chiefidentity, $logourl);
        }

        return false;
    }

    public function slugExist($slug)
    {
        return $this->_exists('slug', $slug);
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

        return true;
    }
}
