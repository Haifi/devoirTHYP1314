<?php
// module/Ecrire/conﬁg/module.config.php:
// module/Ecrire/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Ecrire\Controller\Ecrire' => 'Ecrire\Controller\EcrireController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'Ecrire' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/Ecrire[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ecrire\Controller\ecrire',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
       
	   'template_map'             => array(
            'ecrire/ecrire/index' => __DIR__ . '/../view/ecrire/ecrire/index.phtml',
			'ecrire/ecrire/add' => __DIR__ . '/../view/ecrire/ecrire/add.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../views',
        ),
		'strategies' => array (                                
                        'ViewJsonStrategy' 
                ),
	   
    ),
);