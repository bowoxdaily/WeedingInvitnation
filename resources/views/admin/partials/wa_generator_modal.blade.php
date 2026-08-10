<div id="wa-generator-modal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;backdrop-filter:blur(4px);align-items:center;justify-content:center;padding:1rem;overflow-y:auto;">
    <div style="background:white;border-radius:12px;width:100%;max-width:700px;box-shadow:0 20px 25px -5px rgba(0,0,0,0.2);overflow:hidden;margin:auto;">
        <!-- Header -->
        <div style="background:linear-gradient(135deg,#1F3530,#2D4A3E);padding:1rem 1.25rem;color:white;display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:0.6rem;">
                <div style="background:#25D366;width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326z"/></svg>
                </div>
                <div>
                    <h3 style="margin:0;font-size:1rem;font-weight:600;color:white;">WhatsApp Share Link Generator</h3>
                    <p style="margin:0;font-size:0.7rem;color:rgba(201,168,76,0.9);">Buat tautan undangan &amp; pesan WhatsApp secara otomatis</p>
                </div>
            </div>
            <button type="button" onclick="closeWaGeneratorModal()" style="background:none;border:none;color:white;font-size:1.4rem;cursor:pointer;">&times;</button>
        </div>

        <!-- Body -->
        <div style="padding:1.25rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <!-- Left Controls -->
            <div style="display:flex;flex-direction:column;gap:0.75rem;">
                <div>
                    <label class="form-label" style="font-size:0.75rem;font-weight:600;">Nama Tamu Undangan *</label>
                    <input type="text" id="wa-modal-guest-name" class="form-input" placeholder="Contoh: Bapak Budi &amp; Keluarga" oninput="updateWaModalPreview()">
                </div>
                <div>
                    <label class="form-label" style="font-size:0.75rem;font-weight:600;">Nomor HP / WhatsApp (Opsional)</label>
                    <input type="text" id="wa-modal-guest-phone" class="form-input" placeholder="Contoh: 081234567890" oninput="updateWaModalPreview()">
                </div>
                <div>
                    <label class="form-label" style="font-size:0.75rem;font-weight:600;">Template Pesan</label>
                    <select id="wa-modal-template-select" class="form-input" onchange="applyWaTemplate()">
                        <option value="formal">1. Formal / Resmi (Sopan)</option>
                        <option value="santai">2. Santai / Teman</option>
                        <option value="islami">3. Islami / Keluarga</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" style="font-size:0.75rem;font-weight:600;">Custom Teks Pesan</label>
                    <textarea id="wa-modal-custom-text" class="form-input" rows="5" style="resize:vertical;font-size:0.78rem;line-height:1.4;" oninput="updateWaModalPreview()"></textarea>
                    <span style="font-size:0.68rem;color:#888;display:block;margin-top:0.25rem;"><code>{nama}</code> = nama tamu, <code>{link}</code> = link undangan</span>
                </div>
            </div>

            <!-- Right Preview -->
            <div style="display:flex;flex-direction:column;gap:0.5rem;background:#E5DDD5;border-radius:8px;padding:0.85rem;border:1px solid #dcd3cb;">
                <span style="font-size:0.75rem;font-weight:600;color:#2D4A3E;">Pratinjau Pesan WhatsApp</span>
                <div style="background:#DCF8C6;border-radius:8px;padding:0.75rem;font-size:0.78rem;color:#111;line-height:1.4;white-space:pre-wrap;box-shadow:0 1px 2px rgba(0,0,0,0.1);max-height:260px;overflow-y:auto;" id="wa-modal-preview-box"></div>
                <div style="background:white;border:1px solid #ccc;border-radius:6px;padding:0.4rem 0.6rem;font-size:0.72rem;word-break:break-all;color:#444;" id="wa-modal-link-box"></div>
            </div>
        </div>

        <!-- Footer Actions -->
        <div style="background:#F9F9F7;border-top:1px solid #E5E5E0;padding:0.85rem 1.25rem;display:flex;align-items:center;justify-content:space-between;gap:0.5rem;">
            <button type="button" onclick="copyWaOnlyLink()" style="background:white;border:1px solid #C9A84C;color:#C9A84C;padding:0.5rem 0.85rem;border-radius:6px;font-size:0.78rem;font-weight:600;cursor:pointer;">📋 Copy Link</button>
            <button type="button" onclick="copyWaFullMessage()" style="background:#2D4A3E;color:white;border:none;padding:0.5rem 0.85rem;border-radius:6px;font-size:0.78rem;font-weight:600;cursor:pointer;">📝 Copy Pesan WA</button>
            <button type="button" onclick="sendWaDirectly()" style="background:#25D366;color:white;border:none;padding:0.5rem 1rem;border-radius:6px;font-size:0.78rem;font-weight:600;cursor:pointer;">💬 Kirim WA</button>
        </div>
    </div>
</div>
<script>
const waTemplates = {
    formal: `Yth. Bapak/Ibu/Saudara/i {nama},

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.

Berikut link undangan digital kami untuk informasi lengkap acara & konfirmasi kehadiran:
{link}

Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.

Terima kasih.`,

    santai: `Halo {nama}! 👋

Kami ingin mengundang kamu untuk hadir di hari bahagia pernikahan kami 💍

Detail acara & konfirmasi kehadiran bisa kamu lihat melalui link undangan berikut ya:
{link}

Semoga kamu bisa hadir dan berbagi kebahagiaan bersama kami! Sampai jumpa di hari H ✨`,

    islami: `Assalamu’alaikum Wr. Wb.

Kepada Yth. {nama} & Keluarga,

Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara pernikahan kami.

Detail lokasi, jadwal, dan konfirmasi kehadiran dapat dilihat melalui tautan berikut:
{link}

Terima kasih atas doa dan kerelaan waktunya.
Wassalamu’alaikum Wr. Wb.`
};

function openWaGeneratorModal(guestName = '', guestPhone = '') {
    const modal = document.getElementById('wa-generator-modal');
    if (!modal) return;

    document.getElementById('wa-modal-guest-name').value = guestName;
    document.getElementById('wa-modal-guest-phone').value = guestPhone;
    
    const customText = document.getElementById('wa-modal-custom-text');
    if (!customText.value.trim()) {
        applyWaTemplate();
    } else {
        updateWaModalPreview();
    }

    modal.style.display = 'flex';
}

function closeWaGeneratorModal() {
    const modal = document.getElementById('wa-generator-modal');
    if (modal) modal.style.display = 'none';
}

function applyWaTemplate() {
    const type = document.getElementById('wa-modal-template-select').value;
    document.getElementById('wa-modal-custom-text').value = waTemplates[type] || waTemplates.formal;
    updateWaModalPreview();
}

function getWaGeneratedData() {
    const rawName = document.getElementById('wa-modal-guest-name').value.trim() || 'Tamu Undangan';
    const phone = document.getElementById('wa-modal-guest-phone').value.trim();
    const templateText = document.getElementById('wa-modal-custom-text').value;

    const baseUrl = window.location.origin;
    const inviteLink = `${baseUrl}/?to=${encodeURIComponent(rawName)}`;

    const formattedMessage = templateText
        .replace(/\{nama\}/g, rawName)
        .replace(/\{link\}/g, inviteLink);

    return {
        name: rawName,
        phone: phone,
        link: inviteLink,
        message: formattedMessage
    };
}

function updateWaModalPreview() {
    const data = getWaGeneratedData();
    document.getElementById('wa-modal-preview-box').textContent = data.message;
    document.getElementById('wa-modal-link-box').innerHTML = `<strong>Link Personal:</strong> <a href="${data.link}" target="_blank" style="color:#C9A84C;text-decoration:underline;">${data.link}</a>`;
}

function copyWaOnlyLink() {
    const data = getWaGeneratedData();
    navigator.clipboard.writeText(data.link).then(() => {
        alert(`Link undangan untuk "${data.name}" berhasil disalin!`);
    }).catch(() => {
        alert('Gagal menyalin link.');
    });
}

function copyWaFullMessage() {
    const data = getWaGeneratedData();
    navigator.clipboard.writeText(data.message).then(() => {
        alert(`Pesan WhatsApp lengkap untuk "${data.name}" berhasil disalin!`);
    }).catch(() => {
        alert('Gagal menyalin pesan.');
    });
}

function sendWaDirectly() {
    const data = getWaGeneratedData();
    let phoneNum = data.phone.replace(/[^0-9]/g, '');
    if (phoneNum.startsWith('0')) {
        phoneNum = '62' + phoneNum.substring(1);
    }

    if (!phoneNum) {
        alert('Silakan masukkan Nomor HP / WhatsApp tamu terlebih dahulu.');
        return;
    }

    const waUrl = `https://wa.me/${phoneNum}?text=${encodeURIComponent(data.message)}`;
    window.open(waUrl, '_blank');
}
</script>