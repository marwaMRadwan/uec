<?php require 'head.php';?>
<?php require 'nav.php';?>
    <section class="bg-img">
        <div class="container">
                    <div id="result"></div>

            <form style="width:100%" id="my_form_id">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-at"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Enter phone1"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Enter phone2"
                                aria-label="Username" aria-describedby="basic-addon2">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="far fa-envelope-open"></i>
                                </span>
                            </div>
                            <textarea class="form-control" rows="4" name="msg" id="message" placeholder="Enter Your Message" cols="5"
                                aria-label="msg" aria-describedby="basic-addon2"></textarea>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <input id="submit" type="submit" class="form-control" name="submit" value="Order Now">
                    </div>
                </div>
            </form>
        </div>
    </section>






    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#my_form_id').on('submit', function(e){
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var message = $('#message').val();
                var phone2 = $('#phone2').val();
                var phone1 = $('#phone1').val();
                console.log( $("#my_form_id").serialize());
                $.post('contact_action.php', {
                        name:name,
                        email:email,
                        message:message,
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