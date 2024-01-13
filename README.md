This project implements the Logger class

Two routers have been implemented. File and database. We can add several routers (to be able to log in several places at the same time)

The logger is inherited from PSR-3.

In the testLogger.php file you can see how the logger works (but first you need to create a table in the database and fill in the host, login, password, databasename and tableName fields to work with the database).

Example when running testLogger.php
![image](https://github.com/TheTupok/logger/assets/65355616/f3719eb8-1aba-4b73-abc1-73e51050102f)
![image](https://github.com/TheTupok/logger/assets/65355616/b18febbc-6588-4ba9-a8cd-ee6e0345bbe6)
