# the_minimal_php_js_mysql_rest_website

Questo è il repository per la app minimale con tecnologie HTML , Javascript, PHP, e MySQL per i ragazzi del 5B INF!!!

L'applicazione è raggiungibile su https://phpminimal.befair.it

## How to test

Per testare la web application:

### Creare il database

Ad esempio con `mysql < database.sql`

### Creare un utente con tutti i diritti su quel database

```
mysql esempio
CREATE USER 'phpminimal' IDENTIFIED BY 'phpminimal';
GRANT ALL PRIVILEGES ON esempio.* TO 'phpminimal';
```

### Creare utente di test

Modo 1: file e script

- Creare file utenti.txt con elenco di username
- Eseguire riga di bash: `INSERT INTO utente (username, password, nome) VALUES ('$name', PASSWORD('$name'), '${name[@]^}');`

Modo 2: preparare le query a mano

- Creare file utenti.sql con le query di inserimento utenti
