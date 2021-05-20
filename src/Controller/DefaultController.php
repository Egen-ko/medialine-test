<?php

namespace App\Controller;

use App\Form\Service1OptionsType;
use App\Form\Service2OptionsType;
use App\Model\Service;
use App\Model\Service1Options;
use App\Model\Service2Options;
use App\Service\HttpService;
use App\Service\RestService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/options/{service}", name="options", requirements={"service"="1|2"})
     */
    public function serviceOptions(Request $request, LoggerInterface $logger, int $service): Response
    {
        try {
            $srv = $this->getService($service);
            $options = $srv->getOptions();
        }
        catch (\Exception $e) {
            $logger->error(sprintf('Ошибка получения настроек.'), [$e]);
            $options = null;
        }

        try {
            $form = $this->getServiceForm($service, $options);
        } catch (\Exception $e) {
            $logger->error(sprintf('Ошибка: неверный номер сервиса (%d)', $service), [$e]);
            return $this->redirectToRoute('default');
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $options = $form->getData();

            try {
                $srv->setOptions($options);

                $this->addFlash('success', 'Настройки сохранены!');
                return $this->redirectToRoute('options', ['service' => $service]);
            } catch (\Exception $e) {
                $logger->error('Ошибка при сохранении настроек!', [$e]);
                $this->addFlash('error', 'При сохранении настроек произошла ошибка!');
            }
        }

        return $this->render('options/options.html.twig', [
            'form' => $form->createView(),
            //'client' => $client,
        ]);

        //return new Response('ой');
    }

    /**
     * @param int $serviceNum
     * @return FormInterface
     */
    private function getServiceForm(int $serviceNum, $options = null): FormInterface
    {
        switch ($serviceNum) {
            case 1:
                if (!isset($options))
                    $options = new Service1Options();
                return $this->createForm(Service1OptionsType::class, $options);
            case 2:
                if (!isset($options))
                    $options = new Service2Options();
                return $this->createForm(Service2OptionsType::class, $options);
            default:
                throw new \InvalidArgumentException('Неверный номер сервиса');
        }
    }

    /**
     * @param int $serviceNum
     * @return Service
     */
    private function getService(int $serviceNum): Service
    {
        switch ($serviceNum) {
            case 1:
                return new HttpService('https://site.url/options');
            case 2:
                return new RestService('https://api.url/options');
            default:
                throw new \InvalidArgumentException('Неверный номер сервиса');
        }
    }

}
