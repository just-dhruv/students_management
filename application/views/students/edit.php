<div class="sm-form-container mt-80">
    <h1 class="main-title h1">Edit student</h1>
    <div class="main-form">

        <form action="<?= site_url('students/update/' . $student->id); ?>" method="POST">
            <input type="hidden"
                name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="input-block">
                <label for="full_name">Full Name</label>
                <input type="text"
                    name="full_name"
                    id="full_name"
                    value="<?= set_value('full_name', $student->full_name) ?>"
                    placeholder="Enter full name">
                <?= form_error('full_name', '<span class="sm_i-error">', '</span>') ?>
            </div>

            <div class="input-block">
                <label for="email">Email</label>
                <input type="email"
                    name="email"
                    id="email"
                    value="<?= set_value('email', $student->email) ?>"
                    placeholder="Enter email">
                <?= form_error('email', '<span class="sm_i-error">', '</span>'); ?>
            </div>

            <div class="input-block">
                <label for="phone">Phone</label>
                <input type="tel"
                    name="phone"
                    id="phone"
                    value="<?= set_value('phone', $student->phone) ?>"
                    placeholder="Enter phone No.">
                <?= form_error('phone', '<span class="sm_i-error">', '</span>'); ?>
            </div>

            <div class="input-block">
                <label for="course">Course</label>
                <input type="text"
                    name="course"
                    id="course"
                    value="<?= set_value('course', $student->course) ?>"
                    placeholder="Enter course">
                <?= form_error('course', '<span class="sm_i-error">', '</span>'); ?>
            </div>

            <div class="main-btn gap-2">
                <a href="<?= site_url('students'); ?>" class="sm-btn gray-btn">Cancel</a>
                <button type="submit" class="sm-btn">Submit</button>
            </div>
        </form>
    </div>
</div>