<?php
// 确立当前php文件的编码格式
header('Content-Type:text/html;charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";

// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE library1";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library1";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
mysqli_query($conn, "set names utf8");
// 使用 sql 创建数据表
$sql1 = "CREATE TABLE admin (
/*id INT(6) AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL*/
     `admin_id` int(11) NOT NULL,
    `password` varchar(15) DEFAULT NULL
)";//管理员
$sql1_1 = "INSERT INTO `admin` (`admin_id`, `password`) VALUES ('123456', '123456');";

if (mysqli_query($conn, $sql1)) {
    echo "数据表admin创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql1_1)) {
    echo "管理员数据插入成功\n";
} else {
    echo "插入失败: " . mysqli_error($conn);
}

$sql2 = "CREATE TABLE `book_info`

(
    `book_id`      bigint(20) NOT NULL,
    `name`         nvarchar(50)    DEFAULT NULL,
    `author`       varchar(50)    DEFAULT NULL,
    `publish`      varchar(50)    DEFAULT NULL,
    `ISBN`         varchar(13)    DEFAULT NULL,
    `introduction` text,
    `language`     varchar(10)    DEFAULT NULL,
    `price`        decimal(10, 2) DEFAULT NULL,
    `pubdate`      date DEFAULT NULL,
    `class_id`     int(11) DEFAULT NULL,
    `pressmark`    int(11) DEFAULT NULL,
    `state`        smallint(6) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";//图书信息

$sql2_insert = "INSERT INTO `book_info` (`book_id`, `name`, `author`, `publish`, `ISBN`, `introduction`, `language`, `price`, `pubdate`,
                         `class_id`, `pressmark`, `state`)
VALUES (10000001, '大雪中的山庄', '东野圭吾', '北京十月文艺出版社', '9787530216835',
        '东野圭吾长篇小说杰作，中文简体首次出版。一出没有剧本的舞台剧，为什么能让七个演员赌上全部人生.东野圭吾就是有这样过人的本领，能从充满悬念的案子写出荡气回肠的情感，在极其周密曲折的同时写出人性的黑暗与美丽。 一家与外界隔绝的民宿里，七个演员被要求住满四天，接受导演的考验，但不断有人失踪。难道这并非正常排练，而是有人布下陷阱要杀他们。 那时候我开始喜欢上戏剧和音乐，《大雪中的山庄》一书的灵感就来源于此。我相信这次的诡计肯定会让人大吃一惊。——东野圭吾',
        '中文', '35.00', '2017-06-01', '9', '13', '1'),
       (10000003, '三生三世 十里桃花', '唐七公子 ', '沈阳出版社', '9787544138000',
        '三生三世，她和他，是否注定背负一段纠缠的姻缘？三生三世，她和他，是否终能互许一个生生世世的承诺？', '中文', '26.80', '2009-01-06', 7, 2, 1),
       (10000004, '何以笙箫默', '顾漫 ', '朝华出版社', '9787505414709',
        '一段年少时的爱恋，牵出一生的纠缠。大学时代的赵默笙阳光灿烂，对法学系大才子何以琛一见倾心，开朗直率的她拔足倒追，终于使才气出众的他为她停留驻足。然而，不善表达的他终于使她在一次伤心之下远走他乡……', '中文',
        '15.00', '2007-04-03', 7, 2, 1),
       (10000005, '11处特工皇妃', '潇湘冬儿', '江苏文艺出版社', '9787539943893',
        '《11处特工皇妃(套装上中下册)》内容简介：她是国安局军情十一处惊才绝艳的王牌军师——收集情报、策划部署、进不友好国家布置暗杀任务……她运筹帷幄之中，决胜于千里之外，堪称军情局大厦的定海神针。', '中文',
        '74.80', '2011-05-05', 7, 2, 1),
       (10000006, '人类简史', '[以色列] 尤瓦尔·赫拉利 ', '中信出版社', '9787508647357',
        '十万年前，地球上至少有六种不同的人但今日，世界舞台为什么只剩下了我们自己？从只能啃食虎狼吃剩的残骨的猿人，到跃居食物链顶端的智人，从雪维洞穴壁上的原始人手印，到阿姆斯壮踩上月球的脚印，从认知革命、农业革命，到科学革命、生物科技革命，我们如何登上世界舞台成为万物之灵的？从公元前1776年的《汉摩拉比法典》，到1776年的美国独立宣言，从帝国主义、资本主义，到自由主义、消费主义，从兽欲，到物欲，从兽性、人性，到神性，我们了解自己吗？我们过得更快乐吗？我们究竟希望自己得到什么、变成什么？',
        '英文', '68.00', '2014-11-01', 11, 3, 1),
       (10000007, '明朝那些事儿（1-9）', '当年明月 ', '中国海关出版社', '9787801656087',
        '《明朝那些事儿》讲述从1344年到1644年，明朝三百年间的历史。作品以史料为基础，以年代和具体人物为主线，运用小说的笔法，对明朝十七帝和其他王公权贵和小人物的命运进行全景展示，尤其对官场政治、战争、帝王心术着墨最多。作品也是一部明朝政治经济制度、人伦道德的演义。',
        '中文', '358.20', '2009-04-06', 11, 3, 1),
       (10000010, '经济学原理（上下）', '[美] 曼昆 ', '机械工业出版社', '9787111126768',
        '此《经济学原理》的第3版把较多篇幅用于应用与政策，较少篇幅用于正规的经济理论。书中主要从供给与需求、企业行为与消费者选择理论、长期经济增长与短期经济波动以及宏观经济政策等角度深入浅出地剖析了经济学家们的世界观。',
        '英文', '88.00', '2003-08-05', 6, 5, 1),
       (50000004, '方向', '马克-安托万·马修 ', '后浪丨北京联合出版公司', '9787020125265',
        '《方向》即便在马修的作品中也算得最独特的：不着一字，尽得风流。原作本无一字，标题只是一个→，出版时才加了个书名Sens——既可以指“方向”，也可以指“意义”。 《方向》没有“字”，但有自己的语言——请读者在尽情释放想象力和独立思考之余，破解作者的密码，听听作者对荒诞的看法。',
        '中文', '99.80', '2017-04-01', 9, 13, 1),
       (50000005, '画的秘密', '马克-安托万·马修 ', '北京联合出版公司·后浪出版公司', '9787550265608',
        '一本关于友情的疗伤图像小说，直击人内心最为隐秘的情感。 一部追寻艺术的纸上悬疑电影，揭示命运宇宙中奇诡的真相。 ★ 《画的秘密》荣获欧洲第二大漫画节“瑞士谢尔漫画节最佳作品奖”。 作者曾两度夺得安古兰国际漫画节重要奖项。 ★ 《画的秘密》是一部罕见的、结合了拼贴、镜像、3D等叙事手法的实验型漫画作品。作者巧妙地调度光线、纬度、时间、记忆，在一个悬念重重又温情治愈的故事中，注入了一个有关命运的哲学议题。',
        '中文', '60.00', '2016-01-01', 9, 13, 1),
       (50000007, '造彩虹的人', '东野圭吾 ', '北京十月文艺出版社', '9787530216859',
        '其实每个人身上都会发光，但只有纯粹渴求光芒的人才能看到。 从那一刻起，人生会发生奇妙的转折。功一高中退学后无所事事，加入暴走族消极度日；政史备战高考却无法集中精神，几近崩溃；辉美因家庭不和对生活失去勇气，决定自杀。面对糟糕的人生，他们无所适从，直到一天夜里，一道如同彩虹的光闯进视野。 凝视着那道光，原本几乎要耗尽的气力，源源不断地涌了出来。一切又开始充满希望。打起精神来，不能输。到这儿来呀，快来呀——那道光低声呼唤着。 他们追逐着呼唤，到达一座楼顶，看到一个人正用七彩绚烂的光束演奏出奇妙的旋律。 他们没想到，这一晚看到的彩虹，会让自己的人生彻底转...',
        '中文', '39.50', '2017-06-01', 9, 13, 1),
       (50000008, '控方证人', '阿加莎·克里斯蒂 ', '新星出版社', '9787513325745',
        '经典同名话剧六十年常演不衰； 比利•怀尔德执导同名电影，获奥斯卡金像奖六项提名！ 阿加莎对神秘事物的向往大约来自于一种女性祖先的遗传，在足不出户的生活里，生出对世界又好奇又恐惧的幻想。 ——王安忆 伦纳德•沃尔被控谋杀富婆艾米丽以图染指其巨额遗产，他却一再表明自己的无辜。伦纳德的妻子是唯一能够证明他无罪的证人，却以控方证人的身份出庭指证其确实犯有谋杀罪。伦纳德几乎陷入绝境，直到一个神秘女人的出现…… 墙上的犬形图案；召唤死亡的收音机；蓝色瓷罐的秘密；一只疯狂的灰猫……十一篇神秘的怪谈，最可怕的不是“幽灵”，而是你心中的魔鬼。',
        '中文', '35.00', '2017-05-01', 9, 12, 1),
       (50000009, '少有人走的路', 'M·斯科特·派克 ', '吉林文史出版社', '9787807023777',
        '这本书处处透露出沟通与理解的意味，它跨越时代限制，帮助我们探索爱的本质，引导我们过上崭新，宁静而丰富的生活；它帮助我们学习爱，也学习独立；它教诲我们成为更称职的、更有理解心的父母。归根到底，它告诉我们怎样找到真正的自我。 正如开篇所言：人生苦难重重。M·斯科特·派克让我们更加清楚：人生是一场艰辛之旅，心智成熟的旅程相当漫长。但是，他没有让我们感到恐惧，相反，他带领我们去经历一系列艰难乃至痛苦的转变，最终达到自我认知的更高境界。',
        '中文', '26.00', '2007-01-01', 9, 12, 1),
       (50000010, '追寻生命的意义', '[奥] 维克多·弗兰克 ', '新华出版社', '9787501162734',
        '《追寻生命的意义》是一个人面对巨大的苦难时，用来拯救自己的内在世界，同时也是一个关于每个人存在的价值和能者多劳们生存的社会所应担负职责的思考。本书对于每一个想要了解我们这个时代的人来说，都是一部必不可少的读物。这是一部令人鼓舞的杰作……他是一个不可思议的人，任何人都可以从他无比痛苦的经历中，获得拯救自己的经验……高度推荐。',
        '中文', '12.00', '2003-01-01', 9, 16, 1),
       (50000011, '秘密花园', '乔汉娜·贝斯福 ', '北京联合出版公司', '9787550252585',
        '欢迎来到秘密花园！ 在这个笔墨编织出的美丽世界中漫步吧 涂上你喜爱的颜色，为花园带来生机和活力 发现隐藏其中的各类小生物，与它们共舞 激活创造力，描绘那些未完成的仙踪秘境 各个年龄段的艺术家和“园丁”都可以来尝试喔！',
        '中文', '42.00', '2015-06-01', 9, 18, 1)";
if (mysqli_query($conn, $sql2)) {
    echo "数据表book_info创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2_insert)) {
    echo "数据表book_info插入信息成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

$sql3 = "CREATE TABLE `reader_card`
(
    `reader_id`  int(11) NOT NULL,
    `passwd`     varchar(15) NOT NULL DEFAULT '111111'
    
)";//学生账号
if (mysqli_query($conn, $sql3)) {
    echo "数据表reader_card创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}
$sql4 = "CREATE TABLE `reader_info`
(
    `reader_id` int(11) NOT NULL,
    `name`      varchar(16) DEFAULT NULL,
    `sex`       varchar(2)  DEFAULT NULL,
    `phone`   varchar(11) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";//学生信息
if (mysqli_query($conn, $sql4)) {
    echo "数据表reader_info创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

$sql5 = "CREATE TABLE `class_info`
(
    `class_id`   int(11) NOT NULL,
    `class_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";//书类表
$sql5_insert = "INSERT INTO `class_info` (`class_id`, `class_name`)
VALUES (1, '马克思主义'),
       (2, '哲学'),
       (3, '社会科学总论'),
       (4, '政治法律'),
       (5, '军事'),
       (6, '经济'),
       (7, '文化'),
       (8, '语言'),
       (9, '文学'),
       (10, '艺术'),
       (11, '历史地理'),
       (12, '自然科学总论'),
       (13, ' 数理科学和化学'),
       (14, '天文学、地球科学'),
       (15, '生物科学'),
       (16, '医药、卫生'),
       (17, '农业科学'),
       (18, '工业技术'),
       (19, '交通运输'),
       (20, '航空、航天'),
       (21, '环境科学'),
       (22, '综合')";
if (mysqli_query($conn, $sql5) && mysqli_query($conn, $sql5_insert)) {
    echo "数据表class_info创建成功插入数据成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

$sql6 = "CREATE TABLE `lend_list`
(
    `sernum`    bigint(20) AUTO_INCREMENT PRIMARY KEY,  /*流水号*/
    `book_id`   bigint(20) NOT NULL,
    `reader_id` int(11) NOT NULL,
    `lend_date` date DEFAULT NULL
)";//借阅信息表
if (mysqli_query($conn, $sql6)) {
    echo "数据表lend_list创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

$sql7 = "CREATE TABLE `card_state`
(
    `card_id`    int(20) NOT NULL,
    `card_state`   int(3) NOT NULL
)";//卡号状态表

if (mysqli_query($conn, $sql7)) {
    echo "数据表card_state创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}
$sql8 = "CREATE TABLE `lend_record`
(
    `id`    bigint(20) AUTO_INCREMENT PRIMARY KEY,
    `lend_date` date DEFAULT NULL,
    `book_id`   bigint(20) NOT NULL,
    `reader_id` int(11) NOT NULL,
    `reader_name` varchar(10) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8";//借阅记录
if (mysqli_query($conn, $sql8)) {
    echo "数据表lend_record创建成功\n";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
}

mysqli_close($conn);

