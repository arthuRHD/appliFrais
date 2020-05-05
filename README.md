# appliFrais

![SQL CI](https://github.com/arthuRHD/appliFrais/workflows/SQL%20CI/badge.svg) ![PHP CI](https://github.com/arthuRHD/appliFrais/workflows/PHP%20CI/badge.svg)

#### Made in MVC
> A php web application managing professionnal expenses of GSB employees. <br>
> It communicates with a MySQL database which is storing expenses as well as users. <br>

## Uses

### Every users
- Are able to connect on the application

### `Visiteur` : An employee that sells pharmaceutical products to doctors
- Is able to see his own expenses 
- Is allowed to enter and modify his own expenses values if the sheet isn't locked

### `Comptable` : A supervisor that manages professionnal expenses of `Visiteur` employees
- Is able to see expenses of all visitors
- Is allowed to modify expenses values
- Is allowed to validate or deny expenses sheets
- Is allowed to lock an expenses sheet

## [Demo](http://applifrais.richardinfo.fr/)

## Install & Config
- Clone the repository :
```sh 
git clone https://github.com/arthuRHD/appliFrais.git
```

- Execute these command in the MySQL shell :
```sh
mysql -u root -p
# Database
create database bdgsb;
use bdgsb;
source bdgsb.sql;
# User
create user 'userGsb'@'%' identified by 'secret';
grant all privileges on bdgsb.* to 'userGsb'@'%' identified by 'secret';
flush privileges;
```
### XAMPP for developement
- Drag the cloned repository in the `htdocs`
- Go to `http://localhost/appliFrais/`
### Apache for deployement
- Move the cloned repository into `/var/www/html/` 
```sh 
sudo mv path/to/cloned/repo /var/www/html/cloned_repo
```
- Create a virtual host in `/etc/apache2/sites-avaiblable/`
```sh 
sudo nano /etc/apache2/sites-avaiblable/my_virtual_host.conf
```
- Copy this inside and adapt with your settings : 

```apacheconf
<VirtualHost *:80> # Virtualhost écoutant sur le port 80
        ServerName dev.example.fr # Nom du serveur auquel le vhost doit répondre
        ServerAlias dev.example.fr # Eventuel alias supplémentaire
        ServerAdmin webmaster@example.fr # Mail du webmaster 
        ErrorLog /var/log/apache2/dev.example.fr-error_log # Délocaliser pour ce vhost les logs d'erreur
        TransferLog /var/log/apache2/dev.example.fr-access_log # Délocaliser pour ce vhost les logs d'accès
        DocumentRoot "/var/www/localhost/htdocs/dev/" # Racine des fichiers du site
        <Directory "/var/www/localhost/htdocs/dev/"> # Définition des droits d'un répertoire
                Options Indexes FollowSymLinks # Options choisies
                AllowOverride All # Permet d'utiliser le htaccess dans un site
                Require all granted # On autorise tout le monde
        </Directory> # Fin de la définition des droits
</VirtualHost> # Fin de la définition du vhost
```

- Activate the site 
```sh 
sudo a2ensite my_virtual_host.conf
```
- Reload apache2 
```sh 
sudo systemctl reload apache2
```
