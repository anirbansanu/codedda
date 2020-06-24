		<div class="card card-success">
            <div class="card-header" data-card-widget="collapse">
              <h3 class="card-title">Project Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" name="project_name" id="ProjectName" class="form-control" value="<?php echo $project_info['project_name'];?>">
              </div>
			  <div class="col-md-14">
                <div class="form-group">
                  <label>Project Type</label> 
                  <select name="project_type" class="form-control select2" style="width: 100%;" >
                    <option selected="selected" value="<?php echo $project_info['project_type'];?>"><?php echo $project_info['project_type'];?></option>
                    <option value="Programming">Programming</option>
                    <option value="Coding">Coding</option>
                    <option value="Scripting">Scripting</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Android">Android</option>
                    <option value="IOS">IOS</option>
                    <option value="Mac">Mac</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea name="project_description" id="inputDescription" class="form-control" rows="5"><?php echo $project_info['project_description'];?></textarea>
              </div>
			  
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select name="project_status" class="form-control custom-select">
                  <option  value="<?php echo $project_info['project_type'];?>" selected disabled><?php echo $project_info['project_privacy'];?></option>
                  <option  value="Public">Public</option>
                  <option value="Protected">Protected</option>
                  <option value="Private">Private</option>
                </select>
              </div>
			  
			<div class="col-md-14">
				<div class="card card-outline card-success collapsed-card ">
					<div class="card-header bg-light" data-card-widget="collapse">
						<h3 class="card-title" data-card-widget="collapse" style="cursor: pointer">Upload Files</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool bg-light" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
							<button type="button" class="btn btn-tool bg-light" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					<!-- File Uploads Blocks --->
					<div class="card-body" id="files">
						<div class="form-group">
							<label for="exampleInputFile">Project File</label>
								<div class="input-group" >
									<div class="custom-file">
										<input type="file" name="img1" class="custom-file-input"  id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>
									<div class="input-group-append">
									<span class="input-group-text" id="">Upload</span>
									</div>
								</div>
						</div>
						
					</div>
				<!-- /.card-body -->
					<div class="card-footer clearfix">
					<button type="button" class="btn btn-outline-success float-right" id="addfile"><b><i class="fas fa-plus"></i> Add More</b></button>
					</div>
				</div>
				<!-- /.card -->
			</div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
		  