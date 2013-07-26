<?php
// module/Backoffice/src/Backoffice/Controller/AuthController.php

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Backoffice\Form\Login;

class AuthController extends AbstractActionController {

    private $loginForm;
    private $authService;

    public function __construct() {
        
    }
    
    
    public function loginAction()
    {
        $this->authService = $this->getServiceLocator()->get('authService');
        $this->loginForm = new Login();
        
        #http://stackoverflow.com/questions/9112766/change-layout-in-the-controller-of-zend-framework-2-0
        $this->layout('layout/auth');
        
        if ($this->authService->hasIdentity()) {
            return $this->redirect()->toRoute('backoffice');
            return new ViewModel(
                array(
                    'loginSuccess' => true,
                    'userLoggedIn'
                    => $this->authService->getIdentity()
                )
            );
        }

        if (!$this->loginForm)
            throw new \BadMethodCallException('Login Form not yet set!');

        if (!$this->authService)
            throw new \BadMethodCallException('Auth Service not yet set!');

        if ($this->getRequest()->isPost()) {
            $this->loginForm->setData($this->getRequest()->getPost());

            if ($this->loginForm->isValid()) {

                $data = $this->loginForm->getData();
                $this->authService->getAdapter()->setIdentity($data['username']);
                $this->authService->getAdapter()->setCredential($data['password']);

                $authResult = $this->authService->authenticate();

                if (!$authResult->isValid()) {
                    return new ViewModel(
                        array(
                            'form' => $this->loginForm,
                            'loginError' => true
                        )
                    );
                }
                else
                    #$this->redirect()->toUrl('backoffice');
                    return $this->redirect()->toRoute('backoffice');
                    
                    /* return new ViewModel(
                        array(
                            'loginSuccess' => true,
                            'userLoggedIn'
                            => $authResult->getIdentity()
                        )
                    ); */
            } else {
                return new ViewModel(
                    array(
                        'form' => $this->loginForm
                    )
                );
            }
        } else {
            return new ViewModel(
                array(
                    'form' => $this->loginForm
                )
            );
        }
    }

    
    public function logoutAction()
    {
        $this->authService = $this->getServiceLocator()->get('authService');
        
        if ($this->authService->hasIdentity())
            $this->authService->clearIdentity();

        $this->redirect()->toUrl('/backoffice/auth/login');
    }

    
    public function setLoginForm($loginForm)
    {
        $this->loginForm = $loginForm;
    }

    
    public function getLoginForm()
    {
        return $this->loginForm;
    }

    
    public function setAuthService($authService)
    {
        $this->authService = $authService;
    }

    
    public function getAuthService()
    {
        return $this->authService;
    }

}