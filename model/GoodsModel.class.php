<?php

	//内容实体类
	class GoodsModel extends Model{
	    private $id;
	    private $goods_name;
	    private $attr;
	    private $thumbnail;
	    private $info;
	    private $price;
	    private $count;
	    private $limit;
	    private $freight;
	    private $color;
	    private $size;


        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        
        
        //获取商品总记录
        public function getGoodsTotal(){
            $sql="SELECT COUNT(*)  FROM cms_goods";
            return parent::total($sql);
        }
        
        
        //查询所有商品
        public function getAllGoods(){
            
            $sql="SELECT
                                    id,
                                    goods_name,
                                    price,
                                    freight,
                                    color,
                                    size,
                                    attr,
                                   date
                        FROM
                                    cms_goods
                 ORDER BY
                                     id ASC
                    $this->limit ";
            return parent::all($sql);
        }
        //新增商品  
        public function addGoods(){
            
            $sql="INSERT INTO
                                            cms_goods (
                                                            goods_name,
                                                            price,
                                                            freight,
                                                            color,
                                                            size,
                                                            count,
                                                            info,
                                                            thumbnail,
                                                            attr,
                                                            date
                                            )
                           VALUES (
                                                             '$this->goods_name',
                                                             '$this->price',
                                                             '$this->freight',
                                                             '$this->color',
                                                             '$this->size',
                                                             '$this->count',
                                                             '$this->info',
                                                             '$this->thumbnail',
                                                             '$this->attr',
                                                            NOW()
                                            )";
            return parent::aud($sql);
        }
        //修改商品信息
        public function updateGoods(){
            $sql="UPDATE
                                        cms_goods
                              SET
                                        goods_name='$this->goods_name',
                                        price='$this->price',
                                        freight='$this->freight',
                                        color='$this->color',
                                        size='$this->size',
                                        count='$this->count',
                                        info='$this->info',
                                        attr='$this->attr',
                                        thumbnail='$this->thumbnail'
                         WHERE
                                         id='$this->id'
                               LIMIT 1";
            return parent::aud($sql);
        }
        //查询单个商品
        public function getOneGoods(){
            
            $sql="SELECT
                                    id,
                                    goods_name,
                                    price,
                                    freight,
                                    color,
                                    size,
                                    attr,
                                    info,
                                    thumbnail,
                                    count
            FROM
                                   cms_goods
            WHERE
                                      id='$this->id'

            LIMIT 1";
            return parent::one($sql);
        }
        
        //获取最新商品列表
        public function getNewGoodsList(){
            $sql = "SELECT
                                    id,
                                    goods_name,
                                    price,
                                    date,
                                    info,
                                    thumbnail,
                                    count
                        FROM
                                   cms_goods
                        WHERE
                                    attr like '%新品上市%'
                ORDER BY
                                   date DESC
            ";
            return parent::all($sql);
        }
        
        //获取热卖商品列表
        public function getHotGoodsList(){
            $sql = "SELECT
                                    id,
                                    goods_name,
                                    price,
                                    date,
                                    info,
                                    thumbnail,
                                    count
                        FROM
                                   cms_goods
                        WHERE
                                    attr like '%热卖单品%'
                ORDER BY
                                   date DESC
            ";
            return parent::all($sql);
        }
        
        
        //累计商品的点击量
        public function setContentCount(){
            $sql = "UPDATE
            cms_goods
            SET
            count=count+1
            WHERE
            id='$this->id'
            LIMIT
            1";
            return parent::aud($sql);
        }
        
        
          
        //删除商品
        public function deleteGoods(){
            $sql="DELETE FROM
            cms_goods
            WHERE
            id='$this->id'
            LIMIT 1";
            return parent::aud($sql);
        }
        
        //sidebargoods
        public function getSidebarGoods(){
            
            $sql="SELECT
                                    id,
                                    price,
                                    thumbnail,
                                    date
                         FROM
                                    cms_goods
                         WHERE 
                                    id not in (select id from cms_goods where id='$this->id' )
                 ORDER BY
                                     count DESC
                            LIMIT 3";
            return parent::all($sql);
        }
        
        //加入收藏夹
        public function isCollection(){
        
        }
        //获取收藏夹中货物数量
        public function getCollectionTotal(){
          
        }
        
        
        //加入购物车
        public function isJoinCart(){
          
        }
        //获取购物车中货物数量
        public function getCartTotal(){
        
        }
        
        //查询购物车列表
        public function getCartList(){
          
       
        }
        
        //移出购物车
        public function outCart(){

        }
        
	}

?>