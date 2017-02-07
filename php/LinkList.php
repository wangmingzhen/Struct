<?php 
include 'List.php';

//线性表链表存储
class LinkList implements Linear{
 
    private $head;
    private $size;
    private $list; 
    
    //构造函数
    public function __construct(){
        
        $this->head = '';
        $this->size = 0;
        $this->list = array();
    
    }
    

    public function InitList($L,$n){

        $this->head = '';
        $this->size = 0;
        $this->list = array();
    
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
        $this->head = '';
        
    }
    
    //删除链表
    public function destoryList(){
        
        if( isset($this->list) && isset($this->head) ){
            
            unset($this->list);
            unset($this->head);
        
        }
    }
    
    
    //取元素
    public function GetElem($L,$i,$e){
        
        if( $i<1 || $i>$this->size ){

            echo '溢出<br/>';
            exit();
            
        }
        
        if(  isset($this->list) && is_array($this->list) )
    
             $j     = 1;
             $tmp   = $this->head;//头指针
    
             while( $i>$j ){
                 
                 if( $this->list[$tmp]['next'] != null ){
                     
                     $tmp = $this->list[$tmp]['next'];
                     $j++;
                     
                 }
                 
             }
             
             return $this->list[$tmp]['data'];
    
    }
    
    //是否在链表中 
    public function LocateElem($L,$e){

        if ( isset($this->list) && is_array($this->list) ){
            
             $tmp = $this->head;
             
             while( $this->list[$tmp]['data'] != $e ){
                
                 if( $this->list[$tmp]['next'] != null ){
                     
                     $tmp = $this->list[$tmp]['next'];
                     
                 }else{
                     
                     return false;
                     
                 }
             }
             
             return true;
        }
        
    }
    
    //插入元素
    public function ListInsert($L,$i,$e){
             
        if( isset($this->list) && is_array($this->list) ){

            //空表
            if( $this->size == 0 ){
                
                $this->head                         = $this->uuid();
                $this->list[$this->head]['data']    = $e;
                $this->list[$this->head]['next']    = null;
                $this->size++;
                
            }else{
                
                if( $i<1 || $i>$this->size ){
                
                    echo '插入位置有误';
                    exit();
                
                }

                $j      = 1;
                $tmp    = $this->head;
                
                while( $i>$j ){
                    
                    if( $this->list[$tmp]['next'] != null ){
                        
                        $j++;
                        $tmp = $this->list[$tmp]['next'];
                    
                    }    
                    
                }
                
                $find = $tmp;
                $id   = $this->uuid();
                
                if( $this->list[$find]['next'] == null ){
                    
                    //尾部
                    $this->list[$find]['next']  = $id;
                    $this->list[$id]['data']    = $e;
                    $this->list[$id]['next']    = null;
                    $this->size++;
                
                }else{
                    
                    //中间
                    $this->list[$id]['next']    = $this->list[$find]['next'];
                    $this->list[$find]['next']  = $id;
                    $this->list[$id]['data']    = $e;
                    $this->size++;
                    
                }
                
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
            
            if( $i==1 ){
                
               //删除头元素
               $this->head = $this->list[$this->head]['next'];
                
            }else{
                
               $tmp = $this->head;
               $j   = 1;
               
               while( $i>$j ){
                   
                   if( $this->list[$tmp]['next'] != null ){
                       
                       $tmp = $this->list[$tmp]['next'];
                       $j++;
                   }
               }
                
               //找到删除元素的前驱
               $find = $tmp;
               //删除的元素
               if( $this->list[$find]['next'] != null ){
                   
                   //不是最后一个元素
                   $delete                      = $this->list[$find]['next'];
                   $this->list[$find]['next']   = $this->list[$delete]['next'];
                   
               }else{
                   $this->list[$tmp]['next']    = null;
               }
            }
            
        }

    }
    
    //链表长度
    public function ListLength($L){
        
        if( isset($this->list) )
            
            return $this->size;
        
    }
    
    //链表前驱
    public function PriorElem($L,$i){
        
        if( $i<1 || $i>=$this->size ){
            
            echo '溢出';
            exit();
            
        }
        
        if( $i==1 ){
            
            echo '没有前驱';
            exit();
            
        }
        
        $tmp = $this->head;
        $j   = 1;
        
        while( $i>$j+1 ){
            
            if( $this->list[$tmp]['next'] != null ){
                
                $j++;
                $tmp = $this->list[$tmp]['next'];
            }
            
        }
        
        return $this->list[$tmp]['data'];
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
        
        $j      = 1;
        $tmp    = $this->head;
        
        while( $i>=$j ){
            
            if( $this->list[$tmp]['next'] != null ){
                
                $j++;
                $tmp = $this->list[$tmp]['next'];
            
            }
        }
        
        return $this->list[$tmp]['data'];
    }
    
    /**
     * uuid唯一码
     * mt_rand()生成更好的随机数
     * uniqid() 生成一个唯一ID
     * md5 — 计算字符串的 MD5 散列值,以 32 字符十六进制数字形式返回散列值。
     */
    
    public function uuid($prefix=''){
        
        $chars = md5(uniqid(mt_rand(),true));
        $uuid  = substr($chars,0,8).'-';
        $uuid  .= substr($chars,8,4).'-';
        $uuid  .= substr($chars,12,4).'-';
        $uuid  .= substr($chars,16,4).'-';
        $uuid  .= substr($chars,20,12);
        
        return $prefix.$uuid;
        
    }
        
}












?>