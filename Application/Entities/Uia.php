<?php
namespace Application\Entities;

/**
 * @Entity @Table(name="uia")
 **/
class Uia extends Generic
{

    /** @Id @Column(type="integer") @GeneratedValue * */
    protected $id;
    /** @Column(type="string") * */
    protected $slug;
    /** @Column(type="string") * */
    protected $name;
    /** @Column(type="string") * */
    protected $address;
    /** @Column(type="string") * */
    protected $city;
    /** @Column(type="string") * */
    protected $dept;
    /** @Column(type="string") * */
    protected $region;
    /** @Column(type="string") * */
    protected $chiefidentity;
    /** @Column(type="string") * */
    protected $logourl;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getDept()
    {
        return $this->dept;
    }

    /**
     * @param mixed $dept
     */
    public function setDept($dept)
    {
        $this->dept = $dept;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getChiefidentity()
    {
        return $this->chiefidentity;
    }

    /**
     * @param mixed $chiefidentity
     */
    public function setChiefidentity($chiefidentity)
    {
        $this->chiefidentity = $chiefidentity;
    }

    /**
     * @return mixed
     */
    public function getLogourl()
    {
        return $this->logourl;
    }

    /**
     * @param mixed $logourl
     */
    public function setLogourl($logourl)
    {
        $this->logourl = $logourl;
    }

    public function all()
    {
        return [
            'id'            => $this->id,
            'slug'          => $this->slug,
            'name'          => $this->name,
            'address'       => $this->address,
            'city'          => $this->city,
            'dept'          => $this->dept,
            'region'        => $this->region,
            'chiefidentity' => $this->chiefidentity,
            'logourl'       => $this->logourl
        ];
    }


}