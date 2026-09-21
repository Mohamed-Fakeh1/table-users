<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f6f8fb 0%, #e9ecef 100%);
            color: #2b3674;
            min-height: 100vh;
        }

        .form-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: #ffffff;
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            padding: 24px 30px;
            border: none;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.88rem;
            margin-bottom: 6px;
        }

        .input-group-text {
            background-color: #f8fafc;
            border-color: #e2e8f0;
            color: #94a3b8;
            border-radius: 10px 0 0 10px;
        }

        .form-control {
            border-color: #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.95rem;
            color: #334155;
            transition: all 0.2s ease;
        }

        .input-group .form-control {
            border-radius: 0 10px 10px 0;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.35);
            background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
        }

        .btn-back {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                
                <div class="card form-card">
                    <!-- Header -->
                    <div class="form-card-header text-white">
                        <h4 class="m-0 fw-bold d-flex align-items-center gap-2">
                            <i class="bi bi-person-plus-fill fs-4"></i> Add New User
                        </h4>
                        <p class="mb-0 text-white-50 small mt-1">Fill in the details below to create a new user entry.</p>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 p-md-5">
                        <form action="{{route('post.store')}}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. John Doe">
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Age -->
                                <div class="col-md-6">
                                    <label class="form-label">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                        <input type="number" name="age" value="{{ old('age') }}" class="form-control @error('age') is-invalid @enderror" placeholder="e.g. 25">
                                    </div>
                                    @error('age')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+1 (555) 000-0000">
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@example.com">
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Post -->
                                <div class="col-12">
                                    <label class="form-label">Post Content</label>
                                    <textarea name="post" rows="3" class="form-control @error('post') is-invalid @enderror" placeholder="Write post content here...">{{ old('post') }}</textarea>
                                    @error('post')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                                <a href="{{ route('post.index') }}" class="btn btn-light border btn-back text-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Back
                                </a>
                                <button type="submit" class="btn btn-primary btn-submit text-white d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill"></i> Save User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>