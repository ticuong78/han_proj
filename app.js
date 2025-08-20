/* =========================
   DỮ LIỆU GIẢ LẬP (MẶC ĐỊNH)
========================= */
// Sản phẩm demo
const products = [
  { id: 1, name: "iPhone 15 128GB", brand: "Apple", price: 21990000, img: "https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6525/6525458cv15d.jpg", tags:["iphone","apple","128gb"] },
  { id: 2, name: "iPhone 15 Pro 256GB", brand: "Apple", price: 30990000, img: "https://www.apple.com/newsroom/images/2023/09/apple-unveils-iphone-15-pro-and-iphone-15-pro-max/article/Apple-iPhone-15-Pro-lineup-color-lineup-geo-230912_big.jpg.large_2x.jpg", tags:["iphone","pro","256gb"] },
  { id: 3, name: "Galaxy S24 256GB", brand: "Samsung", price: 19990000, img: "https://cdn.nguyenkimmall.com/images/detailed/916/10057178-dien-thoai-samsung-galaxy-s24-256gb-vang-1.jpg", tags:["samsung","galaxy","256gb"] },
  { id: 4, name: "Galaxy A55 8/256", brand: "Samsung", price: 8490000,  img: "https://tse1.mm.bing.net/th/id/OIP.dpWhwmQL_-cQTp7H0ePJKQHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3", tags:["a55","budget"] },
  { id: 5, name: "Xiaomi 14T 12/256", brand: "Xiaomi",  price: 11990000, img: "https://tse2.mm.bing.net/th/id/OIP.bYhdNUkrbiMRK-qhBlG-RQHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3", tags:["xiaomi","14t"] },
  { id: 6, name: "OPPO Reno12 12/256", brand: "OPPO",   price: 10490000, img: "https://www.reliancedigital.in/akamai/images/products/OppoReno12Pro_20.jpg", tags:["oppo","reno"] },
];

// Kho hàng theo tỉnh
const warehousesByProvince = {
  "Tiền Giang": [
    {
      name: "Kho Mỹ Tho",
      address: "45 Ấp Bắc, TP. Mỹ Tho, Tiền Giang",
      phone: "0273 389 0000",
      items: [
        { sku: "IP15-128", title: "iPhone 15 128GB", stock: 12 },
        { sku: "S24-256", title: "Galaxy S24 256GB", stock: 0 },
        { sku: "REN12-256", title: "OPPO Reno12 12/256", stock: 7 },
      ],
    },
    {
      name: "Kho Châu Thành",
      address: "QL1A, Châu Thành, Tiền Giang",
      phone: "0273 388 8888",
      items: [
        { sku: "IP15P-256", title: "iPhone 15 Pro 256GB", stock: 3 },
        { sku: "A55-256", title: "Galaxy A55 8/256", stock: 24 },
        { sku: "XM14T-256", title: "Xiaomi 14T 12/256", stock: 15 },
      ],
    },
  ],
  "TP. Hồ Chí Minh": [
    {
      name: "Kho Quận 1",
      address: "123 Lê Lợi, Q1, TP.HCM",
      phone: "028 3822 2222",
      items: [
        { sku: "IP15-128", title: "iPhone 15 128GB", stock: 35 },
        { sku: "S24-256", title: "Galaxy S24 256GB", stock: 18 },
        { sku: "A55-256", title: "Galaxy A55 8/256", stock: 2 },
      ],
    },
  ],
  "Hà Nội": [
    {
      name: "Kho Cầu Giấy",
      address: "26 Duy Tân, Cầu Giấy, Hà Nội",
      phone: "024 3777 7777",
      items: [
        { sku: "IP15P-256", title: "iPhone 15 Pro 256GB", stock: 0 },
        { sku: "XM14T-256", title: "Xiaomi 14T 12/256", stock: 11 },
      ],
    },
  ],
  "Đà Nẵng": [
    {
      name: "Kho Hải Châu",
      address: "50 Bạch Đằng, Hải Châu, Đà Nẵng",
      phone: "0236 355 5555",
      items: [
        { sku: "S24-256", title: "Galaxy S24 256GB", stock: 5 },
        { sku: "REN12-256", title: "OPPO Reno12 12/256", stock: 9 },
      ],
    },
  ],
  "Cần Thơ": [
    {
      name: "Kho Ninh Kiều",
      address: "3 Nguyễn Trãi, Ninh Kiều, Cần Thơ",
      phone: "0292 383 8383",
      items: [
        { sku: "IP15-128", title: "iPhone 15 128GB", stock: 0 },
        { sku: "A55-256", title: "Galaxy A55 8/256", stock: 12 },
      ],
    },
  ],
};

/* =========================
   TIỆN ÍCH
========================= */
const $ = (q, root=document) => root.querySelector(q);
const $$ = (q, root=document) => Array.from(root.querySelectorAll(q));
const money = n => new Intl.NumberFormat("vi-VN", {style:"currency", currency:"VND"}).format(n);

const setYear = () => { const y = $("#year"); if (y) y.textContent = new Date().getFullYear(); };

function sectionTo(id){
  $$(".section").forEach(s=>s.classList.add("hidden"));
  $("#"+id).classList.remove("hidden");
  $$(".nav-link").forEach(a=>a.classList.toggle("active", a.dataset.section===id));
}

/* =========================
   AUTH - localStorage demo
========================= */
const LS_USERS = "ml_users";
const LS_ME    = "ml_currentUser";

function loadUsers(){
  try { return JSON.parse(localStorage.getItem(LS_USERS)) ?? {}; }
  catch { return {}; }
}
function saveUsers(users){ localStorage.setItem(LS_USERS, JSON.stringify(users)); }

function currentUser(){
  const email = localStorage.getItem(LS_ME);
  const users = loadUsers();
  return email && users[email] ? users[email] : null;
}

function renderUserArea(){
  const area = $("#userArea");
  if (!area) return;
  const me = currentUser();
  if(!me){
    area.innerHTML = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="7" r="4" stroke="#7a8aa0" stroke-width="2"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6" stroke="#7a8aa0" stroke-width="2" stroke-linecap="round"/></svg>';
    area.onclick = () => sectionTo("auth");
  }else{
    const initials = me.name.split(" ").map(s=>s[0]).join("").slice(0,2).toUpperCase();
    area.textContent = initials;
    area.title = `Xin chào, ${me.name} (nhấp để đăng xuất)`;
    area.onclick = () => {
      if(confirm("Đăng xuất tài khoản hiện tại?")){
        localStorage.removeItem(LS_ME);
        renderUserArea();
      }
    };
  }
}

function setupAuthForms(){
  const lf = $("#loginForm");
  const rf = $("#registerForm");
  if (lf) lf.addEventListener("submit", (e)=>{
    e.preventDefault();
    const email = $("#emailLogin").value.trim().toLowerCase();
    const pass  = $("#passwordLogin").value;
    const users = loadUsers();
    if(!users[email] || users[email].password !== pass){
      alert("Sai email hoặc mật khẩu!");
      return;
    }
    localStorage.setItem(LS_ME, email);
    renderUserArea();
    alert("Đăng nhập thành công!");
    sectionTo("products");
  });

  if (rf) rf.addEventListener("submit", (e)=>{
    e.preventDefault();
    const name = $("#nameRegister").value.trim();
    const email = $("#emailRegister").value.trim().toLowerCase();
    const pass  = $("#passwordRegister").value;

    const users = loadUsers();
    if(users[email]){
      alert("Email đã tồn tại!");
      return;
    }
    users[email] = { name, email, password: pass, createdAt: Date.now() };
    saveUsers(users);
    localStorage.setItem(LS_ME, email);
    renderUserArea();
    alert("Tạo tài khoản thành công!");
    sectionTo("products");
  });
}

/* =========================
   SẢN PHẨM + TÌM KIẾM
========================= */
function renderProducts(list = products){
  const grid = $("#productGrid");
  if(!grid) return;
  if(!list.length){
    grid.innerHTML = `<p>Không tìm thấy sản phẩm phù hợp.</p>`;
    return;
  }
  grid.innerHTML = list.map(p => `
    <article class="card">
      <img src="${p.img}" alt="${p.name}" loading="lazy">
      <div class="content">
        <h3 class="title">${p.name}</h3>
        <div class="meta">${p.brand}</div>
        <div class="price">${money(p.price)}</div>
        <button class="btn" onclick="alert('Đã thêm vào giỏ (demo)!')">Thêm vào giỏ</button>
      </div>
    </article>
  `).join("");
}

function setupSearch(){
  const input = $("#searchInput");
  if (!input) return;
  input.addEventListener("input", (e)=>{
    const q = e.target.value.trim().toLowerCase();
    const filtered = products.filter(p =>
      p.name.toLowerCase().includes(q) ||
      p.brand.toLowerCase().includes(q) ||
      p.tags.some(t => t.includes(q))
    );
    renderProducts(filtered);
  });
}

/* =========================
   KHO HÀNG
========================= */
function stockBadge(total){
  if(total === 0) return `<span class="badge bad">Hết hàng</span>`;
  if(total <= 5) return `<span class="badge warn">Sắp hết</span>`;
  return `<span class="badge ok">Còn hàng</span>`;
}

function aggStats(province){
  const list = warehousesByProvince[province] ?? [];
  let totalItems = 0, zero = 0, low = 0, ok = 0;
  list.forEach(wh => wh.items.forEach(it=>{
    totalItems += it.stock;
    if(it.stock === 0) zero++;
    else if(it.stock <= 5) low++;
    else ok++;
  }));
  return { totalItems, zero, low, ok };
}

function renderProvinceList(active){
  const ul = $("#provinceList");
  if (!ul) return;
  const provs = Object.keys(warehousesByProvince);
  ul.innerHTML = provs.map(p => `
    <li><a href="#" data-prov="${p}" class="${p===active?'active':''}">${p}</a></li>
  `).join("");
  $$("#provinceList a").forEach(a=>{
    a.addEventListener("click",(e)=>{
      e.preventDefault();
      renderWarehousesFor(a.dataset.prov);
    });
  });
}

function renderWarehousesFor(province){
  const header = $("#warehouseHeader");
  if (header) {
    header.innerHTML = `
      <h2>Tình trạng kho - ${province}</h2>
      <p>Bấm vào từng kho để xem chi tiết mặt hàng.</p>
    `;
  }
  renderProvinceList(province);

  // Stats
  const s = aggStats(province);
  const stats = $("#warehouseStats");
  if (stats) {
    stats.innerHTML = `
      <div class="stat ok"><div class="label">Mặt hàng còn tốt</div><div class="value">${s.ok}</div></div>
      <div class="stat warn"><div class="label">Mặt hàng sắp hết</div><div class="value">${s.low}</div></div>
      <div class="stat bad"><div class="label">Mặt hàng hết hàng</div><div class="value">${s.zero}</div></div>
    `;
  }

  // Cards
  const wrap = $("#warehouseContent");
  if (wrap) {
    const cards = (warehousesByProvince[province] || []).map(wh=>{
      const total = wh.items.reduce((a,b)=>a+b.stock,0);
      return `
        <div class="wh-card">
          <div class="wh-title">
            <h3>${wh.name}</h3>
            <div>${stockBadge(total)}</div>
          </div>
          <div class="meta">${wh.address} • Tel: <a href="tel:${wh.phone.replace(/\s/g,'')}">${wh.phone}</a></div>
          <div class="wh-items">
            <table>
              <thead><tr><th>SKU</th><th>Tên hàng</th><th>Tồn</th></tr></thead>
              <tbody>
                ${wh.items.map(it => `
                  <tr>
                    <td>${it.sku}</td>
                    <td>${it.title}</td>
                    <td class="${it.stock===0?'stock0':(it.stock<=5?'stocklow':'')}">${it.stock}</td>
                  </tr>
                `).join("")}
              </tbody>
            </table>
          </div>
        </div>
      `;
    }).join("");
    wrap.innerHTML = cards || `<p>Chưa có dữ liệu kho cho tỉnh này.</p>`;
  }
}

function initWarehouses(){
  renderProvinceList();              // danh sách bên trái
  renderWarehousesFor("Tiền Giang"); // mặc định mở Tiền Giang
}
/* =========================
   THEME (Light / Dark)
========================= */
const LS_THEME = "ml_theme";

function applyTheme(theme){
  const root = document.documentElement;
  root.setAttribute("data-theme", theme);
  const btn = document.getElementById("themeToggle");
  if (btn){
    btn.setAttribute("aria-pressed", String(theme === "dark"));
    btn.textContent = theme === "dark" ? "🌙" : "☀️";
  }
  localStorage.setItem(LS_THEME, theme);
}

function initTheme(){
  // ưu tiên cấu hình đã lưu, sau đó đến hệ thống
  let theme = localStorage.getItem(LS_THEME);
  if (theme !== "light" && theme !== "dark"){
    theme = window.matchMedia?.("(prefers-color-scheme: dark)").matches ? "dark" : "light";
  }
  applyTheme(theme);

  // nếu người dùng không ép bằng localStorage thì theo dõi thay đổi hệ thống
  window.matchMedia?.("(prefers-color-scheme: dark)").addEventListener?.("change", (e)=>{
    if (!localStorage.getItem(LS_THEME)) applyTheme(e.matches ? "dark" : "light");
  });

  // nút toggle
  const btn = document.getElementById("themeToggle");
  if (btn){
    btn.addEventListener("click", ()=>{
      const next = document.documentElement.getAttribute("data-theme") === "dark" ? "light" : "dark";
      applyTheme(next);
    });
  }
}

/* =========================
   BANNER KHUYẾN MÃI
========================= */
const promos = [
  {
    badge: "BACK TO SCHOOL",
    title: "Giảm đến 20% phụ kiện & điện thoại",
    sub: "Áp dụng HSSV, kèm quà tặng ốp + dán màn",
    img: "https://s.meta.com.vn/Data/image/2022/07/30/LDP-back-to-school-1236x700.png",
    cta: { label: "Xem ưu đãi", href: "#products" }
  },
  {
    badge: "NGÀY VÀNG 15-16",
    title: "iPhone giảm 1.000.000đ",
    sub: "Số lượng có hạn • Hỗ trợ trả góp 0%",
    img: "https://onewaymobile.vn/images/news/2022/11/original/iphone-15-tin-don_1668236260.png",
    cta: { label: "Mua ngay", href: "#products" }
  },
  {
    badge: "END OF SEASON",
    title: "Android Flagship Sale",
    sub: "Galaxy / Xiaomi / OPPO – ưu đãi phí chuyển đổi",
    img: "https://cdn.wccftech.com/wp-content/uploads/2019/12/best-android-flagship-for-holidays-740x373.png",
    cta: { label: "Săn deal", href: "#products" }
  }
];

function renderPromo(){
  const root = document.getElementById("promo");
  if (!root) return;

  root.innerHTML = `
    <div class="promo-viewport">
      <div class="promo-track" id="promoTrack">
        ${promos.map(p => `
          <div class="promo-slide">
            <img src="${p.img}" alt="${p.title}">
            <div class="promo-overlay"></div>
            <div class="promo-content">
              <div>
                <span class="promo-badge">${p.badge}</span>
                <h2 class="promo-title">${p.title}</h2>
                <p class="promo-sub">${p.sub}</p>
                <a class="promo-cta" href="${p.cta.href}">${p.cta.label}</a>
              </div>
            </div>
          </div>
        `).join("")}
      </div>
    </div>
    <div class="promo-nav">
      <button class="promo-btn" id="promoPrev" aria-label="Trước">‹</button>
      <button class="promo-btn" id="promoNext" aria-label="Sau">›</button>
    </div>
    <div class="promo-dots" id="promoDots">
      ${promos.map((_,i)=>`<span class="promo-dot ${i===0?'active':''}" data-i="${i}"></span>`).join("")}
    </div>
  `;

  const track = document.getElementById("promoTrack");
  const dots  = Array.from(document.querySelectorAll(".promo-dot"));
  let i = 0, timer;

  function goto(idx){
    i = (idx + promos.length) % promos.length;
    track.style.transform = `translateX(-${i*100}%)`;
    dots.forEach((d,k)=>d.classList.toggle("active", k===i));
  }

  function play(){ stop(); timer = setInterval(()=>goto(i+1), 5000); }
  function stop(){ if (timer) clearInterval(timer); }

  document.getElementById("promoPrev").onclick = ()=>{ goto(i-1); play(); };
  document.getElementById("promoNext").onclick = ()=>{ goto(i+1); play(); };
  dots.forEach(d=>d.onclick = ()=>{ goto(Number(d.dataset.i)); play(); });

  root.addEventListener("mouseenter", stop);
  root.addEventListener("mouseleave", play);

  play();
}



/* =========================
   NAV & KHỞI TẠO
========================= */
function setupNav(){
  $$(".nav-link").forEach(a=>{
    a.addEventListener("click",(e)=>{
      e.preventDefault();
      const id = a.dataset.section;
      sectionTo(id);
    });
  });
}

/* =========================
   NHẬP NHANH DỮ LIỆU: window.phones & window.stocks
   - Thêm file data.input.js trước app.js:
     <script>window.phones=[{ name:'...', brand:'...', price:..., img:'...', tags:'a,b,c' }]</script>
     <script>window.stocks={ "Tỉnh": { "Tên kho": { address:"", phone:"", items:{ "SKU":{title:"",stock:0} } } } }</script>
========================= */
function normalizeStocks(stocks) {
  const out = {};
  for (const [prov, stores] of Object.entries(stocks || {})) {
    out[prov] = Object.entries(stores || {}).map(([name, wh]) => ({
      name,
      address: wh?.address || "",
      phone: wh?.phone || "",
      items: Object.entries(wh?.items || {}).map(([sku, it]) => ({
        sku,
        title: (it && it.title) || sku,
        stock: Number(it && it.stock) || 0
      }))
    }));
  }
  return out;
}

function applyUserInput() {
  // phones -> products
  if (Array.isArray(window.phones) && window.phones.length) {
    products.length = 0;
    products.push(...window.phones.map((p, i) => ({
      id: p.id ?? (i + 1),
      name: p.name ?? "",
      brand: p.brand ?? "",
      price: Number(p.price) || 0,
      img: p.img || p.image || `https://picsum.photos/seed/u${i}/600/400`,
      tags: Array.isArray(p.tags)
        ? p.tags
        : String(p.tags || "").split(",").map(t => t.trim().toLowerCase()).filter(Boolean)
    })));
  }

  // stocks -> warehousesByProvince
  if (window.stocks && typeof window.stocks === "object") {
    const normalized = normalizeStocks(window.stocks);
    for (const k of Object.keys(warehousesByProvince)) delete warehousesByProvince[k];
    Object.assign(warehousesByProvince, normalized);
  }
}

/* =========================
   BOOT
========================= */
function boot(){
  initTheme();
  setYear();
  setupNav();

  // Áp dụng dữ liệu nhập nhanh (nếu có)
  applyUserInput();

  renderPromo();
  // Auth
  setupAuthForms();
  renderUserArea();

  // Products
  renderProducts();
  setupSearch();

  // Warehouses
  initWarehouses();
}

document.addEventListener("DOMContentLoaded", boot);
