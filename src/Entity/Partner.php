<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 22:04
 */

namespace App\Entity;

use App\ValueObjects\Nip;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Partner
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="partner")
 */
class Partner
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="partner_name", length=50, type="string")
     */
    private $partnerName;

    /**
     * @ORM\Column(name="description", length=50, type="string")
     */
    private $description;

    /**
     * @ORM\Column(name="nip", length=10, type="string")
     */
    private $nip;

    /**
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(name="www", type="string")
     */
    private $www;



    public function __construct($partnerName, $description, $nip, $dateCreated, $www = null)
    {
        $this->partnerName = $partnerName;
        $this->description = $description;
        $this->nip = $nip;
        $this->dateCreated = $dateCreated;
        $this->www = $www;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPartnerName(): string
    {
        return $this->partnerName;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getNip(): string
    {
        return $this->nip;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return mixed
     */
    public function getWww()
    {
        return $this->www;
    }




}