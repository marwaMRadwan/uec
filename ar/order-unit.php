<?php require 'head.php';?>
<?php require 'nav.php';?>

<section class="bg-img">
    <div class="container">
        <div id="result"></div>
        <form style="width:100%" id="my_form_id">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ادخل الاسم"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-at"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="ادخل البريد الالكترونى"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="phone1" name="phone1" placeholder="ادخل التليفون 1"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="phone2" name="phone2" placeholder="ادخل التليفون 2"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-american-sign-language-interpreting"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="role" name="role" placeholder="الدور"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-space-shuttle"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="space" name="space" placeholder="مساحة الوحدة"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-tape"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="type" name="type" placeholder="نوع الوحدة"
                                aria-label="type" aria-describedby="basic-addon2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-city"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="city" name="city" placeholder="مدينة"
                                aria-label="city" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="price" name="price" placeholder="سعر الوحدة"
                                aria-label="price" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="far fa-envelope-open"></i>
                                </span>
                            </div>
                            <textarea class="form-control" rows="4" name="msg" id="message" placeholder="ادخل الرسالة" cols="5"
                                aria-label="msg" aria-describedby="basic-addon2"></textarea>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <input id="submit" type="submit" class="form-control" name="submit" value="اطلب الان">
                    </div>
                </div>
            </form>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
            $(document).ready(function(){
            $('#my_form_id').on('submit', function(e){
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var message = $('#message').val();
                var price = $('#price').val();
                var city = $('#city').val();
                var type = $('#type').val();
                var space = $('#space').val();
                var role = $('#role').val();
                var phone2 = $('#phone2').val();
                var phone1 = $('#phone1').val();
                console.log( $("#my_form_id").serialize());
                $.post('order_unit_action.php', {
                    name:name,
                    email:email,
                    message:message,
                    price:price,
                    city:city,
                    type:type,
                    space:space,
                    role:role,
                    phone1:phone1,
                    phone2:phone2
                    },
                    function(data,status){
                        $('#result').html(data);
                        $('#my_form_id')[0].reset();
                    }
                );
            });
        });

</script>
    <?php require 'footer.php';?>