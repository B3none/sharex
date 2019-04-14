# ShareX
Custom image uploading via ShareX

## Server Installation

- Clone the repository onto your webserver running PHP version `>=7.1`.
- For Apache use you'll need to create the following site: 
```apacheconfig
<VirtualHost *:80>
        # The domain name
        ServerName example.com

        # Populate this with the path to the web folder.
        DocumentRoot /path/to/sharex/web

        # This should be the same as the DocumentRoot
        <Directory /path/to/sharex/web>
            # Ensure that we are routing all requests through the index.php
            FallbackResource /index.php
        </Directory>
</VirtualHost>
```
- Run `composer install` in the root of the cloned repository
- Run `mv /app/config.example.php /app/config.php` in the root of the cloned repository
- Run `chmod -R 777 ./web` in the root of the cloned repository
- Go and add your values to the`/app/config.php`

## ShareX setup
![Custom uploader settings...](https://images.b3none.co.uk/iy3OefNPIZ.png)
![Add new custom uploader](https://images.b3none.co.uk/o1sjbSMlAp.png)