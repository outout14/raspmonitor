![LOGO](https://raw.githubusercontent.com/outout14/raspmonitor/master/logo.png | width=48)
# RaspMonitor 
[![forthebadge](http://forthebadge.com/images/badges/powered-by-electricity.svg)](http://forthebadge.com)

RaspMonitor, un petit script pour vérifier votre raspberrypi via votre navigateur Web !
RaspMonitor vous permet de voir son adresse IP, son nom réseau : raspichou sa version de PHP le serveur HTTP utilisé et sa version, les ports ouverts (FTP & SSH), sa température et plus encore ! Tu peux même l'utiliser sur d'autres serveurs _(attention certaines fonctionnailités risque de ne pas fonctionner)_

## Capture d'ecran 
![capture](https://github.com/outout14/raspmonitor/blob/master/capture.png?raw=true)

## Pour commencer
Pour installer RaspMonitor c'est facile : 

### Pré-requis
- Un serveur Web avec PHP 5.3.0 ou plus
- Avoir activé les .htaccess _(pour la sécurité)_

### Installation
- Téléchargez la dernière version (zip) de raspmonitor sur le [github](https://github.com/outout14/raspmonitor/releases)
- Extrayez l'archive zip (sous linux avec ```unzip raspmonitor-master.zip```)
- Copiez le contenu de l'archive dans le répertoire de votre serveur Web
- Editez le fichier ```settings.ini``` avec les paramètres de votre choix
- Renommez le fichier ```htaccess.sample``` en ```.htaccess```
- Vous pouvez, une fois lus supprimer les fichiers ```LICENSE``` et ```readme.md``` de votre serveur 

## Démarrage
Accèdez tout simplement via votre navigateur a raspmonitor !

## Fabriqué avec
- Des bonnes framboises et de la crème fouêté
- PHPStorm _(parceque VCS c'est nul)_
- [Jquery](https://jquery.com)
- [NotifyJS](https://notifyjs.com)
- [Bootstrap](https://getbootstrap.com/)

## Auteurs
* **Maël** _alias_ [@outout14](https://github.com/outout14)
* **Math** _alias_ [@lapin-b](https://github.com/lapin-b)
[Voir plus](https://github.com/outout14/raspmonitor/contributors)_

## License

Ce projet est sous licence ``WTFTPL`` - voir le fichier [LICENSE](https://github.com/outout14/raspmonitor/blob/master/LICENSE) pour plus d'informations

