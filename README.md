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

### Regisztráció, bejelentkezés és kijelentkezés
- **Regisztráció**: A látogatók regisztrálhatnak és böngészhetik a könyv kínálatot, de nem rendelhetnek.
- **Bejelentkezés**: A regisztrált felhasználók bejelentkezhetnek a rendszerbe, így lehetőségük van vásárlásra.
- **Kijelentkezés**: A bejelentkezett felhasználók kijelentkezhetnek a rendszerből.

### Könyvek kezelése
- **Hozzáadás**: A rendszer lehetővé teszi a könyvek hozzáadását.
- **Szerkesztés**: Jogosultsággal rendelkező felhasználók módosíthatják a könyveket.
- **Törlés**: Jogosultsággal rendelkező felhasználók törölhetik a könyveket.
- **Könyv adatai**:
  - Név
  - Kiadás éve
  - Kiadó
  - Szerző
  - Oldalszám
  - Kötés
  - Méret
  - Ár
  - Műfaj

### Könyvek keresése és szűrése
- **Keresés**: Keresés könyv címére és szerzőjére.
- **Szűrés**: Könyvek szűrése műfajokra.
- **Találatok száma**: A rendszer megjeleníti a találatok számát.

### Könyvadatlapok megtekintése
- A könyv adatlapján megjelennek a könyv adatai, és a könyv kosárba helyezhető.
- A rendszer megjeleníti a könyv elérhetőségét az áruházakban.
- A szerzőre és kiadóra kattintva Google keresés indítható.

### Legújabb könyvek megjelenítése
- **Kezdőoldalon**: Az 5 legutóbb felvitt könyv megjelenítése.
- **Újdonságok oldalon**: Részletesebb lista a legújabb könyvekről.

### Legfelkapottabb könyvek megjelenítése
- **Kezdőoldalon**: A 3 legtöbbet eladott könyv megjelenítése.
- **Sikerlista oldalon**: A teljes legfelkapottabb könyvek listája.

### Műfajok kezelése
- A rendszer lehetővé teszi műfajok és alműfajok hozzáadását, szerkesztését és törlését az adminisztrátoroknak.
- Könyvek sorolhatók műfajokba.

### Áruházak kezelése
- Az országban több üzlet tartozhat a könyvesbolt-hálózathoz.
- A rendszer lehetővé teszi az áruházak hozzáadását, szerkesztését és törlését az adminisztrátoroknak.

### Könyvek elérhetősége áruházakban
- A rendszer megjeleníti, hogy egy adott könyv melyik áruházakban kapható.

### Készlet nyilvántartása
- A rendszer nyilvántartja a készleteket boltonként.

### Készlet kimerülésének figyelése
- A rendszer figyelmeztetést küld, ha egy termék készlete kimerül.

### Kosár
- A felhasználó kosárba helyezheti a megvásárolni kívánt könyveket.
- A felhasználó törölhet elemeket a kosarából még a fizetés végbemenetele előtt.

### Könyv statisztikáinak aktualizálása
- A rendszer növeli a könyv eladott példány számát, ha a vásárló megveszi azt.

### Vásárlás
- A felhasználó választhat kiszállítást vagy üzletben történő átvételt.
- A felhasználó választhat bankkártyás vagy készpénzes fizetési módot.
- Számla készítése a vásárlásról.
- A felhasználó megvásárolt könyveit tárolja a rendszer.

