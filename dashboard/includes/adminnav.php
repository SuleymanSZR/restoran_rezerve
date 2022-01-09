<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">



    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php" class="active"><i class="fa fa-fw fa-dashboard"></i> Gösterge Paneli</a>
            </li>
            <?php if ($_SESSION['role'] == 'admin') {
            ?>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-users"></i> Kullanıcılar <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="user" class="collapse">
                        <li>
                            <a href="./users.php">Tüm Kullanıcıları Görüntüle</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-file-text"></i> Hesabım <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse">
                        <li>
                            <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>">Profili Görüntüle</a>
                        </li>
                        <li>
                            <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Profili Düzenle</a>
                        </li>
                    </ul>
                </li>

            <?php } else { ?>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-users"></i> Notlarım <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="user" class="collapse">
                        <li>
                            <a href="./notes.php">Tüm Notları Görüntüle</a>
                        </li>
                        <li>
                            <a href="./uploadnote.php">Not Yükle</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-file-text"></i> Hesabım <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse">
                        <li>
                            <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>">Profili Görüntüle</a>
                        </li>
                        <li>
                            <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Profili Düzenle</a>
                        </li>
                    </ul>
                </li>

            <?php } ?>
        </ul>
    </div>
</nav>