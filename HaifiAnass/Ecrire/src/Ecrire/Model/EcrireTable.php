<?php
// module/Ecrire/src/Ecrire/Model/EcrireTable.php:
namespace Ecrire\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class EcrireTable extends AbstractTableGateway
{
    protected $table ='etudiant';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Ecrire());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
	
	

    public function getEcrire($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveEcrire(Ecrire $Ecrire)
    {
        $data = array(
            'id' => $Ecrire->id,
			'nom' => $Ecrire->nom,
			'prenom' => $Ecrire->prenom,
            'exercice'  => $Ecrire->exercice,
			'note'  => $Ecrire->note,
        );
        $id = (int)$Ecrire->id_eleve;
        if ($id == 0) {
	
            $this->insert($data);
        } else {
            if ($this->getEcrire($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

}