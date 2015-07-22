<?php
/**
 * Created by JetBrains PhpStorm.
 * User: HieuNguyen
 * Date: 07/06/2013
 * Time: 09:09
 * To change this template use File | Settings | File Templates.
 */

class Pagenavigator {
    /**
     * @param int $page             Default $page = 1 when POST ajax $page = $_POST['page']
     * @param int $row_total        Total record return by query
     * @param int $page_size        The max record display on page LIMIT
     * @param int $pagegroup_size   The max number page display
     * @param string $url           Url when click page number
     * @param null $class
     * @param anyType $condition    The condition using in clause WHERE
     * @return string
     */
    public function navigation($page, $row_total, $page_size, $pagegroup_size, $url, $class=null,$condition=null)
    {
        $page_total = floor(($row_total - 1) / $page_size) + 1;
        if (!$page || $page > $page_total || $page < 1) {
            $page = 1;
        }
        $tem=floor($pagegroup_size/2);
        $start_page=$page-$tem;
        $end_page=$page+$tem;
        if($page<=$tem)
        {
            $start_page=1;
            $end_page=$pagegroup_size;
        }
        if ($end_page > $page_total) {
            $end_page = $page_total;
        }

        if ($page_total > 1) {
            $str = '<ul>';
            if ($end_page > $pagegroup_size) {
                $start_group = $pagegroup_size;
            } else {
                $start_group = 0;
            }
            if ($page > 2) {
                $str.= '<li><a class="pagination_num" id="page_1" style="margin-right:2px" href="'  . $url . '" >Trang đầu</a></li>';
            }
            if ($page != 1 && $page != $page_total) {
                //$str.= '<li><a class="page" style="margin: 0 3px " href="' . $url . '/' . ($page - 1) . '" ><<</a></li>';
            }

            for ($i = $start_page; $i <= $end_page; $i++) {
                $j = $i + $page_size;
                $begin = ($i - 1) * $page_size + 1;
                $end = $begin + $page_size - 1;
                if ($i == $page) {
                    $str.= "<li><a class='pagination_num active'>".$i."</a></li>";
                } else {
                    $str.= '<li><a class="pagination_num" id="page_' . $i . '"  href="' . $url . '">' . $i . '</a> </li>';
                }
            }
            if ($page_total - $end_page > $pagegroup_size) {
                $end_group = $pagegroup_size;
            } else {
                $end_group = $page_total - $end_page;
            }
            if ($page < $page_total) {
                //$str.= '<a class="page" style="margin: 0 3px 0px 0px;" href="' . $url . '/' . ($page + 1) . '" >>></a>';
            }
            if ($page_total > 2 && $page < $page_total) {
                $str.= '<li><a class="pagination_num" id="page_' . $page_total . '" href="' . $url . '" >Trang cuối</a></li>';
            }
        }
        if(!isset($str)){
            $str='';
        }
        return ($str == '') ? '' : $str.'</ul>';
    }
}