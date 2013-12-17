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
                        'controller' => 'Ecrire\Controller\Ecrire',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
       
	   'template_map'             => array(
            'Ecrire/Ecrire/index' => __DIR__ . '/../view/Ecrire/Ecrire/index.phtml',
			'Ecrire/Ecrire/add' => __DIR__ . '/../view/Ecrire/Ecrire/add.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../views',
        ),
		'strategies' => array (                                
                        'ViewJsonStrategy' 
                ),
	   
    ),
);