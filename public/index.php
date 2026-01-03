<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Router;
use App\Controller\HomeController;
use App\Controller\DashboardController;
use App\Controller\AuthController;
use App\Controller\ContentVideoController;
use App\Controller\ContentImageController;
use App\Controller\ContentNewsController;
use App\Controller\PegadaianController;
use App\Controller\PeminjamanController;
use App\Controller\PengajuanLayanan;
use App\Controller\PenitipanController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\RoleMiddleware;

/* ---=====<( PAGE ROUTES START )>=====---- */

// Home Page Routes
Router::addRoute(method: "GET", path: "/", controller: HomeController::class, action: "index");

// Authentication Page Routes
Router::addRoute(method: "GET", path: "/login", controller: AuthController::class, action: "showLoginPage");
Router::addRoute(method: "GET", path: "/register", controller: AuthController::class, action: "showRegisterPage");

// Dashboard Page Routes
Router::addRoute(method: "GET", path: "/dashboard", controller: DashboardController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai", "anggota"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-content", controller: DashboardController::class, action: "showManageContentPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi", controller: DashboardController::class, action: "showLayananKoperasiPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);

// Manage User Page Routes
Router::addRoute(method: "GET", path: "/dashboard/manage-user", controller: UserController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-user/create", controller: UserController::class, action: "showCreateUserPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-user/edit/:id", controller: UserController::class, action: "showEditUserPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Manage Content Video Page Routes
Router::addRoute(method: "GET", path: "/dashboard/manage-content/video", controller: ContentVideoController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-content/video/create", controller: ContentVideoController::class, action: "showCreateVideoPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-content/video/edit/:id", controller: ContentVideoController::class, action: "showEditVideoPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Manage Content Image Page Routes
Router::addRoute(method: "GET", path: "/dashboard/manage-content/image", controller: ContentImageController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-content/image/create", controller: ContentImageController::class, action: "showCreateImagePage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/dashboard/manage-content/image/edit/:id", controller: ContentImageController::class, action: "showEditImagePage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Manage Content News Page Routes
Router::addRoute(method: "GET", path: "/dashboard/manage-content/news", controller: ContentNewsController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Pengajuan Layanan Page Routes
Router::addRoute(method: "GET", path: "/dashboard/pengajuan-layanan", controller: PengajuanLayanan::class, action: "showPengajuanPegadaianPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/dashboard/pengajuan-layanan/peminjaman", controller: PengajuanLayanan::class, action: "showPengajuanPeminjamanPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/dashboard/pengajuan-layanan/penitipan", controller: PengajuanLayanan::class, action: "showPengajuanPenitipanPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);

// Layanan Koperasi Pegadaian Page Routes
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/pegadaian", controller: PegadaianController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/pegadaian/create", controller: PegadaianController::class, action: "showCreatePangajuanPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);

// Layanan Koperasi Peminjaman Page Routes
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/peminjaman", controller: PeminjamanController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/peminjaman/create", controller: PeminjamanController::class, action: "showCreatePangajuanPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);

// Layanan Koperasi Penitipan Page Routes
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/penitipan", controller: PenitipanController::class, action: "index", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/dashboard/layanan-koperasi/penitipan/create", controller: PenitipanController::class, action: "showCreatePangajuanPage", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);

/* ---=====<( PAGE ROUTES END )>=====---- */



/* ---=====<( ACTION ROUTES START )>=====---- */

// Auth Routes Action
Router::addRoute(method: "POST", path: "/login", controller: AuthController::class, action: "login");
Router::addRoute(method: "GET", path: "/logout", controller: AuthController::class, action: "logout");

// Users Routes CRUD Action
Router::addRoute(method: "POST", path: "/users/create", controller: UserController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/users/delete/:id", controller: UserController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "POST", path: "/users/edit/:id", controller: UserController::class, action: "edit", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/users/activate/:id", controller: UserController::class, action: "activate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/users/deactivate/:id", controller: UserController::class, action: "deactivate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Videos Routes CRUD Action
Router::addRoute(method: "POST", path: "/videos/create", controller: ContentVideoController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/videos/delete/:id", controller: ContentVideoController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "POST", path: "/videos/edit/:id", controller: ContentVideoController::class, action: "edit", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/videos/activate/:id", controller: ContentVideoController::class, action: "activate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/videos/deactivate/:id", controller: ContentVideoController::class, action: "deactivate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Images Routes CRUD Action
Router::addRoute(method: "POST", path: "/images/create", controller: ContentImageController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/images/delete/:id", controller: ContentImageController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "POST", path: "/images/edit/:id", controller: ContentImageController::class, action: "edit", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/images/activate/:id", controller: ContentImageController::class, action: "activate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);
Router::addRoute(method: "GET", path: "/images/deactivate/:id", controller: ContentImageController::class, action: "deactivate", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator"])]);

// Pegadaian Routes CRUD Action
Router::addRoute(method: "POST", path: "/pegadaian/create", controller: PegadaianController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/pegadaian/delete/:id", controller: PegadaianController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/pegadaian/review/:id", controller: PegadaianController::class, action: "review", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/pegadaian/approve/:id", controller: PegadaianController::class, action: "approve", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/pegadaian/reject/:id", controller: PegadaianController::class, action: "reject", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);

// Peminjaman Routes CRUD Action
Router::addRoute(method: "POST", path: "/peminjaman/create", controller: PeminjamanController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/peminjaman/delete/:id", controller: PeminjamanController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/peminjaman/review/:id", controller: PeminjamanController::class, action: "review", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/peminjaman/approve/:id", controller: PeminjamanController::class, action: "approve", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/peminjaman/reject/:id", controller: PeminjamanController::class, action: "reject", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);

// Penitipan Routes CRUD Action
Router::addRoute(method: "POST", path: "/penitipan/create", controller: PenitipanController::class, action: "save", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/penitipan/delete/:id", controller: PenitipanController::class, action: "delete", middlewares: [AuthMiddleware::class, new RoleMiddleware(["anggota"])]);
Router::addRoute(method: "GET", path: "/penitipan/review/:id", controller: PenitipanController::class, action: "review", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/penitipan/approve/:id", controller: PenitipanController::class, action: "approve", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);
Router::addRoute(method: "GET", path: "/penitipan/reject/:id", controller: PenitipanController::class, action: "reject", middlewares: [AuthMiddleware::class, new RoleMiddleware(["administrator", "pegawai"])]);

/* ---=====<( ACTION ROUTES END )>=====---- */

try {
   Router::dispatch();
} catch (Exception $e) {
   http_response_code(500);
   require_once __DIR__ . "/../app/View/Error/internal-server-error.php";
}