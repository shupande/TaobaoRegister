<?php
include 'wxBonusConfig.php';
include 'WxBonus.Api.php';
class WxBonusDemo{
	public function indexAction(){
		//初始化配置
		$WxBonus=new WxBonusApi(
			array(
				'wxappid'=>WxBonusConfig::APPID,
				'mch_id'=>WxBonusConfig::MCHID,
				'key'=>WxBonusConfig::KEY,
				'api_cert'=>WxBonusConfig::getRealPath(). WxBonusConfig::SSLCERT_PATH,//三个路径都是绝对路径
				'api_key'=>WxBonusConfig::getRealPath().WxBonusConfig::SSLKEY_PATH,
				'rootca'=>WxBonusConfig::getRealPath().WxBonusConfig::SSLROOTCA
			)
		);
	
		$param=array(
			're_openid'=>'oklXsjr2mOynjAO2KoD_N4ewD1gg',//发送的openid
			'nick_name'=>'测试',//没有用，但是需要的参数
			'send_name'=>'test',//收到的红包名称
			'total_amount'=>'100',//金额 分
			'wishing'=>'祝福语',//红包祝福语，不超过32个字符
			'act_name'=>'活动名称',//活动名称，不会显示
			'remark'=>'备注',//备注，不会显示
			'client_ip'=>$WxBonus->getServerIp()//发送的服务器ip地址
		);
	
		$WxBonus->setLogFile('D:\\log1.txt');//设置日志文件
		
		$result=$WxBonus->sendredpack($param);//发送红包
	
		//结果就是true / false 如果是false 错误信息就在 error 中
		if($result){
			echo "ok";
			return true;
		}
	
		echo $WxBonus->error;
		return false;
	}
	
	
}