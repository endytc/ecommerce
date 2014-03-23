<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $member=  _select_arr("select * from member");
    $pagging= pagination("select * from member", getPerPage());
?>

<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Data Member</h1>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Member</th>
            <th>Username</th>
            <th>alamat</th>
            <th>telepon</th>
            <th>email</th>
            <th>nama</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($member as $data) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['idMember'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['telepon'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                
            </tr>
        </tbody>
        <?php
    }
    ?>
                </table>
                <?php echo $pagging ?>
            </div>
        </div>
    </div>
</div>
