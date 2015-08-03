<?php

class Spider_BingTranslate {
    
    public function __construct(){
        
        // Tira os "NOTICES" da tela
        error_reporting('~E_NOTICE');
           
        // Define as credenciais, para recuperar o Token posteriormente
        // Obs: Foi criada uma conta chamada developer-test-spider@hotmail.com 
        // somente para este fim 
        $this->clientID = 'developer-test-spider';
        $this->clientSecret = 'Y1lDh2J7Mvbo/NPbjAO9Bnn6cUHUZ/CEl7/ij0snkX8=';

    }

    // Método retirado diretamente do site da Microsoft para autenticar e pegar o Token
    function getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl){
        try {
        //Inicializa a Sessão CURL
        $ch = curl_init();
        //Crea o vetor de requisição
        $paramArr = array (
             'grant_type'    => $grantType,
             'scope'         => $scopeUrl,
             'client_id'     => $clientID,
             'client_secret' => $clientSecret
        );
        //Cria um Http Query.//
        $paramArr = http_build_query($paramArr);
        //Seta o Curl URL.
        curl_setopt($ch, CURLOPT_URL, $authUrl);
        //Seta Requisição HTTP POST.
        curl_setopt($ch, CURLOPT_POST, TRUE);
        //Seta dados para POST em operações HTTP "POST".
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArr);
        //CURLOPT_RETURNTRANSFER- TRUE para retornar a transferência como uma string no valor retornado de curl_exec().
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //CURLOPT_SSL_VERIFYPEER- Seta FALSE para parar cURL na verificação de pessoas certificadas.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //Executa a sessão cURL.
        $strResponse = curl_exec($ch);
        //Pega o código do erro retornado pelo Curl.
        $curlErrno = curl_errno($ch);
        if($curlErrno){
            $curlError = curl_error($ch);
            throw new Exception($curlError);
        }
        //Fecha a sessão Curl.
        curl_close($ch);
        //Decodifica o JSon.
        $objResponse = json_decode($strResponse);
        if ($objResponse->error){
            throw new Exception($objResponse->error_description);
        }
        return $objResponse->access_token;
    } catch (Exception $e) {
        echo "Exception-".$e->getMessage();
    }
}

    public function traduzir($palavra,$de,$para)
    {
        try {

            //Client ID da aplicação.
            $clientID       = $this->clientID;
            //Client Secret key da aplicação.
            $clientSecret = $this->clientSecret;
            //OAuth Url.
            $authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
            //Application Scope Url
            $scopeUrl     = "http://api.microsofttranslator.com";
            //Application grant type
            $grantType    = "client_credentials";

            //Cria o objeto Spider_Tradutos.
            $authObj      = new Spider_BingTranslate;
            //Pega o token.
            $accessToken  = $authObj->getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);	

            $url = 'http://api.microsofttranslator.com/V2/Http.svc/Translate?text='.$palavra.'&from='.$de.'&to='.$para.'';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:bearer '.$accessToken));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
            $rsp = curl_exec($ch); 

            preg_match_all('/<string (.*?)>(.*?)<\/string>/s', $rsp, $matches);
            return $matches[2][0];

        } catch (Exception $e) {
                return "Exception: " . $e->getMessage() . PHP_EOL;
        }
    }
}

