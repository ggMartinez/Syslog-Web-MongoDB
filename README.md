# Syslog Web interface

Done with Laravel. Pretty simple web UI to view Syslog generated logs.
It uses my own Docker image with Rocky Linux, PHP 8 and Apache installed and configured.

## Database
### Preparations
The project includes a migration to create the needed table, and will start the MySQL container with the `compose.yml` file. But if you want to use an external database, just make sure that this table is created:

```sql
CREATE TABLE SystemEvents (
  ID int unsigned NOT NULL AUTO_INCREMENT,
  CustomerID bigint DEFAULT NULL,
  ReceivedAt datetime DEFAULT NULL,
  DeviceReportedTime datetime DEFAULT NULL,
  Facility smallint DEFAULT NULL,
  Priority smallint DEFAULT NULL,
  FromHost varchar(60) DEFAULT NULL,
  Message text,
  NTSeverity int DEFAULT NULL,
  Importance int DEFAULT NULL,
  EventSource varchar(60) DEFAULT NULL,
  EventUser varchar(60) DEFAULT NULL,
  EventCategory int DEFAULT NULL,
  EventID int DEFAULT NULL,
  EventBinaryData text,
  MaxAvailable int DEFAULT NULL,
  CurrUsage int DEFAULT NULL,
  MinUsage int DEFAULT NULL,
  MaxUsage int DEFAULT NULL,
  InfoUnitID int DEFAULT NULL,
  SysLogTag varchar(60) DEFAULT NULL,
  EventLogType varchar(60) DEFAULT NULL,
  GenericFileName varchar(60) DEFAULT NULL,
  SystemID int DEFAULT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB
```

Then, point the external database in the `compose.yml` file: 
```
- DB_HOST=IP
- DB_DATABASE=DB_NAME
- DB_USERNAME=username
- DB_PASSWORD=password
```
## Start
Just run `docker compose up -d` in the root of the project to start both web UI and database.
If you want to only start the web UI to use an external database, run `docker compose up -d web-ui`

If you don't want to use Docker, just install al dependencies for running Laravel by yourself. It's out of scope for this. But to put it simple, have composer and PHP 8 installed, and to just test if it will run outside Docker:
```bash
composer install
php artisan key:generate
php artisan serve
```
Not the best way to use `php artisan serve` on production, just configure Apache and/or PHP-FPM for production.

## Clients
First, install the module that allow Syslog to write to mysql databases. 
For example, rsyslog, install the package `rsyslog-mysql`:
`dnf install -y rsyslog-mysql`

Then edit `/etc/rsyslog.conf` on the servers that you want to send the logs to the database, and add this lines:
```
$ModLoad ommysql
local6.* :ommysql:DATABASE_IP,DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD`
```
Then, just restart rsyslog: `systemctl restart rsyslog`