<?php $this->load->view('admin/include/head'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
   a.btn:hover {
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -o-transform: scale(1.1);
   }
   a.btn {
      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -o-transform: scale(0.8);
      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      -o-transition-duration: 0.5s;
   }
</style>
<div class="page-title-area">
   <div class="row align-items-center">
      <div class="col-sm-6">
         <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">
               Manager List
            </h4>
         </div>
      </div>
      <div class="col-sm-6 clearfix">
         <div class="search-ar pull-right">
         </div>
      </div>
   </div>
</div>
<div class="main-content-inner">
   <div class="row">
      <div class="col-12 mt-5">
         <?php if ($this->session->flashdata('success_msg') != "") { ?>
         <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success_msg'); ?>
         </div>
         <?php } ?>
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Manager List
                  <a href="<?= admin_url() ?>manager/add" class="btn btn-info float-right">+ Add New Manager</a>
               </h4>
               <div class="single-table">
                  <div class="col-sm-12 table-responsive">
                     <table class="table table-striped table-bordered" width="100%">
                        <thead class="bg-light text-capitalize">
                           <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>DOB</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($allmanager)) {
                            foreach($allmanager as $value) { ?>
                                <tr>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->phone; ?></td>
                                    <td><?php echo $value->dob; ?></td>
                                    <td>
                                        <a href="<?php echo admin_url(); ?>manager/update/<?php echo $value->id; ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="<?php echo admin_url(); ?>manager/delete/<?php echo $value->id; ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="<?php echo admin_url(); ?>manager/download_csv/<?php echo $value->id; ?>"><span class="glyphicon glyphicon-save-file"></span></a>
                                    </td>
                                </tr>
                           <?php } } else { ?>
                            <tr><td colspan="4" style="text-align: center;">No data found.</td></tr>
                            <?php } ?>
                        </tbody>
                     </table>
                     <?php echo $this->pagination->create_links(); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php $this->load->view('admin/include/footer'); ?>