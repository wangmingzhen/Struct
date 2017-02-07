<?php
/**
 * 文件名：List.php
 * 功能：线性表的抽象数据类型定义接口
 * @author wmz
 * @since   2016-11-22
 */

interface Linear{
    
    /**
     * 初始化操作，建立一个空的线性表L
     * @param array $L
     * @param array $n
     */
    public function InitList($L,$n);
    
    /**
     * 若线性表为空，返回true,否则返回false
     * @param array $L
     * return boolean
     */
    public function ListEmpty($L);
    
    /**
     * 清空线性表
     * @param array $L
     */
    public function ClearList($L);
    
    /**
     * 将线性表L中第i个位置的元素返回给e
     * @param array $L
     * @param int $i
     * @param int $e
     */
    public function GetElem($L,$i,$e);
    
    /**
     * 返回线性表L中和e相等的元素，查找成功，返回位置，查找失败，返回0
     * @param array $L
     * @param int $e
     */
    public function LocateElem($L,$e);
    
    /**
     * 在线性表中的第i个位置插入新元素e
     * @param array $L
     * @param int $i
     * @param int $e
     */
    public function ListInsert($L,$i,$e);
    
    /**
     *删除线性表L中第i个位置元素，返回e
     * @param array $L
     * @param int $i
     * @param int $e
     */
    public function ListDelete($L,$i,$e);
    
    /**
     * 返回线性表中L的元素个数
     * @param array $L
     */
    public function ListLength($L);

    /**
     * 前驱
     * @param array $L
     * @param int $i
     */
    public function PriorElem($L,$i);
    
    /**
     * 后继
     * @param array $L
     * @param int $i
     */
    public function NextElem($L,$i);
     
}















?>