<?php
namespace app\index\controller;

use think\Controller;

class Index extends Base
{
    public function index()
    {
        
        $large=model('Featured')->getNormalFeaturedByType(0);
        $left=model('Featured')->getNormalFeaturedByType(1);
        $cate=$this->cates;
        
        $deallistone=model('Deal')->getNomalDealCategoryCityId($cate[1]['id'],$this->city->id);
        $childone=model('Category')->getNormalRecommendCategoryByParentId($cate[1]['id'],4);
        
        
        $deallisttwo=model('Deal')->getNomalDealCategoryCityId($cate[2]['id'],$this->city->id);
        $childtwo=model('Category')->getNormalRecommendCategoryByParentId($cate[2]['id'],4);
        $view=[
            'large'=>$large,
            'left'=>$left[0],
            'listone'=>$deallistone,
            'listtwo'=>$deallisttwo,
            'childone'=>$childone,
            'childtwo'=>$childtwo,
        ];
        $this->assign($view);
        return view();
    }
}
