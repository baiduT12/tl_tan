<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>门派转换-2020年03月16日</title>
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
<div align="center">
    <h2>TLBB门派转换及人物潜力点重新分配——数据预测系统</h2><h3>【Design By：<font style="color:red;">乾坤大挪移</font>区 缺月挂疏桐っ (119级 慕容)】</h3>
</div>
<div align="center" style="margin-top:1%;color:red;">
    注：此系统只能给你一个大致的数据，人物重新洗点也可以用我这个工具
</div>
<div align="center" style="margin-top:0.5%;color:red;">
    （注：暂无桃花岛的满修炼加成相关数据，桃花岛满修炼加成目前暂以天山加成为标准）
</div>
<div align="center" style="margin-top:2%;">
    示例图片1（你们一看就知道这是谁了，勿喷( ゜- ゜)つロ）：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'show1.png'>
</div>
<div align="center" style="margin-top:2%;">
    示例图片2（当天畅易阁评分最高的一个号,<span><b  style="color:red;">这个号真便宜！</b><span/>我要搬砖几年才能买得起哈哈）( ゜- ゜)つロ：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'show2.png'>
</div>
<div align="center" style="margin-top:1%;color:red;">
    <b>（畅易阁的角色面板和上面的示例图1是一样的状态，可直接参照上图，照着输入哦!!!）</b>
</div>
<div align="center" style="margin-top:2%;">
    示例图片3（非满等级，满修炼的号）：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'show3.png'>
</div>
<div align="center" style="margin-top:3%;"><hr style = 'width:60%;';size="5px" noshade= true /></div>
<div id="area">
    <div id="small_menu">
        <ul>
<!--            <li><a href="index.php" target ="_blank">门派转换</a></li>-->
            <li><a href="pet.php" target ="_blank">珍兽计算</a></li>
            <li><a href="http://www.baidu.com" target ="_blank">百度一下</a></li>
            <!--            <li><a href="#">item three</a></li>-->
        </ul>
    </div>
    <!--    <div id="on" onclick="xuanfu();"><p>➕</p></div>-->
    <div id="on" onclick="xuanfu();"><p>点<br/>我</p></div>
</div>
<div align="center" style="margin-top:2%;color:blue;">
    <b>I.请填写原门派的基本信息（页面请谅解^_^）：</b>
</div>
<form  action="tran_info.php" method="post">
    <div align="center" style="margin-top:1%;">
        A1.&nbsp;&nbsp;&nbsp;人物角色原门派：
        <select name="oldRole" style="width:150px;">
            <option value=""  style="color:red;">选择门派</option>
            <option value="1">峨眉</option>
            <option value="2">丐帮</option>
            <option value="3">鬼谷</option>
            <option value="4">明教</option>
            <option value="5">慕容</option>
            <option value="6">少林</option>
            <option value="7">天龙</option>
            <option value="8">唐门</option>
            <option value="9">天山</option>
            <option value="10">武当</option>
            <option value="11">星宿</option>
            <option value="12">逍遥</option>
            <option value="13">桃花岛</option>
        </select>
    </div>
    <div align="center" style="margin-top:1%;">
        B1.&nbsp;&nbsp;&nbsp;是否吃了2颗潜力丹且满等级、满修炼、满心法【即全满】：
        <select name="ifSanM" id="ifSanM" style="width:150px;">
            <option value="3"  style="color:red;">请选择</option>
            <option value="1">是</option>
            <option value="2">否</option>
        </select>
        <div align="center" style="margin-top:0.5%;"><span style="color: red;">(这个选项很重要，会影响后台对人物修炼加成的数值判断，请仔细填写。多切换几次下拉框，即可出现非全满的输入选项)</span></div>
    </div>
    <div id="showTab1" style="">
        <div align="center" style="margin-top:1%;">
            C1.&nbsp;&nbsp;&nbsp;原门派的角色加点方式：
            <select name="oldAddBit" style="width:150px;">
                <option value=""  style="color:red;">选择加点方式</option>
                <option value="1">全体力加点</option>
                <option value="2">全身法加点</option>
            </select>
        </div>
        <div align="center" style="margin-top:3%;"><hr style = 'width:30%;';size="5px" noshade= true /></div>
    </div>
    <div id="showTab2" style="display:none;">
        <div align="center" style="margin-top:1%;">A2.&nbsp;&nbsp;&nbsp;人物等级：<input type="text" name="roleLv" /></div>
        <div align="center" style="margin-top:0.5%;">(参照示例图3填：89)</div>
        <div align="center" style="margin-top:1%;">
            角色是否吃了潜力丹：
            <select name="ifEatDan" style="width:150px;">
                <option value=""  style="color:red;">选择潜力丹选项</option>
                <option value="2">我吃了2颗(多了70点潜力点)</option>
                <option value="1">我吃了1颗(多了35点潜力点)</option>
                <option value="3">我是1颗都没有吃的靓仔/靓妹( ゜- ゜)つロ</option>
            </select>
        </div>
        <div align="center" style="margin-top:1%;">B2.&nbsp;&nbsp;&nbsp;修炼的体力加成数值：<input type="text" name="xLHpAddNum1" /></div>
        <div align="center" style="margin-top:0.5%;">(参照示例图3填：131&nbsp;&nbsp;即体力括号后面+的那个数值)</div>
        <div align="center" style="margin-top:1%;">C2.&nbsp;&nbsp;&nbsp;修炼的身法加成数值：<input type="text" name="xLSfAddNum1" /></div>
        <div align="center" style="margin-top:0.5%;">(参照示例图3填：313&nbsp;&nbsp;即身法括号后面+的那个数值)</div>
        <div align="center" style="margin-top:0.5%;"><span style="color: red;">(注：非三满号，按修炼的体力加成、修炼的身法加成数值 两者中高的，判断原门派的加点方式)</span></div>
        <div align="center" style="margin-top:3%;"><hr style = 'width:30%;';size="5px" noshade= true /></div>
    </div>
    <div align="center" style="margin-top:2%;color:blue;">
        <b>II.原门派各项数据的相关信息：</b>
    </div>
    <div align="center" style="margin-top:1%;">D.&nbsp;&nbsp;&nbsp;角色裸血量【珍兽不附体且无任何状态下】：<input type="text" name="oldHp" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：1057574，示例图2填：1449884)</div>
    <div align="center" style="margin-top:1%;">E.&nbsp;&nbsp;&nbsp;角色的体力点数【珍兽不附体且无任何状态下】：<input type="text" name="hpNum" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例1图填：9545，示例图2填：14621)</div>
    <div align="center" style="margin-top:1%;">F.&nbsp;&nbsp;&nbsp;角色的身法点数【珍兽不附体且无任何状态下】：<input type="text" name="shenfNum" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：2649，示例图2填：4421)</div>
    <div align="center" style="margin-top:1%;">G.&nbsp;&nbsp;&nbsp;角色裸命中【珍兽不附体且无任何状态下】：<input type="text" name="oldMz" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：83577，示例图2填：111669)</div>
    <div align="center" style="margin-top:1%;">H.&nbsp;&nbsp;&nbsp;角色裸闪避【珍兽不附体且无任何状态下】：<input type="text" name="oldShanB" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：23693，示例图2填：34583)</div>
    <div align="center" style="margin-top:1%;">I.&nbsp;&nbsp;&nbsp;角色裸会心攻击【珍兽不附体且无任何状态下】：<input type="text" name="oldHuiX" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：280，示例图2填：521)</div>
    <div align="center" style="margin-top:1%;">J.&nbsp;&nbsp;&nbsp;角色裸会心防御【珍兽不附体且无任何状态下】：<input type="text" name="oldHuiF" /></div>
    <div align="center" style="margin-top:0.5%;">(参照示例图1填：179，示例图2填：455)</div>
    <div align="center" style="margin-top:1%;">K.&nbsp;&nbsp;&nbsp;龙纹的血上限加成数值：<input type="text" name="longWPer" value="20"/></div>
    <div align="center" style="margin-top:0.5%;">(如加20%血上限则填：20，如不填写，默认20)</div>
    <div align="center" style="margin-top:1%;">L.&nbsp;&nbsp;&nbsp;神器的血上限加成数值：<input type="text" name="shenQPer" value="17"/></div>
    <div align="center" style="margin-top:0.5%;">(如加16%血上限则填：16，如不填写，默认17)</div>
    <div align="center" style="margin-top:1%;">M.&nbsp;&nbsp;&nbsp;暗器的血上限加成数值：<input type="text" name="anQPer" value="12" /></div>
    <div align="center" style="margin-top:0.5%;">(如加12%血上限则填：12，如不填写，默认12)</div>
    <div align="center" style="margin-top:3%;"><hr style = 'width:60%;';size="5px" noshade= true /></div>
    <div align="center" style="margin-top:2%;color:blue;">
        <b>III.请填写新门派的相关信息：</b>
    </div>
    <div align="center" style="margin-top:0.5%;color:red;">
        <b>如果前后选择的门派一样，但是潜力加点方式不同，则系统会给你算出人物潜力点重新分配后的数据</b>【通俗的讲就是角色洗点后的数据】
    </div>
    <div align="center" style="margin-top:1%;">
        N.&nbsp;&nbsp;&nbsp;要转换成的新门派：
        <select name="newRole" style="width:150px;">
            <option value=""  style="color:red;">选择门派</option>
            <option value="1">峨眉</option>
            <option value="2">丐帮</option>
            <option value="3">鬼谷</option>
            <option value="4">明教</option>
            <option value="5">慕容</option>
            <option value="6">少林</option>
            <option value="7">天龙</option>
            <option value="8">唐门</option>
            <option value="9">天山</option>
            <option value="10">武当</option>
            <option value="11">星宿</option>
            <option value="12">逍遥</option>
            <option value="13">桃花岛</option>
        </select>
    </div>
    <div align="center" style="margin-top:1%;">
        O.&nbsp;&nbsp;&nbsp;新门派的角色加点方式：
        <select name="newAddBit" style="width:150px;">
            <option value=""  style="color:red;">选择加点方式</option>
            <option value="1">全体力加点</option>
            <option value="2">全身法加点</option>
        </select>
    </div>
    <div align="center" style="margin-top:2%;" ><input type="submit" style="border:1px solid #FF9933;background-color:green;width:200px;height:40px;color:white;" value="点击进行转换预测" /></div>
</form>

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


    $("#ifSanM").change(function(){
        showTab();
    });

    function showTab(){
        var ifSanM = $("#ifSanM").val();
        if(ifSanM == 1){
            // 三满且吃了2颗潜力丹
            $("#showTab1").css('display','');
            $("#showTab2").css('display','none');
        }else{
            $("#showTab1").css('display','none');
            $("#showTab2").css('display','');
        }
    }

</script>
</body>
</html>