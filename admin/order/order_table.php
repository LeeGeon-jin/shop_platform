
<table>
    <tr>
        <th>订单号</th>
        <th>姓</th>
        <th>名</th>
        <th>公司名</th>
        <th>国家</th>
        <th>省/直辖市</th>
        <th>地级市/县</th>
        <th>街道地址</th>
        <th>邮政编码</th>
        <th>电话号码</th>
        <th>电子邮箱</th>
        <th>订单总金额</th>
        <th>服务名称</th>
        <th>是否已付费</th>
        <th></th>
        <th></th>
    </tr>
    <?php

    while ($row=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["order_id"]."</td>";
        echo "<td>".$row["last_name"]."</td>";
        echo "<td>".$row["first_name"]."</td>";
        echo "<td>".$row["company_name"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "<td>".$row["state"]."</td>";
        echo "<td>".$row["suburb"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["postcode"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["order_price"]."</td>";
        echo "<td>".$row["item_name"]."</td>";
        echo "<td>";
        echo empty($row["paid"])? "未付" : "已付";
        echo "</td>";
        echo "<td><button>更新</button></td>";
        echo "<td><button>删除</button></td>";
    }
    ?>
</table>