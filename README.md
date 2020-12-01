# InstallSCW.com
SanCapWeather.com is made from the scripts at Saratoga Weather. With this repository, I hope to automate putting these scripts into a docker container, making it easier for me to keep up to date and move as my server environment evolves.

The weather station is an Ambient Weather WS-2000. The console collects data from the weather station sensor array, displays it locally and sends the data every minute or so to AmbientWeather.net.  This server has open APIs and using the AWS plugin, the Saratoga Weather software nicely creates a dynamic weather web page.

This repository fetches the Saratoga weather scripts, customizes them for my weather station, and spins up a container that runs the scripts in an apache linux environment.

Clone the repository, build and run it as follows:

```
$ git clone https://github.com/jkozik/InstallSCW.com
# Optionally edit customerSettings.sh 
$ docker build -t jkozik/scw.com .
$ docker run -dit --name scw.com-app -p 8084:80 jkozik/scw.com
```
This should work, but verify it by going to a browser and try http://<ipaddr>/wxindex.php:8084

To help with troubleshooting, you'll need the following commands:
```
# shell prompt, logs, and restart needed for rebuild
$ docker exec -it scw.com-app /bin/bash
$ docker logs -f scw.com-app
$ docker stop scw.com-app; docker rm scw.com-app
```

