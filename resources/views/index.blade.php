<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Posts Management</title>
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

        /* تنسيق الرسائل التنبيهية لتكون على قد الكلام تماماً وفي المنتصف */
        .custom-alert {
            display: inline-flex !important;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .custom-alert .btn-close {
            padding: 0;
            margin-left: 10px;
            font-size: 0.8rem;
        }

        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: #ffffff;
            overflow: hidden;
        }

        .card-header-custom {
            background: #ffffff;
            padding: 24px 30px;
            border-bottom: 1px solid #f1f5f9;
        }

        .btn-create {
            background: linear-gradient(135deg, #4318ff 0%, #3311db 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(67, 24, 255, 0.2);
        }

        .btn-create:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 24, 255, 0.35);
        }

        .custom-table {
            margin-bottom: 0;
        }

        .custom-table thead th {
            background-color: #f8fafc;
            color: #8f9bba;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            padding: 16px;
            border-bottom: 2px solid #e2e8f0;
        }

        .custom-table tbody tr {
            transition: all 0.2s ease;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .custom-table td {
            padding: 16px;
            vertical-align: middle;
            color: #1b2559;
            font-weight: 500;
            border-bottom: 1px solid #f1f5f9;
        }

        .badge-id {
            background-color: #e0e7ff;
            color: #4318ff;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .badge-age {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        /* Responsive Table for Mobile */
        @media (max-width: 767.98px) {
            .responsive-card-table thead {
                display: none;
            }
            .responsive-card-table tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 10px;
                background: #fff;
            }
            .responsive-card-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px dashed #e2e8f0;
                padding: 10px 5px;
            }
            .responsive-card-table td:last-child {
                border-bottom: none;
            }
            .responsive-card-table td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #8f9bba;
                font-size: 0.8rem;
                text-transform: uppercase;
            }
        }
    </style>
</head>
<body>

    <div class="container my-5">

        <!-- التنبيهات (على قد الكلام وفي منتصف الشاشة) -->
        <div class="text-center mb-4">
            @if(session("success"))
                <div class="alert alert-success custom-alert auto-close-alert alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                    <span>{{session("success")}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session("update"))
                <div class="alert alert-primary custom-alert auto-close-alert alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                    <span>{{session("update")}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session("delete"))
                <div class="alert alert-danger custom-alert auto-close-alert alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                    <span>{{session("delete")}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="card main-card">
            
            <!-- Header -->
            <div class="card-header-custom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h3 class="fw-bold m-0 text-dark">Users & Posts</h3>
                    <p class="text-muted small m-0 mt-1">Manage all registered users, their contact info, and posts.</p>
                </div>
                <div>
                    <a href="{{ route('post.create') }}" class="btn btn-create d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-lg"></i> Add New User
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table custom-table responsive-card-table text-center align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Post</th>
                                <th>Age</th>
                                <th>Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td data-label="ID"><span class="badge-id">#{{$user->id}}</span></td>
                                <td data-label="User Name" class="fw-bold text-dark">{{$user->name}}</td>
                                <td data-label="Phone"><span class="text-nowrap text-secondary"><i class="bi bi-telephone me-1 text-muted"></i>{{$user->phone}}</span></td>
                                <td data-label="Email" class="text-primary"><i class="bi bi-envelope me-1 text-muted"></i>{{$user->email}}</td>
                                <td data-label="Post" class="text-truncate" style="max-width: 200px;" title="{{$user->post}}">{{$user->post}}</td>
                                <td data-label="Age"><span class="badge-age">{{$user->age}}</span></td>
                                <td data-label="Controls">
                                    <div class="d-flex justify-content-end justify-content-md-center gap-2">
                                        <a href="{{ route('post.show', $user->id) }}" class="btn btn-action btn-light text-success border" title="Show Details">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('post.edit', $user->id) }}" class="btn btn-action btn-light text-primary border" title="Edit User">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button type="button" class="btn btn-action btn-light text-danger border" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Modals -->
    @foreach($users as $user)
    <div class="modal fade" id="deleteModal{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-start border-0 shadow-lg rounded-4">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-danger d-flex align-items-center gap-2" id="deleteModalLabel{{$user->id}}">
                        <i class="bi bi-exclamation-triangle-fill"></i> Delete User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3 text-secondary">
                    Are you sure you want to delete user <strong class="text-dark">{{$user->name}}</strong>? This action cannot be undone.
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light rounded-3 px-3" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('post.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-3 px-3">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // إغلاق التنبيهات تلقائيًا بعد 3 ثوانٍ
        const alertElements = document.querySelectorAll('.auto-close-alert');
        alertElements.forEach(function (alertElement) {
            setTimeout(function () {
                const bsAlert = new bootstrap.Alert(alertElement);
                bsAlert.close();
            }, 3000);
        });
    });
    </script>
</body>
</html>