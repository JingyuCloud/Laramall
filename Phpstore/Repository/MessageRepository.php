<?php

namespace Phpstore\Repository;
use LaraStore\Presenters\MessagePresenter;

trait MessageRepository{

	/*
    |-------------------------------------------------------------------------------
    |
    | 添加留言时间
    |
    |-------------------------------------------------------------------------------
    */
    public function time(){

    	return date('Y-m-d',$this->add_time);
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 添加留言时间
    |
    |-------------------------------------------------------------------------------
    */
    public function reply_time(){

    	return date('Y-m-d',$this->reply_time);
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 显示留言的状态
    |
    |-------------------------------------------------------------------------------
    */
    public function status(){

    	 $arr 	= ['审核中','允许显示'];
         return (in_array($this->status,[0,1]))? $arr[$this->status] : $arr[0];
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | presenter
    |
    |-------------------------------------------------------------------------------
    */
    public function presenter(){

        return new MessagePresenter($this);
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 是否有回复
    |
    |-------------------------------------------------------------------------------
    */
    public function getHasReplyAttribute(){
        return $this->presenter()->hasReply();
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 创建时间
    |
    |-------------------------------------------------------------------------------
    */
    public function getCreateTimeAttribute(){
        return $this->presenter()->createTime();
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 回复时间
    |
    |-------------------------------------------------------------------------------
    */
    public function getReplyTimeFormatAttribute(){
        return $this->presenter()->replyTime();
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 状态
    |
    |-------------------------------------------------------------------------------
    */
    public function getStatusFormatAttribute(){
        return $this->status();
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | comment leavel
    |
    |-------------------------------------------------------------------------------
    */
    public function getRankStarAttribute(){
        return $this->presenter()->rankStar();
    }

    /*
    |-------------------------------------------------------------------------------
    |
    | 设置商品链接信息
    |
    |-------------------------------------------------------------------------------
    */
    public function getGoodsInfoAttribute(){
        return $this->presenter()->goodsInfo();
    }
    

    /*
    |-------------------------------------------------------------------------------
    |
    | 获取通过审核能显示在前台的留言列表
    |
    |-------------------------------------------------------------------------------
    */
    public static function canShowList(){
    	return (new static)->where('status',1)->orderBy('id','desc')->paginate(20);
    }

}