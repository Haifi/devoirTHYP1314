<?php
// module/Album/src/Album/Form/AlbumForm.php:
namespace Ecrire\Form;

use Zend\Form\Form;

class EcrireForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ecrire');
        $this->setAttribute('method', 'post');
            $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
				$this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
						$this->add(array(
            'name' => 'prenom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'prenom',
            ),
            
        ));
	    $this->add(array(
            'name' => 'exercice',
            'attributes' => array(
             'type'  => 'text',
            ),
            'options' => array(
                'label' => 'exercice',
            ),
        ));


        $this->add(array(
            'name' => 'note',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Note',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}