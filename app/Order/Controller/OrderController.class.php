<?php
// +----------------------------------------------------------------------
// |订单管理
// +----------------------------------------------------------------------
namespace Order\Controller;
use Common\Controller\AuthController;
use Org\Util\Stringnew;
class OrderController extends AuthController {

	//普通菜品-订单列表
    public function ordinaryList()
    {
        $where = array();
        $orders_db = M('orders');
        $where['a.order_type'] = 1;
        $search = I('search');
        if($search){
            if($search['start_time']){
                $where['a.create_time'] = array('egt',strtotime($search['start_time']));
            }
            if($search['end_time']){
                $where['a.create_time'] = array('elt',strtotime($search['end_time']." 23:59:59"));
            }
            if($search['start_time'] && $search['end_time']){
                $where['a.create_time'] = array(array('egt',strtotime($search['start_time'])),array('elt',strtotime($search['end_time']." 23:59:59")));
            }
            if($search['order_no']){
                $where['a.order_no'] = array('like','%'.trim($search['order_no']).'%');
            }
            if($search['phone']){
                $where['c.telphone|c.member_list_nickname'] = array('like','%'.trim($search['phone']).'%');
            }
            if($search['stall_name']){
                $where['b.stall_name'] = array('like','%'.trim($search['stall_name']).'%');
            }
            if($search['order_status']){
                $where['a.order_status'] = $search['order_status'];
            }
            if($search['deliver_type']){
                $where['a.deliver_type'] = $search['deliver_type'];
            }
            if($search['is_grab']){
                $where['a.is_grab'] = $search['is_grab'];
            }
            if($search['refund']){
                $where['a.refund'] = $search['refund'];
            }
        }
        //分页
        $count= $orders_db->alias('a')
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $page= $Page->show();
        $list = $orders_db->alias('a')
            ->field("a.*,b.stall_name,c.telphone,c.member_list_nickname")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->order("a.create_time DESC")
            ->select();
        $lists = $orders_db->alias('a')
            ->field("a.*,b.stall_name,c.telphone,c.member_list_nickname")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->select();
        $money = $refundMoney = $qishouMoney = 0;
        foreach ($lists as $key=>$value){
            $money += $value['total_money'];
            if($value['order_status'] == 8){
                $refundMoney += $value['total_money'];
            }
            $qishouMoney += $value['express_money'];
        }
        $this->assign('money',$money);
        $this->assign('refundMoney',$refundMoney);
        $this->assign('qishouMoney',$qishouMoney);
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->assign('search',$search);
        $this->display();
    }

    //普通菜品-订单详情
    public function ordinaryDetail()
    {
        $order_id = I('order_id');
        $infos = M('orders')->alias('a')
            ->field("a.*,b.stall_name,b.stall_tel,c.member_list_nickname,c.telphone,d.member_list_headpic as ps_headpic,d.member_name as ps_name,d.telphone as ps_telphone,e.address as ma_address")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS d ON a.ps_id = d.member_list_id')
            ->join('LEFT JOIN __MERCHANT__ AS e ON a.ma_id = e.ma_id')
            ->where(array('a.order_id'=>$order_id))
            ->find();
        $goods_list = M('order_goods')->where(array('order_id'=>$infos['order_id']))->select();

        $this->assign('infos',$infos);
        $this->assign('goods_list',$goods_list);
        $this->display();
    }

    //普通菜品-派单
    // public function markiList(){
    //     die(I('order_id'));
    //     $order_id = I('order_id');
    //     $ma_id = session('ma_id');
    //     $list = M('member_list')->alias('a')
    //         ->field("a.*,b.name,c.ma_merchantname")
    //         ->join('LEFT JOIN __SCHOOL__ AS b ON a.school_id = b.school_id')
    //         ->join('LEFT JOIN __MERCHANT__ AS c ON a.ma_id = c.ma_id')
    //         ->where(array('a.ma_id'=>$ma_id,'a.is_open'=>1,'a.status'=>2,'a.state'=>2,'a.type'=>2))
    //         ->select();

    //     $this->assign('order_id',$order_id);
    //     $this->assign('list',$list);
    //     $this->display();
    // }

    // //普通菜品-派单
    // public function paidan()
    // {
    //     $member_list_id = I('member_list_id');
    //     $order_id = I('order_id');
    //     $data['ps_id'] = $member_list_id;
    //     $data['is_grab'] = 2;
    //     $data['order_status'] = 3;
    //     $res = M('orders')->where("order_id='$order_id'")->save($data);
    //     if ($res !== false){
    //         echo 1;
    //     }else{
    //         echo 2;
    //     }
    // }

    //套餐-订单列表
    public function packageList()
    {
        $where = array();
        $orders_db = M('orders');
        $where['a.order_type'] = 2;
        $search = I('search');
        if($search){
            if($search['start_time']){
                $where['a.create_time'] = array('egt',strtotime($search['start_time']));
            }
            if($search['end_time']){
                $where['a.create_time'] = array('elt',strtotime($search['end_time']." 23:59:59"));
            }
            if($search['start_time'] && $search['end_time']){
                $where['a.create_time'] = array(array('egt',strtotime($search['start_time'])),array('elt',strtotime($search['end_time']." 23:59:59")));
            }
            if($search['order_no']){
                $where['a.order_no'] = array('like','%'.trim($search['order_no']).'%');
            }
            if($search['phone']){
                $where['c.telphone|c.member_list_nickname'] = array('like','%'.trim($search['phone']).'%');
            }
            if($search['stall_name']){
                $where['b.stall_name'] = array('like','%'.trim($search['stall_name']).'%');
            }
            if($search['order_status']){
                $where['a.order_status'] = $search['order_status'];
            }
            if($search['deliver_type']){
                $where['a.deliver_type'] = $search['deliver_type'];
            }
            if($search['is_grab']){
                $where['a.is_grab'] = $search['is_grab'];
            }
            if($search['refund']){
                $where['a.refund'] = $search['refund'];
            }
        }
        //分页
        $count= $orders_db->alias('a')
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $page= $Page->show();
        $list = $orders_db->alias('a')
            ->field("a.*,b.stall_name,c.telphone,c.member_list_nickname")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->order("a.create_time DESC")
            ->select();
        $lists = $orders_db->alias('a')
            ->field("a.*,b.stall_name,c.telphone,c.member_list_nickname")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->where($where)
            ->select();
        $money = $refundMoney = 0;
        foreach ($lists as $key=>$value){
            $money += $value['total_money'];
            if($value['order_status'] == 8){
                $refundMoney += $value['total_money'];
            }
        }
        $this->assign('money',$money);
        $this->assign('refundMoney',$refundMoney);
        $this->assign('list',$list);
        $this->assign('page',$page);
        $this->assign('search',$search);
        $this->display();
    }

    //套餐-订单详情
    public function packageDetail()
    {
        $order_id = I('order_id');
        $infos = M('orders')->alias('a')
            ->field("a.*,b.stall_name,b.stall_name,b.stall_tel,c.member_list_nickname,c.telphone,d.member_list_headpic as ps_headpic,d.member_name as ps_name,d.telphone as ps_telphone,g.dishes_name as meal_name")
            ->join('LEFT JOIN __STALL__ AS b ON a.stall_id = b.stall_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS c ON a.member_list_id = c.member_list_id')
            ->join('LEFT JOIN __MEMBER_LIST__ AS d ON a.ps_id = d.member_list_id')
            //->join('LEFT JOIN __MERCHANT__ AS e ON a.ma_id = e.ma_id')
            //->join('LEFT JOIN __DISHES_MEAL__ AS f ON a.meal_id = f.meal_id')
            ->join('LEFT JOIN __DISHES__ AS g ON a.dishes_id = g.dishes_id')
            ->where(array('a.order_id'=>$order_id))
            ->find();
        $order_goods_db = M('order_goods');
        $goods_list = $order_goods_db->field('day')->where(array('order_id'=>$infos['order_id']))->group('day')->select();
        foreach ($goods_list as $key=>$value){
            $result = $order_goods_db->field('type,state,dishes_name,meal_code')->where(array('order_id'=>$infos['order_id'],'day'=>$value['day']))->select();
            $res = array();
            foreach ($result as $k => $v) {
                if(!isset($res[$v['type']])){
                    $res[$v['type']]=$v;
                }else{
                    $res[$v['type']]['dishes_name'] .= '、'.$v['dishes_name'];
                }
            }
            $goods_list[$key]['goodinfo'] = $res;
        }

        $this->assign('infos',$infos);
        $this->assign('goods_list',$goods_list);
        $this->display();
    }
}