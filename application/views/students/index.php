<div class="container m-auto">
    <div class="students-list">
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
            <tbody>
                <?php foreach ($students_list as $student): ?>
                    <tr>
                        <td><?= $student->full_name; ?></td>
                        <td><?= $student->email; ?></td>
                        <td><?= $student->phone; ?></td>
                        <td><?= $student->course; ?></td>
                        <td>
                            <div class="std-action-btn">
                                <a class="b" href="">View</a>
                                <a href="">Update</a>
                                <a href="">Delete</a>
                            </div>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>