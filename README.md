# Pràctica 4 - Backend
Aquest projecte està dividit en **tres** seccions:

## 1. Controller
Dins de *controller* trobem la carpeta *utils* on hi ha funcions comunes que s'utilitzen per a la resta de controladors.

Després trobem els controladors de cada secció de l'aplicatiu. Cadascun d'ells és qui s'encarrega de cridar a la vista pertinent de la manera pertinent i d'executar tots els processos necessaris.

## 2. Model
Aquí trobarem tot el codi relatiu a la connexó amb la base de dades. Treballant d'aquesta manera, si en qualsevol moment canviessin de sistema d'emmagatzematge, només caldria rectificar aquests mètodes.

Podem trobar un model per a cada taula de la BD així com un per a les tasques pertinents de la pròpia BD, com la connexió.

## 3.  View
Aquí és on es troben definides cadascuna de les vistes de l'aplicatiu. Si els controladors generen part de la vista s'inclou dins d'aquesta.

L'únic qui pot cridar a la vista és el seu controlador. Així doncs, per canviar de secció a qui cridarem serà al controlador, i aquest s'encarregarà de cridar a la vista pertinent.

Dins de la vista  també trobarem la carpeta *assets*, on es troben els estils i la resta d'elements necessaris per construir les diferents vistes.

## Arrel
Finalment, a l'arrel del document podem trobar l'*index.php*, que és el controlador inicial de la pàgina pública. Es troba a l'arrel i sota aquest nom perquè sigui el primer que es carregui.

També trobem les variables d'entorn, el *.sql* amb la base de dades i aquest *README*.

## Altres consideracions
- S'ha procurat que l'usuari rebi feedback després de cada acció i que tingui controls per tirar enrere en tot moment.
- Per a que s'emmagatzemi el número de pàgina i la quantitat d'articles en tot moment, s'han utilitzat cookies.
- L'usuari pot accedir tant amb el seu correu com amb el seu nom d'usuari.
- En cas que un usuari amb la sessió iniciada es dirigeixi a través d'URL a una direcció de l'espai públic (index, login, signup...), se'l redirigeix automàticament al seu espai privat.
- En cas que un usuari anònim intenti accedir a l'àrea privada a través d'URL, se'l redirigirà automàticament a la pàgina per iniciar sessió.
- La BD s'ha creat amb el nom en minúscula per evitar problemes, ja que tot i que al fitxer *.sql* estigués en majúscula, al *phpmyadmin* es creava en minúscula, i podria ser que segons el SO el resultat fos diferent, així doncs, el nom de la BD, s'ha cregut oportú deixar-la minúscula per evitar incongruències.