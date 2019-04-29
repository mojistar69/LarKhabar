-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: onlinefarstelinfodb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,1,711,'شیراز','118','3333333','3333',1),(2,1,712462,'خرامه','1183542x','1183272','3272',7),(3,1,712422,'زرقان','1183532x','1183262','3262',3),(4,1,712522,'سروستان','1183522','1183784','3784',4),(5,22,712562,'کوار','1183556x','1183782','3782',9),(8,1,712722,'سپیدان','1183672x','1183672','3672',5),(10,22,792422,'قیر','1185452x','1185452','5452',11),(15,3,782522,'لامرد','1185252','1185272','5272',1000),(17,5,732522,'نی ریز','1185523','1185382','5382',13),(18,5,732553,'قطرویه','1185553','1185385','5385',1000),(19,5,732552,'مشکان','1185552','1185386','5386',1000),(20,5,732572,'اباده طشک','1185572','1185389','5389',1000),(21,6,752422,'اقلید','1184822','1184452','4452',1000),(23,6,752463,'دژکرد','1184863x','1184459','4459',1000),(24,6,752433,'حسن آباد','1184833x','1184458','4458',1000),(25,7,722422,'نوراباد','1184422','1184252','4252',1000),(26,7,722436,'مصیری','1184436','1184264','4264',1000),(27,7,722447,'خومه زار','1184447x','1184263','4263',1000),(28,11,728,'مرودشت','1184533','1184322','4322',1000),(29,11,729722,'پاسارگاد(سعادت شهر)','1184722','1184356','4356',1000),(30,11,729762,'ارسنجان','1184762','1184352','4352',1000),(31,11,728466,'کوشکک','1184652','1184345','4345',1000),(32,11,729662,'مشهدبیلو','1184662x','1184363','4363',1000),(33,11,729422,'سیدان','1184622x','1184347','4347',1000),(34,11,729663,'خانیمن','1184663','1184362','4362',1000),(36,16,782222,'گراش','1185222','1185244','5244',1000),(37,15,781,'لار','1185333','1185224','5224',1000),(38,16,791,'جهرم','1185733','1185422','5422',1000),(39,16,792322,'خفر','1185752','1185450','5450',1000),(40,16,792362,'قطب اباد','1185762','1185448','5448',1000),(41,16,791272,'دوزه','1185772x','1185446','5446',1000),(42,16,792335,'خاوران','1185735','1185451','5451',1000),(43,39,751,'اباده','1184333','1184433','4433',1000),(44,39,751233,'توابع','1184343','','',1000),(45,39,752222,'صغاد','1184342x','1184439','4439',1000),(46,39,752225,'بهمن-ایزدخواست','1184345x','1184438','4438',1000),(48,39,752236,'سورمق','1184347x','1184437','4437',1000),(49,39,752322,'بوانات','1184322x','1184440','4440',1000),(50,39,752352,'صفاشهر','1184448','1184445','4445',1000),(51,39,752365,'قادراباد','1184365','1184449','4449',1000),(52,39,752368,'دشت مرغاب','1184368','1184449','4449',1000),(53,19,722222,'قائمیه','1184244x','1184241','4241',2),(54,19,721,'کازرون','1184223','1184221','4221',1),(55,19,722262,'خشت','1184262','1184245','4245',1000),(56,19,722264,'کنار تخته','1184264x','1184244','4244',4),(57,19,722282,'نودان','1184282','1184243','4243',3),(58,19,722236,'بالاده','1184236','1184247','4247',5),(63,20,7324,'استهبان','1185322x','1185322','5322',1000),(64,20,732426,'ایج','1185426','1185329','5329',1000),(65,20,732462,'رونیز','1185462x','1185328','5328',1000),(66,31,732,'داراب','1185623x','1185352','5352',1000),(68,31,732763,'فدامی','1185693x','1185369','5369',1000),(69,31,732762,'دوبرجی','1185692','1185368','5368',1000),(70,31,732662,'رستاق','1185662','1185367','5367',1000),(71,13,73244,'زاهدشهر','1185542','1185343','5343',1000),(72,13,732322,'نوبندگان','1185536x','1185342','5342',1000),(73,13,732372,'ششده','1185562','1185346','5346',1000),(74,13,732722,'زرین دشت','1185672','1185372','5372',1000),(75,3,782536,'ده شیخ','1185257x','1185275','5275',1000),(76,3,782535,'سیگار','1185255x','1185275','5275',1000),(77,3,782542,'کندرعبدالرضا','1185254x','1185275','5275',1000),(78,3,782521,'پنگرویه','1185281x','1185277','5277',1000),(79,3,782526,'چاه ورز','1185286','1185274','5274',1000),(81,3,782525,'فاضلی','1185285x','1185274','5274',1000),(85,3,782533,'ترمان','1185253x','1185275','5275',1000),(87,3,782572,'اشکنان','1185272x','1185276','5276',1000),(88,3,782577,'اهل','1185277x','1185277','5277',1000),(89,3,782672,'علی مرودشت','1185292','1185278','5278',1000),(90,18,782652,'مهر','1185265','1185282','5282',1000),(100,18,782534,'وراوی','1185283','1185284','5284',1000),(101,18,782622,'گله دار','1185262x','1185285','5285',1000),(102,6,752462,'سده','1184862x','1184459','4459',1000),(103,15,782322,'جویم','1185322x','1185257','5257',1000),(104,15,782325,'بنارویه','1185325x','1185256','5256',1000),(105,15,782422,'بیرم','1185344','1185255','5255',1000),(106,15,782362,'اوز','1185362','1185251','5251',1000),(107,15,782452,'خنج','1185352x','1185262','5262',1000),(108,21,712662,'فراشبند','1183592x','1183875','3875',1000),(109,22,712622,'فیروزآباد','1183562','1183870','3870',1000),(110,22,712646,'میمند','1183596x','1183877','3877',1000),(112,15,782243,'عمادده','1185243x','1185243','5243',1000),(113,7,722446,'کوپن','1184446x','1184266','4266',1000),(114,7,722434,'دهنو','1184434x','1184267','4267',1000),(115,7,722432,'بابامیدان','1184432','1184267','4267',1000),(121,31,732632,'جنت شهر','1185632x','1185364','5364',1000),(122,15,782464,'فیشور','1185364x','1185254','5254',1000),(124,7,722482,'بابامنیر','1184263x','1184263','4263',1000),(126,13,731,'فسا','1185533','1185331','5331',1000),(128,18,782624,'اسیر','1185287x','1185287','5287',1000),(129,3,782374,'خیرگو','118xxxx','118xxxx','xxxx',1000),(130,44,11805373,'زیر آب','1185373x','1185373','0000',1000),(131,44,11815373,'گلوگاه','1185373x','1185373','0000',1000),(132,44,11825373,'خسویه','1185373x','1185373','0000',1000),(133,44,11835373,'ساچون','1185373x','1185373','0000',1000),(134,44,11847353,'دروا','1185373x','1185373','0000',1000),(135,44,11857353,'میانده','1185373x','1185373','0000',1000),(136,44,11805374,'دره شور','1185374x','1185374','0000',1000),(137,44,11815374,'مزایجان','1185374x','1185374','0000',1000),(138,44,11825374,'شهر پیر','1185374x','1185374','0000',1000),(140,44,11845374,'گلکویه','1185374x','1185374','0000',1000),(141,44,11855375,'دبیران','1185375x','1185375','0000',1000),(174,45,11852641,'اشنا','1185264x','1185264','0000',1000),(175,45,11852642,'باغان','1185264x','1185264','0000',1000),(176,45,11852631,'بیغرد','1185263x','1185263','0000',1000),(177,45,11852632,'سده','1185263x','1185263','0000',1000),(178,45,11852633,'سیف آباد','1185263x','1185263','0000',1000),(179,45,11852643,'محمله','1185264x','1185264','0000',1000),(180,45,11852644,'مز','1185264x','1185264','0000',1000),(181,45,11852634,'مکویه','1185263x','1185263','0000',1000),(182,45,11852645,'هفتوان','1185264x','1185264','0000',1000),(183,45,11852646,'چاه طوس','1185264x','1185264','0000',1000),(184,45,11852635,'کهنویه','1185263x','1185263','0000',1000),(185,45,11852647,'کورده خنج','1185264x','1185264','0000',1000),(186,45,11852648,'گرمشت فدوی','1185264x','1185264','0000',1000),(187,40,711,'پشتیبانی شیراز','1189999x','1189999','9999',1000),(189,1,11837860,'مهارلو','1183786x','1183786','0000',1000),(230,43,999,'شهر و كشور','0','','0',1000),(238,41,11881068,'شهرك امام-توابع قير','11881068','','0',1000),(239,7,11881069,'فهليان','11881069','','0',1000),(249,7,11881080,'مشايخ','11881080','','0',1000),(256,18,11881087,'زيغان','11881087','','0',1000),(265,44,11881097,'مزايجان_توابع زرين دشت','11881097','','0',1000),(271,7,11881104,'شيراسپاري','11881104','','0',1000),(280,7,11881113,'آهنگري','11881113','','0',1000),(303,45,11881138,'كورده خنج','11881138','','0',1000),(304,7,11881139,'حسني','11881139','','0',1000),(311,18,11881150,'نرمان','11881150','','0',1000),(317,45,11881161,'آشنا','11881161','','0',1000),(336,21,11881181,'نوجين','11881181','','0',1000),(344,3,11881189,'خيرگو','11881189','','0',1000),(355,7,11881200,'دشت آزادگان','11881200','','0',1000),(356,18,11881201,'ارودان','11881201','','0',1000),(358,7,11881203,'پهون','11881203','','0',1000),(364,7,11881210,'مراسخون','11881210','','0',1000),(366,41,11881212,'مبارك آباد','11881212','','0',1000),(373,3,11881220,'كندرعبدالر','11881220','','0',1000),(391,7,11881244,'چهارطاق','11881244','','0',1000),(414,7,11881272,'موركي','11881272','','0',1000),(417,41,11881275,'هنگام','11881275','','0',1000),(433,41,11881296,'افزرشمالي','11881296','','0',1000),(447,44,11881317,'ميانده-توابع زرين دشت','11881317','','0',1000),(453,3,11881325,'دهشيخ','11881325','','0',1000),(456,45,11881329,'بيفرد','11881329','','0',1000),(463,41,11881336,'افزرجنوبي','11881336','','0',1000),(464,7,11881337,'ده گپ','11881337','','0',1000),(467,45,11881341,'سيف آباد-توابع خنج','11881341','','0',1000),(468,7,11881342,'مهرنجان-توابع نورآباد','11881342','','0',1000),(513,41,11881393,'اسلام آباد','11881393','','0',1000),(515,44,11881395,'دهنو - توابع زرين دشت','11881395','','0',1000),(561,7,11881446,'برم سياه','11881446','','0',1000),(571,18,11881456,'خوزي','11881456','','0',1000),(572,-1,713,'شیراز','101','','0',0),(573,-1,71,'شیراز','38263119','','0',0);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-14 13:27:14