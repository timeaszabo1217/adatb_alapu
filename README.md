# Adatbázis alapú rendszerek

Jelen projektben egy Könyvesbolt adatbázisának kidolgozása és annak kezelésének megoldása webes felületen volt a feladatunk.

## Csapattagok
- Szabó Tímea
- Veszeli Karina
- Nagy Péter

## Feladat szöveges leírása
A Streeler könyvesbolt weboldal célja, hogy egy könnyen kezelhető platformot kínáljon a könyvek 
szerelmeseinek, ahol mindenki megtalálhatja a számára legmegfelelőbb olvasnivalót és élvezheti az online 
vásárlás nyújtotta kényelmet. Emellett a Streeler üzleteiben egy kávézó is található, ahol a vendégek 
kényelmesen elfogyaszthatják kedvenc kávéjukat és egy kényelmes környezetben olvashatnak.
A látogatók regisztrálhatnak és böngészhetik a könyv kínálatot. A regisztrált felhasználók 
bejelentkezhetnek, így lehetőségük van vásárlásra. Kosárba helyezhetik a megvásárolni kívánt könyveket és 
törölhetnek elemeket belőle még a fizetés előtt. Választhatják a házhozszállítást vagy a személyes átvételt 
az üzletben. Az adminisztrátorok könyveket, műfajokat, áruházakat és azok készleteit kezelhetik.

## Követelmények
- Regisztráció, bejelentkezés és kijelentkezés:
  - A látogatók regisztrálhatnak és böngészhetik a könyv kínálatot, azonban nem rendelhetnek
  - A regisztrált felhasználók bejelentkezhetnek a rendszerbe, így lehetőségük van a vásárlásra
  - A bejelentkezett felhasználók kijelentkezhetnek
- Könyvek kezelése:
  - A rendszer lehetővé teszi a könyvek hozzáadását, szerkesztését és törlését az arra 
jogosultaknak
  - A könyvek adatai között szerepelnek: név, kiadás éve, kiadó, szerző, oldalszám, kötés, méret, 
ár, műfaj
- Könyvek keresése és szűrése:
  - Keresés címre, szerzőre
  - Szűrés műfajokra
  - A találatok számát kigyűjti a rendszer
- Könyvadatlapok megtekintése:
  - Az adott könyv oldalán megjelenítésre kerülnek a könyv adatai és kosárba helyezhetjük azt
  - Megtekinthetjük a könyv elérhetőségét az áruházakban
  - A szerzőre és kiadóra kattintva egy google keresést indíthatunk el
- Legújabb könyvek megjelenítése:
  - A kezdőoldalon megjelenik a 5 legutóbb felvitt könyv
  - Az újdonságok oldalon részletesebb listát kapunk
- Legfelkapottabb könyvek megjelenítése:
  - A kezdőoldalon megjelenik a 3 legtöbbet eladott könyv
  - Az sikerlista oldalon a teljes listát láthatjuk
- Műfajok kezelése:
  - A rendszer lehetővé teszi műfajok és alműfajok hozzáadását, szerkesztését és törlését az 
adminisztrátoroknak
  - Könyvek sorolhatók műfajokba
- Áruházak kezelése:
  - Az országban több üzlet tartozhat a könyvesbolt-hálózathoz
  - A rendszer lehetővé teszi az áruházak hozzáadását, szerkesztését és törlését az 
adminisztrátoroknak
- Könyvek elérhetősége áruházakban:
  - A rendszer megjeleníti, hogy egy adott könyv melyik áruházakban kapható
- Készlet nyilvántartása: 
  - A rendszer nyilvántartja a készleteket boltonként
- Készlet kimerülésének figyelése: 
  - A rendszer figyelmeztetést küld, ha egy termék készlete kimerül
- Kosár:
  - A felhasználó kosárba helyezheti a megvásárolni kívánt könyveket
  - A felhasználó törölhet elemeket a kosarából még a fizetés végbemenetele előtt
- Könyv statisztikáinak aktualizálása:
  - A rendszer növeli a könyv eladott példány számát, ha a vásárló megveszi azt
- Vásárlás:
  - A felhasználó választhat kiszállítást vagy üzletben történő átvételt
  - A felhasználó választhat bankkártyás vagy készpénzes fizetési módot
  - Számla készítése a vásárlásról
  - A felhasználó megvásárolt könyveit tárolja a rendszer
