<form action="cv.php" method="POST">
    <p><label for "name">HỌ VÀ TÊN</label>
        <input type="text" name="name" id="name" />
    </p>
    <p><label for="sex">Giới Tính</label><br?\ />
        <select name="sex" id="sex">
            <option value="male">Nam</option>
            <option value="female">Nữ</option>
            <option value="other">Khác</option>
        </select>
    </p>
    <p>
        <label for="birthday">Ngày sinh</label>
        <input type="date" name="birthday" id="birthday" />
    </p>
    <p>
        <label for="address">Địa chỉ: </label>
        <input type="text" name="address" id="address" />
    </p>
    <p>
        <label for="introduce">Giới thiệu:</label><br/>
        <textarea name="introduce" id="introduce" rows="10" cols="40"></textarea>
    </p>
    <p>Kinh nghiệm:<br/>
        <input type="checkbox" name="experience[]" id="html" value="html" />
        <label for="html">HTML</label><br />
        <input type="checkbox" name="experience[]" id="css" value="css" />
        <label for="css">CSS</label><br />
        <input type="checkbox" name="experience[]" id="javascript" value="JavaScript" />
        <label for="javascript">JavaScript</label><br />
        <input type="checkbox" name="experience[]" id="php" value="php" />
        <label for="php">PHP</label><br />
        <input type="checkbox" name="experience[]" id="sql" value="sql" />
        <label for="sql">SQL</label><br />
        <input type="checkbox" name="experience[]" id="c__" value="c" />
        <label for="c__">C++</label><br />
    </p>
    <input type="submit" value="Hoàn thành">
</form>
<?php
print_r($_POST);
print_r($_GET);
?>