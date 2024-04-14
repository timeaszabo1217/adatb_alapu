# Adatbázis alapú rendszerek

Jelen projektben egy Könyvesbolt adatbázisának kidolgozása és annak kezelésének megoldása webes felületen a feladatunk.

## Csapattagok
Szabó Tímea, Veszeli Karina, Nagy Péter

## Feladat szöveges leírása
A Streeler könyvesbolt weboldal célja, hogy egy könnyen kezelhető platformot kínáljon a könyvek 
szerelmeseinek, ahol mindenki megtalálhatja a számára legmegfelelőbb olvasnivalót és élvezheti az online 
vásárlás nyújtotta kényelmet. Emellett a Streeler üzleteiben egy kávézó is található, ahol a vendégek 
kényelmesen elfogyaszthatják kedvenc kávéjukat és egy kényelmes környezetben olvashatnak.
A látogatók regisztrálhatnak és böngészhetik a könyv kínálatot. A regisztrált felhasználók 
bejelentkezhetnek, így lehetőségük van vásárlásra. Kosárba helyezhetik a megvásárolni kívánt könyveket és 
törölhetnek elemeket belőle még a fizetés előtt. Választhatják a házhozszállítást vagy a személyes átvételt 
az üzletben. Az adminisztrátorok könyveket, műfajokat, áruházakat és azok készleteit kezelhetik.

## Követelménykatalógus
- Regisztráció, bejelentkezés és kijelentkezés:
  - A látogatók regisztrálhatnak és böngészhetik a könyv kínálatot, azonban nem rendelhetnek
  - A regisztrált felhasználók bejelentkezhetnek a rendszerbe, így lehetőségük van a vásárlásra
  - A bejelentkezett felhasználók kijelentkezhetnek
- Könyvek kezelése:
  - A rendszer lehetővé teszi a könyvek hozzáadását, szerkesztését és törlését az arra 
  jogosultaknak
  - A könyvek adatai között szerepelnek: név, kiadás éve, kiadó, szerző, oldalszám, kötés, méret, ár
- Könyvek keresése és szűrése:
  - Keresés címre, szerzőre
  - A találatok számát kigyűjti a rendszer
  - Szűrés legolcsóbbtól kezdődően
  - Szűrés felkapott könyvekre, műfajonként is
  - A rendszer alapértelmezetten legfelkapottabb könyvek szerinti sorrendben jeleníti meg a 
  találatokat
  - A Top 3 könyvet kiemeli a rendszer
- Könyvadatlapok megtekintése:
  - Az adott könyv oldalán megjelenítésre kerülnek azok a könyvek, amelyeket más vásárlók 
  szintén megvásároltak
- Legújabb könyvek megjelenítése:
  - A kezdőoldalon megjelennek a legújabb könyvek
- Műfajok kezelése:
  - A rendszer lehetővé teszi műfajok és alműfajok hozzáadását, szerkesztését és törlését az 
  adminisztrátoroknak
  - Könyvek sorolhatók műfajokba
- Műfajok számlálása:
  - A rendszer összeszámolja, hogy hány könyv tartozik egy adott műfajba
- Áruházak kezelése:
  - Az országban több üzlet tartozhat a könyvesbolt-hálózathoz
  - A rendszer lehetővé teszi az áruházak hozzáadását, szerkesztését és törlését az 
  adminisztrátoroknak
- Könyvek elérhetősége áruházakban:
  - A rendszer megjeleníti, hogy egy adott könyv melyik áruházban kapható
- Készlet nyilvántartása:
  - A rendszer nyilvántartja a készleteket boltonként
- Készlet kimerülésének figyelése:
  - A rendszer figyelmeztetést küld, ha egy termék készlete kimerül
- Kosár:
  - A felhasználó kosárba helyezheti a megvásárolni kívánt könyveket
  - A felhasználó törölhet elemeket a kosarából még a fizetés végbemenetele előtt
- Vásárlás:
  - A felhasználó választhat kiszállítással vagy üzletben történő átvétellel
  - Számla készítése a vásárlásról
- Kávézó itallapjának megjelenítése:
  - Az online felületen elérhető lesz a kávézó itallapja

```plaintext
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣤⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⡶
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⢿⣿⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣿⠋⠀
    📓♫₊˚.🎧 ✩｡☕︎      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠙⢷⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣾⠃⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⢯⢧⡀⠀⠀⠀⠀⠀⠀⢠⢏⠇⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠳⡱⣄⠀⠀⠀⠀⢠⠏⡞⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠱⡌⠲⣄⣀⡴⠃⡜⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣤⡴⠶⠟⠛⡟⠉⠙⠓⣦⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⠚⠁⠈⠒⡾⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⣾⣽⣾⣇⠀⢀⠜⠁⠀⠀⣠⠃⠙⢷⣤⡀⠀⠀⠀⠀⠀⢀⣼⢀⣀⡀⢀⡇⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣾⣿⣿⠈⠉⠙⠻⣯⣀⣤⡴⠋⠁⠀⠀⢠⠏⠳⣄⠀⠀⠀⣠⣾⣿⠋⠀⠈⣾⣷⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣿⣿⢿⠛⢷⣤⠤⠒⠺⢿⡁⠀⠀⠀⢀⡴⠋⠀⠀⣘⡦⣤⠞⢡⣿⣿⠀⠀⠀⢨⡇⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⡿⡿⢿⡉⣾⠁⠀⠀⠀⢸⣧⣀⣴⠶⠋⠀⠀⣀⣼⣻⡿⠃⣠⠏⣿⠃⠀⠀⠀⣼⠃⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣷⣇⢀⣹⠟⠢⣀⠀⠀⠈⢸⠋⠁⢀⣠⣴⣾⣿⠟⠋⢀⠴⢉⣾⠃⠀⠀⠀⣰⠏⠀⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⢈⣧⡟⠙⡅⠀⠀⠈⢷⡄⠀⣿⢀⣰⣿⡿⠛⠁⠀⡠⠞⢁⣴⡿⠁⠀⠀⣠⡾⠋⠀⠀⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⣀⡠⠤⠒⠋⠁⡘⢧⡀⢹⠀⠀⠀⠀⢿⣀⣿⣿⠿⠉⠀⠀⠀⠉⣠⣼⠟⠉⠀⠀⣠⠾⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
          ⢠⣤⣶⣿⣷⣶⣿⣿⣤⣤⣤⣤⣽⣾⣦⣤⣤⣴⢾⣯⣶⣶⣶⣶⣶⣾⣾⣾⣟⣡⣤⣤⣄⣀⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
          ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠉⠉⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
```
