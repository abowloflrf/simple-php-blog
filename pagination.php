<?php

/**
 * Created by PhpStorm.
 * User: ruofeng
 * Date: 2017/7/10
 * Time: 08:45
 */
class pagination
{
    private $presentPage;
    private $perPage;
    private $totalPosts;

    /**
     * pagination constructor.
     * @param $perPage
     * @param $totalPosts
     */
    public function __construct($perPage,$totalPosts)
    {
        $this->perPage = $perPage;
        $this->totalPosts=$totalPosts;
    }

    /**
     * @return int
     */
    public function getPresentPage(): int
    {
        return $this->presentPage;
    }

    /**
     * @param int $presentPage
     */
    public function setPresentPage(int $presentPage)
    {
        $this->presentPage = $presentPage;
    }

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @return mixed
     */
    public function getTotalPosts()
    {
        return $this->totalPosts;
    }

    /**
     * @param mixed $totalPosts
     */
    public function setTotalPosts($totalPosts)
    {
        $this->totalPosts = $totalPosts;
    }

    public function echoHTML(){
        $pre=$this->presentPage-1;
        $next=$this->presentPage+1;
        $lastPage=ceil($this->getTotalPosts()/$this->getPerPage());

        $pagination="";

        if($lastPage>1){
            //输出pagination的ul头标签
            $pagination.="<ul class='uk-pagination uk-flex-center' uk-margin>";
            //若page数大于1则输出previous标签
            if($this->presentPage>1){
                $pagination.="<li><a href='?page=".$pre."'>"."<span><<</span></a></li>";
            }else{
                $pagination.="<li class='uk-disabled'><a href='#'><span><<</span></a></li>";
            }
            //若page数小于10
            if ($lastPage<10){
                for ($counter=1;$counter<=$lastPage;$counter++){
                    if ($counter==$this->presentPage){
                        $pagination.="<li class='uk-active'>".$this->presentPage."</li>";
                    }else{
                        $pagination.="<li><a href='?page=".$counter."'>".$counter."</a></li>";
                    }
                }
            }elseif ($lastPage>=10){
                if($this->presentPage<5){
                    for ($counter=1;$counter<7;$counter++){
                        if ($counter==$this->presentPage){
                            $pagination.="<li class='uk-active'>".$this->presentPage."</li>";
                        }else{
                            $pagination.="<li><a href='?page=".$counter."'>".$counter."</a></li>";
                        }
                    }
                    $pagination.="<li class='uk-disabled'><span>...</span></li>";
                    $pagination.="<li><a href='?page=".($lastPage-1)."'>".($lastPage-1)."</a></li>";
                    $pagination.="<li><a href='?page=".$lastPage."'>".$lastPage."</a></li>";
                }elseif(($this->presentPage<$lastPage-3)&&($this->presentPage>4)){
                    $pagination.="<li><a href='?page=1'>1</a></li>";
                    $pagination.="<li><a href='?page=2'>2</a></li>";
                    $pagination.="<li class='uk-disabled'><span>...</span></li>";
                    for ($counter=$this->presentPage-1;$counter<$this->presentPage+2;$counter++){
                        if ($counter==$this->presentPage){
                            $pagination.="<li class='uk-active'>".$this->presentPage."</li>";
                        }else{
                            $pagination.="<li><a href='?page=".$counter."'>".$counter."</a></li>";
                        }
                    }
                    $pagination.="<li class='uk-disabled'><span>...</span></li>";
                    $pagination.="<li><a href='?page=".($lastPage-1)."'>".($lastPage-1)."</a></li>";
                    $pagination.="<li><a href='?page=".$lastPage."'>".$lastPage."</a></li>";
                }else{
                    $pagination.="<li><a href='?page=1'>1</a></li>";
                    $pagination.="<li><a href='?page=2'>2</a></li>";
                    $pagination.="<li class='uk-disabled'><span>...</span></li>";
                    for ($counter=$lastPage-5;$counter<=$lastPage;$counter++){
                        if ($counter==$this->presentPage)
                            $pagination.="<li class='uk-active'>".$this->presentPage."</li>";
                        else
                            $pagination.="<li><a href='?page=".$counter."'>".$counter."</a></li>";

                    }

                }

            }
            if($this->presentPage<$counter-1){
                $pagination.="<li><a href='?page=".$next."'>"."<span>>></span></a></li>";
            }else{
                $pagination.="<li class='uk-disabled'><a href='#'><span>>></i></span></a></li>";
            }
            $pagination.="</ul>";

        }
        return $pagination;

    }

}