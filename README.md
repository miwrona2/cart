- Clone repo

### In case, you are using Docker 
- switch to branch 'docker'
- run docker on your local machine
- go to projects' main directory
```
docker-compose up -d
```
- run bash in 'www' container
('cart_www_1' may be different in your case)
```
docker exec -it cart_www_1 /bin/bash
```
you should be in dir 'var/www/html' in container's console
```
chmod a+w -R .
```
- open in your browser
http://localhost:8000/
- login to phpmyadmin with credentials: user test
- find file `db.sql` in projects' main directory, copy/paste content to console on phpmyadmin to database `myDb` and execute

- open in your browser
http://localhost:8001/