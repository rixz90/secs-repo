# Staff E-Complaint System <br/>

### install git <br/>

https://git-scm.com/downloads

### Install docker, nodejs, composer <br/>

https://docs.docker.com/get-started/
https://getcomposer.org/doc/00-intro.md
https://nodejs.org/en/download

### git clone the repo <br/>

git clone https://github.com/rixz90/secs-repo.git <br/>

### open terminal and run this command on current directory of this project: <br/>

npm install
composer install

### copy the .env_example to .env(create new file) and add your missing database <br/>

DB_DRIVER=pdo_mysql
DB_HOST=db
DB_NAME=secs
DB_USER=root
DB_PASS=root

### run docker-compose to build the all the container

docker-compose up -d

### example:

### open terminal to the current directory copy paste this prompt to terminal for migrate database </br>

./vendor/bin/doctrine-migrations migrate

### Open browser to localhost:8000 to view the website or wherever nginx host locate at inside docker-compose.yml

You can open localhost:8001 for phpmyadmin.
