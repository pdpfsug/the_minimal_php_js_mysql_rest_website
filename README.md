# the_minimal_php_js_mysql_rest_website

Questo è il repository per la app minimale con tecnologie HTML , Javascript, PHP, e MySQL per i ragazzi del 5B INF!!!

L'applicazione è raggiungibile su https://phpminimal.befair.it

## How to test

Per testare la web application è necessario predisporre il proprio ambiente di sviluppo.
Una soluzione molto semplici per installare l'ambiente di sviluppo è:
* [XAMP](https://www.apachefriends.org/it/download.html): un ambiente Apache + MySQL + PHP multipiattaforma (la X  sta per "qualsiasi" sistema operativo)

Per capire più in dettaglio le configurazioni delle varie componenti (e quindi approfondire)
si possono installare separatamente le componenti. 

### Creare il database
La definizione del database è nel file [database.sql](https://gitlab.com/feroda/the_minimal_php_js_mysql_rest_website/blob/master/database.sql).

Copiare le query in esso contenute ed eseguire nel proprio DBMS.

Da riga di comando si può fare con `mysql < database.sql`

### Creare un utente con tutti i diritti su quel database

```
mysql esempio
CREATE USER 'phpminimal' IDENTIFIED BY 'phpcrazy';
GRANT ALL PRIVILEGES ON esempio.* TO 'phpminimal';
FLUSH PRIVILEGES;
```

### Creare utente di test

Modo 1: file e script

- Creare file utenti.txt con elenco di username
- Eseguire riga di bash: `INSERT INTO utente (username, password, nome) VALUES ('$name', PASSWORD('$name'), '${name[@]^}');`

Modo 2: preparare le query a mano

- Creare file utenti.sql con le query di inserimento utenti
