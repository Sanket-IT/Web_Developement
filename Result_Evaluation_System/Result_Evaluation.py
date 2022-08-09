import joblib
def evaluation(sem1_marks,sem2_marks,sem3_marks , sem1_attands, sem2_attands, sem3_attands):
    filename = r"""E:\xamp\htdocs\revaluation\finalized_model.sav""" #change this dependng on your path
    loaded_model = joblib.load(filename)
    result =loaded_model.predict([[sem1_marks,sem2_marks,sem3_marks , sem1_attands, sem2_attands, sem3_attands]])
    print(result)
    return result
result=evaluation(67,78,76,54,67,87)
print(result[0][0])