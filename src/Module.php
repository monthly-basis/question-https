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
                    QuestionHttpsController\Questions::class => function ($sm) {
                        return new QuestionHttpsController\Questions();
                    },
                    QuestionHttpsController\Questions\Ask::class => function ($sm) {
                        return new QuestionHttpsController\Questions\Ask();
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
                        'priority' => -1,
                        'may_terminate' => true,
                    ],
                    'monthly-basis/question-https/questions' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/questions',
                            'defaults' => [
                                'controller' => QuestionHttpsController\Questions::class,
                                'action'     => 'index',
                            ],
                        ],
                        'priority' => -1,
                        'may_terminate' => true,
                        'child_routes' => [
                            'ask' => [
                                'type' => Literal::class,
                                'options' => [
                                    'route'    => '/ask',
                                    'defaults' => [
                                        'controller' => QuestionHttpsController\Questions\Ask::class,
                                        'action'     => 'ask',
                                    ],
                                ],
                                'may_terminate' => true,
                            ],
                        ]
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
