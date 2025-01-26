import mysql.connector
import board
from datetime import datetime
import time
from adafruit_bme280 import basic as adafruit_bme280

import RPi.GPIO as GPIO

while True:
   GPIO.setmode(GPIO.BCM)
   i2c = board.I2C()
   bme280 = adafruit_bme280.Adafruit_BME280_I2C(i2c)
   temperature = bme280.temperature
   conn = mysql.connector.connect(
   user='root', password='cegep', host='127.0.0.1', database='FinalProjetDB')
   cursor = conn.cursor()
   nom = "jonquiere"
   date = datetime.today().strftime('%Y-%m-%d %H:%M:%S')

   sql = """INSERT INTO Temperatures (ville, temperature, date) VALUES 
   (%s, %s, %s)"""

   try:

      cursor.execute(sql,(nom,temperature, date))

      conn.commit()

   except:

      conn.rollback()

   conn.close()
   time.sleep(10)