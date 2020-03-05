# appliFrais
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
- Move the cloned repository 