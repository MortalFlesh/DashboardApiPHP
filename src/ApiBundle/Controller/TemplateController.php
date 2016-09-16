<?php

namespace MF\Dashboard\ApiBundle\Controller;

use MF\Dashboard\ApiBundle\Entity\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/template")
 */
class TemplateController extends Controller
{
    /**
     * @Route("/list/", name="api.get.template.list")
     * @Method("GET")
     *
     * @return JsonResponse
     */
    public function getListAction()
    {
        $templates = $this->getDoctrine()->getRepository('ApiBundle:Template')->findAll();

        return new JsonResponse([
            'meta' => [
                'count' => count($templates),
            ],
            'templates' => $templates,
        ]);
    }

    /**
     * @Route("/{id}/name/", name="api.get.template.name")
     * @Method("GET")
     *
     * @param Template $template
     * @return JsonResponse
     */
    public function getNameAction(Template $template)
    {
        return new JsonResponse([
            'meta' => [
                'id' => $template->getId(),
            ],
            'name' => $template->getName(),
        ]);
    }

    /**
     * @Route("/", name="api.post.template.list")
     * @Method("POST")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postTemplateAction(Request $request)
    {
        $name = $request->request->get('name');

        if (!empty($name)) {
            return new JsonResponse(['error' => 'empty-name'], 400);
        }

        $template = new Template();
        $template->setName($name);

        $this->getDoctrine()->getRepository('ApiBundle:Template')->save($template);

        return new JsonResponse([
            'id' => $template->getId(),
        ]);
    }
}
