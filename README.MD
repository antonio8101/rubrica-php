# Rubrica in PHP

Questo progetto consiste in una **Rubrica** sviluppata in PHP puro, senza l'uso di framework come Laravel o simili. È pensato come esercizio conclusivo del **Modulo 2 del corso di Back End Web Development**, con l'obiettivo di mettere in pratica i costrutti fondamentali del linguaggio PHP.

- [Obiettivo del Progetto](#obiettivo-del-progetto)
- [Struttura del Progetto](#struttura-del-progetto)
- [Caratteristiche](#caratteristiche)
- [Tecnologie Utilizzate](#tecnologie-utilizzate)
- [Installazione](#installazione)

## Obiettivo del Progetto

L'obiettivo principale di questo progetto è fornire un'applicazione base per la gestione di una rubrica, permettendo di:
- Aggiungere contatti
- Visualizzare i contatti esistenti
- Modificare i contatti
- Eliminare contatti

Questo progetto serve anche come occasione pratica per:
1. Comprendere meglio i meccanismi di PHP come gestione delle variabili, array, ciclo di vita delle applicazioni web (request/response).
2. Sperimentare l'integrazione di PHP con HTML e CSS.
3. Lavorare con file statici o database per memorizzare i dati in modo persistente.

## Struttura del Progetto

Il progetto è organizzato come segue:

- **index.php**: Punto di ingresso della Rubrica, con l'interfaccia principale.
- **/src/**: Contiene tutte le classi utilizzate nel progetto.
- **/html/**: Contiene i file che saranno messi a disposizione "pubblicamente" dal webserver.


## Caratteristiche

1. **Aggiunta contatti**: Un modulo form consente agli utenti di creare un nuovo contatto inserendo informazioni come nome, numero di telefono e indirizzo email.
2. **Modifica contatti esistenti**: È possibile aggiornare le informazioni di contatti esistenti.
3. **Elimina contatti**: Funzionalità per rimuovere contatti dalla rubrica.
4. **Visualizzazione contatti**: Gli utenti possono visualizzare un elenco formattato dei contatti salvati.

## Tecnologie Utilizzate

- **Linguaggio**: PHP 8.3
- **HTML/CSS**: Per la struttura e il design delle pagine.
- **Storage**: Opzionalmente, un file `.json` o un database MySQL per la memorizzazione dei dati.

## Installazione

1. Clona il repository nella tua macchina locale:
   ```bash
   git clone <repository-url>
   ```

2. Esegui composer install nella root del progetto:
   ```bash
   composer install
   ```

3. Assicurati di avere installato Docker, in alternativa puoi configurare il server PHP locale di (ad es. [XAMPP](https://www.apachefriends.org/it/index.html).

4. Se esegui con docker, esegui il comando:
   ```bash
   docker-compose up -d
   ```
   Nota bene che il docker-compose crea un container in base alle specifiche presenti nel `docker-compose.yml` presente nel progetto. Se la porta configurata è occupata configurane pure un'altra libera.
   ```yml
   version: '3.8'
   services:
    php-apache-live:
    build: .
    ports:
    - "8096:80" # qui il binding della porta è impostato sulla 8096, è libera sul tuo host?
    volumes:
    - ./:/var/www/
   ```
   Con il comando `docker-compose down` distruggete il container, mentre con il comando `docker-compose up -d --build` ricreate `immagine` e `container`.

5. Apri il browser e visita: [http://localhost:8096](http://localhost:8096). (nota bene che la porta corrisponde a quella della configurazione di docker-compose)
