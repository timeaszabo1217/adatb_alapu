--
-- Adatbázis: `Konyvesbolt`
--

-- --------------------------------------------------------

--
-- Táblák törlése, ha már létre volt hozva
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
-- Tábla szerkezet ehhez a táblához `Vasarlo`
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
-- A tábla adatainak kiíratása `Vasarlo`
--

INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('john@example.com', '$2y$10$wzyf2hqk/W2Xr7tuMEIZbuScSGCsPmNQwOHw7adNtpZloyw0JK3dG', 6700, 'Szeged', 'Jókai Mór utca', 'Megjegyzes1');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('jane@example.com', '$2y$10$kpvVKlTrcj0fM/Wm9MOGgeeIwwbinBIZfMXu2P/BTIJj3cse9FOmq', 1000, 'Budapest', 'Arany János utca', 'Megjegyzes2');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('alice@example.com', '$2y$10$CThkoLoAe11/apWr3DUkAuAN8VrjWIstdG4yUd..B2t/tJLpTKrRK', 5430, 'Tiszaföldvár', 'Bánat utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('bob@example.com', '$2y$10$rqi4WmnehwgHcc/z.H9lreSuqpDachF8VSEXtWt506pHlRdA/c9x2', 6223, 'Soltszentimre', 'Szabó utca', 'Megjegyzes1');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('emma@example.com', '$2y$10$6y/WRVYN65eCHl3sA1KFl.UvQRg.HDulzgvSL5hcLbZdj/g0SrL4.', 3732, 'Kurityán', 'Bajai utca', 'Megjegyzes2');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('hannah@example.com', '$2y$10$ojTg/m.OfJTqP/ur1RSPnOrLUCZTWOnawydGQWTpU15EaM9t5X1FS', 7056, 'Szedres', 'Szolnoki utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('grace@example.com', '$2y$10$Z1ro7fOkQPvOkPPvgHcuduksqO5bfVX1b7ORLw4PGl2POqdq08J4.', 4445, 'Nagycserkesz', 'Nagy Utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('alexander@example.com', '$2y$10$UshuxlLpPIVdR014BIb//ejhHtxa8V0Sd3yo68NYtCbL8RWgxEK5O', 3000, 'Hatvan', 'Falvai utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('logan@example.com', '$2y$10$npfTDmFlls3sVW/QIU2/WuQzkuBg8yQCE1MrOjt3TMWUV3FqFaBUG', 3100, 'Salgótarján', 'Mészáros utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('isabella@example.com', '$2y$10$yyfR.zYSaf2bSq7se6EFduHHBXEkYuOzu7V8fkVyClG/TX/nFklQa', 3200, 'Gyöngyös', 'Alma utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('james@example.com', '$2y$10$U0UaVNyaPioqBNTneG1so.ssSQlseAZ.J6n7wjcWvovvUM65K.vh2', 3300, 'Eger', 'Csiga utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('noah@example.com', '$2y$10$f8qU8k8Wwv0XUJdwrDkEQuRPDhUU/yHGeK8OYlOMHbX9pvnq/q.xq', 3400, 'Mezőkövesd', 'Pentelei utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('ava@example.com', '$2y$10$WgIA01n7LYQOeSNUaHM70.G1kz9f3KoSTnf135qW5ENU4BgYnC72y', 3500, 'Miskolc', 'Aradi utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('oliver@example.com', '$2y$10$UazfiOgQykXLajS4lyoZl.kuIenH8AzdLKA/l21bL3MRCZgQTpPRy', 5085, 'Rákóczifalva', 'Téglás utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('sophia@example.com', '$2y$10$A1tKG7Ms3Rxr92E.zFbH2.rLO.qisp4g.vqAzXqOki0KzAFMxKfxC', 5000, 'Szolnok', 'Balatoni utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('olivia@example.com', '$2y$10$4ygSfOjJkTYLSbewIQD4EexYa/Aj7uPJlcFuYDd176meL5weUGGNm', 1020, 'Budapest, 2. kerület', 'András utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('william@example.com', '$2y$10$arhvmmksQdS.YSRoxXEPk..4VNuKvCVXngHXm.hAqkN6qSFSuIP0i', 1030, 'Budapest, Óbuda-Békásmegyer', 'Létező utca', 'Megjegyzes3');
INSERT INTO Vasarlo (vasarlo_email, jelszo, iranyitoszam, varos, utca, megjegyzes) VALUES ('amelia@example.com', '$2y$10$o0tz16MyoQ523Txw5Xa6BO5HTSNGztAmRyP5iZCfJKTZascSJ1s.m', 1040, 'Budapest, Újpest', 'Tenger utca', 'Megjegyzes3');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Admin`
--

CREATE TABLE Admin (
  Admin_email VARCHAR2(100) PRIMARY KEY NOT NULL,
  Jelszo VARCHAR2(100),
  Kezdes_idopontja DATE,
  Beosztas VARCHAR2(100)
);

--
-- A tábla adatainak kiíratása `Admin`
--

INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('acsiga@streeler.com', '$2y$10$wzyf2hqk/W2Xr7tuMEIZbuScSGCsPmNQwOHw7adNtpZloyw0JK3dG',  TO_DATE('2024-01-01', 'YYYY-MM-DD'), 'Rendszergazda');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('fent@streeler.com', '$2y$10$kpvVKlTrcj0fM/Wm9MOGgeeIwwbinBIZfMXu2P/BTIJj3cse9FOmq', TO_DATE('2024-02-01', 'YYYY-MM-DD'), 'Eladó');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('van@streeler.com', '$2y$10$CThkoLoAe11/apWr3DUkAuAN8VrjWIstdG4yUd..B2t/tJLpTKrRK',  TO_DATE('2024-03-01', 'YYYY-MM-DD'), 'Feladó');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('ahatalmas@streeler.com', '$2y$10$rqi4WmnehwgHcc/z.H9lreSuqpDachF8VSEXtWt506pHlRdA/c9x2',  TO_DATE('2024-04-01', 'YYYY-MM-DD'), 'Eladó');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('fan@streeler.com', '$2y$10$6y/WRVYN65eCHl3sA1KFl.UvQRg.HDulzgvSL5hcLbZdj/g0SrL4.',  TO_DATE('2024-05-01', 'YYYY-MM-DD'), 'Árufeltöltő');
INSERT INTO Admin (admin_email, jelszo, kezdes_idopontja, beosztas) VALUES ('egyadmin@streeler.com', '$2y$10$n9.8L0XcNENQxlXLipAOM.kmFpfP8.3wn6nFLBc53YhvIY3XHm8pS',  TO_DATE('2024-05-05', 'YYYY-MM-DD'), 'Árufeltöltő');



-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Konyv`
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
-- A tábla adatainak kiíratása `Konyv`
--

INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Bölcsek Köve', 1997, 'Kosmosz Kiadó', 223, 'A5', 1, 3999, 12000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Titkok Kamrája', 1998, 'Kosmosz Kiadó', 251, 'A5', 1, 3999, 8500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és az azkabani fogoly', 1999, 'Kosmosz Kiadó', 317, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Tűz Serlege', 2000, 'Kosmosz Kiadó', 636, 'A5', 1, 3999, 11000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Főnix Rendje', 2003, 'Kosmosz Kiadó', 766, 'A5', 1, 3999, 10500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Félvér Herceg', 2005, 'Kosmosz Kiadó', 607, 'A5', 1, 3999, 9800000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Harry Potter és a Halál ereklyéi', 2007, 'Kosmosz Kiadó', 607, 'A5', 1, 3999, 11500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A lány a vonaton', 2015, 'Maxim Kiadó', 464, 'A5', 1, 4999, 2000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az éhezők viadala', 2008, 'Akropolisz Kiadó', 374, 'A5', 1, 3999, 23000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kiválasztott', 2009, 'Akropolisz Kiadó', 391, 'A5', 2, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A lángoló világ', 2010, 'Akropolisz Kiadó', 390, 'A5', 3, 3999, 18000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A tereptúra', 2009, 'L''Harmattan Kiadó', 375, 'A5', 1, 3999, 6500000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A megpróbáltatások', 2010, 'L''Harmattan Kiadó', 361, 'A5', 2, 3999, 6000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A Da Vinci-kód', 2003, 'Kossuth Kiadó', 689, 'A5', 1, 4999, 80000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Angyalok és démonok', 2000, 'Kossuth Kiadó', 736, 'A5', 1, 4999, 39000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az Alkimista', 1988, 'Alexandra Kiadó', 163, 'A5', 1, 3999, 65000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Ne bántsátok a feketerigót!', 1960, 'Magvető Kiadó', 281, 'A5', 1, 3999, 40000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('1984', 1949, 'Corvina Kiadó', 328, 'A5', 1, 3999, 25000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Büszkeség és balítélet', 1813, 'Könyvmolyképző Kiadó', 432, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A nagy Gatsby', 1925, 'Könyvmolyképző Kiadó', 180, 'A5', 1, 3999, 25000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Moby-Dick', 1851, 'Magyar Könyvklub', 635, 'A5', 1, 4999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Háború és béke', 1869, 'Magyar Könyvklub', 1225, 'A5', 1, 5999, 36000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A rozsdaövezet', 1951, 'Typotex Kiadó', 277, 'A5', 1, 3999, 65000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A hobbit', 1937, 'Typotex Kiadó', 310, 'A5', 1, 3999, 100000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Fahrenheit 451', 1953, 'Agave Könyvek', 158, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kis herceg', 1943, 'Móra Ferenc Könyvkiadó', 93, 'A5', 1, 2999, 140000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Üvöltő szelek', 1847, 'Kárpátia Stúdió Kiadó', 464, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Jane Eyre', 1847, 'Helikon Kiadó', 507, 'A5', 1, 3999, 14000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Kalandorok', 1884, 'Gondolat Kiadó', 366, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Tom Sawyer kalandjai', 1876, 'Gondolat Kiadó', 274, 'A5', 1, 3999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Két város története', 1859, 'Gondolat Kiadó', 341, 'A5', 1, 3999, 200000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Les Misérables', 1862, 'Gondolat Kiadó', 1463, 'A5', 1, 5999, 60000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A Gyűrűk Ura', 1954, 'Gondolat Kiadó', 1178, 'A5', 1, 5999, 150000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Tűz és jég dalai', 1996, 'Gabo Kiadó', 694, 'A5', 1, 4999, 90000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Narnia krónikái', 1950, 'Gabo Kiadó', 768, 'A5', 1, 4999, 120000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az öreg halász és a tenger', 1952, 'Gabo Kiadó', 127, 'A5', 1, 2999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A megmentő', 1993, 'Animus Kiadó', 208, 'A5', 1, 3999, 10000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A kitaszítottak', 1967, 'Animus Kiadó', 192, 'A5', 1, 3999, 15000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A titkos kert', 1911, 'Móra Könyvkiadó', 331, 'A5', 1, 3999, 8000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Kisasszonyok', 1868, 'Móra Könyvkiadó', 759, 'A5', 1, 4999, 35000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A lila színű székek', 1982, 'Móra Könyvkiadó', 304, 'A5', 1, 3999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A dűhezők', 1939, 'Magvető Kiadó', 464, 'A5', 1, 4999, 14000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Elfújta a szél', 1936, 'Magvető Kiadó', 1037, 'A5', 1, 5999, 30000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Monte Cristo grófja', 1844, 'Alexandra Kiadó', 1276, 'A5', 1, 5999, 20000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Dorian Gray arcképe', 1890, 'Helikon Kiadó', 252, 'A5', 1, 3999, 7000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Drakula', 1897, 'Helikon Kiadó', 418, 'A5', 1, 3999, 8000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Frankenstein', 1818, 'Könyvmolyképző Kiadó', 280, 'A5', 1, 3999, 6000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Dr. Jekyll és Mr. Hyde különös esete', 1886, 'Könyvmolyképző Kiadó', 96, 'A5', 1, 2999, 5000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('Az átváltozás', 1915, 'Magvető Kiadó', 55, 'A5', 1, 1999, 4000000);
INSERT INTO Konyv (Nev, Kiadas_eve, Kiado, Oldalszam, Meret, Kotet, Ar, Eladott_peldanyok_szama) VALUES ('A per', 1925, 'Helikon Kiadó', 216, 'A5', 1, 3999, 3000000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `KonyvSzerzo`
--

CREATE TABLE KonyvSzerzo (
  Konyv_id NUMBER NOT NULL,
  Szerzo VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Konyv_id, Szerzo),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id) ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `KonyvSzerzo`
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
INSERT INTO KonyvSzerzo VALUES (26, 'Antoine de Saint-Exupéry');
INSERT INTO KonyvSzerzo VALUES (27, 'Emily Brontë');
INSERT INTO KonyvSzerzo VALUES (28, 'Charlotte Brontë');
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
-- Tábla szerkezet ehhez a táblához `VasarloKonyv`
--

CREATE TABLE VasarloKonyv (
  Vasarlo_email VARCHAR2(100) NOT NULL,
  Konyv_id NUMBER NOT NULL,
  Darabszam NUMBER,
  PRIMARY KEY (Vasarlo_email, Konyv_id),
  FOREIGN KEY (Vasarlo_email) REFERENCES Vasarlo(Vasarlo_email) ON DELETE CASCADE,
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id) ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `VasarloKonyv`
--

INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 2, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 3, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 7, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 1, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 2, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 5, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('logan@example.com', 1, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('logan@example.com', 4, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('isabella@example.com', 2, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('isabella@example.com', 3, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('isabella@example.com', 7, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('james@example.com', 1, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('james@example.com', 2, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('james@example.com', 4, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('noah@example.com', 1, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('noah@example.com', 3, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('noah@example.com', 4, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('ava@example.com', 2, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('ava@example.com', 5, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('ava@example.com', 7, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('oliver@example.com', 1, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('oliver@example.com', 2, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('oliver@example.com', 4, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('sophia@example.com', 1, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('sophia@example.com', 3, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('sophia@example.com', 5, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('olivia@example.com', 1, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('olivia@example.com', 2, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('olivia@example.com', 3, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('william@example.com', 1, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('william@example.com', 3, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('william@example.com', 4, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('amelia@example.com', 1, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('amelia@example.com', 3, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('amelia@example.com', 4, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('john@example.com', 4, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 4, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alice@example.com', 4, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 3, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 5, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 1, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 6, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('logan@example.com', 5, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('isabella@example.com', 6, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('james@example.com', 5, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('noah@example.com', 5, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('ava@example.com', 6, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('oliver@example.com', 3, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('sophia@example.com', 7, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('olivia@example.com', 4, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('william@example.com', 5, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('amelia@example.com', 5, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 8, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 9, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 10, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 11, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 12, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 13, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 14, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('jane@example.com', 15, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alice@example.com', 16, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alice@example.com', 17, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alice@example.com', 18, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 19, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 20, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 21, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 22, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 23, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 24, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('bob@example.com', 25, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 26, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 27, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 28, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 29, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 30, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 31, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('emma@example.com', 32, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 33, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 34, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 35, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 36, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 37, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 38, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('hannah@example.com', 39, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 40, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 41, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 42, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 43, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 44, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 45, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('grace@example.com', 46, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 47, 3);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 48, 1);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 49, 2);
INSERT INTO VasarloKonyv (vasarlo_email, konyv_id, darabszam) VALUES ('alexander@example.com', 50, 3);

UPDATE VasarloKonyv
SET darabszam = 0
WHERE darabszam IS NULL;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Mufaj`
--

CREATE TABLE Mufaj (
  Mufaj_megnevezes VARCHAR2(100) PRIMARY KEY NOT NULL
);

--
-- A tábla adatainak kiíratása `Mufaj`
--

INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Irodalom');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Gyermek és ifjúsági');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Ezotéria');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Történelmi');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Sci-fi');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Romantikus');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Filozófiai');
INSERT INTO Mufaj (Mufaj_megnevezes) VALUES ('Krimi');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Almufaj`
--

CREATE TABLE Almufaj (
  Mufaj_megnevezes VARCHAR2(100) NOT NULL,
  Almufaj_megnevezes VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Mufaj_megnevezes, Almufaj_megnevezes),
  FOREIGN KEY (Mufaj_megnevezes) REFERENCES Mufaj(Mufaj_megnevezes) ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `Almufaj`
--

INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'Szépirodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'Szórakoztató irodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Irodalom', 'Költészet');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Gyermek és ifjúsági', 'Gyermekirodalom');
INSERT INTO Almufaj (Mufaj_megnevezes, Almufaj_megnevezes) VALUES ('Gyermek és ifjúsági', 'Ifjúsági irodalom');

-- --------------------------------------------------------
--
-- Tábla szerkezet ehhez a táblához `KonyvMufaj`
--

CREATE TABLE KonyvMufaj (
  Konyv_id NUMBER NOT NULL,
  Mufaj_megnevezes VARCHAR2(100) NOT NULL,
  PRIMARY KEY (Konyv_id, Mufaj_megnevezes),
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id) ON DELETE CASCADE,
  FOREIGN KEY (Mufaj_megnevezes) REFERENCES Mufaj(Mufaj_megnevezes) ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `KonyvMufaj`
--

INSERT INTO KonyvMufaj VALUES (1, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (2, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (3, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (4, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (5, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (6, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (7, 'Gyermek és ifjúsági');
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
INSERT INTO KonyvMufaj VALUES (22, 'Történelmi');
INSERT INTO KonyvMufaj VALUES (23, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (24, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (25, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (26, 'Filozófiai');
INSERT INTO KonyvMufaj VALUES (27, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (28, 'Romantikus');
INSERT INTO KonyvMufaj VALUES (29, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (30, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (31, 'Történelmi');
INSERT INTO KonyvMufaj VALUES (32, 'Történelmi');
INSERT INTO KonyvMufaj VALUES (33, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (34, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (35, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (36, 'Irodalom');
INSERT INTO KonyvMufaj VALUES (37, 'Sci-fi');
INSERT INTO KonyvMufaj VALUES (38, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (39, 'Gyermek és ifjúsági');
INSERT INTO KonyvMufaj VALUES (40, 'Gyermek és ifjúsági');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Aruhaz`
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
-- A tábla adatainak kiíratása `Aruhaz`
--

INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (1081, 'Budapest', 'Páva utca', 35, 40);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (6720, 'Szeged', 'Kossuth Lajos sugárút', 5, 15);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (7621, 'Pécs', 'Rákóczi út', 10, 20);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (4034, 'Debrecen', 'Hajnal utca', 18, 25);
INSERT INTO Aruhaz (Iranyitoszam, Varos, Utca, Hazszam, Dolgozok_szama) VALUES (2394, 'Roxmorst', 'Varázslók útja', 1, 100);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `AruhazKonyv`
--

CREATE TABLE AruhazKonyv (
  Aruhaz_id NUMBER NOT NULL,
  Konyv_id NUMBER NOT NULL,
  Keszlet NUMBER,
  PRIMARY KEY (Aruhaz_id, Konyv_id),
  FOREIGN KEY (Aruhaz_id) REFERENCES Aruhaz(Aruhaz_id)
 ON DELETE CASCADE,
  FOREIGN KEY (Konyv_id) REFERENCES Konyv(Konyv_id) ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `AruhazKonyv`
--

INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (1, 3, 15);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (2, 10, 20);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (3, 25, 12);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (4, 12, 14);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (5, 40, 18);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (1, 17, 22);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (2, 8, 16);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (3, 30, 13);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (4, 19, 11);
INSERT INTO AruhazKonyv (Aruhaz_id, Konyv_id, keszlet) VALUES (5, 42, 24);

UPDATE AruhazKonyv
SET keszlet = 0
WHERE keszlet IS NULL;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `AdminAruhaz`
--

CREATE TABLE AdminAruhaz (
  Admin_email VARCHAR2(100) NOT NULL,
  Aruhaz_id NUMBER NOT NULL,
  PRIMARY KEY (Admin_email, Aruhaz_id),
  FOREIGN KEY (Admin_email) REFERENCES Admin(Admin_email)
 ON DELETE CASCADE,
  FOREIGN KEY (Aruhaz_id) REFERENCES Aruhaz(Aruhaz_id) 
ON DELETE CASCADE
);

--
-- A tábla adatainak kiíratása `AdminAruhaz`
--

INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('acsiga@streeler.com', 1);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('fent@streeler.com', 2);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('van@streeler.com', 3);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('ahatalmas@streeler.com', 4);
INSERT INTO AdminAruhaz (admin_email, aruhaz_id) VALUES ('fan@streeler.com', 5);

-- --------------------------------------------------------