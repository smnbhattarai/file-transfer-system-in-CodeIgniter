<div class="container">
    <div class="row">


        <?php $this->load->view('partials/_sidebar'); ?>


        <div class="col-md-10">

            <h4 class="text-center">My Uploads</h4>
            <hr>

            <table class="table table-responsive table-condensed">
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Upload Date</th>
                    <th>&nbsp;</th>
                </tr>

                <?php

                if (count($files) > 0) {
                    foreach ($files as $k => $file) {
                        echo '<tr>';
                        echo '<td>' . ($k + 1) . '</td>';
                        echo '<td>' . $file['title'] . '</td>';
                        echo '<td>' . date('Y F j', strtotime($file['upload_date'])) . '<br>'
                            . '<small>' . timespan(strtotime($file['upload_date']), time(), 1) . ' ago</small></td>';
                        echo '<td><a class="btn btn-info btn-sm" href="' . base_url('storage/') . $file['name'] . '">Download</a></td>';
                        echo '</tr>';
                    }
                }

                ?>

            </table>

            <?php echo $this->pagination->create_links() ?>

        </div>


    </div>
</div>