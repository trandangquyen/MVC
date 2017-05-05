<style>
    table,th,td{
        padding: .3em;
        margin: .1em;
        vertical-align: top;
    }
</style>

<table>
    <tr>
        <th>MaBV</th>
        <th>TenBV</th>
        <th>listBV</th>
    </tr>
    <?php
    if (isset($MaBV) && count($MaBV)) {
        foreach ($baiviet as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value['MaBV']; ?></td>
                <td><?php echo $value['TenBV']; ?></td>
                 <td><?php echo $value['listBV']; ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>






