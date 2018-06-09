<?php
namespace app\index\controller;

use think\Controller;

class Detail extends Base
{
    public function index($id='')
    {
        if(!intval($id))$this->error('没有查询到团购信息');
        $deals=model('Deal')->get($id);
        if (!$deals || $deals->status !=1)$this->error('没有查询到团购信息或商品已下架');
        $bis_id=$deals->bis_id;
        $category=model('Category')->get($deals->category_id);
        $location=model('BisLocation')->getNormalLocationsInId($deals->location_ids);
        $bisms=model('Bis')->get($bis_id);
        $flag=0;
        $timedata='';
        if($deals->start_time > time()){
            $flag=1;
            $dtime=$deals->start_time - time();
            $d=floor($dtime/(3600*24));
            if ($d){
                $timedata.=$d."天 ";
            }
            $h=floor($dtime%(3600*24)/3600);
            if ($h){
                $timedata.=$h."时 ";
            }
            $m=floor($dtime%(3600*24)%3600/60);
            if ($m){
                $timedata.=$m."分 ";
            }
        }
        
        $this->assign(
            [
                'tttitle'=>$deals->name,
                'dealcate'=>$category,
                'locations' => $location,
                'deals' => $deals,
                'bisms'=>$bisms,
                'flag' => $flag,
                'timedata'=>$timedata,
                'mapstr' => $deals->xpoint.','.$deals->ypoint,
            ]);
        return view();
    }
}
