-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 04:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_apply`
--

CREATE TABLE `candidate_apply` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `introduction` varchar(510) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `job_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_apply`
--

INSERT INTO `candidate_apply` (`id`, `name`, `email`, `phone`, `introduction`, `resume`, `job_id`, `user_id`, `created_on`, `update_on`, `is_active`) VALUES
(26, NULL, 'user1@gmail.com', '0983058005', '                                               \r\nKính gửi Quý Công ty Công ty TNHH FFG,\r\n\r\nTôi là: Đàm Đức,\r\n\r\nQua website techjob.vn, tôi được biết Quý công ty đang có nhu cầu tuyển dụng nhân sự cho vị trí \"Technical Leader – Up to $3000\".\r\n\r\nQua thông tin tuyển dụng công ty cung cấp, tôi tin rằng với năng lực của mình, tôi hoàn toàn đáp ứng được yêu cầu công việc của Quý công ty.\r\n\r\nVì vậy, qua techjob.vn, tôi xin nộp đơn ứng tuyển vào vị trí \"Technical Leader – Up to $3000\" của Quý công ty.\r\n\r\nTôi xin', '1615643680.', 25, 28, '2021-03-13 00:00:00', '2021-03-13 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`) VALUES
(50, 'Công Nghệ Thông Tin'),
(51, 'Kiểm thử phần mềm'),
(52, 'Quản Trị Mạng'),
(53, 'Nhân viên Marketing'),
(54, 'Thiết kế đồ họa');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `description` varchar(510) DEFAULT NULL,
  `time_begin` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `name`, `company_name`, `description`, `time_begin`, `time_end`) VALUES
(4, 'coder', 'FPT Software', NULL, '2021-02-03 00:00:00', '2021-02-27 00:00:00'),
(5, 'Thiết kế đồ họa', 'Sun*', NULL, '2021-02-11 00:00:00', '2021-02-27 00:00:00'),
(6, 'Hồ Quốc', 'FPT Software', NULL, '2021-02-20 00:00:00', '2021-02-19 00:00:00'),
(7, 'Thiết kế đồ họa 2', 'Sun*', NULL, '2021-02-03 00:00:00', '2021-02-27 00:00:00'),
(8, 'adad', 'dh', NULL, '2021-02-06 00:00:00', '2021-02-19 00:00:00'),
(9, 'Test Job', 'FPT Software', NULL, '2021-03-11 00:00:00', '2021-04-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `comment_on` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `job_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow_companies`
--

CREATE TABLE `follow_companies` (
  `id` int(6) NOT NULL,
  `company_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `saved_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(6) NOT NULL,
  `position` varchar(510) DEFAULT NULL,
  `application_email` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` varchar(1100) DEFAULT NULL,
  `amount` int(3) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `salary_min` decimal(10,0) DEFAULT NULL,
  `salary_max` decimal(10,0) DEFAULT NULL,
  `salary_unit` varchar(50) DEFAULT NULL,
  `work_time` double(10,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `deadline_for_submission` datetime DEFAULT NULL,
  `province_id` varchar(5) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  `created_by` int(6) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position`, `application_email`, `image`, `details`, `amount`, `experience`, `salary_min`, `salary_max`, `salary_unit`, `work_time`, `address`, `deadline_for_submission`, `province_id`, `created_on`, `update_on`, `created_by`, `is_active`) VALUES
(25, 'Technical Leader – Up to $3000', 'hr@fpt.com', '1615635454.jpg', '<h4>CÁC PHÚC LỢI DÀNH CHO BẠN</h4><p>Salary review on the excellent performance</p><p>Annual Summer Vacation: follows the company’s policy and starts from May every year</p><p>International, dynamic, friendly working environment</p><h4>MÔ TẢ CÔNG VIỆC</h4><p>_ Ít nhất 10 năm kinh nghiệm trong lĩnh vực software</p><p>_ 5 năm làm vị trí SA</p><p>_ Nắm rõ các kiến thức nền tảng với các layer từ Hardware =&gt; OS =&gt; Infra =&gt; Application System, Middleware =&gt; Application</p><p>_ Nắm rõ cách thức hoạt ', 45, 6, '2500', '3000', '$', 8.00, 'Bình Thạnh, Hồ Chí Minh', '2021-11-28 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1'),
(37, 'Embedded Software Engineer (C/C++, Autosar, Bsw) – Up to 2000 ', 'chunam47@gmail.com', '1615636152.jpg', '<p>CÁC PHÚC LỢI DÀNH CHO BẠN</p><p>Lương tháng 13, thưởng dự án hàng tháng, thưởng kỳ nghĩ hàng năm, bảo hiểm từ FPT Care</p><p>Tăng lương và cấp bậc theo kì kiểm tra năng lực hàng năm</p><p>Có cơ hội đi onsite tại Singapore, Malaysia, Mỹ, Nhật Bản, châu Âu…;</p><p>MÔ TẢ CÔNG VIỆC</p><p>• You will take part in multi-million project for high-profile customer, which are automotive industry</p><p>• You will design solution for embedded software used in a car such as AUTOSAR software.</p><p>• You have a great career advance to expand your horizon not only in automotive industry but also the international working experience.</p><p>• You will work with the team to design, implement and verify software based on AUTOSAR architecture and methodology.</p><p>• BSW development. Phase 1: Diagnostic module design and demo DID</p><p><br></p><p>Quantity : 20</p><p>Position type : Full time</p><p>YÊU CẦU CÔNG VIỆC</p><p>• At least 2 years’ experience in programming in C, Embedded system development</p><p>• 2 or more years of experience in the development, configuration, or testing of any of the follo', 3, 3, '1000', '1500', '$', 8.00, 'Tăng Nhơn Phú A, TP Thủ Đức', '2021-03-26 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1'),
(51, 'Business Analyst Customer Experience', 'hr@momo.com', '1615637307.png', '<p><span style=\"background-color: transparent;\">MÔ TẢ CÔNG VIỆC</span><br></p><p>You will take an important role to maintain user experiences. More particularly, you need to observe and ensure all the operation processes meet the requirements and standards from the Customer Excellence Experience & Business Unit Departments. With the high responsibility, this position would take remarkable ownership in decision making to resolve user problems.</p><p><br></p><p>• Monitor & Measure the day to day the product performance (Funnels, transactions, customer services) to ensure swift customer experience at all stage of the customer journey.</p><p><br></p>', 3, 4, '700', '1500', '$', 8.00, 'Ha Noi', '2021-06-11 00:00:00', '1', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 27, b'1'),
(52, 'Marketing Analytics Manager (Data/ Campaign/Performance)', 'chunam47@gmail.com', '1615637530.png', '<p>- Develop an overall growth strategy and plan to achieve key business results for assigned product lines</p><p><br></p><p>- Lead the execution of major projects and overall activities, including (but not limited to) marketing activities (Digital, PR, social, OOH), promotion programs, product feedback &amp; optimization (working with Technology center)</p><p><br></p><p>- Collaborate with other business units and departments to understand and together drive the achievement of their business targets</p><p><br></p><p>- Lead and coach the execution team, including marketing and growth specialists</p><p><br></p><p>YÊU CẦU CÔNG VIỆC</p><p>Strong experience in marketing, product development, data analytics, or market research</p><p><br></p><p>Strong understanding of usercentricity concepts</p><p><br></p><p>Demonstrated enthusiasm with technology products</p><p><br></p><p>Resultsdriven and able to deliver results under high pressure</p><p><br></p><p>Excellent communication and teamwork skills</p><p><br></p><p>Attention to details and excellent executional capabilities</p><p><br></p><p>THÔN', 8, 4, '1000', '1500', '$', 8.00, 'Hồ Chí Minh', '2021-05-11 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 27, b'1'),
(53, 'Senior Product Executive (Investment/Online Saving)', 'thanhphat@gmail.com', '1615637762.png', '<p>· Own investment product from concept through launch, along with future iteration on the MoMo e-wallet platform</p><p><br></p><p>· Connect with the e-wallet customers to identify insights to drive decisions</p><p><br></p><p>· Utilize research and analytic to build delightful and innovative products</p><p><br></p><p>· Overseeing development stages and evaluate product progress at each iteration</p><p><br></p><p>· Defining vision and anticipate client needs to deliver relevant Investment Products</p><p><br></p><p>YÊU CẦU CÔNG VIỆC</p><p>·       Minimum Qualifications:</p><p><br></p><p>-        Bachelor’s degree required</p><p><br></p><p>·       Experience:</p><p><br></p><p>-        3+ years of experience in Investment product or relevant areas developing Investment- products, driving products improvement and adding new features</p><p><br></p><p>-        Prefers candidates who have experience in the product lines that relevant to e-wallet users such as Investment, e-wallet Investment, ', 1000, 3, '700', '1500', '$', 8.00, 'Nhà Thành Phát, TP Thủ Đức', '2021-03-11 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 27, b'1'),
(54, 'Data Analyst Team Leader (Big Query/Statistics)', 'fakerfaker@gmail.com', '1615638011.png', '<p>&nbsp;Define key metrics and their relationship to measure business success</p><p>· Define, create, and maintain dashboards to review operational efficiencies and drive decisioning quality</p><p>throughout business and other partner departments</p><p>· Work with cross-functional partners to design and execute controlled experiments to quantify the effects of</p><p>product changes.</p><p>· Help our business partners understand metric trade-offs and drive influential decisions.</p><p>· Partner with Heads of various business units, to provide deep-dive analysis report &amp; recommendation on</p><p>service performance, highlight any trends, patterns or changes that may impact overall conversion of specific</p><p>strategic business use cases</p><p>· Manage the end-to-end delivery of given analytical project</p><p>· Ad-hoc Reporting Data Analysis duties or other responsibilities when required</p><p><br></p><p>· Ability to mentor and lead other Junior/Senior Data Analyst</p>', 3, 1, '1000', '1500', '$', 8.00, 'Bạc Liêu', '2021-03-19 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 27, b'1'),
(55, '15 Embedded Software Engineers (C++)', 'chunam47@gmail.com', '1615638328.jpg', '<p>In the business division Electronics you will be working with the software development team for body electronics control units.</p><p><br></p><p>Design, develop &amp; test product-specific software of automotive body electronics module &amp; system over the entire product development cycle;</p><p>Apply model based development on a distributed embedded system;</p><p>Work on SW-architecture, write, test and debug code according to software requirement specification and the defined process;</p><p>Discuss with customer about specific solution for body electronics modules &amp; system, including function implementation and system interface;</p><p>Complete software module test report and integration test report according to test result;</p><p>Coach assistant and engineer in technical issue;</p><p>Take part in the interview process;</p><p>Other job assigned by Department Manager.</p><p>Yêu Cầu Công Việc</p><p>Bachelor degree or above, with major in Computer Science, Computer Engineering, Electrical Engineering or Mechatronics;</p><p>More than 5 years’ experience in Embedded System;</p><p', 15, 3, '1000', '0', '$', 4.00, 'Thanh Xuan, Ha Noi', '2021-03-25 00:00:00', '1', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 30, b'1'),
(56, 'Embedded Software Engineer (C/C++)', 'chunam47@gmail.com', '1615638420.jpg', '<p>Developing and implementing a wide range of low-level embedded software (including device driver, Linux kernel modules, network stack development, porting existing software to new embedded platforms, and other low level programming activities), as well as the development of application software running on Linux OS.</p><p>Design, develop, code, test and debug system software.</p><p>Review code and design.</p><p>Analyze and enhance efficiency, stability and scalability of system resources.</p><p>Integrate and validate new product designs.</p><p>Support software QA and optimize I/O performance.</p><p>Interface with hardware design and development.</p><p>Assess third party and open source software.</p>', 1000, 7, '1000', '1500', '$', 8.00, 'ĐÀ NẴNG', '2021-03-27 00:00:00', '48', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 12, b'1'),
(57, 'Senior Automotive Embedded System (C++)', 'fakerfaker@gmail.com', '1615638602.jpg', '<p>Job Description Your responsibilities include:</p><p><br></p><p>Join in Automotive Embedded System project</p><p>Analysis Software / Hardware Requirement</p><p>Establish Software Design</p><p>Implement Source Code</p><p>&nbsp;</p><p><br></p><p>Yêu Cầu Công Việc</p><p>Qualifications</p><p><br></p><p>3+ years of working experience in Automotive Embedded System</p><p>Major in Computer Engineering/ Electrical-Electronics/ Electronics-Telecommunication/Mechatronics Engineering or related fields</p><p>Good C/C++ programming and scripting language.</p><p>Good knowledge of Microcontroller with device driver and Embedded System</p><p>Experience with Hardware Manual, Schematic, and Data sheet.</p><p>Experience with Automotive communication protocol (SPI/CAN/LIN/Flexray/Ethernet)</p><p>Experience with AUTOSAR architecture, espically AUTOSAR MCAL</p><p>Experience with Software Development Lifecycle.</p><p>Experience with Functional Safety concept and method</p><p>Experience with Automotive SPICE, CMMI is a plus</p><p>Experience with emulators, simulators, debugging and test equipment.</p><p>E', 3, 2, '1000', '1500', '$', 8.00, 'Thanh Xuan, Ha Noi', '2021-03-17 00:00:00', '1', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `job_career`
--

CREATE TABLE `job_career` (
  `id` int(6) NOT NULL,
  `job_id` int(6) DEFAULT NULL,
  `career_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_career`
--

INSERT INTO `job_career` (`id`, `job_id`, `career_id`) VALUES
(19, 25, 50),
(30, 37, 50),
(44, 51, 50),
(45, 52, 50),
(46, 53, 50),
(47, 54, 50),
(48, 55, 50),
(49, 56, 50),
(50, 57, 50);

-- --------------------------------------------------------

--
-- Table structure for table `messages_from_employers`
--

CREATE TABLE `messages_from_employers` (
  `id` int(6) NOT NULL,
  `company_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(510) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `seen` bit(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  `created_by` int(6) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `thumbnail`, `content`, `created_on`, `update_on`, `created_by`, `is_active`) VALUES
(39, 'Những lý do ứng viên không đến buổi phỏng vấn.', 'Những lý do ứng viên không đến buổi phỏng vấn', '1615644610.png', '<p>Dành cả thanh xuân để đợi ứng viên tới phỏng vấn, nhưng đôi lúc các HR cũng ngán ngẩm khi ứng viên “bùng” phỏng vấn mà không một lý do. Rốt cuộc, điều gì đã khiến cho ứng viên không tới phỏng vấn dù đã hẹn? Hãy cùng TimViecNhanh.com tìm hiểu về vấn đề này ngay nhé.</p><p><br></p><p>Những điều nhà tuyển dụng cần lưu ý khi sử dụng các trang Web để tìm ứng viên.</p><p>6 kỹ năng quan trọng mà nhà tuyển dụng cần có ở ứng viên.</p><p>1. Ứng viên quên thời gian của cuộc phỏng vấn</p><p>Đây là lý do phổ biến nhất mà các HR nhận được từ ứng viên. Có một vài lý do dẫn đến việc này, có thể là ứng viên cũng đang rất bận rộn với công việc của họ hoặc vô vàn những lý do cá nhân khác nhau. Nhưng nếu có thể, các HR hoặc ứng viên nên gọi xác nhận lại với nhau trước để có có một buổi phỏng vấn diễn ra tốt đẹp.</p><p><br></p><p><br></p><p>Ứng viên quên thời gian của cuộc phỏng vấn</p><p>2. Do bận việc đột xuất</p><p>Cũng có nhiều ứng viên vắng mặt tại buổi phỏng vấn vì lý do bạn việc đôt xuất. Nếu rơi vào trường hợp này, ứng viên thường sẽ chủ động gọi điện thông báo trước cho HR. Tuy nhiên trong một số ít trường hợp vì bận rộn quá nên ứng viên không thể gọi điện hoặc gửi mail thông báo cho HR về lý do do vắng mặt của họ. Nhưng nếu HR nhận thấy ứng viên này có đủ tiêu chí và tiềm năng cho công ty thì HR cũng có thể liên hệ lại cho ứng viên và linh hoạt đề xuất dời lịch phỏng vấn sang một buổi khác.</p><p><br></p><p>3. Ứng viên đã nhận lời mời làm việc ở một công ty khác.</p><p>Đây là điều dễ hiểu đối với những ứng viên giỏi và nhiều kinh nghiệm trong công việc. Việc công ty bạn phải cạnh tranh với vô vàn “đối thủ” khác ngoài kia để “giành” ứng viên về cho công ty mình là việc khá gian nan, bởi với một môi trường làm việc tốt hơn, thu nhập cao hơn thì có lẽ việc ứng viên nhận lời đầu quân cho công ty khác là điều vô cùng dễ hiểu.</p><p><br></p><p><br></p><p>Ứng viên đã nhận lời mời làm việc ở một công ty khác.</p><p> </p><p><br></p><p>Tóm lại, sẽ có rất nhiều lý do để một ứng viên “bùng” khỏi cuộc phỏng vấn. Nhưng vì bất kì một lý do gì đi chăng nữa, ứng viên cũng nên thông báo trước cho HR để cả 2 bên cùng chủ động sắp xếp công việc phù hợp. Tránh gây nhầm lẫn và làm mất thời gian của nhau nhé.</p>', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1'),
(40, '6 cách giúp bạn duy trì cảm xúc tích cực trong công việc', '6 cách giúp bạn duy trì cảm xúc tích cực trong công việc', '1615642261.png', '<p>Trong công việc, hãy nhớ rằng bạn sẽ không bao giờ duy trì được cảm xúc vui vẻ, nhiệt huyết mỗi ngày. Đôi lúc bạn phải chấp nhận những tâm trạng tồi tệ có thể xuất hiện vì áp lực, stress. Vậy làm thế nào để thoát khỏi tâm trạng “tụt mood” và nhanh chóng lấy lại hứng khởi trong công việc. Dưới đây là một vài cách “bỏ túi” giúp bạn có thể kiểm soát cảm xúc của mình một cách tốt nhất.</p><p><br></p><p>5 lưu ý ứng viên cần chuẩn bị trước buổi phỏng vấn</p><p>5 kỹ năng mềm “bỏ túi” cho ứng viên mới tốt nghiệp</p><p>1. Ngủ một giấc ngắn</p><p>Một giấc ngủ ngắn là cứu cánh vô cùng hữu hiệu cho bạn ngay lúc này. Chúng tôi khuyên bạn nên sắp xếp thời gian chợp mắt hợp lý trong khoảng từ 20 đến 30 phút sao cho đầu óc và cơ thể bạn có thể được thư giãn nghỉ ngơi. Thậm chí nếu bạn chợp mắt 20 phút thôi cũng đã tăng sự tỉnh táo và cải thiện tâm trạng rồi đấy. Chỉ cần bạn đảm bảo sắp xếp lịch chợp mắt ít nhất 6 giờ trước khi đi ngủ để không cản trở giấc ngủ đêm.</p><p><br></p><p>2. Dành một chút thời gian dạo bên ngoài</p><p>Đi bộ vào sáng sớm là một cách dễ dàng để đón ánh bình minh và khi tiếp xúc với ánh sáng mặt trời, cơ thể bạn có thể hấp thụ thêm vitamin D giúp bạn tránh khỏi tâm trạng xấu và bắt đầu một ngày mới tràn đầy năng lượng tích cực, vui vẻ. Đi dạo dưới ánh nắng mặt trời không chỉ củng cố chu kỳ ngủ – thức của bạn mà còn là cách để bạn cảm thấy tràn đầy năng lượng và lạc quan hơn trong cuộc sống.</p><p><br></p><p>3. Gọi cho một người bạn hoặc trò chuyện với một người lạ</p><p>Các nghiên cứu gần đây cho thấy ngay cả những tương tác cá nhân nhỏ nhất cũng có thể thúc đẩy tâm trạng của bạn. Nếu bạn đang cảm thấy chán nản, hãy nhấc điện thoại lên và gọi cho một người bạn trong vài phút sẽ giúp bạn đánh lạc hướng cảm xúc tồi tệ và có thể khiến bạn cảm thấy nhẹ nhõm và phấn chấn hơn sau đó. Nhưng ngay cả khi bạn không có thời gian để trò chuyện với một người bạn, những tương tác đơn giản như mỉm cười với nhân viên bán cà phê vào buổi sáng hoặc chào một người hàng xóm cũng có thể khiến bạn cảm thấy tinh thần tốt hơn.</p><p><br></p><p><br></p><p>Gọi điện cho bạn bè</p><p>4. Bỏ mạng xã hội và tạm rời xa các thiết bị điện tử</p><p>Một thực tế được chỉ ra rằng mạng xã hội không phải là phương tiện tốt nhất để cải thiện sức khỏe tinh thần hoặc thúc đẩy tâm trạng của bạn. Nếu bạn đang cảm thấy chán nản hoặc cáu kỉnh, hãy cất điện thoại đi và cố gắng xả stress mà  không cần đến dùng đến công nghệ.</p><p><br></p><p>5. Thử dùng tinh dầu thơm</p><p>Mùi hương là một trong những giác quan mạnh nhất của chúng ta và có liên kết trực tiếp đến cảm xúc, đó là lý do vì sao liệu pháp hương thơm rất hữu ích trong việc điều hòa cảm xúc của bạn. Nếu bạn cần thư giãn, bạn hãy thử sử dụng các mùi hương tinh dầu như: mùi hoa oải hương, cam bergamot, chanh hoặc cam quýt.</p><p><br></p><p><br></p><p>Dùng tinh dầu thơm để thư giãn</p><p>6. Tập thể dục</p><p>Tập thể dục là một trong những cách tốt nhất để giảm bớt căng thẳng và thúc đẩy tâm trạng bạn trở nên tích cực hơn. Khi bạn tập thể dục, cơ thể sẽ giải phóng endorphin, hay còn được gọi là “hormone tạo cảm giác”. Những hormone này loại bỏ cảm giác lo lắng và trầm cảm và khơi gợi cảm giác vui vẻ, hạnh phúc.</p><p><br></p><p>Một số nhà nghiên cứu thậm chí còn cho rằng việc giải phóng các hormone này có thể thúc đẩy bằng thói quen tập thể dục, vì những người đang gặp căng thẳng rất cần một “lối thoát” để chuyển nguồn năng lượng tiêu cực của họ thành nguồn năng lượng tích cực tốt đẹp.</p>', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1'),
(41, 'Những điều nhà tuyển dụng cần lưu ý khi sử dụng các trang Web để tìm ứng viên.', 'Những điều nhà tuyển dụng cần lưu ý khi sử dụng các trang Web để tìm ứng viên.', '1615642337.png', '<p>Các trang web việc làm trên Internet đang được sử dụng rộng rãi bởi cả nhà tuyển dụng và người lao động. Với rất nhiều lựa chọn và rất nhiều người sử dụng các trang web này, các nhà tuyển dụng cần phải cẩn thận khi sử dụng chúng để tuyển cộng sự mới. Vì tất cả chúng đều có 2 mặt lợi và hại. Tuy nhiên, có nhiều điều cần cân nhắc khi làm như vậy và người sử dụng lao động phải nhận thức được bất kỳ thiếu sót tiềm ẩn nào khi sử dụng Internet để tuyển dụng nhân viên mới.</p><p><br></p><p>Những lý do ứng viên không đến buổi phỏng vấn</p><p>6 kỹ năng quan trọng mà nhà tuyển dụng cần có ở ứng viên.</p><p>1.Số lượng lớn hồ sơ</p><p>Khi bạn sử dụng các trang web việc làm trên Internet để xác định vị trí ứng viên, bạn sẽ nhận được hàng trăm, hàng nghìn hồ sơ xin việc. Hầu hết các hồ sơ này sẽ là từ các ứng viên không đủ tiêu chuẩn cho vị trí được quảng cáo và sẽ nhanh chóng bị loại. Tuy nhiên, việc loại bỏ những người đủ tiêu chuẩn khỏi ứng viên không đủ tiêu chuẩn cần nhiều thời gian và nỗ lực, và ai đó trong công ty của bạn phải xem xét những hồ sơ xin việc này. Nhiều công ty sử dụng các sản phẩm phần mềm để sàng lọc những hồ sơ xin việc này để tìm thông tin cần thiết, nhưng khi làm điều đó, bạn có nguy cơ loại bỏ một người thực sự có năng lực cần được xem xét.</p><p><br></p><p><br></p><p>Chọn lọc số lượng hồ sơ của ứng viên</p><p>2.Ứng viên có thực sự quan tâm không?</p><p>Nhiều ứng viên sử dụng chiến thuật là gửi càng nhiều hồ sơ xin việc thì cơ hội của họ càng cao. Cơ hội tuyển dụng của bạn có thể chỉ là một trong số rất nhiều hồ sơ mà họ gửi đến và trên thực tế, ứng viên có thể không thực sự quan tâm đến vị trí đang tuyển dụng của công ty bạn.</p><p><br></p><p>3.Sơ yếu lý lịch phù hợp</p><p>Nhiều ứng viên đã học cách nhanh chóng điều chỉnh sơ yếu lý lịch của họ để đáp ứng các tiêu chuẩn công việc mà bạn đăng trong tin tuyển dụng. Các cá nhân hiểu biết về kỹ thuật có thể nhanh chóng sắp xếp các từ, thuật ngữ và bằng cấp quan trọng nhất từ ​​vị trí đang tuyển dụng của bạn và nhanh chóng điều chỉnh sơ yếu lý lịch của họ nhằm đáp ứng yêu cầu công việc của doanh nghiệp đề ra. Vì vậy các nhà tuyển dụng cần phải lưu ý kiểm tra kỹ càng trước khi chọn ứng viên.</p><p><br></p><p><br></p><p>Chất lượng sơ yếu lý lịch</p><p>4.Thông tin tuyển dụng không phải lúc nào cũng hiển thị tốt nhất trên các website</p><p>Một số vị trí đang tuyển dụng của doanh nghiệp bạn rất chuyên biệt và khá mới mẻ nên không có trang web việc làm nào trên Internet có thể mang đến cho bạn những người có đủ năng lực. Nhiều trang web lớn trên Internet không đủ điều chỉnh để thu thập và chọn lọc ứng viên phù hợp cho bạn. Các trang web này thường được sử dụng bởi các ứng viên đầu vào hoặc các cá nhân có kinh nghiệm chung hoặc hạn chế. Nếu bạn đang tìm kiếm một giám đốc điều hành tiếp thị có kinh nghiệm với các kết nối quốc tế, rất có thể bạn sẽ không thấy vì không phải lúc nào thông tin tuyển dụng của bạn cũng sẽ được nổi trên trang chủ tìm kiếm.</p>', '2021-03-13 00:00:00', '2021-03-13 00:00:00', 26, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `comment_on` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `post_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(6) NOT NULL,
  `tag_id` varchar(100) DEFAULT NULL,
  `post_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`) VALUES
(141, 'tim-viec', 40),
(142, 'tuyen-dung', 41),
(151, 'tuyen-dung', 39),
(152, 'kinh-nghiem', 39);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` varchar(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `type`) VALUES
('1', 'Thành phố Hà Nội', 'Thành phố Trung ương'),
('10', 'Tỉnh Lào Cai', 'Tỉnh'),
('11', 'Tỉnh Điện Biên', 'Tỉnh'),
('12', 'Tỉnh Lai Châu', 'Tỉnh'),
('14', 'Tỉnh Sơn La', 'Tỉnh'),
('15', 'Tỉnh Yên Bái', 'Tỉnh'),
('17', 'Tỉnh Hoà Bình', 'Tỉnh'),
('19', 'Tỉnh Thái Nguyên', 'Tỉnh'),
('2', 'Tỉnh Hà Giang', 'Tỉnh'),
('20', 'Tỉnh Lạng Sơn', 'Tỉnh'),
('22', 'Tỉnh Quảng Ninh', 'Tỉnh'),
('24', 'Tỉnh Bắc Giang', 'Tỉnh'),
('25', 'Tỉnh Phú Thọ', 'Tỉnh'),
('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
('27', 'Tỉnh Bắc Ninh', 'Tỉnh'),
('30', 'Tỉnh Hải Dương', 'Tỉnh'),
('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
('33', 'Tỉnh Hưng Yên', 'Tỉnh'),
('34', 'Tỉnh Thái Bình', 'Tỉnh'),
('35', 'Tỉnh Hà Nam', 'Tỉnh'),
('36', 'Tỉnh Nam Định', 'Tỉnh'),
('37', 'Tỉnh Ninh Bình', 'Tỉnh'),
('38', 'Tỉnh Thanh Hóa', 'Tỉnh'),
('4', 'Tỉnh Cao Bằng', 'Tỉnh'),
('40', 'Tỉnh Nghệ An', 'Tỉnh'),
('42', 'Tỉnh Hà Tĩnh', 'Tỉnh'),
('44', 'Tỉnh Quảng Bình', 'Tỉnh'),
('45', 'Tỉnh Quảng Trị', 'Tỉnh'),
('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
('49', 'Tỉnh Quảng Nam', 'Tỉnh'),
('51', 'Tỉnh Quảng Ngãi', 'Tỉnh'),
('52', 'Tỉnh Bình Định', 'Tỉnh'),
('54', 'Tỉnh Phú Yên', 'Tỉnh'),
('56', 'Tỉnh Khánh Hòa', 'Tỉnh'),
('58', 'Tỉnh Ninh Thuận', 'Tỉnh'),
('6', 'Tỉnh Bắc Kạn', 'Tỉnh'),
('60', 'Tỉnh Bình Thuận', 'Tỉnh'),
('62', 'Tỉnh Kon Tum', 'Tỉnh'),
('64', 'Tỉnh Gia Lai', 'Tỉnh'),
('66', 'Tỉnh Đắk Lắk', 'Tỉnh'),
('67', 'Tỉnh Đắk Nông', 'Tỉnh'),
('68', 'Tỉnh Lâm Đồng', 'Tỉnh'),
('70', 'Tỉnh Bình Phước', 'Tỉnh'),
('72', 'Tỉnh Tây Ninh', 'Tỉnh'),
('74', 'Tỉnh Bình Dương', 'Tỉnh'),
('75', 'Tỉnh Đồng Nai', 'Tỉnh'),
('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
('8', 'Tỉnh Tuyên Quang', 'Tỉnh'),
('80', 'Tỉnh Long An', 'Tỉnh'),
('82', 'Tỉnh Tiền Giang', 'Tỉnh'),
('83', 'Tỉnh Bến Tre', 'Tỉnh'),
('84', 'Tỉnh Trà Vinh', 'Tỉnh'),
('86', 'Tỉnh Vĩnh Long', 'Tỉnh'),
('87', 'Tỉnh Đồng Tháp', 'Tỉnh'),
('89', 'Tỉnh An Giang', 'Tỉnh'),
('91', 'Tỉnh Kiên Giang', 'Tỉnh'),
('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
('93', 'Tỉnh Hậu Giang', 'Tỉnh'),
('94', 'Tỉnh Sóc Trăng', 'Tỉnh'),
('95', 'Tỉnh Bạc Liêu', 'Tỉnh'),
('96', 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Table structure for table `report_post_comment`
--

CREATE TABLE `report_post_comment` (
  `id` int(6) NOT NULL,
  `content` varchar(510) DEFAULT NULL,
  `comment_id` int(6) DEFAULT NULL,
  `report_by` int(6) DEFAULT NULL,
  `report_on` datetime NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(6) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`) VALUES
(2, 'Administrator', 'Admin role'),
(3, 'Blogger', 'Content Blogger of this site'),
(6, 'Client', 'Client role is default role for all users'),
(7, 'Recruitment', 'Human Resoursing');

-- --------------------------------------------------------

--
-- Table structure for table `save_jobs`
--

CREATE TABLE `save_jobs` (
  `id` int(6) NOT NULL,
  `job_id` int(6) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `saved_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(510) DEFAULT NULL,
  `level` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
('', ''),
('kinh-nghiem', 'kinh nghiệm'),
('tim-viec', 'tìm việc'),
('tuyen-dung', 'tuyển dụng');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `user_id` int(6) DEFAULT NULL,
  `role_id` int(6) DEFAULT NULL,
  `id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`user_id`, `role_id`, `id`) VALUES
(12, 2, 1),
(26, 7, 28),
(27, 7, 29),
(28, 6, 30),
(29, 6, 31),
(30, 7, 32),
(31, 6, 33),
(32, 7, 34),
(33, 6, 35);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(5) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(510) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `url_avatar` varchar(255) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `phone`, `first_name`, `last_name`, `full_name`, `date_of_birth`, `gender`, `address`, `url_avatar`, `is_active`) VALUES
(12, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 3, '0983244336', 'Admin', 'Nam', 'Nam admin', '1999-02-23 19:26:42', b'0', 'Buôn Ma Thuật', '1615640620.png', b'1'),
(26, 'faker@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 'Faker', 'Faker', 'Faker Faker', NULL, NULL, NULL, '1615640612.png', b'1'),
(27, 'hr2@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 'Thành', 'Phát', 'Phát Trâm', NULL, NULL, NULL, '1615640612.png', b'1'),
(28, 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '', 'Duc', 'Dam', 'Duc Bui Vien', NULL, NULL, NULL, '1615640612.png', b'1'),
(29, 'user2@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '', 'Khoi', 'Thanh', 'Khoi Mai Tram', NULL, NULL, NULL, '', b'1'),
(30, 'hr3@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 'Quốc', 'Hồ', 'Quốc Xóm Chiếu', NULL, NULL, NULL, '', b'1'),
(31, 'namcoi2302@gmail.com', '46c725505b59d12036f1edfc55bff0ed', 3, '0983244336', 'Nam', 'Chu', 'Chu Nam', NULL, NULL, NULL, NULL, b'1'),
(32, 'fakerfaker@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, 'Đăng', 'Tạ Minh', 'Tạ Minh Đăng', NULL, NULL, NULL, '1615638220.png', b'1'),
(33, 'chunam47@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '0983244336', 'Nam', 'Chu Văn', 'Chu Văn Nam', NULL, NULL, NULL, '1615640620.png', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `detail` varchar(510) DEFAULT NULL,
  `image_logo` varchar(255) DEFAULT NULL,
  `image_cover` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `province_id` varchar(5) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_company`
--

INSERT INTO `user_company` (`id`, `name`, `detail`, `image_logo`, `image_cover`, `address`, `website`, `size`, `province_id`, `contact_name`, `is_active`, `user_id`) VALUES
(9, 'FPT Software', NULL, '1615631551.jpg', NULL, 'Hoà Hải, Ngũ Hành Sơn, Đà Nẵng 550000', NULL, NULL, '48', 'Chu Nam', b'1', 26),
(10, 'Mo Mo', NULL, '1615632020.png', NULL, 'Phường Tân Phú, Quận 7, Thành phố Hồ Chí Minh', NULL, NULL, '79', 'Thành Phát', b'1', 27),
(12, 'Faker Dev', NULL, NULL, NULL, 'TP Thủ Đức', NULL, NULL, '79', 'Tạ Minh Đăng', b'1', 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `experience_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `skill_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_apply`
--
ALTER TABLE `candidate_apply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `follow_companies`
--
ALTER TABLE `follow_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `job_career`
--
ALTER TABLE `job_career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `career_id` (`career_id`);

--
-- Indexes for table `messages_from_employers`
--
ALTER TABLE `messages_from_employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_post_comment`
--
ALTER TABLE `report_post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `report_by` (`report_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experience_id` (`experience_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_apply`
--
ALTER TABLE `candidate_apply`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `follow_companies`
--
ALTER TABLE `follow_companies`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `job_career`
--
ALTER TABLE `job_career`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `messages_from_employers`
--
ALTER TABLE `messages_from_employers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `report_post_comment`
--
ALTER TABLE `report_post_comment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `save_jobs`
--
ALTER TABLE `save_jobs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_apply`
--
ALTER TABLE `candidate_apply`
  ADD CONSTRAINT `candidate_apply_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `candidate_apply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `follow_companies`
--
ALTER TABLE `follow_companies`
  ADD CONSTRAINT `follow_companies_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `user_company` (`id`),
  ADD CONSTRAINT `follow_companies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `job_career`
--
ALTER TABLE `job_career`
  ADD CONSTRAINT `job_career_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `job_career_ibfk_2` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`);

--
-- Constraints for table `messages_from_employers`
--
ALTER TABLE `messages_from_employers`
  ADD CONSTRAINT `messages_from_employers_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `user_company` (`id`),
  ADD CONSTRAINT `messages_from_employers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `report_post_comment`
--
ALTER TABLE `report_post_comment`
  ADD CONSTRAINT `report_post_comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `post_comment` (`id`),
  ADD CONSTRAINT `report_post_comment_ibfk_2` FOREIGN KEY (`report_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD CONSTRAINT `save_jobs_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `save_jobs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `userrole_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_company`
--
ALTER TABLE `user_company`
  ADD CONSTRAINT `user_company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD CONSTRAINT `user_experiences_ibfk_1` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`),
  ADD CONSTRAINT `user_experiences_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
