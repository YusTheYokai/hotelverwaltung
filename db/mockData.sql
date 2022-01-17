-- Add users to the databank

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort"
--                                                                                   v
        VALUES(2, 0, "Dwayne", "Johnson", "dwayne@therock.com", "Rock", "3125f4e76e7db86c34bd8b37ed9bc09afba4bd7a", 0);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort2"
--                                                                                   v
        VALUES(3, 0, "Kevin", "Hart", "kevin@hart.com", "Kevin", "6548450686b17f039e383f0e2a76228c44c7caab", 0);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort3"
--                                                                                   v
        VALUES(4, 1, "Marin", "Kitagawa", "marin@kitagawa.com", "Shizuku-tan", "4992ba98b80abfc0c92b75a871ca2c89a8378c24", 0);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort4"
--                                                                                   v
        VALUES(5, 0, "Wakana", "Gojo", "wakana@gojou.com", "Gojou", "8201e4b13f3207c8cb21efe134df42ca0f221378", 0);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort5"
--                                                                                   v
        VALUES(6, 2, "Eren", "Yeager", "eren@yeager.com", "Titanhater1", "116d63dac7cb430b414aa68b7207d4c793fc365d", 0);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort6"
--                                                                                   v
        VALUES(7, 0, "Ryan", "Reynolds", "ryan@reynolds.com", "Ryan", "e583f36729c14be2703f5fb17a57ad1555b1bfdf", 0);



-- Add ServiceTechniker to the databank

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort7"
--                                                                                   v
        VALUES(15, 0, "Nico", "Lerchl", "nico@lerchl.com", "Nico", "41d50ab5708de02173f060fc48d42fe7f3dc04ca", 1);

INSERT INTO USER (ID, HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD, ROLE)
--                                                                               "Probepasswort8"
--                                                                                   v
        VALUES(23, 0, "Janko", "Hu", "janko@hu.com", "Janko", "da61fbb86c89ffc2392eddb96605fbe22a2bad11", 1);



-- Add newsposts to the databank

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 
    
    VALUES (1, "Anime Festival 2022","Wir haben die Ehre ein paar Veranstaltungen des Anime Festival 2022 zu hosten! Das Festival wird vom 21. bis zum 23. Januar laufen. Freut euch schon auf verschiedene Events wie unter anderem auch einen Cosplay Contest! Weitere Details und genaue Termine findet ihr auf der Webseite vom Anime Festival!","Anime Festival.jpeg", TIMESTAMP('2022-01-14', '07:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (2, "Cosplay Event","Am 21. Januar wird ein Cosplay Event in unserer Festhalle stattfinden. Jeder der ein Cosplay hat, kann teilnehmen. Es gibt viele unterschiedliche Preise ,die man gewinnen kann wie 2.000 € Preisgeld oder eine Reise nach Japan für 2. Neben einer Jury werden hauptsächliche die Stimmen der Anwesenden in Betracht gezogen ,um den Gewinner zu bestimmen, also macht euch gefasst auf eine grandiose Show!","Halle.jpeg", TIMESTAMP('2022-01-18', '07:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (3, "Meet and greet am Samstag dem 22. ","Von 15:00 bis 18:00 geben berühmte Cosplayer und Voice Actor Autogramme in der Festhalle. Unter anderem wird es auch Fragerunden geben mit euren Lieblingsautoren. ","MeetAndGreet.jpeg", TIMESTAMP('2022-01-19', '07:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (4, "Der Gewinner vom Cosplay Event"," Wir gratulieren Kitagawa Marin fürs Gewinnen des Cosplay Events. Sie hat mit ihrem Cosplay von Shizuku-tan vom Anime Sono Bisque Doll wa Koi wo suru. Mit überwältigender Mehrzahl hat sie den Hauptpreis ,gewonnen und zwar eine all-inclusive Reise nach Tokio für 2 Personen! ", "shizuku_cosplay.jpeg", TIMESTAMP('2022-01-21', '19:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (5, "Neue Frühstücksoptionen"," Im Speisesaal bieten wir seit neuestem eine lukrative Auswahl an erlesenen Instantnudel Sorten. Diese werden täglich von lokalen Bauern aus dem Asiamarkt geholt. Unser Chefkoch bereitet diese dann mit seinen eigenem kreativen Stil zu ,um eine einzigartige Geschmackslandschaft zu kreieren. Das Frühstücksbuffet ist nach wie vor von 6 bis 9 Uhr morgens zugänglich.", "ramen.jpeg", TIMESTAMP('2022-01-23', '06:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (6, "Unser neues Schwimmbad ist eröffnet"," Nach den Umbauarbeiten ,die letztes Jahr gestartet haben, können wir nun mit Stolz verkünden ,dass unser neu renoviertes Schwimmbad mit einigen neuen Features kommt. Wie zum Beispiel einem Saunabereich, einer Whirpoolbereich und einem Thermalbad. Wir freuen uns schon auf Ihre zufriedenen Gesichter ,wenn sie diese neuen Features ausnutzen.", "schwimmbad.jpeg", TIMESTAMP('2022-01-24', '08:00:00'), 1);

INSERT INTO `news_post`(ID, `TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (7, "Neue Corona Vorschriften fürs Sportcenter"," Mit dem derzeitigen Stand der Coronainfektionen fühlen wir uns gezwungen die 2.5G Regel für das Sportcenter einzuführen. Wir entschuldigen uns vielmals für die Unannehmlichkeiten.", "sportcenter.jpeg", TIMESTAMP('2022-01-25', '08:00:00'), 1);

-- Add tickets to the databank

INSERT INTO `ticket`(`ID`,`TITLE`, `CONTENT`, CREATION_TIME, `USER_ID`, STATUS) 

    VALUES (1, "In unserem Zimmer ist ein komischer Geruch.","Im Zimmer 342 ist ein komischer Geruch, es riecht nach einem Tier und Müll, könnten Sie dem auf den Grund gehen?", TIMESTAMP('2022-01-24', '21:23:08'), 2, 2);

INSERT INTO `ticket`(`ID`,`TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`) 

    VALUES (2, "Der Vorhang ist hässlich.","Der Vorhang in unserem Zimmer ist so grotesk ich kann in diesem Zimmer nicht bleiben. Ändern Sie das bitte sofort! ", "vorhang.jpeg", TIMESTAMP('2022-01-25', '20:01:12'), 3);

INSERT INTO `ticket`(`ID`,`TITLE`, `CONTENT`, CREATION_TIME, `USER_ID`) 

    VALUES (3, "Verletzung","Ich habe mir den Zeh gestoßen in der Lobby was für eine Frechheit wer hat die Kommode in meinen Weg gestellt. Wenn ich keine Kompensation kriege ist die ANzeige raus!", TIMESTAMP('2022-01-25', '04:12:11'), 6);

INSERT INTO `ticket`(`ID`,`TITLE`, `CONTENT`, `PICTURE`, CREATION_TIME, `USER_ID`, STATUS) 

    VALUES (4, "Das Wasser tropft im Waschbecken","In unserem Badezimmer tropft das Wasser die ganze Zeit.", "wasserhahn.jpeg", TIMESTAMP('2022-01-26', '18:30:04'), 7, 1);

-- Add comments to the databank

INSERT INTO comment (CONTENT, CREATION_TIME, USER_ID, TICKET_ID)

        VALUES ("Dieser Geruch scheint von einenm toten Waschbären zu kommen den sie in ihrem Koffer mit sich führen.", TIMESTAMP('2022-01-24', '21:50:00'), 23, 1);

INSERT INTO comment (CONTENT, CREATION_TIME, USER_ID, TICKET_ID)

        VALUES ("Wasserhahn repariert.", TIMESTAMP('2022-01-26', '20:00:00'), 15, 4);

INSERT INTO comment (CONTENT, CREATION_TIME, USER_ID, TICKET_ID)

        VALUES ("Was soll das heißen wollen sie mir unterstellen das mein Kuscheltier stinkt?", TIMESTAMP('2022-01-25', '07:50:00'), 2, 1);

INSERT INTO comment (CONTENT, CREATION_TIME, USER_ID, TICKET_ID)

        VALUES ("Natürlich wollen wir ihnen nichts unterstellen, jedoch riecht es bei Ihnen im Zimmer wie eine Müllhalde mit dem Tier.", TIMESTAMP('2022-01-25', '08:03:12'), 23, 1);

INSERT INTO comment (CONTENT, CREATION_TIME, USER_ID, TICKET_ID)

        VALUES ("Wir entschuldigen uns sehr für Ihre Unannehmlichkeiten, unser eigener Hausarzt kann sich um Ihre Verletzung kümmern wenn Sie wollen.", TIMESTAMP('2022-01-25', '07:50:00'), 15, 1);
