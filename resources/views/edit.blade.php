<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - {{ $post->name }}</title>
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
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.15);
        }

        .btn-update {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 119, 6, 0.35);
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
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
                            <i class="bi bi-pencil-square fs-4"></i> Edit User: {{ $post->name }}
                        </h4>
                        <p class="mb-0 text-white-50 small mt-1">Update the account information and post content below.</p>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="name" value="{{ old('name', $post->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. John Doe">
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
                                        <input type="number" name="age" value="{{ old('age', $post->age) }}" class="form-control @error('age') is-invalid @enderror" placeholder="e.g. 25">
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
                                        <input type="text" name="phone" value="{{ old('phone', $post->phone) }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+1 (555) 000-0000">
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
                                        <input type="email" name="email" value="{{ old('email', $post->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@example.com">
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Post -->
                                <div class="col-12">
                                    <label class="form-label">Post Content</label>
                                    <textarea name="post" rows="3" class="form-control @error('post') is-invalid @enderror" placeholder="Write post content here...">{{ old('post', $post->post) }}</textarea>
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
                                <button type="button" class="btn btn-warning btn-update text-white d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal">
                                    <i class="bi bi-arrow-repeat"></i> Update Changes
                                </button>
                            </div>

                            <!-- Confirm Update Modal -->
                            <div class="modal fade" id="confirmUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmUpdateModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-start border-0 shadow-lg rounded-4">
                                        <div class="modal-header border-bottom-0 pb-0">
                                            <h5 class="modal-title fw-bold text-warning d-flex align-items-center gap-2" id="confirmUpdateModalLabel">
                                                <i class="bi bi-question-circle-fill"></i> Confirm Update
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body py-3 text-secondary">
                                            Are you sure you want to update details for user <strong class="text-dark">{{ $post->name }}</strong>?
                                        </div>
                                        <div class="modal-footer border-top-0 pt-0">
                                            <button type="button" class="btn btn-light rounded-3 px-3" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-warning text-white rounded-3 px-3 fw-semibold">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>