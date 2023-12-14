CREATE DATABASE  IF NOT EXISTS `grocery` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `grocery`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: grocery
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customerId` int NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'0985834023','ngoquocanuet@gmail.com','An','Ngô Quốc','An123'),(2,'0987237300','phuongminh1990@gmail.com','Phương','Nguyễn Minh','Phuong1990'),(3,'0377184018','quocan2004tp@gmail.com','Vuong','Nguyễn Quốc','An2004tp'),(4,'0123456789','nvquang18092000@gmail.com','Quang','Nguyễn Vinh','Quangnv1234'),(5,'0985835019','laihuyen@gmail.com','Huyên','Lại Thu','Huyenn'),(6,'0975423969','tva2004hn@gmail.com','Anh','Thân Việt','tvaexe'),(8,'0979865012','ngotrancanh@gmail.com','Cảnh','Ngô Trần','NTCanh'),(9,'0993456789','tanvd2k4@gmail.com','Tấn','Vũ Đức','Tan'),(10,'0969459213','linhsocute@gmail.com','Linh','Bùi Phương','Linhcute'),(11,'0878666555','22026515@vnu.edu.vn','Dang','Tien Dung','Dungexe'),(13,'0123456987','quocan2005@gmail.com','An','Phạm Quốc','APQ2005'),(14,'0321456798','22026544@vnu.edu.vn','Anh','Hoàng Việt','TVA'),(15,'0987654321','abc12345tp@gmail.com','Linh','Hoàng Phương','LinhHP'),(125,'0987237306','22025515@vnu.edu.vn ','Hoang','Thi Phuong','htpps12');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customerdetail`
--

DROP TABLE IF EXISTS `customerdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customerdetail` (
  `customerId` int NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zipCode` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `howDidYouHear` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `identificationNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`customerId`),
  CONSTRAINT `customerdetail_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customerdetail`
--

LOCK TABLES `customerdetail` WRITE;
/*!40000 ALTER TABLE `customerdetail` DISABLE KEYS */;
INSERT INTO `customerdetail` VALUES (1,'58/45/10, Trần Bình, Mai Dịch, Cầu Giấy, Hà Nội','122801','2004-05-12','M','Internet',19,'034204114329'),(2,'1005/10, Đường Láng, Đống Đa, Hà Nội','116000','2003-01-12','F','Ti vi',23,'034204214329'),(3,'Số 90, tòa HH3C, chung cư Linh Đàm, Hoàng Mai, Hà Nội','128501','1980-12-10','M','Tờ rơi',43,'038204560120'),(4,'Số 18, khu đô thị Chu Văn An, tp Thái bình, tỉnh Thái Bình','410000','1999-08-04','M','Bạn bè',24,'039655239142'),(5,'xã Hải An, huyện Hải Hậu, tỉnh Nam Định','428200','1975-09-12','F','Người thân',49,'043625239178'),(6,'xã Đức Thượng, huyện Hoài Đức, Hà Nội','152920','2002-11-10','M','Ti vi',21,'037945823610'),(8,'322/76/18, Mỹ Đình 1, Nam Từ Liêm, Hà Nội','12015','2005-04-14','M','Bạn bè',18,'044209376341'),(9,'Km 12, Hải Tiến, Móng cái, Quảng Ninh','206945','1970-12-28','M','Ti vi',53,'028945972103'),(10,'24/7, Cát Bi, Hải An, Hải Phòng','04807','1993-07-15','F','Radio',30,'074209180321'),(11,'Thai Binh','23333','2006-05-12','M','radio',18,'037945823610'),(13,'Số 5/40/58, Trần Cung, Mai Dịch, Cầu Giấy, Hà Nội','122801','2005-01-10','M','Internet',18,'035208004852'),(14,'Số 1005/01/01, đường Láng, Đống Đa, Hà Nội','12','2002-01-07','M','Internet',21,'038304450221'),(15,'Số 38/45, Trần Bình, Mai Dịch, Cầu Giấy, Hà Nội','23333','2000-01-10','F','Internet',23,'038209332215'),(125,'Số 12/51, Quang Trung, Vũ Thư, Thái Bình','120567','1999-01-01','M','Báo giấy',30,'034205004852');
/*!40000 ALTER TABLE `customerdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employeeId` int NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `hireDate` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `identificationNumber` varchar(20) DEFAULT NULL,
  `officeId` int DEFAULT NULL,
  PRIMARY KEY (`employeeId`),
  KEY `officeId` (`officeId`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`officeId`) REFERENCES `office` (`officeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Ngô Ánh','Manager','2005-04-01',30.00,50,'034219549825',1),(2,'John Doe','Developer','2022-02-15',15.00,45,'046123981654',1),(3,'Robert Miller ','Sales Executive','2022-05-05',10.00,20,'024984518941',1),(4,'Michael Johnson','Sales Executive ','2022-02-15',10.00,19,'098461654894',1),(5,'Sarah Williams','Sales Executive','2022-05-05',10.00,23,'046548941236',1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `office` (
  `officeId` int NOT NULL,
  `officeName` varchar(50) DEFAULT NULL,
  `officeAddress` varchar(100) DEFAULT NULL,
  `officePhone` varchar(15) DEFAULT NULL,
  `numberOfStaff` int DEFAULT NULL,
  PRIMARY KEY (`officeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office`
--

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` VALUES (1,'Grocery store Ha Noi','140 Xuân Thủy, Cầu Giấy, Hà Nội',NULL,5);
/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetail` (
  `orderId` int NOT NULL,
  `productId` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `requiredDate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `shippedDate` date DEFAULT NULL,
  `paymentMethod` varchar(20) DEFAULT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL,
  `officeId` int DEFAULT NULL,
  
  PRIMARY KEY (`orderId`,`productId`),
  KEY `productId` (`productId`),
  KEY `officeId` (`officeId`),
  
  CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`officeId`) REFERENCES `office` (`officeId`)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
-- INSERT INTO `orderdetail` VALUES (3,1,1,'2020-01-01','shipping','2021-01-01','Tiền mặt',180.00,1,1),(3,3,10,'2023-11-09','shipping','2023-11-06','banking',546.00,1,3),(4,1,15,'2023-12-30','Shipped','2023-12-29','Tiền mặt',250.00,1,4),(1100,1,50,'2023-11-09','shipping','2023-11-06','banking',546.00,1,5),(1100,1001,20,'2023-12-10','shipping','2023-12-09','banking card',600.00,1,3);
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderId` int NOT NULL,
  `orderDate` date DEFAULT NULL,
  `customerId` int DEFAULT NULL,
  `productId` int DEFAULT NULL,
  `employeeId` int DEFAULT NULL,
  PRIMARY KEY (`orderId`),
  KEY `customerId` (`customerId`),
  KEY `employeeId` (`employeeId`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
  CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
-- INSERT INTO `orders` VALUES (3,'2023-01-01',2,1),(4,'2023-07-27',1,1),(1100,'2023-11-07',9,1001);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `productId` int NOT NULL,
  `productType` varchar(30) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `quantityInStock` int DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'hải sản ','cá hồi tươi ngon ','loại 1 từ Na Uy',25.00,90),(3,'hải sản','cá ngừ','nhập khẩu từ nhật bản',30.00,40),(10,'hải sản','mực ống','nhập khẩu từ nhật bản',10.00,200),(12,'thịt tươi','thịt bò kobe (loại 1)','nhập trực tiếp từ tỉnh kobe ( nhật bản)',60.00,24),(1001,'hoa quả','vải thiều ','được sản xuất ở tỉnh bắc Giang phía bắc việt nam',3.00,3000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productdetails`
--

DROP TABLE IF EXISTS `productdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productdetails` (
  `productId` int NOT NULL,
  `produceDate` date DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `qualitySold` int DEFAULT NULL,
  `assessment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productdetails`
--

LOCK TABLES `productdetails` WRITE;
/*!40000 ALTER TABLE `productdetails` DISABLE KEYS */;
INSERT INTO `productdetails` VALUES (1,'2023-12-01','2023-12-05',30,NULL),(12,'2004-01-01','2100-01-01',12,NULL),(1001,'2023-05-25','2023-07-19',3000,NULL);
/*!40000 ALTER TABLE `productdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `supplierId` int NOT NULL,
  `contactName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `supplierName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Công Ty thành nam','Thanhnamfood010203@gmail.com','0971001002','Công ty Thực Phẩm Thành Nam Food'),(2,'CP Việt Nam','sale.cpfoods.vn@gmail.com','02866808989','Công ty Cổ phần Chăn nuôi C.P. Việt Nam'),(3,'ACE Foods','info@acefoods.vn','02437832562','Công ty Cổ phần Thực phẩm Thiên Vương ');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supply`
--

DROP TABLE IF EXISTS `supply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supply` (
  `supplyId` int NOT NULL,
  `supplierId` int DEFAULT NULL,
  `productId` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `supplyDate` date DEFAULT NULL,
  `totalCost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`supplyId`),
  KEY `supplierId` (`supplierId`),
  KEY `fk_productId` (`productId`),
  CONSTRAINT `fk_productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  CONSTRAINT `supply_ibfk_1` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supply`
--

LOCK TABLES `supply` WRITE;
/*!40000 ALTER TABLE `supply` DISABLE KEYS */;
INSERT INTO `supply` VALUES (1,1,1,10,'2020-01-01',300.00),(2,1,3,10,'2022-01-01',100.00),(3,1,10,100,'2022-01-01',100.00),(4,1,12,12,'2022-01-01',200.00),(8,1,1,11,'2023-12-07',860.00),(9,1,1,11,'2023-11-11',320.00),(10,2,1001,3000,'2023-05-13',150.00),(17,1,1,12,'2023-11-08',330.00),(50,1,1,5646,'2023-11-08',215.00);
/*!40000 ALTER TABLE `supply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'grocery'
--

--
-- Dumping routines for database 'grocery'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-11 21:29:00
