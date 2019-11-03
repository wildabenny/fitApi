<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 22:16
 */

namespace App\Dto;

use App\ValueObjects\Nip;
use Symfony\Component\Validator\Constraints as Assert;


class PartnerData
{
    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $partnerName;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $description;

    /**
     * @Assert\NotBlank()
     * @var Nip
     */
    private $nip;

    /**
     * @var string
     */
    private $www;

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
     * @return Nip
     */
    public function getNip(): Nip
    {
        return $this->nip;
    }

    /**
     * @return string
     */
    public function getWww(): ?string
    {
        return $this->www;
    }

    /**
     * @param string $partnerName
     */
    public function setPartnerName(string $partnerName): void
    {
        $this->partnerName = $partnerName;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param Nip $nip
     */
    public function setNip(Nip $nip): void
    {
        $this->nip = $nip;
    }

    /**
     * @param string $www
     */
    public function setWww(?string $www): void
    {
        $this->www = $www;
    }

}