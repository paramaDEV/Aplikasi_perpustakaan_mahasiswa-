<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account for Administrator</h1>
                            </div>
                            <form class="user" method="POST" action="<?=base_url().'main_controller/register'?>">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?=set_value('nama')?>"
                                            placeholder="Nama Lengkap">
                                        <?=form_error('nama',"<small class='text-danger' style='margin-bottom:-15px'>","</small>")?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="no_induk" name="no_induk" value="<?=set_value('no_induk')?>"
                                        placeholder="Nomer Induk">
                                        <?=form_error('no_induk',"<small class='text-danger' style='margin-bottom:-15px'>","</small>")?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?=set_value('email')?>"
                                        placeholder="Email">
                                        <?=form_error('email',"<small class='text-danger' style='margin-bottom:-15px'>","</small>")?>
                                </div>
                                <div class="form-group">
                                    <select  class="form-control form-control" id="kelamin" name="kelamin" style="border-radius:25px;height:50px">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?=form_error('kelamin',"<small class='text-danger' style='margin-bottom:-15px'>","</small>")?>
                                </div>
                                <div class="form-group">
                                    <input type="date"  class="form-control form-control" id="ttl" name="ttl" style="border-radius:25px;height:50px">
                                    <?=form_error('ttl',"<small class='text-danger' style='margin-bottom:-15px'>","</small>")?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="repassword" name="repassword" placeholder="Repeat Password">
                                    </div>
                                    <?=form_error('password',"<small class='text-danger ml-3' style='margin-bottom:-15px'>","</small>")?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url().'main_controller/index'?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>