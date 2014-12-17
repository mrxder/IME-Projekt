Gehe wie beim Tutorial (https://www.youtube.com/watch?v=4eleVKVQqiM) vor, endere aber die mpd.config so ab wie ich sie gepostet 
habe damit wir die gleichen einstellungen benutzen. 

installiere apache2 und php. Die php dateien liegen auf meinem Pi unter /home/pi/php.

in der apache configurations datei unter /etc/apache2/sites-enabled musst du natürlich den document root pfrad so abändern dass er zum Verzeichnis /home/pi/php zeigt. Und anschliesend apache neu starten mit "service apache2 restart".
