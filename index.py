import mysql.connector as myconn

def insert_data(name, mobile, email):
  mydb = myconn.connect(host="localhost", user="root", password="Gadi@1999", database="Learncoding")
  mycursor = mydb.cursor()

  sql = "INSERT INTO your_table_name (name, mobile, email) VALUES (%s, %s, %s)"
  data = (name, mobile, email)

  try:
    mycursor.execute(sql, data)
    mydb.commit()
    print("Data inserted successfully!")
  except Exception as e:
    print("Error:", e)
  finally:
    mycursor.close()
    mydb.close()

# Access form data
if __name__ == "__main__":
  name = request.form["name"]  # Access data using request.form dictionary
  mobile = request.form["mobile"]
  email = request.form["email"]

  insert_data(name, mobile, email)
