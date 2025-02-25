<!-- filepath: /C:/xampp/htdocs/88823665-camp-66/mylaravel/resources/views/register.blade.php -->
@extends('layouts.default')

@section('content')
<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
        </div>
        <!-- /.register-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="{{ route('register') }}" method="post" id="register-form">
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
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
                        <div class="invalid-feedback">
                        </div>
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
            </div>
            <!-- /.register-card-body -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
    let name = $('#name').val().trim();
    let email = $('#email').val().trim();
    let password = $('#password').val().trim();
    let checkbox = $('#flexCheckDefault').prop('checked');
    let isValid = true;

    // ตรวจสอบ Name ต้องไม่ว่าง
    if (name === "") {
        $('#invalid-name').show();
        $('#name').addClass('is-invalid');
        isValid = false;
    } else {
        $('#invalid-name').hide();
        $('#name').removeClass('is-invalid');
    }

    // ตรวจสอบ Email ต้องมี '@' และ '.'
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        $('#email').addClass('is-invalid');
        if (!$('#invalid-email').length) {
            $('#email').after('<div class="invalid-feedback" id="invalid-email">กรุณาระบุอีเมลให้ถูกต้อง</div>');
        }
        $('#invalid-email').show();
        isValid = false;
    } else {
        $('#email').removeClass('is-invalid');
        $('#invalid-email').hide();
    }

    // ตรวจสอบ Password ต้องมี ตัวเลข, ตัวพิมพ์เล็ก, ตัวพิมพ์ใหญ่
    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    if (!passwordPattern.test(password)) {
        $('#password').addClass('is-invalid');
        if (!$('#invalid-password').length) {
            $('#password').after('<div class="invalid-feedback" id="invalid-password">รหัสผ่านต้องมี ตัวเลข ตัวพิมพ์เล็ก และตัวพิมพ์ใหญ่ อย่างน้อย 6 ตัว</div>');
        }
        $('#invalid-password').show();
        isValid = false;
    } else {
        $('#password').removeClass('is-invalid');
        $('#invalid-password').hide();
    }

    // ตรวจสอบ Checkbox ต้องถูกติ๊ก
    if (!checkbox) {
        $('#flexCheckDefault').addClass('is-invalid');
        if (!$('#invalid-checkbox').length) {
            $('#flexCheckDefault').after('<div class="invalid-feedback d-block" id="invalid-checkbox">กรุณายอมรับเงื่อนไข</div>');
        }
        $('#invalid-checkbox').show();
        isValid = false;
    } else {
        $('#flexCheckDefault').removeClass('is-invalid');
        $('#invalid-checkbox').hide();
    }

    if (!isValid) {
        event.preventDefault();
        return;
    }

    event.preventDefault();
    Swal.fire({
        title: "ลงทะเบียนสำเร็จ!",
        text: "กำลังนำคุณไปยังหน้าใช้งาน...",
        icon: "success",
        confirmButtonText: "ไปต่อ"
    }).then(() => {
        window.location.href = "{{ url('/users') }}";
    });
});
</script>
@endsection
