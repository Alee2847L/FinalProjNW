CREATE TABLE `nw202101`.`clientes` (
  `clientid` BIGINT(15) NOT NULL AUTO_INCREMENT,
  `clientname` VARCHAR(120) NULL,
  `clientgender` CHAR(3) NULL,
  `clientphone1` VARCHAR(255) NULL,
  `clientphone2` VARCHAR(255) NULL,
  `clientemail` VARCHAR(255) NULL,
  `clientIdnumber` VARCHAR(45) NULL,
  `clientbio` VARCHAR(5000) NULL,
  `clientstatus` CHAR(3) NULL,
  `clientdatecrt` DATETIME NULL,
  `clientusercreates` BIGINT(10) NULL,
  PRIMARY KEY (`clientid`));
