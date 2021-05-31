<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di sistem Informasi Perpustakaan</h1>
                                    </div>
                                    <?=$this->session->flashdata("message")?>
                                    <form class="user" method="POST" action="<?=base_url().'main_controller/index'?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="no_induk" name='no_induk' value="<?=set_value('no_induk')?>" placeholder="Nomer Induk">
                                            <?=form_error('no_induk',"<small class='text-danger ml-3' style='margin-bottom:-15px'>","</small>")?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?=form_error('password',"<small class='text-danger ml-3' style='margin-bottom:-15px'>","</small>")?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url().'main_controller/register'?>">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>