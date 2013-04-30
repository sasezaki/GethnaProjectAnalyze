<?php
return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'projectanalyze' => array(
                    'options' => array(
                        'route' => 'projectanalyze debug',
                        'defaults' => array(
                            'controller' => 'GethnaProjectAnalyze\Controller\Github',
                            'action'     => 'debug',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'gethna-project-analyze' => array(
        /**
         * Cache configuration
         */
        'cache' => array(
            'adapter'   => array(
                'name' => 'filesystem',
                'options' => array(
                    'cache_dir' => realpath('./data/cache'),
                    'writable' => false,
                ),
            ),
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => true),
                'serializer'
            )
        ),
        'cache_key' => 'gethna-projectanalyze',
    ),
);
