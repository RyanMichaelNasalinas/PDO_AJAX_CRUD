<!-- Create or Edit data in this modal section -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name">
          </div>

          <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          </div>

          <div class="form-group">
              <label id="label_pass">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          </div>

          <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          </div>

        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id" id="user_id">
          <input type="submit" name="action" id="action" class="btn btn-success" />
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>  
    </div>
  </div>
</div>