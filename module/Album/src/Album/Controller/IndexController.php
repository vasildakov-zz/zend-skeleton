<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
use Album\Entity\Album;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

class IndexController extends AbstractActionController {

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em) 
    {
        $this->em = $em;
    }

    public function getEntityManager() 
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    public function indexAction() 
    {
        

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $album = $entityManager->find("Album\Entity\Album", array("id" => 2));
        $entityManager->persist($album);
        #print_r($album);
        
        return new ViewModel(array(
                    // 'albums' => $this->getEntityManager()->getRepository('Album\Entity\Album')->findAll()
                    'albums' => $entityManager->getRepository("Album\Entity\Album")->findAll()
                )); 
    }

    public function addAction() 
    {
        $form = new AlbumForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            #$form->setData($request->post());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $album->populate($form->getData());
                $this->getEntityManager()->persist($album);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array('form' => $form);
    }

    public function editAction() {
        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        if (!$id) {
            return $this->redirect()->toRoute('album', array('action' => 'add'));
        }
        $album = $this->getEntityManager()->find('Album\Entity\Album', $id);

        $form = new AlbumForm();
        $form->setBindOnValidate(false);
        $form->bind($album);
        $form->get('submit')->setAttribute('label', 'Edit');
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {


        $id = (int) $this->getEvent()->getRouteMatch()->getParam('id');
        $album = $this->getEntityManager()->find('Album\Entity\Album', $id);

        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');
                $album = $this->getEntityManager()->find('Album\Entity\Album', $id);

                if ($album) {
                    $this->getEntityManager()->remove($album);
                    $this->getEntityManager()->flush();
                }
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return array(
            'id' => $id,
            'album' => $this->getEntityManager()->find('Album\Entity\Album', $id)
        );
    }

}