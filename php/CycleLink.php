<?php 
/**
 * 结点对象
 */
class Node{
    
    public $data;
    public $link;
    
    public function __construct($data=null,$link=null){
        
        $this->data = $data;
        $this->link = $link;
    }
  
}
class CycleLink{
    
    public $head;
    
    public function __construct($data,$link=null){
        
        $this->head = new Node($data,$link);
        $this->head->link = $this->head;
    }
    
    public function insertLink($data){
        
        $p = new Node($data);
        $q = $this->head->link;
        $r = $this->head;
       
        if( $q == $r){
            $q->link = $p;
            $p->link = $q;
            return ;
        }
        
        while($q!= $this->head){
            $r=$q;
            $q=$q->link;
        }
        
        $r->link = $p;
        $p->link = $this->head;
    }
}











?>