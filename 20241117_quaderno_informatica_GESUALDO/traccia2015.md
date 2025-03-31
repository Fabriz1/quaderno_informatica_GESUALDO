
---

# Esame di Stato di Istruzione Secondaria Superiore – A.S. 2014/2015
## Seconda Prova Scritta – Indirizzo ITIA, Articolazione INFORMATICA
## Tema di: INFORMATICA

### PRIMA PARTE

Il candidato affronta la prima parte della prova, che richiede la progettazione di una base di dati e l'analisi di un sistema per una web community dedicata alla condivisione di informazioni su eventi dal vivo in Italia.

**1. Analisi della Realtà di Riferimento e Scelta della Soluzione**

La traccia richiede la realizzazione di una piattaforma web (community) che permetta a utenti registrati (membri) di condividere informazioni (dati e commenti) su eventi dal vivo (concerti, spettacoli teatrali, balletti, ecc.) che si svolgono in Italia.

**Funzionalità Principali Identificate:**

*   **Registrazione Membri:** Gli utenti possono diventare membri fornendo nickname, nome, cognome, email e selezionando una o più categorie di eventi di interesse.
*   **Inserimento Eventi:** I membri possono inserire nuovi eventi specificando categoria, luogo, data, titolo e artisti coinvolti.
*   **Interazione (Commenti e Voti):** I membri possono scrivere post (commenti) e assegnare un voto (da 1 a 5) a eventi specifici.
*   **Consultazione:** Tutti gli utenti (registrati e anonimi) possono visualizzare gli eventi per tipo (categoria), in ordine cronologico, con possibilità di filtrare per provincia. Possono anche visualizzare commenti e voti associati a un evento.
*   **Newsletter:** Ogni membro riceve automaticamente una newsletter settimanale via email con gli eventi delle sue categorie di interesse che si svolgeranno nella settimana successiva nella sua provincia.

**Ipotesi Aggiuntive:**

Per procedere con la progettazione, il candidato formula le seguenti ipotesi aggiuntive:

*   **Gestione Utenti:** Si assume che il `nickname` debba essere univoco all'interno della community per identificare i membri in modo distintivo, oltre all'email che sarà usata anche per il login e le comunicazioni (newsletter). Sarà necessaria una password per l'accesso.
*   **Categorie:** Si ipotizza l'esistenza di un insieme predefinito di categorie di eventi gestibili dal sistema (es. 'Concerti', 'Teatro', 'Danza', 'Festival', 'Mostre'). Un evento appartiene ad una sola categoria principale per semplicità di classificazione e gestione della newsletter, anche se la traccia menziona "diverse categorie". L'interesse del membro può invece riguardare più categorie.
*   **Luogo Svolgimento:** L'attributo `luogo di svolgimento` dell'evento sarà strutturato per contenere informazioni sufficienti a identificare la `provincia`, necessaria per i filtri di ricerca e per la newsletter. Si ipotizza di memorizzare almeno `Città` e `Provincia` (es. sigla 'MI', 'RM'). Si assume che la `Provincia` dell'utente, necessaria per la newsletter, venga richiesta durante la registrazione o dedotta da altre informazioni (es. un campo 'Provincia di residenza').
*   **Voto:** Il voto è un numero intero compreso tra 1 e 5.
*   **Newsletter:** La generazione e l'invio della newsletter sono processi automatici gestiti dal sistema (es. tramite uno script schedulato) che interroga il database per trovare gli eventi rilevanti per ciascun utente.
*   **Unicità Commenti:** Si assume che un membro possa scrivere un solo commento/voto per un determinato evento.

**Soluzioni Possibili e Scelta:**

Si potrebbero considerare diverse architetture (es. microservizi), ma data la natura integrata delle funzionalità e il contesto di un esame di stato per un istituto tecnico, la soluzione più idonea e didatticamente appropriata appare essere un'**applicazione web monolitica** basata su un'architettura standard a 3 livelli (presentazione, logica applicativa, dati).

*   **Livello Dati:** Un **database relazionale** (es. MySQL, PostgreSQL) è la scelta più naturale per gestire dati strutturati come utenti, eventi, categorie e le loro relazioni, garantendo integrità e consistenza.
*   **Livello Logica Applicativa:** Un linguaggio server-side (es. PHP, Python/Django, Java/Spring) gestirà le richieste HTTP, l'autenticazione, la logica di business (inserimento dati, generazione newsletter, calcolo medie voti) e l'interazione con il database.
*   **Livello Presentazione:** HTML, CSS e JavaScript verranno utilizzati per creare l'interfaccia utente web, fruibile tramite browser.

**Motivazione della Scelta:**
Questa soluzione è la più collaudata per applicazioni di questo tipo, permette uno sviluppo relativamente rapido, gestisce bene le transazioni e le relazioni tra i dati, ed è in linea con le competenze tipicamente acquisite nel percorso di studi ITIA. Il modello relazionale si adatta bene alla struttura dei dati descritta.

**2. Schema Concettuale della Base di Dati (Diagramma E/R)**

Basandosi sull'analisi e le ipotesi, si definiscono le seguenti entità e relazioni:

*   **Entità:**
    *   `MEMBRO`: Rappresenta un utente registrato alla community.
    *   `CATEGORIA`: Rappresenta una tipologia di evento (es. Concerto, Teatro).
    *   `EVENTO`: Rappresenta un evento dal vivo specifico.
    *   `COMMENTO`: Rappresenta un post (commento e voto) lasciato da un membro su un evento.
*   **Relazioni:**
    *   `INTERESSE` (tra `MEMBRO` e `CATEGORIA`): Un membro può essere interessato a più categorie, e una categoria può interessare più membri (N a N).
    *   `INSERIMENTO` (tra `MEMBRO` e `EVENTO`): Un membro inserisce uno o più eventi, ma un evento è inserito da un solo membro (1 a N).
    *   `APPARTENENZA` (tra `EVENTO` e `CATEGORIA`): Un evento appartiene ad una sola categoria, mentre una categoria può raggruppare molti eventi (N a 1).
    *   `PUBBLICAZIONE` (tra `MEMBRO` e `COMMENTO`): Un membro scrive uno o più commenti, ma un commento è scritto da un solo membro (1 a N).
    *   `RIFERIMENTO` (tra `COMMENTO` e `EVENTO`): Un commento si riferisce ad un solo evento, ma un evento può avere molti commenti (N a 1).

**Diagramma E/R (Descrizione testuale e Mermaid):**

*   **MEMBRO** (<u>ID_Membro</u> PK, Nickname UNIQUE, Nome, Cognome, Email UNIQUE, PasswordHash, ProvinciaResidenza)
*   **CATEGORIA** (<u>ID_Categoria</u> PK, NomeCategoria UNIQUE)
*   **EVENTO** (<u>ID_Evento</u> PK, Titolo, LuogoSvolgimento, Provincia, DataOraSvolgimento, ArtistiCoinvolti, ID_MembroInseritore FK, ID_Categoria FK)
*   **COMMENTO** (<u>ID_Commento</u> PK, Testo, Voto (1-5), DataOraPubblicazione, ID_MembroAutore FK, ID_EventoRiferito FK)
*   **INTERESSE** (<u>ID_Membro</u> FK, <u>ID_Categoria</u> FK) - Tabella associativa per la relazione N:N tra MEMBRO e CATEGORIA.

```mermaid
erDiagram
    MEMBRO ||--o{ EVENTO : INSERISCE
    MEMBRO ||--o{ COMMENTO : PUBBLICA
    MEMBRO ||--|{ INTERESSE : HA
    CATEGORIA ||--|{ INTERESSE : RIGUARDA
    CATEGORIA ||--o{ EVENTO : RAGGRUPPA
    EVENTO ||--|{ COMMENTO : RICEVE

    MEMBRO {
        INT ID_Membro PK
        VARCHAR Nickname UK
        VARCHAR Nome
        VARCHAR Cognome
        VARCHAR Email UK
        VARCHAR PasswordHash
        VARCHAR ProvinciaResidenza "Es: 'MI'"
    }
    CATEGORIA {
        INT ID_Categoria PK
        VARCHAR NomeCategoria UK
    }
    EVENTO {
        INT ID_Evento PK
        VARCHAR Titolo
        VARCHAR LuogoSvolgimento "Es: 'Teatro alla Scala, Milano'"
        VARCHAR Provincia "Es: 'MI'"
        DATETIME DataOraSvolgimento
        TEXT ArtistiCoinvolti
        INT ID_MembroInseritore FK
        INT ID_Categoria FK
    }
    COMMENTO {
        INT ID_Commento PK
        TEXT Testo NULL
        TINYINT Voto "CHECK(Voto BETWEEN 1 AND 5)"
        DATETIME DataOraPubblicazione
        INT ID_MembroAutore FK
        INT ID_EventoRiferito FK
    }
    INTERESSE {
        INT ID_Membro FK
        INT ID_Categoria FK
    }

```
*Nota: Le chiavi primarie (PK), uniche (UK) e esterne (FK) sono indicate. Il campo `Testo` in `COMMENTO` è `NULL` perché un membro potrebbe voler lasciare solo un voto.*

**3. Espressione delle Cardinalità**

Le cardinalità (min, max) per le relazioni identificate sono:

*   `MEMBRO` (0,N) --- HA --- (0,N) `INTERESSE` --- RIGUARDA --- (0,N) `CATEGORIA`
    *   Un membro può non avere interessi o averne molti (0,N). Una categoria può non interessare nessuno o interessare molti (0,N).
*   `MEMBRO` (1,1) --- INSERISCE --- (0,N) `EVENTO`
    *   Un evento DEVE essere inserito da UN SOLO membro (1,1 lato MEMBRO). Un membro PUÒ non inserire eventi o inserirne molti (0,N lato EVENTO).
*   `EVENTO` (1,1) --- APPARTIENE --- (0,N) `CATEGORIA`
    *   Un evento DEVE appartenere ad UNA SOLA categoria (1,1 lato CATEGORIA). Una categoria PUÒ non avere eventi o averne molti (0,N lato EVENTO).
*   `MEMBRO` (1,1) --- PUBBLICA --- (0,N) `COMMENTO`
    *   Un commento DEVE essere pubblicato da UN SOLO membro (1,1 lato MEMBRO). Un membro PUÒ non pubblicare commenti o pubblicarne molti (0,N lato COMMENTO).
*   `COMMENTO` (1,1) --- SI_RIFERISCE --- (0,N) `EVENTO`
    *   Un commento DEVE riferirsi ad UN SOLO evento (1,1 lato EVENTO). Un evento PUÒ non avere commenti o averne molti (0,N lato COMMENTO).

**4. Schema Logico della Base di Dati (Relazionale)**

Traducendo lo schema E/R nel modello logico relazionale, si ottengono le seguenti tabelle:

*   **MEMBRO** (
    `ID_Membro` INT PRIMARY KEY AUTO_INCREMENT,
    `Nickname` VARCHAR(50) NOT NULL UNIQUE,
    `Nome` VARCHAR(100) NOT NULL,
    `Cognome` VARCHAR(100) NOT NULL,
    `Email` VARCHAR(100) NOT NULL UNIQUE,
    `PasswordHash` VARCHAR(255) NOT NULL,
    `ProvinciaResidenza` VARCHAR(2) NOT NULL COMMENT 'Sigla provincia, es. MI'
    )

*   **CATEGORIA** (
    `ID_Categoria` INT PRIMARY KEY AUTO_INCREMENT,
    `NomeCategoria` VARCHAR(100) NOT NULL UNIQUE
    )

*   **EVENTO** (
    `ID_Evento` INT PRIMARY KEY AUTO_INCREMENT,
    `Titolo` VARCHAR(200) NOT NULL,
    `LuogoSvolgimento` VARCHAR(255) NOT NULL,
    `Provincia` VARCHAR(2) NOT NULL COMMENT 'Sigla provincia, es. MI',
    `DataOraSvolgimento` DATETIME NOT NULL,
    `ArtistiCoinvolti` TEXT NULL,
    `ID_MembroInseritore` INT NOT NULL,
    `ID_Categoria` INT NOT NULL,
    FOREIGN KEY (`ID_MembroInseritore`) REFERENCES `MEMBRO`(`ID_Membro`) ON DELETE RESTRICT,
    FOREIGN KEY (`ID_Categoria`) REFERENCES `CATEGORIA`(`ID_Categoria`) ON DELETE RESTRICT
    )

*   **COMMENTO** (
    `ID_Commento` INT PRIMARY KEY AUTO_INCREMENT,
    `Testo` TEXT NULL,
    `Voto` TINYINT NOT NULL CHECK (`Voto` BETWEEN 1 AND 5),
    `DataOraPubblicazione` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ID_MembroAutore` INT NOT NULL,
    `ID_EventoRiferito` INT NOT NULL,
    FOREIGN KEY (`ID_MembroAutore`) REFERENCES `MEMBRO`(`ID_Membro`) ON DELETE CASCADE,
    FOREIGN KEY (`ID_EventoRiferito`) REFERENCES `EVENTO`(`ID_Evento`) ON DELETE CASCADE,
    UNIQUE (`ID_MembroAutore`, `ID_EventoRiferito`) COMMENT 'Un membro può commentare/votare un evento una sola volta'
    )

*   **INTERESSE_MEMBRO_CATEGORIA** (
    `ID_Membro` INT NOT NULL,
    `ID_Categoria` INT NOT NULL,
    PRIMARY KEY (`ID_Membro`, `ID_Categoria`),
    FOREIGN KEY (`ID_Membro`) REFERENCES `MEMBRO`(`ID_Membro`) ON DELETE CASCADE,
    FOREIGN KEY (`ID_Categoria`) REFERENCES `CATEGORIA`(`ID_Categoria`) ON DELETE CASCADE
    )

*Nota: Sono stati specificati tipi di dato comuni (INT, VARCHAR, TEXT, DATETIME, TINYINT), chiavi primarie (PK), chiavi esterne (FK) con vincoli di integrità referenziale (`ON DELETE`), vincoli di unicità (`UNIQUE`), vincoli `NOT NULL` e un vincolo di dominio (`CHECK`). `AUTO_INCREMENT` è usato per le PK numeriche.*

**5. Definizione SQL di un Sottoinsieme delle Relazioni (DDL)**

Si riporta il codice SQL DDL per creare le tabelle `MEMBRO`, `EVENTO` e `COMMENTO`, che includono diversi tipi di vincoli richiesti.

```sql
-- Tabella per i membri registrati della community
CREATE TABLE MEMBRO (
    ID_Membro INT AUTO_INCREMENT PRIMARY KEY,
    Nickname VARCHAR(50) NOT NULL UNIQUE,
    Nome VARCHAR(100) NOT NULL,
    Cognome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    PasswordHash VARCHAR(255) NOT NULL COMMENT 'Hash della password per sicurezza',
    ProvinciaResidenza VARCHAR(2) NOT NULL COMMENT 'Sigla provincia, es. MI, per newsletter'
) ENGINE=InnoDB;

-- Tabella per le categorie degli eventi
CREATE TABLE CATEGORIA (
    ID_Categoria INT AUTO_INCREMENT PRIMARY KEY,
    NomeCategoria VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- Tabella per gli eventi inseriti dai membri
CREATE TABLE EVENTO (
    ID_Evento INT AUTO_INCREMENT PRIMARY KEY,
    Titolo VARCHAR(200) NOT NULL,
    LuogoSvolgimento VARCHAR(255) NOT NULL COMMENT 'Descrizione del luogo, es. via, città',
    Provincia VARCHAR(2) NOT NULL COMMENT 'Sigla provincia, es. RM, per filtri e newsletter',
    DataOraSvolgimento DATETIME NOT NULL,
    ArtistiCoinvolti TEXT NULL COMMENT 'Elenco artisti o descrizione',
    ID_MembroInseritore INT NOT NULL,
    ID_Categoria INT NOT NULL,

    INDEX idx_evento_data (DataOraSvolgimento), -- Indice per ricerche temporali
    INDEX idx_evento_provincia (Provincia),   -- Indice per filtri geografici

    CONSTRAINT fk_evento_membro
        FOREIGN KEY (ID_MembroInseritore) REFERENCES MEMBRO(ID_Membro)
        ON DELETE RESTRICT -- Impedisce la cancellazione di un membro se ha inserito eventi
        ON UPDATE CASCADE, -- Se ID_Membro cambia (improbabile), aggiorna qui

    CONSTRAINT fk_evento_categoria
        FOREIGN KEY (ID_Categoria) REFERENCES CATEGORIA(ID_Categoria)
        ON DELETE RESTRICT -- Impedisce la cancellazione di una categoria se usata da eventi
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabella per i commenti e i voti lasciati dai membri sugli eventi
CREATE TABLE COMMENTO (
    ID_Commento INT AUTO_INCREMENT PRIMARY KEY,
    Testo TEXT NULL COMMENT 'Commento testuale facoltativo',
    Voto TINYINT NOT NULL COMMENT 'Voto numerico obbligatorio da 1 a 5',
    DataOraPubblicazione DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ID_MembroAutore INT NOT NULL,
    ID_EventoRiferito INT NOT NULL,

    INDEX idx_commento_evento (ID_EventoRiferito), -- Indice per recuperare commenti di un evento

    CONSTRAINT fk_commento_membro
        FOREIGN KEY (ID_MembroAutore) REFERENCES MEMBRO(ID_Membro)
        ON DELETE CASCADE -- Se un membro è cancellato, i suoi commenti vengono rimossi
        ON UPDATE CASCADE,

    CONSTRAINT fk_commento_evento
        FOREIGN KEY (ID_EventoRiferito) REFERENCES EVENTO(ID_Evento)
        ON DELETE CASCADE -- Se un evento è cancellato, i suoi commenti vengono rimossi
        ON UPDATE CASCADE,

    CONSTRAINT chk_voto_range -- Vincolo di Dominio
        CHECK (Voto BETWEEN 1 AND 5),

    CONSTRAINT uq_membro_evento_commento -- Vincolo di Unicità
        UNIQUE (ID_MembroAutore, ID_EventoRiferito) -- Un membro commenta/vota un evento solo una volta
) ENGINE=InnoDB;

-- Nota: Si è scelto InnoDB come motore di storage per MySQL per il supporto a
--       transazioni e vincoli di integrità referenziale.
--       Sono stati aggiunti indici per ottimizzare le query più frequenti.
--       Le clausole ON DELETE sono state scelte con logica: RESTRICT per dati
--       strutturali (categorie, membri inseritori), CASCADE per dati dipendenti
--       (commenti, interessi).
```

**6. Interrogazioni SQL (Punto 5 della traccia)**

Si forniscono le query SQL richieste:

**a. Elenco degli eventi già svolti, in ordine alfabetico di provincia**

```sql
SELECT
    E.ID_Evento,
    E.Titolo,
    E.LuogoSvolgimento,
    E.Provincia,
    E.DataOraSvolgimento,
    C.NomeCategoria
FROM
    EVENTO AS E
JOIN
    CATEGORIA AS C ON E.ID_Categoria = C.ID_Categoria
WHERE
    E.DataOraSvolgimento < NOW() -- Filtra per eventi passati
ORDER BY
    E.Provincia ASC, -- Ordina per provincia (alfabetico)
    E.DataOraSvolgimento DESC; -- Ordine secondario (opzionale, dal più recente passato)
```

**b. Elenco dei membri che non hanno mai inserito un commento**

```sql
SELECT
    M.ID_Membro,
    M.Nickname,
    M.Nome,
    M.Cognome,
    M.Email
FROM
    MEMBRO AS M
LEFT JOIN
    COMMENTO AS CO ON M.ID_Membro = CO.ID_MembroAutore
WHERE
    CO.ID_Commento IS NULL; -- Seleziona solo i membri per cui la JOIN non ha trovato corrispondenze
```
*(Alternativa con NOT EXISTS)*
```sql
SELECT
    M.ID_Membro,
    M.Nickname,
    M.Nome,
    M.Cognome,
    M.Email
FROM
    MEMBRO AS M
WHERE NOT EXISTS (
    SELECT 1
    FROM COMMENTO AS CO
    WHERE CO.ID_MembroAutore = M.ID_Membro
);
```

**c. Per ogni evento il voto medio ottenuto in ordine di categoria e titolo**

```sql
SELECT
    CA.NomeCategoria,
    E.Titolo AS TitoloEvento,
    E.ID_Evento,
    AVG(CO.Voto) AS VotoMedio
FROM
    EVENTO AS E
JOIN
    CATEGORIA AS CA ON E.ID_Categoria = CA.ID_Categoria
LEFT JOIN -- Usiamo LEFT JOIN per includere eventi senza voti (VotoMedio sarà NULL)
    COMMENTO AS CO ON E.ID_Evento = CO.ID_EventoRiferito
GROUP BY
    E.ID_Evento, -- Raggruppa per evento per calcolare la media dei suoi voti
    CA.NomeCategoria, -- Includiamo nel GROUP BY per poterle selezionare e ordinare
    E.Titolo
ORDER BY
    CA.NomeCategoria ASC, -- Ordina prima per nome categoria
    E.Titolo ASC;         -- Poi per titolo evento
```

**d. I dati dell'utente che ha registrato il maggior numero di eventi**

```sql
SELECT
    M.ID_Membro,
    M.Nickname,
    M.Nome,
    M.Cognome,
    M.Email,
    COUNT(E.ID_Evento) AS NumeroEventiInseriti
FROM
    MEMBRO AS M
JOIN
    EVENTO AS E ON M.ID_Membro = E.ID_MembroInseritore
GROUP BY
    M.ID_Membro, -- Raggruppa per membro per contare i suoi eventi
    M.Nickname,
    M.Nome,
    M.Cognome,
    M.Email
ORDER BY
    NumeroEventiInseriti DESC -- Ordina in modo decrescente per numero di eventi
LIMIT 1; -- Prende solo il primo risultato (quello con il conteggio maggiore)
```
