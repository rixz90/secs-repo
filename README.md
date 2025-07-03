# Staff E-Complaint System

### Install Git, docker, nodejs, composer

- https://git-scm.com/downloads
- https://docs.docker.com/get-started/
- https://getcomposer.org/doc/00-intro.md
- https://nodejs.org/en/download

### Clone the repo.

```bash
git clone https://github.com/rixz90/secs-repo.git
```

### Open terminal and run this command on current directory of this project:

```bash
npm install
composer install
```

### Copy the .env_example to .env(create new file) and add your missing database

#### Example :

```bash
DB_DRIVER=pdo_mysql
DB_HOST=db
DB_NAME=secs
DB_USER=root
DB_PASS=root
```

### run docker-compose to build the all the container

```bash
docker-compose up -d
```

### open terminal to the current directory copy paste this prompt to terminal for migrate database

```bash
./vendor/bin/doctrine-migrations migrate
```

### Open browser to **localhost:8000**

- to view the website or wherever nginx host locate at inside docker-compose.yml
- open **localhost:8001** for phpmyadmin.
