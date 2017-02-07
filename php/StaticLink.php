<?php
    /*
     * 静态链表的PHP实现
     *
     * @author wmz
     * @since 2016-11-30\
     * 
     * object(StaticLink)[1]
          public 'data_list' => 
            array (size=6)
              0 => 
                object(Node)[2]
                  public 'cur' => int 6
                  public 'data' => null
                  public 'head' => int 1
              1 => 
                object(Node)[3]
                  public 'cur' => int 2
                  public 'data' => string '甲' (length=3)
              2 => 
                object(Node)[4]
                  public 'cur' => int 3
                  public 'data' => string '乙' (length=3)
              3 => 
                object(Node)[5]
                  public 'cur' => int 5
                  public 'data' => string '丙' (length=3)
              4 => 
                object(Node)[6]
                  public 'cur' => null
                  public 'data' => string '丁' (length=3)
              5 => 
                object(Node)[7]
                  public 'cur' => int 4
                  public 'data' => string '五' (length=3)
     * 
     */

    //结点类
    class Node{
        public $cur = NULL; //下一个结点游标
        public $data = NULL; //数据

        public function Node($data, $cur = NULL){
            $this->data = $data;
            $cur && $this->cur = $cur;
        }
        public function getData(){
            return $this->data;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function getCur(){
            return $this->cur;
        }
        public function setCur($cur){
            $this->cur = $cur;
        }
    }

    //单链表类
    class StaticLink{
        public $data_list = NULL; //结点集    
        const maxsize = 1000;

        public function LinkList($data = false){
            $this->data_list = array();
            $start = new Node(NULL);
            $this->data_list[] = $start;

            if($data){
                if(is_array($data)){
                    $this->addMoreData($data);
                }else{
                    $this->addData($data);
                }
            }
        }
        //返回第N个结点的值
        public function getNodeByNumber($number){
            return $this->data_list[$this->findKeyByNumber($number)]->getData();
        }
        //添加一组结点
        public function addMoreData($datas){
            foreach($datas as $value){
                $this->addData($value);
            }
        }
        //添加结点统一入口,供外面调用
        //$number 添加在第几个结点的后面
        public function addData($data, $number = false){
            $node = new Node($data);
            if($number === FALSE || $number == count($this->data_list)){
                $this->insertLastNode($node);
            }elseif($number > count($this->data_list)){
                return false;
            }else{
                $this->insertNode($node, $number);
            }
        }
        //插入一个结点到最后
        public function insertLastNode($node){
                $node->setCur(NULL);             
                $lastKey = $this->findLastNode();
                $insert_key = $this->insertNodeIntoArray($node);
              
                if( $lastKey == 0){
                    $this->data_list[0]->head = $insert_key;  
                }
                if($insert_key+1>self::maxsize){
                    return false;
                }
                $this->data_list[0]->setCur($insert_key+1);
                $this->data_list[$lastKey]->setCur($insert_key);    
        }    
        //插入一个结点
        public function insertNode($node, $number){
            $insert_number = $this->findKeyByNumber($number);    
            $node->setCur($this->data_list[$insert_number]->getCur());
            $insert_key = $this->insertNodeIntoArray($node);
            if($insert_key+1>self::maxsize){
                return false;
            }
            $this->data_list[0]->setCur($insert_key+1);
            $this->data_list[$insert_number]->setCur($insert_key);
        }
        //查找第N个结点对应的数组key
        public function findKeyByNumber($number){
            $i = $key = 1;

            while($i < $number){
                $key = $this->data_list[$key]->getCur();
                $i ++;
            }
         
            return $key;
        }
        //将结点加入数组
        public function insertNodeIntoArray($node){
            $this->data_list[] = $node;     
            return $this->getLastKey();
        }
        //删除结点
        public function deleteNode($number){
            if($number == 0 || $number > count($this->data_list)){
                return false;
            }

            $pre_key = $this->findKeyByNumber($number - 1);
            $key = $this->data_list[$pre_key]->getCur();

          $this->data_list[$pre_key]->setCur($this->data_list[$key]->getCur());
            unset($this->data_list[$key]);
        }

        //查找某结点的前一个结点
        public function getPreNodeKey($key){
            foreach($this->data_list as $k=>$v){
                if($v->getCur() == $key){
                    return $k;  
                }
            }
            return false;
        }

        //打印链表
        public function getData_list(){
            return $this->data_list;
        }

        //返回数组的最后一个键
        public function getLastKey(){
            end($this->data_list);
            return key($this->data_list);
        }

        //判断某个键值是否存在
        public function ifExistKey($key){
            if(array_key_exists($key, $this->data_list)){
                return true;
            }          
            return false;
        }
        //查找尾结点
        public function findLastNode(){
            foreach($this->data_list as $key=>$value){
                
                if($value->getCur() === NULL ){
                    return $key;
                }
            }
        }
    }
?>