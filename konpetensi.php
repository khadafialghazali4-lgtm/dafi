<?php
// konpetensi.php
$pageTitle = "Alghazali Art — Konpetensi";
$currentPage = "konpetensi";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg:#0b1220; --panel:rgba(255,255,255,.06); --panel2:rgba(255,255,255,.08);
      --text:rgba(255,255,255,.92); --muted:rgba(255,255,255,.65); --line:rgba(255,255,255,.12);
      --accent:#7c5cff; --accent2:#2ee59d; --shadow:0 20px 60px rgba(0,0,0,.55); --radius:18px;
      --good: rgba(46,229,157,.16);
      --info: rgba(124,92,255,.14);
      --warn: rgba(255,203,92,.14);
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
      padding:14px 14px;border:1px solid var(--line);
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
      padding:12px 12px;border-radius:14px;color:var(--muted);
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
      display:inline-flex;align-items:center;gap:8px;font-weight:600;
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

    .grid2{display:grid;grid-template-columns: 1.05fr .95fr;gap:14px;margin-top:14px}
    .card{
      border:1px solid var(--line);
      background:rgba(0,0,0,.14);
      border-radius:var(--radius);
      padding:16px;
    }
    .card h3{margin:0 0 8px;font-size:14px}
    .card p{margin:0;color:var(--muted);font-size:13px;line-height:1.65}
    .badges{display:flex;gap:8px;flex-wrap:wrap;margin-top:10px}
    .badge{
      font-size:12px;padding:7px 10px;border-radius:999px;border:1px solid var(--line);
      background:rgba(0,0,0,.12);color:var(--muted);
    }
    .b-good{background:var(--good);border-color:rgba(46,229,157,.25);color:rgba(255,255,255,.88)}
    .b-info{background:var(--info);border-color:rgba(124,92,255,.28);color:rgba(255,255,255,.88)}
    .b-warn{background:var(--warn);border-color:rgba(255,203,92,.22);color:rgba(255,255,255,.88)}
    .list{margin:10px 0 0;padding-left:18px;color:var(--muted);font-size:13px;line-height:1.85}

    .grid3{display:grid;grid-template-columns: repeat(3, 1fr);gap:14px;margin-top:14px}
    .mini{
      border:1px solid var(--line);
      background:rgba(255,255,255,.04);
      border-radius:var(--radius);
      padding:16px;
    }
    .mini h4{margin:0 0 8px;font-size:13px}
    .mini p{margin:0;color:var(--muted);font-size:12.5px;line-height:1.7}

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
      color:var(--text);padding:12px;border-radius:14px;cursor:pointer;font-weight:700;
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
      .grid3{grid-template-columns:1fr}
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
          <span class="chip">Frontend</span>
          <span class="chip">Backend</span>
          <span class="chip">API</span>
          <span class="chip">Database</span>
        </div>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <button class="hamburger" id="btnMenu" aria-label="Buka menu">☰ Menu</button>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <a class="btn" href="layanan.php">Lihat Paket</a>
          <a class="btn primary" href="kontak.php">Konsultasi</a>
        </div>
      </div>

      <section class="section" aria-label="Konpetensi">
        <h1>Konpetensi</h1>
        <p class="subtitle">
          Kami mengerjakan website dari level dasar sampai enterprise, termasuk kebutuhan riset/algoritma.
          Kompetensi ini diselaraskan dengan 5 tier paket (Low, Medium, High, Analisis, Enterprise). :contentReference[oaicite:1]{index=1}
        </p>

        <div class="grid2">
          <div class="card">
            <h3>Keahlian Utama</h3>
            <p>Fondasi yang selalu dipakai agar website stabil, cepat, dan nyaman digunakan.</p>
            <div class="badges">
              <span class="badge b-good">UI Responsif</span>
              <span class="badge b-info">Modern Look & Feel</span>
              <span class="badge b-good">Struktur Kode Rapi</span>
              <span class="badge b-info">SEO Basic</span>
              <span class="badge b-warn">Security Basic</span>
            </div>
            <ul class="list">
              <li>Layout konsisten (sidebar + footer), siap dipakai di semua halaman.</li>
              <li>Komponen UI reusable, mudah dikembangkan untuk halaman/fitur baru.</li>
              <li>Optimasi dasar performa (kompres aset, caching ringan, best practice).</li>
              <li>Integrasi chatbot (via proxy server) agar API key aman.</li>
            </ul>
          </div>

          <div class="card">
            <h3>Stack & Teknologi</h3>
            <p>Pilihan teknologi bisa menyesuaikan paket dan kebutuhan proyek.</p>
            <div class="badges">
              <span class="badge">HTML/CSS/JS</span>
              <span class="badge">PHP</span>
              <span class="badge">React/Next.js</span>
              <span class="badge b-good">Python (Django/FastAPI)</span>
              <span class="badge">MySQL/PostgreSQL</span>
              <span class="badge">MongoDB/Redis</span>
              <span class="badge b-info">REST/JSON</span>
              <span class="badge b-warn">XML/SOAP (Enterprise)</span>
            </div>
            <ul class="list">
              <li>Frontend: UI modern, layout responsif, komponen yang konsisten.</li>
              <li>Backend: API, autentikasi, role user, integrasi layanan pihak ketiga.</li>
              <li>Database: desain skema, indexing, backup, migrasi (sesuai paket).</li>
              <li>Integrasi: JSON/XML, webhook, payment, WA/email gateway (opsional).</li>
            </ul>
          </div>
        </div>

        <div class="grid3" aria-label="Area Kompetensi">
          <div class="mini">
            <h4>Frontend & UI/UX</h4>
            <p>Desain modern, elegan, responsif. Fokus ke keterbacaan, hierarki visual, dan pengalaman user yang nyaman.</p>
          </div>
          <div class="mini">
            <h4>Backend & API</h4>
            <p>Pembuatan API (JSON/XML), autentikasi (JWT/OAuth), role management, integrasi pihak ketiga, dan logging.</p>
          </div>
          <div class="mini">
            <h4>Database & Data</h4>
            <p>Perancangan database SQL/NoSQL, query optimal, indexing, backup, serta data import/export (CSV/JSON/XML).</p>
          </div>
          <div class="mini">
            <h4>Riset & Algoritma</h4>
            <p>Pipeline analisis, dashboard data, implementasi algoritma/ML (Python), tracking eksperimen, report otomatis.</p>
          </div>
          <div class="mini">
            <h4>Deploy & Operasional</h4>
            <p>Deploy ke hosting/VPS/cloud, CI/CD ringan, staging-prod, serta monitoring dasar (sesuai kebutuhan paket).</p>
          </div>
          <div class="mini">
            <h4>Enterprise Readiness</h4>
            <p>RBAC/SSO, audit trail, integrasi ESB/SOAP/queue, skalabilitas, backup & disaster recovery (paket enterprise).</p>
          </div>
        </div>

        <div style="height:14px"></div>

        <div class="card">
          <h3>Kompetensi per Paket (Ringkas)</h3>
          <ul class="list">
            <li><b>Low:</b> responsive basic + template premium + struktur navigasi rapi.</li>
            <li><b>Medium:</b> CMS/admin panel + database basic + REST API sederhana.</li>
            <li><b>High:</b> web app kompleks + integrasi + security lebih kuat + caching.</li>
            <li><b>Analisis:</b> Python sebagai core + data pipeline + dashboard visualisasi.</li>
            <li><b>Enterprise:</b> arsitektur terukur + integrasi sistem + audit/compliance.</li>
          </ul>

          <div style="margin-top:12px; display:flex; gap:10px; flex-wrap:wrap;">
            <a class="btn primary" href="kontak.php">Diskusi Kebutuhan</a>
            <a class="btn" href="layanan.php">Cek Paket</a>
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

  <!-- Chatbot Floating Button -->
  <button class="chatFab" id="chatFab" aria-label="Buka Chatbot">💬</button>

  <!-- Chatbot Panel -->
  <section class="chatPanel" id="chatPanel" aria-label="Chatbot Alghazali Art">
    <div class="chatHeader">
      <div class="title">
        <b>Chatbot Alghazali Art</b>
        <span>Model: plas-exp (via GCP)</span>
      </div>
      <button class="x" id="chatClose" aria-label="Tutup">✕</button>
    </div>

    <div class="hint">Tanyakan: “stack apa untuk e-commerce?” atau “beda High vs Enterprise apa?”</div>

    <div class="chatBody" id="chatBody">
      <div class="msg bot">Halo! Saya siap jelaskan kompetensi, stack, dan rekomendasi teknologi sesuai kebutuhanmu.</div>
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
          page: 'konpetensi',
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
