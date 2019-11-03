<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-03
 * Time: 14:34
 */

namespace App\ViewModel;


use App\Entity\Partner;
use App\Repository\PartnerService;

class PartnerViewRepository implements PartnerViewModeInterface
{
    /** @var PartnerService $partnerService */
    private $partnerService;

    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    public function getOne($id)
    {
        $partner = $this->partnerService->findById($id);

        return $this->assignDataToViewModel($partner);
        
        
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function assignDataToViewModel(Partner $partner)
    {
        $viewModel = new PartnerViewModel();

        $viewModel->setId($partner->getId());
        $viewModel->setName($partner->getPartnerName());
        $viewModel->setDescription($partner->getDescription());
        $viewModel->setNip($partner->getNip());
        $viewModel->setDateCreated(date_format($partner->getDateCreated(), 'Y-m-d H:i:s'));
        $viewModel->setWww($partner->getWww());

        return $viewModel;
    }


}