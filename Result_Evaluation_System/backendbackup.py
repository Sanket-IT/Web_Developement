import os
import pandas as pd
from mpl_toolkits import mplot3d
import numpy as np
import matplotlib.pyplot as plt
from sklearn import linear_model
from sklearn.metrics import accuracy_score
from sklearn.metrics import mean_squared_error
import sys
import pymysql
import csv

df= pd.read_csv("Students_Data.csv")

attandance = df['Total_Attendance_Percentage'].tolist()

Sem1_Values = df['Sem_1'].tolist()

Sem2_Values = df['Sem_2'].tolist()
Sem3_Values = df['Sem_3'].tolist()
Sem4_Values = df['Sem_4'].tolist()
Sem5_Values = df['Sem_5'].tolist()
Sem6_Values = df['Sem_6'].tolist()


reg = linear_model.LinearRegression()
temp = []
for i in range(0,len(Sem1_Values)):
  temp.append(list([Sem1_Values[i],Sem2_Values[i],Sem3_Values[i],attandance[i]]))
reg.fit(temp,Sem4_Values)


y_Dash = list(reg.predict(temp))
for i in range(len(y_Dash)):
  y_Dash[i] = int(y_Dash[i])
y = list(Sem4_Values)

accuracy_score(y, y_Dash)
print("Accuracy Score :",accuracy_score(y, y_Dash ))

print("MSE: ",mean_squared_error(y, y_Dash))


y_D = list(reg.predict([[71,82,88,90]]))
print(y_D)

v1=sys.argv[1]
mydata=v1.split()

p=mydata[0]
fc=mydata[1]
fp=mydata[2]
sc=mydata[3]
sp=mydata[4]
tc=mydata[5]
tp=mydata[6]
vp=fc+sc+tc

connection = pymysql.connect(host="localhost",user="root",passwd="root",database="revaluation")
cursor = connection.cursor()
print("Connection Establised.......")


sql = "UPDATE marks SET pp = 50 WHERE prn = %s"
record=(p)
cursor.execute(sql,record)
#mySql_insert_query = """INSERT INTO demo(prn,fcgpa,fpre,scgpa,spre,tcgpa,tpre) 
#                                VALUES (%s, %s, %s, %s, %s, %s, %s) """
#record = (p,fc,fp,sc,sp,tc,tp)
#cursor.execute(mySql_insert_query,record)
#cursor.execute(mySql_insert_query, record)
connection.commit()
connection.close()