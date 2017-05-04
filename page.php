<?php

function getPage($totalRows, $listRows, $rollPage, $url, $nowPage) {

    //计算第一行,即偏移量
    $firstRow = $listRows * ($nowPage - 1);
    //计算总页数
    $totalPages = ceil($totalRows / $listRows);
    if (!empty($totalPages) && $nowPage > $totalPages) {
        $nowPage = $totalPages;
    }
    //计算分页临时变量
    $now_cool_page = $rollPage / 2;
    $now_cool_page_ceil = ceil($now_cool_page);

    //上一页
    $up_page = $nowPage - 1;
    $up_href = $up_page > 0 ? '<li><a class="prev" href="' . $url . '?page=' . $up_page . '"/>上一页</a></li>' : '';

    //下一页
    $down_page = $nowPage + 1;
    $down_url = $down_page < $totalPages ? '<li><a class="next" href="' . $url . '?page=' . $down_page . '"/>下一页</a></li>' : $totalPages;

    //第一页
    $first_page = 1;
    if ($totalPages > $rollPage && ($nowPage - $now_cool_page) >= 1) {
        $the_first = '<li><a class="first" href="' . $url . '?page=' . $first_page . '">1...</a></li>';
    }

    //最后一页
    $the_end = $totalPages;
    if ($totalPages > $rollPage && ($nowPage + $now_cool_page) < $totalPages) {
        $the_end = '<li><a class="end" href="' . $url . '?page=' . $totalPages . '">...' . $totalPages . '</a></li>';
    }
    //数字连接
    $link_page = "";
    for ($i = 1; $i <= $rollPage; $i++) {
        if (($nowPage - $now_cool_page) <= 0) {
            $page = $i;
        } elseif (($nowPage + $now_cool_page - 1) >= $totalPages) {
            $page = $totalPages - $rollPage + $i;
        } else {
            $page = $nowPage - $now_cool_page_ceil + $i;
        }
        if ($page > 0 && $page != $nowPage) {

            if ($page <= $totalPages) {
                $link_page .= '<li><a class="num" href="' .$url.'?page=' .$page . '">' . $page . '</a></li>';
            } else {
                break;
            }
        } else {
            if ($page > 0 && $totalPages != 1) {
                $link_page .= '<li><span class="current active">' . $page . '</span></li>';
            }
        }
    }
    return $up_href . $the_first . $link_page . $the_end . $down_url;
}


    ?>
