# Racing Action

**Installation von Komponenten**

**1. Symfony CLI**

Symfony CLI (CLI = Command Line Interface) (https://github.com/symfony-cli/symfony-cli/releases)

-> symfony-cli_windows_amd64.zip

- Lege die entpackte 'symfony.exe' in einen Ordner unter C:\ (im besten fall einfach ´symfony´) ab.
- C:\symfony\symfony.exe
- Symfony zu den "PATH" variablen unter Windows hinzufügen (https://superuser.com/questions/949560/how-do-i-set-system-environment-variables-in-windows-10)  - **Der Ordner sollte hinzugefügt werden, nicht symfony.exe**

**2. PHP**

PHP ist die programmiersprache, mit der wir arbeiten (https://windows.php.net/download#php-8.2)

-> VS16 x64 Non Thread Safe

- Lege die entpackten daten in einem Ordner unter C:\ (im besten fall einfach ´´´php´´´) ab.
- C:\php\php.exe (und alle anderen dateien)

**3. Composer**

Composer ist ein Pakete-Manager. Pakete benutzen wir um verschiedene funktionen zusammen zu setzen oder projekte zu managen. (https://getcomposer.org/download/)

-> Windows Installer

- Führe den Composer Setup aus, wähle, wenn du gefragt wirst, die php.exe (C:\php\php.exe aus schritt 2) aus.
- Wähle außerdem "Add this php to your PATH" an. (Das ermöglicht uns PHP jederzeit von einem Termainl/Command Line auszuführen)

**4. NodeJS**

NodeJS ist eine Entwicklungsumgebung für JavaScript (https://nodejs.org/en)

-> Download NodeJS

- Führe Node.js Setup aus, während des Setups wirst du gefragt, welche pakete du installieren willst. Stelle sicher das ALLE optionen aktiviert sind.
- Wenn du nach "install chocolatey" gefragt wirst, kannst du diesen punkt ignorieren

**5. Neustart deines PCs (nicht überspringen pls...)**

---

**Installation von Entwicklertools**

**1. GitHub Desktop & GitHub.com**

GitHub ist eine Online Versionsverwaltung von Code (https://github.com/)

-> Lege dir einen Account an bei GitHub.com
-> Lade dir GitHub Desktop herunter (https://desktop.github.com/) und installiere es.

- Melde dich mit deinem GitHub Account bei GitHub Desktop an.

**2. Visual Studio Code - VSCode (https://code.visualstudio.com/)**

Visual Studio Code ist ein Code-Editor.

-> Download for Windows

**3. XAMPP (https://www.apachefriends.org/de/index.html)**

XAMPP ermöglicht es dir einen lokalen Server inkl. Datenbank zu starten.

-> XAMPP für Windows
-> Direkter Link (https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-portable-windows-x64-8.2.12-0-VS16-installer.exe)

---

**Deine Web-App herunterladen und Installieren**

**Das Repository Klonen**

Was ist ein Repository? Ein Repository ist der Ort/Speicherort/Link/Adresse an dem GitHub deinen Code Versioniert abspeichert.

1. Kopiere den Link des Repositories (https://github.com/wolfkidsounds/www.racingaction.de)
2. Öffne GitHub Desktop
3. File -> Clone Repository
4. Wähle "URL" und füge die URL des Repositories ein.
5. Wähle den Ort, an dem deine Daten abgelegt werden sollen (hier empfiehlt es sich, einen Projektordner anzulegen zB: C:\Projekte\).
6. Klicke auf "Clone"

**Das Projekt Installieren**

1. Navigiere zu deinem Projekt (C:\Projekte\www.racingaction.de\)
2. Rechtsklick -> Mit Code Öffnen (Alternativ kannst du VSCode starten und unter File->Open Folder den Ordner auswählen)
3. Nachdem VSCode geöffnet ist Terminal->New Terminal
4. Im Terminal kannst du nun ```./install``` eintippen.
5. ./install führt nun die befehle aus, um das projekt auf deinem rechner zu installieren.
5.1 composer install
5.2 npm install
6. mit dem befehel ```symfony serve -d``` startest du den internen server von symfony.
7. mit dem befehel ```npm run watch``` startest du webpack, webpack ist ein anderer server, der nach änderungen schaut und diese an deine website ausliefert.
8. unter http://127.0.0.1:8000 kannst du dir nun deine lokale website ansehen.

---

**Weiterführende Informationen**

- Symfony Dokumentation: https://symfony.com/doc/current/index.html
- Symfony Maker Bundle: https://symfony.com/bundles/SymfonyMakerBundle/current/index.html
- EasyAdmin Dokumentation: https://symfony.com/bundles/EasyAdminBundle/current/index.html
