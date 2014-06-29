<?php

function paginasi($server, $condition) {
    $query = "select * from produk  " . $condition;
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        ?>

        <div class="pagination">
            <table>
                <tr>
                    <td>Page</td>
                    <?php
                    $jumlah_page = ceil(mysql_num_rows($result) / 12);
                    for ($a = 1; $a <= $jumlah_page; $a++) {
                        $i = 1;
                        ?>
                        <td><a href=<?php echo $server ?><?php echo $a ?>><?php echo $a ?></a></td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </div>
            <?php
                } else {
                    echo "";
                }
            }
            ?>

          