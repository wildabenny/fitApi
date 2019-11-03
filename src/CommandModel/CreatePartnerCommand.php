<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-03
 * Time: 13:27
 */

namespace App\CommandModel;


use App\ValueObjects\Nip;

class CreatePartnerCommand
{
    /** @var string */
    private $partnerName;

    /** @var string */
    private $desription;

    /** @var Nip */
    private $nip;

    /** @var string|null */
    private $www;

    /**
     * CreatePartnerCommand constructor.
     * @param string $partnerName
     * @param string $desription
     * @param Nip $nip
     * @param string|null $www
     */
    public function __construct(string $partnerName, string $desription, Nip $nip, ?string $www)
    {
        $this->partnerName = $partnerName;
        $this->desription = $desription;
        $this->nip = $nip;
        $this->www = $www;
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
    public function getDesription(): string
    {
        return $this->desription;
    }

    /**
     * @return Nip
     */
    public function getNip(): Nip
    {
        return $this->nip;
    }

    /**
     * @return string|null
     */
    public function getWww(): ?string
    {
        return $this->www;
    }


}