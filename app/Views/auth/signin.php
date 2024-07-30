
        <div class="row justify-content-md-center">
            <div class="col-5">

                <h2>Login</h2>


                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Email">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>
