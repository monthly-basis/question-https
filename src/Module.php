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
                    'monthly-basis/question-https' => [
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
                'template_path_stack' => [
                    'monthly-basis/question-https' => __DIR__ . '/../view',
                ],
            ],
        ];
    }
}
