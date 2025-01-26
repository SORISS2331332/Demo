#!/bin/bash

sudo systemctl start apache2
cd ProjetPython

PID_PYTHON=$(pgrep -f 'python3 script.py')

if [ -z "$PID_PYTHON" ]; then
    python3 script.py &
else
    sudo kill $PID_PYTHON 
    python3 script.py &
fi

echo "Lancement de python"

cd ..

cd ProjetWeb/ProjetWeb

PID=$(sudo lsof -t -i :8080)

# Vérifier si un processus a été trouvé
if [ -z "$PID" ]; then
    sudo php -S localhost:8080 -t public
else
    sudo kill $PID
    sudo php -S localhost:8080 -t public
fi

