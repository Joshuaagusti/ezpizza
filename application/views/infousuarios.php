<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
      
     
        <link rel="stylesheet" href="https://ezpizza.store/assets/css/styles/infousuarios.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet">          
       
    </head>

    <body>
        <section class="w-100 p-4 profile">
            <div class="container mt-5">
                <div class="row">
                     <div class="col-md-12 text-center position-relative">
                        <div class="image-container position-relative">
                        <?php if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']): ?>
                       
                       <?php if (!empty($this->session->userdata['profile_pic'])): ?>
                           <img src="<?php echo product_image_url("/pfp/" . trim($this->session->userdata['profile_pic'], "'")); ?>" alt="Profile Picture" class="foto">
                       <?php else: ?>
                           <img id="profileImage" class="foto" src="https://ezpizza.store/assets/img/infouser/profile.png" alt="Profile">
                       <?php endif; ?>
                   
                   <?php endif; ?>
                   
                            <img class="overlay-img" src="https://ezpizza.store/assets/img/infouser/edit.svg" alt="pencil">
                            <a href="#" id="changeImageBtn" class="overlay-text">Change image</a>
                            <input type="file" id="fileInput" accept="image/jpeg, image/png" style="display: none;">
                        </div>
                        <h2><?php echo $this->session->userdata['nombre_usuario'] ?></h2>
                        <h3 class="h3light"><?php echo $this->session->userdata['email'] ?></h3>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-5">
            <div class="row title">
                 <div class="col-md-4">
                    <h3 class="h3green">My personal information</h3>
                </div>
            </div>
            
            <form>
                <div class="row g-5 mb-5">
                  <div class="col-md-4">
                    <label for="name" class="h3medium">Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $this->session->userdata['nombre'] ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="user" class="h3medium">Username</label>
                    <input type="text" class="form-control" id="user" value="<?php echo $this->session->userdata['nombre_usuario'] ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="password" class="h3medium">Password</label>
                    <input type="text" class="form-control mb-2" id="password" value="•••••" disabled>
                    <div class="d-flex justify-content-end">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal">
                            Update password
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h3medium" id="changePasswordModalLabel">Change Password</h5>
                                    </div>
                                    <form id="changePasswordForm">
                                        <div class="modal-body">
                                            <div class="form-group mb-4">
                                                <label for="currentPassword" class="textregular">Current Password</label>
                                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="newPassword" class="textregular">New Password</label>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="confirmNewPassword" class="textregular">Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-save">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row g-5 mb-5">
                    <div class="col-md-4">
                        <label for="email" class="h3medium">Email</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $this->session->userdata['email'] ?>">
                      </div>
                      <div class="col-md-4">
                        <label for="address" class="h3medium">Address</label>
                        <input type="text" class="form-control" id="address" value="<?php echo $this->session->userdata['direccion'] ?>">
                      </div>
                      <div class="col-md-4" style="height: 128px;">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <a href="#" class="btn btn-save">
                                Save changes
                            </a>
                        </div>
                      </div>
                </div>
            </form>

        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

        <script>const fileInput = document.getElementById('fileInput');
const changeImageBtn = document.getElementById('changeImageBtn');
const profileImage = document.getElementById('profileImage');


const allowedExtensions = ['image/jpeg', 'image/png']; 


changeImageBtn.addEventListener('click', (e) => {
    e.preventDefault(); 
    fileInput.click(); 
});

fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0]; 
    if (file) {
        if (!allowedExtensions.includes(file.type)) {
            alert('Invalid file type. Please select a JPEG or PNG image.');
            return; 
        }

        const reader = new FileReader();

        reader.onload = (event) => {
            profileImage.src = event.target.result; 
        };

        reader.readAsDataURL(file); 
    }
});
</script>

<script>
$(document).ready(function() {
    $('.btn-save').on('click', function(e) {
        e.preventDefault();

        // Create FormData object
        var formData = new FormData();
        
        // Append text inputs
        formData.append('name', $('#name').val());
        formData.append('user', $('#user').val());
        formData.append('email', $('#email').val());
        formData.append('address', $('#address').val());

        // Append file input if a file is selected
        var fileInput = $('#fileInput')[0];
        if (fileInput.files.length > 0) {
            formData.append('profile_pic', fileInput.files[0]);
        }

        $.ajax({
            url: '<?php echo base_url("profile/update_profile"); ?>', 
            type: 'POST',
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response);
                if (response.status === 'success') {
                    alert(response.message);
                    
                    // Update profile picture if a new one was uploaded
                    if (response.profile_pic) {
                        $('#profileImage').attr('src', '<?php echo product_image_url("/pfp/"); ?>' + response.profile_pic);
                    }
                    
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('XHR:', xhr);
                console.log('Status:', status);
                console.log('Error:', error);
                alert('An error occurred while updating the profile: ' + error);
            }
        });
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        function openprofile() {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        }



        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownToggle.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
    </body>
</html>
