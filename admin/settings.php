<?php
require 'partials/db_config.php';
require 'partials/essentials.php';
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Settings</title>
<?php require('partials/header.php'); ?>
 
<?php require('partials/sidebar.php'); ?>
       
<div class="container-fluid" id="main-content">
<div class="row">
<div class="col-lg-10 ms-auto p-4 overflow-hidden">
         <h3 class="mb-4">SETTINGS</h3>
         
           
         <!---General Settings ---->
         <div class="card shadow-sm mb-4">
            <div class="card-body shadow">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-nonw btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                             <i class="bi bi-pencil-square"></i> Edit
                           </button>
                </div>
                <h6 class="card-subtitle text-dark mb-1 fw-bold">Website Title</h6>
                <p class="card-text" id="site_title"></p>
                <h6 class="card-subtitle mb-1 text-dark fw-bold">About Us</h6>
                <p class="card-text" id="site_about"></p>
            </div>
        </div>
        <!---General Settings Modal---->
        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="general_s_form">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">General Settings</h5>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Website Title</label>
                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">About Us</label>
                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="10" required></textarea>
                 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-white shadow-none btn-danger" data-bs-dismiss="modal">CANCEl</button>
                    <button type="submit" class="btn btn-success text-white shadow-none">SAVE</button>
                </div>
                </div>
                </form>
            </div>
        </div>

         <!---Shutdown------>
         <div class="card border-1 shadow mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">Shutdown Website</h5>
              <div class="form-check form-switch">
                <form>
                  <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox"
                    id="shutdown_toggle">
                </form>
              </div>
            </div>
            <p class="card-text">
              No users will be allowed to book hotel room, when shutdown mode is turned on.
            </p>
          </div>
        </div>

        <!---ContactUs----->
        <div class="card shadow-sm mb-4">
            <div class="card-body shadow">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">Contact Us Settings</h5>
                            <button type="button" class="btn btn-dark shadow-nonw btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                             <i class="bi bi-pencil-square"></i> Edit
                           </button>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                  <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">Address</h6>
                    <p class="card-text" id="address"><i class="bi bi-geo-alt-fill geo me-1"></i></p>
                  </div>
                  <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">Google Map</h6>
                    <p class="card-text mb-1"><i class="bi bi-globe-asia-australia"></i>
                    <span id="gmap"></span>
                  </p>
                  </div>
                  <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">Phone Numbers</h6>
                    <p class="card-text mb-1"><i class="bi bi-telephone"></i>
                      <span id="pn1"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-telephone"></i>
                      <span id="pn2"></span>
                    </p>
                   </div>
                    
                  <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">Email</h6>
                    <p class="card-text" id="email"></p>
                  </div>
                </div>
                <div class="col-lg-6">
                <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">Social Links</h6>
                    <p class="card-text mb-1"><i class="bi bi-facebook me-1"></i>
                      <span id="fb"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-whatsapp me-1"></i>
                      <span id="whatsapp"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-instagram me-1"></i>
                      <span id="insta"></span>
                    </p>
                    <p class="card-text"><i class="bi bi-telegram me-1"></i>
                      <span id="tw"></span>
                    </p>
                   </div>

                   <div class="mb-4">
                    <h6 class="card-subtitle text-dark mb-1 fw-bold">iFrame</h6>
                    <iframe id="iframe" loading="lazy" class="border p-2 w-100"></iframe>
                   </div>
                </div>
                </div>
                
            </div>
        </div>

          <!---Contact Modal --->
          <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form id="contacts_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Contacts Settings</h5>
                </div>
                <div class="modal-body">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Address</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill geo me-1"></i></span>
                            <input type="text" name="address" id="address_inp" class="form-control shadow-none"
                              required>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Google Map Link</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-globe-asia-australia me-1"></i></span>
                            <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Phone Number</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill phone"></i></span>
                            <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill phone"></i></span>
                            <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Email</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Social Links</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-facebook me-1"></i></span>
                            <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-whatsapp "></i></span>
                            <input type="text" name="whatsapp" id="whatsapp_inp" class="form-control shadow-none">
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                            <input type="text" name="insta" id="insta_inp" class="form-control shadow-none">
                          </div>
                        </div>

                        <div class="mb-3">
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telegram"></i></span>
                            <input type="text" name="tw" id="tw_inp" class="form-control shadow-none">
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label fw-bold">iFrame Src</label>
                          <div class="input-group mb-3">
                            <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none"
                              required>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" onclick="contacts_inp(contacts_data)"
                      class="btn text-white shadow-none btn-danger" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-success text-white">SAVE</button>
                  </div>
                </div>
            </form>

          </div>
        </div>

        

        


</div>
<!---Management-------->


        
</div>
</div>





<script src="scripts/setting.js"></script>
<?php require('partials/footer.php'); ?>