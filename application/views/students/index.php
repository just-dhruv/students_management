<div class="container m-auto pt-80">
    <?php if ($success): ?>
        <div class="sm_f-success">
            <?= $success ?>
        </div>
    <?php endif; ?>
    <?php if($delete): ?>
        <div class="sm_f-delete"><?= $delete ?></div>
    <?php endif; ?>
    <h1 class="main-title h1">Students List</h1>


    <div class="main-btn justify-content-end">
        <a href="<?= site_url('students/create') ?>" class="sm-btn">Add Student</a>
    </div>
    <div class="students-list">
        <?php if (!$students_list): ?>
            <p>There is no student records.</p>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sn = 1; ?>
                    <?php foreach ($students_list as $student): ?>
                        <tr>
                            <td class="text-center"><?= $sn++; ?></td>
                            <td><?= html_escape($student->full_name); ?></td>
                            <td><?= html_escape($student->email); ?></td>
                            <td><?= html_escape($student->phone); ?></td>
                            <td><?= html_escape($student->course); ?></td>
                            <td>
                                <div class="std-action-btn">
                                    <a class="btn btn-light" href="">View</a>
                                    <a href="<?= base_url('students/edit/' . $student->id); ?>" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="<?= site_url('students/delete/'.$student->id); ?>" method="post">
                                        <input type="hidden"
                                            name="<?= $this->security->get_csrf_token_name(); ?>"
                                            value="<?= $this->security->get_csrf_hash(); ?>">

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <!-- <a href="<?= base_url('student/delete/'.$student->id); ?>" class="btn btn-danger">Delete</a> -->
                                </div>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<script>
    setTimeout(() => {
        document.querySelector('.sm_f-success').classList.add('d-none');
    }, 3000);
</script>