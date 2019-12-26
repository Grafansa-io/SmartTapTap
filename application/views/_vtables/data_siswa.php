
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>#</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>#</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach ($record->result() as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value->nis_siswa; ?></td>
                                            <td><?php echo $value->nm_siswa; ?></td>
                                            <td><?php echo $value->jnskel_siswa; ?></td>
                                            <td>#</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>