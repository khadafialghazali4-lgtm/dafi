<?php
// logistrasi.php (Login + Registrasi)
$pageTitle = "Alghazali Art — Logistrasi";
$currentPage = "logistrasi";

$success = isset($_GET['success']) ? $_GET['success'] : null;
$error   = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg:#0b1220; --panel:rgba(255,255,255,.06); --panel2:rgba(255,255,255,.08);
      --text:rgba(255,255,255,.92); --muted:rgba(255,255,255,.65); --line:rgba(255,255,255,.12);
      --accent:#7c5cff; --accent2:#2ee59d; --shadow:0 20px 60px rgba(0,0,0,.55); --radius:18px;

      --okbg: rgba(46,229,157,.14); --okbd: rgba(46,229,157,.28);
      --erbg: rgba(255,92,145,.12); --erbd: rgba(255,92,145,.25);
      --infbg: rgba(124,92,255,.12); --infbd: rgba(124,92,255,.25);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:"Plus Jakarta Sans", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:var(--text);
      background:
        radial-gradient(1000px 600px at 10% 10%, rgba(124,92,255,.35), transparent 55%),
        radial-gradient(900px 550px at 90% 20%, rgba(46,229,157,.18), transparent 60%),
        radial-gradient(1200px 800px at 40% 100%, rgba(255,255,255,.06), transparent 60%),
        var(--bg);
      overflow-x:hidden;
    }
    a{color:inherit;text-decoration:none}
    .app{min-height:100vh;display:grid;grid-template-columns:280px 1fr;}

    /* Sidebar */
    .sidebar{
      padding:22px 18px;border-right:1px solid var(--line);
      background:rgba(0,0,0,.12);backdrop-filter:blur(10px);
      position:sticky;top:0;height:100vh;
    }
    .brand{
      display:flex;gap:12px;align-items:center;
      padding:14px;border:1px solid var(--line);
      background:linear-gradient(180deg, rgba(255,255,255,.08), rgba(255,255,255,.03));
      border-radius:var(--radius);box-shadow:0 10px 30px rgba(0,0,0,.25);
    }
    .logo{
      width:42px;height:42px;border-radius:14px;
      background:linear-gradient(135deg, var(--accent), rgba(46,229,157,.75));
      display:grid;place-items:center;font-weight:800;letter-spacing:.5px;
    }
    .brand .meta{line-height:1.1}
    .brand .meta .name{font-weight:800}
    .brand .meta .tag{font-size:12px;color:var(--muted)}

    .nav{
      margin-top:16px;padding:10px;border:1px solid var(--line);
      background:rgba(255,255,255,.04);border-radius:var(--radius);
    }
    .nav a{
      display:flex;align-items:center;gap:10px;
      padding:12px;border-radius:14px;color:var(--muted);
      transition:.18s ease;
    }
    .nav a:hover{background:rgba(255,255,255,.06);color:var(--text)}
    .nav a.active{
      background:linear-gradient(135deg, rgba(124,92,255,.25), rgba(46,229,157,.12));
      border:1px solid rgba(124,92,255,.35);
      color:var(--text);
    }
    .dot{width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.25)}
    .nav a.active .dot{background:var(--accent)}

    .contactCard{
      margin-top:16px;padding:14px;border:1px solid var(--line);
      border-radius:var(--radius);
      background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
    }
    .contactCard .label{font-size:12px;color:var(--muted);margin-bottom:6px}
    .contactCard .val{font-size:13px;color:var(--text);opacity:.95;word-break:break-word}
    .chipRow{display:flex;gap:8px;flex-wrap:wrap;margin-top:10px}
    .chip{
      font-size:12px;padding:7px 10px;border-radius:999px;
      border:1px solid var(--line);background:rgba(255,255,255,.04);color:var(--muted);
    }

    /* Main */
    .main{padding:26px 26px 88px;}
    .topbar{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:18px;}
    .hamburger{
      display:none;border:1px solid var(--line);background:rgba(255,255,255,.04);
      color:var(--text);border-radius:14px;padding:10px 12px;cursor:pointer;
    }
    .btn{
      border:1px solid var(--line);background:rgba(255,255,255,.04);color:var(--text);
      padding:10px 12px;border-radius:14px;cursor:pointer;transition:.18s ease;
      display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:13px;
    }
    .btn:hover{transform:translateY(-1px);background:rgba(255,255,255,.06)}
    .btn.primary{
      border-color:rgba(124,92,255,.45);
      background:linear-gradient(135deg, rgba(124,92,255,.35), rgba(46,229,157,.12));
    }

    .section{
      border:1px solid var(--line);
      background:linear-gradient(180deg, rgba(255,255,255,.07), rgba(255,255,255,.03));
      border-radius:calc(var(--radius) + 8px);
      box-shadow:var(--shadow);
      padding:22px;
      position:relative;
      overflow:hidden;
    }
    .section::before{
      content:"";position:absolute;inset:-2px;
      background:
        radial-gradient(560px 220px at 18% 10%, rgba(124,92,255,.26), transparent 60%),
        radial-gradient(520px 220px at 85% 35%, rgba(46,229,157,.14), transparent 60%);
      pointer-events:none;
    }
    .section > *{position:relative}

    h1{margin:0 0 6px;font-size:clamp(24px, 3vw, 40px);letter-spacing:-.4px}
    .subtitle{color:var(--muted);margin:0 0 14px;line-height:1.6;max-width:80ch;font-size:15px}

    .alert{
      margin-top:12px;padding:12px 14px;border-radius:16px;border:1px solid var(--line);
      background:rgba(0,0,0,.12);font-size:13px;line-height:1.6;color:rgba(255,255,255,.88);
    }
    .alert.ok{border-color:var(--okbd); background:var(--okbg);}
    .alert.err{border-color:var(--erbd); background:var(--erbg);}
    .alert.info{border-color:var(--infbd); background:var(--infbg);}

    .tabs{
      margin-top:14px;display:flex;gap:10px;flex-wrap:wrap;
      border:1px solid var(--line);background:rgba(0,0,0,.12);
      padding:10px;border-radius:var(--radius);
    }
    .tab{
      border:1px solid var(--line);background:rgba(255,255,255,.04);
      color:var(--text);padding:10px 12px;border-radius:14px;
      cursor:pointer;font-weight:800;font-size:13px;transition:.18s ease;
    }
    .tab:hover{background:rgba(255,255,255,.06);transform:translateY(-1px);}
    .tab.active{
      border-color:rgba(124,92,255,.45);
      background:linear-gradient(135deg, rgba(124,92,255,.28), rgba(46,229,157,.12));
    }

    .grid2{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:14px;}
    .card{
      border:1px solid var(--line);
      background:rgba(0,0,0,.14);
      border-radius:var(--radius);
      padding:16px;
    }
    .card h3{margin:0 0 10px;font-size:14px}
    .mini{margin:0;color:var(--muted);font-size:13px;line-height:1.7}

    form{display:flex;flex-direction:column;gap:10px;margin-top:10px}
    label{font-size:12px;color:var(--muted)}
    input{
      width:100%;border:1px solid var(--line);background:rgba(0,0,0,.14);color:var(--text);
      padding:12px;border-radius:14px;outline:none;font-family:inherit;font-size:13px;
    }
    .row{display:grid;grid-template-columns:1fr 1fr;gap:10px}
    .help{font-size:12px;color:var(--muted);line-height:1.55;margin-top:6px}
    .actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:6px}
    .hidden{display:none !important;}

    .footer{
      margin-top:18px;padding:14px 8px;color:var(--muted);font-size:12px;
      display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap;
    }
    .footer .links a{color:var(--muted)}
    .footer .links a:hover{color:var(--text)}

    /* Chatbot */
    .chatFab{
      position:fixed;right:20px;bottom:20px;width:56px;height:56px;border-radius:18px;
      border:1px solid rgba(124,92,255,.55);
      background:linear-gradient(135deg, rgba(124,92,255,.45), rgba(46,229,157,.14));
      box-shadow:0 18px 50px rgba(0,0,0,.45);
      cursor:pointer;display:grid;place-items:center;z-index:50;
    }
    .chatPanel{
      position:fixed;right:20px;bottom:88px;
      width:min(420px, calc(100vw - 40px));
      height:min(560px, calc(100vh - 140px));
      border-radius:22px;border:1px solid var(--line);
      background:rgba(10,14,24,.82);backdrop-filter:blur(14px);
      box-shadow:var(--shadow);overflow:hidden;display:none;z-index:50;
    }
    .chatPanel.open{display:flex;flex-direction:column;}
    .chatHeader{
      padding:14px;border-bottom:1px solid var(--line);
      display:flex;align-items:center;justify-content:space-between;gap:10px;
    }
    .chatHeader .title{display:flex;flex-direction:column;gap:2px}
    .chatHeader .title b{font-size:13px}
    .chatHeader .title span{font-size:12px;color:var(--muted)}
    .chatHeader .x{
      border:1px solid var(--line);background:rgba(255,255,255,.04);color:var(--text);
      border-radius:12px;padding:8px 10px;cursor:pointer;
    }
    .hint{font-size:12px;color:var(--muted);padding:10px 12px 0}
    .chatBody{padding:12px;overflow:auto;display:flex;flex-direction:column;gap:10px}
    .msg{
      max-width:88%;padding:10px 12px;border-radius:16px;border:1px solid var(--line);
      font-size:13px;line-height:1.55;white-space:pre-wrap;word-wrap:break-word;
    }
    .msg.user{margin-left:auto;background:rgba(124,92,255,.15);border-color:rgba(124,92,255,.28)}
    .msg.bot{margin-right:auto;background:rgba(255,255,255,.04)}
    .chatInput{
      border-top:1px solid var(--line);padding:12px;display:flex;gap:10px;align-items:center;
      background:rgba(255,255,255,.02);
    }
    .chatInput input{
      flex:1;border:1px solid var(--line);background:rgba(0,0,0,.12);color:var(--text);
      padding:12px;border-radius:14px;outline:none;
    }
    .chatInput button{
      border:1px solid rgba(46,229,157,.35);background:rgba(46,229,157,.12);
      color:var(--text);padding:12px;border-radius:14px;cursor:pointer;font-weight:800;
    }

    @media (max-width: 980px){
      .app{grid-template-columns:1fr}
      .sidebar{
        position:fixed;left:0;top:0;width:min(320px, 86vw);
        transform:translateX(-110%);transition:.22s ease;z-index:60;
      }
      .sidebar.open{transform:translateX(0)}
      .hamburger{display:inline-flex}
      .main{padding:18px 16px 88px}
      .grid2{grid-template-columns:1fr}
      .row{grid-template-columns:1fr}
    }
    @media (prefers-reduced-motion: reduce){*{transition:none !important;}}
  </style>
</head>

<body>
  <div class="app">
    <aside class="sidebar" id="sidebar">
      <div class="brand">
        <div class="logo">AA</div>
        <div class="meta">
          <div class="name">Alghazali Art</div>
          <div class="tag">Web • Desain • Sistem</div>
        </div>
      </div>

      <nav class="nav" aria-label="Menu">
        <?php
          $menu = [
            "home" => ["Home", "home.php"],
            "about" => ["About", "about.php"],
            "layanan" => ["Layanan", "layanan.php"],
            "konpetensi" => ["Konpetensi", "konpetensi.php"],
            "kontak" => ["Kontak", "kontak.php"],
            "logistrasi" => ["Logistrasi", "logistrasi.php"],
          ];
          foreach ($menu as $key => $item) {
            $active = ($currentPage === $key) ? "active" : "";
            echo '<a class="'.$active.'" href="'.htmlspecialchars($item[1]).'"><span class="dot"></span><span>'.htmlspecialchars($item[0]).'</span></a>';
          }
        ?>
      </nav>

      <div class="contactCard">
        <div class="label">Alamat</div>
        <div class="val">Lab FSTI ISTN</div>

        <div style="height:10px"></div>
        <div class="label">Telepon</div>
        <div class="val"><a href="tel:+6281389740505">0813-8974-0505</a></div>

        <div style="height:10px"></div>
        <div class="label">Email</div>
        <div class="val"><a href="mailto:khadafialghazali4@gmail.com">khadafialghazali4@gmail.com</a></div>

        <div class="chipRow">
          <span class="chip">Login</span>
          <span class="chip">Registrasi</span>
          <span class="chip">RBAC</span>
          <span class="chip">Security</span>
        </div>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <button class="hamburger" id="btnMenu" aria-label="Buka menu">☰ Menu</button>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <a class="btn" href="home.php">Home</a>
          <a class="btn primary" href="kontak.php">Butuh Bantuan?</a>
        </div>
      </div>

      <section class="section" aria-label="Logistrasi">
        <h1>Logistrasi</h1>
        <p class="subtitle">
          Masuk atau buat akun untuk akses fitur tertentu. Jika website kamu hanya company profile, halaman ini bersifat opsional.
        </p>

        <?php if ($success): ?>
          <div class="alert ok">✅ <?= htmlspecialchars($success) ?></div>
        <?php elseif ($error): ?>
          <div class="alert err">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php else: ?>
          <div class="alert info">ℹ️ Pilih tab <b>Login</b> atau <b>Registrasi</b>.</div>
        <?php endif; ?>

        <div class="tabs" role="tablist">
          <button class="tab active" id="tabLogin" type="button">🔐 Login</button>
          <button class="tab" id="tabReg" type="button">🧾 Registrasi</button>
        </div>

        <div class="grid2">
          <!-- LOGIN -->
          <div class="card" id="panelLogin" role="tabpanel">
            <h3>Login</h3>
            <p class="mini">Masuk menggunakan email dan password.</p>

            <form method="POST" action="auth_login.php">
              <div>
                <label for="login_email">Email</label>
                <input id="login_email" name="email" type="email" placeholder="nama@email.com" required />
              </div>

              <div>
                <label for="login_password">Password</label>
                <input id="login_password" name="password" type="password" placeholder="••••••••" minlength="6" required />
              </div>

              <div class="actions">
                <button class="btn primary" type="submit">Masuk</button>
                <button class="btn" type="button" id="btnDemoLogin">Isi Demo</button>
              </div>

              <div class="help">
                Rekomendasi: password disimpan memakai <b>password_hash()</b>, session aman, dan rate limit untuk login.
              </div>
            </form>
          </div>

          <!-- REGISTER -->
          <div class="card hidden" id="panelReg" role="tabpanel">
            <h3>Registrasi</h3>
            <p class="mini">Buat akun baru untuk akses modul/fitur tertentu.</p>

            <form method="POST" action="auth_register.php">
              <div class="row">
                <div>
                  <label for="reg_name">Nama</label>
                  <input id="reg_name" name="name" type="text" placeholder="Nama lengkap" required />
                </div>
                <div>
                  <label for="reg_phone">No. WhatsApp</label>
                  <input id="reg_phone" name="phone" type="tel" placeholder="08xxxxxxxxxx" required />
                </div>
              </div>

              <div>
                <label for="reg_email">Email</label>
                <input id="reg_email" name="email" type="email" placeholder="nama@email.com" required />
              </div>

              <div class="row">
                <div>
                  <label for="reg_password">Password</label>
                  <input id="reg_password" name="password" type="password" placeholder="Minimal 6 karakter" minlength="6" required />
                </div>
                <div>
                  <label for="reg_password2">Ulangi Password</label>
                  <input id="reg_password2" name="password2" type="password" placeholder="Ulangi password" minlength="6" required />
                </div>
              </div>

              <div class="actions">
                <button class="btn primary" type="submit">Daftar</button>
                <button class="btn" type="button" id="btnDemoReg">Isi Demo</button>
              </div>

              <div class="help">
                Disarankan: verifikasi email (OTP/link), validasi input, dan proteksi spam (captcha).
              </div>
            </form>
          </div>
        </div>
      </section>

      <footer class="footer">
        <div>© <?= date("Y") ?> Alghazali Art — Lab FSTI ISTN</div>
        <div class="links">
          <a href="home.php">Home</a> ·
          <a href="about.php">About</a> ·
          <a href="kontak.php">Kontak</a>
        </div>
      </footer>
    </main>
  </div>

  <!-- Chatbot -->
  <button class="chatFab" id="chatFab" aria-label="Buka Chatbot">💬</button>

  <section class="chatPanel" id="chatPanel" aria-label="Chatbot Alghazali Art">
    <div class="chatHeader">
      <div class="title">
        <b>Chatbot Alghazali Art</b>
        <span>Model: plas-exp (via GCP)</span>
      </div>
      <button class="x" id="chatClose" aria-label="Tutup">✕</button>
    </div>

    <div class="hint">Tanyakan: “cara login aman?” atau “paket mana yang butuh login?”</div>

    <div class="chatBody" id="chatBody">
      <div class="msg bot">Halo! Saya bisa bantu rekomendasi autentikasi yang aman dan fitur login sesuai kebutuhanmu.</div>
    </div>

    <form class="chatInput" id="chatForm" autocomplete="off">
      <input id="chatText" type="text" placeholder="Ketik pertanyaan..." maxlength="800" />
      <button type="submit" id="chatSend">Kirim</button>
    </form>
  </section>

  <script>
    // Sidebar mobile toggle
    const sidebar = document.getElementById('sidebar');
    const btnMenu  = document.getElementById('btnMenu');
    btnMenu?.addEventListener('click', () => sidebar.classList.toggle('open'));
    document.addEventListener('click', (e) => {
      const isInside = sidebar.contains(e.target) || (btnMenu && btnMenu.contains(e.target));
      if (!isInside && window.innerWidth <= 980) sidebar.classList.remove('open');
    });

    // Tabs
    const tabLogin = document.getElementById('tabLogin');
    const tabReg   = document.getElementById('tabReg');
    const panelLogin = document.getElementById('panelLogin');
    const panelReg   = document.getElementById('panelReg');

    function showLogin(){
      tabLogin.classList.add('active');
      tabReg.classList.remove('active');
      panelLogin.classList.remove('hidden');
      panelReg.classList.add('hidden');
    }
    function showReg(){
      tabReg.classList.add('active');
      tabLogin.classList.remove('active');
      panelReg.classList.remove('hidden');
      panelLogin.classList.add('hidden');
    }
    tabLogin.addEventListener('click', showLogin);
    tabReg.addEventListener('click', showReg);

    // Demo fill
    document.getElementById('btnDemoLogin')?.addEventListener('click', () => {
      document.getElementById('login_email').value = 'demo@alghazaliart.com';
      document.getElementById('login_password').value = 'demopass';
    });
    document.getElementById('btnDemoReg')?.addEventListener('click', () => {
      document.getElementById('reg_name').value = 'Demo User';
      document.getElementById('reg_phone').value = '081234567890';
      document.getElementById('reg_email').value = 'demo.user@alghazaliart.com';
      document.getElementById('reg_password').value = 'demopass';
      document.getElementById('reg_password2').value = 'demopass';
    });

    // Chatbot UI
    const chatFab   = document.getElementById('chatFab');
    const chatPanel = document.getElementById('chatPanel');
    const chatClose = document.getElementById('chatClose');
    const chatBody  = document.getElementById('chatBody');
    const chatForm  = document.getElementById('chatForm');
    const chatText  = document.getElementById('chatText');
    const chatSend  = document.getElementById('chatSend');

    function addMsg(text, who='bot'){
      const div = document.createElement('div');
      div.className = 'msg ' + who;
      div.textContent = text;
      chatBody.appendChild(div);
      chatBody.scrollTop = chatBody.scrollHeight;
      return div;
    }

    chatFab.addEventListener('click', () => chatPanel.classList.toggle('open'));
    chatClose.addEventListener('click', () => chatPanel.classList.remove('open'));

    async function sendToBot(message){
      const r = await fetch('chat_proxy.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({
          message,
          page: 'logistrasi',
          site: 'Alghazali Art',
          model: 'plas-exp'
        })
      });
      if(!r.ok){
        const t = await r.text().catch(()=> '');
        throw new Error('HTTP ' + r.status + ' ' + t);
      }
      const data = await r.json();
      return (data && data.reply) ? data.reply : 'Maaf, tidak ada respons dari server.';
    }

    chatForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const text = (chatText.value || '').trim();
      if(!text) return;

      addMsg(text, 'user');
      chatText.value = '';
      chatText.focus();

      const loading = addMsg('Sedang mengetik...', 'bot');
      chatSend.disabled = true;
      chatText.disabled = true;

      try{
        const reply = await sendToBot(text);
        loading.textContent = reply;
      }catch(err){
        loading.textContent = 'Maaf, terjadi error saat memanggil chatbot. (' + err.message + ')';
      }finally{
        chatSend.disabled = false;
        chatText.disabled = false;
      }
    });
  </script>
</body>
</html>
