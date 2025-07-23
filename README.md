# Staff E-Complaint System

Build an MVC Pattern website that allows all employees, students, and guests to lodge reports/complaints to all branches and locations around the university campus or institutions. The web development utilizes ORM Doctrine at the backend, using Doctrine DBAL, and employs Twig as the template engine. I use the Pico CSS framework as my frontend CSS style, and for the JavaScript framework, I use AlpineJS and HTMX for client-side reactivity and interaction.

## Deployment

To deploy this project run

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

#### ssh container

```bash
docker exec -it secs-php bash
```

#### migrate database

```bash
php myapp.php migrations:migrate latest
```

### Open browser to **localhost:8000**

- to view the website or wherever nginx host locate at inside docker-compose.yml
- open **localhost:8001** for phpmyadmin.

### Demo website.

- https://my-app-production-657.up.railway.app/
