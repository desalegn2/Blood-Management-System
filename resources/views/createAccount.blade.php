<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .gradient-custom-2 {

            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>

<body style="background-color: #eee;">
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{asset('assets/imgs/bblogo3.png')}}" style="width: 185px;  border-radius: 50%;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Bahir Dar Blood Bank</h4>
                                    </div>

                                    <form action="create_acc" method="post" enctype=" multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="role" class="form-control" value="1" required>
                                        <input type="hidden" name="photo" class="form-control" value="0.png" required>
                                        <div class="form-outline mb-4">
                                            <div style="color: red;">
                                                @error('name')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <input name="name" id="form2Example11" class="form-control" placeholder="Enter Full Name" />
                                            <label class="form-label" for="form2Example11">Full Name</label>
                                        </div>


                                        <div class="form-outline mb-4">
                                            <div style="color: red;">
                                                @error('email')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <input type="email" name="email" id="form2Example22" class="form-control" placeholder="Enter Your Email" />
                                            <label class="form-label" for="form2Example22">Email</label>

                                        </div>
                                        <div class="form-outline mb-4">
                                            <div style="color: red;">
                                                @error('password')
                                                <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <input type="password" name="password" id="form2Example11" class="form-control" placeholder="Enter Password" />
                                            <label class="form-label" for="form2Example11">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password_confirmation" id="form2Example22" class="form-control" placeholder="Confirm" />
                                            <label class="form-label" for="form2Example22">Confirm Password</label>
                                        </div>
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-info btn-lg btn-block" type="submit">Create</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <a>I already have a membership</a>
                                            <button type="button" class="btn btn-outline-danger"><a href="{{ route('login') }}" class="text-center">Login</a></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Bahir Dar Blood Bank</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>