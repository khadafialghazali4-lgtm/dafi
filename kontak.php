<?php
// kontak.php
$pageTitle = "Alghazali Art — Kontak";
$currentPage = "kontak";

$success = isset($_GET['success']) ? $_GET['success'] : null;
$error   = isset($_GET['error']) ? $_GET['error'] : null;
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
      --okbg: rgba(46,229,157,.14); --okbd: rgba(46,229,157,.28);
      --erbg: rgba(255,92,145,.12); --erbd: rgba(255,92,145,.25);
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

    .grid2{display:grid;grid-template-columns: 1fr 1fr;gap:14px;margin-top:14px}
    .card{
      border:1px solid var(--line);
      background:rgba(0,0,0,.14);
      border-radius:var(--radius);
      padding:16px;
    }
    .card h3{margin:0 0 10px;font-size:14px}
    .mini{font-size:13px;color:var(--muted);line-height:1.7;margin:0}

    .quick{
      display:flex;gap:10px;flex-wrap:wrap;margin-top:10px;
    }
    .qbtn{
      display:inline-flex;align-items:center;gap:8px;
      padding:10px 12px;border-radius:14px;
      border:1px solid var(--line);
      background:rgba(255,255,255,.04);
      font-weight:700;font-size:13px;
      transition:.18s ease;
    }
    .qbtn:hover{transform:translateY(-1px);background:rgba(255,255,255,.06)}
    .qbtn.wa{border-color:rgba(46,229,157,.35);background:rgba(46,229,157,.12)}
    .qbtn.mail{border-color:rgba(124,92,255,.35);background:rgba(124,92,255,.12)}

    .alert{
      margin-top:12px;
      padding:12px 14px;
      border-radius: 16px;
      border:1px solid var(--line);
      background: rgba(0,0,0,.12);
      font-size:13px;
      line-height:1.6;
      color:rgba(255,255,255,.88);
    }
    .alert.ok{border-color:var(--okbd); background:var(--okbg);}
    .alert.err{border-color:var(--erbd); background:var(--erbg);}

    /* Form */
    form{display:flex;flex-direction:column;gap:10px;margin-top:10px}
    .row{display:grid;grid-template-columns:1fr 1fr;gap:10px}
    label{font-size:12px;color:var(--muted)}
    input, select, textarea{
      width:100%;
      border:1px solid var(--line);
      background: rgba(0,0,0,.14);
      color:var(--text);
      padding:12px 12px;
      border-radius: 14px;
      outline:none;
      font-family:inherit;
      font-size:13px;
    }
    textarea{min-height:120px;resize:vertical}
    .help{font-size:12px;color:var(--muted);line-height:1.5;margin-top:6px}
    .actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:6px}

    /* Map placeholder */
    .map{
      border:1px solid var(--line);
      border-radius: var(--radius);
      background: rgba(0,0,0,.12);
      overflow:hidden;
      min-height: 220px;
      display:grid;
      place-items:center;
      color: var(--muted);
      font-size:13px;
      position:relative;
    }
    .map small{opacity:.9}
    .map .overlay{
      position:absolute;inset:0;
      background: radial-gradient(520px 200px at 20% 20%, rgba(124,92,255,.16), transparent 60%);
      pointer-events:none;
    }

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
          <span class="chip">WhatsApp</span>
          <span class="chip">Email</span>
          <span class="chip">Form</span>
          <span class="chip">Maps</span>
        </div>
      </div>
    </aside>

    <main class="main">
      <div class="topbar">
        <button class="hamburger" id="btnMenu" aria-label="Buka menu">☰ Menu</button>
        <div style="display:flex; gap:10px; flex-wrap:wrap;">
          <a class="btn" href="layanan.php">Lihat Paket</a>
          <a class="btn primary" href="home.php">Home</a>
        </div>
      </div>

      <section class="section" aria-label="Kontak">
        <h1>Kontak</h1>
        <p class="subtitle">
          Silakan hubungi <b>Alghazali Art</b> untuk konsultasi kebutuhan website. Kamu bisa pilih jalur cepat (WA/telepon/email) atau isi form.
        </p>

        <?php if ($success === "1"): ?>
          <div class="alert ok">✅ Pesan berhasil dikirim. Terima kasih! Kami akan membalas secepatnya.</div>
        <?php elseif ($error): ?>
          <div class="alert err">⚠️ Pesan gagal dikirim. <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div class="grid2">
          <!-- Info + Quick Actions -->
          <div class="card">
            <h3>Info Kontak</h3>
            <p class="mini">
              <b>Alamat:</b> Lab FSTI ISTN<br>
              <b>Telepon:</b> <a href="tel:+6281389740505">0813-8974-0505</a><br>
              <b>Email:</b> <a href="mailto:khadafialghazali4@gmail.com">khadafialghazali4@gmail.com</a>
            </p>

            <div class="quick">
              <a class="qbtn wa" target="_blank"
                 href="https://wa.me/6281389740505?text=Halo%20Alghazali%20Art,%20saya%20ingin%20konsultasi%20website.">
                🟢 WhatsApp
              </a>
              <a class="qbtn" href="tel:+6281389740505">📞 Telepon</a>
              <a class="qbtn mail" href="mailto:khadafialghazali4@gmail.com?subject=Konsultasi%20Website%20-%20Alghazali%20Art">
                ✉️ Email
              </a>
            </div>

            <p class="help">
              Tips: Sertakan jenis website (landing, company profile, e-commerce, sistem, riset), jumlah halaman/modul, dan target deadline.
            </p>

            <div class="map" aria-label="Peta Lokasi">
              <div class="overlay"></div>
              <div style="text-align:center; padding:18px;">
                <div style="font-weight:800; color:rgba(255,255,255,.88); margin-bottom:6px;">📍 Lab FSTI ISTN</div>
                <small>Embed Google Maps bisa dipasang di sini (opsional).</small>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="card">
            <h3>Kirim Pesan</h3>
            <p class="mini">Isi form di bawah ini. Pesan akan kami proses sebagai permintaan konsultasi.</p>

            <form method="POST" action="send_contact.php">
              <div class="row">
                <div>
                  <label for="nama">Nama</label>
                  <input id="nama" name="nama" type="text" placeholder="Nama kamu" required />
                </div>
                <div>
                  <label for="telp">No. Telepon / WhatsApp</label>
                  <input id="telp" name="telp" type="tel" placeholder="08xxxxxxxxxx" required />
                </div>
              </div>

              <div class="row">
                <div>
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" placeholder="nama@email.com" required />
                </div>
                <div>
                  <label for="paket">Minat Paket</label>
                  <select id="paket" name="paket" required>
                    <option value="" selected disabled>Pilih paket</option>
                    <option value="low">Low Package</option>
                    <option value="medium">Medium Package</option>
                    <option value="high">High Package</option>
                    <option value="analysis">Analisis / Akademik</option>
                    <option value="enterprise">Enterprise / ERP / EEM</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="pesan">Pesan</label>
                <textarea id="pesan" name="pesan" placeholder="Ceritakan kebutuhan website kamu (fitur, jumlah halaman, deadline, referensi desain, dsb.)" required></textarea>
                <div class="help">Dengan detail yang jelas, estimasi biaya & timeline bisa lebih akurat.</div>
              </div>

              <div class="actions">
                <button class="btn primary" type="submit">Kirim Pesan</button>
                <a class="btn" href="layanan.php">Lihat Paket</a>
              </div>

              <div class="help">
                *Untuk keamanan, file <code>send_contact.php</code> sebaiknya melakukan validasi input, rate limit, dan anti-spam (captcha/hidden field).
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

    <div class="hint">Tanyakan: “buatkan estimasi biaya” atau “fitur wajib untuk bisnis saya?”</div>

    <div class="chatBody" id="chatBody">
      <div class="msg bot">Halo! Mau konsultasi website? Jelaskan kebutuhanmu (jenis, fitur, deadline), nanti saya bantu rekomendasi paket & estimasi.</div>
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
          page: 'kontak',
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
