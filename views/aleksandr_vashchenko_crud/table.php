<form method="GET" id="table_form">
    <table class="table table-striped" border="1">
        <tr>
            <th><i class="glyphicon glyphicon-ok"></i></th>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Groups</th>
            <th>Controls</th>
        </tr>
        <?php foreach ($result as $row): ?>
            <tr onclick="$(this).find('input').click();">
                <td>
                    <input type="checkbox" class="del_checkbox" name="del[]" value="<?= $row['id']; ?>"
                    onclick="event.stopPropagation();
                            if ($(this).is(':checked')) $(this).closest('tr').css('background-color', '#f3f3f3');
                            if ($(this).is(':not(:checked)')) $(this).closest('tr').css('background-color', '#fff');
                            "/>
                </td>
                <td><?= $row['id']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['groups']; ?></td>
                <td>
                    <a class="btn btn-primary" href="/ci3/aleksandr_vashchenko_crud/edit/<?= $row['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
