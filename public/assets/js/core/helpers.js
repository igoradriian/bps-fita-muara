// helpers — LMS BPS Muara Enim

function toast(t){let e=document.createElement('div');e.className='toast';e.textContent=t;document.body.append(e);setTimeout(()=>e.remove(),3000)}

function esc(s){return String(s??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]))}

function attendanceDone(){return state.records.some(x=>x.date===today())}

function attendanceButton(){return `<button class="primary full" ${attendanceDone()?'disabled':''} onclick="doAttendance()">✓ ${attendanceDone()?'Sudah Absen Hari Ini':'Absen Sekarang'}</button>`}

function table(data){return `<div class="table-wrap"><table><thead><tr><th>TANGGAL</th><th>NAMA KEGIATAN</th><th>WAKTU ABSEN</th><th>STATUS</th><th>KETERANGAN</th></tr></thead><tbody>${data.map(r=>`<tr><td>${niceDate(r.date)}</td><td>${esc(r.name)}</td><td>${r.time}</td><td><span class="pill ${r.status==='Hadir'?'green':r.status==='Izin'?'yellow':'red'}">${r.status}</span></td><td>${esc(r.note)}</td></tr>`).join('')||'<tr><td colspan="5">Belum ada data</td></tr>'}</tbody></table></div>`}

function exportCSV(){let rows=[['Tanggal','Kegiatan','Waktu','Status','Keterangan'],...state.records.map(r=>[r.date,r.name,r.time,r.status,r.note])];let csv=rows.map(r=>r.map(v=>'"'+String(v).replaceAll('"','""')+'"').join(',')).join('\r\n');let a=document.createElement('a');a.href=URL.createObjectURL(new Blob(['\ufeff'+csv],{type:'text/csv'}));a.download='riwayat-absensi-bps.csv';a.click();URL.revokeObjectURL(a.href)}
