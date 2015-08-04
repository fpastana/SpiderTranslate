# SpiderTranslate

Para executar o sistemas, favor direcionar para a Index do projeto em: http://localhost/SpiderTranslate/public/index.php/

Ou se o server estiver configurado com o VirtualHost, como abaixo, favor utilizar o endereço: http://localhost/SpiderTranslate/index.php/

    <'<'VirtualHost *:80'>'>
        ServerName SpiderTranslate.local
        DocumentRoot C:/Users/Felipe/OneDrive/Sites/SpiderTranslate/public
     
        SetEnv APPLICATION_ENV "development"
     
        <Directory C:/Users/Felipe/OneDrive/Sites/SpiderTranslate/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
