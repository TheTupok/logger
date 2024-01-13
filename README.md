This project implements the Logger class

Two routers have been implemented. File and database. We can add several routers (to be able to log in several places at the same time)

The logger is inherited from PSR-3.

In the testLogger.php file you can see how the logger works (but first you need to create a table in the database and fill in the host, login, password, databasename and tableName fields to work with the database).
