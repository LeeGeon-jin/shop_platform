
<table>
    <tr>
        <th>ID</th>
        <th>优惠券名</th>
        <th>优惠金额</th>
        <th>失效日期</th>
        <th></th>
        <th></th>
    </tr>
    <?php

    while ($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["v_id"]."</td>";
        echo "<td>".$row["v_name"]."</td>";
        echo "<td>".$row["v_discount"]."</td>";
        echo "<td>";
        if(isset($row["expire_date"])){
            echo $row["expire_date"];
        }
        echo "</td>";
        echo "<td><button onclick=\"location.href='add_voucher.php?u_id=".$row['v_id']."&u_name=".$row['v_name']."&u_disc=".$row['v_discount']."&u_date=".$row['expire_date']."'\">更新</button></td>";
        echo "<td><button onclick=\"location.href='deleted_voucher.php?d_id=".$row['v_id']."'\">删除</button></td>";
        echo "</tr>";

    }
    ?>
</table>