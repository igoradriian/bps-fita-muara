// app — LMS BPS Muara Enim

function nav(p){page=p;courseOpen=null;search='';render();window.scrollTo(0,0)}

function logout(){state.user=null;save();page='dashboard';render()}

function render(){document.getElementById('root').innerHTML=state.user?layout(({dashboard,materi,absensi,riwayat,profil})[page]()):auth();let af=$('#authForm');if(af)af.onsubmit=e=>{e.preventDefault();let f=new FormData(af);if(authMode==='signup'&&f.get('password')!==f.get('confirm'))return toast('Konfirmasi password tidak sama');state.user={email:f.get('email'),username:f.get('username')||f.get('email').split('@')[0]};if(authMode==='signup')state.name=f.get('username');save();render();toast('Selamat datang di LMS BPS!')};let mf=$('#modalForm');if(mf)mf.onsubmit=e=>{e.preventDefault();let f=new FormData(mf);if(modal==='edit'){state.name=f.get('name');state.phone=f.get('phone');state.address=f.get('address')}save();modal=null;render();toast('Perubahan berhasil disimpan')};}

render();
