@extends('layouts.default')

@section('styles')
    <style>
        :root {
            --primary-color: #4A90E2; /* สีน้ำเงิน */
            --secondary-color: #3A4D75; /* สีเทาเข้ม */
            --light-gray: #f4f7fa; /* สีเทาอ่อน */
            --dark-gray: #4b4f55; /* สีเทาเข้ม */
        }

        body {
            background-color: var(--light-gray);
        }

        .register-page {
            background-color: var(--light-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .register-logo a {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 600;
        }

        .card {
            border: none;
        }

        .card-body {
            padding: 2rem;
        }

        .input-group-text {
            background-color: var(--secondary-color);
            color: #fff;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .is-invalid {
            border-color: red !important;
        }

        .invalid-feedback {
            font-size: 0.875rem;
            color: red;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            color: var(--dark-gray);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #357ab7;
            border-color: #357ab7;
        }

        .invalid-feedback.d-block {
            display: block;
        }

        .invalid-feedback {
            display: none;
        }
    </style>
@endsection

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
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name"
                                required />
                            <div class="valid-feedback">OK</div>
                            <div class="invalid-feedback" id="invalid-name"></div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                required />
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required />
                        </div>
                        <div class="invalid-feedback d-block"></div>

                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        required />
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
                    $('#email').after(
                        '<div class="invalid-feedback" id="invalid-email">กรุณาระบุอีเมลให้ถูกต้อง</div>');
                }
                $('#invalid-email').show();
                isValid = false;
            } else {
                $('#email').removeClass('is-invalid');
                $('#invalid-email').hide();
            }

            // ตรวจสอบ Password ต้องมี ตัวเลข, ตัวพิมพ์เล็ก, ตัวพิมพ์ใหญ่
            let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)$/;
            if (!passwordPattern.test(password)) {
                $('#password').addClass('is-invalid');
                if (!$('#invalid-password').length) {
                    $('#password').after(
                        '<div class="invalid-feedback" id="invalid-password">รหัสผ่านต้องมี ตัวเลข ตัวพิมพ์เล็ก และตัวพิมพ์ใหญ่</div>'
                        );
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
                    $('#flexCheckDefault').after(
                        '<div class="invalid-feedback d-block" id="invalid-checkbox">กรุณายอมรับเงื่อนไข</div>');
                }
                $('#invalid-checkbox').show();
                isValid = false;
            } else {
                $('#flexCheckDefault').removeClass('is-invalid');
                $('#invalid-checkbox').hide();
            }

            // ถ้าไม่ผ่านการตรวจสอบ ให้หยุดการส่งฟอร์ม
            if (!isValid) {
                event.preventDefault();
                return;
            }

            // ถ้าผ่านการตรวจสอบ, แสดงข้อความลงทะเบียนสำเร็จ
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
