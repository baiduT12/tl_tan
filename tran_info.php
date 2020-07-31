<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TLBB门派转换-2020年03月16日</title>
    <title></title>
</head>
<body>
<script src="jquery-1.9.1.min.js"></script>
<style type="text/css">
    #area{
        position:fixed;
        width:160px;
        right:-160px;
        top:27%;
    }
    #small_menu ul {
        list-style: none;
    }
    #area #on{
        position: absolute;
        top: 40%;
        right: 100%;
        width: 80px;
        height: 80px;
        cursor: pointer;
        border-radius: 30px;
        background-color: rgba(13, 143, 143, 0.2);
    }
    #area #on p{
        font-size:30px;
        text-align:center;
        margin-top:-6px;
        color:#01E290;
    }
    #area #small_menu {
        width:100%;
    }
    #area #small_menu ul li {
        width:100%;
        height: 44px;
        text-align:left;
        background-color: rgba(2, 27, 38, 0.62);
        border-top: 1px solid #043B46;
        line-height: 44px;
    }
    #area #small_menu ul li a{
        text-decoration: none;
        margin-left:30px;
        color: #bfbfbf;
        font-size:16px;
        font-family: 'Microsoft Yahei';
    }
    #area #small_menu li.active {
        width: 156px;
        background-color: rgba(2, 27, 38, 0.87);
        border-left: 4px solid #00ffff;
        border-top: 0px;
    }
    #area #small_menu li.active a{
        color: #00ffff;
    }

    #area #small_menu ul li:hover {
        width: 156px;
        background-color: rgba(2, 27, 38, 0.87);
        border-left: 4px solid #00ffff;

    }
    #area #small_menu ul li:hover a{
        color: #00ffff;
    }
</style>
<!--<div style="margin-top:1%;">-->
<!--    <a target="_blank" onClick="javascript :history.back(-1);"><span style="color:red;">A.&nbsp;&nbsp;&nbsp;点击这里&nbsp;返回上一页面，重新选择（会保留之前填写的表单框内容！推荐）</span></a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="index.php">B.&nbsp;&nbsp;&nbsp;打开一个新的计算输入界面（里面无任何之前填写的数值哦！不推荐）</a>-->
<!--</div>-->
<div id="area">
    <div id="small_menu">
        <ul>
            <li><a onClick="javascript :history.back(-1);">门派转换</a></li>
            <li><a href="pet.php" target ="_blank">珍兽计算</a></li>
            <li><a href="http://www.baidu.com" target ="_blank">百度一下</a></li>
            <!--            <li><a href="#">item three</a></li>-->
        </ul>
    </div>
    <!--    <div id="on" onclick="xuanfu();"><p>➕</p></div>-->
    <div id="on" onclick="xuanfu();"><p>点<br/>我</p></div>
</div>
<script>
    // 这里写js切换栏的代码
    var menubox = document.getElementById("area"); //area为菜单栏的id
    var cli_on = document.getElementById("on"); //on为按钮
    var flag = false, timer = null, initime = null, r_len = 0;

    if(menubox.style.right=== 0){
        flag = true;
    }
    else{
        flag = false;
    }
    cli_on.onclick = function () {
        //为on按钮绑定click事件
        clearTimeout(initime);
        //根据状态flag执开展开收缩
        if (flag) {
            r_len = 0;
            timer = setInterval(slideright, 10);
        } else {
            r_len = -160;
            timer = setInterval(slideleft, 10);
        }
    }
    // 展开
    function slideright() {
        if (r_len <= -160) {
            clearInterval(timer);
            flag = !flag;
            return false;
        }else{
            r_len -= 5;
            menubox.style.right = r_len + 'px';
        }
    }
    // 收缩
    function slideleft() {
        if (r_len >= 0) {
            clearInterval(timer);
            flag = !flag;
            return false;
        } else {
            r_len += 5;
            menubox.style.right = r_len + 'px';
        }
    }

</script>
</body>
</html>



<?php
// 需求：天龙八部门派转换主要面板数据的计算
// 29->30 1点。30级到39 1点，39->40 2点，40到49 2点，49->50 3点。50往后3点。还有个人物潜力丹，吃完加70点。否则30-49级一共30点，49-119级一共210点。

// 根据等级算出总的加点点数
function getAddNum($roleLv){
    $addCount = 0;
    if($roleLv < 1){
        echo '<pre/>';
        echo '<div style="margin-top:1%;color: red;"><h2>错误提示：</h2></div><br/>';
        echo '<div style="color: blue;"><h2>请正确填写等级</h2></div><br/>';
        exit;
    }
   if($roleLv > 49){
       $baseAdd = 30;
       $addCount = $baseAdd + ($roleLv - 49) * 3;
   }elseif($roleLv > 39){
       $baseAdd = 10;
       $addCount = $baseAdd + ($roleLv - 39) * 2;
   }elseif($roleLv > 29){
       $baseAdd = 0;
       $addCount = $roleLv - 29;
   }
   return $addCount;
}


// 定义一个打印输出的函数
function prePrint($data){
    echo '<pre/>';
    echo '<div style="margin-top:1%;color: red;"><h2>错误提示：</h2></div><br/>';
    echo '<div style="color: blue;"><h2>请在刚才的页面上填写：'.$data.'</h2></div><br/>';
    exit;
}

// 初始化原有的参数
$addCount = 310; // 满级加点的加点数量
// 原有门派。峨眉、丐帮、鬼谷、明教、慕容、少林、天龙、唐门、天山、武当、星宿、逍遥、桃花 分别对应1-13
$oldRole = isset($_POST['oldRole']) ? $_POST['oldRole'] : ''; // 原门派类型
$ifSanM = isset($_POST['ifSanM']) ? $_POST['ifSanM'] : ''; // 是否三满，1 是，2 否
$oldAddBit = isset($_POST['oldAddBit']) ? $_POST['oldAddBit'] : ''; // 原先的加点方式，1为体力，2为身法
$roleLv = isset($_POST['roleLv']) ? $_POST['roleLv'] : ''; // 等级
$ifEatDan = isset($_POST['ifEatDan']) ? $_POST['ifEatDan'] : ''; // 是否吃了潜力丹。1：吃了1颗  2：吃了2颗  3：一颗也没吃
$xLHpAddNum1 = isset($_POST['xLHpAddNum1']) ? $_POST['xLHpAddNum1'] : ''; // 原门派的体力修炼加成数值
$xLSfAddNum1 = isset($_POST['xLSfAddNum1']) ? $_POST['xLSfAddNum1'] : ''; // 原门派的身法修炼加成数值
$oldHp = isset($_POST['oldHp']) ? $_POST['oldHp'] : '';  // 原先的裸血量
$hpNum = isset($_POST['hpNum']) ? $_POST['hpNum'] : ''; // 人物角色的体力点数
$shenfNum = isset($_POST['shenfNum']) ? $_POST['shenfNum'] : ''; // 人物角色的身法点数
$oldMz = isset($_POST['oldMz']) ? $_POST['oldMz'] : ''; // 原先的命中
$oldShanB = isset($_POST['oldShanB']) ? $_POST['oldShanB'] : ''; // 原先的闪避
$oldHuiX = isset($_POST['oldHuiX']) ? $_POST['oldHuiX'] : '';  // 原先的会心攻击
$oldHuiF  = isset($_POST['oldHuiF']) ? $_POST['oldHuiF'] : ''; // 原先的会心防御
$longWPer = isset($_POST['longWPer']) ? $_POST['longWPer'] : 20; // 龙纹的血上限加成数值(10级为20%)，默认为20
$shenQPer = isset($_POST['shenQPer']) ? $_POST['shenQPer'] : 17; // 神器的血上限加成数值(九星为17%)，默认为17
$anQPer = isset($_POST['anQPer']) ? $_POST['anQPer'] : 12; // 暗器的血上限加成数值(完美的为12%)，默认为12
$newRole = isset($_POST['newRole']) ? $_POST['newRole'] : ''; // 新门派类型
$newAddBit = isset($_POST['newAddBit']) ? $_POST['newAddBit'] : ''; // 新的加点方式

// 测试数据的演示：
//$oldRole = 5;
//$oldAddBit = 1;
//$oldHp = 1066490;
//$hpNum = 9667;
//$shenfNum = 2623;
//$oldMz = 81630;
//$oldShanB = 23585;
//$oldHuiX = 262;
//$oldHuiF = 178;
//$newRole = 8;
//$newAddBit = 2;
$checkArr1 = [$oldRole,$oldHp,$hpNum,$shenfNum,$oldMz,$oldShanB,$oldHuiX,$oldHuiF,$newRole,$newAddBit];
$checkTitle = ['原角色门派','珍兽不附体且无任何状态下的血量','角色的体力点数','角色的身法点数','珍兽不附体且无任何状态下的命中',
    '珍兽不附体且无任何状态下的闪避','珍兽不附体且无任何状态下的会心攻击','珍兽不附体且无任何状态下的会心防御','要转换成的新门派','新门派的角色加点方式'];
// 对参数进行校验，判断哪个参数没有进行填写
foreach($checkArr1 as $key=>$parm){
    if(!$parm){
        $tip = '【'.$checkTitle[$key].'】-这个选项';
        prePrint($tip);
    }
}


// 单独验证
if(!$ifSanM){
    $tip = '【原门派是否三满】-这个选项';
    prePrint($tip);
}

if($ifSanM == 1 && !$oldAddBit) {
    $tip = '【原门派的加点方式】-这个选项';
    prePrint($tip);
}


if($ifSanM == 2){
    if(!$oldRole){
       $tip = '【原门派的角色等级】-这个选项';
       prePrint($tip);
    }
    if(!$xLHpAddNum1){
        $tip = '【原门派的体力修炼加成数值】-这个选项';
        prePrint($tip);
    }
    if(!$xLSfAddNum1){
        $tip = '【原门派的身法修炼加成数值】-这个选项';
        prePrint($tip);
    }
}

// 初始化新的参数
$newHp = '';// 新的裸血量
$newHp2 = '';// 新的加上暗器护体后的血量
$newMz = ''; // 新的命中
$newShanB = ''; // 新的闪避
$newHuiX = '';// 新的会心攻击
$newHuiF  = ''; // 新的会心防御

// 定义官方给出的数据信息
// 定义门派：峨眉、丐帮、鬼谷、明教、慕容、少林、天龙、唐门、天山、武当、星宿、逍遥、桃花 分别对应1-13，其中桃花的数据不齐全，修炼加成乱写的
$roleTyArr = [1,2,3,4,5,6,7,8,9,10,11,12,13];
/////////顺序依次是1-13对应的门派(桃花的数值暂时未知)///////////
// 修炼：体力加点，加的体力数值
$hpAddArr1 = [802,929,943,887,845,1016,801,845,846,801,887,845,846];
// 修炼：体力加点，加的身法数值
$sfAddArr1 = [128,214,256,172,254,130,216,258,256,128,86,214,256];
// 修炼：身法加点，加的体力数值
$hpAddArr2 = [260,386,400,344,302,473,258,302,303,258,344,302,303];
//  修炼：身法加点，加的身法数值
$sfAddArr2 = [671,757,799,715,797,673,759,801,799,671,629,757,799];
// 定义1点体力对应的血量加成。
$hpShowArr = [50,60,58,56,60,70,58,55,55,44,52,50,53];
// 定义1点身法对应的命中加成。
$mzShowArr = [7.5,8,7.8,7.5,7.5,6.5,9,8.5,8,7,6,7.5,9];
// 定义1点身法对应的闪避加成。
$shanBShowArr = [2,4,3.5,3,4,2,3,3,3.3,2.5,3,4,3];
// 定义门派：峨眉、丐帮、鬼谷、明教、慕容、少林、天龙、唐门、天山、武当、星宿、逍遥、桃花 分别对应1-13，其中桃花的数据不齐全，修炼加成乱写的
// 定义1点身法对应的会心加成。全部按照官方给的数据和实际自己测试来计算的。个人观测慕容是0.05，而不是官方给的0.044
$huiXShowArr = [0.04,0.06,0.05,0.06,1/20,0.04,0.03,1/15,0.067,0.05,0.06,0.05,0.06];
// 定义1点身法对应的会防加成。个人观测唐门会防是0.05，而不是官方给的0.06
$huiFShowArr = [0.04,0.06,0.05,0.06,1/20,0.04,0.03,1/20,0.067,0.05,0.06,0.05,0.06];


// 获取此角色的各项加成数值
foreach($roleTyArr as $key=>$thisRole){
    if($oldRole == $thisRole){
        $thisHpShow1 = $hpShowArr[$key]; // 当前角色的体力加成
        $thisMzShow1 = $mzShowArr[$key]; // 当前角色的命中加成
        $thisShanBShow1 = $shanBShowArr[$key]; // 当前角色的闪避加成
        $thisHuiXShow1 = $huiXShowArr[$key]; // 当前角色的会心攻击加成
        $thisHuiFShow1 = $huiFShowArr[$key]; // 当前角色的会心防御加成
        if($ifSanM == 1){
          // 已经三满
            $roleLv = 119;
            $addCount = 310;
            if($oldAddBit == 1){
                // 体力加成
                // A.人物基础的体力点数
                $baseHpNum = $hpNum - $addCount;
                // B.人物基础的身法点数
                $baseSfNum = $shenfNum;
                // C.人物修炼加的体力点数
                $xLHpAddNum1 = $hpAddArr1[$key];
                // D.人物修炼加的身法点数
                $xLSfAddNum1 = $sfAddArr1[$key];
                // E.人物体力的加点数
                $hpAddCount1 = $addCount;
                // F,人物身法的加点数
                $sfAddCount1 = 0;
            }elseif($oldAddBit == 2){
                // 身法加成
                // A.人物基础的体力点数
                $baseHpNum = $hpNum;
                // B.人物基础的身法点数
                $baseSfNum = $shenfNum - $addCount;
                // C.人物修炼加的体力点数
                $xLHpAddNum1 = $hpAddArr2[$key];
                // D.人物修炼加的身法点数
                $xLSfAddNum1 = $sfAddArr2[$key];
                // E.人物体力的加点数
                $hpAddCount1 = 0;
                // F,人物身法的加点数
                $sfAddCount1 = $addCount;
            }
            break; // 中断循环
        }else{
            $eatDanNum = 0;
            if($ifEatDan == 1){
                $eatDanNum = 35; // 吃了一颗加了35点
            }elseif($ifEatDan == 2){
                $eatDanNum = 70; // 吃了一颗加了70点
            }
            // 当前等级 系统免费给的潜力点数
            $addCount1 = getAddNum($roleLv);

            // 一共自行分配的潜力点数
            $addCount = $eatDanNum + $addCount1;

            if($xLHpAddNum1 > $xLSfAddNum1){
                // 体力加点
                // A.人物基础的体力点数
                $baseHpNum = $hpNum - $addCount;
                // B.人物基础的身法点数
                $baseSfNum = $shenfNum;
                // E.人物体力的加点数
                $hpAddCount1 = $addCount;
                // F,人物身法的加点数
                $sfAddCount1 = 0;
            }else{
                // 身法加点

                // A.人物基础的体力点数
                $baseHpNum = $hpNum;
                // B.人物基础的身法点数
                $baseSfNum = $shenfNum - $addCount;
                // E.人物体力的加点数
                $hpAddCount1 = 0;
                // F,人物身法的加点数
                $sfAddCount1 = $addCount;
            }

        }
    }
}

// 正式对数值进行进行计算
////////////////////////////////////////////////////老门派的各项加成////////////////////////////////////////////////////
// G.人物基础血上限
$allOldHpNum = $baseHpNum + $xLHpAddNum1 + $hpAddCount1; // 基本数值(总数减去了加点数值) + 修炼数值 + 加点数值。好像天龙里面的体力值都是向上取整的，从暗器成长和加成的数值可以看到
// $baseHp = $oldHp - ($allOldHpNum) * $thisHpShow1 * ((100 + $longWPer + $shenQPer) / 100); // 老算法先注销
$baseHp = $oldHp -  $thisHpShow1* ($allOldHpNum  + ceil($allOldHpNum  * ($longWPer / 100))+ ceil($allOldHpNum * ($shenQPer / 100)));

// 原门派角色加上暗器护体后的状态后的血量
// $oldHp2 = $oldHp +  ($allOldHpNum) * $thisHpShow1 * ($anQPer / 100);  // 老算法先注销
$oldHp2 = $oldHp +  $thisHpShow1 * ceil($allOldHpNum * ($anQPer / 100));
// H.人物基础命中
$baseMz = $oldMz - ($baseSfNum + $xLSfAddNum1 + $sfAddCount1) * $thisMzShow1;
// I.人物基础闪避
$baseShanB = $oldShanB - ($baseSfNum + $xLSfAddNum1 + $sfAddCount1) * $thisShanBShow1;
// J.人物基础会心攻击，假设人物本来装备加的会心是30，身法加了20.9  那么最终显示还是50，而不是51
$baseHx1 = $oldHuiX - ($baseSfNum + $xLSfAddNum1 + $sfAddCount1) * $thisHuiXShow1; // 按照身法加成计算出来的，参与新面板的计算
$baseHx2 = ceil($baseHx1);
// K.人物基础会心防御
$baseHf1 = $oldHuiF - ($baseSfNum + $xLSfAddNum1 + $sfAddCount1) * $thisHuiFShow1; // 按照身法加成计算出来的，参与新面板的计算
$baseHf2 = ceil($baseHf1);


////////////////////////////////////////////////////新门派的各项加成////////////////////////////////////////////////////
// 获取此角色的各项加成数值
foreach($roleTyArr as $key=>$thisRole){
    if($newRole == $thisRole){
        $thisHpShow2 = $hpShowArr[$key]; // 新角色的体力加成
        $thisMzShow2 = $mzShowArr[$key]; // 新角色的命中加成
        $thisShanBShow2 = $shanBShowArr[$key]; // 新角色的闪避加成
        $thisHuiXShow2 = $huiXShowArr[$key]; // 新角色的会心攻击加成
        $thisHuiFShow2 = $huiFShowArr[$key]; // 新角色的会心防御加成
        // 新门派加成的最大值
        $xLHpAddNumMax = $hpAddArr1[$key]; // 体力加成最大值
        $xLSfAddNumMax = $sfAddArr2[$key]; // 身法加成最大值
        if($ifSanM == 1){

            $addCount = 310;
            if($newAddBit == 1){
                // 体力加成
                // C.人物修炼加的体力点数
                $xLHpAddNum2 = $hpAddArr1[$key];
                // D.人物修炼加的身法点数
                $xLSfAddNum2 = $sfAddArr1[$key];
                // E.人物体力的加点数
                $hpAddCount2 = $addCount;
                // F,人物身法的加点数
                $sfAddCount2 = 0;
            }elseif($newAddBit == 2){
                // 身法加成
                // C.人物修炼加的体力点数
                $xLHpAddNum2 = $hpAddArr2[$key];
                // D.人物修炼加的身法点数
                $xLSfAddNum2 = $sfAddArr2[$key];
                // E.人物体力的加点数
                $hpAddCount2 = 0;
                // F,人物身法的加点数
                $sfAddCount2 = $addCount;
            }
            break; // 中断循环
        }else{
            if($newAddBit == 1){
                // 体力加点 体力取两者中的最大值
                if($xLHpAddNum1 > $xLSfAddNum1){
                    // 原体力加点
                    // C.人物修炼加的体力点数
                    $xLHpAddNum2 = $xLHpAddNum1;
                    // D.人物修炼加的身法点数
                    $xLSfAddNum2 = $xLSfAddNum1;
                }else{
                    // 原身法加点
                    // C.人物修炼加的体力点数
                    $xLHpAddNum2 = $xLSfAddNum1;
                    // D.人物修炼加的身法点数
                    $xLSfAddNum2 = $xLHpAddNum1;
                }
                // E.人物体力的加点数
                $hpAddCount2 = $addCount;
                // F,人物身法的加点数
                $sfAddCount2 = 0;
            }elseif($newAddBit == 2){
                // 身法加点 身法取两者中的最大值
                if($xLHpAddNum1 < $xLSfAddNum1){
                    // 原身法加点
                    // C.人物修炼加的体力点数
                    $xLHpAddNum2 = $xLHpAddNum1;
                    // D.人物修炼加的身法点数
                    $xLSfAddNum2 = $xLSfAddNum1;
                }else{
                    // 原体力加点
                    // C.人物修炼加的体力点数
                    $xLHpAddNum2 = $xLSfAddNum1;
                    // D.人物修炼加的身法点数
                    $xLSfAddNum2 = $xLHpAddNum1;
                }
                // E.人物体力的加点数
                $hpAddCount2 = 0;
                // F,人物身法的加点数
                $sfAddCount2 = $addCount;
            }
            // 对最大值的限制
            if($xLHpAddNum2 > $xLHpAddNumMax){
                $xLHpAddNum2 = $xLHpAddNumMax;
            }

            if($xLSfAddNum2 > $xLSfAddNumMax){
                $xLSfAddNum2 = $xLSfAddNumMax;
            }
            break; // 中断循环

        }
    }
}


// L.新的人物裸血上限
$allONewHpNum = $baseHpNum + $xLHpAddNum2 + $hpAddCount2;
// $newHp = $baseHp + ($baseHpNum + $xLHpAddNum2 + $hpAddCount2) * $thisHpShow2 * ((100 + $longWPer + $shenQPer) / 100); // 老算法先注销
$newHp = $baseHp + $thisHpShow2 * (($allONewHpNum) + ceil(($allONewHpNum * $longWPer / 100)) + ceil($allONewHpNum * $shenQPer / 100));
// M.新的人物加上暗器护体后的血上限
// $newHp2 = $newHp + ($baseHpNum + $xLHpAddNum2 + $hpAddCount2) * $thisHpShow2 * ($anQPer / 100); // 老算法先注销
$newHp2 = $newHp + $thisHpShow2 * ceil(($allONewHpNum * $anQPer / 100)); // 老算法先注销

// N.人物新的命中
$newMz = $baseMz + ($baseSfNum + $xLSfAddNum2 + $sfAddCount2) * $thisMzShow2;

// O.人物基础闪避
$newShanB = $baseShanB + ($baseSfNum + $xLSfAddNum2 + $sfAddCount2) * $thisShanBShow2;
// P.人物新的会心攻击
$newHuiX = floor($baseHx1 + ($baseSfNum + $xLSfAddNum2 + $sfAddCount2) * $thisHuiXShow2);
// Q.人物新的会心防御
$newHuiF = floor($baseHf1 + ($baseSfNum + $xLSfAddNum2 + $sfAddCount2) * $thisHuiFShow2);

// 定义显示的文字
$sanMText = '未知';
if($ifSanM == 1){
    $sanMText = '是';
}else{
    $sanMText = '否';
}

// 经过计算得出：
echo '<div style="margin-top:1%;color: blue;"></div><br/>';
echo '<span style="margin-top:0.5%;font-size: 18px;"><b>A.&nbsp;&nbsp;&nbsp;原门派的角色装备、修炼、宝石、宝鉴、精通、真元等加成数据如下：<br/>&nbsp;&nbsp;&nbsp;（这个你们无需知道是什么意思，哈哈…）</b></span><br/>';
echo '<div style="margin-top:0.5%;color: blue;"></div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色等级为：'.$roleLv.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色是否三满且吃了全部潜力丹：'.$sanMText.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的当前等级能够自由分配的潜能点数为：'.$addCount.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的基础体力点数【除去自由分配的潜能点数】为：'.$baseHpNum.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的基础身法点数【除去自由分配的潜能点数】为：'.$baseSfNum.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色---【除去所有体力加成后的裸血，即修炼，心法，装备的血上限，真元血上限加成给角色加的】裸血为：'.ceil($baseHp).'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色---【除去所有身法加成后的裸命中，即修炼，心法，装备带的命中，命中宝石给角色加的】裸命中为：'.ceil($baseMz).'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色---【除去所有身法加成后的裸闪避，即修炼，心法，装备都带的闪避，闪避宝石给角色加的】裸闪避为：'.ceil($baseShanB).'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色---【即所有装备，心法，修炼直接加成的】裸会心攻击为：'.$baseHx2.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色---【即所有装备，心法，修炼直接加成】裸会心防御为：'.$baseHf2.'</div><br/>';
echo '<div style="margin-top:1%;color: blue;"></div><br/>';
echo '<span style="margin-top:0.5%;font-size: 18px;"><b>B.&nbsp;&nbsp;&nbsp;原门派的角色相关计算数据如下：<br/>&nbsp;&nbsp;&nbsp;（即前一个页面你自行填写的数据，方便和下面对比）</b></span><br/>';
echo '<div style="margin-top:0.5%;color: blue;"></div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色裸血量----【珍兽不附体且无任何状态下】为：'.$oldHp.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的人物血量----【珍兽不附体，但是加上90暗器技能-暗器护体后血量】为：'.floor($oldHp2).'<br/><span style="color:red;"><b>(可以下掉珍兽附体并使用暗器护体技能看下，大概数值应该和这个差不多)</b></span></div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色裸命中----【珍兽不附体且无任何状态下】为：'.$oldMz.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色裸闪避----【珍兽不附体且无任何状态下】为：'.$oldShanB.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色裸会心攻击----【珍兽不附体且无任何状态下】为：'.$oldHuiX.'</div><br/>';
echo '<div style="margin-top:0.5%;color: blue;">原门派的角色裸会心防御----【珍兽不附体且无任何状态下】为：'.$oldHuiF.'</div><br/>';
echo '<div style="margin-top:0.5%;"><h3>C.&nbsp;&nbsp;&nbsp;新门派的角色数据预测如下：</h3></div><br/>';
// 加上三满的判断
if($ifSanM == 1 ){
    echo '<div style="margin-top:0.5%;color: red;">新门派的人物修炼的体力加成数值为---【由于您三满，按照三满数值 + 】：'.$xLHpAddNum2.'点</div><br/>';
    echo '<div style="margin-top:0.5%;color: red;">新门派的人物修炼的身法加成数值为---【由于您三满，按照三满数值 + 】：'.$xLSfAddNum2.'点</div><br/>';
}else{
    echo '<div style="margin-top:0.5%;color: red;">新门派的人物修炼的体力加成数值为---【由于您未三满，无法知道你具体的心法和修炼，按照之前填写的数值给您预测+】：'.$xLHpAddNum2.'点</div><br/>';
    echo '<div style="margin-top:0.5%;color: red;">新门派的人物修炼的身法加成数值为---【由于您未三满，无法知道你具体的心法和修炼，按照之前填写的数值给您预测+】：'.$xLSfAddNum2.'点</div><br/>';
}
echo '<div style="margin-top:0.5%;color: green;">新门派的人物裸血量----【珍兽不附体且人物无任何状态】为：'.floor($newHp).'</div><br/>';
echo '<div style="margin-top:0.5%;color: green;">新门派的人物血量----【珍兽不附体，但是加上90暗器技能-暗器护体后血量】为：'.floor($newHp2).'</div><br/>';
echo '<div style="margin-top:0.5%;color: green;">新门派的人物裸命中----【珍兽不附体且人物无任何状态】为：'.floor($newMz).'</div><br/>';
echo '<div style="margin-top:0.5%;color: green;">新门派的人物裸闪避----【珍兽不附体且人物无任何状态】为：'.floor($newShanB).'</div><br/>';
echo '<div style="margin-top:0.5%;color: green;">新门派的人物裸会心攻击----【珍兽不附体且人物无任何状态】为：'.$newHuiX.'</div><br/>';
echo '<div style="margin-top:0.5%;color: green;">新门派的人物裸会心防御----【珍兽不附体且人物无任何状态】为：'.$newHuiF.'</div><br/>';
echo '<span style="margin-top:0.5%;color: red;">(注：以上数据均是无附体和无任何状态下的数据，如有附体和状态加成，请在以上数据上自行加上)</span>';
echo '<br/>';
echo '<div style="margin-top:1%;color: blue;">(如：此网站计算出命中数值为10万，附体加命中0.3万，则人物最终附体状态下命中为10.3万)</div>';
exit;
?>
