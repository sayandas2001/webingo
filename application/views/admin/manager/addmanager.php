<?php $this->load->view('admin/include/head'); ?>
<style>
   input[type="file"] {
   display: block;
   }
   .imageThumb {
   max-height: 75px;
   border: 2px solid;
   padding: 1px;
   cursor: pointer;
   }
   .pip {
   display: inline-block;
   margin: 10px 10px 0 0;
   }
   .img-delete {
   display: block;
   background: #444;
   border: 1px solid black;
   color: white;
   text-align: center;
   cursor: pointer;
   }
   .img-delete:hover {
   background: white;
   color: black;
   }
</style>
<div class="page-title-area">
   <div class="row align-items-center">
      <div class="col-sm-6">
         <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">New Manager </h4>
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
         <?php if($this->session->flashdata('error_msg')!=""){ ?>
         <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error_msg'); ?>
         </div>
         <?php } ?>
         <div class="card">
            <div class="card-body">
               <h4 class="header-title">Create New Manager
                  <a href="<?= admin_url(); ?>manager" class="btn btn-danger float-right">Back</a>
               </h4>
               <?php 
                  echo form_open_multipart(admin_url().'manager/add', array('method'=>'post','name'=>'form1', 'id'=>'form1','class'=>'form-frame', 'autocomplete'=>"off"));
                  ?>
               <div class="form-group">
                  <label for="name" class="col-form-label">Name </label>
                  <input class="form-control" type="text" name="name" id="name" >
               </div>
               <div class="form-group">
                  <label for="email" class="col-form-label">Email </label>
                  <input class="form-control" type="email" name="email" id="email" >
               </div>
               <div class="form-group">
                  <label for="phone" class="col-form-label">Phone </label>
                  <input class="form-control" type="number" name="phone" id="phone" >
               </div>
               <div class="form-group">
                  <label for="dob" class="col-form-label">DOB </label>
                  <input class="form-control" type="date" name="dob" id="dob" >
               </div>
               <div class="form-group">
                  <label for="password" class="col-form-label">Password </label>
                  <input class="form-control" type="text" name="password" id="password" >
               </div>
               <div class="form-group">
                  <label for="c_password" class="col-form-label">Confirm Password </label>
                  <input class="form-control" type="text" name="c_password" id="c_password" >
               </div>
               <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" >Submit</button>
               <a href="<?= admin_url(); ?>manager" class="btn btn-danger mt-4 ml-3">Cancel</a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<?php $this->load->view('admin/include/footer'); ?>