 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Data of Student</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                  <th style="text-align: center;">STUDENT ID</th>
                  <th style="text-align: center;">NAME</th>
                  <th style="text-align: center;">EMAIL</th>
                  <th style="text-align: center;">SUBJECT COURSE</th>
                  <th style="text-align: center;">ADDRESS</th>
                  <th style="text-align: center;">PHONE NUMBER</th>
                </tr>
              </thead>
             <tbody>
                    <?php 
              
                        foreach($student as $mhs){
                    ?>
                        <tr>
                         
                            <td><?php echo $mhs->id;?></td>
                            <td><?php echo $mhs->name;?></td>
                            <td><?php echo $mhs->email;?></td>
                            <td><?php echo $mhs->subject_course;?></td>
                            <td><?php echo $mhs->address;?></td>
                            <td><?php echo $mhs->phone_number;?></td>
                        </tr>
                    <?php }?>
              </tbody>
            </table>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    </div>