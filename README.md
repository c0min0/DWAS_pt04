# Pràctica 5 - Backend
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

--------------------

## Upgardes pràtica 05
### Recaptcha
- Salta després de tres intents
- S'ha tingut en compte que si surtim per URL de la verificació i tornem a entrar al login, aparegui el recaptcha automàticament.
- A la taula d'usuari s'han afegit els camps retrieveToken (el token per recuperar el compte), i retrieveTokenExpiration (amb la data d'expiració del token)
### OAuth
- Es fa OAuth amb el sistema de Google.
- Tenim tres fitxers, el de config, el d'autentificació i un final per validar si l'usuari existeix i sinó crear-li em compte
### HybridAuth
- Es fa HybridAuth amb comptes de Github.
- A diferencia amb el mètode anterior, utilitzem tant sols dos fitxers: on està la configuració i la redirecció al sistema de Github, i el que vàlida l'usuari o li crea un compte, redirigint-lo després a l'area privada.
### Altres consideracions
Tots dos mètodes tenen un component comú que s'utilitza a la validació de l'usuari, ja que és el mateix procés. Aquest, utilitza el email tant pel camp d'email com per el camp username, ja que tots dos son requerits i així ens assegurem que siguin únics, i es troba a **redirect.controller.php**.
En aquest fitxer també podem trobar un intent de funcions comunes per a tots els documents, per validar si l'usuari està logat o no. Ens hem trobat problemes al utilitzar **_ _ DIR _ _** al header("Location..."), així que encara no està del tot implementat. 
També hem començat a treballar amb composer i hem refactoritzat el Mailer perquè utilitzi les llibreries de composer.
Les variables d'entorn també s'han refactoritzat per separar les dades necessaries per temàtiques a diferents funcions: **env_db()**, **env_mail()**, **env_captcha()**, **env_oauth()**, **env_hybridauth()**.

------------
## TODO
- Guardes i redirects en un fitxer comú.
- Afegir el nom de l'usuari que ha creat l'article a la vista del llistat d'articles