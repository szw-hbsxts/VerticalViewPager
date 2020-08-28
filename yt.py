#coding=utf-8
import MySQLdb


def gfd(name,img_url,superiors,higher):

    conn= MySQLdb.connect(
        host='localhost',
        port = 3306,
        user='root',
        passwd='admin123456',
        db ='images',
        charset='utf8'
    )
    cur = conn.cursor()

    
    sql = "insert into img_name (name,img_url,superiors,higher) values(%s,%s,%s,%s)" % ("'"+name+"'","'"+",".join(img_url)+"'","'"+superiors+"'","'"+higher+"'")

    print(sql)

    #创建数据表
    #cur.execute("create table student(id int ,name varchar(20),class varchar(30),age varchar(10))")

    #插入一条数据
    cd = cur.execute(sql)

    #修改查询条件的数据
    #cur.execute("update student set class='3 year 1 class' where name = 'Tom'")

    #删除查询条件的数据
    #cur.execute("delete from student where age='9'")

    cur.close()
    conn.close()

    return cd

  

