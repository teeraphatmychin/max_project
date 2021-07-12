-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 03:49 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_advertise`
--

CREATE TABLE `tb_advertise` (
  `ad_id` int(11) NOT NULL,
  `ad_img` text NOT NULL,
  `ad_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_advertise`
--

INSERT INTO `tb_advertise` (`ad_id`, `ad_img`, `ad_text`) VALUES
(1, 'http://everyday.max/travelblog/public/file/images/15673145480.jpg', ' ทดสอบข้อความโฆษณา');

-- --------------------------------------------------------

--
-- Table structure for table `tb_amphur`
--

CREATE TABLE `tb_amphur` (
  `amphur_id` int(11) NOT NULL,
  `amphur_name` text NOT NULL,
  `amphur_eng_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_amphur`
--

INSERT INTO `tb_amphur` (`amphur_id`, `amphur_name`, `amphur_eng_name`) VALUES
(1, 'อำเภอบางกระทุ่ม', 'bang_krathum'),
(2, 'อำเภอบางระกำ', 'bang_rakam'),
(3, 'อำเภอชาติตระการ', 'chat_trakan'),
(4, 'อำเภอเมืองพิษณุโลก', 'mueang_phitsanulok'),
(5, 'อำเภอนครไทย', 'nakhon_thai'),
(6, 'อำเภอเนินมะปราง', 'noen_maprang'),
(7, 'อำเภอพรหมพิราม', 'phrom_phiram'),
(8, 'อำเภอวังทอง', 'wang_thong'),
(9, 'อำเภอวัดโบสถ์', 'wat_bot');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_us` text NOT NULL,
  `contact_advertise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `contact_us`, `contact_advertise`) VALUES
(1, 'บริษัท Travelbolg จำกัดมหาชน\r\nที่อยู่ 75/5 หมู่ 3 ต.ท่าโพธิ์ อ.เมือง จ.พิษณุโลก 65000', 'เบอร์โทร : 081-8345678\r\nE-mail : travekblog@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_contact`
--

CREATE TABLE `tb_customer_contact` (
  `cc_id` int(11) NOT NULL,
  `cc_name` text NOT NULL,
  `cc_email` text NOT NULL,
  `cc_subject` text NOT NULL,
  `cc_detail` text NOT NULL,
  `cc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_customer_contact`
--

INSERT INTO `tb_customer_contact` (`cc_id`, `cc_name`, `cc_email`, `cc_subject`, `cc_detail`, `cc_date`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'asdf', '2019-09-01 06:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_homepage`
--

CREATE TABLE `tb_homepage` (
  `home_id` int(11) NOT NULL,
  `home_name_img` text NOT NULL,
  `home_content` text NOT NULL,
  `home_img` text NOT NULL,
  `link_focus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_homepage`
--

INSERT INTO `tb_homepage` (`home_id`, `home_name_img`, `home_content`, `home_img`, `link_focus`) VALUES
(1, 'ถนนคนเดิน', 'สถานที่ท่องเที่ยว 9 อำเภอ', 'http://everyday.max/travelblog/public/file/images/15672899730.jpg', 'attractions'),
(2, 'Amarin Lagoon Hotel', 'ที่พัก 9 อำเภอ', 'http://everyday.max/travelblog/public/file/images/accommodation/mueang_phitsanulok/Amarin_Lagoon_Hotel.jpg', 'accommodation'),
(3, 'ก๋วยเตี๋ยวโชคอำนวย (เกียมอี๋)', 'รัานอาหาร', 'http://everyday.max/travelblog/public/file/images/restaurant/mueang_phitsanulok/ก๋วยเตี๋ยวโชคอำนวย_เกียมอี๋.jpg', 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `tb_place`
--

CREATE TABLE `tb_place` (
  `place_id` int(11) NOT NULL,
  `place_name` text NOT NULL,
  `place_img` text NOT NULL,
  `place_detail` text NOT NULL,
  `place_type` text NOT NULL,
  `amphur_id` int(11) NOT NULL,
  `place_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_place`
--

INSERT INTO `tb_place` (`place_id`, `place_name`, `place_img`, `place_detail`, `place_type`, `amphur_id`, `place_status`) VALUES
(1, 'น้ำตกชาติตระการ', 'http://everyday.max/travelblog/public/file/images/15672868330.jpg', 'อุทยานแห่งชาติน้ำตกชาติตระการ เป็นอุทยานแห่งชาติลำดับที่ 55 ของ ประเทศไทย พื้นที่โดยทั่วไปของอุทยานฯ เป็นเทือกเขาและภูเขาสูง เป็นแหล่งต้นน้ำของแม่น้ำหลายสาย เช่น แม่น้ำภาค และแม่น้ำแควน้อย นอกจากนี้แนวเทือกเขาส่วนใหญ่ยังเป็นภูเขาหินทราย ซึ่งเป็นต้นกำเนิดของดินในบริเวณนี้ด้วย ส่งผลให้ป่าไม้ในแถบนี้เป็นป่าเต็งรัง และป่าดิบเขาเป็นส่วนใหญ่ สถานที่ท่องเที่ยวในเขตอุทยานฯ เป็นน้ำตกที่เกิดจากความสมบูรณ์ของป่า', 'attraction', 5, 'slide_home'),
(2, 'ผาชูธง', 'http://everyday.max/travelblog/public/file/images/background/ผาชูธง.jpg', 'ผาชูธงเป็นจุดชมทิวทัศน์ที่มีความสวยงาม สามารถมองเห็นทัศนียภาพโดยรอบได้ถึง 360 องศา ในช่วงปลายฤดูฝน – ฤดูหนาว นักท่องเที่ยวจำนวนไม่น้อยจะยอมตื่นตั้งแต่รุ่งสางแล้วเดินทางมายังผาชูธงแห่งนี้เพื่อรอชมความงดงามของทะเลหมอกในยามเช้า ภาพของสายหมอกสีขาวบางเบาซึ่งแผ่ขยายปกคลุมไปทั่วผืนป่าสีเขียวขจีเบื้องล่างเป็นสิ่งที่ทำให้ใครต่อใครหลาย ๆ คนตั้งใจอดทนลุกขึ้นจากที่นอนพร้อม ๆ กับถ่างตาฝ่าความยากลำบากออกมาเก็บเกี่ยวช่วงเวลาแห่งความประทับใจนี้เอาไว้ในเลนส์กล้องและความทรงจำ', 'attraction', 5, 'slide_home'),
(3, 'ลานหินแตก', 'http://everyday.max/travelblog/public/file/images/background/ลานหินแตก.jpg', 'ลานหินแตก ตั้งอยู่ในเขต อุทยานแห่งชาติภูหินร่องกล้า ซึ่งอยู่บนรอยต่อของสามจังหวัด คือ อำเภอด่านซ้าย จังหวัดเลย อำเภอนครไทย จังหวัดพิษณุโลก และ อำเภอหล่มสัก จังหวัดเพชรบูรณ์  เป็นพื้นที่ที่มีความสมบูรณ์ทางธรรมชาติและสวยงามแปลกตา อากาศหนาวเย็นเกือบตลอดปี ยิ่งในฤดูหนาว อุณหภูมิจะต่ำประมาณ 4 องศาเซลเซียส ฤดูร้อนอากาศจะเย็นสบาย ในฤดูฝนจะมีฝนตกชุก อุณหภูมิเฉลี่ยทั้งปี ประมาณ 18-25 องศาเซลเซียส', 'attraction', 5, 'slide_home'),
(4, 'เซ็นทรัลพลาซา พิษณุโลก', 'http://everyday.max/travelblog/public/file/images/63524834.jpg', 'โครงการตั้งอยู่ในจังหวัดพิษณุโลกซึ่งถือเป็นศูนย์กลางทางธุรกิจของภาคเหนือตอนล่าง โดยเป็นจุดเชื่อมต่อระหว่างภาคกลาง ภาคเหนือ และประเทศในแถบอินโดจีน อันได้แก่ สาธารณรัฐประชาชนจีน สาธารณรัฐประชาธิปไตยประชาชนลาว สาธารณรัฐสังคมนิยมเวียดนาม และสหภาพพม่า ซึ่งเป็นไปตามนโยบายของภาครัฐที่ส่งเสริมให้เป็นเส้นทางเศรษฐกิจจากทิศตะวันออกสู่ทิศตะวันตกของประเทศไทย (East-West Economic Corridor) นอกจากนี้ ด้วยการคมนาคมที่สะดวก ระบบสาธารณูปโภคที่ครบครัน และการขยายตัวของประชากรและกำลังซื้อของจังหวัดพิษณุโลกและ 6 จังหวัดรายล้อมทำให้โครงการเซ็นทรัลพลาซา พิษณุโลกพร้อมที่จะเติบโตไปกับเศรษฐกิจที่ยั่งยืนของภูมิภาค', 'attraction', 4, ''),
(6, 'หมู่บ้านเศรษฐกิจพอเพียงต้นแบบ บ้านบางกระน้อย', 'http://everyday.max/travelblog/public/file/images/15672815780.jpg', '  ดำเนินการมาตั้งแต่ปี 2547   ภายไต้ สภาพปัญหาหนี้สินที่ราษฎรประสบอยู่ ที่เกิดจากการใช้จ่ายฟุ่มเฟือย  ปัญหาภัยธรรมชาติน้ำท่วม ภัยแล้งขาดการเก็บออม ฯลฯ  ค้นหาหนี้สิน  เข้าเวทีประชาคม นำมาพูดคุยกันหลาย ๆ ครั้ง  เอาผู้นำไปรับความรู้ด้านเศรษฐกิจพอเพียงจากภายนอก และเอาความรู้เข้าไปให้ราษฎร จนเข้าใจ ประชาคมบ่อย ๆ  ทำจนสำเร็จระดับที่หนี้สินลดลง มีกิจกรรมเศรษฐกิจพอเพียงมากมายที่สามารถลดรายจ่ายเพิ่มรายได้                  ส่วนราชการสำนักงานพัฒนาชุมชนอำเภอบางกระทุ่ม เห็นความสำเร็จจึงส่งเข้าประกวดหมู่บ้านเศรษฐกิจพอเพียง อยู่ดีมีสุข ปี 2550 และชนะเลิศการประกวดอันดับ 1  และคณะกรรมการและผู้นำเข้าเฝ้าสมเด็จพระเทพรัชราชสุดาสยามบรมราชกุมารี ปี 2551  จากนั้นผู้นำก็ได้รับรางวัลต่าง ๆ มากมาย และนำองค์ความรู้เข้ามาสู่ชุมชนอยู่ตลอดเวลา', 'attraction', 1, ''),
(7, 'วัดกำแพงมณี', 'http://everyday.max/travelblog/public/file/images/15672816930.jpg', 'ในพื้นที่ อ.บางกระทุ่ม นั้น หากจะเอ่ยถึงวัดกำแพงมณี ซึ่งตั้งอยู่ใน ต.โคกสลุด อ.บางกระทุ่ม จ.พิษณุโลก ต่างทราบกันดีว่าวัดกำแพงมณี เป็นศูนย์กลางแหล่งเพาะบ่มจริยธรรมและศีลธรรม รวมทั้งเป็นศูนย์รวมของพุทธศาสนิกชน ที่จะเข้ามาเรียนรู้ศึกษาธรรมะ ปฏิบัติธรรมกันเป็นประจำ นอกจากจะเป็นวัดที่ส่งเสริมกิจกรรมทางพุทธศาสนาแล้ว วัดกำแพงมณียังเป็นสถานที่ศึกษาค้นคว้าหาความรู้ในด้านอื่นได้อีกมากมาย  ตลอดทั้งมีการก่อตั้ง', 'attraction', 1, ''),
(8, 'ที่ว่าการอำเภอบางกระทุ่มหลังเก่า', 'http://everyday.max/travelblog/public/file/images/15672817670.jpg', 'นายสมศักดิ์ รอดวินิจ หัวหน้าสำนักปลัดเทศบาลตำบลบางกระทุ่ม กล่าวว่า เดิมทีที่ว่าการอำเภอบางกระทุ่มหลังเก่าแห่งนี้ อยู่ในความรับผิดชอบของอำเภอบางกระทุ่ม แต่หลังจากได้สร้างที่ว่าการอำเภอบางกระทุ่มหลังใหม่ และมีการย้ายการทำงานออกไปแล้วเกือบ 10 ปี ทำให้ที่ว่าการอำเภอหลังเก่า ได้เริ่มทรุดโทรมลง เนื่องจากมีอายุประมาณ 90 ปี หรือ อยู่ในยุคของพระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัวฯ รัชกาลที่ 5 แต่ก็ยังคงความสวยงามเป็นเอกลักษณ์ของยุคเก่า ทำให้ทางเทศบาลตำบลบางกระทุ่ม ได้ทำเรื่องขออาคารที่ว่าการอำเภอหลังนี้ นำมาดูแลและจะทำการปรับปรุงให้มีสภาพคงทนสวยงาม พร้อมที่จะพัฒนาเป็นแหล่งเรียนรู้ของคนในชุมชน อาจจะทำให้เป็นพิพิธภัณฑ์ท้องถิ่น พร้อมตกแต่งให้กลายเป็นแหล่งท่องเที่ยวอีกแห่งหนึ่งของอำเภอบางกระทุ่ม และของจังหวัดพิษณุโลก ต่อไป', 'attraction', 1, ''),
(9, 'สวนน้ำสแปลชฟัน', 'http://everyday.max/travelblog/public/file/images/15672841500.jpg', 'สวนน้ำสำหรับการพักผ่อน เหมาะกับ ทุกเพศ ทุกวัย ไม่ว่าคุณจะมาเป็นกลุ่ม หรือเดี่ยวก็สามารถสนุกเพลิดเพลินไปกับเครื่องเล่นนานาชนิด บนพื้นที่กว่า 60 ไร่ ที่สแปลช ฟัน ปาร์ค พิษณุโลก เปิดบริการทุกวัน เวลา 11.00-18.00น.', 'attraction', 2, ''),
(10, 'สันติบันเทิง รีสอร์ท', 'http://everyday.max/travelblog/public/file/images/15672871240.jpg', 'สันติบันเทิง รีสอร์ท อ.บางกระทุ่ม พิษณุโลก โทร. 093-9373804 โรงแรม ที่พัก', 'accommodation', 1, ''),
(11, 'ก๋วยเตี๋ยวห้อยขาริมน่าน', 'http://everyday.max/travelblog/public/file/images/15672873850.jpg', '  ร้านก๋วยเตี๋ยวห้อยขาริมน่าน ถือเป็นร้านอร่อย ชื่อดังประจำจังหวัดพิษณุโลก เลยล่ะครับ ตั้งอยู่ไม่ไกลจากวัดพระศรีมหาธาตุ ที่นี่มีจุดเด่นอยู่ตรงสูตรก๋วยเตี๋ยวต้มยำแท้ๆ จากสุโขทัย แถมยังมีลูกเล่นตรงที่การนั่งห้อยขา ทานก๋วยเตี๋ยวอีกด้วย เรียกได้ว่าถ้าหากมาเยือนเมือพิษณุโลก ต้องห้ามพลาดที่นี่เด็ดขาด', 'restaurant', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restaurant`
--

CREATE TABLE `tb_restaurant` (
  `res_id` int(11) NOT NULL,
  `res_name` text NOT NULL,
  `res_img` text NOT NULL,
  `amphur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_souvenir_shop`
--

CREATE TABLE `tb_souvenir_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` text NOT NULL,
  `shop_detail` text NOT NULL,
  `shop_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_souvenir_shop`
--

INSERT INTO `tb_souvenir_shop` (`shop_id`, `shop_name`, `shop_detail`, `shop_img`) VALUES
(1, 'ร้าน น.จิตร', 'โทรศัพท์ : 0-5525-8992\r\nเปิด : ทุกวัน 8.00 น. - 18.00 น.\r\n', 'http://everyday.max/travelblog/public/file/images/15672964970.jpg'),
(2, 'ร้านบิ๊กแบงค์', 'ที่อยู่ : วัดพระศรีรัตนมหาธาตุ\r\n\r\nเปิด : ทุกวัน 8.00 น. - 18.00 น.', 'http://everyday.max/travelblog/public/file/images/15672918520.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tradition`
--

CREATE TABLE `tb_tradition` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tradition`
--

INSERT INTO `tb_tradition` (`id`, `name`, `content`, `img`) VALUES
(4, 'ประเพณีทรงน้ำพระพุทธชินราช', 'ประเพณีทรงน้ำพระพุทธชินราช   พระพุทธชินราชเป็นพระพุทธรูปสำคัญ บ้านคู่เมือง ที่ชาวพิษณุโลกยึดถือเป็นที่พึ่งทางใจ   ชาวพิษณุโลกจะพากันมาสรงน้ำพระพุทธชินราช   เพื่อความเป็นสิริมงคลในวันตรุษสงกรานต์ ซึ่งตรงกับวันที่ 13-15 เมษายน ของทุกปี ', 'http://everyday.max/travelblog/public/file/images/15673019830.jpg'),
(5, 'งานแผ่นดินสมเด็จพระนเรศวรมหาราชและกาชาดพิษณุโลก', 'วันที่ 1 - 31 ม.ค. 2562 ณ หน้าศาลากลางจังหวัดพิษณุโลกอำเภอเมือง จังหวัดพิษณุโลก ลักษณะของงานเป็นการนำเสนอของดีของแต่ละอำเภอ และการออกร้านสลากกาชาดนิทรรศการหน่วยงานต่างๆ การแสดงแสงสีเสียงเทิดพระเกียรติฯการแสดงศิลปวัฒนธรรมการจำหน่ายสินค้า OTOP สินค้าราคาถูกจากโรงงานและการแสดงคอนเสิร์ตจากศิลปิน', 'http://everyday.max/travelblog/public/file/images/15673021080.jpg'),
(7, 'ประเพณีแข่งเรือยาว', 'การแข่งเรือยาวเป็นสัญลักษณ์อย่างหนึ่งของจังหวัดพิษณุโลก สืบทอดมาเป็นเวลาช้านานจนกระทั่งปัจจุบัน จัดขึ้นในช่วงเดือนตุลาคม ของทุกปี ภายในงานมีทั้งขบวนแห่ถ้วยพระราชทานไปตามถนนสายต่างๆ และขบวนแห่ถ้วยพระราชทานทางน้ำ พิธีทอดผ้าป่าเรือยาว และถวายผ้าห่มหลวงพ่อพระพุทธชินราช การประกวดกองเชียร์พื้นบ้าน โดยมีเรือยาวชื่อดังมากมาย เข้าร่วมการแข่งขันชิงเจ้าลำน้ำน่าน อีกทั้งการประกวดขบวนเรือ การแข่งเรือยาวประเพณี และมีการประดับขบวนเรือยาวต่างๆ สวยงามตระการตามากคะ แถมยังสนุกสุดๆ เลยคะ', 'http://everyday.max/travelblog/public/file/images/15673025570.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_advertise`
--
ALTER TABLE `tb_advertise`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tb_amphur`
--
ALTER TABLE `tb_amphur`
  ADD PRIMARY KEY (`amphur_id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tb_customer_contact`
--
ALTER TABLE `tb_customer_contact`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `tb_homepage`
--
ALTER TABLE `tb_homepage`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `tb_place`
--
ALTER TABLE `tb_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tb_souvenir_shop`
--
ALTER TABLE `tb_souvenir_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tb_tradition`
--
ALTER TABLE `tb_tradition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_advertise`
--
ALTER TABLE `tb_advertise`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_amphur`
--
ALTER TABLE `tb_amphur`
  MODIFY `amphur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_customer_contact`
--
ALTER TABLE `tb_customer_contact`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_homepage`
--
ALTER TABLE `tb_homepage`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_place`
--
ALTER TABLE `tb_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_restaurant`
--
ALTER TABLE `tb_restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_souvenir_shop`
--
ALTER TABLE `tb_souvenir_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tradition`
--
ALTER TABLE `tb_tradition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
