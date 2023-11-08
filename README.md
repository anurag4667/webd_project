# webd_project
mysql> desc user;
+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| userid   | varchar(255) | NO   | PRI | NULL    |       |
| password | varchar(255) | YES  |     | NULL    |       |
| name     | varchar(255) | YES  |     | NULL    |       |
| email    | varchar(255) | YES  |     | NULL    |       |
| phoneno  | bigint       | YES  |     | NULL    |       |
+----------+--------------+------+-----+---------+-------+

===== user schema ====

mysql> desc messages
    -> ;
+---------------+--------------+------+-----+---------+-------+
| Field         | Type         | Null | Key | Default | Extra |
+---------------+--------------+------+-----+---------+-------+
| user1         | varchar(255) | YES  | MUL | NULL    |       |
| user2         | varchar(255) | YES  | MUL | NULL    |       |
| message       | text         | YES  |     | NULL    |       |
| dateofmessage | datetime     | YES  |     | NULL    |       |
+---------------+--------------+------+-----+---------+-------+

===== messages table schema ========
