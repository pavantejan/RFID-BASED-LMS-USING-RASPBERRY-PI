
#!/usr/bin/env python


import time
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import mysql.connector

db = mysql.connector.connect(
  host="localhost",
  user="library",
  passwd="admin",
  database="library"
)

cursor = db.cursor()
reader = SimpleMFRC522()
print("Place Card")

try:
    while True:
        #print("Place Card")
        id, text = reader.read()
        text=text.strip()
        #print(id,text,id)
        cursor.execute("SELECT rfid,name FROM dummy")
        x=cursor.fetchall()
        #print(len(x),text=="student",text=='student',type(text))
        x1=[item.strip() for i in x for item in i]
        if len(x)==0 and (text =='student' or text=='admin'):
            x1="insert into dummy(rfid,name) values(%s,%s)"
            cursor.execute(x1,(id,text))
            print(text,"Inserted")
        elif text=="book" and "student" in x1 and str(id) not in x1:
            x1="insert into dummy(rfid,name) values(%s,%s)"
            cursor.execute(x1,(id,text))
            print(text,"Inserted")
        elif text=="" and "admin" in x1 and str(id) not in x1:
            x1="insert into dummy(rfid,name) values(%s,%s)"
            cursor.execute(x1,(id,text))
            print("Empty rfid chip is inserted")
        db.commit()
        time.sleep(10)
finally:
  GPIO.cleanup()

