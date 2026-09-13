<?php
declare(strict_types=1);
require_once __DIR__ . '/../config.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}

function e(?string $value): string { return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); }
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function verify_csrf(): bool {
    return isset($_POST['csrf'], $_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string)$_POST['csrf']);
}
function redirect(string $path): never { header('Location: ' . url($path)); exit; }
function flash(string $type, string $message): void { $_SESSION['flash'] = ['type'=>$type,'message'=>$message]; }
function get_flash(): ?array { $f=$_SESSION['flash']??null; unset($_SESSION['flash']); return $f; }
function current_user(): ?array { return $_SESSION['user'] ?? null; }
function require_login(): void { if (!current_user()) { flash('error','Please log in to continue.'); redirect('login.php'); } }
function require_role(string ...$roles): void {
    require_login();
    if (!in_array(current_user()['role'] ?? '', $roles, true)) { http_response_code(403); require __DIR__.'/403.php'; exit; }
}
function login_user(array $user): void {
    session_regenerate_id(true);
    $_SESSION['user'] = ['id'=>(int)$user['id'],'name'=>$user['full_name'],'email'=>$user['email'],'role'=>$user['role']];
}
function logout_user(): void { $_SESSION=[]; if (ini_get('session.use_cookies')) { $p=session_get_cookie_params(); setcookie(session_name(),'',time()-42000,$p['path'],$p['domain'],$p['secure'],$p['httponly']); } session_destroy(); }
function validate_email(string $email): bool { return (bool)filter_var($email, FILTER_VALIDATE_EMAIL); }
function page_head(string $title, string $description=''): void {
    $desc = $description ?: 'Learn with Nazmul is a dynamic learning management platform for accessible digital education.';
    $canonical = url(basename($_SERVER['PHP_SELF']));
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<meta name="description" content="'.e($desc).'">';
    echo '<meta name="keywords" content="online learning, online courses, web development, data analytics, artificial intelligence, cyber security">';
    echo '<meta name="robots" content="index,follow">';
    echo '<link rel="canonical" href="'.e($canonical).'">';
    echo '<title>'.e($title).' | Learn with Nazmul</title><link rel="stylesheet" href="'.url('css/style.css').'">';
    echo '</head><body>';
}
function site_header(string $active=''): void {
    $u=current_user();
    echo '<header class="site-header"><div class="header-container"><a class="site-logo" href="'.url('index.php').'" aria-label="Learn with Nazmul home">Learn with Nazmul</a>';
    echo '<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-navigation">Menu</button></div></header>';
    echo '<nav id="main-navigation" class="main-navigation" aria-label="Main navigation"><ul>';
    $items=['index.php'=>'Home','about.php'=>'About Us','courses.php'=>'Courses','media.php'=>'Media','contact.php'=>'Contact Us'];
    foreach($items as $href=>$label){$cur=$active===basename($href)?' aria-current="page"':''; echo '<li><a href="'.url($href).'"'.$cur.'>'.e($label).'</a></li>';}
    if($u){ echo '<li><a href="'.url('dashboard.php').'">Dashboard</a></li><li><a href="'.url('logout.php').'">Log out</a></li>'; }
    else { echo '<li><a href="'.url('login.php').'">Log in</a></li><li><a class="nav-register" href="'.url('register.php').'">Register</a></li>'; }
    echo '</ul></nav>';
}
function site_footer(): void { echo '<footer class="site-footer"><div class="footer-container"><div><h2>Learn with Nazmul</h2><p>A dynamic learning platform supporting accessible and engaging digital education.</p></div><div><h2>Quick Links</h2><p><a href="'.url('privacy.php').'">Privacy Notice</a> · <a href="'.url('contact.php').'">Contact</a></p></div><div><h2>Contact</h2><p>Email: info@learnwithnazmul.example<br>Online learning support</p></div></div><div class="footer-bottom">&copy; 2026 Learn with Nazmul. Academic project for ICT726.</div></footer><script src="'.url('js/script.js').'"></script></body></html>'; }
function render_flash(): void { if($f=get_flash()){ echo '<div class="container"><div class="alert '.e($f['type']).'" role="alert">'.e($f['message']).'</div></div>'; } }
?>