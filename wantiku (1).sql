-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-17 15:56:04
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wantiku`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `name` varchar(32) NOT NULL,
  `content` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`id`, `img`, `name`, `content`, `time`) VALUES
(1, '7386.jpg', '版权声明', '万题库所有真题的版权归考试机构所有。其余全部内容，包括并不限于题目解析、报告和其他图形、图片、文字信息、音频、视频、软件、程序以及网页版式设计、编排等均归本公司独立拥有。 严禁任何个人或单位在未经本公司许可的情况下对这些内容进行翻版、复制、转载、篡改等影响万题库内容独特性的操作及传播行为；万题库会员帐号只为注册用户本人所专有，严禁一个帐号多人使用，如若发现上述情况，本公司将有权停止其帐号使用，并根', 1532774481);

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(50) NOT NULL,
  `password` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `admin_user`, `password`, `level`) VALUES
(1, 'root', 123456, 4),
(2, '管理员亲戚', 123456, 3),
(3, '管理员二奶', 666, 0),
(8, '我的世界', 123456, 4),
(9, '测试', 1, 4);

-- --------------------------------------------------------

--
-- 表的结构 `ai`
--

CREATE TABLE IF NOT EXISTS `ai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ai`
--

INSERT INTO `ai` (`id`, `img`, `name`, `desc`, `time`) VALUES
(2, '8827.jpg', '第二个人', '么么哒', 1532263741),
(3, '31889.jpg', '智能辅导', '名校课堂欢乐直播', 1532264088),
(4, '30829.jpg', '科学用脑', '请喝6个核桃', 1532785464),
(5, '11426.jpg', '后台架构', '关于PHP的前世今生', 1532785532);

-- --------------------------------------------------------

--
-- 表的结构 `auth_access`
--

CREATE TABLE IF NOT EXISTS `auth_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `auth_access`
--

INSERT INTO `auth_access` (`id`, `group_id`, `time`, `admin_id`) VALUES
(1, 4, 0, 8),
(2, 4, 0, 1),
(3, 4, 0, 9);

-- --------------------------------------------------------

--
-- 表的结构 `auth_group`
--

CREATE TABLE IF NOT EXISTS `auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `auth_group`
--

INSERT INTO `auth_group` (`id`, `name`, `time`, `type`) VALUES
(1, '一级管理员', 1534590683, '1'),
(3, '三级管理员', 1534856533, '0,1'),
(4, '最高等级', 1534950721, '0,1,2,3,4,5,6,7,8');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `auth_rule`
--

INSERT INTO `auth_rule` (`id`, `name`, `type`, `time`) VALUES
(1, '智能识别', 'Ai/ai', 1534678716),
(2, '栏目管理', 'Category/category', 1534680152),
(3, '直播管理', 'Live/live', 1534857682),
(4, '首页管理', 'Index/index', 1534857748),
(5, '收费管理', 'SaleList/saleList', 1534857859),
(6, '智能识别添加', 'Ai/ai_add', 1534950441),
(7, '智能识别修改', 'Ai/aiEdit', 1534950495),
(8, '智能识别删除', 'Ai/aiDel', 1534950615);

-- --------------------------------------------------------

--
-- 表的结构 `banner_img`
--

CREATE TABLE IF NOT EXISTS `banner_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(11) NOT NULL,
  `img` varchar(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `banner_img`
--

INSERT INTO `banner_img` (`id`, `title`, `img`, `time`) VALUES
(3, '第一个图片', '18323.jpg', 0),
(4, '第二个图片', '29648.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `call`
--

CREATE TABLE IF NOT EXISTS `call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `img` varchar(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `server` varchar(55) NOT NULL,
  `youbian` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `call`
--

INSERT INTO `call` (`id`, `name`, `img`, `address`, `email`, `server`, `youbian`, `phone`, `time`) VALUES
(1, '联系我们', '14508.png', '嘉顺花园甲单元666', '894059255@qq.com', '4000 888 566', '637400', '110119120', 1532863802);

-- --------------------------------------------------------

--
-- 表的结构 `catename`
--

CREATE TABLE IF NOT EXISTS `catename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(50) NOT NULL,
  `catename_p_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `catename`
--

INSERT INTO `catename` (`id`, `catename`, `catename_p_id`, `time`) VALUES
(4, '医学万题库', 0, 1531484999),
(5, 'WEB万题库', 0, 1531485059),
(6, '工程万题库', 0, 1531485085),
(7, '护士从业理论', 4, 1531485152),
(8, '医生申论模板', 4, 1531485185),
(9, '病理学研究', 4, 1531485231),
(10, 'PHP', 5, 1531485252),
(11, 'JAVA', 5, 1531485273),
(13, '会计师学院', 0, 1532957344),
(14, '注册会计师', 13, 1532957389),
(15, '经济分析师', 13, 1532957412),
(16, '建造师', 6, 1532957462),
(17, '房屋评估师', 6, 1533044051);

-- --------------------------------------------------------

--
-- 表的结构 `catename_desc`
--

CREATE TABLE IF NOT EXISTS `catename_desc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `catename_desc`
--

INSERT INTO `catename_desc` (`id`, `title`, `desc`, `time`) VALUES
(1, '改变自己，从这里开始', '一网打尽，提升自己', 1532867780);

-- --------------------------------------------------------

--
-- 表的结构 `cate_article`
--

CREATE TABLE IF NOT EXISTS `cate_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  `shop` varchar(50) NOT NULL,
  `scrope` varchar(25) NOT NULL,
  `people` varchar(50) NOT NULL,
  `resource` varchar(50) NOT NULL,
  `cate_id` varchar(50) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `cate_article`
--

INSERT INTO `cate_article` (`id`, `name`, `desc`, `time`, `shop`, `scrope`, `people`, `resource`, `cate_id`, `pic`, `content`) VALUES
(1, '市政工程', '学习市政工程', 1532526638, '免费', '十分', '10000', '666', '6', '9.jpg', '<p>大家去挖矿</p>'),
(7, '经济法基础', '学习经济法', 1532957160, '收费', '十分', '123', '666', '10', '23737.png', '<p>好好学习天天向上</p>'),
(8, '学习PHP的致胜之道', '前瞻业界的所有技术发展', 1532957872, '免费', '十分', '122', '666', '10', '12618.jpg', '<p>这就是你的道路，加油吧亲</p>'),
(9, '一级建造师', '为伟大祖国做贡献', 1532958029, '收费', '十分', '111', '666', '16', '14523.png', '<p>走遍祖国大好河山，建设伟大祖国</p>'),
(10, '医学院的日常', '我们一起营造一个和谐医患关系', 1532958142, '收费', '十分', '555', '666', '8', '20952.jpeg', '<p>和谐社区关系，为和谐中国做出贡献</p>'),
(11, '梅毒与极女的内在关系', '探访边缘人群的内心世界', 1533044500, '免费', '十分', '666', '666', '9', '5050.jpg', '<p>我们试图营造一个不存在的世界</p>'),
(12, '施工管理', '2018年二级建造师《施工管理》真题视频解析', 1533547171, '收费', '9分', '555', '666', '16', '21120.jpg', '<p>施工项目的管理和任务</p>'),
(13, '财务审核', '财务报表分析方法', 1533547328, '免费', '10分', '666', '666', '15', '22377.jpg', '<p>掌握自己的经济命脉</p>'),
(14, '学好JAVA', '让我们学习这门最厉害的语言吧', 1533547442, '收费', '10分', '10000', '666', '11', '20665.jpg', '<p>快点开始吧，不要犹豫，一定会成功的</p>');

-- --------------------------------------------------------

--
-- 表的结构 `home_user`
--

CREATE TABLE IF NOT EXISTS `home_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `home_user`
--

INSERT INTO `home_user` (`id`, `username`, `password`, `time`) VALUES
(4, 'root', '202cb962ac59075b964b07152d234b70', 1531834349),
(5, '1', '202cb962ac59075b964b07152d234b70', 1535638057),
(6, '4', 'c4ca4238a0b923820dcc509a6f75849b', 1535640614),
(7, 'wangwang', 'c4ca4238a0b923820dcc509a6f75849b', 1535640638);

-- --------------------------------------------------------

--
-- 表的结构 `join`
--

CREATE TABLE IF NOT EXISTS `join` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `desc` varchar(55) NOT NULL,
  `img` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `join`
--

INSERT INTO `join` (`id`, `name`, `desc`, `img`, `email`, `time`) VALUES
(1, '产品经理', '参与需求方（包括用户、业务人员、工程师等）沟通，收集、整理、分析产品需求；', '19722.jpg', '简历请发到 hr@wantiku.com，标题注明：“应聘『职位』+名字”，并附带一封求职信。', 1532865231),
(2, 'PHP工程师', '出版物经营许可证新出发京批字第直170033号 营业执照信息', '8035.jpg', '894059255@qq.com', 1532868400);

-- --------------------------------------------------------

--
-- 表的结构 `live`
--

CREATE TABLE IF NOT EXISTS `live` (
  `live_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_article_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `live_desc` varchar(55) NOT NULL,
  `teacher` varchar(25) NOT NULL,
  UNIQUE KEY `id` (`live_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `live`
--

INSERT INTO `live` (`live_id`, `cate_article_id`, `time`, `start_time`, `end_time`, `live_desc`, `teacher`) VALUES
(9, 16, 1533561523, '03:32:00', '22:22:00', '前端可是很难得哟', '张三');

-- --------------------------------------------------------

--
-- 表的结构 `logo_img`
--

CREATE TABLE IF NOT EXISTS `logo_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `logo_img`
--

INSERT INTO `logo_img` (`id`, `img`, `time`) VALUES
(2, '6605.png', 1532785215);

-- --------------------------------------------------------

--
-- 表的结构 `sale_desc`
--

CREATE TABLE IF NOT EXISTS `sale_desc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price` int(11) NOT NULL,
  `pic` varchar(55) NOT NULL,
  `create_time` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `status` int(11) NOT NULL,
  `teacher_name` varchar(55) NOT NULL,
  `sale_pic` varchar(55) NOT NULL,
  `teacher_desc` varchar(255) NOT NULL,
  `teacher_title` varchar(5) NOT NULL,
  `teacher_pic` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sale_desc`
--

INSERT INTO `sale_desc` (`id`, `cate_id`, `start_time`, `end_time`, `price`, `pic`, `create_time`, `title`, `status`, `teacher_name`, `sale_pic`, `teacher_desc`, `teacher_title`, `teacher_pic`) VALUES
(1, 7, '00:00:00', '00:00:00', 33, '30067.jpg', 1533650181, '头部', 0, '', '', '', '', ''),
(2, 8, '22:22:00', '11:11:00', 222, '19396.jpg', 1533818912, 'wodeshijie', 1, '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
