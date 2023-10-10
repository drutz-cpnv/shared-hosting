# Tasks

-[ ] Install
  - [ ] PHP FPM
    - Install
      - ```apt-get update && sudo apt-get upgrade --show-upgradedd```
      - ```apt-get upgrade --show-upgraded```
      - ```apt-get install php8.2-fpm```
    - Configuration
      - ```groupadd site1_group && useradd -g site1_group site1_user```
      - ```cp /etc/php/8.2/fpm/pool.d/www.conf /etc/php/8.2/fpm/pool.d/default._conf```
      - In default._conf edit following lines: \
        ```user = $pool_user``` \
        ```group = $pool_group``` \
        ```listen = /run/php/php8.2-fpm_$pool.sock``` \
        ```listen.owner = $pool_user``` \
        ```listen.group = $pool_group```
      - ```cp /etc/php/8.2/fpm/pool.d/default._conf /etc/php/8.2/fpm/pool.d/site1.conf```
      - Edit line ```[www]``` to ```[site1]```
      - ```cp /etc/php/8.2/fpm/pool.d/default._conf /etc/php/8.2/fpm/pool.d/site1.conf```
      - ```cp /etc/php/8.2/fpm/pool.d/www.conf /etc/php/8.2/fpm/pool.d/site1.conf```
  - [ ] MariaDB
  - [ ] NGNIX
  - ```apt-get install nginx```
  - ```nano /etc/nginx/nginx.conf```
  - [ ] s
    -[ ] Documentation
-[ ] Documentation
-[ ] Tree