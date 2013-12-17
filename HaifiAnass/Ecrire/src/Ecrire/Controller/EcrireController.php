<?php
// module/Ecrire/src/Ecrire/Controller/EcrireController.php:
namespace Ecrire\Controller;
use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Ecrire\Model\Ecrire;          
use Ecrire\Form\EcrireForm;     

class EcrireController extends AbstractActionController
{
	protected $EcrireTable;

	
    public function indexAction()
    {
        return new ViewModel(array(
            'Ecrires' => $this->getEcrireTable()->fetchAll(),
			));
    }

    public function addAction()
    {
       
        $form = new EcrireForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Ecrire();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getEcrireTable()->saveEcrire($album);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Ecrire');
            }
        }
        return array('form' => $form);
    }

    

	
public function getEcrireTable()
    {
        if (!$this->EcrireTable) {
            $sm = $this->getServiceLocator();
            $this->EcrireTable = $sm->get('Ecrire\Model\EcrireTable');
        }
        return $this->EcrireTable;
    }
}