import psycopg2
import psycopg2.extras

# Try to connect

try:
    conn=psycopg2.connect(dbname='Project1', user='postgres', password='cs2102demo', host='127.0.0.1', port=5432)
except:
    print "I am unable to connect to the database."

cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
try:
    cur.execute("""SELECT * from schema_table""")
except:
    print "I can't SELECT from schema_table"

rows = cur.fetchall()
for row in rows:
    print "   ", row[1][1]
