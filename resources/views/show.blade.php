<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - {{ $user->name }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f6f8fb 0%, #e9ecef 100%);
            color: #2b3674;
            min-height: 100vh;
        }

        .details-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
            background: #ffffff;
            overflow: hidden;
        }

        /* Header Accent Banner */
        .card-banner {
            height: 110px;
            background: linear-gradient(135deg, #4318ff 0%, #3311db 100%);
            position: relative;
        }

        /* Avatar Container */
        .avatar-wrapper {
            position: relative;
            margin-top: -55px;
            display: inline-block;
        }

        .avatar-circle {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #4318ff;
            font-size: 2.5rem;
            font-weight: 800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid #ffffff;
            box-shadow: 0 10px 25px rgba(67, 24, 255, 0.2);
            margin: 0 auto;
        }

        .badge-id-large {
            background-color: #e0e7ff;
            color: #4318ff;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            display: inline-block;
        }

        /* Info Item Row Styling */
        .info-box {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 16px;
            transition: all 0.2s ease;
        }

        .info-box:hover {
            border-color: #e2e8f0;
            background: #ffffff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.03);
            transform: translateY(-2px);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .icon-phone { background-color: #e0f2fe; color: #0284c7; }
        .icon-email { background-color: #e0e7ff; color: #4318ff; }
        .icon-age   { background-color: #f1f5f9; color: #475569; }

        .post-card {
            background: linear-gradient(135deg, #fafbfd 0%, #f4f7fe 100%);
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            padding: 20px;
        }

        .btn-back {
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background-color: #e2e8f0;
            color: #1e293b;
        }

        .btn-edit-action {
            background: linear-gradient(135deg, #4318ff 0%, #3311db 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(67, 24, 255, 0.2);
        }

        .btn-edit-action:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 24, 255, 0.35);
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                
                <div class="card details-card">
                    <!-- Top Gradient Banner -->
                    <div class="card-banner"></div>

                    <div class="card-body text-center pt-0 px-4 pb-4">
                        <!-- User Avatar with First Letter -->
                        <div class="avatar-wrapper mb-3">
                            <div class="avatar-circle">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>

                        <!-- Name & Badge -->
                        <h3 class="fw-bold text-dark m-0">{{ $user->name }}</h3>
                        <div class="mt-2 mb-4">
                            <span class="badge-id-large">User ID: #{{ $user->id }}</span>
                        </div>

                        <!-- Detailed Info Grid -->
                        <div class="d-flex flex-column gap-3 text-start">
                            
                            <!-- Phone -->
                            <div class="info-box d-flex align-items-center gap-3">
                                <div class="info-icon icon-phone">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div>
                                    <span class="d-block text-muted small fw-semibold text-uppercase">Phone Number</span>
                                    <span class="fw-bold text-dark fs-6">{{ $user->phone }}</span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="info-box d-flex align-items-center gap-3">
                                <div class="info-icon icon-email">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <div>
                                    <span class="d-block text-muted small fw-semibold text-uppercase">Email Address</span>
                                    <span class="fw-bold text-dark fs-6">{{ $user->email }}</span>
                                </div>
                            </div>

                            <!-- Age -->
                            <div class="info-box d-flex align-items-center gap-3">
                                <div class="info-icon icon-age">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div>
                                    <span class="d-block text-muted small fw-semibold text-uppercase">Age</span>
                                    <span class="fw-bold text-dark fs-6">{{ $user->age }} Years Old</span>
                                </div>
                            </div>

                            <!-- Post Content -->
                            <div class="post-card mt-2">
                                <div class="d-flex align-items-center gap-2 mb-2 text-primary fw-bold small text-uppercase">
                                    <i class="bi bi-quote fs-5"></i> User Post Content
                                </div>
                                <p class="m-0 text-secondary lh-base fs-6 fw-normal">
                                    {{ $user->post }}
                                </p>
                            </div>

                        </div>

                        <!-- Action Buttons Footer -->
                        <div class="d-flex justify-content-between align-items-center gap-2 mt-4 pt-2">
                            <a href="{{ route('post.index') }}" class="btn btn-back d-inline-flex align-items-center gap-2">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                            
                            <a href="{{ route('post.edit', $user->id) }}" class="btn btn-edit-action d-inline-flex align-items-center gap-2">
                                <i class="bi bi-pencil-fill"></i> Edit Profile
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>