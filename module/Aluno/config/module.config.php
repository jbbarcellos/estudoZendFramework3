<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Aluno;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'aluno' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/aluno[/:action[/:id][/page/:page]]',
                    'constraints' =>[
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'page' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlunoController::class,
                        'action'     => 'index',
                        'page' => 1,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
    //        Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'aluno/aluno/index' => __DIR__ . '/../view/aluno/aluno/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
