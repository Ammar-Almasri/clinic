<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Ammar Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/images/clinic-bg.jpg') center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 0 15px;
        }

        .btn-main {
            background-color: #198754;
            color: #fff;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
        }

        .btn-main:hover {
            background-color: #146c43;
        }

        section {
            padding: 60px 20px;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
        }

        .footer {
            background-color: #212529;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .navbar-brand img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .nav-link {
            color: #000 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm px-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/images/logo.jpg" alt="Logo" class="me-2">
                <span class="fw-bold">Ammar Clinic</span>
            </a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="nav-link d-inline me-3">Login</a>
                <a href="{{ route('register') }}" class="nav-link d-inline">Register</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="hero">
        <h1 class="display-4 fw-bold">Your Health, Our Priority</h1>
        <p class="lead mt-3">Trusted care, expert doctors, easy appointments.</p>
        <a href="{{ route('login') }}" class="btn btn-main mt-4">Get Started</a>
    </div>

    <!-- ABOUT US -->
    <section id="about" class="bg-white">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>
                        At Ammar Clinic, we are committed to delivering top-tier healthcare
                        with a personal touch. Whether you're coming for a routine check-up or specialized treatment,
                        our expert staff is here to support your wellness journey.
                    </p>
                    <ul>
                        <li>✅ Certified Doctors</li>
                        <li>✅ Modern Facilities</li>
                        <li>✅ Easy Online Appointments</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="/images/about-us.jpg" class="img-fluid rounded shadow" alt="Clinic Team">
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="bg-light">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>📍 Address:</strong> 123 Clinic Street, Amman, Jordan</p>
                    <p><strong>📞 Phone:</strong> +962 6 123 4567</p>
                    <p><strong>✉️ Email:</strong> info@ammarclinic.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} Ammar Clinic. All rights reserved.
        </div>
    </footer>

</body>
</html>
