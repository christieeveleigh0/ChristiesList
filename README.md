# ChristiesList
This is a fun second-hand marketpace where a user can list items for purchase, or view and enquire about items. Please view the live site here to demo all features: **http://list.c-e-marx.co.za/**.

## Use
Please use the following commands step by step to get the Dockerised verson of Christie's List to work.

**Pull the SQl and PHP Docker images:**
- docker pull mysql/mysql-server:latest
- docker pull php

**Run servers:**
- PHP: docker run -it --rm --name live-christieslist christieslist
- Apache: docker run -d -p 80:80 --name apache-christieslist -v "$PWD":/var/www/html php:7.2-apache

**Run:**
- In the ChristiesList directory, run docker-compose up -d

**Import the database:**
- Enter 'localhost:8080' into your browser to access Adminer. The database needs to be imported before the site can be used.
- Login using username 'root' and password 'example'
- Import listings.sql, located in repo

**Good to go:**
- docker-compose up -d
- When you are finished, use docker-compose down to stop the program


## Unavailable Features
Some features are unavaible when run in the Docker container due to lack of permissions. Namely, these are uploading images through the 'Post Listing' form. A default placeholder image will be used in it's place. As well as sending enquiries via the form as a live server is needed for this. These features can be used on the live site (see link above).


## Future Features
I would like to add expirations on the password reset keys so users can only use them once. I also want to implement image resizing, so all images are the same size when a user uploads them.

## Screenshots 
