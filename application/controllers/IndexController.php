<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        
        $tradutor = new Spider_Tradutor();
        
        if(isset($_POST['texto']) and $_POST['texto'] != '')
        {
            echo '<br>Português: '.$_POST['texto'].' - Inglês: '.$tradutor->portuguesParaIngles($_POST['texto']);
        } else if(isset($_POST['text']) and $_POST['text'] != '') {
            echo '<br>Inglês: '.$_POST['text'].' - Português: '.$tradutor->inglesParaPortugues($_POST['text']);
        }        
        
    }


}

