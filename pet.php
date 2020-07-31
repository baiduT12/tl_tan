<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>珍兽资质计算-2020年04月30日</title>
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
    <h2>TLBB宠物原始资质和加成资质计算</h2><h3>【Design By：<font style="color:red;">乾坤大挪移</font>区 缺月挂疏桐っ (119级 慕容)】</h3>
</div>
<div align="center" style="margin-top:1%;">
    <font style="color:red;">（如果是附体，请下掉附体后参与计算。顺便普及下普通和超灵珍兽的区别：）</font>
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'petJc.png'>
</div>
<div align="center" style="margin-top:2%;">
    示例图片1（普通珍兽，灵性10的时候，灵性加成为31%）：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'pet1.png'>
</div>
<div align="center" style="margin-top:2%;">
    示例图片2（超灵珍兽，灵性10的时候，灵性加成为34%，<font style="color:red;">因为没有那4万元宝【这就成了我永远得不到的宝宝】</font>）：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'pet2.png'>
</div>
<div align="center" style="margin-top:2%;">
    示例图片3<font style="color:red;">【我挺喜欢这根木柴的】</font>：
</div>
<div align="center" style="margin-top:1%;">
    <img src = 'pet3.png'>
</div>
<div align="center" style="margin-top:1%;"><hr style = 'width:60%;';size="5px" noshade= true /></div>
<div id="area">
    <div id="small_menu">
        <ul>
            <li><a href="index.php" target ="_blank">门派转换</a></li>
<!--            <li><a href="pet.php" target ="_blank">珍兽计算</a></li>-->
            <li><a href="http://www.baidu.com" target ="_blank">百度一下</a></li>
<!--            <li><a href="#">item three</a></li>-->
        </ul>
    </div>
<!--    <div id="on" onclick="xuanfu();"><p>➕</p></div>-->
    <div id="on" onclick="xuanfu();"><p>点<br/>我</p></div>
</div>
<div align="center" style="margin-top:2%;color:blue;">
    <b>I.请填写当前珍兽的基本信息：</b>
</div>
<!--<form  action="tran_info.php" method="post">-->
    <div align="center" style="margin-top:1%;">
        A.&nbsp;&nbsp;&nbsp;是否是超灵珍兽：
        <select name="ifChaoN" style="width:150px;" id="ifChaoN">
            <option value=""  style="color:red;">请选择</option>
            <option value="1">是</option>
            <option value="2">否</option>
        </select>
        <div align="center" style="margin-top:1%;">B.&nbsp;&nbsp;&nbsp;当前悟性【填写数值0-10，参照示例图片3，填8，不填默认为0】：<input type="text" name="nowWuX" id="nowWuX"/></div>
        <div align="center" style="margin-top:1%;">C.&nbsp;&nbsp;&nbsp;当前灵性【填写数值0-10，参照示例图片3，填6，不填默认为0】：<input type="text" name="nowNingX" id="nowNingX"/></div>
        <div align="center" style="margin-top:1%;">D.&nbsp;&nbsp;&nbsp;当前力量资质【参照示例图片3，填2938，不填默认为0】：<input type="text" name="nowLiL" id="nowLiL"/></div>
        <div align="center" style="margin-top:1%;">E.&nbsp;&nbsp;&nbsp;当前灵气资质【参照示例图片3，填1070，不填默认为0】：<input type="text" name="nowNingQ" id="nowNingQ"/></div>
        <div align="center" style="margin-top:1%;">F.&nbsp;&nbsp;&nbsp;当前体力资质【参照示例图片3，填2156，不填默认为0】：<input type="text" name="nowTiL" id="nowTiL"/></div>
        <div align="center" style="margin-top:1%;">G.&nbsp;&nbsp;&nbsp;当前定力资质【参照示例图片3，填1480，不填默认为0】：<input type="text" name="nowDingL" id="nowDingL"/></div>
        <div align="center" style="margin-top:1%;">H.&nbsp;&nbsp;&nbsp;当前身法资质【参照示例图片3，填1911，不填默认为0】：<input type="text" name="nowShenF" id="nowShenF"/></div>
    </div>
    <div align="center" style="margin-top:1%;"><hr style = 'width:30%;';size="5px" noshade= true /></div>
    <div align="center" style="margin-top:2%;color:blue;">
        <b>II.请填写你要打造成的目标：</b>
    </div>
    <div align="center" style="margin-top:0.5%;color:red;">
        <b>官方对灵性是调整过的，最开始灵性10加成23%，这种特殊宝宝就不给你们计算了</b>
    </div>
    <div align="center" style="margin-top:1%;">I.&nbsp;&nbsp;&nbsp;目标悟性【填写数值0-10，如填10，不填默认为0】：<input type="text" name="tarWuX" id="tarWuX"/></div>
    <div align="center" style="margin-top:1%;">J.&nbsp;&nbsp;&nbsp;目标灵性【填写数值0-10，如填10，不填默认为0】：<input type="tarNingX" name="tarNingX" id="tarNingX"/></div>
    <div align="center" style="margin-top:1%;" ><input type="button" style="border:1px solid #FF9933;background-color:green;width:200px;height:40px;color:white;" id="getInfo" value="点击进行计算" /></div>
<!--</form>-->
<div align="center" style="margin-top:1%;"><hr style = 'width:30%;';size="5px" noshade= true /></div>
<div align="center" style="margin-top:2%;color:blue;">
    <b>III.系统计算出的信息如下：</b>
</div>
<div align="center" style="margin-top:1%;color:green;">
    <b>宝宝 悟性0 灵性0时候的裸资质如下：</b>
</div>
<div align="center" style="margin-top:1%;">K.&nbsp;&nbsp;&nbsp;力量资质：<span style="color:blue;" id="oriLiL">暂无</span></div>
<div align="center" style="margin-top:1%;">L.&nbsp;&nbsp;&nbsp;灵气资质：<span style="color:blue;" id="oriNingQ">暂无</span></div>
<div align="center" style="margin-top:1%;">M.&nbsp;&nbsp;&nbsp;体力资质：<span style="color:blue;" id="oriTiL">暂无</span></div>
<div align="center" style="margin-top:1%;">N.&nbsp;&nbsp;&nbsp;定力资质：<span style="color:blue;" id="oriDingL">暂无</span></div>
<div align="center" style="margin-top:1%;">O.&nbsp;&nbsp;&nbsp;身法资质：<span style="color:blue;" id="oriShenF">暂无</span></div>
<div align="center" style="margin-top:1%;color:green;">
    <b>根据你填写的要打造成的目标，计算后的资质如下：</b>
</div>
<div align="center" style="margin-top:1%;">P.&nbsp;&nbsp;&nbsp;力量资质：<span style="color:red;" id="tarLiL">暂无</span></div>
<div align="center" style="margin-top:1%;">Q.&nbsp;&nbsp;&nbsp;灵气资质：<span style="color:red;" id="tarNingQ">暂无</span></div>
<div align="center" style="margin-top:1%;">R.&nbsp;&nbsp;&nbsp;体力资质：<span style="color:red;" id="tarTiL">暂无</span></div>
<div align="center" style="margin-top:1%;">S.&nbsp;&nbsp;&nbsp;定力资质：<span style="color:red;" id="tarDingL">暂无</span></div>
<div align="center" style="margin-top:1%;">T.&nbsp;&nbsp;&nbsp;身法资质：<span style="color:red;" id="tarShenF">暂无</span></div>
<script>
    // 嵌套在页面中，文档初始化时加载。

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

    $("#getInfo").click(function(){
        // 判断填写的内容值有没有进行填写
        var ifChaoN = Number($("#ifChaoN").val()); // 是否超灵
        var nowWuX = $("#nowWuX").val() ? Number($("#nowWuX").val()) : 0; // 当前悟性
        var nowNingX = $("#nowNingX").val() ? Number($("#nowNingX").val()) : 0; // 当前灵性
        var nowLiL = $("#nowLiL").val() ? Number($("#nowLiL").val()) : 0; // 当前力量
        var nowNingQ = $("#nowNingQ").val() ? Number($("#nowNingQ").val()) : 0; // 当前灵气
        var nowTiL = $("#nowTiL").val() ? Number($("#nowTiL").val()) : 0; // 当前体力
        var nowDingL = $("#nowDingL").val() ? Number($("#nowDingL").val()) : 0; // 当前定力
        var nowShenF = $("#nowShenF").val() ? Number($("#nowShenF").val()) : 0; // 当前身法
        var tarWuX = $("#tarWuX").val() ? Number($("#tarWuX").val()) : 0; // 新的悟性
        var tarNingX = $("#tarNingX").val() ? Number($("#tarNingX").val()) : 0; // 新的灵性
        // 如果不填写，默认为0
        if(!ifChaoN){alert('请选择是否是超灵珍兽!!!');}
        if(nowWuX < 0 || nowWuX > 10){alert('请填写正确的悟性数值!');}
        if(nowNingX < 0 || nowNingX > 10 ){alert('请填写正确的灵性数值!');}
        if(!nowLiL && !nowNingQ && !nowTiL && !nowDingL && !nowShenF){alert('当前力量、灵气、体力、定力、身法资质必须要填写一个哦！');}
        // ifChaoN = 2;
        // nowWuX = 8;
        // nowNingX = 0;
        // nowLiL =  2938;
        // nowNingQ =  1070;
        // nowTiL = 2156;
        // nowDingL = 1480;
        // nowShenF = 1911;
        // tarWuX = 0;
        // tarNingX = 0;
        getInfo(ifChaoN,nowWuX,nowNingX,nowLiL,nowNingQ,nowTiL,nowDingL,nowShenF,tarWuX,tarNingX);
    });

    function getInfo(ifChaoN,nowWuX,nowNingX,nowLiL,nowNingQ,nowTiL,nowDingL,nowShenF,tarWuX,tarNingX){
        // 根据传来的数值，求得 除去灵性后，悟性加成后的数值。
        var  wuXLiLJc = getNumJc(nowNingX,ifChaoN,nowLiL); // 力量数值。

        var  wuXNingQJc = getNumJc(nowNingX,ifChaoN,nowNingQ); // 灵气数值。
        var  wuXTiLJc = getNumJc(nowNingX,ifChaoN,nowTiL); // 体力数值。
        var  wuXDingLJc = getNumJc(nowNingX,ifChaoN,nowDingL); // 定力数值。
        var  wuXShenFJc = getNumJc(nowNingX,ifChaoN,nowShenF); // 身法数值。

        // 获取原始的各项资质
        var oriLiL = getOriNum(nowWuX,wuXLiLJc);
        var oriNingQ = getOriNum(nowWuX,wuXNingQJc);
        var oriTiL= getOriNum(nowWuX,wuXTiLJc);
        var oriDingL = getOriNum(nowWuX,wuXDingLJc);
        var oriShenF = getOriNum(nowWuX,wuXShenFJc);


        // 获取目标加成的各项数值
        var tarLiL = getTarNum(tarWuX,tarNingX,ifChaoN,oriLiL);
        var tarNingQ = getTarNum(tarWuX,tarNingX,ifChaoN,oriNingQ);
        var tarTiL= getTarNum(tarWuX,tarNingX,ifChaoN,oriTiL);
        var tarDingL = getTarNum(tarWuX,tarNingX,ifChaoN,oriDingL);
        var tarShenF = getTarNum(tarWuX,tarNingX,ifChaoN,oriShenF);

        // 给页面上面原始的数据进行赋值
        $("#oriLiL").empty();
        $("#oriLiL").append(oriLiL);
        $("#oriNingQ").empty();
        $("#oriNingQ").append(oriNingQ);
        $("#oriTiL").empty();
        $("#oriTiL").append(oriTiL);
        $("#oriDingL").empty();
        $("#oriDingL").append(oriDingL);
        $("#oriShenF").empty();
        $("#oriShenF").append(oriShenF);

        // 给页面上面最终目标的数据进行赋值
        $("#tarLiL").empty();
        $("#tarLiL").append(tarLiL);
        $("#tarNingQ").empty();
        $("#tarNingQ").append(tarNingQ);
        $("#tarTiL").empty();
        $("#tarTiL").append(tarTiL);
        $("#tarDingL").empty();
        $("#tarDingL").append(tarDingL);
        $("#tarShenF").empty();
        $("#tarShenF").append(tarShenF);
    }


    // 获取悟性加成后的数值
    function getNumJc(nowNingX,ifChaoN,$num){
        var resNum = 0;
        var  nxArr1 = [1,3,5,7,12,15,20,24,28,34]; // 超灵灵性加成的数组。10个元素
        var  nxArr2 = [1,2,4,7,11,14,18,22,26,31]; // 普通灵性加成的数组。10个元素
        if(nowNingX !== 0 && $num){
            for(var i = 0; i <= 10;i++){
                if(i == nowNingX){
                    if(ifChaoN == 1){
                        resNum = $num / ((100 + nxArr1[i-1]) / 100);
                    }else if(ifChaoN == 2){
                        resNum = $num / ((100 + nxArr2[i - 1]) / 100);
                    }
                    if(resNum !== 0){resNum = Math.ceil(resNum);}
                }
            }
        }else{
            resNum = $num;
        }
        if($num == 1944){
            alert(resNum);return;
        }
        return resNum;
    }


    // 获取各项裸的数值
    function getOriNum(nowWuX,$num){
        var resNum = 0;
        var  wxArr = [1,1.5,2.1,3,8,11,14.5,23.5,30,39.3]; // 悟性加成的数组。10个元素
        if(nowWuX !== 0 && $num){
            for(var i = 0; i <= 10;i++){
                if(i == nowWuX){
                    resNum = $num / ((100 + wxArr[i - 1]) / 100);
                }
            }
            if(resNum !== 0){resNum = Math.ceil(resNum);}
        }else{
            resNum = $num;
        }
        return resNum;
    }


    // 获取目标数值
    function getTarNum(tarWuX,tarNingX,ifChaoN,$oriNum){
        var resNum1 = 0;
        var resNum2 = 0;
        var  wxArr = [1,1.5,2.1,3,8,11,14.5,23.5,30,39.3]; // 悟性加成的数组。10个元素
        var  nxArr1 = [1,3,5,7,12,15,20,24,28,34]; // 超灵灵性加成的数组。10个元素
        var  nxArr2 = [1,2,4,7,11,14,18,22,26,31]; // 普通灵性加成的数组。10个元素
        // 算出新悟性加成后的数值
        if(tarWuX !== 0 && $oriNum){
            for(var i = 0; i <= 10;i++){
                if(i == tarWuX){
                    resNum1 = $oriNum * ((100 + wxArr[i - 1]) / 100);
                }
            }
            if(resNum1 !== 0){resNum1 = Math.floor(resNum1);}
        }else{
            resNum1 = $oriNum;
        }

        // 算出新的灵性加成后的数值
        if(tarNingX !== 0 && resNum1){
            for(var i = 0; i <= 10;i++){
                if(i == tarNingX){
                    if(ifChaoN == 1){
                        resNum2 = resNum1 *  ((100 + nxArr1[i-1]) / 100);
                    }else if(ifChaoN == 2){
                        resNum2 = resNum1 *  ((100 + nxArr2[i - 1]) / 100);
                    }
                }
            }
            if(resNum2 !== 0){resNum2 = Math.floor(resNum2);}
        }else{
            resNum2 = resNum1;
        }
       return resNum2;
    }
</script>
</body>
</html>