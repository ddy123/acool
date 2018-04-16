DROP TABLE IF EXISTS `jieqi_article_actlog`;
CREATE TABLE `jieqi_article_actlog` (
  `actlogid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) NOT NULL DEFAULT '',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `uname` varchar(30) NOT NULL DEFAULT '',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `tname` varchar(30) NOT NULL DEFAULT '',
  `linkid` int(11) unsigned NOT NULL DEFAULT '0',
  `acttype` smallint(6) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `actname` varchar(50) NOT NULL DEFAULT '',
  `actnum` int(11) unsigned NOT NULL DEFAULT '0',
  `actvalue` int(11) unsigned NOT NULL DEFAULT '0',
  `islog` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isvip` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `egold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`actlogid`),
  KEY `articleid` (`articleid`,`actlogid`),
  KEY `uid` (`uid`,`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_applywriter`;
CREATE TABLE `jieqi_article_applywriter` (
  `applyid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `applytime` int(11) unsigned NOT NULL DEFAULT '0',
  `applyuid` int(11) unsigned NOT NULL DEFAULT '0',
  `applyname` varchar(30) binary NOT NULL DEFAULT '',
  `penname` varchar(30) binary NOT NULL DEFAULT '',
  `authtime` int(11) unsigned NOT NULL DEFAULT '0',
  `authuid` int(11) unsigned NOT NULL DEFAULT '0',
  `authname` varchar(30) binary NOT NULL DEFAULT '',
  `applytitle` varchar(100) NOT NULL DEFAULT '',
  `applytext` mediumtext,
  `applysize` int(11) unsigned NOT NULL DEFAULT '0',
  `authnote` text,
  `applyflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`applyid`),
  KEY `applyflag` (`applyflag`),
  KEY `applyename` (`applyname`),
  KEY `authname` (`authname`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_article`;
CREATE TABLE `jieqi_article_article` (
  `articleid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` int(11) unsigned NOT NULL DEFAULT '0',
  `sourceid` int(11) unsigned NOT NULL DEFAULT '0',
  `postdate` int(11) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) binary NOT NULL DEFAULT '',
  `articlecode` varchar(200) NOT NULL DEFAULT '',
  `backupname` varchar(100) NOT NULL DEFAULT '',
  `keywords` varchar(100) NOT NULL DEFAULT '',
  `roles` varchar(200) NOT NULL DEFAULT '',
  `initial` char(1) NOT NULL DEFAULT '',
  `authorid` int(11) unsigned NOT NULL DEFAULT '0',
  `author` varchar(30) binary NOT NULL DEFAULT '',
  `posterid` int(11) unsigned NOT NULL DEFAULT '0',
  `poster` varchar(30) binary NOT NULL DEFAULT '',
  `agentid` int(11) unsigned NOT NULL DEFAULT '0',
  `agent` varchar(30) binary NOT NULL DEFAULT '',
  `sortid` smallint(3) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(3) unsigned NOT NULL DEFAULT '0',
  `libid` smallint(3) unsigned NOT NULL DEFAULT '0',
  `intro` text,
  `notice` text,
  `foreword` text,
  `setting` text,
  `lastvolumeid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastvolume` varchar(100) NOT NULL DEFAULT '',
  `lastchapterid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastchapter` varchar(100) NOT NULL DEFAULT '',
  `lastsummary` text,
  `chapters` smallint(6) unsigned NOT NULL DEFAULT '0',
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `daysize` int(11) unsigned NOT NULL DEFAULT '0',
  `weeksize` int(11) unsigned NOT NULL DEFAULT '0',
  `monthsize` int(11) unsigned NOT NULL DEFAULT '0',
  `lastvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `dayvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `weekvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `monthvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `allvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `lastvote` int(11) unsigned NOT NULL DEFAULT '0',
  `dayvote` int(11) unsigned NOT NULL DEFAULT '0',
  `weekvote` int(11) unsigned NOT NULL DEFAULT '0',
  `monthvote` int(11) unsigned NOT NULL DEFAULT '0',
  `allvote` int(11) unsigned NOT NULL DEFAULT '0',
  `lastflower` int(11) unsigned NOT NULL DEFAULT '0',
  `allflower` int(11) unsigned NOT NULL DEFAULT '0',
  `monthflower` int(11) unsigned NOT NULL DEFAULT '0',
  `weekflower` int(11) unsigned NOT NULL DEFAULT '0',
  `dayflower` int(11) unsigned NOT NULL DEFAULT '0',
  `lastegg` int(11) unsigned NOT NULL DEFAULT '0',
  `allegg` int(11) unsigned NOT NULL DEFAULT '0',
  `monthegg` int(11) unsigned NOT NULL DEFAULT '0',
  `weekegg` int(11) unsigned NOT NULL DEFAULT '0',
  `dayegg` int(11) unsigned NOT NULL DEFAULT '0',
  `lastvipvote` int(11) unsigned NOT NULL DEFAULT '0',
  `allvipvote` int(11) unsigned NOT NULL DEFAULT '0',
  `monthvipvote` int(11) unsigned NOT NULL DEFAULT '0',
  `weekvipvote` int(11) unsigned NOT NULL DEFAULT '0',
  `dayvipvote` int(11) unsigned NOT NULL DEFAULT '0',
  `lastdown` int(11) unsigned NOT NULL DEFAULT '0',
  `alldown` int(11) unsigned NOT NULL DEFAULT '0',
  `monthdown` int(11) unsigned NOT NULL DEFAULT '0',
  `weekdown` int(11) unsigned NOT NULL DEFAULT '0',
  `daydown` int(11) unsigned NOT NULL DEFAULT '0',
  `goodnum` int(11) unsigned NOT NULL DEFAULT '0',
  `reviewsnum` int(11) unsigned NOT NULL DEFAULT '0',
  `ratenum` int(11) unsigned NOT NULL DEFAULT '0',
  `ratesum` int(11) unsigned NOT NULL DEFAULT '0',
  `toptime` int(11) unsigned NOT NULL DEFAULT '0',
  `saleprice` int(11) unsigned NOT NULL DEFAULT '0',
  `salenum` int(11) unsigned NOT NULL DEFAULT '0',
  `totalcost` int(11) unsigned NOT NULL DEFAULT '0',
  `articletype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `permission` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `firstflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fullflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `imgflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `upaudit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `power` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `progress` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issign` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `signtime` int(11) unsigned NOT NULL DEFAULT '0',
  `buyout` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `monthly` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `discount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `quality` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isshort` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `inmatch` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isshare` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rgroup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `freetime` int(11) unsigned NOT NULL DEFAULT '0',
  `freesize` int(11) unsigned NOT NULL DEFAULT '0',
  `isvip` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `viptime` int(11) unsigned NOT NULL DEFAULT '0',
  `vipid` int(11) unsigned NOT NULL DEFAULT '0',
  `vippubid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `vipchapters` smallint(6) unsigned NOT NULL DEFAULT '0',
  `vipsize` int(11) unsigned NOT NULL DEFAULT '0',
  `vipvolumeid` int(11) unsigned NOT NULL DEFAULT '0',
  `vipvolume` varchar(100) NOT NULL DEFAULT '',
  `vipchapterid` int(11) unsigned NOT NULL DEFAULT '0',
  `vipchapter` varchar(100) NOT NULL DEFAULT '',
  `vipsummary` text,
  PRIMARY KEY (`articleid`),
  KEY `articlename` (`articlename`),
  KEY `posterid` (`posterid`),
  KEY `authorid` (`authorid`),
  KEY `sortid` (`sortid`,`typeid`),
  KEY `size` (`size`),
  KEY `lastupdate` (`lastupdate`),
  KEY `author` (`author`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;


DROP TABLE IF EXISTS `jieqi_article_articlelog`;
CREATE TABLE `jieqi_article_articlelog` (
  `logid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `logtime` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) binary NOT NULL DEFAULT '',
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(255) binary NOT NULL DEFAULT '',
  `chapterid` int(11) unsigned NOT NULL DEFAULT '0',
  `chaptername` varchar(255) NOT NULL DEFAULT '',
  `reason` text,
  `chginfo` text,
  `chglog` text,
  `ischapter` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `databak` mediumtext,
  PRIMARY KEY (`logid`),
  KEY `userid` (`userid`),
  KEY `ischapter` (`ischapter`),
  KEY `isdel` (`isdel`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_attachs`;
CREATE TABLE `jieqi_article_attachs` (
  `attachid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `chapterid` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(80) NOT NULL DEFAULT '',
  `class` varchar(30) NOT NULL DEFAULT '',
  `postfix` varchar(30) NOT NULL DEFAULT '',
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `needexp` int(11) unsigned NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`attachid`),
  KEY `articleid` (`articleid`),
  KEY `chapterid` (`chapterid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_avote`;
CREATE TABLE `jieqi_article_avote` (
  `voteid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `posterid` int(11) NOT NULL DEFAULT '0',
  `poster` varchar(30) NOT NULL DEFAULT '',
  `posttime` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `item1` varchar(100) NOT NULL DEFAULT '',
  `item2` varchar(100) NOT NULL DEFAULT '',
  `item3` varchar(100) NOT NULL DEFAULT '',
  `item4` varchar(100) NOT NULL DEFAULT '',
  `item5` varchar(100) NOT NULL DEFAULT '',
  `item6` varchar(100) NOT NULL DEFAULT '',
  `item7` varchar(100) NOT NULL DEFAULT '',
  `item8` varchar(100) NOT NULL DEFAULT '',
  `item9` varchar(100) NOT NULL DEFAULT '',
  `item10` varchar(100) NOT NULL DEFAULT '',
  `useitem` tinyint(2) NOT NULL DEFAULT '0',
  `description` text,
  `ispublish` tinyint(1) NOT NULL DEFAULT '0',
  `mulselect` tinyint(1) NOT NULL DEFAULT '0',
  `timelimit` tinyint(1) NOT NULL DEFAULT '0',
  `needlogin` tinyint(1) NOT NULL DEFAULT '0',
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`voteid`),
  KEY `articleid` (`articleid`,`ispublish`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_avstat`;
CREATE TABLE `jieqi_article_avstat` (
  `statid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `voteid` int(11) unsigned NOT NULL DEFAULT '0',
  `statall` int(11) unsigned NOT NULL DEFAULT '0',
  `stat1` int(11) unsigned NOT NULL DEFAULT '0',
  `stat2` int(11) unsigned NOT NULL DEFAULT '0',
  `stat3` int(11) unsigned NOT NULL DEFAULT '0',
  `stat4` int(11) unsigned NOT NULL DEFAULT '0',
  `stat5` int(11) unsigned NOT NULL DEFAULT '0',
  `stat6` int(11) unsigned NOT NULL DEFAULT '0',
  `stat7` int(11) unsigned NOT NULL DEFAULT '0',
  `stat8` int(11) unsigned NOT NULL DEFAULT '0',
  `stat9` int(11) unsigned NOT NULL DEFAULT '0',
  `stat10` int(11) unsigned NOT NULL DEFAULT '0',
  `canstat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`statid`),
  KEY `voteid` (`voteid`,`canstat`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_bookcase`;
CREATE TABLE `jieqi_article_bookcase` (
  `caseid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) binary NOT NULL DEFAULT '',
  `classid` smallint(3) NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) binary NOT NULL DEFAULT '',
  `chapterid` int(11) unsigned NOT NULL DEFAULT '0',
  `chaptername` varchar(100) binary NOT NULL DEFAULT '',
  `chapterorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `joindate` int(11) unsigned NOT NULL DEFAULT '0',
  `lastvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`caseid`),
  KEY `articleid` (`articleid`),
  KEY `userid` (`userid`,`classid`),
  KEY `chapterid` (`chapterid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_chapter`;
CREATE TABLE `jieqi_article_chapter` (
  `chapterid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` int(11) unsigned NOT NULL DEFAULT '0',
  `sourceid` int(11) unsigned NOT NULL DEFAULT '0',
  `sourcecid` int(11) unsigned NOT NULL DEFAULT '0',
  `sourcecorder` int(11) unsigned NOT NULL DEFAULT '0',
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) binary NOT NULL DEFAULT '',
  `volumeid` int(11) unsigned NOT NULL DEFAULT '0',
  `posterid` int(11) unsigned NOT NULL DEFAULT '0',
  `poster` varchar(30) binary NOT NULL DEFAULT '',
  `postdate` int(11) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(11) unsigned NOT NULL DEFAULT '0',
  `chaptername` varchar(100) binary NOT NULL DEFAULT '',
  `chapterorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `saleprice` int(11) unsigned NOT NULL DEFAULT '0',
  `salenum` int(11) unsigned NOT NULL DEFAULT '0',
  `totalcost` int(11) unsigned NOT NULL DEFAULT '0',
  `attachment` text,
  `summary` text,
  `isimage` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isvip` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pages` smallint(6) unsigned NOT NULL DEFAULT '0',
  `chaptertype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `power` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`chapterid`),
  KEY `lastupdate` (`lastupdate`),
  KEY `articleid` (`articleid`,`chapterorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_credit`;
CREATE TABLE `jieqi_article_credit` (
  `creditid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) NOT NULL DEFAULT '',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `uname` varchar(30) NOT NULL DEFAULT '',
  `point` int(11) unsigned NOT NULL DEFAULT '0',
  `payegold` int(11) unsigned NOT NULL DEFAULT '0',
  `buyegold` int(11) unsigned NOT NULL DEFAULT '0',
  `upnum` int(11) unsigned NOT NULL DEFAULT '0',
  `uptime` int(11) unsigned NOT NULL DEFAULT '0',
  `vars` text,
  PRIMARY KEY (`creditid`),
  UNIQUE KEY `uid` (`uid`,`articleid`),
  KEY `articleid` (`articleid`,`point`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_draft`;
CREATE TABLE `jieqi_article_draft` (
  `draftid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) CHARACTER SET gbk COLLATE gbk_bin NOT NULL DEFAULT '',
  `posterid` int(11) unsigned NOT NULL DEFAULT '0',
  `poster` varchar(30) CHARACTER SET gbk COLLATE gbk_bin NOT NULL DEFAULT '',
  `postdate` int(11) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(11) unsigned NOT NULL DEFAULT '0',
  `pubdate` int(11) unsigned NOT NULL DEFAULT '0',
  `saleprice` int(11) NOT NULL DEFAULT '0',
  `chaptername` varchar(100) CHARACTER SET gbk COLLATE gbk_bin NOT NULL DEFAULT '',
  `chaptercontent` mediumtext,
  `size` int(11) unsigned NOT NULL DEFAULT '0',
  `note` text,
  `drafttype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uptiming` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT '0',
  `ispub` int(11) NOT NULL,
  `isvip_n` int(11) NOT NULL,
  `isvip` int(11) NOT NULL,
  PRIMARY KEY (`draftid`),
  KEY `articleid` (`articleid`),
  KEY `drafttype` (`drafttype`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_replies`;
CREATE TABLE `jieqi_article_replies` (
  `postid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `topicid` int(10) unsigned NOT NULL DEFAULT '0',
  `istopic` tinyint(1) NOT NULL DEFAULT '0',
  `replypid` int(10) unsigned NOT NULL DEFAULT '0',
  `ownerid` int(10) unsigned NOT NULL DEFAULT '0',
  `posterid` int(11) NOT NULL DEFAULT '0',
  `poster` varchar(30) NOT NULL DEFAULT '',
  `posttime` int(11) NOT NULL DEFAULT '0',
  `posterip` varchar(25) NOT NULL DEFAULT '',
  `editorid` int(10) NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) NOT NULL DEFAULT '0',
  `editorip` varchar(25) NOT NULL DEFAULT '',
  `editnote` varchar(250) NOT NULL DEFAULT '',
  `iconid` tinyint(3) NOT NULL DEFAULT '0',
  `attachment` text,
  `subject` varchar(80) NOT NULL DEFAULT '',
  `posttext` mediumtext,
  `size` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`postid`),
  KEY `ownerid` (`ownerid`),
  KEY `ptopicid` (`topicid`,`posttime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_review`;
CREATE TABLE `jieqi_article_review` (
  `reviewid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `postdate` int(11) unsigned NOT NULL DEFAULT '0',
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) binary NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) binary NOT NULL DEFAULT '',
  `reviewtitle` varchar(100) NOT NULL DEFAULT '',
  `reviewtext` mediumtext,
  `topflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `goodflag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviewid`),
  KEY `articleid` (`articleid`),
  KEY `userid` (`userid`),
  KEY `display` (`display`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_reviews`;
CREATE TABLE `jieqi_article_reviews` (
  `topicid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `ownerid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `posterid` int(11) NOT NULL DEFAULT '0',
  `poster` varchar(30) NOT NULL DEFAULT '',
  `posttime` int(11) NOT NULL DEFAULT '0',
  `replierid` int(10) NOT NULL DEFAULT '0',
  `replier` varchar(30) NOT NULL DEFAULT '',
  `replytime` int(11) NOT NULL DEFAULT '0',
  `views` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `replies` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `islock` tinyint(1) NOT NULL DEFAULT '0',
  `istop` int(11) NOT NULL DEFAULT '0',
  `isgood` tinyint(1) NOT NULL DEFAULT '0',
  `rate` tinyint(1) NOT NULL DEFAULT '0',
  `attachment` tinyint(1) NOT NULL DEFAULT '0',
  `needperm` int(10) unsigned NOT NULL DEFAULT '0',
  `needscore` int(10) unsigned NOT NULL DEFAULT '0',
  `needexp` int(10) unsigned NOT NULL DEFAULT '0',
  `needprice` int(10) unsigned NOT NULL DEFAULT '0',
  `sortid` tinyint(3) NOT NULL DEFAULT '0',
  `iconid` tinyint(3) NOT NULL DEFAULT '0',
  `typeid` tinyint(3) NOT NULL DEFAULT '0',
  `lastinfo` varchar(255) NOT NULL DEFAULT '',
  `linkurl` varchar(100) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topicid`),
  KEY `posterid` (`posterid`,`replytime`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_searchcache`;
CREATE TABLE `jieqi_article_searchcache` (
  `cacheid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `searchtime` int(11) unsigned NOT NULL DEFAULT '0',
  `hashid` varchar(32) NOT NULL DEFAULT '0',
  `keywords` varchar(60) binary NOT NULL DEFAULT '',
  `searchtype` tinyint(1) NOT NULL DEFAULT '0',
  `results` int(11) unsigned NOT NULL DEFAULT '0',
  `aids` text,
  PRIMARY KEY (`cacheid`),
  UNIQUE KEY `hashid` (`hashid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_synclog`;
CREATE TABLE `jieqi_article_synclog` (
  `logid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `starttime` int(11) unsigned NOT NULL DEFAULT '0',
  `finishtime` int(11) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(11) unsigned NOT NULL DEFAULT '0',
  `articlenum` int(11) unsigned NOT NULL DEFAULT '0',
  `finishnum` int(11) unsigned NOT NULL DEFAULT '0',
  `retcode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issuccess` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_hurry`;
CREATE TABLE `jieqi_article_hurry` (
  `hurryid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL DEFAULT '0',
  `vipid` int(11) unsigned NOT NULL DEFAULT '0',
  `articlename` varchar(50) binary NOT NULL DEFAULT '',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `authorid` int(11) unsigned NOT NULL DEFAULT '0',
  `uname` varchar(30) NOT NULL DEFAULT '',
  `payegold` int(11) unsigned NOT NULL DEFAULT '0',
  `winegold` int(11) unsigned NOT NULL DEFAULT '0',
  `minsize` int(11) unsigned NOT NULL DEFAULT '0',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `overtime` int(11) unsigned NOT NULL DEFAULT '0',
  `payflag` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`hurryid`),
  KEY `articleid` (`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_mouthlybuy`;
CREATE TABLE `jieqi_article_mouthlybuy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `bookid` int(11) unsigned NOT NULL DEFAULT '0',
  `text` mediumtext NOT NULL,
  `texts` mediumtext NOT NULL,
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `typeid` int(11) unsigned NOT NULL DEFAULT '0',
  `type` int(11) unsigned NOT NULL DEFAULT '0',
  `pc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_tag`;
CREATE TABLE `jieqi_article_tag` (
  `tagid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) NOT NULL,
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `tagsort` int(11) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `linknum` int(11) unsigned NOT NULL DEFAULT '0',
  `display` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_taglink`;
CREATE TABLE `jieqi_article_taglink` (
  `tagid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `linktime` int(11) NOT NULL,
  PRIMARY KEY (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `jieqi_article_upload`;
CREATE TABLE  `acool`.`jieqi_article_upload` (
`id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
`type` INT( 11 ) NOT NULL DEFAULT  '0',
`sign` VARCHAR( 255 ) NOT NULL DEFAULT  '''''',
`uptime` INT( 11 ) NOT NULL ,
`status` INT( 1 ) NOT NULL DEFAULT  '0',
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;