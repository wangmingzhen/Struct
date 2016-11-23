<?php 
include 'List.php';

//线性表顺序存储
class LinearList implements Linear{
 
    private $list;
    private $size;
    
    //构造函数
    public function __construct($L,$n){
        
        $this->list = $L;
        $this->size = $n;
    
    }
    

    public function InitList($L,$n){

        $this->list = $L;
        $this->size = $n;
    
    }
    
    //判断链表是否为空
    public function ListEmpty($L){
        
        if( isset($this->list) ){
            
            if( $this->size == 0 )
                
                return true;
            
            else
                 
                return false;
        
        }
    }
    
    //清空链表
    public function ClearList($L){

        if( isset($this->list) ){
            
            unset($this->list);
        
        }
        
        $this->list = array();
        $this->size = 0;
    
    }
    
    //删除链表
    public function destoryList(){
        
        if( isset($this->list) ){
            
            unset($this->list);
            $this->size = 0;
        
        }
    }
    
    
    //取元素
    public function GetElem($L,$i,$e){
        
        if( $i<1 || $i>$this->size ){

            echo '溢出<br/>';
            exit();
            
        }
        
        if(  isset($this->list) && is_array($this->list) )
    
             return $this->list[$i-1];
         
    }
    
    //是否在链表中 
    public function LocateElem($L,$e){

        if ( isset($this->list) && is_array($this->list) ){
            
            for( $i=0;$i<$this->size;$i++ ){
                
                if( $this->list[$i] == $e ){
                    
                    return $i+1;
                
                }
            
            }
            
              return 0;
        }
        
    }
    
    //插入元素
    public function ListInsert($L,$i,$e){
        
        if( $i<1 || $i>$this->size+1 ){
            
            echo '插入位置有误';
            exit();
            
        }
        
        if( isset($this->list) && is_array($this->list) ){
            
            if( $this->size == 0 ){
                
                $this->list[$this->size] = $e;
                $this->size++;
                
            }else{

                $this->size++;
               
                for( $j=$this->size-1;$j>=$i;$j-- ){

                    $this->list[$j] = $this->list[$j-1];
                
                }
                
                $this->list[$i-1] = $e;
                
            }
            
        }
        
    }
    
    //删除第i个元素
    public function ListDelete($L,$i,$e){
    
        if( $i<1 || $i>$this->size ){
            
            echo '删除元素位置有误';
            exit();
            
        }
        
        if( isset($this->list) && is_array($this->list) ){
            
            if( $i==$this->size ){
                
                unset($this->list[$this->size-1]);
                
            }else{
                
                for( $j=$i;$j<$this->size;$j++ ){
                    
                    $this->list[$j-1] = $this->list[$j];
                    
                }
                
                unset($this->list[$this->size-1]);
                
            }
            

            $this->size--;
        
        }

    }
    
    //链表长度
    public function ListLength($L){
        
        if( isset($this->list) )
            
            return $this->size;
        
    }
    
    //链表前驱
    public function PriorElem($L,$i){
        
        if( $i<1 || $i>$this->size ){
            
            echo '溢出';
            exit();
            
        }
        
        if( $i==1 ){
            
            echo '没有前驱';
            exit();
            
        }
        
        if( isset($this->list) && is_array($this->list) ){
            
            return $this->list[$i-2];
            
        }
    }
    
    //链表后继
    public function NextElem($L,$i){
        
        if( $i<1 || $i>$this->size ){
            
            echo '溢出';
            exit();
            
        }
        
        if( $i==$this->size ){
            
            echo '没有后继';
            exit();
            
        }
        
        if( isset($this->list) && is_array($this->list) ){
            
            return $this->list[$i];
            
        }
        
    }
        
}












?>