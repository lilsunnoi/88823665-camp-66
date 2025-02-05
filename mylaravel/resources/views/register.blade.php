@extends('layouts.default')

@section('content')
<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.register-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="{{ url('/register') }}" method="post" id="register-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required />
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                        <div class="valid-feedback">OK</div>
                        <div class="invalid-feedback" id="invalid-name">
                            กรุณาระบุข้อมูล name
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required />
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                <!-- Click me button -->
                <button class="btn btn-info" onclick="myfunction()">Click me</button>
            </div>
            <!-- /.register-card-body -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function myfunction() {
        Swal.fire("SweetAlert2 is working!");
    }

    document.getElementById('register-form').addEventListener('submit', function(event) {
        let name = $('#name').val().trim();
        let email = $('#email').val().trim();
        let password = $('#password').val().trim();
        let checkbox = $('#flexCheckDefault').prop('checked');
        let isValid = true;

        if (name === "") {
            $('#invalid-name').show();
            $('#name').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalid-name').hide();
            $('#name').removeClass('is-invalid');
        }

        if (!isValid) {
            event.preventDefault();
            return;
        }

        event.preventDefault();
        Swal.fire({
            title: "ลงทะเบียนสำเร็จ!",
            text: "คุณสามารถเข้าสู่ระบบได้แล้ว",
            icon: "success",
            confirmButtonText: "ตกลง"
        }).then(() => {
            document.getElementById('register-form').submit();
        });
    });
</script>
@endsection
