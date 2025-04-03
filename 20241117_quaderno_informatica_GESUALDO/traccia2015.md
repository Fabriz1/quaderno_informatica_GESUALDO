
# Community Eventi Live - Svolgimento Prima Parte Esame di Stato 2015

## Indice

*   [1. Analisi della Realtà di Riferimento e Soluzione Scelta (Punto 1)](#1-analisi-della-realtà-di-riferimento-e-soluzione-scelta-punto-1)
*   [2. Schema Concettuale (Diagramma E/R Fornito) (Punto 2)](#2-schema-concettuale-diagramma-er-fornito-punto-2)
*   [3. Schema Logico (Schema Relazionale) (Punto 3)](#3-schema-logico-schema-relazionale-punto-3)
*   [4. Definizione SQL di un Sottoinsieme di Relazioni (Punto 4)](#4-definizione-sql-di-un-sottoinsieme-di-relazioni-punto-4)
*   [5. Interrogazioni SQL (Punto 5)](#5-interrogazioni-sql-punto-5)
*   [6. Progetto Interfaccia Web (Punto 6 della traccia)](#6-progetto-interfaccia-web-punto-6-della-traccia)
*   [7. Codifica Applicazione Web (Punto 7 della traccia)](#7-codifica-applicazione-web-punto-7-della-traccia)
*   [Come importare e collegare il Database](#come-importare-e-collegare-il-database)
*   [Setup del Database](#setup-del-database)
    *   [Metodo 1: Installazione di XAMPP (Consigliato)](#metodo-1-installazione-di-xampp-consigliato)
    *   [Metodo 2: Esecuzione Manuale delle Query (Se non usi XAMPP/phpMyAdmin)](#metodo-2-esecuzione-manuale-delle-query-se-non-usi-xamppphpmyadmin)
*   [Connessione tra PHP e Database (con XAMPP)](#connessione-tra-php-e-database-con-xampp)
*   [Avvio dell'Applicazione](#avvio-dellapplicazione)

## 1. Analisi della Realtà di Riferimento e Soluzione Scelta (Punto 1)

**Realtà di Riferimento:**
Si richiede di progettare il sistema informativo per una web community dedicata alla condivisione di dati e commenti su eventi dal vivo (concerti, teatro, balletti, ecc.) che si svolgono in Italia.

*   **Funzionalità Principali:**
    *   **Registrazione Utenti:** I membri si registrano fornendo nickname, nome, cognome, email e selezionano categorie di eventi di interesse.
    *   **Inserimento Eventi:** I membri registrati possono inserire nuovi eventi, specificando categoria, luogo, data, titolo e artisti.
    *   **Interazione (Post):** I membri registrati possono scrivere post associati a un evento, contenenti un commento e un voto (da 1 a 5).
    *   **Consultazione (Utenti Anonimi e Registrati):** Tutti possono visualizzare gli eventi (filtrabili per tipo/categoria e provincia, ordinati cronologicamente) e i post (commenti e voti) associati a un evento.
    *   **Newsletter:** I membri ricevono automaticamente una newsletter settimanale via email con gli eventi futuri (settimana seguente) relativi alle categorie scelte e che si svolgono nella loro provincia.

**Schema E/R Fornito:** La base dati sarà sviluppata partendo dallo schema E/R fornito, con entità `UTENTE`, `EVENTO`, `POST` e la relazione `CREA` tra `UTENTE` ed `EVENTO`. I collegamenti tra `POST` e le altre entità indicano le dipendenze funzionali.

**Gestione Elementi non Espliciti nell'E/R:**
Come indicato nella traccia ("fatte le opportune ipotesi aggiuntive"), elementi come le categorie e la provincia, non presenti come entità separate nell'E/R fornito, verranno gestiti come attributi:
*   **Categorie:** Attributo `NomeCategoria` in `EVENTO` e attributo `CategorieInteresse` in `UTENTE`.
*   **Provincia:** Derivata dall'attributo `LuogoSvolgimento` in `EVENTO` e gestita tramite un attributo `ProvinciaUtente` in `UTENTE` per la newsletter.



**Scelta Motivata:**
Si sceglie la **Soluzione 1 (Database Relazionale + Applicazione Web Server-Side)**.
*   **Motivazioni:** La natura dei dati è relazionale; le query richieste beneficiano di SQL; l'integrità referenziale è gestita nativamente; è una soluzione standard e didatticamente adeguata; la complessità iniziale non giustifica approcci più complessi (NoSQL, Microservizi).

## 2. Schema Concettuale (Diagramma E/R Fornito) (Punto 2)

Il diagramma E/R fornito dal candidato è il seguente:
*![Diagramma E/R Fornito](PXL_20250331_173249342.jpg "Diagramma E/R Utente-Evento-Post")*

**Entità Principali:**
*   `UTENTE`: Rappresenta i membri registrati alla community.
*   `EVENTO`: Rappresenta gli eventi dal vivo inseriti nel sistema.
*   `POST`: Rappresenta i commenti e i voti lasciati dagli utenti sugli eventi.

**Relazioni Principali (interpretate dallo schema):**
*   **CREA (Utente - Evento):** Molti-a-uno (da Evento a Utente). Un utente crea molti eventi, un evento è creato da un solo utente.
*   **Collegamento Utente - Post:** Molti-a-uno (da Post a Utente). Un post è scritto da un utente.
*   **Collegamento Evento - Post:** Molti-a-uno (da Post a Evento). Un post si riferisce a un evento.

**Cardinalità dedotte:**
*   `UTENTE` (0,N) --- CREA --- (1,1) `EVENTO`
*   `UTENTE` (0,N) --- (Scrive) --- (1,1) `POST`
*   `EVENTO` (0,N) --- (Riguarda) --- (1,1) `POST`

## 3. Schema Logico (Schema Relazionale) (Punto 3)

La traduzione dello schema E/R nel modello logico relazionale porta alle seguenti tabelle:

*   **UTENTE** (`ID_Utente` PK, Nickname UNIQUE, Nome, Cognome, Email UNIQUE, PasswordHash, CategorieInteresse, ProvinciaUtente)
*   **EVENTO** (`ID_Evento` PK, `ID_Utente_Creatore` FK -> UTENTE, NomeCategoria, LuogoSvolgimento, DataEvento, Titolo, ArtistiCoinvolti)
*   **POST** (`ID_Post` PK, `ID_Utente_Autore` FK -> UTENTE, `ID_Evento_Riferimento` FK -> EVENTO, Commento, Voto, DataOraPost)

**Descrizione Attributi Dettagliata:**

**Tabella: UTENTE**

| Nome Attributo      | Descrizione                                     | Tipo         | Vincoli                                  |
| :------------------ | :---------------------------------------------- | :----------- | :--------------------------------------- |
| ID_Utente           | Identificativo univoco utente (membro)          | INT          | PK, AUTO_INCREMENT                       |
| Nickname            | Nickname scelto dall'utente                     | VARCHAR(50)  | NOT NULL, UNIQUE                         |
| Nome                | Nome reale dell'utente                          | VARCHAR(50)  | NOT NULL                                 |
| Cognome             | Cognome reale dell'utente                       | VARCHAR(50)  | NOT NULL                                 |
| Email               | Indirizzo email (per login/newsletter)          | VARCHAR(100) | NOT NULL, UNIQUE                         |
| PasswordHash        | Hash della password per l'accesso               | VARCHAR(255) | NOT NULL                                 |
| CategorieInteresse  | Categorie di interesse (es. "Concerti,Teatro")  | VARCHAR(255) | NULL                                     |
| ProvinciaUtente     | Provincia di residenza/interesse per newsletter | VARCHAR(50)  | NOT NULL                                 |

**Tabella: EVENTO**

| Nome Attributo       | Descrizione                             | Tipo         | Vincoli                                      |
| :------------------- | :-------------------------------------- | :----------- | :------------------------------------------- |
| ID_Evento            | Identificativo univoco evento           | INT          | PK, AUTO_INCREMENT                           |
| ID_Utente_Creatore   | Utente che ha inserito l'evento (FK)    | INT          | NOT NULL, FK -> UTENTE(ID_Utente)            |
| NomeCategoria        | Categoria dell'evento (es. "Concerto")  | VARCHAR(50)  | NOT NULL                                     |
| LuogoSvolgimento     | Descrizione luogo (es. "Teatro Verdi, FI")| VARCHAR(150) | NOT NULL                                     |
| DataEvento           | Data e ora dell'evento                  | DATETIME     | NOT NULL                                     |
| Titolo               | Titolo dell'evento                      | VARCHAR(100) | NOT NULL                                     |
| ArtistiCoinvolti     | Artisti/gruppi partecipanti             | TEXT         | NULL                                         |

**Tabella: POST**

| Nome Attributo         | Descrizione                              | Tipo        | Vincoli                                      |
| :--------------------- | :--------------------------------------- | :---------- | :------------------------------------------- |
| ID_Post                | Identificativo univoco post              | INT         | PK, AUTO_INCREMENT                           |
| ID_Utente_Autore       | Utente che ha scritto il post (FK)       | INT         | NOT NULL, FK -> UTENTE(ID_Utente)            |
| ID_Evento_Riferimento| Evento a cui si riferisce il post (FK)   | INT         | NOT NULL, FK -> EVENTO(ID_Evento)            |
| Commento               | Testo del commento                       | TEXT        | NULL                                         |
| Voto                   | Voto numerico assegnato                  | INT         | NOT NULL, CHECK (Voto BETWEEN 1 AND 5)       |
| DataOraPost            | Timestamp di inserimento del post        | DATETIME    | NOT NULL, DEFAULT CURRENT_TIMESTAMP          |

## 4. Definizione SQL di un Sottoinsieme di Relazioni (Punto 4)

Definizione SQL DDL per le tabelle `UTENTE`, `EVENTO` e `POST`, includendo vincoli di integrità referenziale e di dominio.

```sql
-- Tabella UTENTE
CREATE TABLE UTENTE (
    ID_Utente INT AUTO_INCREMENT PRIMARY KEY,
    Nickname VARCHAR(50) NOT NULL UNIQUE,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    PasswordHash VARCHAR(255) NOT NULL,
    CategorieInteresse VARCHAR(255),
    ProvinciaUtente VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella EVENTO
CREATE TABLE EVENTO (
    ID_Evento INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Creatore INT NOT NULL,
    NomeCategoria VARCHAR(50) NOT NULL,
    LuogoSvolgimento VARCHAR(150) NOT NULL,
    DataEvento DATETIME NOT NULL,
    Titolo VARCHAR(100) NOT NULL,
    ArtistiCoinvolti TEXT NULL,
    CONSTRAINT fk_evento_utente
        FOREIGN KEY (ID_Utente_Creatore) REFERENCES UTENTE(ID_Utente)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    INDEX idx_evento_data (DataEvento),
    INDEX idx_evento_categoria (NomeCategoria),
    INDEX idx_evento_luogo (LuogoSvolgimento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella POST
CREATE TABLE POST (
    ID_Post INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Autore INT NOT NULL,
    ID_Evento_Riferimento INT NOT NULL,
    Commento TEXT,
    Voto INT NOT NULL,
    DataOraPost DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_voto CHECK (Voto BETWEEN 1 AND 5),
    CONSTRAINT fk_post_utente
        FOREIGN KEY (ID_Utente_Autore) REFERENCES UTENTE(ID_Utente)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_post_evento
        FOREIGN KEY (ID_Evento_Riferimento) REFERENCES EVENTO(ID_Evento)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    INDEX idx_post_evento (ID_Evento_Riferimento),
    INDEX idx_post_utente (ID_Utente_Autore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## 5. Interrogazioni SQL (Punto 5)

Interrogazioni SQL richieste dalla traccia.

```sql
-- a. Elenco degli eventi già svolti, in ordine alfabetico di provincia
--    (Ipotizzando estrazione da LuogoSvolgimento, es. formato "Luogo, Città, PR")
SELECT
    E.Titolo, E.DataEvento, E.LuogoSvolgimento,
    TRIM(SUBSTRING_INDEX(E.LuogoSvolgimento, ',', -1)) AS Provincia
FROM EVENTO E WHERE E.DataEvento < NOW() ORDER BY Provincia ASC, E.DataEvento DESC;

-- b. Elenco dei membri che non hanno mai inserito un commento (post)
SELECT U.ID_Utente, U.Nickname, U.Nome, U.Cognome, U.Email
FROM UTENTE U LEFT JOIN POST P ON U.ID_Utente = P.ID_Utente_Autore
WHERE P.ID_Post IS NULL ORDER BY U.Cognome, U.Nome;

-- c. Per ogni evento il voto medio ottenuto in ordine di categoria e titolo
SELECT E.NomeCategoria, E.Titolo, E.ID_Evento, AVG(P.Voto) AS VotoMedio
FROM EVENTO E LEFT JOIN POST P ON E.ID_Evento = P.ID_Evento_Riferimento
GROUP BY E.ID_Evento ORDER BY E.NomeCategoria ASC, E.Titolo ASC;

-- d. I dati dell'utente che ha registrato (creato) il maggior numero di eventi
SELECT U.ID_Utente, U.Nickname, U.Nome, U.Cognome, U.Email, COUNT(E.ID_Evento) AS NumeroEventiCreati
FROM UTENTE U JOIN EVENTO E ON U.ID_Utente = E.ID_Utente_Creatore
GROUP BY U.ID_Utente ORDER BY NumeroEventiCreati DESC LIMIT 1;
```

## 6. Progetto Interfaccia Web (Punto 6 della traccia)

**Descrizione Concettuale:**
Si progetta una pagina web dinamica (es. `dashboard_utente.php`), accessibile agli utenti registrati dopo il login. Questa pagina servirà come pannello di controllo e includerà:

*   **Form di Inserimento Evento:** Una sezione contenente un form HTML per l'inserimento dei dati di un nuovo evento (Categoria, Luogo, Data/Ora, Titolo, Artisti). Il form invierà i dati a uno script server-side per l'elaborazione. Saranno implementate validazioni lato client e server.
*   **Form di Inserimento Post:** Una sezione che permette di cercare o selezionare un evento esistente e presentare un form HTML per scrivere un commento e assegnare un voto (1-5) a quell'evento. L'ID dell'evento e il contenuto del post verranno inviati a uno script server-side.
*   **Navigazione Utente:** Link o sezioni per visualizzare gli eventi/post propri e per modificare il profilo utente.

L'interfaccia sarà realizzata con HTML per la struttura e CSS per lo stile, puntando a chiarezza e usabilità.

## 7. Codifica Applicazione Web (Punto 7 della traccia)

**Descrizione Concettuale dello Script Server-Side (es. `gestisci_evento.php` in PHP):**

Lo script per gestire l'inserimento di un nuovo evento eseguirà i seguenti passi logici:

1.  **Controllo Sessione/Autenticazione:** Verifica che l'utente sia loggato e recupera il suo ID.
2.  **Ricezione e Validazione Dati:** Riceve i dati dal form (metodo POST), li sanifica per sicurezza (contro XSS, ecc.) e li valida (campi obbligatori, formato data, ecc.).
3.  **Connessione al Database:** Stabilisce una connessione sicura al database MySQL (es. tramite PDO).
4.  **Preparazione ed Esecuzione Query:** Prepara un'istruzione SQL `INSERT` usando prepared statements (contro SQL injection), associa i dati validati ai placeholder (incluso l'ID dell'utente creatore) ed esegue la query.
5.  **Gestione Risultato:** Verifica l'esito dell'inserimento e fornisce un feedback all'utente (messaggio di successo o errore). In caso di successo, può reindirizzare l'utente.
6.  **Chiusura Connessione:** Termina la connessione al database.

## Come importare e collegare il Database

Per far funzionare questo progetto in locale, avrai bisogno di:

1.  **XAMPP:** Un ambiente di sviluppo locale che include Apache (web server), MariaDB/MySQL (database) e PHP.
    *   Puoi scaricarlo da [https://www.apachefriends.org/it/index.html](https://www.apachefriends.org/it/index.html)

## Setup del Database

Ci sono due modi principali per configurare il database necessario.

### Metodo 1: Installazione di XAMPP (Consigliato)

1.  **Installa XAMPP:** Scarica e installa XAMPP seguendo le istruzioni per il tuo sistema operativo.
2.  **Avvia XAMPP:** Apri il Pannello di Controllo di XAMPP (XAMPP Control Panel).
3.  **Avvia i Moduli:** Avvia i moduli **Apache** e **MySQL** cliccando sui rispettivi pulsanti "Start".
4.  **Crea il Database:**
    *   Apri il tuo browser web e vai a `http://localhost/phpmyadmin`.
    *   Clicca su "Nuovo" (o "New") nel menu a sinistra.
    *   Inserisci un nome per il database. **Importante:** Usa il nome `202425_5ib_gesualdo_carpoolingdb` (o un altro nome coerente con i file PHP, se modificato). Scegli `utf8mb4_general_ci` come codifica (collation).
    *   Clicca su "Crea" (o "Create").
5.  **Importa la Struttura:**
    *   Una volta creato il database, selezionalo dal menu a sinistra.
    *   Vai alla scheda "SQL" in alto.
    *   Copia **tutto** il blocco di codice SQL qui sotto (relativo alle tabelle `UTENTE`, `EVENTO`, `POST`).
    *   Incolla il codice nella grande casella di testo della scheda "SQL".
    *   Clicca sul pulsante "Esegui" (o "Go") in basso a destra.
    *   Se tutto va bene, vedrai un messaggio di successo e le tabelle appariranno nel menu a sinistra sotto il nome del tuo database.

```sql
-- Tabella UTENTE
CREATE TABLE UTENTE (
    ID_Utente INT AUTO_INCREMENT PRIMARY KEY,
    Nickname VARCHAR(50) NOT NULL UNIQUE,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    PasswordHash VARCHAR(255) NOT NULL,
    CategorieInteresse VARCHAR(255),
    ProvinciaUtente VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella EVENTO
CREATE TABLE EVENTO (
    ID_Evento INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Creatore INT NOT NULL,
    NomeCategoria VARCHAR(50) NOT NULL,
    LuogoSvolgimento VARCHAR(150) NOT NULL,
    DataEvento DATETIME NOT NULL,
    Titolo VARCHAR(100) NOT NULL,
    ArtistiCoinvolti TEXT NULL,
    CONSTRAINT fk_evento_utente
        FOREIGN KEY (ID_Utente_Creatore) REFERENCES UTENTE(ID_Utente)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    INDEX idx_evento_data (DataEvento),
    INDEX idx_evento_categoria (NomeCategoria),
    INDEX idx_evento_luogo (LuogoSvolgimento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella POST
CREATE TABLE POST (
    ID_Post INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Autore INT NOT NULL,
    ID_Evento_Riferimento INT NOT NULL,
    Commento TEXT,
    Voto INT NOT NULL,
    DataOraPost DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_voto CHECK (Voto BETWEEN 1 AND 5),
    CONSTRAINT fk_post_utente
        FOREIGN KEY (ID_Utente_Autore) REFERENCES UTENTE(ID_Utente)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_post_evento
        FOREIGN KEY (ID_Evento_Riferimento) REFERENCES EVENTO(ID_Evento)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    INDEX idx_post_evento (ID_Evento_Riferimento),
    INDEX idx_post_utente (ID_Utente_Autore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Metodo 2: Esecuzione Manuale delle Query (Se non usi XAMPP/phpMyAdmin)

Se hai un server MySQL/MariaDB già configurato e preferisci usare la riga di comando o un altro strumento:

1.  **Connettiti al tuo server database.**
2.  **Crea il database** (se non esiste già), usando il nome `202425_5ib_gesualdo_carpoolingdb` (o il nome scelto):
    ```sql
    CREATE DATABASE IF NOT EXISTS 202425_5ib_gesualdo_carpoolingdb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    USE 202425_5ib_gesualdo_carpoolingdb;
    ```
3.  **Esegui le seguenti query SQL** per creare tutte le tabelle necessarie:

```sql
-- Tabella UTENTE
CREATE TABLE UTENTE (
    ID_Utente INT AUTO_INCREMENT PRIMARY KEY,
    Nickname VARCHAR(50) NOT NULL UNIQUE,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    PasswordHash VARCHAR(255) NOT NULL,
    CategorieInteresse VARCHAR(255),
    ProvinciaUtente VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella EVENTO
CREATE TABLE EVENTO (
    ID_Evento INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Creatore INT NOT NULL,
    NomeCategoria VARCHAR(50) NOT NULL,
    LuogoSvolgimento VARCHAR(150) NOT NULL,
    DataEvento DATETIME NOT NULL,
    Titolo VARCHAR(100) NOT NULL,
    ArtistiCoinvolti TEXT NULL,
    CONSTRAINT fk_evento_utente
        FOREIGN KEY (ID_Utente_Creatore) REFERENCES UTENTE(ID_Utente)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    INDEX idx_evento_data (DataEvento),
    INDEX idx_evento_categoria (NomeCategoria),
    INDEX idx_evento_luogo (LuogoSvolgimento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabella POST
CREATE TABLE POST (
    ID_Post INT AUTO_INCREMENT PRIMARY KEY,
    ID_Utente_Autore INT NOT NULL,
    ID_Evento_Riferimento INT NOT NULL,
    Commento TEXT,
    Voto INT NOT NULL,
    DataOraPost DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_voto CHECK (Voto BETWEEN 1 AND 5),
    CONSTRAINT fk_post_utente
        FOREIGN KEY (ID_Utente_Autore) REFERENCES UTENTE(ID_Utente)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_post_evento
        FOREIGN KEY (ID_Evento_Riferimento) REFERENCES EVENTO(ID_Evento)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    INDEX idx_post_evento (ID_Evento_Riferimento),
    INDEX idx_post_utente (ID_Utente_Autore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Connessione tra PHP e Database (con XAMPP)

I file PHP di questo progetto si connetteranno al database usando delle credenziali specificate solitamente all'inizio degli script o in un file di configurazione separato (es: `config.php`).

Con una installazione standard di XAMPP, i parametri di connessione sono generalmente `localhost`, `root` come utente e password vuota.

Tuttavia, **le credenziali per questo progetto sono**:

*   **Server/Host:** `localhost`
*   **Nome Utente:** `torsello`
*   **Password:** `1234`
*   **Nome Database:** `202425_5ib_gesualdo_eventi` (o il nome scelto durante la creazione)

**Verifica i file PHP:** Quando svilupperai l'applicazione web, assicurati che le variabili usate per la connessione (`$servername`, `$username`, `$password`, `$dbname` o nomi simili) nei tuoi script PHP corrispondano ai valori corretti per il tuo ambiente e al nome del database che hai creato.

## Avvio dell'Applicazione

Questa sezione descrive come avviare l'applicazione web una volta che avrai sviluppato il codice PHP e l'interfaccia:

1.  Assicurati che Apache e MySQL siano in esecuzione nel Pannello di Controllo XAMPP.
2.  Copia l'intera cartella del tuo progetto PHP/HTML/CSS dentro la cartella `htdocs` di XAMPP (solitamente si trova in `C:\xampp\htdocs` su Windows o `/Applications/XAMPP/htdocs` su macOS).
3.  Apri il browser e vai a `http://localhost/nome_cartella_progetto/` (sostituisci `nome_cartella_progetto` con il nome effettivo della cartella che hai copiato in `htdocs`).
4.  Dovresti vedere la pagina iniziale dell'applicazione (la pagina principale o di login).
