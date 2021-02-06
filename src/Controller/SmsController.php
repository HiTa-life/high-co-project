<?php

namespace App\Controller;

use App\Entity\Sms;
use App\Repository\SmsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    /**
     * @Route("/sms", name="sms")
     */
    public function index(): Response
    {
        return $this->render('sms/index.html.twig', [
            'controller_name' => 'SmsController',
        ]);
    }

    /**
     * @param Sms $sms
     * @param SmsRepository $smsRepository
     */
    public function GetContainMessage(Sms $sms,SmsRepository $smsRepository)
    {
        $this->$smsRepository->findAll();

    }
}
