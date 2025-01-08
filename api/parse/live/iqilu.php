<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'jncqxw';
$n = [
    //济南
    "jncqxw" => [171,2], //长清新闻 https://iapp.jncqrm.cn/share/dHZsLTE3MS0y.html
    "jncqsh" => [171,20], //长清生活 https://iapp.jncqrm.cn/share/dHZsLTE3MS0yMA.html
    "jnjrtv" => [303,1], //济铁电视台 https://jnjapp.jntlj.com/share/dHZsLTMwMy0x.html
    "jnjyzh" => [85,1], //济阳综合 https://iapp.jiyangrongmei.cn/share/dHZsLTg1LTE.html x
    "jnjyys" => [85,2], //济阳影视 https://iapp.jiyangrongmei.cn/share/dHZsLTg1LTI.html x
    "jnlcxw" => [261,1], //历城新闻综合 https://iapp.ailicheng.cn/share/dHZsLTI2MS0x.html
    "jnpyzh" => [257,1], //平阴综合 https://app.litenews.cn/share/dHZsLTI1Ny0x.html
    "jnpyxc" => [257,3], //平阴乡村振兴 https://app.litenews.cn/share/dHZsLTI1Ny0z.html
    "jnshzh" => [97,1], //商河综合 https://iapp.shxrmtzx.com/share/dHZsLTk3LTE.html
    "jnshys" => [97,2], //商河影视 https://iapp.shxrmtzx.com/share/dHZsLTk3LTI.html
    "jnzqzh" => [195,1], //章丘综合 https://app.litenews.cn/share/dHZsLTE5NS0x.html
    "jnzqgg" => [195,2], //章丘公共 https://app.litenews.cn/share/dHZsLTE5NS0y.html
    //东营
    "dyxwzh" => [537,1], //东营新闻综合 https://ady.dongyingnews.cn/share/dHZsLTUzNy0x.html
    "dygg" => [537,3], //东营公共 https://ady.dongyingnews.cn/share/dHZsLTUzNy0z.html
    "dygg2" => [29,90], //东营公共 https://app.litenews.cn/share/dHZsLTI5LTkw.html
    "dykj" => [537,7], //东营科教, https://ady.dongyingnews.cn/share/dHZsLTUzNy03.html
    "dydyqxw" => [163,5], //东营区新闻综合 https://iapp.zhidongyingapp.com/share/dHZsLTE2My01.html
    "dydyqkj" => [163,7], //东营区科教影视 https://iapp.zhidongyingapp.com/share/dHZsLTE2My03.html
    "dygrzh" => [237,1], //广饶综合 https://iapp.grxrmtzx.com/share/dHZsLTIzNy0x.html
    "dygrkj" => [237,5], //广饶科教文艺 https://iapp.grxrmtzx.com/share/dHZsLTIzNy01.html
    "dyklxw" => [269,3], //垦利新闻综合 https://iapp.klrmt.cn/share/dHZsLTI2OS0z.html
    "dyljzh" => [153,1], //利津综合 https://iapp.lijinnews.com/share/dHZsLTE1My0x.html
    "dyljwh" => [153,3], //利津文化生活 https://iapp.lijinnews.com/share/dHZsLTE1My0z.html
    //青岛
    "qdcytv" => [403,5], //城阳综合 https://iapp.hichengyang.cn/share/dHZsLTQwMy01.html
    "qdhdzh" => [227,1], //黄岛综合 https://iapp.qwmedia.cn/share/dHZsLTIyNy0x.html
    "qdhdsh" => [227,3], //黄岛生活 https://iapp.qwmedia.cn/share/dHZsLTIyNy0z.html
    "qdjmzh" => [221,2], //即墨综合 https://iapp.jimorongmei.com/share/dHZsLTIyMS0y.html
    //"qdjmsh" => [221,3], //即墨生活服务 https://iapp.jimorongmei.com/share/dHZsLTIyMS0z.html
    "qdjzzh" => [305,1], //胶州综合 https://iapp.yunshangjiaozhou.cn/share/dHZsLTMwNS0x.html
    "qdjzsh" => [305,3], //胶州生活 https://iapp.yunshangjiaozhou.cn/share/dHZsLTMwNS0z.html
    "qdlc" => [173,1], //李沧TV https://iapp.licangmedia.cn/share/dHZsLTE3My0x.html
    "qdls" => [295,1], //崂山TV https://iapp.laoshanrongmei.cn/share/dHZsLTI5NS0x.html
    "qdlxzh" => [253,1], //莱西综合 https://iapp.laixirongmei.cn/share/dHZsLTI1My0x.html
    "qdlxsh" => [253,3], //莱西生活 https://iapp.laixirongmei.cn/share/dHZsLTI1My0z.html
    "qdpdxw" => [45,4], //平度新闻综合 https://iapp.aipingduapp.com/share/dHZsLTQ1LTQ.html
    "qdpdsh" => [45,5], //平度生活服务 https://iapp.aipingduapp.com/share/dHZsLTQ1LTU.html
    //潍坊
    "wfxwzh" => [635,1], //潍坊新闻综合 https://iapp.wfcmw.cn/share/dHZsLTYzNS0x.html
    "wfsh" => [635,5], //潍坊生活 https://iapp.wfcmw.cn/share/dHZsLTYzNS01.html
    "wfyszy" => [635,7], //潍坊影视综艺 https://iapp.wfcmw.cn/share/dHZsLTYzNS03.html
    "wfkjwl" => [635,9], //潍坊科教文旅 https://iapp.wfcmw.cn/share/dHZsLTYzNS05.html
    "wfgxq" => [421,14], //潍坊高新区 https://iapp.wegood.wang/share/dHZsLTQyMS0xNA.html
    "wfaqzh" => [137,3], //安丘综合 https://iapp.aianqiu.cn/share/dHZsLTEzNy0z.html
    "wfaqms" => [137,4], //安丘民生 https://iapp.aianqiu.cn/share/dHZsLTEzNy00.html
    "wfbhxw" => [199,1], //滨海新闻综合 https://iapp.wfbhrmt.cn/share/dHZsLTE5OS0x.html
    "wfclzh" => [1,3], //昌乐综合 https://iapp.clxrmtzx.cn/share/dHZsLTEtMw.html
    "wfcyzh" => [47,1], //昌邑综合 https://iapp.changyirongmei.com/share/dHZsLTQ3LTE.html
    "wfcyjj" => [47,2], //昌邑经济生活 https://iapp.changyirongmei.com/share/dHZsLTQ3LTI.html
    "wffzxw" => [285,1], //坊子新闻综合 https://iapp.fzqrmtzx.cn/share/dHZsLTI4NS0x.html
    "wfgmzh" => [71,24], //高密综合 https://iapp.gaominews.com/share/dHZsLTcxLTI0.html
    "wfgmdj" => [71,38], //高密党建农科 https://iapp.gaominews.com/share/dHZsLTcxLTM4.html
    "wfhtxw" => [133,1], //寒亭新闻 https://iapp.httv.cn/share/dHZsLTEzMy0x.html
    "wfkwtv" => [127,17], //奎文电视台 https://iapp.wfkwrm.com/share/dHZsLTEyNy0xNw.html
    "wflqzh" => [205,39], //临朐新闻综合 https://iapp.yunshanglinqu.cn/share/dHZsLTIwNS0zOQ.html
    "wfqzzh" => [125,2], //青州综合 https://iapp.qingzhounews.cn/share/dHZsLTEyNS0y.html
    "wfqzwh" => [125,3], //青州文化旅游 https://iapp.qingzhounews.cn/share/dHZsLTEyNS0z.html
    "wfwc" => [15,3], //潍城TV https://iapp.wcrmawckhd.cn/share/dHZsLTE1LTM.html
    "wfzczh" => [115,23], //诸城新闻综合 https://iapp.52zhucheng.cn/share/dHZsLTExNS0yMw.html
    "wfzcsh" => [115,25], //诸城生活娱乐 https://iapp.52zhucheng.cn/share/dHZsLTExNS0yNQ.html
    "wfsgzh" => [279,1], //寿光综合 https://iapp.sgrmt.com/share/dHZsLTI3OS0x.html*
    "wfsgsc" => [279,3], //寿光蔬菜 https://iapp.sgrmt.com/share/dHZsLTI3OS0z.html*
    //烟台
    "ytcd" => [175,1], //长岛TV https://iapp.changdaohao.cn/share/dHZsLTE3NS0x.html
    "ytfszh" => [189,4], //福山综合 https://iapp.fuzaifushan.cn/share/dHZsLTE4OS00.html
    "ytfssh" => [189,5], //福山生活 https://iapp.fuzaifushan.cn/share/dHZsLTE4OS01.htmlx
    "ythyzh" => [255,1], //海阳综合 https://iapp.hyzc.cn/share/dHZsLTI1NS0x.html
    "ytlkzh" => [57,1], //龙口综合 https://app.litenews.cn/share/dHZsLTU3LTE.html
    //"ytlksh" => [57,2], //龙口生活 https://app.litenews.cn/share/dHZsLTU3LTI.html
    "ytlszh" => [245,4], //莱山综合 https://app.litenews.cn/share/dHZsLTI0NS00.html
    "ytlsys" => [245,6], //莱山影视 https://app.litenews.cn/share/dHZsLTI0NS02.html
    "ytlyzh" => [241,4], //莱阳综合 https://iapp.laiyangrongmei.cn/share/dHZsLTI0MS00.html
    "ytlyms" => [241,7], //莱阳民生综艺 https://iapp.laiyangrongmei.cn/share/dHZsLTI0MS03.html
    "ytlzzh" => [239,1], //莱州综合 https://iapp.laizhourongmei.cn/share/dHZsLTIzOS0x.html
    "ytmpzh" => [281,1], //牟平综合 https://iapp.mprmt.com/share/dHZsLTI4MS0x.html
    //"ytplzh" => [109,1], //蓬莱综合 https://iapp.xianjingpenglai.cn/share/dHZsLTEwOS0x.html
    "ytplzy" => [109,2], //蓬莱综艺 https://iapp.xianjingpenglai.cn/share/dHZsLTEwOS0y.html
    "ytqxzh" => [165,12], //栖霞综合 https://iapp.aiqixiaapp.com/share/dHZsLTE2NS0xMg.html
    "ytqxpg" => [165,14], //栖霞苹果 https://iapp.aiqixiaapp.com/share/dHZsLTE2NS0xNA.html
    "ytzyzh" => [55,2], //招远综合 https://iapp.zhaoyuanrongmei.com.cn/share/dHZsLTU1LTI.html
    "ytzyzy" => [55,4], //招远综艺 https://iapp.zhaoyuanrongmei.com.cn/share/dHZsLTU1LTQ.html
    //淄博
    "zbbsxw" => [17,8], //博山新闻 https://iapp.boshanhao.cn/share/dHZsLTE3LTg.html
    "zbbstw" => [17,9], //博山图文 https://iapp.boshanhao.cn/share/dHZsLTE3LTk.html
    "zbgqzh" => [61,1], //高青综合 https://iapp.gqxrmt.cn/share/dHZsLTYxLTE.html
    "zbgqys" => [61,2], //高青影视 https://iapp.gqxrmt.cn/share/dHZsLTYxLTI.html
    "zbht1" => [23,15], //桓台综合 https://iapp.htxw.cn/share/dHZsLTIzLTE1.html
    "zbht2" => [23,16], //桓台影视 https://iapp.htxw.cn/share/dHZsLTIzLTE2.html
    "zblzxw" => [151,6], //临淄新闻综合 https://iapp.linzirongmei.cn/share/dHZsLTE1MS02.html
    "zblzsh" => [151,7], //临淄生活服务 https://iapp.linzirongmei.cn/share/dHZsLTE1MS03.html
    "zbyyzh" => [203,6], //沂源综合 https://iapp.yyrmapp.com/share/dHZsLTIwMy02.html
    "zbyysh" => [203,7], //沂源生活 https://iapp.yyrmapp.com/share/dHZsLTIwMy03.html
    "zbzcxw" => [75,1], //淄川新闻 https://iapp.zichuanrongmei.cn/share/dHZsLTc1LTE.html
    //"zbzcsh" => [75,2], //淄川生活 https://iapp.zichuanrongmei.cn/share/dHZsLTc1LTI.html
    "zbzd1" => [101,1], //张店1 https://iapp.aizhangdian.com/share/dHZsLTEwMS0x.html
    "zbzd2" => [101,6], //张店2 https://iapp.aizhangdian.com/share/dHZsLTEwMS02.html
    "zbzctv1" => [259,1], //周村新闻 https://iapp.izhoucun.cn/share/dHZsLTI1OS0x.html
    "zbzctv2" => [259,3], //周村生活 https://iapp.izhoucun.cn/share/dHZsLTI1OS0z.html
    //枣庄
    "zzstzh" => [243,1], //山亭综合 https://iapp.stqrmtzx.com/share/dHZsLTI0My0x.html
    "zzszzh" => [233,1], //枣庄市中综合 https://iapp.zzszrm.com/share/dHZsLTIzMy0x.html
    //"zztezxw" => [185,2], //台儿庄新闻综合 https://iapp.aitaierzhuang.cn/share/dHZsLTE4NS0y.html
    "zztzzh" => [103,2], //滕州综合 https://iapp.tzrmt.com/share/dHZsLTEwMy0y.html x
    "zztzms" => [103,3], //滕州民生 https://iapp.tzrmt.com/share/dHZsLTEwMy0z.html x
    "zzxcxw" => [37,8], //薛城新闻综合 https://iapp.aixuechengapp.com/share/dHZsLTM3LTg.html
    "zzyczh" => [209,1], //峄城综合 https://iapp.yilan-app.com/share/dHZsLTIwOS0x.html
    //滨州
    "bzbctv" => [249,35], //滨城TV https://iapp.binchengrongmei.com/share/dHZsLTI0OS0zNQ.html
    "bzbxzh" => [207,3], //博兴综合 https://iapp.zhihuiboxing.cn/share/dHZsLTIwNy0z.html
    "bzbxsh" => [207,4], //博兴生活 https://iapp.zhihuiboxing.cn/share/dHZsLTIwNy00.html
    "bzhmzh" => [211,2], //惠民综合 https://iapp.aihuimin.cn/share/dHZsLTIxMS0y.html
    "bzhmys" => [211,3], //惠民影视 https://iapp.aihuimin.cn/share/dHZsLTIxMS0z.html
    "bzwdzh" => [169,1], //无棣综合 https://app.litenews.cn/share/dHZsLTE2OS0x.html
    "bzwdzy" => [169,21], //无棣综艺 https://app.litenews.cn/share/dHZsLTE2OS0yMQ.html
    "bzyxxw" => [217,1], //阳信新闻综合 https://iapp.yangxinrongmei.cn/share/dHZsLTIxNy0x.html
    "bzzhzh" => [277,1], //沾化综合 https://iapp.zhanhuarongmei.cn/share/dHZsLTI3Ny0x.html
    "bzzhzy" => [277,9], //沾化综艺 https://iapp.zhanhuarongmei.cn/share/dHZsLTI3Ny05.html
    "bzzpzh" => [11,15], //邹平综合 https://iapp.zpgd.net/share/dHZsLTExLTE1.html
    "bzzpms" => [11,16], //邹平民生 https://iapp.zpgd.net/share/dHZsLTExLTE2.html
    //德州
    "dzxwzh" => [179,1], //德州新闻综合 https://iapp.dztv.tv/share/dHZsLTE3OS0x.html
    "dzjjsh" => [179,2], //德州经济生活 https://iapp.dztv.tv/share/dHZsLTE3OS0y.html
    "dztw" => [179,9], //德州图文 https://iapp.dztv.tv/share/dHZsLTE3OS05.html
    "dzlczh" => [215,6], //陵城综合 https://iapp.lxgdw.com/share/dHZsLTIxNS02.html
    "dzlczh2" => [179,36], //陵城综合2 https://iapp.dztv.tv/share/dHZsLTE3OS0zNg.html
    "dzllxw" => [267,1], //乐陵新闻综合 https://iapp.laolingrongmei.cn/share/dHZsLTI2Ny0x.html
    "dzllxw2" => [179,69], //乐陵新闻综合2 https://iapp.dztv.tv/share/dHZsLTE3OS02OQ.html
    "dzllcs" => [267,5], //乐陵城市生活 https://iapp.laolingrongmei.cn/share/dHZsLTI2Ny01.html
    "dzllcs2" => [179,71], //乐陵城市生活2 https://iapp.dztv.tv/share/dHZsLTE3OS03MQ.html
    "dzly1" => [49,3], //临邑1 https://iapp.lyxrmtzx.com/share/dHZsLTQ5LTM.html
    "dzly2" => [49,4], //临邑2 https://iapp.lyxrmtzx.com/share/dHZsLTQ5LTQ.html
    "dzly2b" => [179,52], //临邑2b https://iapp.dztv.tv/share/dHZsLTE3OS01Mg.html
    "dznjzh" => [193,1], //宁津综合 https://iapp.njxrmtzx.cn/share/dHZsLTE5My0x.html
    "dznjzh2" => [179,63], //宁津综合2 https://iapp.dztv.tv/share/dHZsLTE3OS02Mw.html
    "dzpyzh" => [19,2], //平原综合 https://iapp.pyxwapp.com/share/dHZsLTE5LTI.html
    "dzpyzh2" => [179,32], //平原综合2 https://iapp.dztv.tv/share/dHZsLTE3OS0zMg.html
    //"dzqhzh" => [251,8], //齐河综合 https://iapp.qiherongmei.com/share/dHZsLTI1MS04.html
    //"dzqhzh2" => [179,27], //齐河综合2 https://iapp.dztv.tv/share/dHZsLTE3OS0yNw.html
    "dzqyzh" => [5,9], //庆云综合 https://iapp.qyxrmtzx.cn/share/dHZsLTUtOQ.html
    "dzqyzh2" => [179,65], //庆云综合2 https://iapp.dztv.tv/share/dHZsLTE3OS02NQ.html
    "dzqysh" => [5,7], //庆云生活 https://iapp.qyxrmtzx.cn/share/dHZsLTUtNw.html
    "dzqysh2" => [179,67], //庆云生活2 https://iapp.dztv.tv/share/dHZsLTE3OS02Nw.html
    "dzwczh" => [33,4], //武城综合 https://iapp.wuchengrmtzx.cn/share/dHZsLTMzLTQ.html
    "dzwczh2" => [179,54], //武城综合2 https://iapp.dztv.tv/share/dHZsLTE3OS01NA.html
    "dzwczy" => [33,6], //武城综艺影视 https://iapp.wuchengrmtzx.cn/share/dHZsLTMzLTY.html
    "dzwczy2" => [179,58], //武城综艺影视2 https://iapp.dztv.tv/share/dHZsLTE3OS01OA.html
    "dzxjzh" => [223,1], //夏津综合 https://iapp.xjrm.com/share/dHZsLTIyMy0x.html
    "dzxjzh2" => [179,21], //夏津综合2 https://iapp.dztv.tv/share/dHZsLTE3OS0yMQ.html
    "dzxjgg" => [223,2], //夏津公共 https://iapp.xjrm.com/share/dHZsLTIyMy0y.html
    "dzxjgg2" => [179,23], //夏津公共2 https://iapp.dztv.tv/share/dHZsLTE3OS0yMw.html
    "dzyczh" => [235,1], //禹城综合 https://iapp.ycrongmeiti.cn/share/dHZsLTIzNS0x.html
    "dzyczh2" => [179,48], //禹城综合2 https://iapp.dztv.tv/share/dHZsLTE3OS00OA.html
    "dzyczy" => [235,3], //禹城综艺 https://iapp.ycrongmeiti.cn/share/dHZsLTIzNS0z.html
    "dzyczy2" => [179,50], //禹城综艺2 https://iapp.dztv.tv/share/dHZsLTE3OS01MA.html
    //菏泽
    "hzcwzh" => [131,1], //成武综合 https://iapp.cwcmc.cn/share/dHZsLTEzMS0x.html
    "hzcwzy" => [131,2], //成武综艺 https://iapp.cwcmc.cn/share/dHZsLTEzMS0y.html
    "hzcxzh" => [87,2], //曹县综合 https://iapp.caoxianrongmei.cn/share/dHZsLTg3LTI.html
    "hzdmxw" => [111,2], //东明新闻综合 https://iapp.dongmingrongmei.cn/share/dHZsLTExMS0y.html
    "hzdt1" => [27,7], //定陶新闻 https://iapp.aidingtao.cn/share/dHZsLTI3LTc.html
    "hzdt2" => [27,8], //定陶综艺 https://iapp.aidingtao.cn/share/dHZsLTI3LTg.html
    "hzjczh" => [141,186], //鄄城综合 https://iapp.juanchengrongmei.cn/share/dHZsLTE0MS0xODY.html
    "hzjyxw" => [139,1], //巨野新闻 https://iapp.juyerongmei.cn/share/dHZsLTEzOS0x.html
    "hzmdxw" => [219,6], //牡丹区新闻综合 https://iapp.hzmdrm.cn/share/dHZsLTIxOS02.html
    "hzmdzy" => [219,17], //牡丹区综艺 https://iapp.hzmdrm.cn/share/dHZsLTIxOS0xNw.html
    "hzsxzh" => [155,2], //单县综合 https://iapp.sdmlsz.com/share/dHZsLTE1NS0y.html
    "hzycxw" => [135,3], //郓城新闻 https://iapp.ycrmtzx.com.cn/share/dHZsLTEzNS0z.html
    "hzyczy" => [135,2], //郓城综艺 https://iapp.ycrmtzx.com.cn/share/dHZsLTEzNS0y.html
    //济宁
    "jijiazh" => [273,1], //嘉祥综合 https://iapp.jxtvs.cn/share/dHZsLTI3My0x.html
    "jijiash" => [273,3], //嘉祥生活 https://iapp.jxtvs.cn/share/dHZsLTI3My0z.html
    "jijxzh" => [129,2], //金乡综合 https://iapp.jxrm.net/share/dHZsLTEyOS0y.html
    "jijxsh" => [129,4], //金乡生活 https://iapp.jxrm.net/share/dHZsLTEyOS00.html
    "jilszh" => [89,1], //梁山综合 https://iapp.lsrmapp.com/share/dHZsLTg5LTE.html
    "jiqfxw" => [13,1], //曲阜新闻综合 https://iapp.jinriqufu.com/share/dHZsLTEzLTE.html
    "jircxw" => [73,8], //任城新闻综合 https://iapp.rcrmt.cn/share/dHZsLTczLTg.html
    "jircys" => [73,9], //任城影视娱乐 https://iapp.rcrmt.cn/share/dHZsLTczLTk.html
    "jissxw" => [117,5], //泗水新闻综合 https://iapp.sishuitv.com/share/dHZsLTExNy01.html
    "jisswh" => [117,6], //泗水文化生活 https://iapp.sishuitv.com/share/dHZsLTExNy02.html
    //"jiws1" => [53,4], //微山综合 https://iapp.kanweishan.cn/share/dHZsLTUzLTQ.html
    //"jiws2" => [53,5], //微山2套 https://iapp.kanweishan.cn/share/dHZsLTUzLTU.html
    "jiwszh" => [301,1], //汶上综合 https://iapp.wstvs.com/share/dHZsLTMwMS0x.html
    "jiwssh" => [301,3], //汶上生活 https://iapp.wstvs.com/share/dHZsLTMwMS0z.html
    "jiytxw" => [63,5], //鱼台新闻 https://iapp.ytxrmtzx.com/share/dHZsLTYzLTU.html
    "jiytsh" => [63,15], //鱼台生活 https://iapp.ytxrmtzx.com/share/dHZsLTYzLTE1.html
    "jiyzxw" => [231,1], //兖州新闻 https://app.litenews.cn/share/dHZsLTIzMS0x.html
    "jiyzsh" => [231,3], //兖州生活 https://app.litenews.cn/share/dHZsLTIzMS0z.html
    "jizczh" => [181,1], //邹城综合 https://iapp.zcsrmtzx.cn/share/dHZsLTE4MS0x.html
    "jizcwh" => [181,4], //邹城文化生活 https://iapp.zcsrmtzx.cn/share/dHZsLTE4MS00.html
    //聊城
    "lccpzh" => [31,6], //茌平综合 https://iapp.cprmtvs.com/share/dHZsLTMxLTY.html
    "lccpsh" => [31,8], //茌平生活 https://iapp.cprmtvs.com/share/dHZsLTMxLTg.html
    "lcdczh" => [265,1], //东昌综合 https://iapp.dcfrm.cn/share/dHZsLTI2NS0x.html
    "lcdezh" => [95,22], //东阿综合 https://iapp.decmc.cn/share/dHZsLTk1LTIy.html
    "lcdezy" => [95,29], //东阿综艺 https://iapp.decmc.cn/share/dHZsLTk1LTI5.html
    "lcgtzh" => [43,1], //高唐综合 https://iapp.gaotangrongmei.com/share/dHZsLTQzLTE.html
    "lcgtzy" => [43,5], //高唐综艺 https://iapp.gaotangrongmei.com/share/dHZsLTQzLTU.html
    "lcgxzh" => [79,1], //冠县综合 https://iapp.guanxianrongmei.com/share/dHZsLTc5LTE.html
    "lclqzh" => [65,2], //临清综合 https://iapp.lqrmtzx.cn/share/dHZsLTY1LTI.html
    "lclqjj" => [65,5], //临清经济信息 https://iapp.lqrmtzx.cn/share/dHZsLTY1LTU.html
    "lcsxzh" => [183,1], //莘县综合 https://iapp.sdsxrm.cn/share/dHZsLTE4My0x.html
    "lcsxsh" => [183,5], //莘县生活 https://iapp.sdsxrm.cn/share/dHZsLTE4My01.html
    "lcygzh" => [81,1], //阳谷综合 https://iapp.ygxrm.cn/share/dHZsLTgxLTE.html
    "lcygys" => [81,10], //阳谷影视 https://iapp.ygxrm.cn/share/dHZsLTgxLTEw.html
    //临沂
    "lyfxzh" => [41,119], //费县综合 https://iapp.feixianshoufa.cn/share/dHZsLTQxLTExOQ.html
    "lyfxsh" => [41,117], //费县生活 https://iapp.feixianshoufa.cn/share/dHZsLTQxLTExNw.html
    "lyhdzh" => [191,1], //河东综合 https://iapp.lyhedong.com/share/dHZsLTE5MS0x.html
    "lyhdys" => [191,2], //河东影视 https://iapp.lyhedong.com/share/dHZsLTE5MS0y.html
    "lyjnzh" => [105,4], //莒南综合 https://iapp.junanrongmei.cn/share/dHZsLTEwNS00.html
    "lyjnys" => [105,5], //莒南影视 https://iapp.junanrongmei.cn/share/dHZsLTEwNS01.html
    "lyllzh" => [113,131], //兰陵综合 https://iapp.llxrmtzx.com/share/dHZsLTExMy0x.html
    "lyllgg" => [113,133], //兰陵公共 https://iapp.llxrmtzx.com/share/dHZsLTExMy0y.html
    "lylszh" => [201,1], //兰山综合 https://iapp.lylsrm.cn/share/dHZsLTIwMS0x.html
    "lyls1" => [167,3], //临沭综合 https://iapp.sdlsrm.com/share/dHZsLTE2Ny0z.html
    "lyls2" => [167,4], //临沭生活 https://iapp.sdlsrm.com/share/dHZsLTE2Ny00.html
    "lylzzh" => [147,1], //罗庄综合 https://iapp.luozhuangshoufa.cn/share/dHZsLTE0Ny0x.html
    "lylzys" => [147,17], //罗庄影视 https://iapp.luozhuangshoufa.cn/share/dHZsLTE0Ny0xNw.html
    "lymy1" => [161,13], //蒙阴综合 https://iapp.mengyinshoufa.com/share/dHZsLTE2MS0xMw.html
    "lymy2" => [161,15], //蒙阴2套 https://iapp.mengyinshoufa.com/share/dHZsLTE2MS0xNQ.html
    "lypyzh" => [345,4], //平邑综合 https://iapp.pyxrmt.com.cn/share/dHZsLTM0NS00.html
    "lypysh" => [345,14], //平邑生活 https://iapp.pyxrmt.com.cn/share/dHZsLTM0NS0xNA.html
    "lytc1" => [83,1], //郯城综合 https://iapp.tanchengtv.com/share/dHZsLTgzLTE.html
    "lytc2" => [83,2], //郯城2套 https://iapp.tanchengtv.com/share/dHZsLTgzLTI.html
    "lyynzh" => [177,6], //沂南综合 https://iapp.12345yinanshoufa.cn/share/dHZsLTE3Ny02.html
    "lyynys" => [177,7], //沂南红色影视 https://iapp.12345yinanshoufa.cn/share/dHZsLTE3Ny03.html
    "lyys1" => [145,1], //沂水综合 https://app.litenews.cn/share/dHZsLTE0NS0x.html
    "lyys2" => [145,2], //沂水生活 https://app.litenews.cn/share/dHZsLTE0NS0y.html
    //日照
    "rzjx1" => [159,23], //莒县综合 https://iapp.jxrmtzx.cn/share/dHZsLTE1OS0yMw.html
    "rzjx2" => [159,27], //莒县2套 https://iapp.jxrmtzx.cn/share/dHZsLTE1OS0yNw.html
    "rzls" => [289,1], //岚山TV https://iapp.ilanshan.com/share/dHZsLTI4OS0x.html
    "rzwlzh" => [299,10], //五莲综合 https://iapp.wltvlive.cn/share/dHZsLTI5OS0xMA.html
    "rzwlwh" => [299,12], //五莲文化旅游 https://iapp.wltvlive.cn/share/dHZsLTI5OS0xMg.html
    //泰安
    "tadpzh" => [187,9], //东平综合 https://iapp.dpsjt.cn/share/dHZsLTE4Ny05.html
    "tadpms" => [187,11], //东平民生 https://iapp.dpsjt.cn/share/dHZsLTE4Ny0xMQ.html x
    "tady" => [293,1], //岱岳TV https://iapp.daiyuerongmei.cn/share/dHZsLTI5My0x.html
    "tafczh" => [51,3], //肥城综合 https://iapp.fcrmt.cn/share/dHZsLTUxLTM.html
    "tafcsh" => [51,6], //肥城生活 https://iapp.fcrmt.cn/share/dHZsLTUxLTY.html
    "tany1" => [123,1], //宁阳综合 https://iapp.nyxrmtzx.cn/share/dHZsLTEyMy0x.html
    "tany2" => [123,7], //宁阳2套 https://iapp.nyxrmtzx.cn/share/dHZsLTEyMy03.html
    "tats" => [263,1], //泰山TV https://iapp.tsqrmtzx.cn/share/dHZsLTI2My0x.html
    "taxtzh" => [59,2], //新泰综合 https://iapp.xintairongmei.cn/share/dHZsLTU5LTI.html
    "taxtxc" => [59,3], //新泰乡村 https://iapp.xintairongmei.cn/share/dHZsLTU5LTM.html
    //威海
    "whxwzh" => [157,1], //威海新闻综合 https://iapp.weihai.tv/share/dHZsLTE1Ny0x.html
    "whdssh" => [157,3], //威海都市生活 https://iapp.weihai.tv/share/dHZsLTE1Ny0z.html
    "whhy" => [157,12], //威海海洋 https://iapp.weihai.tv/share/dHZsLTE1Ny0xMg.html
    "whhczh" => [213,5], //威海环翠综合 https://iapp.whhccm.cn/share/dHZsLTIxMy01.html
    "whrczh" => [77,10], //荣成综合 https://iapp.rcsrmtzx.cn/share/dHZsLTc3LTEw.html
    "whrcsh" => [77,11], //荣成生活 https://iapp.rcsrmtzx.cn/share/dHZsLTc3LTEx.html
    "whrszh" => [143,8], //乳山综合 https://iapp.rushanrongmei.cn/share/dHZsLTE0My04.html
    "whrssh" => [143,9], //乳山生活 https://iapp.rushanrongmei.cn/share/dHZsLTE0My05.html
    "whwd1" => [91,7], //文登TV1 https://iapp.wendengsf.com/share/dHZsLTkxLTc.html
    "whwd2" => [91,8], //文登TV2 https://iapp.wendengsf.com/share/dHZsLTkxLTg.html
    ];
$d = json_decode(file_get_contents("https://app.litenews.cn/v1/app/play/tv/live?orgid=".$n[$id][0]),1);
foreach($d["data"] as $v) {
        if($n[$id][1] == $v["id"])
          $stream = $v["stream"];
          break;
          }
header("Content-Type: application/vnd.apple.mpegurl");
header('location:'.$stream);
//echo $stream;
?>
