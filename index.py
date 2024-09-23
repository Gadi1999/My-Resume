import mysql.connector as myconn

def insert_data(name, mobile, email):
    """
    Inserts data into the 'learncoding.datainsert' table.

    Args:
        name (str): The name to insert.
        mobile (str): The mobile number to insert.
        email (str): The email address to insert.
    """

    try:
        mydb = myconn.connect(host="localhost", user="root", password="Gadi@1999", database="Learncoding")
        mycursor = mydb.cursor()

        sql = "INSERT INTO learncoding.datainsert (name, mobile, email) VALUES (%s, %s, %s)"
        data = (name, mobile, email)

        mycursor.execute(sql, data)
        mydb.commit()
        print("Data inserted successfully!")
    except Exception as e:
        print("Error:", e)
    finally:
        mycursor.close()
        mydb.close()

# Access form data (assuming you're using a web framework like Flask)
if __name__ == "__main__":
    from flask import request

    name = request.form["name"]
    mobile = request.form["mobile"]
    email = request.form["email"]

    insert_data(name, mobile, email)
