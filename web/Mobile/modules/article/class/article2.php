<?php
class JieqiArticle extends JieqiObjectData
{
	public function JieqiArticle()
	{
		$this->JieqiObjectData();
		$this->initVar('articleid', JIEQI_TYPE_INT, 0, '���', false, 11);
		$this->initVar('siteid', JIEQI_TYPE_INT, 0, '��վ���', false, 11);
		$this->initVar('sourceid', JIEQI_TYPE_INT, 0, '��Դ���', false, 11);
		$this->initVar('postdate', JIEQI_TYPE_INT, 0, '��������', false, 11);
		$this->initVar('lastupdate', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('articlename', JIEQI_TYPE_TXTBOX, '', 'С˵����', true, 50);
		$this->initVar('articlecode', JIEQI_TYPE_TXTBOX, '', 'ƴ������', false, 100);
		$this->initVar('backupname', JIEQI_TYPE_TXTBOX, '', '���ñ���', true, 50);
		$this->initVar('keywords', JIEQI_TYPE_TXTBOX, '', '�ؼ���', false, 250);
		$this->initVar('roles', JIEQI_TYPE_TXTBOX, '', '����', false, 200);
		$this->initVar('initial', JIEQI_TYPE_TXTBOX, '', '��������ĸ', false, 1);
		$this->initVar('authorid', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('author', JIEQI_TYPE_TXTBOX, '', '����', false, 30);
		$this->initVar('posterid', JIEQI_TYPE_INT, 0, '���������', false, 11);
		$this->initVar('poster', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('agentid', JIEQI_TYPE_INT, 0, '���������', false, 11);
		$this->initVar('agent', JIEQI_TYPE_TXTBOX, '', '������', false, 30);
		$this->initVar('masterid', JIEQI_TYPE_INT, 0, '�����༭���', false, 11);
		$this->initVar('master', JIEQI_TYPE_TXTBOX, '', '�����༭', false, 30);
		$this->initVar('sortid', JIEQI_TYPE_INT, 0, '������', false, 3);
		$this->initVar('typeid', JIEQI_TYPE_INT, 0, '������', false, 3);
		$this->initVar('libid', JIEQI_TYPE_INT, 0, '�������', false, 3);
		$this->initVar('intro', JIEQI_TYPE_TXTAREA, '', '���ݼ��', false, NULL);
		$this->initVar('notice', JIEQI_TYPE_TXTAREA, '', '���鹫��', false, NULL);
		$this->initVar('foreword', JIEQI_TYPE_TXTAREA, '', '�༭����', false, NULL);
		$this->initVar('setting', JIEQI_TYPE_TXTAREA, '', 'С˵����', false, NULL);
		$this->initVar('lastvolumeid', JIEQI_TYPE_INT, 0, 'ĩ�����', false, 11);
		$this->initVar('lastvolume', JIEQI_TYPE_TXTBOX, '', 'ĩ��', false, 250);
		$this->initVar('lastchapterid', JIEQI_TYPE_INT, 0, '�����½����', false, 11);
		$this->initVar('lastchapter', JIEQI_TYPE_TXTBOX, '', '�����½�', false, 255);
		$this->initVar('lastsummary', JIEQI_TYPE_TXTAREA, '', '�����½�ժҪ', false, NULL);
		$this->initVar('chapters', JIEQI_TYPE_INT, 0, '�½���', false, 6);
		$this->initVar('size', JIEQI_TYPE_INT, 0, '�ֽ���', false, 11);
		$this->initVar('daysize', JIEQI_TYPE_INT, 0, '�ո����ֽ���', false, 11);
		$this->initVar('weeksize', JIEQI_TYPE_INT, 0, '�ܸ����ֽ���', false, 11);
		$this->initVar('monthsize', JIEQI_TYPE_INT, 0, '�¸����ֽ���', false, 11);
		$this->initVar('presize', JIEQI_TYPE_INT, 0, '���¸�������', false, 11);
		$this->initVar('monthupds', JIEQI_TYPE_INT, 0, '�¸�������', false, 11);
		$this->initVar('preupds', JIEQI_TYPE_INT, 0, '���¸�������', false, 11);
		$this->initVar('monthupdt', JIEQI_TYPE_INT, 0, '�¸������ڼ�¼', false, 11);
		$this->initVar('preupdt', JIEQI_TYPE_INT, 0, '���¸������ڼ�¼', false, 11);
		$this->initVar('lastvisit', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('dayvisit', JIEQI_TYPE_INT, 0, '�շ���', false, 11);
		$this->initVar('weekvisit', JIEQI_TYPE_INT, 0, '�ܷ���', false, 11);
		$this->initVar('monthvisit', JIEQI_TYPE_INT, 0, '�·���', false, 11);
		$this->initVar('allvisit', JIEQI_TYPE_INT, 0, '�ܷ���', false, 11);
		$this->initVar('lastvote', JIEQI_TYPE_INT, 0, '����Ƽ�', false, 11);
		$this->initVar('dayvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('weekvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('monthvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('allvote', JIEQI_TYPE_INT, 0, '���Ƽ�', false, 11);
		$this->initVar('lastdown', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('daydown', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('weekdown', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('monthdown', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('alldown', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('lastflower', JIEQI_TYPE_INT, 0, '����ʻ�', false, 11);
		$this->initVar('dayflower', JIEQI_TYPE_INT, 0, '���ʻ�', false, 11);
		$this->initVar('weekflower', JIEQI_TYPE_INT, 0, '���ʻ�', false, 11);
		$this->initVar('monthflower', JIEQI_TYPE_INT, 0, '���ʻ�', false, 11);
		$this->initVar('allflower', JIEQI_TYPE_INT, 0, '���ʻ�', false, 11);
		$this->initVar('preflower', JIEQI_TYPE_INT, 0, '�����ʻ�', false, 11);
		$this->initVar('lastegg', JIEQI_TYPE_INT, 0, '��󼦵�', false, 11);
		$this->initVar('dayegg', JIEQI_TYPE_INT, 0, '�ռ���', false, 11);
		$this->initVar('weekegg', JIEQI_TYPE_INT, 0, '�ܼ���', false, 11);
		$this->initVar('monthegg', JIEQI_TYPE_INT, 0, '�¼���', false, 11);
		$this->initVar('allegg', JIEQI_TYPE_INT, 0, '�ܼ���', false, 11);
		$this->initVar('preegg', JIEQI_TYPE_INT, 0, '���¼���', false, 11);
		$this->initVar('lastvipvote', JIEQI_TYPE_INT, 0, '�����Ʊ', false, 11);
		$this->initVar('dayvipvote', JIEQI_TYPE_INT, 0, '����Ʊ', false, 11);
		$this->initVar('weekvipvote', JIEQI_TYPE_INT, 0, '����Ʊ', false, 11);
		$this->initVar('monthvipvote', JIEQI_TYPE_INT, 0, '����Ʊ', false, 11);
		$this->initVar('allvipvote', JIEQI_TYPE_INT, 0, '����Ʊ', false, 11);
		$this->initVar('previpvote', JIEQI_TYPE_INT, 0, '������Ʊ', false, 11);
		$this->initVar('hotnum', JIEQI_TYPE_INT, 0, '�ȶ�ָ��', false, 11);
		$this->initVar('goodnum', JIEQI_TYPE_INT, 0, '�ղ���', false, 11);
		$this->initVar('reviewsnum', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('ratenum', JIEQI_TYPE_INT, 0, '��������', false, 11);
		$this->initVar('ratesum', JIEQI_TYPE_INT, 0, '�����ܷ�', false, 11);
		$this->initVar('rate1', JIEQI_TYPE_INT, 0, '����1��', false, 11);
		$this->initVar('rate2', JIEQI_TYPE_INT, 0, '����2��', false, 11);
		$this->initVar('rate3', JIEQI_TYPE_INT, 0, '����3��', false, 11);
		$this->initVar('rate4', JIEQI_TYPE_INT, 0, '����4��', false, 11);
		$this->initVar('rate5', JIEQI_TYPE_INT, 0, '����5��', false, 11);
		$this->initVar('toptime', JIEQI_TYPE_INT, 0, '�ö�ʱ��', false, 11);
		$this->initVar('saleprice', JIEQI_TYPE_INT, 0, '���ۼ۸�', false, 11);
		$this->initVar('salenum', JIEQI_TYPE_INT, 0, '������', false, 11);
		$this->initVar('totalcost', JIEQI_TYPE_INT, 0, '�����۶�', false, 11);
		$this->initVar('articletype', JIEQI_TYPE_INT, 0, 'С˵����', false, 1);
		$this->initVar('permission', JIEQI_TYPE_INT, 0, '��Ȩ����', false, 1);
		$this->initVar('firstflag', JIEQI_TYPE_INT, 0, '�׷���־', false, 1);
		$this->initVar('fullflag', JIEQI_TYPE_INT, 0, '������־', false, 1);
		$this->initVar('imgflag', JIEQI_TYPE_INT, 0, 'ͼƬ��־', false, 1);
		$this->initVar('upaudit', JIEQI_TYPE_INT, 0, '������˱�־', false, 1);
		$this->initVar('power', JIEQI_TYPE_INT, 0, '���ʼ���', false, 1);
		$this->initVar('display', JIEQI_TYPE_INT, 0, '��ʾ', false, 1);
		$this->initVar('progress', JIEQI_TYPE_INT, 0, 'д������', false, 1);
		$this->initVar('issign', JIEQI_TYPE_INT, 0, '�Ƿ�ǩԼ', false, 1);
		$this->initVar('signtime', JIEQI_TYPE_INT, 0, 'ǩԼʱ��', false, 11);
		$this->initVar('buyout', JIEQI_TYPE_INT, 0, '�Ƿ����', false, 1);
		$this->initVar('monthly', JIEQI_TYPE_INT, 0, '�Ƿ����', false, 1);
		$this->initVar('discount', JIEQI_TYPE_INT, 0, '�Ƿ����', false, 1);
		$this->initVar('quality', JIEQI_TYPE_INT, 0, '�Ƿ�Ʒ', false, 1);
		$this->initVar('isshort', JIEQI_TYPE_INT, 0, '�Ƿ��ƪ', false, 1);
		$this->initVar('inmatch', JIEQI_TYPE_INT, 0, '�Ƿ����', false, 1);
		$this->initVar('isshare', JIEQI_TYPE_INT, 0, '�Ƿ���', false, 1);
		$this->initVar('rgroup', JIEQI_TYPE_INT, 0, '����Ů��', false, 1);
		$this->initVar('ispub', JIEQI_TYPE_INT, 0, '�Ƿ����', false, 1);
		$this->initVar('pubtime', JIEQI_TYPE_INT, 0, '����ʱ��', false, 11);
		$this->initVar('pubid', JIEQI_TYPE_INT, 0, '������ID', false, 11);
		$this->initVar('pubisbn', JIEQI_TYPE_TXTBOX, '', 'ISBN����', false, 100);
		$this->initVar('pubinfo', JIEQI_TYPE_TXTAREA, 0, '������Ϣ', false, NULL);
		$this->initVar('freetime', JIEQI_TYPE_INT, 0, '��Ѹ���ʱ��', false, 11);
		$this->initVar('freesize', JIEQI_TYPE_INT, 0, '�������', false, 11);
		$this->initVar('isvip', JIEQI_TYPE_INT, 0, '�Ƿ�VIP', false, 1);
		$this->initVar('viptime', JIEQI_TYPE_INT, 0, 'VIP����ʱ��', false, 11);
		$this->initVar('vipid', JIEQI_TYPE_INT, 0, 'VIP����ID', false, 11);
		$this->initVar('vippubid', JIEQI_TYPE_INT, 0, 'VIP�༭��ID', false, 11);
		$this->initVar('vipchapters', JIEQI_TYPE_INT, 0, 'VIP�½���', false, 6);
		$this->initVar('vipsize', JIEQI_TYPE_INT, 0, 'VIP����', false, 11);
		$this->initVar('vipvolumeid', JIEQI_TYPE_INT, 0, 'VIP���·־�ID', false, 11);
		$this->initVar('vipvolume', JIEQI_TYPE_TXTBOX, '', 'VIP���·־�', false, 255);
		$this->initVar('vipchapterid', JIEQI_TYPE_INT, 0, 'VIP�����½�ID', false, 11);
		$this->initVar('vipchapter', JIEQI_TYPE_TXTBOX, '', 'VIP�����½�', false, 255);
		$this->initVar('vipsummary', JIEQI_TYPE_TXTAREA, '', 'VIP�����½�ժҪ', false, NULL);
	}
}

class JieqiArticleHandler extends JieqiObjectHandler
{
	public function JieqiArticleHandler($db = '')
	{
		$this->JieqiObjectHandler($db);
		$this->basename = 'article';
		$this->autoid = 'articleid';
		$this->dbname = 'article_article';
	}

	public function getCoverInfo($imgflag)
	{
		global $jieqiConfigs;

		if (!isset($jieqiConfigs['article'])) {
			jieqi_getconfigs('article', 'configs');
		}

		$ret = array('stype' => '', 'ltype' => '');

		if (0 < ($imgflag & 1)) {
			$ret['stype'] = $jieqiConfigs['article']['imagetype'];
		}

		if (0 < ($imgflag & 2)) {
			$ret['ltype'] = $jieqiConfigs['article']['imagetype'];
		}

		$imgtype = $imgflag >> 2;

		if (0 < $imgtype) {
			$imgtary = array(1 => '.gif', 2 => '.jpg', 3 => '.jpeg', 4 => '.png', 5 => '.bmp');
			$tmpvar = round($imgtype & 7);

			if (isset($imgtary[$tmpvar])) {
				$ret['stype'] = $imgtary[$tmpvar];
			}

			$tmpvar = round($imgtype >> 3);

			if (isset($imgtary[$tmpvar])) {
				$ret['ltype'] = $imgtary[$tmpvar];
			}
		}

		return $ret;
	}
}

jieqi_includedb();

