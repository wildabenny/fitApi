<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-03
 * Time: 13:29
 */

namespace App\CommandModel;


use App\Entity\Partner;
use App\Repository\PartnerService;
use League\Tactician\CommandBus;

class CreatePartnerHandler
{
    /** @var CommandBus $commandBus */
    private $commandBus;

    /** @var PartnerService $partnerService */
    private $partnerService;

    public function __construct(CommandBus $commandBus, PartnerService $partnerService)
    {
        $this->commandBus = $commandBus;
        $this->partnerService = $partnerService;
    }

    public function handle(CreatePartnerCommand $command)
    {
        $partner = new Partner($command->getPartnerName(), $command->getDesription(), $command->getNip(), new \DateTime('now'), $command->getWww());

        $this->partnerService->create($partner);
    }
}