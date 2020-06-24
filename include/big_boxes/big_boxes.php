	<!-- Main row -->
	<div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
			<!--- Recent Projects --->
			<?php include('big_box_recent_projects.php');  ?>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body class="btn btn-default" data-toggle="modal" data-target="#modal-default"-->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          <!-- Map card -->
            <div class="card bg-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Groups
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>

                  <button type="button"
                          class="btn btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body bg-light text-dark">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name text-dark">
                            Count Dracula
                            <small class="contacts-list-date float-right text-dark">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user7-128x128.jpg">

                        <div class="contacts-list-info text-dark">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right text-dark">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user3-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name text-dark">
                            Nadia Jolie
                            <small class="contacts-list-date float-right text-dark">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user5-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name text-dark">
                            Nora S. Vans
                            <small class="contacts-list-date float-right text-dark">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user6-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name text-dark">
                            John K.
                            <small class="contacts-list-date float-right text-dark">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../../dist/img/user8-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name text-dark">
                            Kenneth M.
                            <small class="contacts-list-date float-right text-dark">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg text-dark">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

 

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%">
                    <div class="bootstrap-datetimepicker-widget usetwentyfour">
                      <ul class="list-unstyled">
                        <li class="show">
                          <div class="datepicker">
                            <div class="datepicker-days">
                              <table class="table table-sm">
                                <thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">May 2020</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="04/26/2020" class="day old weekend">26</td><td data-action="selectDay" data-day="04/27/2020" class="day old">27</td><td data-action="selectDay" data-day="04/28/2020" class="day old">28</td><td data-action="selectDay" data-day="04/29/2020" class="day old">29</td><td data-action="selectDay" data-day="04/30/2020" class="day old">30</td><td data-action="selectDay" data-day="05/01/2020" class="day">1</td><td data-action="selectDay" data-day="05/02/2020" class="day weekend">2</td></tr><tr><td data-action="selectDay" data-day="05/03/2020" class="day weekend">3</td><td data-action="selectDay" data-day="05/04/2020" class="day">4</td><td data-action="selectDay" data-day="05/05/2020" class="day">5</td><td data-action="selectDay" data-day="05/06/2020" class="day">6</td><td data-action="selectDay" data-day="05/07/2020" class="day">7</td><td data-action="selectDay" data-day="05/08/2020" class="day">8</td><td data-action="selectDay" data-day="05/09/2020" class="day weekend">9</td></tr><tr><td data-action="selectDay" data-day="05/10/2020" class="day weekend">10</td><td data-action="selectDay" data-day="05/11/2020" class="day">11</td><td data-action="selectDay" data-day="05/12/2020" class="day">12</td><td data-action="selectDay" data-day="05/13/2020" class="day">13</td><td data-action="selectDay" data-day="05/14/2020" class="day">14</td><td data-action="selectDay" data-day="05/15/2020" class="day">15</td><td data-action="selectDay" data-day="05/16/2020" class="day weekend">16</td></tr><tr><td data-action="selectDay" data-day="05/17/2020" class="day weekend">17</td><td data-action="selectDay" data-day="05/18/2020" class="day">18</td><td data-action="selectDay" data-day="05/19/2020" class="day">19</td><td data-action="selectDay" data-day="05/20/2020" class="day">20</td><td data-action="selectDay" data-day="05/21/2020" class="day active today">21</td><td data-action="selectDay" data-day="05/22/2020" class="day">22</td><td data-action="selectDay" data-day="05/23/2020" class="day weekend">23</td></tr><tr><td data-action="selectDay" data-day="05/24/2020" class="day weekend">24</td><td data-action="selectDay" data-day="05/25/2020" class="day">25</td><td data-action="selectDay" data-day="05/26/2020" class="day">26</td><td data-action="selectDay" data-day="05/27/2020" class="day">27</td><td data-action="selectDay" data-day="05/28/2020" class="day">28</td><td data-action="selectDay" data-day="05/29/2020" class="day">29</td><td data-action="selectDay" data-day="05/30/2020" class="day weekend">30</td></tr><tr><td data-action="selectDay" data-day="05/31/2020" class="day weekend">31</td><td data-action="selectDay" data-day="06/01/2020" class="day new">1</td><td data-action="selectDay" data-day="06/02/2020" class="day new">2</td><td data-action="selectDay" data-day="06/03/2020" class="day new">3</td><td data-action="selectDay" data-day="06/04/2020" class="day new">4</td><td data-action="selectDay" data-day="06/05/2020" class="day new">5</td><td data-action="selectDay" data-day="06/06/2020" class="day new weekend">6</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2020</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month active">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year active">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>