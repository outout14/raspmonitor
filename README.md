![LOGO](https://outout.xyz/files/rspmonitor.png)
# RaspMonitor 
[![forthebadge](http://forthebadge.com/images/badges/powered-by-electricity.svg)](http://forthebadge.com)

RaspMonitor, un petit script pour vérifier votre raspberrypi via votre navigateur Web !
RaspMonitor vous permet de voir son adresse IP, son nom réseau : raspichou sa version de PHP le serveur HTTP utilisé et sa version, les ports ouverts (FTP & SSH), sa température et plus encore ! Tu peux même l'utiliser sur d'autres serveurs _(attention certaines fonctionnailités risque de ne pas fonctionner)_

RaspMonitor is a script to check many informations about our raspberrypi (or other linux machine) with our web browser !
RaspMonitor it allows you to view his IP adress, his LAN name, his PHP Version, and more ! 
_(Some features are disabled on Windows)_

### Requirements 
- A Web Server with PHP 5.3.0 (or higher)
- Have activated ```.htaccess``` (on apache)

### INSTALL 
- [Download the last version of raspmonitor](https://github.com/outout14/raspmonitor/releases)
- Extract it
- Copy raspmonitor into our web server directory (where you want)
- Edit ```settings.ini``` file with our parameters 
- Rename ```htaccess.sample``` to ```.htaccess``` (on apache)
- After, you can delete ```LICENSE``` and ```README``` files on our server

## Made With 
- PHPStorm _(because VCS was shit)_
- [Jquery](https://jquery.com)
- [NotifyJS](https://notifyjs.com)
- [Bootstrap](https://getbootstrap.com/)

## Autors 
* **Maël** _alias_ [@outout14](https://github.com/outout14)
* **Math** _alias_ [@lapin-b](https://github.com/lapin-b)
* [View More or contribute !](https://github.com/outout14/raspmonitor/contributors)

## License
This project is under ``WTFPL`` license - view [LICENSE](https://github.com/outout14/raspmonitor/blob/master/LICENSE) file for more informations.