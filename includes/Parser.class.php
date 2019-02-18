<?php

//解析类
class Parser{
    
    private $tpl;
    
    public function __construct($tpl_url){
        
        if (! $this->tpl = file_get_contents($tpl_url)){
            exit('ERRRRRRRRRRRRRRRRRRRRRRROR');
        }
       
    }
    //解析普通变量
    private  function parVar(){
        $patten = '/\{\$([a-zA-Z0-9_]+)\}/';
        if (preg_match($patten, $this->tpl)){
            $this->tpl = preg_replace($patten, "<?php echo \$this->vars['$1']; ?>", $this->tpl);
        }
    }
    
    //解析if语句
    private function parIf(){
        $pattenStartIf = '/\{if\s+\$([\w]+)\}/';
        $pattenEndIF = '/\{\/if\}/';
        $pattenElse = '/\{else\}/';
        if (preg_match($pattenStartIf, $this->tpl)){
            if (preg_match($pattenEndIF, $this->tpl)){
                $this->tpl =preg_replace($pattenStartIf, "<?php if (\$this->vars['$1']){ ?>", $this->tpl);
                $this->tpl =preg_replace($pattenEndIF, "<?php } ?>", $this->tpl);
                if (preg_match($pattenElse, $this->tpl)){
                    $this->tpl =preg_replace($pattenElse, "<?php }else{ ?>", $this->tpl);
                }
                
            }else {
                exit('ERROR:if语句没有关闭');
            }
        }
    }
    
    //解析foreach语句
    private function parForeach(){
        $pattenForeach ='/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
        $pattenEndForeach = '/\{\/foreach\}/';
        $pattenVar = '/\{@([\w]+)([\w\-\>]*)\}/';
        if (preg_match($pattenForeach, $this->tpl)){
            if (preg_match($pattenEndForeach, $this->tpl)){
                $this->tpl=preg_replace($pattenForeach, "<?php foreach (\$this->vars['$1'] as \$$2key=>\$$3) { ?>", $this->tpl);
                $this->tpl=preg_replace($pattenEndForeach, "<?php } ?>", $this->tpl);
                if (preg_match($pattenVar, $this->tpl)){
                    $this->tpl = preg_replace($pattenVar, "<?php echo \$$1$2?>", $this->tpl);
                }
            }else {
                exit('ERROR:foreach语句必须要有结束标签');
            }
        }
    }
    
    
    //解析include语句
    private function parInclude(){
        $pattenInclude ='/\{include\s+file=(\"|\')([\w\.\-]+)(\"|\')\}/';
        if (preg_match_all($pattenInclude, $this->tpl,$file)){
           foreach ($file[2] as $value){
               if (!file_exists('templates/'.$value)){
                   echo 'ERROR:包含文件出错';
               }
               $this->tpl = preg_replace($pattenInclude, "<?php \$tpl->create('$2') ?>", $this->tpl);
           }
       /*    $this->tpl = preg_replace($pattenInclude, "<?php include '$2'; ?>", $this->tpl); */
        }
    }
    
    //解析系统变量
    private function parConfig(){
        $pattenConfig = '/<!--\{([\w]+)\}-->/';
        if (preg_match($pattenConfig, $this->tpl)){
            $this->tpl = preg_replace($pattenConfig, "<?php echo \$this->config['$1'];?>", $this->tpl);
        }
    }
    
    
    //对外公共方法
    public function compile($par_Url){
        //解析模板内容
        $this->parVar();
        $this->parIf();
        $this->parForeach();
        $this->parInclude();
        $this->parConfig();
        
        if ( !file_put_contents($par_Url,$this -> tpl)){
            exit('error:编译文件生成出错！');
        }

        
    }
    
    
    
}

?>