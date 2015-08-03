<?php

class Spider_Tradutor {
    
    // Método para traduzir do Português para o Inglês
    public function portuguesParaIngles($palavra)
    {
        $traduzir = new Spider_BingTranslate;
        return $traduzir->traduzir($palavra,'pt','en');
    }
    
    // Método para traduzir do Inglês para o Português
    public function inglesParaPortugues($word)
    {
        $translate = new Spider_BingTranslate;
        return $translate->traduzir($word,'en','pt');
    }
}
