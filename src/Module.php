<?php
namespace MonthlyBasis\QuestionHttps;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use MonthlyBasis\QuestionHttps\Controller as QuestionHttpsController;

class Module
{
    public function getConfig()
    {
        return [
            'controllers' => [
                'factories' => [
                    QuestionHttpsController\Index::class => function ($sm) {
                        return new QuestionHttpsController\Index();
                    },
                ],
            ],
            'router' => [
                'routes' => [
                    'index' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/',
                            'defaults' => [
                                'controller' => QuestionHttpsController\Index::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                ],
            ],
            'view_manager' => [
                'display_not_found_reason' => true,
                'doctype'                  => 'HTML5',
                'not_found_template'       => 'error/404',
                'exception_template'       => 'error/index',
                'template_map' => [
                    'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
                    'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
                    'error/404'               => __DIR__ . '/../view/error/404.phtml',
                    'error/index'             => __DIR__ . '/../view/error/index.phtml',
                ],
                'template_path_stack' => [
                    'application' => __DIR__ . '/../view',
                ],
            ],
        ];
    }
}
