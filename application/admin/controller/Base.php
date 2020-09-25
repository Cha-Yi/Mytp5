<?php
namespace app\admin\controller;//命名空间
use think\Controller;//引入底层控制器

class Base extends Controller
{
	// 构造函数
	public function __construct(){
		parent::__construct();//将父亲的构造拿进来
		$this->checklogin();//检查登录
    $conname=strtolower(request()->controller());//获取当前的控制器名转小写
   
    $model= db('menu')->where('class_name',$conname)->find();//查表里名字与控制器名相同
  
    $menu = $this->getmenu();//获取菜单
    $this->checklevel($model,$conname);//验证权限
    $this->assign(['menu'=>$menu,'pid'=>$model['pid']]);//将值抛入页面

	}
}
