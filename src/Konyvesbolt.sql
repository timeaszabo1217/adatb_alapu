--
-- Adatb�zis: `Konyvesbolt`
--

-- --------------------------------------------------------

--
-- T�bl�k t�rl�se, ha m�r l�tre volt hozva
--

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE VasarloKonyv';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Vasarlo';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE AdminAruhaz';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Admin';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE KonyvMufaj';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE KonyvSzerzo';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE AruhazKonyv';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Aruhaz';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Konyv';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Almufaj';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

BEGIN
   EXECUTE IMMEDIATE 'DROP TABLE Mufaj';
EXCEPTION
   WHEN OTHERS THEN
      IF SQLCODE != -942 THEN
         RAISE;
      END IF;
END;
/

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Vasarlo`
--

CREATE TABLE Vasarlo (
  Vasarlo_email VARCHAR2(50) PRIMARY KEY NOT NULL,
  Jelszo VARCHAR2(100),
  Iranyitoszam NUMBER(5),
  Varos VARCHAR2(100),
  Utca VARCHAR2(100),
  Megjegyzes VARCHAR2(255)
);

--
-- A t�bla adatainak ki�rat�sa `Vasarlo`
--

INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('john@example.com', '$2y$10$wzyf2hqk/W2Xr7tuMEIZbuScSGCsPmNQwOHw7adNtpZloyw0JK3dG', 6700, 'Szeged', 'J�kai M�r utca', 'Megjegyzes1');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('jane@example.com', '$2y$10$kpvVKlTrcj0fM/Wm9MOGgeeIwwbinBIZfMXu2P/BTIJj3cse9FOmq', 1000, 'Budapest', 'Arany J�nos utca', 'Megjegyzes2');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('alice@example.com', '$2y$10$CThkoLoAe11/apWr3DUkAuAN8VrjWIstdG4yUd..B2t/tJLpTKrRK', 5430, 'Tiszaf�ldv�r', 'B�nat utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('bob@example.com', '$2y$10$rqi4WmnehwgHcc/z.H9lreSuqpDachF8VSEXtWt506pHlRdA/c9x2', 6223, 'Soltszentimre', 'Szab� utca', 'Megjegyzes1');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('emma@example.com', '$2y$10$6y/WRVYN65eCHl3sA1KFl.UvQRg.HDulzgvSL5hcLbZdj/g0SrL4.', 3732, 'Kurity�n', 'Bajai utca', 'Megjegyzes2');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('hannah@example.com', '$2y$10$ojTg/m.OfJTqP/ur1RSPnOrLUCZTWOnawydGQWTpU15EaM9t5X1FS', 7056, 'Szedres', 'Szolnoki utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('grace@example.com', '$2y$10$Z1ro7fOkQPvOkPPvgHcuduksqO5bfVX1b7ORLw4PGl2POqdq08J4.', 4445, 'Nagycserkesz', 'Nagy Utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('alexander@example.com', '$2y$10$UshuxlLpPIVdR014BIb//ejhHtxa8V0Sd3yo68NYtCbL8RWgxEK5O', 3000, 'Hatvan', 'Falvai utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('logan@example.com', '$2y$10$npfTDmFlls3sVW/QIU2/WuQzkuBg8yQCE1MrOjt3TMWUV3FqFaBUG', 3100, 'Salg�tarj�n', 'M�sz�ros utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('isabella@example.com', '$2y$10$yyfR.zYSaf2bSq7se6EFduHHBXEkYuOzu7V8fkVyClG/TX/nFklQa', 3200, 'Gy�ngy�s', 'Alma utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('james@example.com', '$2y$10$U0UaVNyaPioqBNTneG1so.ssSQlseAZ.J6n7wjcWvovvUM65K.vh2', 3300, 'Eger', 'Csiga utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('noah@example.com', '$2y$10$f8qU8k8Wwv0XUJdwrDkEQuRPDhUU/yHGeK8OYlOMHbX9pvnq/q.xq', 3400, 'Mez�k�vesd', 'Pentelei utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('ava@example.com', '$2y$10$WgIA01n7LYQOeSNUaHM70.G1kz9f3KoSTnf135qW5ENU4BgYnC72y', 3500, 'Miskolc', 'Aradi utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('oliver@example.com', '$2y$10$UazfiOgQykXLajS4lyoZl.kuIenH8AzdLKA/l21bL3MRCZgQTpPRy', 5085, 'R�k�czifalva', 'T�gl�s utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('sophia@example.com', '$2y$10$A1tKG7Ms3Rxr92E.zFbH2.rLO.qisp4g.vqAzXqOki0KzAFMxKfxC', 5000, 'Szolnok', 'Balatoni utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('olivia@example.com', '$2y$10$4ygSfOjJkTYLSbewIQD4EexYa/Aj7uPJlcFuYDd176meL5weUGGNm', 1020, 'Budapest, 2. ker�let', 'Andr�s utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('william@example.com', '$2y$10$arhvmmksQdS.YSRoxXEPk..4VNuKvCVXngHXm.hAqkN6qSFSuIP0i', 1030, 'Budapest, �buda-B�k�smegyer', 'L�tez� utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('amelia@example.com', '$2y$10$o0tz16MyoQ523Txw5Xa6BO5HTSNGztAmRyP5iZCfJKTZascSJ1s.m', 1040, 'Budapest, �jpest', 'Tenger utca', 'Megjegyzes3');

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Admin`
--

CREATE TABLE Admin (
  Admin_email VARCHAR2(100) PRIMARY KEY NOT NULL,
  Jelszo VARCHAR2(100),
  Kezdes_idopontja DATE,
  Beosztas VARCHAR2(100)
);

--
-- A t�bla adatainak ki�rat�sa `Admin`
--

INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('acsiga@streeler.com', '$2y$10$wzyf2hqk/W2Xr7tuMEIZbuScSGCsPmNQwOHw7adNtpZloyw0JK3dG',  TO_DATE('2024-01-01', 'YYYY-MM-DD'), 'Rendszergazda');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('fent@streeler.com', '$2y$10$kpvVKlTrcj0fM/Wm9MOGgeeIwwbinBIZfMXu2P/BTIJj3cse9FOmq', TO_DATE('2024-02-01', 'YYYY-MM-DD'), 'Elad�');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('van@streeler.com', '$2y$10$CThkoLoAe11/apWr3DUkAuAN8VrjWIstdG4yUd..B2t/tJLpTKrRK',  TO_DATE('2024-03-01', 'YYYY-MM-DD'), 'Felad�');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('ahatalmas@streeler.com', '$2y$10$rqi4WmnehwgHcc/z.H9lreSuqpDachF8VSEXtWt506pHlRdA/c9x2',  TO_DATE('2024-04-01', 'YYYY-MM-DD'), 'Elad�');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('fan@streeler.com', '$2y$10$6y/WRVYN65eCHl3sA1KFl.UvQRg.HDulzgvSL5hcLbZdj/g0SrL4.',  TO_DATE('2024-05-01', 'YYYY-MM-DD'), '�rufelt�lt�');

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Konyv`
--

CREATE TABLE Konyv (
  Konyv_id NUMBER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY NOT NULL,
  Nev VARCHAR2(50) NOT NULL,
  Kiadas_eve NUMBER,
  Kiado VARCHAR2(100),
  Oldalszam NUMBER,
  Meret VARCHAR2(50),
  Kotet NUMBER,
  Ar NUMBER,
  Eladott_peldanyok_szama NUMBER
);

--
-- A t�bla adatainak ki�rat�sa `Konyv`
--

INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a B�lcsek K�ve', 1997, 'Kosmosz Kiad�', 223, 'A5', 1, 3999, 12000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a Titkok Kamr�ja', 1998, 'Kosmosz Kiad�', 251, 'A5', 1, 3999, 8500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s az azkabani fogoly', 1999, 'Kosmosz Kiad�', 317, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a T�z Serlege', 2000, 'Kosmosz Kiad�', 636, 'A5', 1, 3999, 11000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a F�nix Rendje', 2003, 'Kosmosz Kiad�', 766, 'A5', 1, 3999, 10500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a F�lv�r Herceg', 2005, 'Kosmosz Kiad�', 607, 'A5', 1, 3999, 9800000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter �s a Hal�l erekly�i', 2007, 'Kosmosz Kiad�', 607, 'A5', 1, 3999, 11500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A l�ny a vonaton', 2015, 'Maxim Kiad�', 464, 'A5', 1, 4999, 2000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az �hez�k viadala', 2008, 'Akropolisz Kiad�', 374, 'A5', 1, 3999, 23000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kiv�lasztott', 2009, 'Akropolisz Kiad�', 391, 'A5', 2, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A l�ngol� vil�g', 2010, 'Akropolisz Kiad�', 390, 'A5', 3, 3999, 18000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A terept�ra', 2009, 'L''Harmattan Kiad�', 375, 'A5', 1, 3999, 6500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A megpr�b�ltat�sok', 2010, 'L''Harmattan Kiad�', 361, 'A5', 2, 3999, 6000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A Da Vinci-k�d', 2003, 'Kossuth Kiad�', 689, 'A5', 1, 4999, 80000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Angyalok �s d�monok', 2000, 'Kossuth Kiad�', 736, 'A5', 1, 4999, 39000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az Alkimista', 1988, 'Alexandra Kiad�', 163, 'A5', 1, 3999, 65000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Ne b�nts�tok a feketerig�t!', 1960, 'Magvet� Kiad�', 281, 'A5', 1, 3999, 40000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('1984', 1949, 'Corvina Kiad�', 328, 'A5', 1, 3999, 25000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('B�szkes�g �s bal�t�let', 1813, 'K�nyvmolyk�pz� Kiad�', 432, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A nagy Gatsby', 1925, 'K�nyvmolyk�pz� Kiad�', 180, 'A5', 1, 3999, 25000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Moby-Dick', 1851, 'Magyar K�nyvklub', 635, 'A5', 1, 4999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('H�bor� �s b�ke', 1869, 'Magyar K�nyvklub', 1225, 'A5', 1, 5999, 36000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A rozsda�vezet', 1951, 'Typotex Kiad�', 277, 'A5', 1, 3999, 65000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A hobbit', 1937, 'Typotex Kiad�', 310, 'A5', 1, 3999, 100000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Fahrenheit 451', 1953, 'Agave K�nyvek', 158, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kis herceg', 1943, 'M�ra Ferenc K�nyvkiad�', 93, 'A5', 1, 2999, 140000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('�v�lt� szelek', 1847, 'K�rp�tia St�di� Kiad�', 464, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Jane Eyre', 1847, 'Helikon Kiad�', 507, 'A5', 1, 3999, 14000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Kalandorok', 1884, 'Gondolat Kiad�', 366, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Tom Sawyer kalandjai', 1876, 'Gondolat Kiad�', 274, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('K�t v�ros t�rt�nete', 1859, 'Gondolat Kiad�', 341, 'A5', 1, 3999, 200000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Les Mis�rables', 1862, 'Gondolat Kiad�', 1463, 'A5', 1, 5999, 60000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A Gy�r�k Ura', 1954, 'Gondolat Kiad�', 1178, 'A5', 1, 5999, 150000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('T�z �s j�g dalai', 1996, 'Gabo Kiad�', 694, 'A5', 1, 4999, 90000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Narnia kr�nik�i', 1950, 'Gabo Kiad�', 768, 'A5', 1, 4999, 120000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az �reg hal�sz �s a tenger', 1952, 'Gabo Kiad�', 127, 'A5', 1, 2999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A megment�', 1993, 'Animus Kiad�', 208, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kitasz�tottak', 1967, 'Animus Kiad�', 192, 'A5', 1, 3999, 15000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A titkos kert', 1911, 'M�ra K�nyvkiad�', 331, 'A5', 1, 3999, 8000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Kisasszonyok', 1868, 'M�ra K�nyvkiad�', 759, 'A5', 1, 4999, 35000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A lila sz�n� sz�kek', 1982, 'M�ra K�nyvkiad�', 304, 'A5', 1, 3999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A d�hez�k', 1939, 'Magvet� Kiad�', 464, 'A5', 1, 4999, 14000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Elf�jta a sz�l', 1936, 'Magvet� Kiad�', 1037, 'A5', 1, 5999, 30000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Monte Cristo gr�fja', 1844, 'Alexandra Kiad�', 1276, 'A5', 1, 5999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Dorian Gray arck�pe', 1890, 'Helikon Kiad�', 252, 'A5', 1, 3999, 7000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Drakula', 1897, 'Helikon Kiad�', 418, 'A5', 1, 3999, 8000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Frankenstein', 1818, 'K�nyvmolyk�pz� Kiad�', 280, 'A5', 1, 3999, 6000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Dr. Jekyll �s Mr. Hyde k�l�n�s esete', 1886, 'K�nyvmolyk�pz� Kiad�', 96, 'A5', 1, 2999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az �tv�ltoz�s', 1915, 'Magvet� Kiad�', 55, 'A5', 1, 1999, 4000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A per', 1925, 'Helikon Kiad�', 216, 'A5', 1, 3999, 3000000);

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `KonyvSzerzo`
--

CREATE TABLE KonyvSzerzo (
  Konyv_id NUMBER NOT NULL,
  Szerzo VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Konyv_id, Szerzo),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id) ON DELETE CASCADE
);

--
-- A t�bla adatainak ki�rat�sa `KonyvSzerzo`
--

INSERT INTO KonyvSzerzo VALUES (1, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (2, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (3, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (4, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (5, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (6, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (7, 'J.K. Rowling');
INSERT INTO KonyvSzerzo VALUES (8, 'Paula Hawkins');
INSERT INTO KonyvSzerzo VALUES (9, 'Suzanne Collins');
INSERT INTO KonyvSzerzo VALUES (10, 'Suzanne Collins');
INSERT INTO KonyvSzerzo VALUES (11, 'Suzanne Collins');
INSERT INTO KonyvSzerzo VALUES (12, 'James Dashner');
INSERT INTO KonyvSzerzo VALUES (13, 'James Dashner');
INSERT INTO KonyvSzerzo VALUES (14, 'Dan Brown');
INSERT INTO KonyvSzerzo VALUES (15, 'Dan Brown');
INSERT INTO KonyvSzerzo VALUES (16, 'Paulo Coelho');
INSERT INTO KonyvSzerzo VALUES (17, 'Harper Lee');
INSERT INTO KonyvSzerzo VALUES (18, 'George Orwell');
INSERT INTO KonyvSzerzo VALUES (19, 'Jane Austen');
INSERT INTO KonyvSzerzo VALUES (20, 'F. Scott Fitzgerald');
INSERT INTO KonyvSzerzo VALUES (21, 'Herman Melville');
INSERT INTO KonyvSzerzo VALUES (22, 'Leo Tolstoy');
INSERT INTO KonyvSzerzo VALUES (23, 'J.D. Salinger');
INSERT INTO KonyvSzerzo VALUES (24, 'J.R.R. Tolkien');
INSERT INTO KonyvSzerzo VALUES (25, 'Ray Bradbury');
INSERT INTO KonyvSzerzo VALUES (26, 'Antoine de Saint-Exup�ry');
INSERT INTO KonyvSzerzo VALUES (27, 'Emily Bront�');
INSERT INTO KonyvSzerzo VALUES (28, 'Charlotte Bront�');
INSERT INTO KonyvSzerzo VALUES (29, 'Mark Twain');
INSERT INTO KonyvSzerzo VALUES (30, 'Mark Twain');
INSERT INTO KonyvSzerzo VALUES (31, 'Charles Dickens');
INSERT INTO KonyvSzerzo VALUES (32, 'Victor Hugo');
INSERT INTO KonyvSzerzo VALUES (33, 'J.R.R. Tolkien');
INSERT INTO KonyvSzerzo VALUES (34, 'George R.R. Martin');
INSERT INTO KonyvSzerzo VALUES (35, 'C.S. Lewis');
INSERT INTO KonyvSzerzo VALUES (36, 'Ernest Hemingway');
INSERT INTO KonyvSzerzo VALUES (37, 'Lois Lowry');
INSERT INTO KonyvSzerzo VALUES (38, 'S.E. Hinton');
INSERT INTO KonyvSzerzo VALUES (39, 'Frances Hodgson Burnett');
INSERT INTO KonyvSzerzo VALUES (40, 'Louisa May Alcott');
INSERT INTO KonyvSzerzo VALUES (41, 'Alice Walker');
INSERT INTO KonyvSzerzo VALUES (42, 'John Steinbeck');
INSERT INTO KonyvSzerzo VALUES (43, 'Margaret Mitchell');
INSERT INTO KonyvSzerzo VALUES (44, 'Alexandre Dumas');
INSERT INTO KonyvSzerzo VALUES (45, 'Oscar Wilde');
INSERT INTO KonyvSzerzo VALUES (46, 'Bram Stoker');
INSERT INTO KonyvSzerzo VALUES (47, 'Mary Shelley');
INSERT INTO KonyvSzerzo VALUES (48, 'Robert Louis Stevenson');
INSERT INTO KonyvSzerzo VALUES (49, 'Franz Kafka');
INSERT INTO KonyvSzerzo VALUES (50, 'Franz Kafka');

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `VasarloKonyv`
--

CREATE TABLE VasarloKonyv (
  Vasarlo_email VARCHAR2(100) NOT NULL,
  Konyv_id NUMBER NOT NULL,
  PRIMARY KEY (Vasarlo_email, Konyv_id),
  FOREIGN KEY (Vasarlo_email) REFERENCES Vasarlo(Vasarlo_email),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id)
);

--
-- A t�bla adatainak ki�rat�sa `VasarloKonyv`
--

INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 7);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('logan@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('logan@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('isabella@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('isabella@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('isabella@example.com', 7);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('james@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('james@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('james@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('noah@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('noah@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('noah@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('ava@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('ava@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('ava@example.com', 7);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('oliver@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('oliver@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('oliver@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('sophia@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('sophia@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('sophia@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('olivia@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('olivia@example.com', 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('olivia@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('william@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('william@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('william@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('amelia@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('amelia@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('amelia@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('john@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alice@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 6);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('logan@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('isabella@example.com', 6);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('james@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('noah@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('ava@example.com', 6);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('oliver@example.com', 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('sophia@example.com', 7);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('olivia@example.com', 4);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('william@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('amelia@example.com', 5);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 8);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 9);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 10);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 11);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 12);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 13);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 14);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('jane@example.com', 15);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alice@example.com', 16);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alice@example.com', 17);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alice@example.com', 18);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 19);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 20);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 21);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 22);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 23);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 24);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('bob@example.com', 25);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 26);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 27);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 28);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 29);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 30);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 31);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('emma@example.com', 32);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 33);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 34);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 35);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 36);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 37);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 38);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('hannah@example.com', 39);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 40);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 41);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 42);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 43);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 44);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 45);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('grace@example.com', 46);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 47);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 48);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 49);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id) VALUES ('alexander@example.com', 50);

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Mufaj`
--

CREATE TABLE Mufaj (
  Mufaj_megnevezes VARCHAR2(100) PRIMARY KEY NOT NULL
);

--
-- A t�bla adatainak ki�rat�sa `Mufaj`
--

INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Irodalom');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Gyermek �s ifj�s�gi');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Ezot�ria');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('T�rt�nelmi');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Sci-fi');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Romantikus');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Filoz�fiai');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Krimi');

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Almufaj`
--

CREATE TABLE Almufaj (
  Mufaj_megnevezes VARCHAR2(100) NOT NULL,
  Almufaj_megnevezes VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Mufaj_megnevezes, Almufaj_megnevezes),
  FOREIGN KEY (Mufaj_megnevezes) REFERENCES Mufaj(Mufaj_megnevezes)
);

--
-- A t�bla adatainak ki�rat�sa `Almufaj`
--

INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'Sz�pirodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'Sz�rakoztat� irodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'K�lt�szet');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Gyermek �s ifj�s�gi', 'Gyermekirodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Gyermek �s ifj�s�gi', 'Ifj�s�gi irodalom');

-- --------------------------------------------------------
--
-- T�bla szerkezet ehhez a t�bl�hoz `KonyvMufaj`
--

CREATE TABLE KonyvMufaj (
  Konyv_id NUMBER NOT NULL,
  Mufaj_megnevezes VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Konyv_id, Mufaj_megnevezes),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id),
  FOREIGN KEY (Mufaj_megnevezes) REFERENCES Mufaj(Mufaj_megnevezes)
);

--
-- A t�bla adatainak ki�rat�sa `KonyvMufaj`
--

INSERT INTO KonyvMufaj VALUES (1, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (2, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (3, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (4, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (5, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (6, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (7, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (8, 'Krimi');
INSERT INTO KonyvMufaj VALUES (9, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (10, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (11, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (12, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (13, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (14, 'Krimi');
INSERT INTO KonyvMufaj VALUES (15, 'Krimi');
INSERT INTO KonyvMufaj VALUES (16, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (17, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (18, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (19, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (20, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (21, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (22, 'T�rt�nelmi');
INSERT INTO KonyvMufaj VALUES (23, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (24, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (25, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (26, 'Filoz�fiai');
INSERT INTO KonyvMufaj VALUES (27, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (28, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (29, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (30, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (31, 'T�rt�nelmi');
INSERT INTO KonyvMufaj VALUES (32, 'T�rt�nelmi');
INSERT INTO KonyvMufaj VALUES (33, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (34, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (35, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (36, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (37, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (38, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (39, 'Gyermek �s ifj�s�gi');
INSERT INTO KonyvMufaj VALUES (40, 'Gyermek �s ifj�s�gi');

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `Aruhaz`
--

CREATE TABLE Aruhaz (
  Aruhaz_id NUMBER GENERATED BY DEFAULT AS IDENTITY PRIMARY KEY NOT NULL,
  Iranyitoszam NUMBER(5),
  Varos VARCHAR2(100),
  Utca VARCHAR2(100),
  Hazszam NUMBER,
  Dolgozok_szama NUMBER
);

--
-- A t�bla adatainak ki�rat�sa `Aruhaz`
--

INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (1081, 'Budapest', 'P�va utca', 35, 40);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (6720, 'Szeged', 'Kossuth Lajos sug�r�t', 5, 15);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (7621, 'P�cs', 'R�k�czi �t', 10, 20);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (4034, 'Debrecen', 'Hajnal utca', 18, 25);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (2394, 'Roxmorst', 'Var�zsl�k �tja', 1, 100);

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `AruhazKonyv`
--

CREATE TABLE AruhazKonyv (
  Aruhaz_id NUMBER NOT NULL,
  Konyv_id NUMBER NOT NULL,
  PRIMARY KEY (Aruhaz_id, Konyv_id),
  FOREIGN KEY (Aruhaz_id) REFERENCES Aruhaz(Aruhaz_id),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id)
);

--
-- A t�bla adatainak ki�rat�sa `AruhazKonyv`
--

INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (1, 3);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (2, 10);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (3, 25);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (4, 12);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (5, 40);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (1, 17);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (2, 8);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (3, 30);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (4, 19);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id) VALUES (5, 42);

-- --------------------------------------------------------

--
-- T�bla szerkezet ehhez a t�bl�hoz `AdminAruhaz`
--

CREATE TABLE AdminAruhaz (
  Admin_email VARCHAR2(100) NOT NULL,
  Aruhaz_id NUMBER NOT NULL,
  PRIMARY KEY (Admin_email, Aruhaz_id),
  FOREIGN KEY (Admin_email) REFERENCES Admin(Admin_email),
  FOREIGN KEY (Aruhaz_id) REFERENCES Aruhaz(Aruhaz_id)
);

--
-- A t�bla adatainak ki�rat�sa `AdminAruhaz`
--

INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('acsiga@streeler.com', 1);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('fent@streeler.com', 2);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('van@streeler.com', 3);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('ahatalmas@streeler.com', 4);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('fan@streeler.com', 5);

-- --------------------------------------------------------