<?php

	//内容实体类
	class CartModel extends Model{
	    private $u_id;
	    private $g_id;
	    private $j_id;
	    private $c_id;
	    private $thumbnail;
	    private $price;
	    private $num;
	    private $time;


        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        

        //加入收藏夹
        public function collection(){
            $sql="INSERT INTO
                                            cms_carts ( 
                                                                u_id,
                                                                c_id,
                                                                time
                                                               )
                                            VALUES (
                                                                  '$this->u_id',
                                                                  '$this->c_id',
                                                                    NOW()
                                                                )";
            return parent::aud($sql);
        }
        //获取收藏夹中货物数量
        public function getCollectionTotal(){
            $sql="SELECT COUNT(c_id)  FROM cms_carts WHERE u_id = '$this->u_id'  ";
            return parent::total($sql);
        }
        
        
        //加入购物车
        public function joinCart(){
            $sql="INSERT INTO
                                            cms_carts (
                                                                u_id,
                                                                 j_id,
                                                                color,
                                                                size,
                                                                num,
                                                                time
                                            )
                                                VALUES (
                                                                '$this->u_id',
                                                                '$this->j_id',
                                                                 '$this->color',
                                                                 '$this->size',
                                                                '$this->num',
                                                                NOW()
                                                )";
                            return parent::aud($sql);
        }
        //获取购物车中货物数量
        public function getCartNumberTotal(){
            $sql="SELECT 
                                    COUNT(*)  
                         FROM 
                                    cms_carts 
                       WHERE 
                                    u_id = '$this->u_id' 
                            AND 
                                    j_id != 0
                                                 ";
            return parent::total($sql);
        }
        
        //查询购物车列表 
        public function getCartList(){
          $sql = " SELECT 
                                g.id,
                                g.goods_name,
                                g.price,
                                g.thumbnail,
                                c.color,
                                c.size,
                                c.num
                     FROM
                                cms_goods g,
                                cms_carts c
                  WHERE
                                g.id = c.j_id
                    AND 
                                c.u_id = '$this->id'            
                                  ";
          return parent::all($sql);
        }
    //转入收藏
        public function updateCart(){
            $sql = "UPDATE
                                         cms_carts
                                SET
                                          c_id ='$this->id',
                                           j_id = ''
                                WHERE
                                          g_id='$this->id'
                                    AND
                                           u_id = '$this->u_id'
                                LIMIT
                                           1";
            return parent::aud($sql);
        }
        
        //移出购物车
        public function outCart(){
            $sql = "DELETE FROM
            cms_carts
            WHERE
            j_id='$this->id'
            LIMIT
            1";
            return parent::aud($sql);
        }
        
   
        
	}

?>