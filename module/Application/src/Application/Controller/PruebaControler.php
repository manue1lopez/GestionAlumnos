<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\ViewModel;

class PruebasController extends AbstractActionController{

    public function indexAction(){

        return new ViewModel();

    }

    public function verProductoDosAction(){

        $view=new ViewModel();

        //Indicamos que layout va a utilizar este método

        $this->layout('layout/pruebas');


        $this->layout()->saludo="Hola como estas";


        $this->layout()->title="Soy el titulo de una plantilla";

        //Renderizamos la vista

        return $view;

    }

    public function verAjaxAction(){

       $view=new ViewModel();

       //Recibimos datos sin estilos, ideal cuando usemos ajax

       $view->setTerminal(true);

       return $view;

    }

}

