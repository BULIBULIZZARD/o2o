<?php
namespace app\bis\controller;

use think\Controller;

class Deal extends Base
{
    public function index()
    {
        $deals=model('Deal')->getAllDealByBisId($this->account->bis_id);
        $this->assign('deals',$deals);
        return view();
    }
    public function add(){
        if(request()->isPost()){
            $data=input('post.','','htmlentities');
            $validate=validate('Deal');
            if(!$validate->check($data)){
                $this->error($validate->getError());                
            }
            $location=model('BisLocation')->find(['bis_id'=>$this->account->bis_id,'is_main'=>1]);
            $deal=[
                'bis_id'=>$this->account->bis_id, 
                'name'=>$data['name'],
                'image'=>$data['image'],
                'category_id'=>$data['category_id'],
                'se_category_id'=> empty($data['se_category_id'])?'':implode(',',$data['se_category_id'] ),
                'city_id'=> $data['city_id'],
                'location_ids' => empty($data['location_ids'])?'':implode(',',$data['location_ids'] ),
                'start_time'=> strtotime($data['start_time']),
                'end_time'=>strtotime($data['end_time']),
                'total_count' => $data['total_count'],
                'origin_price' => $data['origin_price'],
                'current_price' => $data['current_price'],
                'coupons_begin_time' => strtotime($data['coupons_begin_time']),
                'coupons_end_time' => strtotime($data['coupons_end_time']),
                'description' => $_POST['description'],
                'notes' => $_POST['notes'],
                'bis_account_id'=>$this->account->id,
                'xpoint'=>$location->xpoint,
                'ypoint'=>$location->ypoint,
            ];
            $id=model('Deal')->save($deal);
            $id?$this->success('添加成功',url('deal/index')):$this->error('添加失败请重试');
        }
        $citys=model('city')->getNormalCitysByparentId();
        $category=model('category')->getNormalCategoryByparentId();
        $view=[
            'citys'=>$citys,
            'categorys'=>$category,
            'bislocation'=>model('BisLocation')->getNormalLocationByBisid($this->account->bis_id),
        ];
        $this->assign($view);
        return view();
    }
}
