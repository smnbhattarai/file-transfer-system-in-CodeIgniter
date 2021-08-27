<div class="container">
    <div class="row">


        <?php $this->load->view('partials/_sidebar'); ?>


        <div class="col-md-10">

            <h4 class="text-center">View Files</h4>
            <hr>

            <table class="table table-responsive table-condensed">
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Sending office</th>
                    <th>Sender</th>
                    <th>Upload Date</th>
                    <th>&nbsp;</th>
                </tr>

                <?php

                if (count($files) > 0) {
                    foreach ($files as $k => $file) {
                        echo '<tr>';
                        echo '<td>' . ++$k . '</td>';
                        echo '<td>' . $file['filename']['title'] . '</td>';
                        echo '<td>' . $file['sender_location'] . '</td>';
                        echo '<td>' . $file['uploader']['fname'] . ' ' . $file['uploader']['lname'] . '</td>';
                        echo '<td>' . date('Y F j', strtotime($file['filename']['uploaded_on'])) . '<br>'
                            . '<small>' . timespan(strtotime($file['filename']['uploaded_on']), time(), 1) . ' ago</small></td>';
                        echo '<td><a class="btn btn-info btn-sm" href="' . base_url('storage/') . $file['filename']['name'] . '">Download</a></td>';
                        echo '</tr>';
                    }
                }

                ?>

            </table>

            <?php echo $this->pagination->create_links() ?>

        </div>


    </div>
</div>