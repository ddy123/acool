var Default_isFT = 0		//Ĭ���Ƿ��壬0-���壬1-����
var StranIt_Delay = 20 //������ʱ���루�������Ŀ��������ҳ�����������ֳ�����

//�����������������뿪ʼ�����±�ģ�������������
//ת���ı�
function StranText(txt,toFT,chgTxt)
{
	if(txt==""||txt==null)return ""
	toFT=toFT==null?BodyIsFt:toFT
	if(chgTxt)txt=txt.replace((toFT?"��":"��"),(toFT?"��":"��"))
	if(toFT){return Traditionalized(txt)}
	else {return Simplized(txt)}
}
//ת������ʹ�õݹ飬�������ı�
function StranBody(fobj)
{
	
	if(typeof(fobj)=="object"){var obj=fobj.childNodes}
	else 
	{
		var tmptxt=StranLink_Obj.innerHTML.toString()
		
		if(tmptxt.indexOf("��")<0)
		{
			BodyIsFt=1
			StranLink_Obj.innerHTML=StranText(tmptxt,0,1)
			StranLink.title=StranText(StranLink.title,0,1)
		}
		else
		{
			BodyIsFt=0
			StranLink_Obj.innerHTML=StranText(tmptxt,1,1)
			StranLink.title=StranText(StranLink.title,1,1)
		}
		setCookie(JF_cn,BodyIsFt,7)
		var obj=document.body.childNodes
	}
	for(var i=0;i<obj.length;i++)
	{
		var OO=obj.item(i)
		if("||BR|HR|TEXTAREA|".indexOf("|"+OO.tagName+"|")>0||OO==StranLink_Obj)continue;
		if(OO.title!=""&&OO.title!=null)OO.title=StranText(OO.title);
		if(OO.alt!=""&&OO.alt!=null)OO.alt=StranText(OO.alt);
		if(OO.tagName=="INPUT"&&OO.value!=""&&OO.type!="text"&&OO.type!="hidden")OO.value=StranText(OO.value);
		if(OO.nodeType==3){OO.data=StranText(OO.data)}
		else StranBody(OO)
	}
}
function JTPYStr()
{
	return '����רҵ�Զ�˿������ɥ����Ϊ������������ϰ������������ب�ǲ�Ķ�����ڽ����ز����Ǽ����Ż���ɡΰ����������α���������½�����ȿ�٭ٯٶٱٲ��ٳ��ծ�������ǳ����ϴ��ж��������������������ڸԲ�д��ũ�������������������ݷ���ƾ������ۻ����մ�ɾ����ɲ�����ܼ��н�����Ȱ����۽����������ѫ��������ҽ��Э����¬±����ȴ�᳧������ѹ���ǲ������ó���������˫�������Ҷ��̾ߴ���������������߼߽Ż߿��Ա��Ǻ��ӽ���������������ܻ�������Ӵ�����﻽��������Х�������������������԰��Χ���ͼԲʥ�۳������̳�ް����׹¢���ݿ��ѵ�����������ǵ��ǽ׳���Ǻ���������ͷ�ж���ۼ�ܽ���ױ����������¦�欽������Ӥ���������������ѧ������ʵ�����ܹ������޶�Ѱ���ٽ�������Ң�Ͼ������������������᫸��ᰵ�����Ͽ��������ո�������۹��ϱ�˧ʦ�����Ĵ�֡���������ݹ���®�п�Ӧ���ӷ��޿�����߱�������䵯ǿ�鵱¼�峹�����������黳̬����������������������Ҷ�������������������������ҳͱ�㫲ѵ���㳷�������������Ϸ�ս꯻�ִ����ɨ���Ÿ����ҿ�������������£��ӵ��š����ֿ����̢Ю�ӵ�������������񻻵���°����������������§��Я�����ҡ��̯������ߢߣߥ���ܵ�����ի�ն���޾�ʱ������Խ�����������������ɱ��Ȩ������迼�������������ǹ����������դ��ջ���ж��������������������嵵����������׮�μ�����������¥���鷼����ƺ���ӣ�ͳ������ݻ��ŷ���������������Ź��챱ϱ�ձ���������ۻ㺺���ڹ�û��Ž���ٲ�����Ţ����������к�������������ǳ������ǲ�䫼�䯻��Ũ����������л�������ɬ��Ԩ�����½�������������ʪ������������������������б�̲������ΫǱ���������������ֲ��¯�����������˸�������̷����ǻ��̽��Ȼ����Ⱞү�ǣ����״���̱�������ʨ����������������è��̡�����⻷�����巩���������������걵续�������ű���񴯷�Ӹ�����컾���������̱���Ѣ񲰨����յ�μ�ǵ�������������غ����������������ש������������˶����ȷ�ﰭ���׼���������������»����ͺ�����ػ��ƻ�˰�����������Ҥ���ѿ��������������ȼ�������ɸ�ݳ�ǩ����������������¨�����������������������ֽ��������������Լ����������γ硴��ɴ�������ڷ�ֽ�Ʒ�Ŧ������������ϸ֯��称������ﾭ窰��޽���笻��Ѥ������ͳ�篾������м�簼�������糴����ά��緱������������׺��罼������翼�����綶������Ļ����Ʊ���Ե�Ƹ����Ƿ��ɲ���������������ӧ�������������������ٽ�������޷��������������ʳ�����ְ���������೦����������в�е�ʤ�����ֽ�����������ŧ�����������������������������������ս���ܼ��«��έ�����ɲ�����ƻ����������뾣���������������ٻ�����ӫݡݣݥ��ݦҩݰ����ݪݫݲ��ݵӨݺ��өӪ�����������޽���������������Ǿ������ޭ��޴޺²�������Ϻ�ʴ�����������������������������Ӭ���Ы��������β����������Ϯװ�����Ͽ������ܼ��۹����������������������������������ܼƶ����ϼ�ڦڧ����ڨ��ѵ��Ѷ�ǽ���کڪ��ګ�������Ϸ���þ�֤ڬڭ����ʶթ����ڮ�ߴ�ڰگ��ڱڲڳ��ڴʫڵڶ����ڷ����ڸڹ��ѯ��ں�����ڻڼ������ڽ��ھ�ջ�ڿ˵����������ŵ���·̿�����˭�ŵ�����׻��̸��ı�ȵ�����г����ν�����β�������������������лҥ����ǫ�׽�á������̷������������Ǵ���߱��긺�������Ͱ��˻��ʷ�̰ƶ�Ṻ���ᷡ�����������ܴ�ó�Ѻ������޼ֻ�����¸���������������޸������ʹ���������׸��׬������������Ӯ���Ը�������Ծ���ȼ���������ӻ�������������������������������ת���������������������������������������������������Թ�����ꣷ�������ԯϽշ���ꥴǱ����ɴ�Ǩ�����˻����ԶΥ�������ɼ���ѡѷ��������ң��������������ۣۦ֣۩۪�ǵ��ͽ��������ͼ����������붤�����������̷��������θ����Ҷ۳����Ʊ�������Կ�վ��ٹ���������ť����Ǯ��ǯ�ܲ����������������������������Ǧí������������������������������ͭ������ա��ϳ���������������綠�ҿ����������������������﮳��������ﲷ�п������������ê��������സ׶�����Ķ�����������������������������̶�þ�����������������ָ���������F���������޾������������������������������������ⳤ�������Ʊ��ʴ��������ȼ�������բ�ֹ��������̷���������������������������ղ����������������۶�������׼�½¤���������������������ѳ���������������������Τ�ͺ������ҳ��������˳������˶���������Ԥ­���ľ��������Ƶ���ӱ�������ն��������ȧ������Ʈ쭷����м����������������α����¶����ýȱ��Ķ��������ڹ����Ȳ���������������Ԧ��ѱ������¿��ʻ�������פ���������������溧������鿥����������ƭ��ɧ���������������������������������������³�������ֱ���������������������������������������������������������������������������������������������������������������𯼦���Ÿѻ�����Ѽ����ԧ�������������������������ȵ�������������������Ϻ�����������������ӥ���������������������������촳�������������������ȣ���������';
}
function FTPYStr()
{
	return '�f�c���I���|�z�G�ɇ��ʂ��R�����e�x���������l���I�y��̝�����a���H�C�|�H�ā��}�x���r���������ゥ�����t����΁��w�L�b�H�e�ɂȃS�~���z�R�����z�������A��E�f�����������������h�m�P�dƝ�B�F�σȌ��Ԍ�܊�r�T�_�Q�r���Q�D���p���C�P�D�{�P����c���t�����h�e�q�x�������������������k�Մ�ӄ�ńڄ݄ׄ�Q�T�^�t�A�f���u�R�u�P�l�s���S�d�v���������������B�N���h�����p�l׃���B�~̖�@�\���Άᇍ ���ǅȇ`�҇I���h�T�J�܆�ԁ����푆��}�^�􇂇W�������чO�Z��K�݇ʇ��[���D���ˇ��u�ڇ��̈F�@��������D�A�}�����ĉK�ԉ��ȉΉ]�����ŉ������׉|���N�P�_��q����������̎��͉��^�A�Z�Y�J�^���W�y�D������������I�ƋɌD�ʋz����ȋ����܋�ԋߌO�W�\�������������m���e���������ی����m�L����M�ӌόÌٌҌՎZ�q�M�獏�s���u�X�h�F�{�����n������V����p��^�Ŏ��������Î����͎Ύ�����V�c�]�T�쑪�R���U�[�_�����s�������������w��䛏��؏��Ƒ��ԑn���ёB�Z���Y����z�������ِa�����Q�Ð�Ő�������ґa���@�֑K�͑v�ܑM���T�C���|�ؑ��Б��ߑ������̔U�ВߓP�_�ᒁ���������o����M�n����r�Q�ܓ񓴔���钶�ϓ��ג�D�]�Ɠp��Q�v����S�ۓ�������v�R�����y�z�d�[�u�P���t�Δf�X�]�x�\���������S�̔ؔ��o�f�r��ҕ��@�x�ԕϕ�������X�C���s���l���q�O�����З����������n���f�d�Ř˗����ɗ������ژ䗫�ә藿��E�n�����u�������z�И�������E�Ǚ���Ι������M�{�љ��������_�g�e�W���{����������������ݞ�����֚Кښ�������R�h�����ϛ]���a�r�S�朿�����I�͞{�o�T�a���ɛܝ����D�ќ\�{������y�ҝ��g���G�❡�����Z�i���u�o�읙���q���՜Y�O�n�^�u�ƝO�c�B�؞��񝢞R�s���L�������M�]�V�E���I���u�t���H���z���|�l������`�ĠN���t�������c����q���N�T��������Z�C�a�៨�F�c�۠������ޠ٠�E�q�N�����M�{���b�z�s���C�J�M�i؈�I�H�^���|�h�F�t�k�m���q�I�������a�����T늮��������X�����O�������b�d�W�A���B�w�D���T�c�a�`�]�_�d�}�����K�}�O�w�I�P�[�����A���G�m���C���\�V�X�a�u�����Z�a�[�A�T�����_�|�K���~�|�R�Y�����\���A���U�x�d���N�z�e�Q�x���d���w�F�`�[�G�Z�C�Q�]�M�Q���V�S�P�a�{�\�e�`�Y�~�I�����j�D�X�j�������t�@�h�f�[�eg�c���S�Z�R�o�{�m�u�t�q�w�v�s���w�k�o�x�����������V�{�v�]�����y���~�����C�������M�������K�U�O�E�I�B�[���H���q�Y�@�W�L�o�k�{�j�^�g�y�������C���d�^�����w�c�m�_�p�b�i�K�S�d�R���I�^�J�C�`�U�G�Y�l�~�|�}���|�������D���E�������P�����|�������N�`�d�b�p�c�p�r�O�V�_�~�z�w�t�s�����i�������`�R�Q�U�y���W�_�P�T�`�b�u�w�N�e�u�@�C�c�w�a�I�[Û�{��đ�ٖV�FÄ�z�}Ē�KĚ�Xē�L�_Ó�TĘ�Dā�e�vĜݛŜŞœ�A�D�Gˇ���d�Gʏ�JɐȔ˞�{�O�n�r�K�O�o�d�\�L���O�G�vʁɜ�w�C�jʎ�sȝ��Ο��n�|�p�aȇˎ�W�Rɏ�P�n�W�@�~���L�}Ξ�I�Mʒ�_�[�rʉ�Y�V�{�E�yʚ�v��N�`�A�@�I�N˒�\̔�]̓�A�m�rϊ�gρΛ�Q͘�MϠ�|�U�U͐�u·ϓ͑΁Ϟω�X�sϐ�Nϔ�R���a�rЖ�\�U�m�u�b�dў�cѝ�O�@�hҊ�^ҎҒҕҗ�[�X�JҠ�]�D�M�P�U�x�|�z�u�`ӋӆӇ�J�Iӓӏӑ׌ӘәӖ�hӍӛ�v�M֎�nӠ�G�SӞՓ�A�S�O�L�E�^�b�X�u�{�R�p�V�\�g�a�~�x�t�g�r�E�CԇԟԊԑԜ�\�DԖԒ�QԍԏԎԃԄՊԓԔԌ՟Ԃ�]�_�Z�V�`�a�T�d�N�f�b�OՈ�TՌ�Z�xՎ�u�nՆ՘�lՔ�{�~ՏՁ�rՄ�x�\�Rՙ�e�G�C�o�]�^�@�I�X׋�J�O�V�B�i՛փו�q�x�{�r�u�t�k֔֙ֆ�vև�T�P�S׎�V�Hח�l�d׏ؐؑؓؕؔ؟�t���~؛�|؜؝ؚ�Hُ�A؞�E�v�S�B�N�F�L�J�Q�M�R�O�\ٗ�Z�V�D�U�T�E�Y�W�B�g�c�l�d�xـ�H�p�n�s�r�yهٍَِّ٘�Iٝٛ٠�A�M�w�sڅڎ�O�Sۄ�V�`�Eۋ�]�Q�x�Pۙ�W�U�bۘ�X�f�k�g�|܇܈܉܎ܐ�Dܗ݆ܛ�Z�V�_�S�T�W�F�]�U�p�Y�d�e�I�b�`�^�m�o�v݂݅�x݁�y�z�wݏݗ݋ݔ�\�@ݠݚ�A�H�O�o�q�p߅�|�_�w�^�~�\߀�@�M�h�`�B�t߃ޟ�E�m�x�d�fߊ߉�z�b�����w�]�u�����P�����i�B�y���j�u�����a��Y��������Q�A��C��{�S�O�}���g�n��c�^��k�j耚J�x�u�^��[��^�o�Z��X�`�Q�������X��f�g����F�K��p�U�T��C�B�G���I�D��s�B��e�t�K�~�X��z����b�A�f��|�x��t��P�C�q��P�|�|�@�y��T���n���H�N�i��z���~�n�S�s�h�\�J�R�Z�u�|�H��N�e�^�Q��K�a�d��N�F�\��U�V�I��i�O��|�I�J���@�R��}�D��V�U����k����y��^���\�g�S�M�N��O�R�C�����h��|��j��Z�D�C��O�s��L�T�V�W�Z�]���J�c��e�b�g�h�`���l�[�|�Y�}��y�w�u��b������]�����U�@����H�D�I�R�����A�H��]�����E�U�S�[�`�h�y�rׇ�Z�F�V�\�n�o�v�^�d�f�g�n�t�y�w����������B��D���C��@�A�B�I�H�i�R�a�M�}�W�U�l�j�h�f�w�}����~�D������A�E�L�R�S�Z�`�h�j�w����|�h��q������T�����D���A���G�I�N�H�Q�W�^���t��x�s�}�~�z���R�S�W�Z�Y��g�H�z����x�|�v��w�{�A�~��R������P�G��E�U�T�S�K��_�s�}�\��t�q�~�����E�K�J�t�y�x�W�|�u�~�������Q�|�V�U�c�T�q�^�n�b�q�o�r���\���~�����������������a���N�O�E�H�K�F�T���L���l�w�{�q�v�m�������������B�L�M���Z�X�[�V�k�B�F�u�S�Q�t�f�d�c�����R�����|�z�x�r���v���������[���P�Z�N�]�Z�O���Y�^�o�g�l�i�������X�F�_�Y�Q�W�p�w�������������X�z�����N�S�Z�t�o�w�x���B�R�W�X�Z�e�g�_�f�b�l�r�p�x�}��������';
}
function Traditionalized(cc){
	var str='',ss=JTPYStr(),tt=FTPYStr();
	for(var i=0;i<cc.length;i++)
	{
		if(cc.charCodeAt(i)>10000&&ss.indexOf(cc.charAt(i))!=-1)str+=tt.charAt(ss.indexOf(cc.charAt(i)));
  		else str+=cc.charAt(i);
	}
	return str;
}
function Simplized(cc){
	var str='',ss=JTPYStr(),tt=FTPYStr();
	for(var i=0;i<cc.length;i++)
	{
		if(cc.charCodeAt(i)>10000&&tt.indexOf(cc.charAt(i))!=-1)str+=ss.charAt(tt.indexOf(cc.charAt(i)));
  		else str+=cc.charAt(i);
	}
	return str;
}

function setCookie(name, value)		//cookies����
{
	var argv = setCookie.arguments;
	var argc = setCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	if(expires!=null)
	{
		var LargeExpDate = new Date ();
		LargeExpDate.setTime(LargeExpDate.getTime() + (expires*1000*3600*24));
	}
	document.cookie = name + "=" + escape (value)+((expires == null) ? "" : ("; expires=" +LargeExpDate.toGMTString()));
}

function getCookie(Name)			//cookies��ȡ
{
	var search = Name + "="
	if(document.cookie.length > 0) 
	{
		offset = document.cookie.indexOf(search)
		if(offset != -1) 
		{
			offset += search.length
			end = document.cookie.indexOf(";", offset)
			if(end == -1) end = document.cookie.length
			return unescape(document.cookie.substring(offset, end))
		 }
	else return ""
	  }
}

var StranLink_Obj=document.getElementById("StranLink");

if (StranLink_Obj)
{
	var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"")
	var BodyIsFt=getCookie(JF_cn)
	if(BodyIsFt!="1")BodyIsFt=Default_isFT
	with(StranLink_Obj)
	{
		if(typeof(document.all)!="object") 	//��IE�����
		{
			href="javascript:StranBody()"
		}
		else
		{
			href="#";
			onclick= new Function("StranBody();return false")
		}
		title=StranText("����Է������ķ�ʽ���",1,1)
		innerHTML=StranText(innerHTML,1,1)
	}
	if(BodyIsFt=="1"){setTimeout("StranBody()",StranIt_Delay)}
}