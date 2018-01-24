<?php  



/**
 * 调用新浪api返回当前ip地址信息
 * @param string $ip
 * @return bool|mixed
 */
function getCurrentIp($ip = ''){
    if(empty($ip)){
        $ip = getIp();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}


/**
 * 获取用户ip地址
 */
function getIp() {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    if (!ip2long($ip)) {
        $ip = '';
    }
    return $ip;
}


/**
 * 时间转化函数
 * @param $time
 * @return bool|string
 */
function smartDate($time){
    //当前时间
    $now = time();
    //今天零时零分零秒
    $today = strtotime(date('Y-m-d',$now));
    //传递时间与当前时间相差的秒数
    $diff = $now - $time;
    switch ($time) {
        case $diff < 60:
            $str = '刚刚';
            break;
        case $diff < 3600:
            $str = floor($diff / 60) .'分钟前';
            break;
        case $diff < (3600 * 8):
            $str = floor($diff / 3600) .'小时前';
            break;
        case $time > $today:
            $str = '今天' . date('H:i',$time);
            break;
        default:
            $str = date('Y-m-d H:i',$time);
            break;
    }
    return $str;
}


/*发布表情替换*/
function replace_phiz($content){
    
    preg_match_all('/\[.*?\]/is', $content, $arr);
    if ($arr[0]) {
        $phiz =F('phiz','','./data/');
        var_dump($phiz);exit;
        foreach ($arr[0] as $v) {
            foreach ($phiz as $key => $value) {
                if ($v =='['.$value.']') {
                    $content = str_replace($v, '<img="'.__ROOT__.'/Public/Images/phiz/' .$key.'.gif"/>',$content);
                break;
                }
                
            }
        }
    }
    return $content;
}

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage(&$m,$where,$pagesize=10){
    $m1=clone $m;//浅复制一个模型
    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new Think\Page($count,$pagesize);
    $p->lastSuffix=false;
    $p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录  每页<b>%LIST_ROW%</b>条  第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('pre','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');
    $p->setConfig('first','首页');
    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
    $p->parameter=I('get.');
    $m->limit($p->firstRow,$p->listRows);
    return $p;
}
?>