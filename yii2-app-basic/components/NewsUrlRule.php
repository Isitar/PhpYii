<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.12.2017
 * Time: 23:54
 */

namespace app\components;


use yii\base\BaseObject;
use yii\web\Request;
use yii\web\UrlManager;
use yii\web\UrlRuleInterface;

class NewsUrlRule extends BaseObject implements UrlRuleInterface
{

    /**
     * Parses the given request and returns the corresponding route and parameters.
     * @param UrlManager $manager the URL manager
     * @param Request $request the request component
     * @return array|bool the parsing result. The route and the parameters are returned as an array.
     * If false, it means this rule cannot be used to parse this path info.
     */
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        if (preg_match('%^([^\/]*)\/([^\/]*)$%', $pathInfo, $matches)) {
            if ($matches[1] == 'news') {
                $params = ['title' => $matches[2]];

                return ['news/item-detail', $params];
            } else {
                return false;
            }
        }

        return false;
    }

    /**
     * Creates a URL according to the given route and parameters.
     * @param UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|bool the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {

        if ($route === 'news/item-detail') {
            if (isset($params['title'])) {
                return 'news/' . $params['title'];
            }
        }
        return false;
    }
}