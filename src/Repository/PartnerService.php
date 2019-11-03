<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-03
 * Time: 11:53
 */

namespace App\Repository;


use App\Entity\Partner;
use App\Entity\PartnerRepository;
use App\Exceptions\PartnerNotFoundException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\EntityManagerInterface;

class PartnerService
{
    /** @var EntityManager */
    protected $em;

    /** @var PartnerRepository */
    protected $partnerRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em= $em;
        $this->partnerRepository = $this->em->getRepository(Partner::class);
    }

    public function findById($id): Partner
    {
        /** @var Partner $partner */
        $partner = $this->partnerRepository->find($id);

        if (!$partner) {
            throw new PartnerNotFoundException('partner not found');
        }

        return $partner;
    }

    public function create(Partner $partner)
    {
        try {
            $this->em->persist($partner);
            $this->em->flush($partner);
        } catch (ORMException $exception) {
            echo $exception->getMessage();
        }

        return $partner;
    }

    public function update(Partner $partner)
    {
        $this->em->flush($partner);

        return $partner;
    }

    public function delete(Partner $partner)
    {
        $this->em->remove($partner);
        $this->em->flush($partner);
    }
}