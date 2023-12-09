<div class="container-fluid main-page">
    <div class="app-main">
        <div class="main-content">
            <form action="index.php?act=themthongbao" method="post" enctype="multipart/form-data">
                <h3 class="title-page">
                    Gửi thông báo
                </h3>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="content" id="name" placeholder="Nội dung">
                </div>
                <br>
                <div class="form-group">
                    <label for="prodImg">Người nhận</label>
                    <div class="custom-file">
                        <?php
                        $sql = "SELECT userName, `name` FROM users";
                        $result = pdo_query($sql);
                        echo '<select name="__userName">';
                        echo '<option value="all" selected>Tất cả</option>';
                        foreach ($result as $key) {
                            extract($key);
                            echo '<option value="' . $userName . '">' . $userName . ' - ' . $name . '</option>';
                        }
                        echo '/<select>';
                        ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="data-send" class="btn btn-primary">Gửi</button>
                </div>
            </form>

        </div>
    </div>
</div>