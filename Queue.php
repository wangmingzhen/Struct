<?php
/*
 * PHP实现队列操作类
 * 
 * 1 队尾入队
 * 2 队首出队
 * 3 队列元素统计
 * 4 取队首元素
 * 5 取队尾元素
 * 6 清空队列
 * 7 队尾出队（仅用于双端队列）
 * 8 队首入队（仅用于双端队列）
    
 */
class queueOp {
    /*
     * 队尾入队
     * array_push — 将一个或多个单元压入数组的末尾（入栈）
     * Return：处理之后队列的元素个数
     */
    public function tailEnqueue($arr,$val) {
        return array_push($arr,$val);
    }

    /*
     * 队尾出队
     * array_pop() - 将数组最后一个单元弹出（出栈）
     * Return：最后一个值，如果数组为空或不是数组，返回NULL
     * Comment：仅用于双向队列
     */
    public function tailDequeue($arr) {
        return array_pop($arr);
    }

    /*
     * 队首入队
     * array_unshift() - 在数组开头插入一个或多个单元
     * Return：处理之后队列的元素个数
     * Comment：仅用于双向队列
     */
    public function headEnqueue($arr,$val) {
        return array_unshift($arr,$val);
    }

    /*
     * 队首出队
     * array_shift() - 将数组开头的单元移出数组
     * Return：移出的值，如果参数不是数组或数组为空，返回NULL
     */
    public function headDequeue($arr) {
        return array_shift($arr);
    }

    /*
     * 队列长度
     * Return：返回队列的长度（元素个数）
     */
    public function queueLength($arr) {
        return count($arr);
    }

    /*
     * 获取队首元素
     * reset() 将 array 的内部指针倒回到第一个单元并返回第一个数组单元的值。
     * Return：第一个元素的值，如果队列为空则返回FALSE
     */
    public function queueHead($arr) {
        return reset($arr);
    }

    /*
     * 获取队尾元素
     * end() 将 array 的内部指针移动到最后一个单元并返回其值。
     * Return：最后一个元素的值，如果队列为空则返回FALSE
     */
    public function queueTail($arr) {
        return end($arr);
    }

    /*
     * 清空队列
     * Return：无返回值
     */
    public function clearQueue($arr) {
        unset($arr);
    }
}