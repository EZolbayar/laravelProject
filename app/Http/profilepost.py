# -- coding: utf-8 --
import facebook
import MySQLdb

def main():
  # Fill in the values noted in previous steps here
  cfg = {
    "page_id"      : "804252436331584",  # Step 1
    "access_token" : "EAACEdEose0cBAENoRBJe1M6MQ8fwQcwoBWOiOwUWKaWJf4aAGzFbSnOvymha3vVviOU77xVme6H5STIYm95aZBY8dn9mixBHPCnFYr62cdcHZCpcaU0lzNAkS2Ek9W5ivtH1sNh9D9OZBYHSNfKgqzus5ZB3KX09pXBo4ZBENJwZDZD"   # Step 3
    }

  db = MySQLdb.connect(host="127.0.0.1",    # your host, usually localhost
                     user="root",         # your username
                     passwd="123456",  # your password
                     db="portalweb")        # name of the data base

  cursor = db.cursor()
  cursor.execute("SET NAMES utf8mb4;") #or utf8 or any other charset you want to handle

  cursor.execute("SET CHARACTER SET utf8mb4;") #same as above

  cursor.execute("SET character_set_connection=utf8mb4;") #same as above
  cursor.execute("SELECT * FROM posts ORDER BY id DESC")
  db.commit()

  numrows = int(cursor.rowcount)
  for x in range(0,numrows):
      row = cursor.fetchone()
      api = get_api(cfg)
      text = row[2]
      url = "http://blog.oxbapp.com/blog/"+row[1]
      status = api.put_wall_post(message=text, attachment = {'name': text ,'link':url})
      print "DONE!"
      break
  db.close()

def get_api(cfg):
  graph = facebook.GraphAPI(cfg['access_token'])
  return graph

if __name__ == "__main__":
  main()