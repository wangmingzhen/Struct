<?php 
/**
 * 单链表(数组有n个结点对象组成）
 * @author wmz
 * @since 2016-11-30
 *
 */
class LinkNode{

    private $linkList = NULL; //结点集
    const   MAXSIZE   = 1000;

    public function LinkList($data = false){

        $this->linkList       = array();
        $node                 = new Node(NULL);
        $this->linkList[]     = $node;

        if( $data ){

            if( is_array($data) ){

                $this->addMoreData($data);
            }else{

                $this->addData($data);
            }
        }
    }

    //添加一组结点
    public function addMoreData($datas){

        foreach ($datas as $key=>$val ){

            $this->addData($val);
        }

    }
    
    //添加结点入口，number 添加在第几个结点的后面
    public function addData($data,$number=false){

        $node = new Node($data);

        if( $number === false || $number == count($this->linkList) ){

           $this->insertLastNode($node);

        }elseif($number > count($this->linkList)){

            return false;

        }else{

            $this->insertNode($node,$number);
        }

    }
    
    /**
     * 插入一个结点到最后
     * @param object $node
     * 
     * 步骤
     * 
     * (1)设置插入结点的指针为null
     * (2)找到数组最后一个结点的key
     * (3)把新结点插入到数组中，并获取数组插入的当前key
     * (4)把数组最后一个结点的key的指针设置成刚插入的数组的key
     */
    public function insertLastNode($node){
        
        $node->setNext(NULL);
        $lastKey    = $this->findLastNode();
        $insert_key = $this->insertNodeIntoArray($node);
        $this->linkList[$lastKey]->setNext($insert_key);
    }

     /**
     * 插入一个结点在i结点后
     * @param object $node
     * 
     * 步骤
     * 
     * (1)查找第i结点对应的数组的key
     * (2)把第$i结点的指针赋值给新的结点的指针
     * (3)把新结点插入到数组中，并获取数组插入的当前key
     * (4)把第$i结点的指针设置成刚插入的数组的key
     */
    public function insertNode($node,$number){

        $insert_number = $this->findKeyByNumber($number); //数组下标;
        $node->setNext($this->linkList[$insert_number]->getNext());
        $insert_key   = $this->insertNodeIntoArray($node);
        $this->linkList[$insert_number]->setNext($insert_key);
        
    }

    //查找第N个结点对应的数组Key
    public function findKeyByNumber($number){

        $i = $key = 0;

        while( $i<$number ){

            $key = $this->linkList[$key]->getNext();
            $i++;
        }

        return $key;
    }
    
    //将结点加入数组
    public function insertNodeIntoArray($node){
        
        $this->linkList[] = $node;
        return $this->getLastKey();
    }
    
    /*返回数组的最后一个键
     * end() 将 array 的内部指针移动到最后一个单元并返回其值。
     * key() 返回数组中当前单元的键名。
     */
    public function getLastKey(){
        
        end($this->linkList);
        return key($this->linkList);
    }
    
    //查找尾结点
    public function findLastNode(){
        
        foreach ($this->linkList as $key=>$value){
            
           if($value->getNext() === NULL ){
               return $key;
           }
        }
    }
    
    //删除结点
    public function deleteNode($number){
        
        if( $number == 0 || $number > count($this->linkList) ){
            
            return false;
        }
        
        $pre_key = $this->findKeyByNumber($number-1);
        $key     = $this->linkList[$pre_key]->getNext();
        $this->linkList[$pre_key]->setNext($this->linkList[$key]->getNext());
        unset($this->linkList[$key]);
    }
    
    //判断某个键值是否存在
    public function ifExistKey($key){
        if(array_key_exists($key, $this->data_list)){
            return true;
        }
        return false;
    }
    
    //查找某结点的前一个结点
    public function getPreNodeKey($key){
        
        foreach($this->data_list as $k=>$v){
            if($v->getNext() == $key){
                return $k;
            }
        }
        
        return false;
    }
    
    //返回第N个结点的值
    public function getNodeByNumber($number){
        
        return $this->data_list[$this->findKeyByNumber($number)]->getData();
    }
}




/**
 * 
 * 结点对象（data数据域和next指针组成）
 *
 */
class Node{
    
    private $data = NULL;
    private $next  = NULL;
    
    public function Node($data,$next=NULL){

        $this->data = $data;
        $next && $this->next = $next;
    }
    
    public function getData(){
        
        return $this->data;
    }
    
    public function setData($data){
        
        return $this->data = $data;
    }
    
    public function getNext(){
        
        return $this->next;
    }
    
    public function setNext($next){
        
        return $this->next = $next;
    }
}










?>