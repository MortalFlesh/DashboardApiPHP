<?php

namespace MF\Dashboard\ApiBundle\Controller;

use MF\Collection\Mutable\Generic\ListCollection;
use MF\Dashboard\ApiBundle\Entity\Item;
use MF\Dashboard\ApiBundle\Entity\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/template/{id}/item")
 */
class TemplateItemController extends Controller
{
    /**
     * @Route("/list/", name="api.get.template.item.list")
     * @Method("GET")
     *
     * @param Template $template
     * @return JsonResponse
     */
    public function getListAction(Template $template)
    {
        $items = $template->getItems();
        $itemList = ListCollection::createGenericListFromArray(Item::class, $items->toArray());

        return new JsonResponse([
            'meta' => [
                'template' => [
                    'id' => $template->getId(),
                ],
                'count' => $items->count(),
            ],
            'items' => $itemList->map('($i) => $i->toArray()')->toArray(),
        ]);
    }

    /**
     * @Route("/list/", name="api.post.template.item.list")
     * @Method("POST")
     *
     * @param Request $request
     * @param Template $template
     * @return JsonResponse
     */
    public function postListAction(Request $request, Template $template)
    {
        $items = $request->request->get('items');

        return new JsonResponse([
            'meta' => [
                'template' => [
                    'id' => $template->getId(),
                ],
            ],
            'error' => 'not-implemented-yet',
            'items' => $items,
        ]);
    }

    /**
     * @Route("/", name="api.post.template.item")
     * @Method("POST")
     *
     * @param Request $request
     * @param Template $template
     * @return JsonResponse
     */
    public function postItemAction(Request $request, Template $template)
    {
        $itemData = $request->request->get('item');

        if (empty($itemData)) {
            return new JsonResponse(['error' => 'empty-item'], 400);
        }

        $item = new Item();
        $item->setName($itemData['name']);
        $item->setUrl($itemData['url']);
        $item->setTop($itemData['top']);
        $item->setLeft($itemData['left']);
        $item->setHeight($itemData['height']);
        $item->setWidth($itemData['width']);
        $item->setRefreshRate($itemData['refreshRate']);

        $template->addItem($item);

        $this->getDoctrine()->getRepository('ApiBundle:Template')->save($template);

        return new JsonResponse([
            'meta' => [
                'template' => [
                    'id' => $template->getId(),
                ],
            ],
            'id' => $item->getId(),
        ]);
    }

    /**
     * @Route("/delete/", name="api.post.template.item.delete")
     * @Method("POST")
     *
     * @param Request $request
     * @param Template $template
     * @return JsonResponse
     */
    public function postDeleteAction(Request $request, Template $template)
    {
        $itemId = $request->request->getInt('id');

        $item = $this->getDoctrine()->getRepository('ApiBundle:Item')->find($itemId);

        return new JsonResponse([
            'meta' => [
                'template' => [
                    'id' => $template->getId(),
                ],
            ],
            'error' => 'not-implemented-yet',
            'item' => $item,
        ]);
    }
}
