<?php

namespace Phpstore\Repository;

use LaraStore\Presenters\AccountPresenter;
trait AccountRepository{

	/*
    |-------------------------------------------------------------------------------
    |
    | 获取用户信息
    |
    |-------------------------------------------------------------------------------
    */
    public function user(){

        return User::where('username',$this->username)->first();
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取操作类型
    |
    |-------------------------------------------------------------------------------
    */
    public function type(){

         $arr   = ['充值','提现'];

         if(in_array($this->type,[0,1])){

            return $arr[$this->type];
         }

         return '';
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 获取操作类型
    |
    |-------------------------------------------------------------------------------
    */
    public function pay_tag(){

         $arr   = ['审核中','已激活'];

         if(in_array($this->type,[0,1])){

            return $arr[$this->pay_tag];
         }

         return $arr[0];
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 申请时间
    |
    |-------------------------------------------------------------------------------
    */
    public function time(){

        return date('Y-m-d',$this->add_time);
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 设置 presenter
    |
    |-------------------------------------------------------------------------------
    */
    public function presenter(){
        return new AccountPresenter($this);
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 设置 typeName
    |
    |-------------------------------------------------------------------------------
    */
    public function getTypeNameAttribute(){
        return $this->type();
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 设置 amountFormat
    |
    |-------------------------------------------------------------------------------
    */
    public function getAmountFormatAttribute(){
        return ($this->presenter()->typeTag).(money_format('￥%i', $this->amount));
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 设置 createTime
    |
    |-------------------------------------------------------------------------------
    */
    public function getCreateTimeAttribute(){
        return $this->time();
    }


    /*
    |-------------------------------------------------------------------------------
    |
    | 设置 status
    |
    |-------------------------------------------------------------------------------
    */
    public function getAccountStatusAttribute(){
        return $this->pay_tag();
    }

}
