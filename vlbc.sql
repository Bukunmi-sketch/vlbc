
--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Bank_Name` varchar(200) DEFAULT NULL,
  `Account_Number` varchar(200) DEFAULT NULL,
  `Branch` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(128) NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `LastActivity` int(55) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `LastActiveDate` varchar(255) NOT NULL,
  `LastActiveTime` varchar(255) NOT NULL,
  `DateLastActivity` date NOT NULL,
  `Bookmarks` bigint(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `themetype` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `ip_address` double(11,2) NOT NULL,
  `browser_type` varchar(255) NOT NULL,
  `forgetid` int(55) NOT NULL,
  `forget_question` varchar(255) NOT NULL,
  `forget_answer` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `Mobile` bigint(15) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `times` date NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Date` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



--
-- Table structure for table `giving`
--

CREATE TABLE IF NOT EXISTS `giving` (
  `givingid` int(10) NOT NULL AUTO_INCREMENT,
  `Amount` varchar(100) DEFAULT NULL,
  `Trcode` varchar(100) DEFAULT NULL,
  `paytime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `na` varchar(10) DEFAULT NULL,
  `ya` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`givingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `keyu` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Birthday` varchar(100) DEFAULT NULL,
  `Residence` varchar(100) DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `ministry` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`keyu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;



--
-- Table structure for table `offering`
--

CREATE TABLE IF NOT EXISTS `offering` (
  `offeringid` int(10) NOT NULL AUTO_INCREMENT,
  `Amount` varchar(100) DEFAULT NULL,
  `Trcode` varchar(100) DEFAULT NULL,
  `paytime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `na` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`offeringid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


--
-- Table structure for table `sundays`
--

CREATE TABLE IF NOT EXISTS `sundays` (
  `keyu` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Birthday` varchar(100) DEFAULT NULL,
  `Residence` varchar(100) DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `ministry` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`keyu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



--
-- Table structure for table `teens`
--

CREATE TABLE IF NOT EXISTS `teens` (
  `keyu` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Birthday` varchar(100) DEFAULT NULL,
  `Residence` varchar(100) DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `ministry` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`keyu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `tithe`
--

CREATE TABLE IF NOT EXISTS `tithe` (
  `titheid` int(10) NOT NULL AUTO_INCREMENT,
  `Amount` varchar(100) DEFAULT NULL,
  `Trcode` varchar(100) DEFAULT NULL,
  `paytime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `na` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`titheid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(128) NOT NULL,
  `admin_id` int(128) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Birthday` varchar(100) DEFAULT NULL,
  `Residence` varchar(100) DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `ministry` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `unit_ministry` (
  `id` bigint(20) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `added_by` varchar(255)  NOT NULL,
  `updated_at` timestamp  ,
  `created_at` timestamp  ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 
     ALTER TABLE `announcement`
     ADD `active_status` varchar(255) NOT NULL;
    -- CHANGE `announcement_id` `id` int(10),
    -- CHANGE `times` `date` timestamp,
    -- ADD `typefor` varchar(255) NOT NULL;
    -- CHANGE `mobile` `mobile` bigint(10),
    -- CHANGE `id` `id` int(11);

    --   CHANGE `Residence` `residence` varchar(255),
   --     CHANGE `Birthday` `birthday` varchar(255),
    --     CHANGE `Gender` `gender` varchar(255),
    --  DROP `sname`;

   --  CHANGE `admin_id` `admin_id` bigint(10);
   --   CHANGE `keyu` `id` varchar(255);
   --   CHANGE `id` `keycore` varchar(255),
  --   CHANGE `lasttname` `lastname` varchar(255),
  --   CHANGE `thumbnail` `image` varchar(255),
  --   ADD `previous_church` varchar(255) NOT NULL;
 -- CHANGE `fname` `firstname` varchar(255),
 -- CHANGE `pob` `origin` varchar(255),
 
