# SpiderTranslate

Para executar o sistemas, favor direcionar para a Index do projeto em: http://localhost/SpiderTranslate/public/index.php/

Ou se o server estiver configurado com o VirtualHost, como abaixo, favor utilizar o endere�o: http://localhost/SpiderTranslate/index.php/

   '<'VirtualHost *:80'>'
       ServerName SpiderTranslate.local
        DocumentRoot C:/(Pasta Raiz dos Sistemas PHP)/SpiderTranslate/public
     
        SetEnv APPLICATION_ENV "development"
     
        <Directory C:/(Pasta Raiz dos Sistemas PHP)/SpiderTranslate/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
