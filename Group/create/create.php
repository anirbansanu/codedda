
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Group Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Group Name</label>
                <input type="text" name="group_name" id="inputName" class="form-control">
			  </div>
			  <div class="form-group">
                  <label>Date range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="create_date" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
			  <!-- File Uploads Blocks --->
              <div class="col-md-14">
				<div class="card card-outline card-success collapsed-card">
					<div class="card-header bg-light">
						<h3 class="card-title" data-card-widget="collapse" style="cursor: pointer" >Group Image</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool bg-light" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
							<button type="button" class="btn btn-tool bg-light" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
						</div>
						<!-- /.card-tools -->
					</div>
					<!-- /.card-header -->
					
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputFile" >Group Image</label>
								<div class="input-group">
									<div class="custom-file">
										<input name="group_img" type="file" class="custom-file-input"  id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Image File</label>
									</div>
									<div class="input-group-append">
									<span class="input-group-text" id="">Upload</span>
									</div>
								</div>
						</div>
					</div>
				<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.1st card -->
		  <!-- 2nd card -->
		  <div class="card ">
            <div class="card-header bg-teal">
              <h3 class="card-title">Access</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
			  <label for="inputName">Uni-code</label>
                <div class="input-group mb-3">
					<input type="text" name="uni_code" class="form-control" placeholder="Uni-code">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-bezier-curve"></span>
						</div>
					</div>
				</div>
              </div>
			  <div class="form-group">
			  <label for="inputName">Password</label>
                <div class="input-group mb-3">
					<input type="password" name="uni_pass" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
				</div>
              </div>
			  <div class="form-group">
			  <label for="inputName">Retype-Password</label>
                <div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
							<span class="fas fa-lock"></span>
							</div>
						</div>
				</div>
              </div>
			  
            </div>
            <!-- /.card-body -->
          </div>
		  <!-- /.2nd card -->
        </div>
        