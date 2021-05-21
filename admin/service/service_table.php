
<table>
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>价格</th>
        <th>详细信息</th>
        <th>图片网址</th>
        <th></th>
        <th></th>
    </tr>
    <?php


    while ($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["item_id"]."</td>";
        echo "<td>".$row["item_name"]."</td>";
        echo "<td>".$row["item_price"]."</td>";
        echo "<td>";
        if(isset($row["item_info"])){
            echo $row["item_info"];
        }
        echo "</td>";
        echo "<td>";
        if(isset($row["image_url"])){
            echo $row["image_url"];
        }
        echo "</td>";
        echo "<td><button onclick=\"location.href='add_service.php?u_id=".$row['item_id']."&u_name=".$row['item_name']."&u_price=".$row['item_price']."&u_info=".$row['item_info']."&u_url=".$row['image_url']."'\">更新</button></td>";
        echo "<td><button onclick=\"location.href='deleted_service.php?d_id=".$row['item_id']."'\">删除</button></td>";
        echo "</tr>";
    }
    ?>
</table>