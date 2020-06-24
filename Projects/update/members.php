<?php
$members_len=count($members);

?>
<div class="card collapsed-card">
        <div class="card-header bg-teal" data-card-widget="collapse">
          <h3 class="card-title"  data-card-widget="collapse" style="cursor: pointer">Members</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-plus"></i></button>
            
          </div>
        </div>
        <div class="card-body p-0" style="display: none;">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          Image
                      </th>
                      <th style="width: 48%">
                          Name
                      </th>
                      <th style="width: 30%">
                          Mail
                      </th>
                      <th style="width: 10%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  for($j=0;$j<$members_len;$j++)
                  {
                   echo '<tr>
                       <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                              </li>
                          </ul>
                      </td>
                      <td>
                          '.$members[$j]['user_name'].'
                      </td>
                      <td>
                          <a>
                          '.$members[$j]['user_mail'].'
                          </a>
                          <br>
                          <small>
                          '.$members[$j]['user_mail'].'
                          </small>
                      </td>
                      
                     
                      
                      <td class="project-actions text-right">
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              <!---Delete--->
                          </a>
                      </td>
                  </tr>';
                  }
                  ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>