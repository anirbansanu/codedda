<div class="card card-info collapsed-card" >
            <div class="card-header" data-card-widget="collapse">
              <h3 class="card-title"  data-card-widget="collapse" style="cursor: pointer">Files</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-plus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td><a href="<?php echo $project_info['file_loc'];?>"><?php echo $project_info['file_name'];?></a></td>
                    <td>49.8005 kb</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo $project_info['file_loc'];?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  
                  
                  

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->