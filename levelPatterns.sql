CREATE TABLE `levelPatterns`(
  `pattern` varchar(10) NOT NULL,
  `100` varchar(500) DEFAULT NULL,
  `250` varchar(500) DEFAULT NULL,
  `300` varchar(500) DEFAULT NULL,
  `400` varchar(500) DEFAULT NULL,
  `500` varchar(500) DEFAULT NULL,
  `1000` varchar(500) DEFAULT NULL,
  `1500` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`pattern`)
)
