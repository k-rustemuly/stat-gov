
mysql --user=root --password="root" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS testing;
    GRANT ALL PRIVILEGES ON \`testing%\`.* TO 'root'@'%';
EOSQL
