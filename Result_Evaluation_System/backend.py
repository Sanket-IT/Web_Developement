import joblib
import pandas as pd
from mpl_toolkits import mplot3d
import numpy as np
import matplotlib.pyplot as plt
from sklearn import linear_model
from sklearn.metrics import accuracy_score
from sklearn.metrics import mean_squared_error
import sys
import pymysql

def evaluation(sem1_marks,sem2_marks,sem3_marks , sem1_attands, sem2_attands, sem3_attands, sem4_attands):
    filename = r"""E:\xamp\htdocs\revaluation\finalized_model.sav""" #change this dependng on your path
    loaded_model = joblib.load(filename)
    result =loaded_model.predict([[sem1_marks,sem2_marks,sem3_marks , sem1_attands, sem2_attands, sem3_attands ,sem4_attands]])
    print(result)
    return result
print("Done")


v1=sys.argv[1]
mydata=v1.split()

p=mydata[0]
fc=mydata[1]
fp=mydata[2]
sc=mydata[3]
sp=mydata[4]
tc=mydata[5]
tp=mydata[6]
fop=mydata[7]
resultf=evaluation(fc,sc,tc,fp,sp,tp,fop)
connection = pymysql.connect(host="localhost",user="root",passwd="root",database="revaluation")
cursor = connection.cursor()
print("Connection Establised.......")

sql = "UPDATE marks SET pp = %s WHERE prn = %s"
record=(resultf[0][0],p)
cursor.execute(sql,record)
connection.commit()
connection.close()



