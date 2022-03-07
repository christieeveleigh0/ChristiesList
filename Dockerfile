FROM php:7.4-cli
COPY . /usr/src/ChristiesList
WORKDIR /usr/src/ChristiesList
CMD [ "php", "./index.php" ]