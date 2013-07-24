<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class PostController extends AbstractActionController {

    public function indexAction() {
        $repository = $this->getEntityManager()->getRepository('Blog\Entity\Post');
        $posts = $repository->findAll();

        return array(
            'posts' => $posts
        );
    }

    public function addAction() {
        
    }

    public function editAction() {
        
    }

    public function deleteAction() {
        
    }

}