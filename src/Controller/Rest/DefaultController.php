<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-02
 * Time: 21:58
 */

namespace App\Controller\Rest;


use App\CommandModel\CreatePartnerCommand;
use App\Dto\PartnerData;
use App\Form\PartnerType;
use App\ValueObjects\Nip;
use App\ViewModel\PartnerViewModeInterface;
use App\ViewModel\PartnerViewRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractFOSRestController
{
    /** @var CommandBus */
    private $commandBus;

    /** @var PartnerViewRepository */
    private $partnerViewModel;

    public function __construct(CommandBus $commandBus, PartnerViewRepository $partnerViewModel)
    {
        $this->commandBus = $commandBus;
        $this->partnerViewModel = $partnerViewModel;
    }

    /**
     * @param Request $request
     * @Rest\Post("/partner")
     * @return Response
     */
    public function postAction(Request $request)
    {
        $data = new PartnerData();
        $data->setPartnerName($request->get('partnerName'));
        $data->setDescription($request->get('description'));
        $data->setNip(new Nip($request->get('nip')));
        $data->setWww($request->get('www'));

        $form = $this->createForm(PartnerType::class, $data);

        $form->handleRequest($request);

        $command =  new CreatePartnerCommand($data->getPartnerName(), $data->getDescription(), $data->getNip(), $data->getWww());
        $this->commandBus->handle($command);

        $response = new Response(json_encode(['status' => 'ok']), 200);
        return $response;


    }

    /**
     * @Rest\Get("/partner/{id}")
     * @return JsonResponse
     */
    public function getAction($id)
    {
        $data = $this->partnerViewModel->getOne($id);

        return new JsonResponse([
            'id' => $data->getId(),
            'name' => $data->getName(),
            'description' => $data->getDescription(),
            'nip' => $data->getNip(),
            'www' => $data->getWww(),
            'dateCreated' => $data->getDateCreated()
        ]);
    }


}