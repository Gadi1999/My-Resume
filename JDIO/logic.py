import mysql.connector as myconn

def insert_data(name, mobile, email):
    try:
        mydb = myconn.connect(host="localhost", user="sa", password="Gadi@1999", database="jdio")  # Replace "jdio" with your actual database name
        mycursor = mydb.cursor()

        # Call the stored procedure
        sql = "CALL InsertData(%s,%s,%s)"
        data = (name, mobile, email)
        mycursor.execute(dbo.InsertData name,mobile,email)

        mydb.commit()
        print("Data inserted successfully!")
    except Exception as e:
        print("Error:", e)
    finally:
        mycursor.close()
        mydb.close()
