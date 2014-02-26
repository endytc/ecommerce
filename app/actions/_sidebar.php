<?php
$kategoriList = _select_arr("select * from kategori");
?>
<div id="sidebar">
    <ul>
        <li>
            <h2>Categories</h2>
            <ul>
                <?php
                foreach ($kategoriList as $kategori){
                    ?>
                    <li><a
                        href="<?php echo app_base_url('productKategori?id=' . $kategori['idKategori']) ?>"><?php echo $kategori['namaKategori'] ?></a>
                    </li><?php
                }
                ?>
            </ul>

        </li>
        <li id="calendar">
            <h2>Calendar</h2>

            <div id="calendar_wrap">
                <table id="wp-calendar" summary="Calendar">
                    <caption>
                        November 2013
                    </caption>
                    <thead>
                    <tr>
                        <th abbr="Monday" scope="col" title="Monday">M</th>
                        <th abbr="Tuesday" scope="col" title="Tuesday">T</th>
                        <th abbr="Wednesday" scope="col" title="Wednesday">W</th>
                        <th abbr="Thursday" scope="col" title="Thursday">T</th>
                        <th abbr="Friday" scope="col" title="Friday">F</th>
                        <th abbr="Saturday" scope="col" title="Saturday">S</th>
                        <th abbr="Sunday" scope="col" title="Sunday">S</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td abbr="Oktober" colspan="3" id="prev"><a
                                href="<?php echo app_base_url() . '/' ?>#">&laquo; Okt</a></td>
                        <td class="pad">&nbsp;</td>
                        <td abbr="Desember" colspan="3" id="next" class="pad"><a
                                href="<?php echo app_base_url() . '/' ?>#">Des &raquo;</a></td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td colspan="2" class="pad">&nbsp;</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td id="today">21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td class="pad" colspan="2">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </li>


        <!--<li>
                                                    <h2>Archives</h2>
                                                    <ul>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">September</a> (23)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">August</a> (31)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">July</a> (31)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">June</a> (30)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">May</a> (31)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">April</a> (30)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">March</a> (31)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">February</a> (28)</li>
                                                            <li><a href="<?php echo app_base_url().'/'?>#">January</a> (31)</li>
                                                    </ul>
                                            </li>-->
    </ul>
</div>