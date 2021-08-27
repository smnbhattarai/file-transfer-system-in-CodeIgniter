<div class="container">
    <div class="row">

        <?php $this->load->view('partials/_sidebar'); ?>

        <div class="col-md-10">

            <h4 class="text-center">All users</h4>
            <hr>

            <table class="table table-responsive">
                <tr>
                    <th>S.No.</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Office</th>
                    <th>Last login</th>
                </tr>

                <?php
                foreach ($users as $k => $user) {

                    echo '<tr>';
                    echo '<td>' . ++$k . '</td>';
                    echo '<td>' . $user['fname'] . '</td>';
                    echo '<td>' . $user['lname'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['office'] . '</td>';
                    $last_login = !empty($user['last_login']) ? timespan(strtotime($user['last_login']) . ' ago' , time(), 2) : '-';
                    echo '<td>' . $last_login . ' </td>';
                    echo '</tr>';

                }
                ?>

            </table>

        </div>
    </div>
</div>